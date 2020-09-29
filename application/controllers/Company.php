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
		$this->load->model('user_model');
		$this->load->model('user_lists_model');
	}
	
	public function index() {
		$company_id = $this->input->get('id');
		$user_id = $this->session->userdata('id');
		$data['hotel_data'] = array();
		if($this->session->userdata('user_data')->entity == 'Hotel') {
			$data['hotel_data'] = $this->user_model->get_hotel_data($user_id);
		}
		if($this->session->userdata('user_data')->entity == 'RFP_EMP') {
			$data['company_emp_data'] = $this->user_model->get_company_emp_data($user_id);	
			$company_id = $data['company_emp_data']->company_id;
		}
		$data['user_data'] = $this->user_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$data['companies_data'] = $this->user_lists_model->get_companies($company_id)[0];
		$data['company_links_count'] = $this->user_model->get_links_count($company_id, 'RFP');
		$data['hotels_count'] = $this->user_model->get_hotels_count_company($company_id);
		$data['company_id'] = $company_id;
		/*if($data['companies_data']->status == '2') {
			redirect('404');
		}*/
		if(empty($data['companies_data'])) {
			redirect('404');
		}
		$this->load->view('templates/header', $data);
		$this->load->view('company', $data);
		$this->load->view('templates/footer', $data);
	}

}
/* End of file '/Company.php' */
/* Location: ./application/controllers//Company.php */
