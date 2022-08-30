<?php

namespace App\Models\Context\Tables;

use CodeIgniter\Model;

class payment extends Model
{
    protected $table      = 'payment';

    protected $primaryKey = 'payment_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'customer_id',
        'staff_id',
        'rental_id',
        'amount',
        'payment_date'
    ];

    protected $useTimestamps = false;
    protected $createdField  = 'payment_date';
}
