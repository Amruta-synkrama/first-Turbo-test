<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hotel extends CI_Controller {

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
		$this->load->model('company_profile_model');
		$this->load->model('hotels_model');
		$this->load->model('hotel_branches_model');
	}
	
	public function index() {
		$hotel_id = $this->input->get('id');
		$user_id = $this->session->userdata('id');
		$data['company_data'] = array();
		if($this->session->userdata('user_data')->entity == 'RFP') {
			$data['company_data'] = $this->company_profile_model->get_company_data($user_id);
		}
		$data['user_data'] = $this->company_profile_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$data['hotels_data'] = $this->hotels_model->get_hotels($hotel_id)[0];
		$data['hotel_locations'] = $this->hotel_branches_model->get_location_data($hotel_id);
		$data['hotel_id'] = $hotel_id;
		$this->load->view('templates/header', $data);
		$this->load->view('hotel', $data);
		$this->load->view('templates/footer', $data);
	}
		
}
/* End of file '/Hotel.php' */
/* Location: ./application/controllers//Hotel.php */
