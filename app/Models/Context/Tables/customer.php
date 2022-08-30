<?php

namespace App\Models\Context\Tables;

use CodeIgniter\Model;

class customer extends Model
{
    protected $table      = 'customer';

    protected $primaryKey = 'customer_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'store_id',
        'first_name',
        'last_name',
        'email',
        'address_id',
        'active'
    ];

    protected $useTimestamps = false;
    protected $createdField  = 'create_date';
}
