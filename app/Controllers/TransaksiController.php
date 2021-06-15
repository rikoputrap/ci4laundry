<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class TransaksiController extends BaseController
{
	public function __construct()
	{
		$this->transaksi = new TransaksiModel();
	}
	public function index()
	{
		$data = [
			'title' => 'Transaksi',
			'transaksi' => $this->transaksi->transaksiSemua()
		];
		return view('transaksi/index', $data);
	}
	public function tambah()
	{
		$input = $this->request->getPost();
		$this->transaksi->insert($input);
		return redirect()->to(base_url('/'))->with('success', 'Transaksi berhasil ditambahkan');
	}
	public function selesai($id)
	{
		$this->transaksi->update($id, ['status' => 1]);
		return redirect()->to(base_url('/'))->with('success', 'Transaksi berhasil diubah');
	}
	public function hapus($id)
	{
		$this->transaksi->delete($id);
		return redirect()->to(base_url('/'))->with('success', 'Transaksi berhasil dihapus');
	}
	public function detail($id)
	{
		$data = [
			'title' => 'detail transaksi',
			'transaksi' => $this->transaksi->transaksiDetail($id)
		];
		return view('transaksi/detail', $data);
	}
}
