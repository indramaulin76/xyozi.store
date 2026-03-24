<?php

namespace App\Models;

use CodeIgniter\Model;

class BannerModel extends Model
{
    protected $table      = 'banner';
    protected $primaryKey = 'id';
    protected $allowedFields = ['gambar', 'tipe', 'pesan'];
}