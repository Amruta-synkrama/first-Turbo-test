<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hotel_employees extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('id')) {
			redirect('login');
		}
		if(!$this->session->userdata('user_data')) {
			redirect('dashboard');	
		} elseif($this->session->userdata('user_data')->entity != 'Hotel' && $this->session->userdata('user_data')->entity != 'Admin') {
			redirect('dashboard');
		}

		$this->load->library('form_validation');
		$this->load->model('user_model');
		$this->load->model('user_lists_model');
	}
	
	public function index() {
		$user_id = $this->session->userdata('id');
		$data['hotel_data'] = array();
		if($this->session->userdata('user_data')->entity == 'Hotel') {
			$data['hotel_data'] = $this->user_model->get_hotel_data($user_id);
		}
		$data['user_data'] = $this->user_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$data['hotels_emp_data'] = $this->user_lists_model->get_hotels_employee();
		$this->load->view('templates/header', $data);
		$this->load->view('hotel_employees', $data);
		$this->load->view('templates/footer', $data);
	}

	public function delete() {
		$delete_request = $this->input->get('delete_request');
		if($delete_request) {
			$this->user_model->delete_user($delete_request);
		}
		$this->session->set_flashdata('success_message', 'Deleted');
		redirect('hotel_employees');	
	}

	public function activate() {
		$activate_request = $this->input->get('activate_request');
		if($activate_request) {
			$this->user_model->activate_user($activate_request);
		}
		$this->session->set_flashdata('success_message', 'Activated');
		redirect('hotel_employees');	
	}
}
/* End of file '/Hotel_employees.php' */
/* Location: ./application/controllers//Hotel_employees.php */
