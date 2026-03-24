<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\KategoriModel;
use App\Models\ProdukModel;
use App\Models\GamesModel;
use App\Models\MlbbKategori;
use App\Models\MlbbLayanan;
use App\Models\BannerModel;
use App\Models\PembelianModel;
use App\Models\MetodePembayaranModel;
use App\Models\KontakModel;
use App\Models\BeritaModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\Response;
use CodeIgniter\Exceptions\PageNotFoundException;

class View extends BaseController
{
    protected $session;
    
    public function __construct()
    {
        $this->session = session();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $userLogin = $this->session->has('isLogin');
        $username = '';
        
        if ($userLogin) {
            $username = $this->session->get('username');
            $user = $this->userModel->where('username', $username)->first();
        } else {
            $user = null;
        }
        
        $bannerModel = new BannerModel();
        $popUp = $bannerModel->where('tipe', 'popup')->first();
        
        $kategoriModel = new KategoriModel();
        $kategori = $kategoriModel->findAll();
        
        $settings = $this->getSettingsData();
        $web = $settings;
    
        $data = [
            'web' => $web,
            'userLogin' => $userLogin,
            'user' => $user,
            'popUp' => $popUp,
            'kategori' => $kategori,
        ];
    
        return view('index', $data);
    }

    public function getBanners()
    {
        
        $bannerModel = new BannerModel();
        $banner = $bannerModel->where('tipe', 'slide')->findAll();
        
        return $this->response->setJSON($banner);
    }
    
    public function getFlashSale()
    {
        $produkModel = new ProdukModel();
        $currentDateTime = date('Y-m-d H:i:s');
        $produkFs = $produkModel->where('sts_flash_sale', 'Ya')
                                ->where('status', 'aktif')
                                ->where('waktu_akhir_fs >', $currentDateTime)
                                ->findAll();
                             
        $brandFs = array_column($produkFs, 'brand');
        
        $gamesModel = new GamesModel();
        $gamesFs = $gamesModel->whereIn('brand', $brandFs)->findAll();
        
        $data = [
            'produkFs' => $produkFs,
            'gamesFs' => $gamesFs
        ];
        
        return $this->response->setJSON($data);
    }
    
    public function getPopularGames()
    {
        $gamesModel = new GamesModel();
        $gamesPopuler = $gamesModel->where('tipe', 'Populer')->findAll();
        
        return $this->response->setJSON($gamesPopuler);
    }
    
    public function getGames()
    {
        $gamesModel = new GamesModel();
        $games = $gamesModel->findAll();
        
        return $this->response->setJSON($games);
    }

    public function getNews()
    {
        $beritaModel = new BeritaModel();
        $berita = $beritaModel->findAll();
        
        return $this->response->setJSON($berita);
    }
    
