<?php

namespace App\Database\Seeds;

use App\Models\LayananModel;
use App\Models\PelangganModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class TestSeeder extends Seeder
{
	public function run()
	{
		$faker = \Faker\Factory::create('id_ID');
		$userModel = new UserModel();
		$layananModel = new LayananModel();
		$pelangganModel = new PelangganModel();
		$transaksiModel = new TransaksiModel();
		$userModel->insert([
			'username' => 'admin',
			'password' => password_hash('admin', PASSWORD_BCRYPT),
			'is_admin' => 1
		]);
		$userModel->insert([
			'username' => 'petugas',
			'password' => password_hash('petugas', PASSWORD_BCRYPT),
		]);
		$layanan = [
			[
				'nama' => 'Cuci Setrika Reguler',
				'harga' => 10000,
			],
			[
				'nama' => 'Cuci Reguler',
				'harga' => 7000,
			],
			[
				'nama' => 'Cuci Premium',
				'harga' => 13000,
				'keterangan' => 'Jumlah di hitungan per satuan pakaian'
			],
			[
				'nama' => 'Cuci Kilat',
				'harga' => 20000,
				'keterangan' => 'hanya tersedia di hari sabtu / minggu'
			],
		];
		foreach ($layanan as $l) {
			$layananModel->insert($l);
		}
		$pelanggan = [
			[
				'nama' => 'UMUM'
			],
			[
				'nama' => 'MERCHANT'
			],
		];
		foreach ($pelanggan as $p) {
			$pelangganModel->insert($p);
		}
		for ($x = 1; $x <= 10; $x++) {
			$pelangganModel->insert([
				'nama' => $faker->name,
				'telepon' => $faker->phoneNumber,
				'alamat' => $faker->address
			]);
		}
		for ($y = 1; $y <= 50; $y++) {
			$total = $faker->numberBetween(1, 9);
			$transaksiModel->insert([
				'id_layanan' => rand(1, 4),
				'id_pelanggan' => rand(1, 12),
				'id_user' => 2,
				'invoice' => $faker->uuid,
				'jumlah' => $faker->numberBetween(1, 10),
				'total' => $total * 10000,
				'status' => rand(0, 1)
			]);
		}
	}
}
