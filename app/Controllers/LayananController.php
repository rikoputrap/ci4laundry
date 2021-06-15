<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LayananModel;

class LayananController extends BaseController
{
	public function __construct()
	{
		$this->layanan = new LayananModel();
	}

	public function index()
	{
		$data = [
			'title' => 'layanan',
			'layanan' => $this->layanan->findAll()
		];
		return view('admin/layanan/index', $data);
	}
	public function tambah()
	{
		$data = [
			'nama' => $this->request->getPost('nama'),
			'keterangan' => $this->request->getPost('keterangan'),
			'harga' => $this->request->getPost('harga'),
		];
		$tambah = $this->layanan->insert($data);
		if (!$tambah) {
			return redirect()->to(base_url('/layanan'))->with('errors', $this->layanan->errors());
		} else {
			return redirect()->to(base_url('/layanan'))->with('success', 'Layanan berhasil ditambahkan');
		}
	}
	public function edit($id)
	{
		$data = [
			'title' => 'edit',
			'layanan' => $this->layanan->find($id)
		];
		return view('admin/layanan/edit', $data);
	}
	public function update()
	{
		$id = $this->request->getPost('id');
		$data = [];
		$nama = $this->request->getPost('nama');
		$harga = $this->request->getPost('harga');
		$keterangan = $this->request->getPost('keterangan');
		if (!empty($nama)) {
			$data['nama'] = $nama;
		}
		if (!empty($harga)) {
			$data['harga'] = $harga;
		}
		if (!empty($keterangan)) {
			$data['keterangan'] = $keterangan;
		}
		$update = $this->layanan->update($id, $data);
		if (!$update) {
			return redirect()->back()->with('errors', $this->layanan->errors());
		} else {
			return redirect()->to(base_url('/layanan'))->with('success', 'Layanan berhasil diupdate');
		}
	}
	public function hapus($id)
	{
		$this->layanan->delete($id);
		return redirect()->to(base_url('/layanan'))->with('success', 'Layanan berhasil dihapus');
	}
}
