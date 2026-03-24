<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table      = 'produk';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama', 'brand', 'kategori', 'tipe', 'harga_provider',
        'harga_jual', 'harga_basic', 'harga_gold', 'harga_platinum', 'keuntungan', 'keuntungan_basic', 'keuntungan_gold', 'keuntungan_platinum', 'kode_produk', 'status', 'provider', 'logo', 'sts_flash_sale', 'persen_diskon', 'harga_fs', 'harga_fs_basic', 'harga_fs_gold', 'harga_fs_platinum', 'waktu_akhir_fs'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    
    public function getTotalProduk()
    {
        return $this->countAllResults();
    }
    
    public function searchProduk($keyword, $start, $length)
    {
        return $this->like('nama', $keyword)->orLike('brand', $keyword)->findAll($length, $start);
    }

}