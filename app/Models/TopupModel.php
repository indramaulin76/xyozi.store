<?php

namespace App\Models;

use CodeIgniter\Model;

class TopupModel extends Model
{
    protected $table = 'topup';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id', 'username', 'topup_id', 'nominal', 'fee', 'total_pembayaran', 'metode', 'kode_pembayaran', 'batas_pembayaran', 'cara_bayar', 'status', 'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;
    
    public function getTotalTopupIndex()
    {
        return $this->countAllResults();
    }
    
    public function searchTopup($keyword, $start, $length)
    {
        return $this->like('topup_id', $keyword)->findAll($length, $start);
    }
    
    public function getTotalAmountTopupSukses()
    {
        $result = $this->selectSum('nominal')->where('status', 'Paid')->get()->getRowArray();
    
        return !empty($result) ? $result['nominal'] : 0;
    }
    
    public function getTotalTopupSukses()
    {
        $result = $this->selectCount('id')->where('status', 'Paid')->get()->getRowArray();
    
        return !empty($result) ? $result['id'] : 0;
    }
    
}