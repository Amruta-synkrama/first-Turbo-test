<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Company_profile extends CI_Controller {
	
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
		$this->load->model('company_profile_model');
	}
	
	public function index() {
		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$company_id = $this->input->get('company_id');
			if(!$company_id) {
				redirect('dashboard');		
			}
		} else {
			$company_id = $user_id;
		}
		$data['company_data'] = $this->company_profile_model->get_company_data($company_id);
		$data['company_user_data'] = $this->company_profile_model->get_user_data($company_id);
		$data['user_data'] = $this->company_profile_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$this->load->view('templates/header', $data);
		$this->load->view('company_profile', $data);
		$this->load->view('templates/footer', $data);
	}

	
	
	public function update_company_details() {
		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$company_id = $this->input->get('company_id');
		} else {
			$company_id = $user_id;
		}
		$this->form_validation->set_rules('website','Website','trim|required');
		$this->form_validation->set_rules('headquater','Headquater','trim|required');
		$this->form_validation->set_rules('cover','Cover','trim|required');

		if($this->form_validation->run()) {
			$data = array(
				'website'  => $this->input->post('website'),
				'headquater'  => $this->input->post('headquater'),
				'cover'  => $this->input->post('Cover')
			);
			if($this->company_profile_model->update_company_data($data, $company_id)) {
				$this->session->set_flashdata('company_message', 'Data updated');
				$this->session->set_flashdata('update_message', 'Data updated');
				if($this->session->userdata('user_data')->entity == 'Admin') {
					redirect('company_profile?company_id='.$company_id);
				} else {
					redirect('company_profile');
				}
			} else {
				if($this->session->userdata('user_data')->entity == 'Admin') {
					redirect('company_profile?company_id='.$company_id);
				} else {
					redirect('company_profile');
				}
			}
		} else {
			$this->index();
		}
	}

	public function update_contact_details() {
		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$company_id = $this->input->get('company_id');
		} else {
			$company_id = $user_id;
		}
		$this->form_validation->set_rules('contact_name','Contact Name','trim|required');
		$this->form_validation->set_rules('contact_email','Conatct Email','trim|required|valid_email');
		$this->form_validation->set_rules('contact_no','Contact No','trim|required');

		if($this->form_validation->run()) {
			$data = array(
				'contact_name'  => $this->input->post('contact_name'),
				'contact_email'  => $this->input->post('contact_email'),
				'contact_no'  => $this->input->post('contact_no')
			);
			if($this->company_profile_model->update_company_data($data, $company_id)) {
				$this->session->set_flashdata('contact_message', 'Data updated');
				$this->session->set_flashdata('update_message', 'Data updated');
				if($this->session->userdata('user_data')->entity == 'Admin') {
					redirect('company_profile?company_id='.$company_id);
				} else {
					redirect('company_profile');
				}
			} else {
				if($this->session->userdata('user_data')->entity == 'Admin') {
					redirect('company_profile?company_id='.$company_id);
				} else {
					redirect('company_profile');
				}
			}
		} else {
			$this->index();
		}
	}

	public function update_user_details() {
		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$company_id = $this->input->get('company_id');
		} else {
			$company_id = $user_id;
		}
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('phone_number','Phone Number','trim|required');

		if($this->form_validation->run()) {
			$data = array(
				'name'  => $this->input->post('name'),
				'phone_number'  => $this->input->post('phone_number')
			);
			if($this->company_profile_model->update_user_data($data, $company_id)) {
				$this->session->set_flashdata('user_message', 'Data updated');
				$this->session->set_flashdata('update_message', 'Data updated');
				if($this->session->userdata('user_data')->entity == 'Admin') {
					redirect('company_profile?company_id='.$company_id);
				} else {
					redirect('company_profile');
				}
			} else {
				if($this->session->userdata('user_data')->entity == 'Admin') {
					redirect('company_profile?company_id='.$company_id);
				} else {
					redirect('company_profile');
				}
			}
		} else {
			$this->index();
		}
	}
}
/* End of file '/Company_profile.php' */
/* Location: ./application/controllers//Company_profile.php */
