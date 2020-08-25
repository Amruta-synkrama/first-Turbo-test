<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hotel extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('id')) {
			redirect('login');
		}
		if(!$this->session->userdata('user_data')) {
			redirect('dashboard');	
		} elseif($this->session->userdata('user_data')->entity != 'RPF') {
			redirect('dashboard');
		}

		$this->load->library('form_validation');
		$this->load->model('company_profile_model');
		$this->load->model('hotels_model');
	}
	
	public function index() {
		$hotel_id = $this->input->get('id');
		$user_id = $this->session->userdata('id');
		$data['company_data'] = $this->company_profile_model->get_company_data($user_id);
		$data['user_data'] = $this->company_profile_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$data['hotels_data'] = $this->hotels_model->get_hotels($hotel_id)[0];
		$this->load->view('templates/header', $data);
		$this->load->view('hotel', $data);
		$this->load->view('templates/footer', $data);
	}
		
}
/* End of file '/Hotel.php' */
/* Location: ./application/controllers//Hotel.php */
