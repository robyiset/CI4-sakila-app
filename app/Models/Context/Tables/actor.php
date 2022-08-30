<?php

namespace App\Models\Context\Tables;

use CodeIgniter\Model;

class actor extends Model
{
    protected $table      = 'actor';

    protected $primaryKey = 'actor_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'first_name',
        'last_name'
    ];
}
