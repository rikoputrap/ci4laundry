<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LayananMigration extends Migration
{
	public function up()
	{
		$this->forge->addField('id');
		$fields = [
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'keterangan' => [
				'type' => 'TEXT',
				'null' => true
			],
			'harga' => [
				'type' => 'INT',
				'constraint' => '9'
			]
		];
		$this->forge->addField($fields);
		$this->forge->createTable('tb_layanan');
	}

	public function down()
	{
		$this->forge->dropTable('tb_layanan');
	}
}
