<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class PetugasController extends BaseController
{
	public function __construct()
	{
		$this->user = new UserModel();
	}
	public function index()
	{
		$data = [
			'title' => 'petugas',
			'petugas' => $this->user->petugas()
		];
		return view('admin/petugas/index', $data);
	}
	public function tambah()
	{
		$password = $this->request->getPost('password');
		$data = [
			'username' => $this->request->getPost('username'),
			'password' => password_hash($password, PASSWORD_BCRYPT)
		];
		$tambah = $this->user->insert($data);
		if (!$tambah) {
			return redirect()->to(base_url('/petugas'))->with('errors', $this->user->errors());
		} else {
			return redirect()->to(base_url('/petugas'))->with('success', 'Petugas berhasil ditambahkan');
		}
	}
	public function hapus($id)
	{
		$this->user->delete($id);
		return redirect()->to(base_url('/petugas'))->with('success', 'Petugas berhasil dihapus');
	}
}
