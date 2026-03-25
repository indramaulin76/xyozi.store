<?php

namespace App\Controllers\User;

use App\Models\UserModel;
use App\Models\TopupModel;
use App\Models\MetodePembayaranModel;
use App\Models\ApiProviderModel;
use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;

class Topup extends BaseController
{
    protected $session;
    
    public function __construct()
    {
        $this->session = session();
        $this->userModel = new UserModel();
        $this->topupModel = new TopupModel();
    }
    
    public function prosesPayment()
    {
        $userLogin = $this->session->has('isLogin');
        $username = '';
        
        if ($userLogin) {
            $username = $this->session->get('username');
            $user = $this->userModel->where('username', $username)->first();
        } else {
          return redirect()->to('/');
        }
        
        $json = $this->request->getJSON();
        $nominal = html_entity_decode($json->nominal, ENT_QUOTES, 'UTF-8');
        $whatsapp = strip_tags(htmlspecialchars(html_entity_decode($json->whatsapp, ENT_QUOTES, 'UTF-8')));
        $metodeCode = html_entity_decode($json->metodeCode, ENT_QUOTES, 'UTF-8');
        $metodeName = html_entity_decode($json->metodeName, ENT_QUOTES, 'UTF-8');
    
        $uniqueTopupID = false;
        $maxAttempts = 10;
    
        for ($i = 0; $i < $maxAttempts; $i++) {
            $topupID = rand(1000000, 9999999);
    
            $existingTopupID = $this->topupModel->where('topup_id', $topupID)->first();
    
            if (!$existingTopupID) {
                $uniqueTopupID = true;
                break;
            }
        }
    
        if (!$uniqueTopupID) {
            throw new \Exception('Gagal mendapatkan nomor pesanan setelah sejumlah percobaan, hubungi administrator!!.');
        }
    
        $settings = $this->getSettingsData();
        
        $apiProviderModel = new ApiProviderModel();
        $api              = $apiProviderModel->where('kode', 'Sp')->first();

        try {
            $spGw = Services::providerGatewayFactory()->sakurupiah();
        } catch (\Throwable $e) {
            return $this->response->setJSON(['success' => false, 'message' => 'Gateway pembayaran belum dikonfigurasi.']);
        }

        $api_id       = $api['api_id'];
        $data_method  = $metodeCode;
        $merchant_ref = $topupID;
        $amount       = $nominal;
        $URL_config   = rtrim((string) $api['private_key'], '/');

        $signature = $spGw->buildCreateSignature((string) $api_id, (string) $data_method, (string) $merchant_ref, $amount);

        $dataPOST = [
            'api_id'       => $api_id,
            'method'       => $data_method,
            'phone'        => ! empty($whatsapp) ? $whatsapp : $user['whatsapp'],
            'amount'       => $amount,
            'merchant_fee' => '2',
            'merchant_ref' => $merchant_ref,
            'expired'      => '1',
            'produk'       => ['TOPUP SALDO'],
            'qty'          => ['-'],
            'harga'        => [$amount],
            'size'         => ['-'],
            'note'         => ['Username : ' . $user['username']],
            'callback_url' => $URL_config . '/callback',
            'return_url'   => $URL_config . '/dashboard/topup/invoice/' . $merchant_ref,
            'signature'    => $signature,
        ];

        $responseData = $spGw->createTransaction($dataPOST);

        if ($responseData === null) {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal menghubungi gateway pembayaran.']);
        }

        $status = (int) ($responseData['status'] ?? 0);
        if ($status === 400) {
            return $this->response->setJSON([
                'success' => false,
                'message' => $responseData['message'] ?? 'Error 400 dari gateway'
            ]);
        }
        
        if ($status === 200 && isset($responseData['data'])) {
            $dataItem = $responseData['data'][0];
        
            $batas_pembayaran = (new \DateTime('now', new \DateTimeZone(date_default_timezone_get())))
                                ->modify('+60 minutes')->format('Y-m-d H:i:s');

            $postFee = $dataItem['total'] - $dataItem['amount_merchant'];
            $data = [
                'user_id' => $user['id'],
                'username' => $user['username'],
                'topup_id' => $merchant_ref,
                'nominal' => $amount,
                'fee' => round($postFee),
                'total_pembayaran' => round($dataItem['total']),
                'metode' => $data_method,
                'kode_pembayaran' =>
                    !empty($dataItem['qr']) ? $dataItem['qr'] :
                    (!empty($dataItem['payment_no']) ? $dataItem['payment_no'] :
                    $dataItem['checkout_url']),
                'status' => 'Unpaid',
                'batas_pembayaran' => $batas_pembayaran,
                'cara_bayar' => 'Pastikan anda melakukan pembayaran sebelum melewati batas waktu pembayaran dan dengan nominal yang tepat.',
            ];
                    
            $this->topupModel->insert($data);
            return $this->response->setJSON(['success'=>true,'topupID'=>$merchant_ref]);
        }
        
        return $this->response->setJSON([
            'success'=>false,
            'message'=>$responseData['message'] ?? 'Tidak ada data pembayaran yang valid'
        ]);

    }
    
}