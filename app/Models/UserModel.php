<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'tb_user';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'username', 'password', 'is_admin'
	];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [
		'username' => 'required|is_unique[tb_user.username]',
		'password' => 'required'
	];
	protected $validationMessages   = [
		'username' => [
			'required' => 'Username wajib diisi',
			'is_unique' => 'Username sudah dipakai'
		],
		'password' => [
			'required' => 'Password wajib diisi',
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

	public function login($username, $password)
	{
		$cekUser = $this->where('username', $username)->get()->getRowArray();
		if (!$cekUser) {
			return false;
		}
		$cekPass = password_verify($password, $cekUser['password']);
		if (!$cekPass) {
			return false;
		}
		return $cekUser;
	}

	public function petugas()
	{
		return $this->db->table($this->table)->select('username, id')->where('is_admin', 0)->get()->getResultArray();
	}
}
