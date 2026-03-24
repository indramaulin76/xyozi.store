<?php

namespace App\Models;

use CodeIgniter\Model;

class MetodePembayaranModel extends Model
{
    protected $table = 'metode';
    protected $primaryKey = 'id';
    protected $allowedFields = ['gambar', 'nama', 'keterangan', 'kode', 'kategori'];
    
    public function getTotalMetode()
    {
        $result = $this->selectCount('id')->get()->getRowArray();
    
        return !empty($result) ? $result['id'] : 0;
    }
}