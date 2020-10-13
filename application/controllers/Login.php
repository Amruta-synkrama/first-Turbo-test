<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('id')) {
			redirect('dashboard');
		}
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->model('register_model');
		$this->load->model('verify_otp_model');
	}

	function index() {
		// $this->load->view('templates/header');
		$this->load->view('login');
		// $this->load->view('templates/footer');
	}

	function forgot_password() {
		// $this->load->view('templates/header');
		$this->load->view('forgot_password');
		// $this->load->view('templates/footer');
	}

	function reset_password() {
		$token = $this->input->get('cid');
		if(!empty($token)) {
			// $this->load->view('templates/header');
			$this->load->view('reset_password');
			// $this->load->view('templates/footer');
		} else {
			redirect('login');
		}
		// $this->load->view('reset_password');
	}

	function validation() {
		$this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run()) {
			$result = $this->register_model->can_login($this->input->post('email'), $this->input->post('password'));
			if($result == '') {
				$result = $this->verify_otp_model->send_otp($this->input->post('email'));
				$this->session->set_flashdata('success_message',$result);
				redirect('verify_otp');
			} elseif($result == '1'){
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('message',$result);
				redirect('login');
			}
		} else {
			$this->index();
		}
	}

	function forgot_password_validation() {
		$this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
		if($this->form_validation->run()) {
			$result = $this->register_model->reset_password_link($this->input->post('email'));
			if($result == '') {
				$this->session->set_flashdata('success_message','Reset password mail sent successfully. Please check email.');
				redirect('login');
			} else {
				$this->session->set_flashdata('message',$result);
				redirect('login/forgot_password');
			}
		} else {
			$this->index();
		}
	}

	function reset_password_validation() {
		$token = $this->input->get('cid');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|matches[password]');
		if(!empty($token)) {
			$user_id = $this->register_model->check_password_token($token);
			if($user_id) {
				if($this->form_validation->run()) {
					$verification_key = md5(rand());
					$encrypted_password = $this->encryption->encrypt($this->input->post('password'));
					$result = $this->register_model->update_password($user_id,$encrypted_password);
					if($result == '') {
						$this->session->set_flashdata('success_message','Password Reset successfully. Please login.');
						redirect('login');
					} else {
						$this->session->set_flashdata('message',$result);
						redirect('login/forgot_password?cid='.$token);
					}
				} else {
					$this->index();
				}
			} else {
				$this->session->set_flashdata('message','Invalid Token');
				redirect('login/forgot_password');
			}
		} else {
			echo "12132132132";
			die();
			// redirect('login');
		}
	}

}

