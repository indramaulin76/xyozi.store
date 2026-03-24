<?php

namespace App\Models;

use CodeIgniter\Model;

class VoucherModel extends Model
{
    protected $table      = 'voucher';
    protected $primaryKey = 'id';

    protected $allowedFields = ['kode', 'persen', 'stok', 'max_potongan', 'status'];
    
    public function getTotalVoucher()
    {
        return $this->countAllResults();
    }
    

}