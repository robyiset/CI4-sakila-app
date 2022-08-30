<?php

namespace App\Models\Context\Tables;

use CodeIgniter\Model;

class store extends Model
{
    protected $table      = 'store';

    protected $primaryKey = 'store_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'manager_staff_id',
        'address_id'
    ];
}
