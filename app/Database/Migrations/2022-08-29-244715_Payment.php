<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Payment extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            "payment_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT",
            "customer_id SMALLINT UNSIGNED NOT NULL",
            "staff_id TINYINT UNSIGNED NOT NULL",
            "rental_id INT DEFAULT NULL",
            "amount DECIMAL(5,2) NOT NULL",
            "payment_date DATETIME NOT NULL",
            "last_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"
        ]);
        $this->forge->addPrimaryKey('payment_id');
        $this->forge->addKey('staff_id');
        $this->forge->addKey('customer_id');
        $this->forge->addForeignKey('rental_id', 'rental', 'rental_id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('customer_id', 'customer', 'customer_id', 'RESTRICT', 'CASCADE');
        $this->forge->addForeignKey('staff_id', 'staff', 'staff_id', 'RESTRICT', 'CASCADE');

        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('payment', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('payment');
    }
}
