<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDeskripsiToBeranda extends Migration
{
    public function up()
    {
        $this->forge->addColumn('prestasi', [
            'deskripsi' => [
                'type'       => 'TEXT',
                'null'       => true,
                'after'      => 'judul'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('prestasi', 'deskripsi');
    }
}
