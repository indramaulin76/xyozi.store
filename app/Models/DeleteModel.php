<?php

namespace App\Models;

use CodeIgniter\Model;

class DeleteModel extends Model
{
    protected $table = 'produk'; // Sesuaikan dengan nama tabel produk Anda
    protected $primaryKey = 'id'; // Sesuaikan dengan primary key tabel produk Anda
    protected $allowedFields = ['nama', 'brand', 'provider']; // Sesuaikan dengan field yang ada di tabel produk
}
