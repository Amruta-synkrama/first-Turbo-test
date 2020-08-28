<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hotel_profile extends CI_Controller {

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
		$this->load->library('encryption');
		$this->load->model('user_model');
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
		$data['hotel_data'] = $this->user_model->get_hotel_data($hotel_id);
		$data['hotel_user_data'] = $this->user_model->get_user_data($hotel_id);
		$data['user_data'] = $this->user_model->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$this->load->view('templates/header', $data);
		$this->load->view('hotel_profile', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function update_hotel_details() {
		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$hotel_id = $this->input->get('hotel_id');
		} else {
			$hotel_id = $user_id;
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
			if($this->user_model->update_hotel_data($data, $hotel_id)) {
				$this->session->set_flashdata('hotel_message', 'Data updated');
				$this->session->set_flashdata('success_message', 'Data updated');
				if($this->session->userdata('user_data')->entity == 'Admin') {
					redirect('hotel_profile?hotel_id='.$hotel_id);
				} else {
					redirect('hotel_profile');
				}
			} else {
				if($this->session->userdata('user_data')->entity == 'Admin') {
					redirect('hotel_profile?hotel_id='.$hotel_id);
				} else {
					redirect('hotel_profile');
				}
			}
		} else {
			$this->index();
		}
	}
	
	public function update_contact_details() {
		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$hotel_id = $this->input->get('hotel_id');
		} else {
			$hotel_id = $user_id;
		}
		$this->form_validation->set_rules('contact_name','Contact Name','trim|required');
		$this->form_validation->set_rules('contact_email','Contact Email','trim|required|valid_email');
		$this->form_validation->set_rules('contact_no','Contact No','trim|required');

		if($this->form_validation->run()) {
			$data = array(
				'contact_name'  => $this->input->post('contact_name'),
				'contact_email'  => $this->input->post('contact_email'),
				'contact_no'  => $this->input->post('contact_no')
			);
			if($this->user_model->update_hotel_data($data, $hotel_id)) {
				$this->session->set_flashdata('contact_message', 'Data updated');
				$this->session->set_flashdata('success_message', 'Data updated');
				if($this->session->userdata('user_data')->entity == 'Admin') {
					redirect('hotel_profile?hotel_id='.$hotel_id);
				} else {
					redirect('hotel_profile');
				}
			} else {
				if($this->session->userdata('user_data')->entity == 'Admin') {
					redirect('hotel_profile?hotel_id='.$hotel_id);
				} else {
					redirect('hotel_profile');
				}
			}
		} else {
			$this->index();
		}
	}

	public function update_user_details() {
		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$hotel_id = $this->input->get('hotel_id');
		} else {
			$hotel_id = $user_id;
		}
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('phone_number','Phone Number','trim|required');

		if($this->form_validation->run()) {
			$data = array(
				'name'  => $this->input->post('name'),
				'phone_number'  => $this->input->post('phone_number')
			);
			if($this->user_model->update_user_data($data, $hotel_id)) {
				$this->session->set_flashdata('user_message', 'Data updated');
				$this->session->set_flashdata('success_message', 'Data updated');
				if($this->session->userdata('user_data')->entity == 'Admin') {
					redirect('hotel_profile?hotel_id='.$hotel_id);
				} else {
					redirect('hotel_profile');
				}
			} else {
				if($this->session->userdata('user_data')->entity == 'Admin') {
					redirect('hotel_profile?hotel_id='.$hotel_id);
				} else {
					redirect('hotel_profile');
				}
			}
		} else {
			$this->index();
		}
	}


	public function update_user_details_password() {
		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$hotel_id = $this->input->get('hotel_id');
		} else {
			$hotel_id = $user_id;
		}
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|matches[password]');

		if($this->form_validation->run()) {
			$verification_key = md5(rand());
			$encrypted_password = $this->encryption->encrypt($this->input->post('password'));
			$data = array(
				'password'  => $encrypted_password
			);
			if($this->user_model->update_user_data($data, $hotel_id)) {
				$this->session->set_flashdata('user_message', 'Data updated');
				$this->session->set_flashdata('success_message', 'Data updated');
				if($this->session->userdata('user_data')->entity == 'Admin') {
					redirect('hotel_profile?hotel_id='.$hotel_id);
				} else {
					redirect('hotel_profile');
				}
			} else {
				if($this->session->userdata('user_data')->entity == 'Admin') {
					redirect('hotel_profile?hotel_id='.$hotel_id);
				} else {
					redirect('hotel_profile');
				}
			}
		} else {
			$this->index();
		}
	}

}
/* End of file '/Hotel_profile.php' */
/* Location: ./application/controllers//Hotel_profile.php */
