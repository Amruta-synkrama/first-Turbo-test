<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_profile extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('id')) {
			redirect('login');
		}
		if(!$this->session->userdata('user_data')) {
			redirect('dashboard');	
		} elseif($this->session->userdata('user_data')->entity != 'Admin') {
			redirect('dashboard');
		}

		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->model('user_model');
	}
	
	public function index() {
		$user_id = $this->session->userdata('id');
		$data['user_data'] = $this->user_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$this->load->view('templates/header', $data);
		$this->load->view('admin_profile', $data);
		$this->load->view('templates/footer', $data);
	}

	
	
	public function update_user_details() {
		$user_id = $this->session->userdata('id');
		$this->form_validation->set_rules('name','Name','trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('phone_number','Phone Number','trim|required|min_length[10]|max_length[15]|regex_match[/^[0-9-()]+$/]');

		if($this->form_validation->run()) {
			$data = array(
				'name'  => $this->input->post('name'),
				'phone_number'  => $this->input->post('phone_number')
			);
			if($this->user_model->update_user_data($data, $user_id)) {
				// $this->session->set_flashdata('user_message', 'Data updated');
				$this->session->set_flashdata('success_message', 'Data updated');
				redirect('admin_profile');
			} else {
				redirect('admin_profile');
			}
		} else {
			$this->index();
		}
	}

	public function update_user_details_password() {
		$user_id = $this->session->userdata('id');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|matches[password]');

		if($this->form_validation->run()) {
			$verification_key = md5(rand());
			$encrypted_password = $this->encryption->encrypt($this->input->post('password'));
			$data = array(
				'password'  => $encrypted_password
			);
			if($this->user_model->update_user_data($data, $user_id)) {
				// $this->session->set_flashdata('user_message', 'Data updated');
				$this->session->set_flashdata('success_message', 'Data updated');
				redirect('admin_profile');
			} else {
				redirect('admin_profile');
			}
		} else {
			$this->index();
		}
	}

	public function upload_logo(){

		$user_id = $this->session->userdata('id');

		if(!empty($_FILES['logo'])) {
			$file = $_FILES['logo']['name'];
			$config['upload_path'] = './assets/img/logos/';
			$config['allowed_types'] = 'jpg|jpeg|png|JPG';
			$config['max_size'] = 2000;
			$config['max_width'] = 1500;
			$config['max_height'] = 1500;
			$this->load->library('upload');
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('logo')) {
				$this->session->set_flashdata('error_upload_message', $this->upload->display_errors());
				redirect('admin_profile');
			} else {
				$upload_data = $this->upload->data();
				print_r($upload_data);
			}

			$data['user_logo'] = 'assets/img/logos/'.$file;

			if($this->user_model->update_user_data($data, $user_id)) {
				// $this->session->set_flashdata('upload_message', 'Data updated');
				$this->session->set_flashdata('success_message', 'Data updated');
				$data_user_data = $this->user_model->get_user_data($user_id);
				$this->session->set_userdata('user_data', $data_user_data);
				redirect('admin_profile');
			} else {
				redirect('admin_profile');
			}
		}
		
	}


	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	*/
	public function upload_logos() {
	    $data = $_POST['image'];
	 
	    list($type, $data) = explode(';', $data);
	    list(, $data)      = explode(',', $data);
	 
	    $data = base64_decode($data);
	    $imageName = time().'.png';
	    file_put_contents('assets/img/logos/'.$imageName, $data);

	    /*$file = $data;
	    $config['upload_path'] = './assets/img/logos/';
	    $config['allowed_types'] = 'jpg|jpeg|png|JPG';
	    $config['max_size'] = 2000;
	    $config['max_width'] = 1500;
	    $config['max_height'] = 1500;
	    $this->load->library('upload');
	    $this->upload->initialize($config);

	    if (!$this->upload->do_upload($imageName)) {
	    	$this->session->set_flashdata('error_upload_message', $this->upload->display_errors());
	    	redirect('admin_profile');
	    } else {
	    	$upload_data = $this->upload->data();
	    	print_r($upload_data);
	    }*/

	    // $data['user_logo'] = 'assets/img/logos/'.$imageName;
	 
	    echo 'assets/img/logos/'.$imageName;
	}

	public function save_logos() {

		$user_id = $this->session->userdata('id');

		$data['user_logo'] = $this->input->post('logo_url');

		if($data['user_logo']) {
			if($this->user_model->update_user_data($data, $user_id)) {
				// $this->session->set_flashdata('upload_message', 'Data updated');
				$this->session->set_flashdata('success_message', 'Data updated');
				$data_user_data = $this->user_model->get_user_data($user_id);
				$this->session->set_userdata('user_data', $data_user_data);
				redirect('admin_profile');
			} else {
				redirect('admin_profile');
			}
		} else {
			redirect('admin_profile');
		}

	}


}
/* End of file '/Admin_profile.php' */
/* Location: ./application/controllers//Admin_profile.php */
