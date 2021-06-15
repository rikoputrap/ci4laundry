<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LayananModel;
use App\Models\PelangganModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{
	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->layanan = new LayananModel();
		$this->pelanggan = new PelangganModel();
		$this->user = new UserModel();
		$this->transaksi = new TransaksiModel();
	}
	public function index()
	{
		if ($this->session->is_admin) {
			$data = [
				'title' => 'dashboard',
				'proses' => $this->transaksi->where(['status' => 0])->get()->getNumRows(),
				'selesai' => $this->transaksi->where(['status' => 1])->get()->getNumRows(),
				'pemasukan_hariini' => $this->transaksi->pemasukanHariIni(),
				'pemasukan_total' => $this->transaksi->pemasukanTotal(),
				'total_layanan'	=> $this->layanan->get()->getNumRows(),
				'total_user' => $this->user->where('is_admin', 0)->get()->getNumRows(),
				'total_pelanggan' => $this->pelanggan->get()->getNumRows(),
				'total_transaksi' => $this->transaksi->get()->getNumRows(),
			];
			return view('admin/dashboard/index', $data);
		} else {
			$data = [
				'title' => 'dashboard',
				'layanan' => $this->layanan->findAll(),
				'invoice' => date("Ymdhis"),
				'tanggal' => date('d/m/Y'),
				'pelanggan' => $this->pelanggan->findAll(),
				'transaksi_proses' => $this->transaksi->transaksiProses(),
				'transaksi_selesai' => $this->transaksi->transaksiSelesai(),
				'proses' => $this->transaksi->where(['status' => 0])->get()->getNumRows(),
				'selesai' => $this->transaksi->where(['status' => 1])->get()->getNumRows(),
				'pemasukan_hariini' => $this->transaksi->pemasukanHariIni(),
				'pemasukan_total' => $this->transaksi->pemasukanTotal(),
			];
			return view('petugas/dashboard/index', $data);
		}
	}
	public function konfirmasi()
	{
		// dd($this->request->getPost());
		$input = $this->request->getPost();
		$data = [
			'title' => 'konfirmasi transaksi',
			'invoice' => date("Ymdhis"),
			'tanggal' => date('d/m/Y'),
			'layanan' => $this->layanan->find($input['layanan']),
			'jumlah' => $input['jumlah'],
			'pelanggan' => $this->pelanggan->find($input['pelanggan'])
		];
		return view('/petugas/dashboard/konfirmasi', $data);
	}
}
