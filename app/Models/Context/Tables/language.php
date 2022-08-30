<?php

namespace App\Models\Context\Tables;

use CodeIgniter\Model;

class language extends Model
{
    protected $table      = 'language';

    protected $primaryKey = 'language_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'name'
    ];
}
