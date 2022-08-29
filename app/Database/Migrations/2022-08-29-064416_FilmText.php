<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FilmText extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            "film_id SMALLINT NOT NULL",
            "title VARCHAR(255) NOT NULL",
            "description TEXT"
        ]);
        $this->forge->addPrimaryKey('film_id');
        $this->forge->createTable('film_category', TRUE);
    }

    public function down()
    {
        //
    }
}
