<?php

namespace App\Controllers\Sistem;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\MlbbKategori;
use App\Models\MlbbLayanan;
use App\Models\PembelianModel;
use App\Models\UserModel;
use App\Models\ApiProviderModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Database\ConnectionInterface;

class Sistem extends BaseController
{
    
    public function getProdukVip()
    {

        $apiProviderModel = new ApiProviderModel();
        $api = $apiProviderModel->where('kode', 'Vip')->first();
        
        $apiId = $api['api_id'];
        $apiKey = $api['api_key'];
        $sign = md5($apiId . $apiKey);
    
        $data = [
            'key' => $apiKey,
            'sign' => $sign,
            'type' => 'services',
        ];
    
        $url = 'https://vip-reseller.co.id/api/game-feature';
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    
        $result = curl_exec($ch);
        $data = json_decode($result, true);
       // var_dump($data);
       // die();
    
        if (array_key_exists('data', $data)) {
            $get_failed = [];
            $produkModel = new ProdukModel();
    
            foreach ($data['data'] as $produk) {
                if ($produk['status'] === 'available') {
                  
                    $profit = ($produk['price']['basic'] * $api['profit'] / 100);
                    $profitBasic = ($produk['price']['basic'] * $api['profit_basic'] / 100);
                    $profitGold = ($produk['price']['basic'] * $api['profit_gold'] / 100);
                    $profitPlatinum = ($produk['price']['basic'] * $api['profit_platinum'] / 100);
                    
                    $insertData = [
                        'nama' => $produk['name'],
                        'brand' => $produk['game'],
                      //  'tipe' => 'instant',
                        'harga_provider' => $produk['price']['basic'],
                        'harga_jual' => $produk['price']['basic'] + $profit,
                        'harga_basic' => $produk['price']['basic'] + $profitBasic,
                        'harga_gold' => $produk['price']['basic'] + $profitGold,
                        'harga_platinum' => $produk['price']['basic'] + $profitPlatinum,
                        'keuntungan' => $profit,
                        'keuntungan_basic' => $profitBasic,
                        'keuntungan_gold' => $profitGold,
                        'keuntungan_platinum' => $profitPlatinum,
                        'kode_produk' => $produk['code'],
                        'status' => $produk['status'] === 'available' ? 'aktif' : 'tidak aktif',
                        'provider' => 'Vip',
                    ];
    
                    $existingData = $produkModel->where('kode_produk', $produk['code'])->first();
    
                    if ($existingData) {
                        try {
                            $produkModel->update($existingData['id'], $insertData);
                        } catch (\Exception $e) {
                            return $this->response->setJSON(["status" => "error", "message" => "Gagal mengupdate data ke database: " . $e->getMessage()]);
                        }
                    } else {
                        try {
                            $produkModel->insert($insertData);
                            $get_failed[] = $produk['name'];
                        } catch (\Exception $e) {
                            return $this->response->setJSON(["status" => "error", "message" => "Gagal menyimpan data ke database: " . $e->getMessage()]);
                        }
                    }
                }
            }
    
            $produk = $produkModel->findAll();
    
            if (empty($produk)) {
                return $this->response->setJSON(["status" => "warning", "message" => "Tidak ada layanan yang berhasil diambil."]);
            } else {
                return $this->response->setJSON(["status" => "success", "message" => "Berhasil mengambil data dan menyimpannya ke database" . implode(', ', $get_failed)]);
            }
        } else {
            return $this->response->setJSON(["status" => "error", "message" => "Gagal mendapatkan data dari provider."]);
        }
    }
    
