<?php

namespace App\Models\Context\Tables;

use CodeIgniter\Model;

class film_actor extends Model
{
    protected $table      = 'film_actor';

    protected $primaryKey = ['film_id', 'actor_id'];

    protected $allowedFields = [
        'actor_id',
        'film_id'
    ];
}
