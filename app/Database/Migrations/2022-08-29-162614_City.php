<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class City extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'city_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT',
            'city VARCHAR(50) NOT NULL',
            'country_id SMALLINT UNSIGNED NOT NULL',
            'last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);

        $this->forge->addPrimaryKey('city_id');
        $this->forge->addKey('country_id');
        //CONSTRAINT `fk_city_country` FOREIGN KEY (country_id) REFERENCES country (country_id) ON DELETE RESTRICT ON UPDATE CASCADE
        $this->forge->addForeignKey('country_id', 'country', 'country_id', 'RESTRICT', 'CASCADE');

        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('city', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('city');
    }
}
