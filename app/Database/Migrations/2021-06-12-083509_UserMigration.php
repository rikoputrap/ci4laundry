<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigration extends Migration
{
	public function up()
	{
		$this->forge->addField('id');
		$fields = [
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => '50'
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			],
			'is_admin' => [
				'type' => 'BOOLEAN',
				'default' => false
			]
		];
		$this->forge->addField($fields);
		$this->forge->createTable('tb_user');
	}

	public function down()
	{
		$this->forge->dropTable('tb_user');
	}
}
