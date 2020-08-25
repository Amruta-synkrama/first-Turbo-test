<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hotel_branch extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('id')) {
			redirect('login');
		}
		if(!$this->session->userdata('user_data')) {
			redirect('dashboard');	
		} elseif($this->session->userdata('user_data')->entity != 'Hotel') {
			redirect('dashboard');
		}

		$this->load->library('form_validation');
		$this->load->model('hotel_profile_model');
		$this->load->model('hotel_branches_model');
	}
	
	public function index() {
		$branch_id = $this->input->get('branch');
		$user_id = $this->session->userdata('id');
		$data['hotel_data'] = $this->hotel_profile_model->get_hotel_data($user_id);
		$data['hotel_locations'] = $this->hotel_branches_model->get_location_data($user_id,$branch_id);
		$data['user_data'] = $this->hotel_profile_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$data['state_data'] = $this->hotel_branches_model->get_state();
		$data['location_data'] = $this->hotel_branches_model->get_city(NULL);
		$data['branch_id'] = $branch_id;
		$this->load->view('templates/header', $data);
		$this->load->view('hotel_branch', $data);
		$this->load->view('templates/footer', $data);
	}
		
	public function validation() {
		$user_id = $this->session->userdata('id');
		$branch_id = $this->input->get('branch');
		$this->form_validation->set_rules('branch_name', 'Branch Name', 'required|trim');
		$this->form_validation->set_rules('location_id', 'Location', 'required|trim');
		$this->form_validation->set_rules('state_id', 'State', 'required|trim');
		
		if($this->form_validation->run()) {
			$data = array(
				'branch_name'  => $this->input->post('branch_name'),
				'location_id'  => $this->input->post('location_id'),
				'hotel_id'  => $user_id,
			);
			if($branch_id) {
				$id = $this->hotel_branches_model->update_branch($branch_id,$data);
			} else {
				$id = $this->hotel_branches_model->add_branch($data);
			}
			if($id) {
				$this->session->set_flashdata('success_message', 'Success');
				redirect('hotel_branches');
			}
		} else {
			$this->index();
		}
	}
}
/* End of file '/Hotel_branch.php' */
/* Location: ./application/controllers//Hotel_branch.php */
