<?php

namespace App\Models\Context\Tables;

use CodeIgniter\Model;

class staff extends Model
{
    protected $table      = 'staff';

    protected $primaryKey = 'staff_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'first_name',
        'last_name',
        'address_id',
        'picture',
        'email',
        'store_id',
        'active',
        'username',
        'password'
    ];
}
