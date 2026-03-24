<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'kategori';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama'];

    protected $useTimestamps = false;
    protected $useSoftDeletes = false;

    protected $returnType     = 'array';
    
    public function getTotalKategori()
    {
        $result = $this->selectCount('id')->get()->getRowArray();
    
        return !empty($result) ? $result['id'] : 0;
    }
}