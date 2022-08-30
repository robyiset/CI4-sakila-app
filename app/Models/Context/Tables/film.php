<?php

namespace App\Models\Context\Tables;

use CodeIgniter\Model;

class film extends Model
{
    protected $table      = 'film';

    protected $primaryKey = 'film_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'title',
        'description',
        'release_year',
        'language_id',
        'original_language_id',
        'rental_duration',
        'rental_rate',
        'length',
        'replacement_cost',
        'rating',
        'special_features'
    ];
}
