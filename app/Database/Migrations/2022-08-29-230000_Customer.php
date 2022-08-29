<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customer extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'customer_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT',
            'store_id TINYINT UNSIGNED NOT NULL',
            'first_name VARCHAR(45) NOT NULL',
            'last_name VARCHAR(45) NOT NULL',
            'email VARCHAR(50) DEFAULT NULL',
            'address_id SMALLINT UNSIGNED NOT NULL',
            'active BOOLEAN NOT NULL DEFAULT TRUE',
            'create_date DATETIME NOT NULL',
            'last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);

        $this->forge->addPrimaryKey('customer_id');
        $this->forge->addKey('store_id');
        $this->forge->addKey('address_id');
        $this->forge->addKey('last_name');
        $this->forge->addForeignKey('address_id', 'address', 'address_id', 'RESTRICT', 'CASCADE');
        $this->forge->addForeignKey('store_id', 'store', 'store_id', 'RESTRICT', 'CASCADE');

        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('customer', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('customer');
    }
}
