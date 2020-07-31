<?php 
namespace App\Models;

use CodeIgniter\Model;

/**
 * 
 */
class UserModel extends Model {
	
	protected $table = 'tr_users';
	protected $allowedFields = ['name', 'username', 'email', 'password', 'phone_number', 'updated_at'];
	protected $beforeInsert = ['beforeInsert'];
	protected $beforeUpdate = ['beforeUpdate'];

	protected function beforeInsert(array $data) {
		$data = $this->passwordHash($data);

		return $data;
	}

	protected function beforeUpdate(array $data) {
		$data = $this->passwordHash($data);
		
		return $data;
	}

	protected function passwordHash(array $data) {
		if(!isset($data['data']['password'])) 
			return $data;
		
		$data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
		return $data;
	}
	
}