<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Enquiry_data extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('id')) {
			redirect('login');
		}
		if(!$this->session->userdata('user_data')) {
			redirect('dashboard');	
		} elseif($this->session->userdata('user_data')->entity != 'Admin') {
			redirect('dashboard');
		}

		$this->load->library('form_validation');
		$this->load->model('user_model');
		$this->load->model('enquiry_data_model');
		$this->load->model('enquiry_data_csv_model');
	}
	
	public function index() {
		$form_id = $this->input->get('form_id');
		/*if(!$form_id) {
			redirect('dashboard');
		}*/
		$user_id = $this->session->userdata('id');
		$data['user_data'] = $this->user_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$data['contact_data'] = $this->enquiry_data_model->get_contacts($form_id, NULL);
		$this->load->view('templates/header', $data);
		$this->load->view('enquiry_data', $data);
		$this->load->view('templates/footer', $data);
	}

	public function list() {
		$form_id = $this->input->get('form_id');
		if(!$form_id) {
			redirect('enquiry_data');
		}
		$user_id = $this->session->userdata('id');
		$data['user_data'] = $this->user_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$data['contact_data'] = $this->enquiry_data_model->get_contacts($form_id, NULL);
		$this->load->view('templates/header', $data);
		$this->load->view('enquiry_data_list', $data);
		$this->load->view('templates/footer', $data);
	}

	public function delete() {
		$delete_request = $this->input->get('delete_request');
		$form_id = $this->input->get('form_id');
		if($delete_request) {
			$this->enquiry_data_model->delete_contact_enquiry($delete_request);
		}
		$this->session->set_flashdata('success_message', 'Deleted');
		if(!$form_id) {
			redirect('enquiry_data');
		} else {
			redirect('enquiry_data/list?form_id='.$form_id);	
		}
	}
		
	public function view() {
		$form_id = $this->input->get('form_id');
		$enquiry_id = $this->input->get('enquiry_id');
		if(!$form_id) {
			redirect('enquiry_data');
		} elseif(!$enquiry_id) {
			redirect('enquiry_data/list?form_id='.$form_id);	
		}
		$user_id = $this->session->userdata('id');
		$data['user_data'] = $this->user_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$data['contact_data'] = $this->enquiry_data_model->get_contacts($form_id,$enquiry_id)[0];
		$this->load->view('templates/header', $data);
		$this->load->view('enquiry_data_detail', $data);
		$this->load->view('templates/footer', $data);
	}

	public function show_meter() {
		$form_id = $this->input->get('form_id');
		$enquiry_id = $this->input->get('enquiry_id');
		if($enquiry_id) {
			$this->enquiry_data_model->show_contact_enquiry($enquiry_id);
		}
		$this->session->set_flashdata('success_message', 'Updated');
		if(!$form_id) {
			redirect('enquiry_data');
		} elseif(!$enquiry_id) {
			redirect('enquiry_data/list?form_id='.$form_id);	
		}
		redirect('enquiry_data/list?form_id='.$form_id);	
	}

	public function remove_meter() {
		$form_id = $this->input->get('form_id');
		$enquiry_id = $this->input->get('enquiry_id');
		if($enquiry_id) {
			$this->enquiry_data_model->remove_contact_enquiry($enquiry_id);
		}
		$this->session->set_flashdata('success_message', 'Updated');
		if(!$form_id) {
			redirect('enquiry_data');
		} elseif(!$enquiry_id) {
			redirect('enquiry_data/list?form_id='.$form_id);	
		}
		redirect('enquiry_data/list?form_id='.$form_id);	
	}

	public function export_csv_data() {
		$form_id = $this->input->get('form_id');
		$enquiry_id = $this->input->get('enquiry_id');
		$this->session->set_flashdata('success_message', 'Updated');
		$this->enquiry_data_csv_model->download_csv_file($form_id);
		if(!$form_id) {
			redirect('enquiry_data');
		} elseif(!$enquiry_id) {
			redirect('enquiry_data/list?form_id='.$form_id);	
		}
		redirect('enquiry_data/list?form_id='.$form_id);	
	}

	
}
/* End of file '/Enquiry_data.php' */
/* Location: ./application/controllers//Enquiry_data.php */
