<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Verify_otp extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('id')) {
			// redirect('dashboard');
		}
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->model('register_model');
		$this->load->model('verify_otp_model');
	}

	function index() {
		// $this->load->view('templates/header');
		$this->load->view('verify_otp');
		// $this->load->view('templates/footer');
	}

	function validation() {
		$email = $_COOKIE['otp_email'];
		$this->form_validation->set_rules('otp', 'OTP', 'trim|required|numeric|min_length[5]|max_length[5]');
		if($this->form_validation->run()) {
			$result = $this->verify_otp_model->verify_otp($email, $this->input->post('otp'));
			if($result == '') {
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('message',$result);
				redirect('verify_otp');
			}
		} else {
			$this->index();
		}
	}

	function resend_otp() {
		$email = $_COOKIE['otp_email'];
		if(isset($email) && !empty($email)) {
			$result = $this->verify_otp_model->resend_otp($email);
			$this->session->set_flashdata('success_message',$result);
			redirect('verify_otp');
		} else {
			$this->index();
		}
	}

}
/* End of file '/Verify_otp.php' */
/* Location: ./application/controllers//Verify_otp.php */
