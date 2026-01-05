<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKategoriToBerita extends Migration
{
    public function up()
    {
        $this->forge->addColumn('berita', [
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'pengumuman',
                'after'      => 'slug'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('berita', 'kategori');
    }
}
