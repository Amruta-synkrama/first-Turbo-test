<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hotels extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('id')) {
			redirect('login');
		}
		if(!$this->session->userdata('user_data')) {
			redirect('dashboard');	
		} elseif($this->session->userdata('user_data')->entity == 'Hotel') {
			redirect('dashboard');
		}

		$this->load->library('form_validation');
		$this->load->model('user_model');
		$this->load->model('user_lists_model');
	}
	
	public function index() {
		$user_id = $this->session->userdata('id');
		$data['company_data'] = array();
		if($this->session->userdata('user_data')->entity == 'RFP') {
			$data['company_data'] = $this->user_model->get_company_data($user_id);
		}
		$data['user_data'] = $this->user_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$data['hotels_data'] = $this->user_lists_model->get_hotels(NULL);
		$this->load->view('templates/header', $data);
		$this->load->view('hotels', $data);
		$this->load->view('templates/footer', $data);
	}

	public function delete() {
		$delete_request = $this->input->get('delete_request');
		if($delete_request) {
			$this->user_model->delete_user($delete_request);
		}
		$this->session->set_flashdata('success_message', 'Deleted');
		redirect('hotels');	
	}

	public function activate() {
		$activate_request = $this->input->get('activate_request');
		if($activate_request) {
			$this->user_model->activate_user($activate_request);
		}
		$this->session->set_flashdata('success_message', 'Activated');
		redirect('hotels');	
	}
		
}
/* End of file '/Hotels.php' */
/* Location: ./application/controllers//Hotels.php */
