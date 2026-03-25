<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Models\BannerModel;
use App\Models\GamesModel;
use App\Models\KategoriModel;
use App\Models\MlbbKategori;
use App\Models\MlbbLayanan;
use App\Models\ProdukModel;
use App\Models\BeritaModel;
use App\Models\MetodePembayaranModel;
use App\Controllers\BaseController;

class Tambah extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }
  
    public function tambahBanner()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        if ($this->request->getMethod() === 'post') {
            $bannerModel = new BannerModel();
            $gambar = $this->request->getFile('gambar');
    
            if ($gambar->isValid() && !$gambar->hasMoved()) {
                $gambar->move(ROOTPATH . 'public/img/banner/');
    
                $data = [
                    'gambar' => $gambar->getName(),
                    'tipe' => $this->request->getPost('tipe'),
                    'pesan' => $this->request->getPost('pesan'),
                ];
    
                $bannerModel->insert($data);
    
                session()->setFlashdata('success', 'Banner berhasil ditambahkan.');
            } else {
                session()->setFlashdata('error', 'Gagal mengunggah gambar.');
            }
    
            return redirect()->to('admin/banner');
        }
    }
    
    public function tambahMetode()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        if ($this->request->getMethod() === 'post') {
            $model = new MetodePembayaranModel();
            $gambar = $this->request->getFile('gambar');

            if ($gambar->isValid() && !$gambar->hasMoved()) {
                $gambar->move(ROOTPATH . 'public/img/metode/');
                $data = [
                    'gambar' => $gambar->getName(),
                    'nama' => $this->request->getPost('nama'),
                    'keterangan' => $this->request->getPost('keterangan'),
                    'kode' => $this->request->getPost('kode'),
                    'kategori' => $this->request->getPost('kategori'),
                ];

                $model->insert($data);

                session()->setFlashdata('success', 'Metode pembayaran berhasil ditambahkan.');
            } else {
                session()->setFlashdata('error', 'Gagal mengunggah gambar.');
            }

            return redirect()->to('admin/metode-pembayaran');
        }

    }
    
    public function tambahKategori()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        if ($this->request->getMethod() === 'post') {
            $kategoriModel = new KategoriModel();

            $data = [
                'nama' => $this->request->getPost('nama'),
            ];

            $kategoriModel->insert($data);

            session()->setFlashdata('success', 'Kategori berhasil ditambahkan.');

        return redirect()->to('admin/kategori');
        }
    }
    
    public function tambahMlbbKategori()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        if ($this->request->getMethod() === 'post') {
            $MlbbKategori = new MlbbKategori();

            $data = [
                'provider_id' => $this->request->getPost('pid'),
                'kode' => $this->request->getPost('kode'),
                'games' => $this->request->getPost('games'),
                'serial' => 'No',
                'status' => 'Safe',
            ];

            $MlbbKategori->insert($data);

            session()->setFlashdata('success', 'Kategori berhasil ditambahkan.');

        return redirect()->to('admin/mlbbkategori');
        }
    }
    
    public function tambahGames()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        if ($this->request->getMethod() === 'post') {
            $gamesModel = new GamesModel();
            $gambar = $this->request->getFile('gambar');
            $banner = $this->request->getFile('banner');
            $nama = $this->request->getPost('nama');
            $slug = $this->createSlug($nama);

            if ($gambar->isValid() && !$gambar->hasMoved()) {
              $gambar->move(ROOTPATH . 'public/img/games/');
              if ($banner->isValid() && !$banner->hasMoved()) {
                $banner->move(ROOTPATH . 'public/img/games/');
                  
                $data = [
                    'gambar' => $gambar->getName(),
                    'banner' => $banner->getName(),
                    'nama' => $this->request->getPost('nama'),
                    'sub_nama' => $this->request->getPost('sub_nama'),
                    'brand' => $this->request->getPost('brand'),
                    'slug' => $slug,
                    'kategori' => $this->request->getPost('kategori'),
                    'tipe' => $this->request->getPost('tipe'),
                    'informasi' => $this->request->getPost('informasi'),
                    'panduan' => $this->request->getPost('panduan'),
                    'tipe_target' => $this->request->getPost('tipe_target'),
                    'validasi_status' => $this->request->getPost('validasi_status'),
                    'validasi_kode' => $this->request->getPost('validasi_kode'),
                ];

                $gamesModel->insert($data);

                session()->setFlashdata('success', 'Games berhasil ditambahkan.');

              } else {
                session()->setFlashdata('error', 'Gagal mengunggah banner.');
              }
            } else {
              session()->setFlashdata('error', 'Gagal mengunggah gambar.');
            }

            return redirect()->to('admin/games');
        }

    }
    
    private function createSlug($nama)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $slug = url_title($nama, '-', true);
        $gamesModel = new GamesModel();
    
        $suffix = '';
        $counter = 1;
    
        while ($gamesModel->where('slug', $slug . $suffix)->first() !== null) {
            $suffix = '-' . $counter;
            $counter++;
        }
    
        return $slug . $suffix;
    }
    
    public function tambahProduk()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'nama'           => 'required|max_length[255]',
                'brand'          => 'required|max_length[120]',
                'harga_provider' => 'required|decimal|greater_than_equal_to[0]',
                'harga_jual'     => 'required|decimal|greater_than_equal_to[0]',
                'kode_produk'    => 'required|max_length[120]',
                'provider'       => 'required|in_list[Vip,DF,RG,Manual]',
            ];

            if (! $this->validate($rules)) {
                return redirect()->to('admin/produk')->withInput()->with('errors', $this->validator->getErrors());
            }

            $produkModel = new ProdukModel();
            
            $logo = $this->request->getFile('logo');
            $kodeProduk = $this->request->getPost('kode_produk');
    
            $existingProduk = $produkModel->where('kode_produk', $kodeProduk)->first();
    
            if ($existingProduk) {
                session()->setFlashdata('error', 'Kode produk sudah ada, silakan gunakan kode yang lain.');
                return redirect()->to('admin/produk');
            }
            
            if ($logo->isValid() && !$logo->hasMoved()) {
              $logo->move(ROOTPATH . 'public/img/produk/');
              
                $data = [
                    'logo' => $logo->getName(),
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
                    'kode_produk' => $kodeProduk,
                    'status' => $this->request->getPost('status'),
                    'provider' => $this->request->getPost('provider'),
                    'sts_flash_sale' => $this->request->getPost('sts_flash_sale'),
                    'persen_diskon' => $this->request->getPost('persen_diskon'),
                    'harga_fs' => $this->request->getPost('harga_fs'),
                    'harga_fs_basic' => $this->request->getPost('harga_fs_basic'),
                    'harga_fs_gold' => $this->request->getPost('harga_fs_gold'),
                    'harga_fs_platinum' => $this->request->getPost('harga_fs_platinum'),
                    'waktu_akhir_fs' => $this->request->getPost('waktu_akhir_fs'),
                ];
                
                $produkModel->insert($data);
                session()->setFlashdata('success', 'Produk berhasil ditambahkan.');
            } else {
              session()->setFlashdata('error', 'Gagal mengunggah logo.');
            }
    
            return redirect()->to('admin/produk');
        }
    }
    
    public function tambahBerita()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        if ($this->request->getMethod() === 'post') {
            $beritaModel = new BeritaModel();
            $gambar = $this->request->getFile('gambar');
            $judul = $this->request->getPost('judul');
            $slug = $this->createSlug($judul);

            if ($gambar->isValid() && !$gambar->hasMoved()) {
                $gambar->move(ROOTPATH . 'public/img/berita/');
                $data = [
                    'gambar' => $gambar->getName(),
                    'judul' => $this->request->getPost('judul'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'slug' => $slug,
                ];

                $beritaModel->insert($data);

                session()->setFlashdata('success', 'Berita berhasil ditambahkan.');
            } else {
                session()->setFlashdata('error', 'Gagal mengunggah gambar.');
            }

            return redirect()->to('admin/berita');
        }

    }
    
    private function createSlugBerita($judul)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $slug = url_title($judul, '-', true);
        $beritaModel = new BeritaModel();
    
        $suffix = '';
        $counter = 1;
    
        while ($beritaModel->where('slug', $slug . $suffix)->first() !== null) {
            $suffix = '-' . $counter;
            $counter++;
        }
    
        return $slug . $suffix;
    }
    
}