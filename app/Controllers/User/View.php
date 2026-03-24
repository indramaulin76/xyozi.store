<?php

namespace App\Controllers\User;

use App\Models\UserModel;
use App\Models\PembelianModel;
use App\Models\TopupModel;
use App\Models\MetodePembayaranModel;
use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class View extends BaseController
{
    protected $session;
    
    public function __construct()
    {
        $this->session = session();
        $this->userModel = new UserModel();
    }
    
    public function dashboard()
    {
        $userLogin = $this->session->has('isLogin');
        $username = '';
        
        if ($userLogin) {
            $username = $this->session->get('username');
            $user = $this->userModel->where('username', $username)->first();
        } else {
          return redirect()->to('/');
        }

        $pembelianModel = new PembelianModel();
        $newTransaksi = $pembelianModel
          ->where('user_id', $user['id'])
          ->where('DATE(created_at)', date('Y-m-d'))
          ->orderBy('created_at', 'DESC')
          ->limit(10)
          ->findAll();
          
        if (count($newTransaksi) > 10) {
            $newTransaksi = array_slice($newTransaksi, 0, 10);
        }
        
        $totalTransaksiNew = $pembelianModel
          ->where('user_id', $user['id'])
          ->where('DATE(created_at)', date('Y-m-d'))
          ->countAllResults();
          
        $totalTrxPendingNew = $pembelianModel
          ->where('user_id', $user['id'])
          ->where('DATE(created_at)', date('Y-m-d'))
          ->where('status_pembelian', 'Pending')
          ->countAllResults();
          
        $totalTrxProsesNew = $pembelianModel
          ->where('user_id', $user['id'])
          ->where('DATE(created_at)', date('Y-m-d'))
          ->where('status_pembelian', 'Proses')
          ->countAllResults();
          
        $totalTrxSuksesNew = $pembelianModel
          ->where('user_id', $user['id'])
          ->where('DATE(created_at)', date('Y-m-d'))
          ->where('status_pembelian', 'Sukses')
          ->countAllResults();
          
        $totalTrxGagalNew = $pembelianModel
          ->where('user_id', $user['id'])
          ->where('DATE(created_at)', date('Y-m-d'))
          ->where('status_pembelian', 'Gagal')
          ->countAllResults();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'userLogin' => $userLogin,
            'user' => $user,
            'newTransaksi' => $newTransaksi,
            'totalTransaksiNew' => $totalTransaksiNew,
            'totalTrxPendingNew' => $totalTrxPendingNew,
            'totalTrxProsesNew' => $totalTrxProsesNew,
            'totalTrxSuksesNew' => $totalTrxSuksesNew,
            'totalTrxGagalNew' => $totalTrxGagalNew,
        ];

        return view('user/dashboard', $data);
    }
    
    public function history()
    {
        $userLogin = $this->session->has('isLogin');
        $username = '';
        
        if ($userLogin) {
            $username = $this->session->get('username');
            $user = $this->userModel->where('username', $username)->first();
        } else {
          return redirect()->to('/');
        }

        $pembelianModel = new PembelianModel();
        $transaksi = $pembelianModel->where('user_id', $user['id'])->orderBy('created_at', 'DESC')->findAll();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'userLogin' => $userLogin,
            'user' => $user,
            'transaksi' => $transaksi,
        ];

        return view('user/history', $data);
    }
    
    public function akun()
    {
        $userLogin = $this->session->has('isLogin');
        $username = '';
        
        if ($userLogin) {
            $username = $this->session->get('username');
            $user = $this->userModel->where('username', $username)->first();
        } else {
          return redirect()->to('/');
        }
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'userLogin' => $userLogin,
            'user' => $user,
        ];

        return view('user/akun', $data);
    }
    
    public function topup()
    {
        $userLogin = $this->session->has('isLogin');
        $username = '';
        
        if ($userLogin) {
            $username = $this->session->get('username');
            $user = $this->userModel->where('username', $username)->first();
        } else {
          return redirect()->to('/');
        }
        
        $metodeModel = new MetodePembayaranModel();
        $metode = $metodeModel->findAll();
        
        $topupModel = new TopupModel();
        $topup = $topupModel->where('user_id', $user['id'])->orderBy('created_at', 'DESC')->findAll();
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'userLogin' => $userLogin,
            'user' => $user,
            'topup' => $topup,
            'metode' => $metode,
        ];

        return view('user/topup', $data);
    }
    
    public function invoice($topupID)
    {
        $userLogin = $this->session->has('isLogin');
        $username = '';
        
        if ($userLogin) {
            $username = $this->session->get('username');
            $user = $this->userModel->where('username', $username)->first();
        } else {
          return redirect()->to('/');
        }
        
        $topupModel = new TopupModel();
        $invoice = $topupModel->where('topup_id', $topupID)->first();
        
        if ($invoice) {
            $settings = $this->getSettingsData();
            $web = $settings;
    
            $data = [
                'web' => $web,
                'userLogin' => $userLogin,
                'user' => $user,
                'invoice' => $invoice,
            ];
    
            return view('user/invoice', $data);
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }
    
}