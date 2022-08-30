<?php

namespace App\Models\Context\Tables;

use CodeIgniter\Model;

class category extends Model
{
    protected $table      = 'category';

    protected $primaryKey = 'category_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['name'];
}
