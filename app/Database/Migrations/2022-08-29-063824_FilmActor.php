<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FilmActor extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            "actor_id SMALLINT UNSIGNED NOT NULL",
            "film_id SMALLINT UNSIGNED NOT NULL",
            "last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"
        ]);
        $this->forge->addPrimaryKey(['actor_id', 'film_id']);
        $this->forge->addKey('film_id');
        $this->forge->addForeignKey('actor_id', 'actor', 'actor_id', 'RESTRICT', 'CASCADE');
        $this->forge->addForeignKey('film_id', 'film', 'film_id', 'RESTRICT', 'CASCADE');

        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('film_actor', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('film_actor');
    }
}
