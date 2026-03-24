<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Models\PembelianModel;
use App\Models\BannerModel;
use App\Models\ProdukModel;
use App\Models\GamesModel;
use App\Models\KategoriModel;
use App\Models\MlbbKategori;
use App\Models\MlbbLayanan;
use App\Models\TopupModel;
use App\Models\MetodePembayaranModel;
use App\Models\BeritaModel;
use App\Controllers\BaseController;

class Hapus extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }
    
    public function hapusBanner($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $bannerModel = new BannerModel();
        $banner = $bannerModel->find($id);
    
        if ($banner) {
            $bannerModel->delete($id);
            session()->setFlashdata('success', 'Banner berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Banner tidak ditemukan.');
        }
    
        return redirect()->to(base_url('admin/banner'));
    }
    
    public function hapusMetode($id)
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
            $metodeModel->where('id', $id)->delete();
            session()->setFlashdata('success', 'Metode pembayaran berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Metode pembayaran tidak ditemukan.');
        }
    
        return redirect()->to(base_url('admin/metode-pembayaran'));
    }
    
    public function hapusKategori($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $kategoriModel = new KategoriModel();
        $kategori = $kategoriModel->find($id);
    
        if ($kategori) {
            $kategoriModel->where('id', $id)->delete();
            session()->setFlashdata('success', 'Kategori berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Kategori tidak ditemukan.');
        }
    
        return redirect()->to(base_url('admin/kategori'));
    }
    
    public function hapusMlbbKategori($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $MlbbKategori = new MlbbKategori();
        $kategori = $MlbbKategori->find($id);
    
        if ($kategori) {
            $MlbbKategori->where('id', $id)->delete();
            session()->setFlashdata('success', 'Kategori berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Kategori tidak ditemukan.');
        }
    
        return redirect()->to(base_url('admin/mlbbkategori'));
    }
    
    public function hapusMlbbLayanan($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $MlbbLayanan = new MlbbLayanan();
        $layanan = $MlbbLayanan->find($id);
    
        if ($layanan) {
            $MlbbLayanan->where('id', $id)->delete();
            session()->setFlashdata('success', 'Layanan berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Layanan tidak ditemukan.');
        }
    
        return redirect()->to(base_url('admin/mlbblayanan'));
    }
    
    public function hapusPembelian($id)
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
            $pembelianModel->where('id', $id)->delete();
            session()->setFlashdata('success', 'Data pembelian berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Data pembelian tidak ditemukan.');
        }
    
        return redirect()->to(base_url('admin/pembelian'));
    }
    
    public function hapusProduk($id)
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
            $produkModel->where('id', $id)->delete();
            session()->setFlashdata('success', 'Data produk berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Data produk tidak ditemukan.');
        }
    
        return redirect()->to(base_url('admin/produk'));
    }
    
    public function hapusGames($id)
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
            $gamesModel->where('id', $id)->delete();
            session()->setFlashdata('success', 'Data games berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Data games tidak ditemukan.');
        }
    
        return redirect()->to(base_url('admin/games'));
    }
    
    public function hapusUser($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/masuk');
        }
        if ($this->session->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $userModel = new UserModel();
        $user = $userModel->find($id);

        if ($user) {
            $userModel->where('id', $id)->delete();
            session()->setFlashdata('success', 'User berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'User tidak ditemukan.');
        }

        return redirect()->to('admin/user');
    }
    
    public function hapusTopup($id)
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
            $topupModel->where('id', $id)->delete();
            session()->setFlashdata('success', 'Data Top Up berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Data Top Up tidak ditemukan.');
        }
    
        return redirect()->to(base_url('admin/topup'));
    }
    
    public function hapusBerita($id)
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
            $beritaModel->where('id', $id)->delete();
            session()->setFlashdata('success', 'Berita berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Berita tidak ditemukan.');
        }
    
        return redirect()->to(base_url('admin/berita'));
    }
    
}