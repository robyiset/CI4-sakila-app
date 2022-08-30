<?php

namespace App\Models\Context\Tables;

use CodeIgniter\Model;

class country extends Model
{
    protected $table      = 'country';

    protected $primaryKey = 'country_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['country'];
}
