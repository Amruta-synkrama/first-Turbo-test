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
		$this->load->model('user_model');
		$this->load->model('user_lists_model');
		$this->load->model('hotel_branches_model');
	}
	
	public function index() {
		$hotel_id = $this->input->get('id');
		$user_id = $this->session->userdata('id');
		$data['company_data'] = array();
		if($this->session->userdata('user_data')->entity == 'RFP') {
			$data['company_data'] = $this->user_model->get_company_data($user_id);
		}
		if($this->session->userdata('user_data')->entity == 'Hotel_EMP') {
			$data['hotel_emp_data'] = $this->user_model->get_hotel_emp_data($user_id);	
			$hotel_id = $data['hotel_emp_data']->hotel_id;
		}
		$data['user_data'] = $this->user_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$data['hotels_data'] = $this->user_lists_model->get_hotels($hotel_id)[0];
		$data['hotel_locations'] = $this->hotel_branches_model->get_location_data($hotel_id);
		$data['hotel_links_count'] = $this->user_model->get_links_count($hotel_id, 'Hotel');
		$data['amenities_general_data'] = $this->user_model->get_general_amenities();
		$data['amenities_data'] = $this->user_model->get_amenities($hotel_id,'amenities');
		$data['nearby_data'] = $this->user_model->get_amenities($hotel_id,'nearby');
		$data['restaurants_data'] = $this->user_model->get_amenities($hotel_id,'restaurants');
		$data['gallery_data'] = $this->user_model->get_amenities($hotel_id,'hotel_gallery');
		$data['controller'] = $this;
		$data['hotel_id'] = $hotel_id;
		/*if($data['hotels_data']->status == '2') {
			redirect('404');
		}*/
		if(empty($data['hotels_data'])) {
			redirect('404');
		}
		$this->load->view('templates/header', $data);
		$this->load->view('hotel', $data);
		$this->load->view('templates/footer', $data);
	}


	public function hotel_search_amenities($value) {
		return $this->user_model->search_amenities($value);
	}
		
}
/* End of file '/Hotel.php' */
/* Location: ./application/controllers//Hotel.php */
