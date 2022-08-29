<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Inventory extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            "inventory_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT",
            "film_id SMALLINT UNSIGNED NOT NULL",
            "store_id TINYINT UNSIGNED NOT NULL",
            "last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"
        ]);
        $this->forge->addPrimaryKey('inventory_id');
        $this->forge->addKey('store_id');
        $this->forge->addKey('film_id');
        $this->forge->addForeignKey('store_id', 'staff', 'store_id', 'RESTRICT', 'CASCADE');
        $this->forge->addForeignKey('film_id', 'film', 'film_id', 'RESTRICT', 'CASCADE');

        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('inventory', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('payment');
    }
}
