<?php

namespace App\Models\Context\Tables;

use CodeIgniter\Model;

class city extends Model
{
    protected $table      = 'city';

    protected $primaryKey = 'city_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'name',
        'city',
        'country_id'
    ];
}
