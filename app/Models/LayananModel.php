<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'tb_layanan';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'nama', 'keterangan', 'harga'
	];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [
		'nama' => 'required|is_unique[tb_layanan.nama]',
		'harga' => 'required|integer|max_length[8]'
	];
	protected $validationMessages   = [
		'nama' => [
			'required' => 'Nama layanan wajib diisi',
			'is_unique' => 'Nama layanan sudah dipakai'
		],
		'harga' => [
			'required' => 'Harga layanan wajib diisi',
			'integer' => 'Harga layanan harus berupa angka',
			'max_lenght' => 'Harga layanan tidak boleh melebihi 8 digit'
		]
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