    public function buy($slug)
    {
        $userLogin = $this->session->has('isLogin');
        $username = '';
        $userRole = '';
        
        if ($userLogin) {
            $username = $this->session->get('username');
            $user = $this->userModel->where('username', $username)->first();
            $userRole = $user['role'];
        } else {
            $user = null;
        }
        
        $gamesModel = new GamesModel();
        $games = $gamesModel->where('slug', $slug)->first();
        
        if (empty($games)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
        
        $produkModel = new ProdukModel();
        $produk = $produkModel->where('brand', $games['brand'])
                             ->where('status', 'aktif')
                             ->orderBy('harga_provider', 'ASC')
                             ->findAll();
        
        foreach ($produk as &$p) {
            if ($p['sts_flash_sale'] == 'Ya') {
                switch ($userRole) {
                    case 'Basic':
                        $p['harga'] = $p['harga_fs_basic'];
                        break;
                    case 'Gold':
                        $p['harga'] = $p['harga_fs_gold'];
                        break;
                    case 'Platinum':
                    case 'admin':
                        $p['harga'] = $p['harga_fs_platinum'];
                        break;
                    default:
                        $p['harga'] = $p['harga_fs'];
                        break;
                }
            } else {
                switch ($userRole) {
                    case 'Basic':
                        $p['harga'] = $p['harga_basic'];
                        break;
                    case 'Gold':
                        $p['harga'] = $p['harga_gold'];
                        break;
                    case 'Platinum':
                    case 'admin':
                        $p['harga'] = $p['harga_platinum'];
                        break;
                    default:
                        $p['harga'] = $p['harga_jual'];
                        break;
                }
            }
        }
        
        $metodeModel = new MetodePembayaranModel();
        $metode = $metodeModel->findAll();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $bannerModel = new BannerModel();
        $Warning = $bannerModel->where('tipe', 'warning')->first();
        
        $data = [
            'web' => $web,
            'userLogin' => $userLogin,
            'user' => $user,
            'games' => $games,
            'produk' => $produk,
            'Warning' => $Warning,
            'metode' => $metode,
        ];
    
        return view('buy', $data);
    }
    
    public function mlbb($slug)
    {
        $userLogin = $this->session->has('isLogin');
        $username = '';
        $userRole = '';
        
        if ($userLogin) {
            $username = $this->session->get('username');
            $user = $this->userModel->where('username', $username)->first();
            $userRole = $user['role'];
        } else {
            $user = null;
        }
        
        $gamesModel = new MlbbKategori();
        $games = $gamesModel->where('kode', 'MLBB')->first();
        
        if (empty($games)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
        
        $produkModel = new MlbbLayanan();
        $produk = $produkModel->where('kode', $games['kode'])
                             ->where('status', 'aktif')
                             ->orderBy('harga_provider', 'ASC')
                             ->findAll();
        
        foreach ($produk as &$p) {
          
                switch ($userRole) {
                    case 'Basic':
                        $p['harga'] = $p['harga_basic'];
                        break;
                    case 'Gold':
                        $p['harga'] = $p['harga_gold'];
                        break;
                    case 'Platinum':
                    case 'admin':
                        $p['harga'] = $p['harga_platinum'];
                        break;
                    default:
                        $p['harga'] = $p['harga_jual'];
                        break;
                }
        }
        
        $metodeModel = new MetodePembayaranModel();
        $metode = $metodeModel->findAll();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $bannerModel = new BannerModel();
        $Warning = $bannerModel->where('tipe', 'warning')->first();
        
        $data = [
            'web' => $web,
            'userLogin' => $userLogin,
            'user' => $user,
            'games' => $games,
            'produk' => $produk,
            'Warning' => $Warning,
            'metode' => $metode,
        ];
    
        return view('mlbb', $data);
    }

    
    public function invoice($orderID)
    {
        $userLogin = $this->session->has('isLogin');
        $username = '';
        
        if ($userLogin) {
            $username = $this->session->get('username');
            $user = $this->userModel->where('username', $username)->first();
        } else {
            $user = null;
        }
        
        $pembelianModel = new PembelianModel();
        $invoice = $pembelianModel->where('order_id', $orderID)->first();
        
        $gamesModel = new GamesModel();
        $games = $gamesModel->where('brand', $invoice['games'])->first();
    
        if ($invoice) {
            $settings = $this->getSettingsData();
            $web = $settings;
    
            $data = [
                'web' => $web,
                'userLogin' => $userLogin,
                'user' => $user,
                'invoice' => $invoice,
                'games' => $games,
            ];
    
            return view('invoice', $data);
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }
    
    public function history()
    {
        $userLogin = $this->session->has('isLogin');
        $username = '';
        
        if ($userLogin) {
            $username = $this->session->get('username');
            $user = $this->userModel->where('username', $username)->first();
        } else {
            $user = null;
        }
        
        $pembelianModel = new PembelianModel();
        $newTransaksi = $pembelianModel->orderBy('id', 'DESC')->limit(10)->findAll();
        
        if (count($newTransaksi) > 10) {
            $newTransaksi = array_slice($newTransaksi, 0, 10);
        }
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'userLogin' => $userLogin,
            'user' => $user,
            'newTransaksi' => $newTransaksi,
        ];

        return view('history', $data);
    }
    
    public function getLatestTransactions()
    {
        $pembelianModel = new PembelianModel();
        $newTransaksi = $pembelianModel->orderBy('id', 'DESC')->limit(10)->findAll();
        
        if (count($newTransaksi) > 10) {
            $newTransaksi = array_slice($newTransaksi, 0, 10);
        }
        
        echo json_encode($newTransaksi);
    }
    
    public function getOrderDetails()
    {
        $orderID = $this->request->getVar('order_id');
        
        if (empty($orderID) || (!is_numeric($orderID) && !is_string($orderID))) {
            return $this->response->setJSON(['success' => false, 'message' => 'OrderID pesanan tidak valid.']);
        }

        $pembelianModel = new PembelianModel();
        $invoice = $pembelianModel->where('order_id', $orderID)->first();

        if ($invoice) {
            return $this->response->setJSON(['success' => true, 'invoice' => $invoice]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Pesanan tidak ditemukan.']);
        }
    }
    
    public function searchGames()
    {
        $gamesModel = new GamesModel();
        $keyword = $this->request->getPost('keyword');
        $data['results'] = $gamesModel->searchGamesIndex($keyword);
    
        return $this->response->setJSON($data);
    }
    
    public function kontak()
    {
        $userLogin = $this->session->has('isLogin');
        $username = '';
        
        if ($userLogin) {
            $username = $this->session->get('username');
            $user = $this->userModel->where('username', $username)->first();
        } else {
            $user = null;
        }
        
        $kontakModel = new KontakModel();
        $kontak = $kontakModel->first();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'userLogin' => $userLogin,
            'user' => $user,
            'kontak' => $kontak,
        ];

        return view('kontak', $data);
    }
    
    public function berita($slug)
    {
        $userLogin = $this->session->has('isLogin');
        $username = '';
        $userRole = '';
        
        if ($userLogin) {
            $username = $this->session->get('username');
            $user = $this->userModel->where('username', $username)->first();
            $userRole = $user['role'];
        } else {
            $user = null;
        }
        
        $beritaModel = new BeritaModel();
        $berita = $beritaModel->where('slug', $slug)->first();
        
        if (empty($berita)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'userLogin' => $userLogin,
            'user' => $user,
            'berita' => $berita,
        ];
    
        return view('detail_berita', $data);
    }
    
    public function apiDocs()
    {
        $userLogin = $this->session->has('isLogin');
        $username = '';
        
        if ($userLogin) {
            $username = $this->session->get('username');
            $user = $this->userModel->where('username', $username)->first();
        } else {
            $user = null;
        }
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'userLogin' => $userLogin,
            'user' => $user,
        ];

        return view('api-docs', $data);
    }
    
    public function service()
    {
        $userLogin = $this->session->has('isLogin');
        $username = '';
        $userRole = '';
        
        if ($userLogin) {
            $username = $this->session->get('username');
            $user = $this->userModel->where('username', $username)->first();
            $userRole = $user['role'];
        } else {
            $user = null;
        }
        
        $gamesModel = new GamesModel();
        $games = $gamesModel->findAll();

        $produkModel = new ProdukModel();
        $produk = $produkModel->findAll();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'userLogin' => $userLogin,
            'user' => $user,
            'games' => $games,
            'produk' => $produk,
        ];
    
        return view('service', $data);
    }
    
public function getMyService()
{
    $brand = $this->request->getGet('brand');
    $produkModel = new ProdukModel();
    $produk = $produkModel->where('brand', $brand)->orderBy('harga_jual', 'ASC')->findAll();
    
    echo json_encode($produk);
}
    
}