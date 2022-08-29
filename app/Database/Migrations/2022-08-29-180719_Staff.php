<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Staff extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'staff_id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT',
            'first_name VARCHAR(45) NOT NULL',
            'last_name VARCHAR(45) NOT NULL',
            'address_id SMALLINT UNSIGNED NOT NULL',
            'picture BLOB DEFAULT NULL',
            'email VARCHAR(50) DEFAULT NULL',
            'store_id TINYINT UNSIGNED NOT NULL',
            'active BOOLEAN NOT NULL DEFAULT TRUE',
            'username VARCHAR(16) NOT NULL',
            'password VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL',
            'last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addPrimaryKey('staff_id');
        $this->forge->addKey('store_id');
        $this->forge->addKey('address_id');
        $this->forge->addForeignKey('store_id', 'store', 'store_id', 'RESTRICT', 'CASCADE');
        $this->forge->addForeignKey('address_id', 'address', 'address_id', 'RESTRICT', 'CASCADE');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('staff', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('staff');
    }
}
