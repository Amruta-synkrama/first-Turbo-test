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
		$this->load->library('encryption');
		$this->load->model('user_model');
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
		$data['company_data'] = $this->user_model->get_company_data($company_id);
		$data['company_user_data'] = $this->user_model->get_user_data($company_id);
		$data['user_data'] = $this->user_model->get_user_data($user_id);
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
		$this->form_validation->set_rules('website','Website','trim|required|valid_url');
		$this->form_validation->set_rules('headquarter','headquarter','trim|required');
		$this->form_validation->set_rules('cover','Cover','trim|required');

		if($this->form_validation->run()) {

			$data = array(
				'website'  => $this->input->post('website'),
				'headquarter'  => $this->input->post('headquarter'),
				'cover'  => $this->input->post('cover')
			);

			
			if($this->user_model->update_company_data($data, $company_id)) {
				// $this->session->set_flashdata('company_message', 'Data updated');
				$this->session->set_flashdata('success_message', 'Data updated');
				if($this->session->userdata('user_data')->entity == 'Admin') {
					redirect('company_profile?company_id='.$company_id);
				} else {
					$data_user_data = $this->user_model->get_user_data($company_id);
					$this->session->set_userdata('user_data', $data_user_data);
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



	public function upload_logo(){

		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$company_id = $this->input->get('company_id');
		} else {
			$company_id = $user_id;
		}
		// $this->form_validation->set_rules('logo','Logo','required');

		// if($this->form_validation->run()) {
			if(!empty($_FILES['logo'])) {
				$file = $_FILES['logo']['name'];
				$config['upload_path'] = './assets/img/logos/';
				$config['allowed_types'] = 'jpg|jpeg|png|JPG';
				$config['max_size'] = 2000;
				$config['max_width'] = 1500;
				$config['max_height'] = 1500;
				$this->load->library('upload');
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('logo')) {
					$this->session->set_flashdata('error_upload_message', $this->upload->display_errors());
					if($this->session->userdata('user_data')->entity == 'Admin') {
						redirect('company_profile?company_id='.$company_id);
					} else {
						redirect('company_profile');
					}
				} else {
					$upload_data = $this->upload->data();
					print_r($upload_data);
				}

				$data['user_logo'] = 'assets/img/logos/'.$file;

				if($this->user_model->update_user_data($data, $company_id)) {
					// $this->session->set_flashdata('upload_message', 'Data updated');
					$this->session->set_flashdata('success_message', 'Data updated');
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
			}
		/*} else {
			$this->index();
		}*/
	}

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	*/
	public function upload_logos() {
		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$company_id = $this->input->get('company_id');
		} else {
			$company_id = $user_id;
		}

	    $data = $_POST['image'];
	 
	    list($type, $data) = explode(';', $data);
	    list(, $data)      = explode(',', $data);
	 
	    $data = base64_decode($data);
	    $imageName = time().'.png';
	    file_put_contents('assets/img/logos/'.$imageName, $data);

	    /*$file = $data;
	    $config['upload_path'] = './assets/img/logos/';
	    $config['allowed_types'] = 'jpg|jpeg|png|JPG';
	    $config['max_size'] = 2000;
	    $config['max_width'] = 1500;
	    $config['max_height'] = 1500;
	    $this->load->library('upload');
	    $this->upload->initialize($config);

	    if (!$this->upload->do_upload($imageName)) {
	    	$this->session->set_flashdata('error_upload_message', $this->upload->display_errors());
	    	if($this->session->userdata('user_data')->entity == 'Admin') {
				redirect('company_profile?company_id='.$company_id);
			} else {
				redirect('company_profile');
			}
	    } else {
	    	$upload_data = $this->upload->data();
	    	print_r($upload_data);
	    }*/

	    // $data['user_logo'] = 'assets/img/logos/'.$imageName;
	 
	    echo 'assets/img/logos/'.$imageName;
	}

	public function save_logos() {

		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$company_id = $this->input->get('company_id');
		} else {
			$company_id = $user_id;
		}

		// $user_id = $this->session->userdata('id');

		$data['user_logo'] = $this->input->post('logo_url');

		if($data['user_logo']) {
			if($this->user_model->update_user_data($data, $company_id)) {
				// $this->session->set_flashdata('upload_message', 'Data updated');
				$this->session->set_flashdata('success_message', 'Data updated');
				// $data_user_data = $this->user_model->get_user_data($user_id);
				// $this->session->set_userdata('user_data', $data_user_data);
				if($this->session->userdata('user_data')->entity == 'Admin') {
					redirect('company_profile?company_id='.$company_id);
				} else {
					$data_user_data = $this->user_model->get_user_data($company_id);
					$this->session->set_userdata('user_data', $data_user_data);
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
			if($this->session->userdata('user_data')->entity == 'Admin') {
				redirect('company_profile?company_id='.$company_id);
			} else {
				redirect('company_profile');
			}
		}

	}

	public function update_contact_details() {
		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$company_id = $this->input->get('company_id');
		} else {
			$company_id = $user_id;
		}
		$user_data = $this->user_model->get_user_data($company_id);
		$original_value = $user_data->email;
		$is_unique = '';
		if($this->input->post('email') != $original_value) {
			$is_unique =  '|is_unique[tr_users.email]';
		}
		$this->form_validation->set_rules('name','Name','trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_numeric');
		$this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email'.$is_unique);
		$this->form_validation->set_rules('phone_number','Phone Number','trim|required|min_length[10]|max_length[15]|regex_match[/^[0-9-()]+$/]');

		if($this->form_validation->run()) {
			$data = array(
				'contact_name'  => $this->input->post('contact_name'),
				'contact_email'  => $this->input->post('contact_email'),
				'contact_no'  => $this->input->post('contact_no')
			);
			if($this->user_model->update_company_data($data, $company_id)) {
				// $this->session->set_flashdata('contact_message', 'Data updated');
				$this->session->set_flashdata('success_message', 'Data updated');
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
		$this->form_validation->set_rules('name','Name','trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_numeric');
		$this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|is_unique[tr_users.email]');
		$this->form_validation->set_rules('phone_number','Phone Number','trim|required|min_length[10]|max_length[15]|regex_match[/^[0-9-()]+$/]');

		if($this->form_validation->run()) {
			$data = array(
				'name'  => $this->input->post('name'),
				'phone_number'  => $this->input->post('phone_number'),
				'username'  => $this->input->post('username'),
				'email'  => $this->input->post('email')
			);
			if($this->user_model->update_user_data($data, $company_id)) {
				// $this->session->set_flashdata('user_message', 'Data updated');
				$this->session->set_flashdata('success_message', 'Data updated');
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

	public function update_user_details_password() {
		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$company_id = $this->input->get('company_id');
		} else {
			$company_id = $user_id;
		}
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|matches[password]');

		if($this->form_validation->run()) {
			$verification_key = md5(rand());
			$encrypted_password = $this->encryption->encrypt($this->input->post('password'));
			$data = array(
				'password'  => $encrypted_password
			);
			if($this->user_model->update_user_data($data, $company_id)) {
				// $this->session->set_flashdata('user_message', 'Data updated');
				$this->session->set_flashdata('success_message', 'Data updated');
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
