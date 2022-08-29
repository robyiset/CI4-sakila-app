<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Store extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'store_id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT',
            'manager_staff_id TINYINT UNSIGNED NOT NULL',
            'address_id SMALLINT UNSIGNED NOT NULL',
            'last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addPrimaryKey('store_id');
        $this->forge->addUniqueKey('manager_staff_id');
        $this->forge->addKey('address_id');
        $this->forge->addForeignKey('manager_staff_id', 'staff', 'staff_id', 'RESTRICT', 'CASCADE');
        $this->forge->addForeignKey('address_id', 'address', 'address_id', 'RESTRICT', 'CASCADE');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('store', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('store');
    }
}
