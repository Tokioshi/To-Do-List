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
            'tanggal' => [
                'type' => 'DATE'
            ],
            'deskripsi' => [
                'type' => 'TEXT'
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Selesai', 'Belum'],
                'default' => 'Belum'
            ]
        ]);

        $this->forge->addKey('id', true);
		$this->forge->createTable('todo');
    }

    public function down()
    {
        $this->forge->dropTable('todo');
    }
}
