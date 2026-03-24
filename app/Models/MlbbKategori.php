<?php

namespace App\Models;

use CodeIgniter\Model;

class MlbbKategori extends Model
{
    protected $table      = 'mlbb_kategori';
    protected $primaryKey = 'id';

    protected $allowedFields = ['provider_id','kode','games','serial','status'];

    protected $useTimestamps = false;
    protected $useSoftDeletes = false;

    protected $returnType     = 'array';
}