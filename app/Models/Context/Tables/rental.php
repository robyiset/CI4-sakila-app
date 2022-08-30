<?php

namespace App\Models\Context\Tables;

use CodeIgniter\Model;

class rental extends Model
{
    protected $table      = 'rental';

    protected $primaryKey = 'rental_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'inventory_id',
        'customer_id',
        'return_date',
        'staff_id'
    ];

    protected $useTimestamps = false;
    protected $createdField  = 'rental_date';
}
