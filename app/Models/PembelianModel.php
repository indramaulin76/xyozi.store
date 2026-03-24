<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianModel extends Model
{
    protected $table      = 'pembelian';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id', 'order_id', 'trx_id', 'games', 'produk', 'kode_produk',
        'uid', 'server', 'nama_target', 'harga_provider', 'harga_jual',
        'keuntungan', 'fee', 'total_pembayaran', 'provider', 'metode_pembayaran', 'kode_pembayaran',
        'status_pembayaran', 'batas_pembayaran', 'cara_bayar', 'status_pembelian', 'status_refund', 'note', 'nomor_whatsapp', 'email_joki', 'password_joki', 'login_joki', 'request_joki'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    
    public function getTotalPembelianIndex()
    {
        return $this->countAllResults();
    }
    
    public function searchPembelian($keyword, $start, $length)
    {
        return $this->like('order_id', $keyword)->findAll($length, $start);
    }
    
    public function getTotalRupiahPembelianSuksesToday()
    {
        $today = date('Y-m-d');
        $result = $this->selectSum('harga_jual')->where('status_pembelian', 'Sukses')->where('DATE(created_at)', $today)->get()->getRowArray();
    
        return !empty($result) ? $result['harga_jual'] : 0;
    }
    
    public function getTotalRupiahPembelianProsesToday()
    {
        $today = date('Y-m-d');
        $result = $this->selectSum('harga_jual')->where('status_pembelian', 'Proses')->where('DATE(created_at)', $today)->get()->getRowArray();
    
        return !empty($result) ? $result['harga_jual'] : 0;
    }
    
    public function getTotalRupiahPembelianGagalToday()
    {
        $today = date('Y-m-d');
        $result = $this->selectSum('harga_jual')->where('status_pembelian', 'Gagal')->where('DATE(created_at)', $today)->get()->getRowArray();
    
        return !empty($result) ? $result['harga_jual'] : 0;
    }
    
    public function getTotalRupiahPembelianPendingToday()
    {
        $today = date('Y-m-d');
        $result = $this->selectSum('harga_jual')->where('status_pembelian', 'Pending')->where('DATE(created_at)', $today)->get()->getRowArray();
    
        return !empty($result) ? $result['harga_jual'] : 0;
    }
    
    public function getTotalPembelianSuksesToday()
    {
        $today = date('Y-m-d');
        $result = $this->selectCount('id')
         ->where('status_pembelian', 'Sukses')
         ->where('DATE(created_at)', $today)
         ->get()
         ->getRowArray();
    
        return !empty($result) ? $result['id'] : 0;
    }
    
    public function getTotalPembelianProsesToday()
    {
        $today = date('Y-m-d');
        $result = $this->selectCount('id')
         ->where('status_pembelian', 'Proses')
         ->where('DATE(created_at)', $today)
         ->get()
         ->getRowArray();
    
        return !empty($result) ? $result['id'] : 0;
    }
    
    public function getTotalPembelianPendingToday()
    {
        $today = date('Y-m-d');
        $result = $this->selectCount('id')
         ->where('status_pembelian', 'Pending')
         ->where('DATE(created_at)', $today)
         ->get()
         ->getRowArray();
    
        return !empty($result) ? $result['id'] : 0;
    }
    
    public function getTotalPembelianGagalToday()
    {
        $today = date('Y-m-d');
        $result = $this->selectCount('id')
          ->where('status_pembelian', 'Gagal')
          ->where('DATE(created_at)', $today)
          ->get()
          ->getRowArray();
    
        return !empty($result) ? $result['id'] : 0;
    }
    
    public function getTotalRupiahPembelianSukses()
    {
        $result = $this->selectSum('harga_jual')->where('status_pembelian', 'Sukses')->get()->getRowArray();
    
        return !empty($result) ? $result['harga_jual'] : 0;
    }
    
    public function getTotalRupiahPembelianProses()
    {
        $result = $this->selectSum('harga_jual')->where('status_pembelian', 'Proses')->get()->getRowArray();
    
        return !empty($result) ? $result['harga_jual'] : 0;
    }
    
    public function getTotalRupiahPembelianPending()
    {
        $result = $this->selectSum('harga_jual')->where('status_pembelian', 'Pending')->get()->getRowArray();
    
        return !empty($result) ? $result['harga_jual'] : 0;
    }
    
    public function getTotalRupiahPembelianGagal()
    {
        $result = $this->selectSum('harga_jual')->where('status_pembelian', 'Gagal')->get()->getRowArray();
    
        return !empty($result) ? $result['harga_jual'] : 0;
    }
    
    public function getTotalPembelianSukses()
    {
        $result = $this->selectCount('id')->where('status_pembelian', 'Sukses')->get()->getRowArray();
    
        return !empty($result) ? $result['id'] : 0;
    }
    
    public function getTotalPembelianProses()
    {
        $result = $this->selectCount('id')->where('status_pembelian', 'Proses')->get()->getRowArray();
    
        return !empty($result) ? $result['id'] : 0;
    }
    
    public function getTotalPembelianPending()
    {
        $result = $this->selectCount('id')->where('status_pembelian', 'Pending')->get()->getRowArray();
    
        return !empty($result) ? $result['id'] : 0;
    }
    
    public function getTotalPembelianGagal()
    {
        $result = $this->selectCount('id')->where('status_pembelian', 'Gagal')->get()->getRowArray();
    
        return !empty($result) ? $result['id'] : 0;
    }
    
    public function getTotalRupiahPembelian()
    {
        $result = $this->selectSum('harga_jual')->get()->getRowArray();
    
        return !empty($result) ? $result['harga_jual'] : 0;
    }
    
    public function getTotalPembelian()
    {
        $result = $this->selectCount('id')->get()->getRowArray();
    
        return !empty($result) ? $result['id'] : 0;
    }
    
    public function getTotalKeuntunganToday()
    {
        $today = date('Y-m-d');
        $result = $this->selectSum('keuntungan')->where('status_pembelian', 'Sukses')->where('DATE(created_at)', $today)->get()->getRowArray();
    
        return !empty($result) ? $result['keuntungan'] : 0;
    }
    
    public function getTotalKeuntungan()
    {
        $result = $this->selectSum('keuntungan')->where('status_pembelian', 'Sukses')->get()->getRowArray();
    
        return !empty($result) ? $result['keuntungan'] : 0;
    }
    
    public function findOrderByOrderId($orderId)
    {
        return $this->where('order_id', $orderId)->first();
    }

}