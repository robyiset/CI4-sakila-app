<?php

namespace App\Models\Context\Tables;

use CodeIgniter\Model;

class film_category extends Model
{
    protected $table      = 'film_category';

    protected $primaryKey = ['film_id', 'category_id'];

    protected $allowedFields = [
        'category_id',
        'film_id'
    ];
}
