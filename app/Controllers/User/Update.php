<?php

namespace App\Controllers\User;

use App\Models\UserModel;
use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Update extends BaseController
{
    protected $session;
    
    public function __construct()
    {
        $this->session = session();
        $this->userModel = new UserModel();
    }
    
    public function updatePassword()
    {
        $userLogin = $this->session->has('isLogin');
        $username = '';
        
        if ($userLogin) {
            $username = $this->session->get('username');
            $user = $this->userModel->where('username', $username)->first();
        } else {
          return redirect()->to('/');
        }
        
        if (!$this->verifyCurrentPassword(htmlspecialchars($this->request->getPost('current_password'), ENT_QUOTES, 'UTF-8'), $user['password'])) {
            $this->session->setFlashdata('error', 'Password saat ini tidak valid.');
            return redirect()->to(base_url('dashboard/akun'))->withInput();
        }
    
        $validation = \Config\Services::validation();
        $validation->setRules([
            'current_password' => 'required',
            'new_password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[new_password]',
        ]);
    
        if (!$validation->withRequest($this->request)->run()) {
            $validationErrors = $validation->getErrors();
    
            if (isset($validationErrors['new_password'])) {
                $this->session->setFlashdata('error', 'Password harus memiliki setidaknya 6 karakter.');
            }
    
            if (isset($validationErrors['confirm_password'])) {
                $this->session->setFlashdata('error', 'Konfirmasi password tidak sesuai.');
            }
    
            return redirect()->to(base_url('dashboard/akun'))->withInput()->with('errors', $validationErrors);
        }
    
        $this->userModel->updateUserPassword($user['id'], htmlspecialchars($this->request->getPost('new_password'), ENT_QUOTES, 'UTF-8'));
    
        $this->session->setFlashdata('success', 'Password berhasil diperbarui.');
        return redirect()->to(base_url('dashboard/akun'));
        
    }
    
    private function verifyCurrentPassword($currentPassword, $hashedPassword)
    {
        return password_verify($currentPassword, $hashedPassword);
    }
    
    public function updateProfil()
    {
        $userLogin = $this->session->has('isLogin');
        $username = '';
        
        if ($userLogin) {
            $username = $this->session->get('username');
            $user = $this->userModel->where('username', $username)->first();
        } else {
          return redirect()->to('/');
        }
        
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'whatsapp' => $this->request->getPost('whatsapp'),
            'whitelist_ip' => $this->request->getPost('whitelist_ip'),
        ];
        
        $this->userModel->update($user['id'], $data);
    
        $this->session->setFlashdata('success', 'Profil berhasil diperbarui.');
        return redirect()->to(base_url('dashboard/akun'));
        
    }
    
}