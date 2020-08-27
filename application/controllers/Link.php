<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Link extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('id')) {
			redirect('login');
		}
		if($this->session->userdata('user_data')->entity == 'RPF') {
			redirect('dashboard');
		}

		$this->load->library('form_validation');
		$this->load->model('hotel_profile_model');
		$this->load->model('company_profile_model');
		$this->load->model('links_model');
	}
	
	public function index() {
		$link_id = $this->input->get('link_id');
		$user_id = $this->session->userdata('id');
		$data['hotel_locations'] = array();
		if($this->session->userdata('user_data')->entity == 'Hotel') {
			$data['hotel_data'] = $this->hotel_profile_model->get_hotel_data($user_id);
			$data['hotel_locations'] = $this->links_model->get_hotel_locations($user_id);
		}
		$data['user_data'] = $this->hotel_profile_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$data['links_data'] = $this->links_model->get_links($link_id,$user_id,$this->session->userdata('user_data')->entity);
		$data['link_id'] = $link_id;
		$data['companies_data'] = $this->links_model->get_companies();

		$this->load->view('templates/header', $data);
		$this->load->view('link', $data);
		$this->load->view('templates/footer', $data);
	}
		
	public function validation() {
		$user_id = $this->session->userdata('id');
		$link_id = $this->input->get('link_id');
		$this->form_validation->set_rules('hotel_location_id', 'Location', 'required|trim');
		$this->form_validation->set_rules('company_id', 'Company', 'required|trim');
		$this->form_validation->set_rules('url', 'URL', 'required|trim');
		$this->form_validation->set_rules('expiration_date', 'Expiry Date', 'required|trim');


		if($this->form_validation->run()) {
			$expiry_date = $this->input->post('expiration_date');
			$expiry_date = date("Y-m-d H:i:s",strtotime($expiry_date));
			$data = array(
				'hotel_location_id'  => $this->input->post('hotel_location_id'),
				'company_id'  => $this->input->post('company_id'),
				'url'  => $this->input->post('url'),
				'expiration_date'  => $expiry_date,
				'link_status'  => '2'
			);
			/*print_r($data);
			print_r($expiry_date);*/
			if($link_id) {
				$update_id = $this->links_model->update_link($link_id,$data);
			} else {
				$add_id = $this->links_model->add_link($data);
			}
			if($add_id) {
				$this->session->set_flashdata('success_message', 'Success');
			} elseif($update_id) {
				$this->session->set_flashdata('update_message', 'Success');
			}
			redirect('links');
		} else {
			$this->index();
		}
	}
}
/* End of file '/Link.php' */
/* Location: ./application/controllers//Link.php */
