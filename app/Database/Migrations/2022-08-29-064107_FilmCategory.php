<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FilmCategory extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            "film_id SMALLINT UNSIGNED NOT NULL",
            "category_id TINYINT UNSIGNED NOT NULL",
            "last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"
        ]);
        $this->forge->addPrimaryKey(['film_id', 'category_id']);
        $this->forge->addForeignKey('category_id', 'category', 'category_id', 'RESTRICT', 'CASCADE');
        $this->forge->addForeignKey('film_id', 'film', 'film_id', 'RESTRICT', 'CASCADE');

        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('film_category', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('film_category');
    }
}
