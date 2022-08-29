<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Actor extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'actor_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT',
            'first_name VARCHAR(45) NOT NULL',
            'last_name VARCHAR(45) NOT NULL',
            'last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addPrimaryKey('actor_id');
        $this->forge->addKey('last_name');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('actor', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('actor');
    }
}
