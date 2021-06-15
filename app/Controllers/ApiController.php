<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class ApiController extends BaseController
{
	use ResponseTrait;
	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}
	public function index()
	{
	}

	public function apiGetKeterangan()
	{
		$nama = $this->request->getPost('nama');
		$data = $this->db->table('tb_layanan')->select('keterangan, harga')->where('nama', $nama)->get()->getRowArray();
		return $this->respond($data);
	}
}
