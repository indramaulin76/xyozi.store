<?php

namespace App\Models;

use CodeIgniter\Model;

class TemaModel extends Model
{
    protected $table = 'tema';
    protected $primaryKey = 'id';
    protected $allowedFields = ['text_color', 'background_color', 'border_color'];
}