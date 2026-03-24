<?php

namespace App\Models;

use CodeIgniter\Model;

class GamesModel extends Model
{
    protected $table      = 'games';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama', 'sub_nama', 'brand', 'slug', 'kategori', 'tipe', 'gambar', 'banner', 'deskripsi', 'informasi', 'panduan',
        'tipe_target', 'validasi_status', 'validasi_kode'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $returnType     = 'array';
    
    public function getTotalGames()
    {
        return $this->countAllResults();
    }
    
    public function searchGames($keyword, $start, $length)
    {
        return $this->like('nama', $keyword)
                    ->findAll($length, $start);
    }
    
    public function searchGamesIndex($keyword)
    {
        return $this->like('nama', $keyword)->findAll();
    }

}