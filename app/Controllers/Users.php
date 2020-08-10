<?php namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController {
	public function index() {
		
		$data = [];
		helper(['form']);

		if($this->request->getMethod() == 'post') {
			//validation
			$rules = [
				'email' => 'required|valid_email',
				'password' => 'required|validateUser[email,password]'
			];

			$errors = [
				'password' => [
					'validateUser' => 'Email or Password don\'t match'
				]
			];

			if(! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			} else {
				//database entry
				$model = new UserModel();

				$user = $model->where('email',$this->request->getVar('email'))
							  ->first();

				$this->setUserSession($user);

				return redirect()->to('/dashboard');
			}

		}

		echo view('templates/header', $data);
		echo view('login');
		echo view('templates/footer');

	}

	public function register() {

		$data = [];
		helper(['form']);

		if($this->request->getMethod() == 'post') {
			//validation
			$rules = [
				'name' => 'required',
				'username' => 'required',
				'email' => 'required|valid_email|is_unique[tr_users.email]',
				'password' => 'required',
				'confirm_password' => 'required|matches[password]',
				'phone_number' => 'required|min_length[10]|max_length[15]'
			];

			if(! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {
				//database entry
				$model = new UserModel();

				$newData = [
					'name' => $this->request->getVar('name'),
					'username' => $this->request->getVar('username'),
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password'),
					'phone_number' => (int) $this->request->getVar('phone_number')
				];
				$model->save($newData);

				$session = session();
				$session->setFlashdata('success','Successful Registration');
				return redirect()->to('/');
			}

		}

		echo view('templates/header', $data);
		echo view('register');
		echo view('templates/footer');	
	


	}

	private function setUserSession($user) {
		$userData = [
			'id' => $user['id'],
			'name' => $user['name'],
			'username' => $user['username'],
			'email' => $user['email'],
			'entity' => $user['entity'],
			'logged_in' => true
		];

		session()->set($userData);

		return true;
	}

	public function logoutUser($value='') {
		session()->destroy();

		return redirect()->to('/'); 
	}

	//--------------------------------------------------------------------

}
