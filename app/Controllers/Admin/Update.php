<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Models\PembelianModel;
use App\Models\ProdukModel;
use App\Models\WebsiteModel;
use App\Models\TemaModel;
use App\Models\GamesModel;
use App\Models\KontakModel;
use App\Models\TopupModel;
use App\Models\ApiProviderModel;
use App\Models\BeritaModel;
use App\Models\MetodePembayaranModel;
use App\Controllers\BaseController;

class Update extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        $this->websiteModel = new WebsiteModel();
        $this->temaModel = new TemaModel();
        $this->kontakModel = new KontakModel();
    }
    
    public function updateWebsite()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $validationRules = [
            'web_title' => 'required',
            'web_author' => 'required',
            'web_keywords' => 'required',
            'web_description' => 'required',
            'web_icon' => 'max_size[web_icon,1024]|ext_in[web_icon,png,webp]',
            'web_logo' => 'max_size[web_logo,1024]|ext_in[web_logo,png,jpg,jpeg,gif,webp]',
        ];
    
        if (!$this->validate($validationRules)) {
            return redirect()->to(base_url('admin/website'))->withInput()->with('errors', $this->validator->getErrors());
        }
    
        $settings = $this->websiteModel->first();
    
        $webIcon = $this->request->getFile('web_icon');
        if ($webIcon->isValid()) {
            $webIconName = $webIcon->getRandomName();
            $webIcon->move(ROOTPATH . 'public/img/web/', $webIconName);
    
            if (!empty($settings['web_icon'])) {
                $oldWebIconPath = ROOTPATH . 'public/img/web/' . $settings['web_icon'];
                if (file_exists($oldWebIconPath)) {
                    unlink($oldWebIconPath);
                }
            }
    
            $this->websiteModel->update($settings['id'], ['web_icon' => $webIconName]);
        }
    
        $webLogo = $this->request->getFile('web_logo');
        if ($webLogo->isValid()) {
            $webLogoName = $webLogo->getRandomName();
            $webLogo->move(ROOTPATH . 'public/img/web/', $webLogoName);
    
            if (!empty($settings['web_logo'])) {
                $oldWebLogoPath = ROOTPATH . 'public/img/web/' . $settings['web_logo'];
                if (file_exists($oldWebLogoPath)) {
                    unlink($oldWebLogoPath);
                }
            }
            
            $this->websiteModel->update($settings['id'], ['web_logo' => $webLogoName]);
        }
    
        $this->websiteModel->update($settings['id'], [
            'web_title' => $this->request->getPost('web_title'),
            'web_author' => $this->request->getPost('web_author'),
            'web_keywords' => $this->request->getPost('web_keywords'),
            'web_description' => $this->request->getPost('web_description'),
            'whatsapp_admin' => $this->request->getPost('whatsapp_admin'),
            'instagram' => $this->request->getPost('instagram'),
            'tiktok' => $this->request->getPost('tiktok'),
            'whatsapp_cs' => $this->request->getPost('whatsapp_cs'),
            'email' => $this->request->getPost('email'),
        ]);
        
        session()->setFlashdata('success', 'Data berhasil diperbarui');
    
        return redirect()->to(base_url('admin/website'));
    }
    
    public function updateTema()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $validationRules = [
            'text_color' => 'required',
            'background_color' => 'required',
            'border_color' => 'required',
        ];
    
        if (!$this->validate($validationRules)) {
            return redirect()->to(base_url('admin/tema'))->withInput()->with('errors', $this->validator->getErrors());
        }
    
        $tema = $this->websiteModel->first();
    
        $this->temaModel->update($tema['id'], [
            'text_color' => $this->request->getPost('text_color'),
            'background_color' => $this->request->getPost('background_color'),
            'border_color' => $this->request->getPost('border_color'),
        ]);
        
        session()->setFlashdata('success', 'Tema berhasil diperbarui');
    
        return redirect()->to(base_url('admin/tema'));
    }
    
    public function updateProduk($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $produkModel = new ProdukModel();
        $produk = $produkModel->find($id);
    
        if ($produk) {
          $logo = $this->request->getFile('logo');
          
          if ($logo && $logo->isValid() && !$logo->hasMoved() && $logo->move(ROOTPATH . '/public/img/produk/')) {
                $data['logo'] = $logo->getName();
            } else {
                $data['logo'] = $produk['logo'];
            }
            
            $sts_flash_sale = $this->request->getPost('sts_flash_sale');
            $sts_flash_sale_post = ($sts_flash_sale === 'Ya') ? 'Ya' : 'No';
          
            $dataUpdate = [
                'nama' => $this->request->getPost('nama'),
                'brand' => $this->request->getPost('brand'),
                'tipe' => $this->request->getPost('tipe'),
                'harga_provider' => $this->request->getPost('harga_provider'),
                'harga_jual' => $this->request->getPost('harga_jual'),
                'harga_basic' => $this->request->getPost('harga_basic'),
                'harga_gold' => $this->request->getPost('harga_gold'),
                'harga_platinum' => $this->request->getPost('harga_platinum'),
                'keuntungan' => $this->request->getPost('keuntungan'),
                'keuntungan_basic' => $this->request->getPost('keuntungan_basic'),
                'keuntungan_gold' => $this->request->getPost('keuntungan_gold'),
                'keuntungan_platinum' => $this->request->getPost('keuntungan_platinum'),
                'kode_produk' => $this->request->getPost('kode_produk'),
                'status' => $this->request->getPost('status'),
                'provider' => $this->request->getPost('provider'),
                'sts_flash_sale' => $sts_flash_sale_post,
                'persen_diskon' => $this->request->getPost('persen_diskon'),
                'harga_fs' => $this->request->getPost('harga_fs'),
                'harga_fs_basic' => $this->request->getPost('harga_fs_basic'),
                'harga_fs_gold' => $this->request->getPost('harga_fs_gold'),
                'harga_fs_platinum' => $this->request->getPost('harga_fs_platinum'),
                'waktu_akhir_fs' => $this->request->getPost('waktu_akhir_fs'),
                'logo' => $data['logo'],
            ];
    
            $produkModel->update($id, $dataUpdate);
            session()->setFlashdata('success', 'Produk berhasil diupdate');
        } else {
            session()->setFlashdata('error', 'Produk tidak ditemukan');
        }
        
        return redirect()->to(base_url('admin/produk/'));
    }
    
    public function updatePembelian($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $pembelianModel = new PembelianModel();
        $pembelian = $pembelianModel->find($id);
    
        if ($pembelian) {
            $dataUpdate = [
                'status_pembelian' => $this->request->getPost('status_pembelian'),
                'status_pembayaran' => $this->request->getPost('status_pembayaran'),
                'note' => $this->request->getPost('note'),
            ];
    
            $pembelianModel->update($id, $dataUpdate);
            session()->setFlashdata('success', 'Data pembelian berhasil diupdate');
            
            $settings = $this->getSettingsData();
            
            $whatsappMessage = "*{$settings['web_title']}*\n\n";
            $whatsappMessage .= "*Detail Pesanan*\n";
            $whatsappMessage .= "---------------------------\n";
            $whatsappMessage .= "*Invoice*: {$pembelian['order_id']}\n";
            $whatsappMessage .= "*Produk*: {$pembelian['produk']}\n";
            $hargaProduk = number_format($pembelian['total_pembayaran'], 0, ',', '.');
            $whatsappMessage .= "*Harga*: Rp {$hargaProduk}\n";
            $whatsappMessage .= "*Status*: {$this->request->getPost('status_pembelian')}\n";
            $whatsappMessage .= "---------------------------\n\n";
            $whatsappMessage .= "*Data Tujuan*\n";
            $whatsappMessage .= "---------------------------\n";
            $whatsappMessage .= "*ID*: {$pembelian['uid']}\n";
            if ($pembelian['server'] !== 'NoServer') {
                $whatsappMessage .= "*Server*: {$pembelian['server']}\n";
            }
            if ($pembelian['nama_target'] !== 'Off') {
                $whatsappMessage .= "*Nickname*: {$pembelian['nama_target']}\n";
            }
            $whatsappMessage .= "---------------------------\n\n";
            $whatsappMessage .= "*Lihat Pesanan*\n" . base_url('/invoice/' . $pembelian['order_id']) . "\n\n";
            $whatsappMessage .= "*Terimakasih!*";
            
            $whatsapp = $pembelian['nomor_whatsapp'];
            $this->sendUserWhatsappMessage($whatsapp, $whatsappMessage);
            
        } else {
            session()->setFlashdata('error', 'Data pembelian tidak ditemukan');
        }
        
        return redirect()->to(base_url('admin/pembelian/'));
    }
    
    public function updateGames($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $gamesModel = new GamesModel();
        $games = $gamesModel->find($id);
    
        if ($games) {
            $gambar = $this->request->getFile('gambar');
            $banner = $this->request->getFile('banner');
    
            if ($gambar && $gambar->isValid() && !$gambar->hasMoved() && $gambar->move(ROOTPATH . 'public/img/games/')) {
                $data['gambar'] = $gambar->getName();
            } else {
                $data['gambar'] = $games['gambar'];
            }
    
            if ($banner && $banner->isValid() && !$banner->hasMoved() && $banner->move(ROOTPATH . 'public/img/games/')) {
                $data['banner'] = $banner->getName();
            } else {
                $data['banner'] = $games['banner'];
            }
    
            $dataUpdate = [
                'nama' => $this->request->getPost('nama'),
                'sub_nama' => $this->request->getPost('sub_nama'),
                'brand' => $this->request->getPost('brand'),
                'slug' => $this->request->getPost('slug'),
                'kategori' => $this->request->getPost('kategori'),
                'tipe' => $this->request->getPost('tipe'),
                'informasi' => $this->request->getPost('informasi'),
                'panduan' => $this->request->getPost('panduan'),
                'tipe_target' => $this->request->getPost('tipe_target'),
                'validasi_status' => $this->request->getPost('validasi_status'),
                'validasi_kode' => $this->request->getPost('validasi_kode'),
                'gambar' => $data['gambar'],
                'banner' => $data['banner'],
            ];
    
            $gamesModel->update($id, $dataUpdate);
    
            session()->setFlashdata('success', 'Games berhasil diperbarui.');
        } else {
            session()->setFlashdata('error', 'Games tidak ditemukan');
        }
    
        return redirect()->to(base_url('admin/games'));
    }
    
    public function updateApiProvider($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $apiProviderModel = new ApiProviderModel();
        $apiProvider = $apiProviderModel->find($id);
    
        if ($apiProvider) {
            $dataUpdate = [
                'api_id' => $this->request->getPost('api_id'),
                'api_key' => $this->request->getPost('api_key'),
                'private_key' => $this->request->getPost('private_key'),
                'profit' => $this->request->getPost('profit'),
                'profit_basic' => $this->request->getPost('profit_basic'),
                'profit_gold' => $this->request->getPost('profit_gold'),
                'profit_platinum' => $this->request->getPost('profit_platinum'),
            ];
    
            $apiProviderModel->update($id, $dataUpdate);
            session()->setFlashdata('success', 'Api provider berhasil diupdate');
        } else {
            session()->setFlashdata('error', 'Api provider tidak ditemukan');
        }
        
        return redirect()->to(base_url('admin/api-provider'));
    }
    
    public function updateKontak()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $validationRules = [
            'informasi' => 'required',
        ];
    
        if (!$this->validate($validationRules)) {
            return redirect()->to(base_url('admin/kontak'))->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $kontak = $this->kontakModel->first();
    
        $this->kontakModel->update($kontak['id'], [
            'informasi' => $this->request->getPost('informasi'),
        ]);
    
        return redirect()->to(base_url('admin/kontak'))->with('success', 'Data berhasil diperbarui.');
    }
    
    public function updateUser($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $userModel = new UserModel();
    
        if ($this->request->getMethod() === 'post') {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'balance' => $this->request->getPost('balance'),
                'whatsapp' => $this->request->getPost('whatsapp'),
                'role' => $this->request->getPost('role'),
            ];
    
            $password = $this->request->getPost('password');
            if (!empty($password)) {
                $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            }
    
            $userModel->update($id, $data);
    
            return redirect()->to('admin/user')->with('success', 'User berhasil diupdate');
        }
    
        $user = $userModel->find($id);
    
        if (!$user) {
            return redirect()->to('admin/user')->with('error', 'User tidak ditemukan');
        }
    }
    
    public function updateTopup($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $topupModel = new TopupModel();
        $topup = $topupModel->find($id);
    
        if ($topup) {
            $dataUpdate = [
                'status' => $this->request->getPost('status'),
            ];
    
            $topupModel->update($id, $dataUpdate);
            session()->setFlashdata('success', 'Status Top Up berhasil diupdate');
        } else {
            session()->setFlashdata('error', 'Data Top Up tidak ditemukan');
        }
        
        return redirect()->to(base_url('admin/topup'));
    }
    
    public function updateMetode($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $metodeModel = new MetodePembayaranModel();
        $metode = $metodeModel->find($id);
    
        if ($metode) {
            $gambar = $this->request->getFile('gambar');
    
            if ($gambar && $gambar->isValid() && !$gambar->hasMoved() && $gambar->move(ROOTPATH . 'public/img/metode/')) {
                $data['gambar'] = $gambar->getName();
            } else {
                $data['gambar'] = $metode['gambar'];
            }
    
            $dataUpdate = [
                'nama' => $this->request->getPost('nama'),
                'keterangan' => $this->request->getPost('keterangan'),
                'kode' => $this->request->getPost('kode'),
                'kategori' => $this->request->getPost('kategori'),
                'gambar' => $data['gambar'],
            ];
    
            $metodeModel->update($id, $dataUpdate);
    
            session()->setFlashdata('success', 'Metode berhasil diperbarui.');
        } else {
            session()->setFlashdata('error', 'Metode tidak ditemukan');
        }
    
        return redirect()->to(base_url('admin/metode-pembayaran'));
    }
    
    public function updateBerita($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $beritaModel = new BeritaModel();
        $berita = $beritaModel->find($id);
    
        if ($berita) {
            $gambar = $this->request->getFile('gambar');
    
            if ($gambar && $gambar->isValid() && !$gambar->hasMoved() && $gambar->move(ROOTPATH . 'public/img/berita/')) {
                $data['gambar'] = $gambar->getName();
            } else {
                $data['gambar'] = $berita['gambar'];
            }
            
            $dataUpdate = [
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'gambar' => $data['gambar'],
            ];
    
            $beritaModel->update($id, $dataUpdate);
    
            session()->setFlashdata('success', 'Berita berhasil diperbarui.');
        } else {
            session()->setFlashdata('error', 'Berita tidak ditemukan');
        }
    
        return redirect()->to(base_url('admin/berita'));
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
    
}