<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\ApiProviderModel;
use App\Models\PembelianModel;
use App\Models\TopupModel;
use App\Models\UserModel;
use Config\Services;

class Callback extends BaseController
{
    public function callbackSakurupiah()
    {
        $settings = $this->getSettingsData();

        $apiProviderModel = new ApiProviderModel();
        $apiPd            = $apiProviderModel->where('kode', 'Sp')->first();
        if ($apiPd === null) {
            exit(json_encode([
                'success' => false,
                'message' => 'Payment gateway not configured',
            ]));
        }

        $spGw = new \App\Services\Providers\SakurupiahGateway($apiPd);

        $request = service('request');
        $json    = $request->getBody();

        $callbackSignature = $_SERVER['HTTP_X_CALLBACK_SIGNATURE'] ?? '';
        if (! $spGw->verifyCallbackSignature($json, (string) $callbackSignature)) {
            exit(json_encode([
                'success' => false,
                'message' => 'Invalid signature',
            ]));
        }

        $data = json_decode($json, true);
        if (! is_array($data) || json_last_error() !== JSON_ERROR_NONE) {
            exit(json_encode([
                'success' => false,
                'message' => 'Invalid JSON data',
            ]));
        }

        if (! isset($_SERVER['HTTP_X_CALLBACK_EVENT']) || $_SERVER['HTTP_X_CALLBACK_EVENT'] !== 'payment_status') {
            exit(json_encode([
                'success' => false,
                'message' => 'Unrecognized callback event',
            ]));
        }

        try {
            if (! isset($data['status'], $data['merchant_ref'])) {
                exit(json_encode([
                    'success' => false,
                    'message' => 'Data JSON tidak lengkap',
                ]));
            }

            $payment_MerchantRef = $data['merchant_ref'];
            $payment_Status      = $data['status'];
            $payment_StatusKode  = $data['status_kode'] ?? null;
            $statusOk            = (int) $payment_StatusKode === 1;

            if ($payment_Status === 'berhasil' && $statusOk) {
                $pembelianModel = new PembelianModel();
                $invoice        = $pembelianModel
                    ->where('order_id', $payment_MerchantRef)
                    ->where('status_pembayaran', 'Unpaid')
                    ->first();

                if ($invoice) {
                    $orderData = [
                        'status_pembayaran' => 'Paid',
                        'status_pembelian'  => 'Proses',
                        'note'              => 'Pembelian sedang di proses',
                    ];

                    $pembelianModel->update($invoice['id'], $orderData);

                    $factory = Services::providerGatewayFactory();

                    if ($invoice['provider'] === 'Vip') {
                        $vipGw        = $factory->vip();
                        $apiVip       = $apiProviderModel->where('kode', 'Vip')->first();
                        $responseData = $vipGw->gameFeature([
                            'key'       => $apiVip['api_key'],
                            'sign'      => $vipGw->signature(),
                            'type'      => 'order',
                            'service'   => $invoice['kode_produk'],
                            'data_no'   => $invoice['uid'],
                            'data_zone' => ($invoice['server'] === 'NoServer') ? '' : $invoice['server'],
                        ]) ?? [];

                        if (isset($responseData['data'])) {
                            $pembelianModel->update($invoice['id'], [
                                'trx_id' => $responseData['data']['trxid'],
                            ]);
                        }
                    } elseif ($invoice['provider'] === 'DF') {
                        $digiGw  = $factory->digiflazz();
                        $apiDF   = $apiProviderModel->where('kode', 'DF')->first();
                        $userdigi = $apiDF['api_id'];
                        $apiKey   = $apiDF['api_key'];
                        $postData = [
                            'username'       => $userdigi,
                            'buyer_sku_code' => $invoice['kode_produk'],
                            'customer_no'    => ($invoice['server'] === 'NoServer')
                                ? strval($invoice['uid'])
                                : strval($invoice['uid']) . strval($invoice['server']),
                            'ref_id'         => $invoice['order_id'],
                            'sign'           => md5($userdigi . $apiKey . strval($invoice['order_id'])),
                        ];
                        $responseData = $digiGw->transaction($postData) ?? [];
                        if (isset($responseData['data'])) {
                            $pembelianModel->update($invoice['id'], [
                                'note' => $responseData['data']['message'],
                            ]);
                        }
                    } elseif ($invoice['provider'] === 'AG') {
                        $pembelianModel->update($invoice['id'], [
                            'status_pembelian' => 'Gagal',
                            'note'              => 'Provider ApiGames tidak didukung — hubungi admin.',
                        ]);
                    } elseif ($invoice['provider'] === 'Manual') {
                        $pembelianModel->update($invoice['id'], [
                            'note' => 'Pesanan sedang di proses',
                        ]);
                    } elseif ($invoice['provider'] === 'RG') {
                        $apiRG = $apiProviderModel->where('kode', 'RG')->first();
                        if ($apiRG === null) {
                            $pembelianModel->update($invoice['id'], [
                                'status_pembelian' => 'Gagal',
                                'note'             => 'Konfigurasi RG tidak ditemukan',
                            ]);
                        } else {
                            $rgGw  = $factory->rg();
                            $result = $rgGw->registerOrder([
                                'api_key'     => $rgGw->apiKey(),
                                'nama'        => $invoice['uid'],
                                'durasi'      => $invoice['kode_produk'],
                                'game'        => $invoice['games'],
                                'max_devices' => 1,
                            ]) ?? [];

                            if (! empty($result['data']['license'])) {
                                $pembelianModel->update($invoice['id'], [
                                    'trx_id'            => $result['data']['license'],
                                    'status_pembelian'  => 'Sukses',
                                    'note'              => 'Transaksi berhasil di proses',
                                ]);
                            }
                        }
                    } else {
                        $pembelianModel->update($invoice['id'], [
                            'status_pembelian' => 'Gagal',
                            'note'             => 'Provider tidak di temukan',
                        ]);
                    }

                    $whatsappMessage  = "*{$settings['web_title']}*\n\n";
                    $whatsappMessage .= "Pembayaran pesanan {$invoice['order_id']} *Terkonfirmasi* saat ini pesanan anda sedang di *Proses*\n";
                    $whatsappMessage .= "---------------------------\n\n";
                    $whatsappMessage .= '*Lihat Pesanan*' . "\n" . base_url('/invoice/' . $invoice['order_id']) . "\n\n";
                    $whatsappMessage .= "---------------------------\n\n";
                    $whatsappMessage .= '*Terimakasih!*';
                    $whatsapp = $invoice['nomor_whatsapp'];

                    $this->sendUserWhatsappMessage($whatsapp, $whatsappMessage);
                } else {
                    $topupModel = new TopupModel();
                    $topup      = $topupModel
                        ->where('topup_id', $payment_MerchantRef)
                        ->where('status', 'Unpaid')
                        ->first();

                    if ($topup) {
                        $userModel = new UserModel();
                        $user      = $userModel->find($topup['user_id']);
                        if ($user) {
                            $newBalance = (float) $user['balance'] + (float) $topup['nominal'];
                            $userModel->update($topup['user_id'], ['balance' => $newBalance]);
                            $topupModel->update($topup['id'], ['status' => 'PAID']);
                        }
                    }
                }

                exit(json_encode([
                    'success' => true,
                    'message' => 'Transaksi Berhasil Di Bayar',
                ]));
            }

                if ($payment_Status === 'expired' && (int) $payment_StatusKode === 2) {
                    $topupModel = new TopupModel();
                    $topup      = $topupModel
                        ->where('topup_id', $payment_MerchantRef)
                        ->where('status', 'Unpaid')
                        ->first();

                    if ($topup) {
                        $topupModel->update($topup['id'], ['status' => 'Gagal']);
                    }

                    exit(json_encode([
                        'success' => true,
                        'message' => 'Transaksi Expired',
                    ]));
                }

                if ($payment_Status === 'pending' && (int) $payment_StatusKode === 0) {
                    exit(json_encode([
                        'success' => true,
                        'message' => 'Status pending',
                    ]));
                }

                throw new \RuntimeException('Status tidak dikenali');
        } catch (\Throwable $e) {
            exit(json_encode(['success' => false, 'message' => $e->getMessage()]));
        }
    }

    private function sendUserWhatsappMessage(string $whatsapp, string $whatsappMessage): void
    {
        try {
            Services::providerGatewayFactory()->fonnte()->sendMessage($whatsapp, $whatsappMessage);
        } catch (\Throwable $e) {
            log_message('error', 'Fonnte callback notify: ' . $e->getMessage());
        }
    }
}
