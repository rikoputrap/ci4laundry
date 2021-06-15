<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'tb_pelanggan';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'nama', 'telepon', 'alamat'
	];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [
		'nama' => 'required|is_unique[tb_pelanggan.nama]',
	];
	protected $validationMessages   = [
		'nama' => [
			'required' => 'Nama pelanggan wajib diisi',
			'is_unique' => 'Nama pelanggan sudah dipakai'
		],
	];
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
}
