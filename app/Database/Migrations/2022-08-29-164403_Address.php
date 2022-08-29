<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Address extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'address_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT',
            'address VARCHAR(50) NOT NULL',
            'address2 VARCHAR(50) DEFAULT NULL',
            'district VARCHAR(20) NOT NULL',
            'city_id SMALLINT UNSIGNED NOT NULL',
            'postal_code VARCHAR(10) DEFAULT NULL',
            'phone VARCHAR(20) NOT NULL',
            'last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addPrimaryKey('address_id');
        $this->forge->addKey('city_id');
        //CONSTRAINT `fk_address_city` FOREIGN KEY (city_id) REFERENCES city (city_id) ON DELETE RESTRICT ON UPDATE CASCADE
        $this->forge->addForeignKey('city_id', 'city', 'city_id', 'RESTRICT', 'CASCADE');

        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('address', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('address');
    }
}
