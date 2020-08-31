<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Link extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('id')) {
			redirect('login');
		}
		if($this->session->userdata('user_data')->entity == 'RFP') {
			redirect('dashboard');
		}

		$this->load->library('form_validation');
		$this->load->model('user_model');
		$this->load->model('links_model');
	}
	
	public function index() {
		$link_id = $this->input->get('link_id');
		$user_id = $this->session->userdata('id');
		$hotel_id = $this->input->get('hotel_id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			if(!$hotel_id) {
				redirect('links');
			}
		} else {
			$hotel_id = $user_id;
		}
		$data['hotel_locations'] = array();
		// if($this->session->userdata('user_data')->entity == 'Hotel') {
			$data['hotel_data'] = $this->user_model->get_hotel_data($hotel_id);
			$data['hotel_locations'] = $this->links_model->get_hotel_locations($hotel_id);
		// }
		$data['hotel_user_data'] = $this->user_model->get_user_data($hotel_id);
		$data['user_data'] = $this->user_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$data['links_data'] = $this->links_model->get_links($link_id,$hotel_id,'Hotel');
		$data['link_id'] = $link_id;
		$data['hotel_id'] = $hotel_id;
		$data['companies_data'] = $this->links_model->get_companies();

		$this->load->view('templates/header', $data);
		$this->load->view('link', $data);
		$this->load->view('templates/footer', $data);
	}
		
	public function validation() {
		$user_id = $this->session->userdata('id');
		$link_id = $this->input->get('link_id');
		$hotel_id = $this->input->get('hotel_id');
		if(!$hotel_id) {
			$hotel_id = $user_id;
		}
		$regex_match = "/[(http(s)?):\/\/(www\.)?a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/";
		$this->form_validation->set_rules('hotel_location_id', 'Location', 'required|trim');
		$this->form_validation->set_rules('company_id', 'Company', 'required|trim');
		$this->form_validation->set_rules('url', 'URL', 'trim|required|valid_url');
		$this->form_validation->set_rules('expiration_date', 'Expiry Date', 'required|trim');


		if($this->form_validation->run()) {
			$expiry_date = $this->input->post('expiration_date');
			$todaydate = date("Y-m-d H:i:s");
			$expiry_date = date("Y-m-d H:i:s",strtotime($expiry_date));
			if($todaydate > $expiry_date) {
				$this->session->set_flashdata('error_message', 'Date must be valid');
				if($this->session->userdata('user_data')->entity == 'Admin') {
					redirect('links?hotel_id='.$hotel_id);
				} else {
					redirect('links');
				}
			}
			$data = array(
				'hotel_location_id'  => $this->input->post('hotel_location_id'),
				'company_id'  => $this->input->post('company_id'),
				'url'  => $this->input->post('url'),
				'expiration_date'  => $expiry_date,
				// 'link_status'  => '2'
			);
			/*print_r($data);
			print_r($expiry_date);*/
			if($link_id) {
				$update_id = $this->links_model->update_link($link_id,$data);
			} else {
				$add_id = $this->links_model->add_link($data);
			}
			if($add_id) {
				$this->session->set_flashdata('success_message', 'Added successfully');
			} elseif($update_id) {
				$this->session->set_flashdata('success_message', 'Updated successfully');
			}
			if($this->session->userdata('user_data')->entity == 'Admin') {
				redirect('links?hotel_id='.$hotel_id);
			} else {
				redirect('links');
			}
		} else {
			$this->index();
		}
	}
}
/* End of file '/Link.php' */
/* Location: ./application/controllers//Link.php */