    public function updateStatusVip()
    {
        $settings = $this->getSettingsData();
        
        $apiProviderModel = new ApiProviderModel();
        $api = $apiProviderModel->where('kode', 'Vip')->first();
        
        $pembelianModel = new PembelianModel();
        
        /*$userModel = new UserModel();*/
        
        $status = ['Proses'];
        $invoices = $pembelianModel
                    ->whereIn('status_pembelian', $status)
                    ->findAll();
        
        if ($invoices) {
            $apiId = $api['api_id'];
            $apiKey = $api['api_key'];
    
            foreach ($invoices as $invoice) {
                $data = [
                    'key' => $apiKey,
                    'sign' => md5($apiId . $apiKey),
                    'type' => 'status',
                    'trxid' => $invoice['trx_id'],
                ];
    
                $url = 'https://vip-reseller.co.id/api/game-feature';
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    
                $result = curl_exec($ch);
                $responseData = json_decode($result, true);
                curl_close($ch);
    
                if (isset($responseData['result']) && $responseData['result'] === true) {
                    $statusAPI = $responseData['data'][0]['status'];
                    $note = $responseData['data'][0]['note'];
    
                    if ($invoice['trx_id'] == $responseData['data'][0]['trxid']) {

                        if ($invoice['status_pembelian'] != $statusAPI) {
                      $orderData = [
                          'status_pembelian' => ($statusAPI === 'success') ? 'Sukses' : (($statusAPI === 'proccess') ? 'Proses' : (($statusAPI === 'error') ? 'Gagal' : (($statusAPI === 'waiting') ? 'Proses' : $statusAPI))),
                          'note' => $note,
                      ];
                      
                      $pembelianModel->where('id', $invoice['id'])->set($orderData)->update();
                      
                      /*if ($statusAPI === 'error') {
                      $users = $userModel->where('id', $invoice['user_id'])->first();
                      $balanceData = [
                          'balance' => $users['balance'] + $invoice['harga_jual'],
                          //'note' => $note,
                      ];
                      $userModel->where('id', $invoice['user_id'])->set($balanceData)->update();
                      }*/
                            
                    $whatsappMessage = "*{$settings['web_title']}*\n\n";
                    $whatsappMessage .= "*Detail Pesanan*\n";
                    $whatsappMessage .= "---------------------------\n";
                    $whatsappMessage .= "*Invoice*: {$invoice['order_id']}\n";
                    $whatsappMessage .= "*Produk*: {$invoice['produk']}\n";
                    $hargaProduk = number_format($invoice['total_pembayaran'], 0, ',', '.');
                    $whatsappMessage .= "*Harga*: Rp {$hargaProduk}\n";
                    $whatsappMessage .= "*Status*: $statusAPI\n";
                    $whatsappMessage .= "---------------------------\n\n";
                    $whatsappMessage .= "*Data Tujuan*\n";
                    $whatsappMessage .= "---------------------------\n";
                    $whatsappMessage .= "*ID*: {$invoice['uid']}\n";
                    if ($invoice['server'] !== 'NoServer') {
                        $whatsappMessage .= "*Server*: {$invoice['server']}\n";
                    }
                    if ($invoice['nama_target'] !== 'Off') {
                        $whatsappMessage .= "*Nickname*: {$invoice['nama_target']}\n";
                    }
                    $whatsappMessage .= "---------------------------\n\n";
                    $whatsappMessage .= "*Lihat Pesanan*\n" . base_url('/invoice/' . $invoice['order_id']) . "\n\n";
                    $whatsappMessage .= "*Terimakasih!*";
                    
                    $whatsapp = $invoice['nomor_whatsapp'];
                    $this->sendUserWhatsappMessage($whatsapp, $whatsappMessage);
                    
                    
                    $whatsappAdminMessage = "*Admin {$settings['web_title']}*\n\n";
                    $whatsappAdminMessage .= "*Detail Pesanan Pembeli*\n";
                    $whatsappAdminMessage .= "---------------------------\n";
                    $whatsappAdminMessage .= "*Invoice*: {$invoice['order_id']}\n";
                    $whatsappAdminMessage .= "*Produk*: {$invoice['produk']}\n";
                    $hargaProduk = number_format($invoice['total_pembayaran'], 0, ',', '.');
                    $whatsappAdminMessage .= "*Harga*: Rp {$hargaProduk}\n";
                    $whatsappAdminMessage .= "*Status*: $statusAPI\n";
                    $whatsappAdminMessage .= "---------------------------\n\n";
                    $whatsappAdminMessage .= "*Data Tujuan*\n";
                    $whatsappAdminMessage .= "---------------------------\n";
                    $whatsappAdminMessage .= "*ID*: {$invoice['uid']}\n";
                    if ($invoice['server'] !== 'NoServer') {
                        $whatsappMessage .= "*Server*: {$invoice['server']}\n";
                    }
                    if ($invoice['nama_target'] !== 'Off') {
                        $whatsappMessage .= "*Nickname*: {$invoice['nama_target']}\n";
                    }
                    $whatsappAdminMessage .= "---------------------------\n\n";
                    $whatsappAdminMessage .= "*Lihat Pesanan*\n" . base_url('/invoice/' . $invoice['order_id']) . "\n\n";
                    $whatsappAdminMessage .= "*Terimakasih!*";
                    
                    $whatsappAdmin = $settings['whatsapp_admin'];
                    
                    $this->sendAdminWhatsappMessage($whatsappAdmin, $whatsappAdminMessage);
    
                            $result = ['success' => true, 'message' => 'Update Pembelian sukses.'];
                        } else {
                            $result = ['success' => false, 'message' => 'Status Pembelian sudah terupdate sebelumnya.'];
                        }
                    } else {
                        $result = ['success' => false, 'message' => 'Order_id tidak sesuai dengan trxid dari API.'];
                    }
                } else {
                    $result = ['success' => false, 'message' => 'Tidak dapat mendapatkan data status dari respon API.'];
                }
            }
        } else {
            $result = ['success' => false, 'message' => 'Invoice tidak ditemukan atau status pembelian bukan Proses.'];
        }
    
        header('Content-type: application/json');
        echo json_encode($result);
    }
    
