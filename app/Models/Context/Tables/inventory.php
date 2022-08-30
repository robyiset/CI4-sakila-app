<?php

namespace App\Models\Context\Tables;

use CodeIgniter\Model;

class inventory extends Model
{
    protected $table      = 'inventory';

    protected $primaryKey = 'inventory_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'film_id',
        'store_id'
    ];
}
