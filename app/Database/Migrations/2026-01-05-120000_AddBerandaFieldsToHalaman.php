<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBerandaFieldsToHalaman extends Migration
{
    public function up()
    {
        $this->forge->addColumn('halaman', [
            'hero_title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'id'
            ],
            'hero_subtitle' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'hero_title'
            ],
            'hero_image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'hero_subtitle'
            ],
            'tentang_title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'hero_image'
            ],
            'tentang_text1' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'tentang_title'
            ],
            'tentang_text2' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'tentang_text1'
            ],
            'luas_wilayah' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => 'tentang_text2'
            ],
            'jumlah_rw' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'after' => 'luas_wilayah'
            ],
            'jumlah_rt' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'after' => 'jumlah_rw'
            ],
            'gambar_peta' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'jumlah_rt'
            ],
            'batas_utara' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'gambar_peta'
            ],
            'batas_selatan' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'batas_utara'
            ],
            'batas_timur' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'batas_selatan'
            ],
            'batas_barat' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'batas_timur'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('halaman', [
            'hero_title',
            'hero_subtitle', 
            'hero_image',
            'tentang_title',
            'tentang_text1',
            'tentang_text2',
            'luas_wilayah',
            'jumlah_rw',
            'jumlah_rt',
            'gambar_peta',
            'batas_utara',
            'batas_selatan',
            'batas_timur',
            'batas_barat',
        ]);
    }
}
