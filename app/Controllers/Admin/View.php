<?php

namespace App\Controllers\Admin;

use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\MlbbKategori;
use App\Models\MlbbLayanan;
use App\Models\GamesModel;
use App\Models\BannerModel;
use App\Models\WebsiteModel;
use App\Models\TemaModel;
use App\Models\KontakModel;
use App\Models\UserModel;
use App\Models\TopupModel;
use App\Models\PembelianModel;
use App\Models\MetodePembayaranModel;
use App\Models\BeritaModel;
use App\Models\ApiProviderModel;
use App\Controllers\BaseController;

class View extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        $this->websiteModel = new WebsiteModel();
        $this->temaModel = new TemaModel();
        $this->kontakModel = new KontakModel();
        $this->userModel = new UserModel();
        $this->pembelianModel = new PembelianModel();
        $this->topupModel = new TopupModel();
        $this->produkModel = new ProdukModel();
        $this->gamesModel = new GamesModel();
        $this->kategoriModel = new KategoriModel();
        $this->metodePembayaranModel = new metodePembayaranModel();
        $this->beritaModel = new BeritaModel();
    }

    public function dashboard()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        // Transaksi Hari Ini
        $getRupiahPembelianSuksesToday = $this->pembelianModel->getTotalRupiahPembelianSuksesToday();
        $rupiahPembelianSuksesToday = $getRupiahPembelianSuksesToday;
        
        $getRupiahPembelianProsesToday = $this->pembelianModel->getTotalRupiahPembelianProsesToday();
        $rupiahPembelianProsesToday = $getRupiahPembelianProsesToday;
        
        $getRupiahPembelianPendingToday = $this->pembelianModel->getTotalRupiahPembelianPendingToday();
        $rupiahPembelianPendingToday = $getRupiahPembelianPendingToday;
        
        $getRupiahPembelianGagalToday = $this->pembelianModel->getTotalRupiahPembelianGagalToday();
        $rupiahPembelianGagalToday = $getRupiahPembelianGagalToday;
        
        $getTotalPembelianSuksesToday = $this->pembelianModel->getTotalPembelianSuksesToday();
        $totalPembelianSuksesToday = $getTotalPembelianSuksesToday;
        
        $getTotalPembelianProsesToday = $this->pembelianModel->getTotalPembelianProsesToday();
        $totalPembelianProsesToday = $getTotalPembelianProsesToday;
        
        $getTotalPembelianPendingToday = $this->pembelianModel->getTotalPembelianPendingToday();
        $totalPembelianPendingToday = $getTotalPembelianPendingToday;
        
        $getTotalPembelianGagalToday = $this->pembelianModel->getTotalPembelianGagalToday();
        $totalPembelianGagalToday = $getTotalPembelianGagalToday;
        
        $getTotalKeuntunganToday = $this->pembelianModel->getTotalKeuntunganToday();
        $totalKeuntunganToday = $getTotalKeuntunganToday;
        
        
        
        // Keseluruhan
        $getRupiahPembelianSukses = $this->pembelianModel->getTotalRupiahPembelianSukses();
        $rupiahPembelianSukses = $getRupiahPembelianSukses;
        
        $getRupiahPembelianProses = $this->pembelianModel->getTotalRupiahPembelianProses();
        $rupiahPembelianProses = $getRupiahPembelianProses;
        
        $getRupiahPembelianPending = $this->pembelianModel->getTotalRupiahPembelianPending();
        $rupiahPembelianPending = $getRupiahPembelianPending;
        
        $getRupiahPembelianGagal = $this->pembelianModel->getTotalRupiahPembelianGagal();
        $rupiahPembelianGagal = $getRupiahPembelianGagal;
        
        $getTotalPembelianSukses = $this->pembelianModel->getTotalPembelianSukses();
        $totalPembelianSukses = $getTotalPembelianSukses;
        
        $getTotalPembelianProses = $this->pembelianModel->getTotalPembelianProses();
        $totalPembelianProses = $getTotalPembelianProses;
        
        $getTotalPembelianPending = $this->pembelianModel->getTotalPembelianPending();
        $totalPembelianPending = $getTotalPembelianPending;
        
        $getTotalPembelianGagal = $this->pembelianModel->getTotalPembelianGagal();
        $totalPembelianGagal = $getTotalPembelianGagal;
        
        
        
        
        $getRupiahPembelian = $this->pembelianModel->getTotalRupiahPembelian();
        $rupiahPembelian = $getRupiahPembelian;
        
        
        
        $getTotalAmountTupupSukses = $this->topupModel->getTotalAmountTopupSukses();
        $totalAmountTupupSukses = $getTotalAmountTupupSukses;
        
        $getTotalTupupSukses = $this->topupModel->getTotalTopupSukses();
        $totalTupupSukses = $getTotalTupupSukses;
        
        $getTotalPembelian = $this->pembelianModel->getTotalPembelian();
        $totalPembelian = $getTotalPembelian;
        
        
        
        $getTotalKeuntungan = $this->pembelianModel->getTotalKeuntungan();
        $totalKeuntungan = $getTotalKeuntungan;
        
        $getTotalProduk = $this->produkModel->getTotalProduk();
        $totalProduk = $getTotalProduk;
        
        $getTotalMetode = $this->metodePembayaranModel->getTotalMetode();
        $totalMetode = $getTotalMetode;
        
        $getTotalGames = $this->gamesModel->getTotalGames();
        $totalGames = $getTotalGames;
        
        $getTotalKategori = $this->kategoriModel->getTotalKategori();
        $totalKategori = $getTotalKategori;
        
        $getTotalSaldoUser = $this->userModel->getTotalSaldoUser();
        $totalSaldoUser = $getTotalSaldoUser;
        
        $getTotalUser = $this->userModel->getTotalUsers();
        $totalUser = $getTotalUser;
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'rupiahPembelianSuksesToday' => $rupiahPembelianSuksesToday,
            'rupiahPembelianProsesToday' => $rupiahPembelianProsesToday,
            'rupiahPembelianPendingToday' => $rupiahPembelianPendingToday,
            'rupiahPembelianGagalToday' => $rupiahPembelianGagalToday,
            'totalPembelianSuksesToday' => $totalPembelianSuksesToday,
            'totalPembelianProsesToday' => $totalPembelianProsesToday,
            'totalPembelianPendingToday' => $totalPembelianPendingToday,
            'totalPembelianGagalToday' => $totalPembelianGagalToday,
            
            
            'rupiahPembelianSukses' => $rupiahPembelianSukses,
            'rupiahPembelianProses' => $rupiahPembelianProses,
            'rupiahPembelianPending' => $rupiahPembelianPending,
            'rupiahPembelianGagal' => $rupiahPembelianGagal,
            'totalPembelian' => $totalPembelian,
            'totalPembelianSukses' => $totalPembelianSukses,
            'totalPembelianProses' => $totalPembelianProses,
            'totalPembelianPending' => $totalPembelianPending,
            'totalPembelianGagal' => $totalPembelianGagal,
            
            'totalKeuntunganToday' => $totalKeuntunganToday,
            'rupiahPembelian' => $rupiahPembelian,
            
            
            
            'totalKeuntungan' => $totalKeuntungan,
            'totalAmountTupupSukses' => $totalAmountTupupSukses,
            'totalTupupSukses' => $totalTupupSukses,
            'totalSaldoUser' => $totalSaldoUser,
            'totalUser' => $totalUser,
            'totalProduk' => $totalProduk,
            'totalMetode' => $totalMetode,
            'totalGames' => $totalGames,
            'totalKategori' => $totalKategori,
        ];

        return view('admin/index', $data);
    }
    
    public function website()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $data['settings'] = $this->websiteModel->first();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'settings' => $data['settings'],
        ];

        return view('admin/pengaturan/website', $data);
    }
    
    public function tema()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $tema = $this->temaModel->first();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'tema' => $tema,
        ];

        return view('admin/pengaturan/tema', $data);
    }
    
    public function produk()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $produkModel = new ProdukModel();
        $produk = $produkModel->findAll();
        
        $gamesModel = new GamesModel();
        $games = $gamesModel->findAll();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'produk' => $produk,
            'games' => $games,
        ];

        return view('admin/produk/index', $data);
    }
    
    public function getProduk()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $model = new ProdukModel();
    
        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'];
    
        $totalProduk = $model->getTotalProduk();
        $filteredProduk = $model->searchProduk($search, $start, $length);
        $totalFilteredProduk = $model->getTotalProduk();
    
        $data = [
            'draw' => $draw,
            'recordsTotal' => $totalProduk,
            'recordsFiltered' => $totalFilteredProduk,
            'data' => $filteredProduk,
        ];
    
        return $this->response->setJSON($data);
    }
    
    public function getMlbbProduk()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $model = new MlbbLayanan();
    
        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'];
    
        $totalProduk = $model->getTotalProduk();
        $filteredProduk = $model->searchProduk($search, $start, $length);
        $totalFilteredProduk = $model->getTotalProduk();
    
        $data = [
            'draw' => $draw,
            'recordsTotal' => $totalProduk,
            'recordsFiltered' => $totalFilteredProduk,
            'data' => $filteredProduk,
        ];
    
        return $this->response->setJSON($data);
    }
    
    public function editProduk($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $produkModel = new ProdukModel();
        $produk = $produkModel->find($id);
        
        $gamesModel = new GamesModel();
        $games = $gamesModel->findAll();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'produk' => $produk,
            'games' => $games,
        ];
    
        return view('admin/produk/edit', $data);
    }
    
    public function banner()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $bannerModel = new BannerModel();
        $banner = $bannerModel->findAll();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'banner' => $banner,
        ];

        return view('admin/banner', $data);
    }
    
    public function topup()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
        ];

        return view('admin/topup/index', $data);
    }
    
    public function getTopup()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $topupModel = new TopupModel();
    
        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'];
    
        $totalTopup = $topupModel->getTotalTopupIndex();
        $filteredTopup = $topupModel->searchTopup($search, $start, $length);
        $totalFilteredTopup = $topupModel->getTotalTopupIndex();
    
        $data = [
            'draw' => $draw,
            'recordsTotal' => $totalTopup,
            'recordsFiltered' => $totalFilteredTopup,
            'data' => $filteredTopup,
        ];
    
        return $this->response->setJSON($data);
    }
    
    public function editTopup($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $topupModel = new TopupModel();
        $topup = $topupModel->find($id);
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'topup' => $topup,
        ];
    
        return view('admin/topup/edit', $data);
    }
    
    public function metode()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $metodePembayaranModel = new MetodePembayaranModel();
        $metode = $metodePembayaranModel->findAll();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'metode' => $metode,
        ];

        return view('admin/metode/index', $data);
    }
    
    public function editMetode($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $metodeModel = new MetodePembayaranModel();
        $metode = $metodeModel->find($id);
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'metode' => $metode,
        ];
    
        return view('admin/metode/edit', $data);
    }
    
    public function kategori()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/user');
        }
        
        $kategoriModel = new KategoriModel();
        $kategori = $kategoriModel->findAll();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'kategori' => $kategori,
        ];

        return view('admin/kategori', $data);
    }
    
    public function Mlbbkategori()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/user');
        }
        
        $MlbbKategori = new MlbbKategori();
        $kategori = $MlbbKategori->findAll();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'kategori' => $kategori,
        ];

        return view('admin/mlbbkategori', $data);
    }
    
    public function Mlbblayanan()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/user');
        }
        
        $MlbbLayanan = new MlbbLayanan();
        $layanan = $MlbbLayanan->findAll();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'layanan' => $layanan,
        ];

        return view('admin/mlbblayanan', $data);
    }
    
    public function games()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $gamesModel = new GamesModel();
        $games = $gamesModel->findAll();
        $kategoriModel = new KategoriModel();
        $kategori = $kategoriModel->findAll();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'games' => $games,
            'kategori' => $kategori,
        ];

        return view('admin/games/index', $data);
    }
    
    public function editGames($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $gamesModel = new GamesModel();
        $games = $gamesModel->find($id);
        
        $kategoriModel = new KategoriModel();
        $kategori = $kategoriModel->findAll();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'games' => $games,
            'kategori' => $kategori,
        ];
    
        return view('admin/games/edit', $data);
    }
    
    public function getGames()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $model = new GamesModel();
    
        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'];
    
        $totalGames = $model->getTotalGames();
        $filteredGames = $model->searchGames($search, $start, $length);
        $totalFilteredGames = $model->getTotalGames();
    
        $data = [
            'draw' => $draw,
            'recordsTotal' => $totalGames,
            'recordsFiltered' => $totalFilteredGames,
            'data' => $filteredGames,
        ];
    
        return $this->response->setJSON($data);
    }
    
    public function pembelian()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
        ];

        return view('admin/pembelian/index', $data);
    }
    
    public function getPembelian()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $pembelianModel = new PembelianModel();
    
        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'];
    
        $totalPembelian = $pembelianModel->getTotalPembelianIndex();
        $filteredPembelian = $pembelianModel->searchPembelian($search, $start, $length);
        $totalFilteredPembelian = $pembelianModel->getTotalPembelianIndex();
    
        $data = [
            'draw' => $draw,
            'recordsTotal' => $totalPembelian,
            'recordsFiltered' => $totalFilteredPembelian,
            'data' => $filteredPembelian,
        ];
    
        return $this->response->setJSON($data);
    }
    
    public function editPembelian($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $pembelianModel = new PembelianModel();
        $pembelian = $pembelianModel->find($id);
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'pembelian' => $pembelian,
        ];
    
        return view('admin/pembelian/edit', $data);
    }
    
    public function apiProvider()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $apiProviderModel = new ApiProviderModel();
        $api = $apiProviderModel->findAll();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'api' => $api,
            'systemKey' => trim((string) getenv('internal.systemKey')),
        ];

        return view('admin/api', $data);
    }
    
    public function user()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $userModel = new UserModel();
        $users = $userModel->findAll();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'users' => $users,
        ];

        return view('admin/user/index', $data);
    }
    
    public function getUser()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $userModel = new UserModel();
    
        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'];
    
        $totalUser = $userModel->getTotalUserIndex();
        $filteredUser = $userModel->searchUser($search, $start, $length);
        $totalFilteredUser = $userModel->getTotalUserIndex();
    
        $data = [
            'draw' => $draw,
            'recordsTotal' => $totalUser,
            'recordsFiltered' => $totalFilteredUser,
            'data' => $filteredUser,
        ];
    
        return $this->response->setJSON($data);
    }
    
    public function editUser($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $userModel = new UserModel();
        $user = $userModel->find($id);
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'user' => $user,
        ];
    
        return view('admin/user/edit', $data);
    }
    
    public function kontak()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $data['kontak'] = $this->kontakModel->first();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'kontak' => $data['kontak'],
        ];

        return view('admin/kontak', $data);
    }
    
    public function berita()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }
        
        $berita = $this->beritaModel->findAll();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'berita' => $berita,
        ];

        return view('admin/berita', $data);
    }
    
}