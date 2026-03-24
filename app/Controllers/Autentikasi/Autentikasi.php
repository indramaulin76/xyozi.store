<?php

namespace App\Controllers\Autentikasi;

use App\Models\UserModel;
use App\Models\ApiProviderModel;
use App\Controllers\BaseController;

class Autentikasi extends BaseController
{
    protected $userModel;
    protected $validation;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    public function login()
    {
        $userLogin = $this->session->has('isLogin');
    
        if ($userLogin) {
            return redirect()->to('/');
        }
    
        $username = '';
        $user = null;
    
        $settings = $this->getSettingsData();
        $web = $settings;
    
        $data = [
            'web' => $web,
            'userLogin' => $userLogin,
            'user' => $user,
        ];
    
        return view('autentikasi/masuk', $data);
    }
    
    public function validasiMasuk()
    {
        $data = $this->request->getPost();
    
        $data['username'] = htmlspecialchars($data['username'], ENT_QUOTES, 'UTF-8');
        $data['password'] = htmlspecialchars($data['password'], ENT_QUOTES, 'UTF-8');
    
        $user = $this->userModel->where('username', $data['username'])->first();
    
        if ($user) {
            if (password_verify($data['password'], $user['password'])) {
                $sessLogin = [
                    'isLogin' => true,
                    'username' => $user['username'],
                    'role' => $user['role']
                ];
                $this->session->set($sessLogin);
    
                if ($user['role'] == 'admin') {
                    return redirect()->to('/admin/dashboard');
                } else {
                    session()->setFlashdata('success', 'Selamat datang '  . $user['username']);
                    return redirect()->to('/dashboard');
                }
            } else {
                session()->setFlashdata('password', 'Kata sandi anda salah');
                return redirect()->to('masuk');
            }
        } else {
            session()->setFlashdata('username', 'Username tidak ditemukan');
            return redirect()->to('masuk');
        }
    }

    public function daftar()
    {
        $userLogin = $this->session->has('isLogin');
    
        if ($userLogin) {
            return redirect()->to('/');
        }
    
        $username = '';
        $user = null;
    
        $settings = $this->getSettingsData();
        $web = $settings;
    
        $data = [
            'web' => $web,
            'userLogin' => $userLogin,
            'user' => $user,
        ];
    
        return view('autentikasi/daftar', $data);
    }

    public function validasiDaftar()
    {
        $data = $this->request->getPost();
    
        $data['username'] = htmlspecialchars($data['username'], ENT_QUOTES, 'UTF-8');
        $data['nama'] = htmlspecialchars($data['nama'], ENT_QUOTES, 'UTF-8');
        $data['email'] = htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8');
        $data['whatsapp'] = htmlspecialchars($data['whatsapp'], ENT_QUOTES, 'UTF-8');
        $data['password'] = htmlspecialchars($data['password'], ENT_QUOTES, 'UTF-8');
    
        $this->validation->run($data, 'register');
    
        $errors = $this->validation->getErrors();
        if ($errors) {
            session()->setFlashdata('error', $errors);
            return redirect()->to('daftar');
        }
    
        $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);
        
        $api_id = bin2hex(random_bytes(6));
        $api_key = bin2hex(random_bytes(20));
    
        $this->userModel->save([
            'username' => $data['username'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'whatsapp' => $data['whatsapp'],
            'password' => $hashedPassword,
            'balance' => 0,
            'role' => 'Basic',
            'api_id' => $api_id,
            'api_key' => $api_key,
            'date_create' => date('Y-m-d H:i:s')
        ]);
    
        session()->setFlashdata('login', 'Anda berhasil mendaftar, silahkan login');
        return redirect()->to('masuk');
    }
    
    public function resetPassword()
    {
        $userLogin = $this->session->has('isLogin');
    
        if ($userLogin) {
            return redirect()->to('/');
        }
    
        $username = '';
        $user = null;
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'userLogin' => $userLogin,
            'user' => $user,
        ];
    
