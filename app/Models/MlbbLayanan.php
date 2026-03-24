<?php

namespace App\Models;

use CodeIgniter\Model;

class MlbbLayanan extends Model
{
    protected $table      = 'mlbb_layanan';
    protected $primaryKey = 'id';

    protected $allowedFields = ['kategori_id','layanan_id','kode','durasi','tipe','harga_provider','harga_jual','harga_basic','harga_gold','harga_platinum','keuntungan','keuntungan_basic','keuntungan_gold','keuntungan_platinum','status','provider'];

    protected $useTimestamps = false;
    protected $useSoftDeletes = false;

    protected $returnType     = 'array';
    
    public function getTotalProduk()
    {
        return $this->countAllResults();
    }
    
    public function searchProduk($keyword, $start, $length)
    {
        return $this->like('kode', $keyword)->orLike('durasi', $keyword)->findAll($length, $start);
    }
}