<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $primaryKey = "id";
    protected $allowedFields = ["username", "nama", "email", "whatsapp", "password", "balance", "role", "api_id", "api_key", "whitelist_ip", "date_create", "last_reset_time"];
    protected $useTimestamps = false;
    
    public function updateUserPassword($userId, $newPassword)
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    
        $data = [
            'password' => $hashedPassword,
        ];
    
        $result = $this->update($userId, $data);
    
        if (!$result) {
            throw new \RuntimeException('Gagal memperbarui password.');
        }
    }
    
    public function getTotalUserIndex()
    {
        return $this->countAllResults();
    }
    
    public function searchUser($keyword, $start, $length)
    {
        return $this->like('username', $keyword)->findAll($length, $start);
    }
    
    public function getTotalUsers()
    {
        return $this->countAll();
    }
    
    public function getTotalUsersToday()
    {
        $today = date('Y-m-d');
        return $this->where('DATE(date_create)', $today)->countAllResults();
    }
    
    public function getTotalSaldoUser()
        {
            $result = $this->selectSum('balance')->get()->getRowArray();
        
            return !empty($result) ? $result['balance'] : 0;
        }
    
    public function findUserByApiKey($apiId, $apiKey)
    {
        return $this->where('api_id', $apiId)->where('api_key', $apiKey)->first();
    }
    
}