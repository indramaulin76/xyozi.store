<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class AdminAuditLogModel extends Model
{
    protected $table            = 'admin_audit_log';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'admin_username',
        'action',
        'entity',
        'entity_id',
        'details',
        'ip_address',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = '';
}
