<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class OtentikasiController extends BaseController
{
	public function __construct()
	{
		$this->session = \Config\Services::session();
	}
	public function index()
	{
		if ($this->session->is_login) {
			return redirect()->to(base_url());
		}
		$data = [
			'title' => 'login'
		];
		return view('login/index', $data);
	}
	public function login()
	{
		$userModel = new UserModel();
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$user = $userModel->login($username, $password);
		if (!$user) {
			return redirect()->to(base_url('/login'))->with('error', 'username / password salah');
		}
		$this->session->set([
			'user_id' => $user['id'],
			'username' => $user['username'],
			'is_admin' => $user['is_admin'],
			'is_login' => true,
		]);
		return redirect()->to(base_url());
	}
	public function logout()
	{
		$this->session->destroy();
		return redirect()->to(base_url('/login'));
	}
}
