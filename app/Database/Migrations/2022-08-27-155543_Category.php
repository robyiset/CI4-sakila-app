<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'category_id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT',
            'name VARCHAR(25) NOT NULL',
            'last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addPrimaryKey('category_id');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('category', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('category');
    }
}
