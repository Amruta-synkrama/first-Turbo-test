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
		} elseif($this->session->userdata('user_data')->entity == 'RFP') {
			redirect('dashboard');
		}

		$this->load->library('form_validation');
		$this->load->model('user_model');
		$this->load->model('hotel_branches_model');
	}
	
	public function index() {
		$branch_id = $this->input->get('branch');
		$user_id = $this->session->userdata('id');
		$hotel_id = $user_id;
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$hotel_id = $this->input->get('hotel_id');
		}
		$data['hotel_data'] = $this->user_model->get_hotel_data($hotel_id);
		$data['hotel_locations'] = $this->hotel_branches_model->get_location_data($hotel_id,$branch_id);
		$data['hotel_user_data'] = $this->user_model->get_user_data($hotel_id);
		$data['user_data'] = $this->user_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$data['state_data'] = $this->hotel_branches_model->get_state();
		$data['location_data'] = array();
		if($data['hotel_locations']) {
			$data['state_id_data'] = $this->hotel_branches_model->get_city(NULL, $data['hotel_locations'][0]->ID);
			$data['location_data'] = $this->hotel_branches_model->get_city($data['state_id_data'][0]->ID);
		}
		$data['branch_id'] = $branch_id;
		$this->load->view('templates/header', $data);
		$this->load->view('hotel_branch', $data);
		$this->load->view('templates/footer', $data);
	}
		
	public function validation() {
		$user_id = $this->session->userdata('id');
		$hotel_id = $user_id;
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$hotel_id = $this->input->get('hotel_id');
		}
		$branch_id = $this->input->get('branch');
		$this->form_validation->set_rules('branch_name', 'Branch Name', 'required|trim|is_unique[tr_hotel_locations.branch_name]');
		$this->form_validation->set_rules('location_id', 'Location', 'required|trim');
		$this->form_validation->set_rules('state_id', 'State', 'required|trim');
		
		if($this->form_validation->run()) {
			$data = array(
				'branch_name'  => $this->input->post('branch_name'),
				'location_id'  => $this->input->post('location_id'),
				'hotel_id'  => $hotel_id,
			);
			if($branch_id) {
				$update_id = $this->hotel_branches_model->update_branch($branch_id,$data);
			} else {
				$add_id = $this->hotel_branches_model->add_branch($data);
			}
			if($add_id) {
				$this->session->set_flashdata('success_message', 'Added successfully.');
			} elseif($update_id) {
				$this->session->set_flashdata('success_message', 'Updated successfully');
			}
			if($this->session->userdata('user_data')->entity == 'Admin') {
				redirect('hotel_branches?hotel_id='.$hotel_id);
			} else {
				redirect('hotel_branches');
			}
		} else {
			$this->index();
		}
	}

	public function get_cities() {
		$value = $this->input->post();
		// print_r($value['value']); 
		$location_data = $this->hotel_branches_model->get_city($value['value']);
		ob_start();
		?>
		<option selected disabled>Select one</option>
		<?php
		foreach ($location_data as $location) :
		?>
		<option value="<?php echo $location->ID ?>"><?php echo $location->LOCATION ?></option>
		<?php
		endforeach;
		$html = ob_get_clean();
		echo $html;
		// print_r($location_data);
	}
}
/* End of file '/Hotel_branch.php' */
/* Location: ./application/controllers//Hotel_branch.php */
