<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Links extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('id')) {
			redirect('login');
		}

		$this->load->library('form_validation');
		$this->load->model('hotel_profile_model');
		$this->load->model('company_profile_model');
		$this->load->model('links_model');
	}
	
	public function index() {
		$user_id = $this->session->userdata('id');
		$user_role = $this->session->userdata('user_data')->entity;
		if($user_role == 'Hotel') {
			$data['hotel_data'] = $this->hotel_profile_model->get_hotel_data($user_id);
		} elseif($user_role == 'RFP') {
			$data['company_data'] = $this->company_profile_model->get_company_data($user_id);
		}
		$data['user_data'] = $this->hotel_profile_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$user_role_sent = $user_role;
		$user_id_sent = $user_id;
		if($user_role == 'Admin') {
			$hotel_id = $this->input->get('hotel_id');
			$company_id = $this->input->get('company_id');
			if($hotel_id){
				$user_role_sent = 'Hotel';
				$user_id_sent = $hotel_id;
			} elseif($company_id){
				$user_role_sent = 'RFP';
				$user_id_sent = $company_id;
			}
		}
		$data['links_data'] = $this->links_model->get_links(NULL,$user_id_sent,$user_role_sent);
		$this->load->view('templates/header', $data);
		$this->load->view('links', $data);
		$this->load->view('templates/footer', $data);
	}

	public function reject() {
		$reject_request = $this->input->get('reject_request');
		if($reject_request) {
			$this->links_model->reject_link($reject_request);
		}
		$this->session->set_flashdata('reject_message', 'Rejected');
		redirect('links');	
	}
		
}
/* End of file '/Links.php' */
/* Location: ./application/controllers//Links.php */
