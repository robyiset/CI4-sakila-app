<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Film extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "film_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT",
            "title VARCHAR(128) NOT NULL",
            "description TEXT DEFAULT NULL",
            "release_year YEAR DEFAULT NULL",
            "language_id TINYINT UNSIGNED NOT NULL",
            "original_language_id TINYINT UNSIGNED DEFAULT NULL",
            "rental_duration TINYINT UNSIGNED NOT NULL DEFAULT 3",
            "rental_rate DECIMAL(4,2) NOT NULL DEFAULT 4.99",
            "length SMALLINT UNSIGNED DEFAULT NULL",
            "replacement_cost DECIMAL(5,2) NOT NULL DEFAULT 19.99",
            "rating ENUM('G','PG','PG-13','R','NC-17') DEFAULT 'G'",
            "special_features SET('Trailers','Commentaries','Deleted Scenes','Behind the Scenes') DEFAULT NULL",
            "last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"
        ]);
        //
        $this->forge->addPrimaryKey('film_id');
        $this->forge->addKey('title');
        $this->forge->addKey('language_id');
        $this->forge->addKey('original_language_id');
        $this->forge->addForeignKey('language_id', 'language', 'language_id', 'RESTRICT', 'CASCADE');
        $this->forge->addForeignKey('original_language_id', 'language', 'language_id', 'RESTRICT', 'CASCADE');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('film', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('film');
    }
}
