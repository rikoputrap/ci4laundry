<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelangganModel;

class PelangganController extends BaseController
{
	public function __construct()
	{
		$this->pelanggan = new PelangganModel();
	}
	public function index()
	{
		$data = [
			'title' => 'pelanggan',
			'pelanggan' => $this->pelanggan->findAll()
		];
		return view('pelanggan/index', $data);
	}
	public function tambah()
	{
		$data = [
			'nama' => $this->request->getPost('nama'),
			'telepon' => $this->request->getPost('telepon'),
			'alamat' => $this->request->getPost('alamat'),
		];
		$tambah = $this->pelanggan->insert($data);
		if (!$tambah) {
			return redirect()->to(base_url('/pelanggan'))->with('errors', $this->pelanggan->errors());
		} else {
			return redirect()->to(base_url('/pelanggan'))->with('success', 'Pelanggan berhasil ditambahkan');
		}
	}
	public function edit($id)
	{
		$data = [
			'title' => 'edit',
			'pelanggan' => $this->pelanggan->find($id)
		];
		return view('pelanggan/edit', $data);
	}
	public function update()
	{
		$id = $this->request->getPost('id');
		$data = [];
		$nama = $this->request->getPost('nama');
		$alamat = $this->request->getPost('alamat');
		$telepon = $this->request->getPost('telepon');
		if (!empty($nama)) {
			$data['nama'] = $nama;
		}
		if (!empty($alamat)) {
			$data['alamat'] = $alamat;
		}
		if (!empty($telepon)) {
			$data['telepon'] = $telepon;
		}
		$update = $this->pelanggan->update($id, $data);
		if (!$update) {
			return redirect()->back()->with('errors', $this->pelanggan->errors());
		} else {
			return redirect()->to(base_url('/pelanggan'))->with('success', 'Pelanggan berhasil diupdate');
		}
	}
	public function hapus($id)
	{
		$this->pelanggan->delete($id);
		return redirect()->to(base_url('/pelanggan'))->with('success', 'Pelanggan berhasil dihapus');
	}
}
