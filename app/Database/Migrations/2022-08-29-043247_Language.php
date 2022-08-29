<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Language extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            "language_id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT",
            "name CHAR(20) NOT NULL",
            "last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"
        ]);
        $this->forge->addPrimaryKey('language_id');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('language', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('language');
    }
}
