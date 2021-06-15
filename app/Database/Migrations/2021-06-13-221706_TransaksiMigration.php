<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransaksiMigration extends Migration
{
	public function up()
	{
		$this->forge->addField('id');
		$fields = [
			'id_layanan' => [
				'type' => 'INT',
				'constraint' => 9
			],
			'id_pelanggan' => [
				'type' => 'INT',
				'constraint' => 9
			],
			'id_user' => [
				'type' => 'INT',
				'constraint' => 9
			],
			'invoice' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			],
			'tanggal datetime default current_timestamp',
			'jumlah' => [
				'type' => 'INT',
				'constraint' => 9
			],
			'total' => [
				'type' => 'INT',
				'constraint' => 9
			],
			'status' => [
				'type' => 'BOOLEAN',
				'default' => false
			]
		];
		$this->forge->addField($fields);
		$this->forge->addForeignKey('id_layanan', 'tb_layanan', 'id', 'cascade', 'cascade');
		$this->forge->addForeignKey('id_pelanggan', 'tb_pelanggan', 'id', 'cascade', 'cascade');
		$this->forge->addForeignKey('id_user', 'tb_user', 'id', 'cascade', 'cascade');
		$this->forge->createTable('tb_transaksi');
	}

	public function down()
	{
		$this->forge->dropTable('tb_transaksi');
	}
}
