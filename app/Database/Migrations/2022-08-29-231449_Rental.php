<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rental extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            "rental_id INT NOT NULL AUTO_INCREMENT",
            "rental_date DATETIME NOT NULL",
            "inventory_id MEDIUMINT UNSIGNED NOT NULL",
            "customer_id SMALLINT UNSIGNED NOT NULL",
            "return_date DATETIME DEFAULT NULL",
            "staff_id TINYINT UNSIGNED NOT NULL",
            "last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"
        ]);
        $this->forge->addPrimaryKey('rental_id');
        $this->forge->addUniqueKey(['rental_date', 'inventory_id', 'customer_id']);
        $this->forge->addKey('inventory_id');
        $this->forge->addKey('customer_id');
        $this->forge->addKey('staff_id');
        $this->forge->addForeignKey('staff_id', 'staff', 'staff_id', 'RESTRICT', 'CASCADE');
        $this->forge->addForeignKey('inventory_id', 'inventory', 'inventory_id', 'RESTRICT', 'CASCADE');
        $this->forge->addForeignKey('customer_id', 'customer', 'customer_id', 'RESTRICT', 'CASCADE');

        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('payment', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('payment');
    }
}
