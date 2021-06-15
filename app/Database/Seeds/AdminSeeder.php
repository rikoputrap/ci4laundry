<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
	public function run()
	{
		$userModel = new UserModel();
		$userModel->insert([
			'username' => 'admin',
			'password' => password_hash('admin', PASSWORD_BCRYPT),
			'is_admin' => 1
		]);
	}
}