    public function getProdukDf()
    {
        $apiProviderModel = new ApiProviderModel();
        $api = $apiProviderModel->where('kode', 'DF')->first();
        
        $username = $api['api_id'];
        $apiKey = $api['api_key'];
    
        $sign = md5($username . $apiKey . "pricelist");
    
        $url = 'https://api.digiflazz.com/v1/price-list';
    
        $requestData = [
            'cmd' => 'prepaid',
            'username' => $username,
            'sign' => $sign,
        ];
    
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestData));
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
    
        $response = curl_exec($curl);
        curl_close($curl);
    
        $data = json_decode($response, true);
    
        if (array_key_exists('data', $data)) {
            $get_failed = [];
            $produkModel = new ProdukModel();
            
            if (array_key_exists('rc', $data['data']) && $data['data']['rc'] !== "00") {
                $errorMessage = $data['data']['message'];
                session()->setFlashdata('error', $errorMessage);
                return redirect()->to('admin/api-provider');
                //return $this->response->setJSON(["status" => "error", "message" => $errorMessage]);
            }
    
            foreach ($data['data'] as $service) {
              
                $profit = ($service['price'] * $api['profit'] / 100);
                $profitBasic = ($service['price'] * $api['profit_basic'] / 100);
                $profitGold = ($service['price'] * $api['profit_gold'] / 100);
                $profitPlatinum = ($service['price'] * $api['profit_platinum'] / 100);
                
                $insertData = [
                    'nama' => $service['product_name'],
                    'brand' => $service['brand'],
                    'kategori' => $service['category'],
                  //  'tipe' => 'instant',
                    'harga_provider' => $service['price'],
                    'harga_jual' => $service['price'] + $profit,
                    'harga_basic' => $service['price'] + $profitBasic,
                    'harga_gold' => $service['price'] + $profitGold,
                    'harga_platinum' => $service['price'] + $profitPlatinum,
                    'keuntungan' => $profit,
                    'keuntungan_basic' => $profitBasic,
                    'keuntungan_gold' => $profitGold,
                    'keuntungan_platinum' => $profitPlatinum,
                    'kode_produk' => $service['buyer_sku_code'],
                    'status' => $service['seller_product_status'] === true ? 'aktif' : 'tidak aktif',
                    'provider' => 'DF',
                ];
                
                $existingData = $produkModel->where('kode_produk', $service['buyer_sku_code'])->first();
    
                if ($existingData) {
                    try {
                        $produkModel->update($existingData['id'], $insertData);
                    } catch (\Exception $e) {
                        session()->setFlashdata('error', "Gagal mengupdate data ke database: " . $e->getMessage());
                        return redirect()->to('admin/api-provider');
                        //return $this->response->setJSON(["status" => "error", "message" => "Gagal mengupdate data ke database: " . $e->getMessage()]);
                    }
                } else {
                    try {
                        $produkModel->insert($insertData);
                        $get_failed[] = $service['product_name'];
                    } catch (\Exception $e) {
                        session()->setFlashdata('error', "Gagal menyimpan data ke database: " . $e->getMessage());
                        return redirect()->to('admin/api-provider');
                        //return $this->response->setJSON(["status" => "error", "message" => "Gagal menyimpan data ke database: " . $e->getMessage()]);
                    }
                }
            }
    
            $produk = $produkModel->findAll();
    
            if (empty($produk)) {
                session()->setFlashdata('info', "Tidak ada layanan yang berhasil diambil.");
                return redirect()->to('admin/api-provider');
                //return $this->response->setJSON(["status" => "warning", "message" => "Tidak ada layanan yang berhasil diambil."]);
            } else {
                session()->setFlashdata('success', "Berhasil mengambil data dan menyimpannya ke database.");
                return redirect()->to('admin/api-provider');
                //return $this->response->setJSON(["status" => "success", "message" => "Berhasil mengambil data dan menyimpannya ke database" . implode(', ', $get_failed)]);
            }
    
        } else {
            return $this->response->setJSON(["status" => "error", "message" => "Gagal mendapatkan data dari provider."]);
        }
    }
    
    public function updateStatusDf()
    {
        $settings = $this->getSettingsData();
        
        $apiProviderModel = new ApiProviderModel();
        $api = $apiProviderModel->where('kode', 'DF')->first();
        
        $pembelianModel = new PembelianModel();
        /*$userModel = new UserModel();*/
        
        $status = ['Proses'];
        $invoices = $pembelianModel
                    ->whereIn('status_pembelian', $status)
                    ->findAll();
    
        $userdigi = $api['api_id'];
        $apiKey = $api['api_key'];
        
        foreach ($invoices as $invoice) {
          $postData = [
              'username' => $userdigi,
              'buyer_sku_code' => $invoice['kode_produk'],
              'customer_no' => ($invoice['server'] === 'NoServer') ? strval($invoice['uid']) : strval($invoice['uid']) . strval($invoice['server']),
              'ref_id' => $invoice['order_id'],
              'sign' => md5($userdigi . $apiKey . strval($invoice['order_id'])),
          ];
          
          $ch = curl_init('https://api.digiflazz.com/v1/transaction');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
          curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
      
          $response = curl_exec($ch);
          $responseData = json_decode($response, true);
          
      
          curl_close($ch);
          
          if (isset($responseData['data'])) {
            
            $status_pembelian = $responseData['data']['status'];

            if ($status_pembelian === 'Sukses' || $status_pembelian === 'Gagal' || $status_pembelian === 'Proses') {
                $status_pembelian_digi = $status_pembelian;
            } else {
                $status_pembelian_digi = 'Proses';
            }
            
              $orderData = [
                  'note' => $responseData['data']['sn'] ?: $responseData['data']['message'],
                  'status_pembelian' => $status_pembelian_digi,
              ];
      
              $pembelianModel->update($invoice['id'], $orderData);
              
              /*if ($status_pembelian === 'Gagal') {
                  $users = $userModel->where('id', $invoice['user_id'])->first();
                  $balanceData = [
                      'balance' => $users['balance'] + $invoice['harga_jual'],
                      //'note' => $note,
                      ];
                      $userModel->where('id', $invoice['user_id'])->set($balanceData)->update();
              }*/
              
              $whatsappMessage = "*{$settings['web_title']}*\n\n";
              $whatsappMessage .= "*Detail Pesanan*\n";
              $whatsappMessage .= "---------------------------\n";
              $whatsappMessage .= "*Invoice*: {$invoice['order_id']}\n";
              $whatsappMessage .= "*Produk*: {$invoice['produk']}\n";
              $hargaProduk = number_format($invoice['total_pembayaran'], 0, ',', '.');
              $whatsappMessage .= "*Harga*: Rp {$hargaProduk}\n";
              $whatsappMessage .= "*Status*: {$responseData['data']['status']}\n";
              $whatsappMessage .= "---------------------------\n\n";
              $whatsappMessage .= "*Data Tujuan*\n";
              $whatsappMessage .= "---------------------------\n";
              $whatsappMessage .= "*UID*: {$invoice['uid']}\n";
              $whatsappMessage .= "*Server*: {$invoice['server']}\n";
              $whatsappMessage .= "*Nickname*: {$invoice['nama_target']}\n";
              $whatsappMessage .= "---------------------------\n\n";
              $whatsappMessage .= "*Lihat Pesanan*\n" . base_url('/invoice/' . $invoice['order_id']) . "\n\n";
              $whatsappMessage .= "*Terimakasih!*";
              
              $whatsapp = $invoice['nomor_whatsapp'];
              $this->sendUserWhatsappMessage($whatsapp, $whatsappMessage);
              
              
              $whatsappAdminMessage = "*Admin {$settings['web_title']}*\n\n";
              $whatsappAdminMessage .= "*Detail Pesanan Pembeli*\n";
              $whatsappAdminMessage .= "---------------------------\n";
              $whatsappAdminMessage .= "*Invoice*: {$invoice['order_id']}\n";
              $whatsappAdminMessage .= "*Produk*: {$invoice['produk']}\n";
              $hargaProduk = number_format($invoice['total_pembayaran'], 0, ',', '.');
              $whatsappAdminMessage .= "*Harga*: Rp {$hargaProduk}\n";
              $whatsappAdminMessage .= "*Status*: {$responseData['data']['status']}\n";
              $whatsappAdminMessage .= "---------------------------\n\n";
              $whatsappAdminMessage .= "*Data Tujuan*\n";
              $whatsappAdminMessage .= "---------------------------\n";
              $whatsappAdminMessage .= "*UID*: {$invoice['uid']}\n";
              $whatsappAdminMessage .= "*Server*: {$invoice['server']}\n";
              $whatsappAdminMessage .= "*Nickname*: {$invoice['nama_target']}\n";
              $whatsappAdminMessage .= "---------------------------\n\n";
              $whatsappAdminMessage .= "*Lihat Pesanan*\n" . base_url('/invoice/' . $invoice['order_id']) . "\n\n";
              $whatsappAdminMessage .= "*Terimakasih!*";
              
              $whatsappAdmin = $settings['whatsapp_admin'];
              
              $this->sendAdminWhatsappMessage($whatsappAdmin, $whatsappAdminMessage);
              
              $result = ['success' => true, 'message' => 'Update Pembelian sukses.'];
          } else {
              return $this->response->setJSON(["status" => "error", "message" => "Gagal mendapatkan data dari provider."]);
          }
        }
    }
    
    public function getProdukRG()
    {
        $settings = $this->getSettingsData();
        
        $apiProviderModel = new ApiProviderModel();
        $api = $apiProviderModel->where('kode', 'RG')->first();
        $apiKey = $api['api_key'];
        
        $data = [
            'api_key' => $apiKey,
        ];
    
        $url = 'https://server.rgmoba.com/api/get/games';
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    
        $result = curl_exec($ch);
        $data_result = json_decode($result, true);
        
        
        
        $indeks=0; 
        while($indeks < count($data_result['data'])){ 
        $MlbbKategori = new MlbbKategori();

             $insertData = [
                'provider_id' => $data_result['data'][$indeks]['id'],
                'kode' => $data_result['data'][$indeks]['code'],
                'games' => $data_result['data'][$indeks]['game'],
                'serial' => $data_result['data'][$indeks]['serial'],
                'status' => $data_result['data'][$indeks]['status'],
            ];
            
            $checkData = $MlbbKategori->where('provider_id', $data_result['data'][$indeks]['id'])->first();
            if($checkData['provider_id'] == $data_result['data'][$indeks]['id']) {
               $MlbbKategori->update($checkData['provider_id'], $insertData); 
            } else {
               $MlbbKategori->insert($insertData);    
            }
            
            $kategoriID = $data_result['data'][$indeks]['id'];
    
        

          $get = [
                'api_key' => $apiKey,
                'game' => $data_result['data'][$indeks]['code'],
            ];
        
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://server.rgmoba.com/api/get/durasi');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $get);
            
            $respon = curl_exec($ch);
            $data_respon = json_decode($respon, true);
            $indeks++; 
            while($indeks < count($data_respon['data'])){ 
            $MlbbLayanan = new MlbbLayanan();    
            $profit = ($data_respon['data'][$indeks]['harga'] * $api['profit'] / 100);
            $profitBasic = ($data_respon['data'][$indeks]['harga'] * $api['profit_basic'] / 100);
            $profitGold = ($data_respon['data'][$indeks]['harga'] * $api['profit_gold'] / 100);
            $profitPlatinum = ($data_respon['data'][$indeks]['harga'] * $api['profit_platinum'] / 100);
            
            
            $insertData2 = [
                'kategori_id' => $kategoriID,
                'layanan_id' => $data_respon['data'][$indeks]['id'],
                'kode' => $data_respon['data'][$indeks]['games'],
                'durasi' => $data_respon['data'][$indeks]['durasi'],
                'tipe' => 'Days/Hari',
                'harga_provider' => $data_respon['data'][$indeks]['harga'],
                //'potongan' => $data_respon['data'][$indeks]['potongan'],
                'harga_jual' => $data_respon['data'][$indeks]['harga'] + $profit,
                'harga_basic' => $data_respon['data'][$indeks]['harga'] + $profitBasic,
                'harga_gold' => $data_respon['data'][$indeks]['harga'] + $profitGold,
                'harga_platinum' => $data_respon['data'][$indeks]['harga'] + $profitPlatinum,
                'keuntungan' => $profit,
                'keuntungan_basic' => $profitBasic,
                'keuntungan_gold' => $profitGold,
                'keuntungan_platinum' => $profitPlatinum,
                'status' => 'aktif',
                'provider' => 'RG',
            ];
            
            $checkData2 = $MlbbLayanan->where('layanan_id', $data_respon['data'][$indeks]['id'])->first();
            if($checkData2['layanan_id'] == $data_respon['data'][$indeks]['id']) {
               $MlbbLayanan->update($checkData2['layanan_id'], $insertData2); 
            } else {
               $MlbbLayanan->insert($insertData2);    
            }
        
             $indeks++; 
            }
            
            
            
        }
        
        $produk = $MlbbLayanan->findAll();
    
            if (empty($produk)) {
                session()->setFlashdata('info', "Tidak ada layanan yang berhasil diambil.");
                return redirect()->to('admin/api-provider');
            } else {
                session()->setFlashdata('success', "Berhasil mengambil data dan menyimpannya ke database.");
                return redirect()->to('admin/api-provider');
            }
            
      

    }

    
    public function updateStatusAg()
    {
        $settings = $this->getSettingsData();
        
        $apiProviderModel = new ApiProviderModel();
        $api = $apiProviderModel->where('kode', 'AG')->first();
        
        $pembelianModel = new PembelianModel();
        /*$userModel = new UserModel();*/
        
        $status = ['Proses'];
        $invoices = $pembelianModel
                    ->whereIn('status_pembelian', $status)
                    ->findAll();
    
        $merchant_id = $api['api_id'];
        $secret_key = $api['api_key'];
        
        foreach ($invoices as $invoice) {
          $postData = [
              'ref_id' => $invoice['order_id'],
              'merchant_id' => $merchant_id,
              'signature' => md5($merchant_id . ':' . $secret_key . ':' . $invoice['order_id']),
          ];
          
          $ch = curl_init('https://v1.apigames.id/v2/transaksi/status');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
          curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
      
          $response = curl_exec($ch);
          $responseData = json_decode($response, true);
          
      
          curl_close($ch);
          
          if (isset($responseData['data'])) {
            
              $status_pembelian = $responseData['data']['status'];
              
              if ($status_pembelian == 'Sukses') {
                  $status_provider = 'Sukses';
              } elseif ($status_pembelian == 'Gagal') {
                  $status_provider = 'Gagal';
              } else {
                  $status_provider = 'Proses';
              }
            
              $orderData = [
                  'note' => $responseData['data']['sn'],
                  'status_pembelian' => $status_provider,
              ];
      
              $pembelianModel->update($invoice['id'], $orderData);
              
              /*if ($status_pembelian === 'Gagal') {
                  $users = $userModel->where('id', $invoice['user_id'])->first();
                  $balanceData = [
                      'balance' => $users['balance'] + $invoice['harga_jual'],
                      //'note' => $note,
                      ];
                      $userModel->where('id', $invoice['user_id'])->set($balanceData)->update();
              }*/
              
              $whatsappMessage = "*{$settings['web_title']}*\n\n";
              $whatsappMessage .= "*Detail Pesanan*\n";
              $whatsappMessage .= "---------------------------\n";
              $whatsappMessage .= "*Invoice*: {$invoice['order_id']}\n";
              $whatsappMessage .= "*Produk*: {$invoice['produk']}\n";
              $hargaProduk = number_format($invoice['total_pembayaran'], 0, ',', '.');
              $whatsappMessage .= "*Harga*: Rp {$hargaProduk}\n";
              $whatsappMessage .= "*Status*: {$status_provider}\n";
              $whatsappMessage .= "---------------------------\n\n";
              $whatsappMessage .= "*Data Tujuan*\n";
              $whatsappMessage .= "---------------------------\n";
              $whatsappMessage .= "*UID*: {$invoice['uid']}\n";
              $whatsappMessage .= "*Server*: {$invoice['server']}\n";
              $whatsappMessage .= "*Nickname*: {$invoice['nama_target']}\n";
              $whatsappMessage .= "---------------------------\n\n";
              $whatsappMessage .= "*Lihat Pesanan*\n" . base_url('/invoice/' . $invoice['order_id']) . "\n\n";
              $whatsappMessage .= "*Terimakasih!*";
              
              $whatsapp = $invoice['nomor_whatsapp'];
              $this->sendUserWhatsappMessage($whatsapp, $whatsappMessage);
              
              
              $whatsappAdminMessage = "*Admin {$settings['web_title']}*\n\n";
              $whatsappAdminMessage .= "*Detail Pesanan Pembeli*\n";
              $whatsappAdminMessage .= "---------------------------\n";
              $whatsappAdminMessage .= "*Invoice*: {$invoice['order_id']}\n";
              $whatsappAdminMessage .= "*Produk*: {$invoice['produk']}\n";
              $hargaProduk = number_format($invoice['total_pembayaran'], 0, ',', '.');
              $whatsappAdminMessage .= "*Harga*: Rp {$hargaProduk}\n";
              $whatsappAdminMessage .= "*Status*: {$responseData['data']['status']}\n";
              $whatsappAdminMessage .= "---------------------------\n\n";
              $whatsappAdminMessage .= "*Data Tujuan*\n";
              $whatsappAdminMessage .= "---------------------------\n";
              $whatsappAdminMessage .= "*UID*: {$invoice['uid']}\n";
              $whatsappAdminMessage .= "*Server*: {$invoice['server']}\n";
              $whatsappAdminMessage .= "*Nickname*: {$invoice['nama_target']}\n";
              $whatsappAdminMessage .= "---------------------------\n\n";
              $whatsappAdminMessage .= "*Lihat Pesanan*\n" . base_url('/invoice/' . $invoice['order_id']) . "\n\n";
              $whatsappAdminMessage .= "*Terimakasih!*";
              
              $whatsappAdmin = $settings['whatsapp_admin'];
              
              $this->sendAdminWhatsappMessage($whatsappAdmin, $whatsappAdminMessage);
              
              $result = ['success' => true, 'message' => 'Update Pembelian sukses.'];
          } else {
              return $this->response->setJSON(["status" => "error", "message" => "Gagal mendapatkan data dari provider."]);
          }
        }
    }
    
    public function refundOrder ()
    {
        $pembelianModel = new PembelianModel();
        $status = ['Gagal'];
        $invoices = $pembelianModel
                    ->whereIn('status_pembelian', $status)
                    ->where('status_refund', 'gagal')
                    ->findAll();
        
        foreach ($invoices as $invoice)
        {
            $userModel = new UserModel();
            $user = $userModel->find($invoice['user_id']);
            if($user) {
                $saldoAwal = $user['balance'];
                $newBalance = $saldoAwal + $invoice['harga_jual'];
                
                $updateBalance = $userModel->update($invoice['user_id'], ['balance' => $newBalance]);
                
                $data = [
                    'note' => 'Saldo Sudah Di Kembalikan',
                    'status_refund' => 'berhasil'
                ];
    
                $pembelianModel->update($invoice['id'], $data);
                
                $result = ['success' => true, 'message' => 'Update status refund Order ID : ' . $invoice['order_id'] . ' berhasil.'];
                echo json_encode($result);
            } else {
                $result = ['status' => false, 'message' => 'Pengguna tidak di temukan'];
                echo json_encode($result);
            }
        }
    }
    
    private function sendUserWhatsappMessage($whatsapp, $whatsappMessage)
    {

        $apiProviderModel = new ApiProviderModel();
        $api = $apiProviderModel->where('kode', 'Ft')->first();
        
        $curl = curl_init();
    
        $data = array(
            'target' => $whatsapp,
            'message' => $whatsappMessage,
        );
    
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array('Authorization: ' . $api['api_key']),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        
        return $response;
    }
    
    private function sendAdminWhatsappMessage($whatsappAdmin, $whatsappAdminMessage)
    {

        $apiProviderModel = new ApiProviderModel();
        $api = $apiProviderModel->where('kode', 'Ft')->first();
        
        $curl = curl_init();
    
        $data = array(
            'target' => $whatsappAdmin,
            'message' => $whatsappAdminMessage,
        );
    
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array('Authorization: ' . $api['api_key']),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        
        return $response;
    }
    
}