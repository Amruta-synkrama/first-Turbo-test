<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('id')) {
			redirect('login');
		}
		if(!$this->session->userdata('user_data')) {
			redirect('dashboard');	
		} elseif($this->session->userdata('user_data')->entity == 'RFP') {
			redirect('dashboard');
		}

		$this->load->library('form_validation');
		$this->load->model('hotel_profile_model');
		$this->load->model('companies_model');
	}
	
	public function index() {
		$company_id = $this->input->get('branch');
		$user_id = $this->session->userdata('id');
		$data['hotel_data'] = array();
		if($this->session->userdata('user_data')->entity == 'Hotel') {
			$data['hotel_data'] = $this->hotel_profile_model->get_hotel_data($user_id);
		}
		$data['user_data'] = $this->hotel_profile_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$data['companies_data'] = $this->companies_model->get_companies($company_id)[0];
		$this->load->view('templates/header', $data);
		$this->load->view('company', $data);
		$this->load->view('templates/footer', $data);
	}

}
/* End of file '/Company.php' */
/* Location: ./application/controllers//Company.php */
