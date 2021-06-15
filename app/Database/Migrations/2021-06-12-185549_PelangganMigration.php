<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PelangganMigration extends Migration
{
	public function up()
	{
		$this->forge->addField('id');
		$fields = [
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'telepon' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => true
			],
			'alamat' => [
				'type' => 'TEXT',
				'null' => true
			]
		];
		$this->forge->addField($fields);
		$this->forge->createTable('tb_pelanggan');
	}

	public function down()
	{
		$this->forge->dropTable('tb_pelanggan');
	}
}
