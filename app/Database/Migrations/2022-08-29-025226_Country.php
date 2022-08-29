<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Country extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'country_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT',
            'country VARCHAR(50) NOT NULL',
            'last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);

        $this->forge->addPrimaryKey('country_id');

        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('country', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('country');
    }
}
