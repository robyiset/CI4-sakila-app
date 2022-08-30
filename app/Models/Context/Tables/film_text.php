<?php

namespace App\Models\Context\Tables;

use CodeIgniter\Model;

class film_text extends Model
{
    protected $table      = 'film_text';

    protected $primaryKey = 'film_id';

    protected $allowedFields = [
        'film_id',
        'title',
        'description'
    ];
}
