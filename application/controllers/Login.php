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

	function validation() {
		$this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run()) {
			$result = $this->register_model->can_login($this->input->post('email'), $this->input->post('password'));
			if($result == '') {
				// redirect('dashboard');
				$result = $this->verify_otp_model->send_otp($this->input->post('email'));
				$this->session->set_flashdata('success_message',$result);
				redirect('verify_otp');
			} else {
				$this->session->set_flashdata('message',$result);
				redirect('login');
			}
		} else {
			$this->index();
		}
	}

}

