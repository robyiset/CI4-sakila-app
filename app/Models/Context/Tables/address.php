<?php

namespace App\Models\Context\Tables;

use CodeIgniter\Model;

class address extends Model
{
    protected $table      = 'address';
    protected $primaryKey = 'address_id';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'address',
        'address2',
        'district',
        'city_id',
        'postal_code',
        'phone'
    ];
}
