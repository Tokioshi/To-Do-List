<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Note extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'prioritas' => [
                'type' => 'ENUM',
                'constraint' => ['Tinggi', 'Sedang', 'Rendah'],
                'default' => 'Rendah'
            ],
            'tenggat_waktu' => [
                'type' => 'DATE'
            ],
            'tanggal_dibuat' => [
                'type' => 'DATE'
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Selesai', 'Berlangsung', 'Belum'],
                'default' => 'Belum'
            ],
            'deskripsi' => [
                'type' => 'TEXT'
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('todo');
    }

    public function down()
    {
        $this->forge->dropTable('todo');
    }
}
