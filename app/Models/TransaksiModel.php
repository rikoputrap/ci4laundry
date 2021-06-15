<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'tb_transaksi';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'id_layanan', 'id_pelanggan', 'id_user',
		'invoice', 'tanggal', 'jumlah', 'total',
		'status'
	];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function transaksiSelesai()
	{
		$data = $this->builder($this->table)
			->select('tb_transaksi.id as id, tanggal, invoice, jumlah, total, status, tb_layanan.nama as layanan, tb_pelanggan.nama as pelanggan, tb_user.username as petugas')
			->where('status', 1)
			->join('tb_layanan', 'tb_layanan.id = tb_transaksi.id_layanan')
			->join('tb_pelanggan', 'tb_pelanggan.id = tb_transaksi.id_pelanggan')
			->join('tb_user', 'tb_user.id = tb_transaksi.id_user')
			->get()->getResultArray();
		return $data;
	}
	public function transaksiProses()
	{
		$data = $this->builder($this->table)
			->select('tb_transaksi.id as id, tanggal, invoice, jumlah, total, status, tb_layanan.nama as layanan, tb_pelanggan.nama as pelanggan, tb_user.username as petugas')
			->where('status', 0)
			->join('tb_layanan', 'tb_layanan.id = tb_transaksi.id_layanan')
			->join('tb_pelanggan', 'tb_pelanggan.id = tb_transaksi.id_pelanggan')
			->join('tb_user', 'tb_user.id = tb_transaksi.id_user')
			->get()->getResultArray();
		return $data;
	}
	public function transaksiSemua()
	{
		$data = $this->builder($this->table)
			->select('tb_transaksi.id as id, tanggal, invoice, jumlah, total, status, tb_layanan.nama as layanan, tb_pelanggan.nama as pelanggan, tb_user.username as petugas')
			->join('tb_layanan', 'tb_layanan.id = tb_transaksi.id_layanan')
			->join('tb_pelanggan', 'tb_pelanggan.id = tb_transaksi.id_pelanggan')
			->join('tb_user', 'tb_user.id = tb_transaksi.id_user')
			->get()->getResultArray();
		return $data;
	}
	public function transaksiDetail($id)
	{
		$data = $this->builder($this->table)
			->select('
				invoice, tanggal, tb_layanan.nama as layanan,
				tb_layanan.harga as harga_layanan,
				tb_layanan.keterangan as keterangan_layanan,
				jumlah, total, tb_pelanggan.nama as pelanggan,
				tb_pelanggan.telepon as telepon_pelanggan,
				tb_pelanggan.alamat as alamat_pelanggan,
				tb_user.username as petugas
			')
			->join('tb_layanan', 'tb_layanan.id = tb_transaksi.id_layanan')
			->join('tb_pelanggan', 'tb_pelanggan.id = tb_transaksi.id_pelanggan')
			->join('tb_user', 'tb_user.id = tb_transaksi.id_user')
			->where('tb_transaksi.id', $id)
			->get()->getRowArray();
		return $data;
	}
	public function pemasukanHariIni()
	{
		$data = $this->builder($this->table)
			->like('tanggal', date('Y-m-d'))
			->select('total')
			->get()->getResultArray();
		$total = 0;
		foreach ($data as $d) {
			$total += $d['total'];
		}
		return $total;
	}
	public function pemasukanTotal()
	{
		$data = $this->builder($this->table)
			->select('total')
			->get()->getResultArray();
		$total = 0;
		foreach ($data as $d) {
			$total += $d['total'];
		}
		return $total;
	}
}