        return view('autentikasi/reset-password', $data);
    }
    
    public function validasiResetPassword()
    {
        $nomorTelepon = htmlspecialchars($this->request->getPost('nomor_telepon'));
        $user = $this->userModel->where('whatsapp', $nomorTelepon)->first();
    
        if ($user) {
            $lastResetTime = strtotime($user['last_reset_time']);
            $current_time = time();
            $resetTimeLimit = 15 * 60;
    
            if (($current_time - $lastResetTime) < $resetTimeLimit) {
                session()->setFlashdata('error', 'Anda baru saja melakukan reset password, Tunggu beberapa saat sebelum mencoba lagi.');
                return redirect()->to('reset-password');
            }
    
            $otp = rand(100000, 999999);
            $this->session->set('password_reset_otp', $otp);
            $this->session->set('reset_user_telephone', $nomorTelepon);
            $this->userModel->update($user['id'], ['last_reset_time' => date('Y-m-d H:i:s')]);
    
            $pesan = "kode OTP untuk reset password Anda adalah: $otp";
            $this->kirimWhatsAppOTP($nomorTelepon, $pesan);
    
            session()->setFlashdata('success', 'OTP berhasil dikirim ke nomor WhatsApp Anda');
            return redirect()->to('verifikasi-otp');
        } else {
            session()->setFlashdata('error', 'Nomor WhatsApp tidak ditemukan');
            return redirect()->to('reset-password');
        }
    }
    
    public function otp()
    {
        $userLogin = $this->session->has('isLogin');
    
        if ($userLogin) {
            return redirect()->to('/');
        }
    
        $username = '';
        $user = null;
        
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'userLogin' => $userLogin,
            'user' => $user,
        ];
    
        return view('autentikasi/otp', $data);
    }
    
    public function validasiOtp()
    {
        $otpDimasukkan = htmlspecialchars($this->request->getPost('otp'));
        $otpDisimpan = $this->session->get('password_reset_otp');
    
        if ($otpDimasukkan == $otpDisimpan) {
            session()->setFlashdata('success', 'Kode OTP Terverifikasi, Silahkan masukkan password baru anda.');
            return redirect()->to('new-password');
        } else {
            session()->setFlashdata('error', 'Kode OTP salah');
            return redirect()->to('verifikasi-otp');
        }
    }
    
    public function newPassword()
    {
        $userLogin = $this->session->has('isLogin');
    
        if ($userLogin) {
            return redirect()->to('/');
        }
    
        $username = '';
        $user = null;
        
        if (!$this->session->has('reset_user_telephone')) {
            session()->setFlashdata('error', 'Data pengguna tidak ditemukan');
            return redirect()->to('reset-password');
        }
    
        $settings = $this->getSettingsData();
        $web = $settings;
        
        $data = [
            'web' => $web,
            'userLogin' => $userLogin,
            'user' => $user,
        ];
    
        return view('autentikasi/new-password', $data);
    }
    
    public function validasiNewPassword()
    {
        if (!$this->session->has('reset_user_telephone')) {
            session()->setFlashdata('error', 'Data pengguna tidak ditemukan');
            return redirect()->to('reset-password');
        }

        $newPassword = htmlspecialchars($this->request->getPost('new_password'));
        $confirmPassword = htmlspecialchars($this->request->getPost('confirm_password'));
    
        if (strlen($newPassword) < 6) {
            session()->setFlashdata('error', 'Password harus memiliki setidaknya 6 karakter');
            return redirect()->to('new-password');
        }
    
        if ($newPassword !== $confirmPassword) {
            session()->setFlashdata('error', 'Password baru tidak sesuai dengan konfirmasi Password');
            return redirect()->to('new-password');
        }
    
        $userModel = new UserModel();
        $userData = $userModel->where('whatsapp', session()->get('reset_user_telephone'))->first();
    
        if ($userData) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $userModel->update($userData['id'], ['password' => $hashedPassword]);
    
            session()->setFlashdata('success', 'Password berhasil direset, Silakan login dengan password baru anda.');
            return redirect()->to('masuk');
        } else {
            session()->setFlashdata('error', 'Data pengguna tidak ditemukan');
            return redirect()->to('new-password');
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }
    
    private function kirimWhatsAppOTP($nomorTelepon, $pesan)
    {
        $apiProviderModel = new ApiProviderModel();
        $api = $apiProviderModel->where('kode', 'Ft')->first();
        
        $curl = curl_init();
    
        $data = array(
            'target' => $nomorTelepon,
            'message' => $pesan,
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