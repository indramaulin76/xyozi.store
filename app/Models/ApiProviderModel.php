<?php

namespace App\Models;

use CodeIgniter\Model;

class ApiProviderModel extends Model
{
    protected $table = 'api_provider';
    protected $primaryKey = 'id';
    protected $allowedFields = ['provider', 'kode', 'api_id', 'api_key', 'private_key', 'profit', 'profit_basic', 'profit_gold', 'profit_platinum'];
    
}