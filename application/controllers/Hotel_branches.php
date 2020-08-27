<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hotel_branches extends CI_Controller {

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
		$this->load->model('hotel_branches_model');
	}
	
	public function index() {
		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$hotel_id = $this->input->get('hotel_id');
			if(!$hotel_id) {
				redirect('dashboard');		
			}
		} else {
			$hotel_id = $user_id;
		}
		$data['hotel_data'] = $this->hotel_profile_model->get_hotel_data($hotel_id);
		$data['hotel_locations'] = $this->hotel_branches_model->get_location_data($hotel_id);
		$data['hotel_user_data'] = $this->hotel_profile_model->get_user_data($hotel_id);
		$data['user_data'] = $this->hotel_profile_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$this->load->view('templates/header', $data);
		$this->load->view('hotel_branches', $data);
		$this->load->view('templates/footer', $data);

	}
		
	
	public function delete() {
		$branch_id = $this->input->get('delete_branch');
		if($branch_id) {
			$this->hotel_branches_model->delete_branch($branch_id);
		}
		$this->session->set_flashdata('delete_message', 'Deleted');
		redirect('hotel_branches');	
	}
}
/* End of file '/Hotel_branches.php' */
/* Location: ./application/controllers//Hotel_branches.php */
