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
		$data['amenities_general_data'] = $this->user_model->get_general_amenities();
		$data['amenities_data'] = $this->user_model->get_amenities($hotel_id,'amenities');
		$data['nearby_data'] = $this->user_model->get_amenities($hotel_id,'nearby');
		$data['restaurants_data'] = $this->user_model->get_amenities($hotel_id,'restaurants');
		$data['gallery_data'] = $this->user_model->get_amenities($hotel_id,'hotel_gallery');
		$data['total_revenue_data'] = $this->user_model->get_amenities($hotel_id,'total_revenue');
		$data['daily_rates_data'] = $this->user_model->get_amenities($hotel_id,'daily_rates');
		$data['controller'] = $this;
		$data['hotel_id'] = $hotel_id;
		$this->load->view('templates/header', $data);
		$this->load->view('hotel_profile', $data);
		$this->load->view('templates/footer', $data);
	}

	public function hotel_search_amenities($value) {
		return $this->user_model->search_amenities($value);
	}
	
	public function update_hotel_details() {
		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$hotel_id = $this->input->get('hotel_id');
		} else {
			$hotel_id = $user_id;
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
			if($this->user_model->update_hotel_data($data, $hotel_id)) {
				// $this->session->set_flashdata('hotel_message', 'Data updated');
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

	public function upload_logo(){

		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$hotel_id = $this->input->get('hotel_id');
		} else {
			$hotel_id = $user_id;
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
						redirect('hotel_profile?hotel_id='.$hotel_id);
					} else {
						redirect('hotel_profile');
					}
				} else {
					$upload_data = $this->upload->data();
					// print_r($upload_data);
				}

				$data['user_logo'] = 'assets/img/logos/'.$file;

				if($this->user_model->update_user_data($data, $hotel_id)) {
					// $this->session->set_flashdata('upload_message', 'Data updated');
					$this->session->set_flashdata('success_message', 'Data updated');
					if($this->session->userdata('user_data')->entity == 'Admin') {
						redirect('hotel_profile?hotel_id='.$hotel_id);
					} else {
						$data_user_data = $this->user_model->get_user_data($hotel_id);
						$this->session->set_userdata('user_data', $data_user_data);
						redirect('hotel_profile');
					}
				} else {
					if($this->session->userdata('user_data')->entity == 'Admin') {
						redirect('hotel_profile?hotel_id='.$hotel_id);
					} else {
						redirect('hotel_profile');
					}
				}
			}
		/*} else {
			$this->index();
		}*/
	}


	/**
	 * 
	 */
	public function update_meters() {
		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$hotel_id = $this->input->get('hotel_id');
		} else {
			$hotel_id = $user_id;
		}
		$this->form_validation->set_rules('total_revenue','Total Revenue','trim|required');
		$this->form_validation->set_rules('daily_rates','Daily Rates','trim|required');

		if($this->form_validation->run()) {
			$data = array(
				'key'  => 'total_revenue',
				'value' => serialize(array($this->input->post('total_revenue')))
			);
			$data1 = array(
				'key'  => 'daily_rates',
				'value' => serialize(array($this->input->post('daily_rates')))
			);
			// print_r($data);
			if($this->user_model->update_hotel_meta($data, $hotel_id) && $this->user_model->update_hotel_meta($data1, $hotel_id)) {
				// $this->session->set_flashdata('amenities_message', 'Data updated');
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
			$hotel_id = $this->input->get('hotel_id');
		} else {
			$hotel_id = $user_id;
		}

		// $user_id = $this->session->userdata('id');

		$data['user_logo'] = $this->input->post('logo_url');

		if($data['user_logo']) {
			if($this->user_model->update_user_data($data, $hotel_id)) {
				// $this->session->set_flashdata('upload_message', 'Data updated');
				$this->session->set_flashdata('success_message', 'Data updated');
				// $data_user_data = $this->user_model->get_user_data($user_id);
				// $this->session->set_userdata('user_data', $data_user_data);
				if($this->session->userdata('user_data')->entity == 'Admin') {
					redirect('hotel_profile?hotel_id='.$hotel_id);
				} else {
					$data_user_data = $this->user_model->get_user_data($hotel_id);
					$this->session->set_userdata('user_data', $data_user_data);
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
			if($this->session->userdata('user_data')->entity == 'Admin') {
				redirect('hotel_profile?hotel_id='.$hotel_id);
			} else {
				redirect('hotel_profile');
			}
		}

	}


	public function upload_gallery(){

		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$hotel_id = $this->input->get('hotel_id');
		} else {
			$hotel_id = $user_id;
		}

		$data = [];
		$showdata = [];
		$hotel_gallery = $this->user_model->get_amenities($hotel_id,'hotel_gallery');

		$count = count($_FILES['files']['name']);
		if($count) {
			for($i=0;$i<$count;$i++){

				if(!empty($_FILES['files']['name'][$i])){
					// $_FILES['file'];
					$_FILES['file_new']['name'] = $_FILES['files']['name'][$i];
					$_FILES['file_new']['type'] = $_FILES['files']['type'][$i];
					$_FILES['file_new']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
					$_FILES['file_new']['error'] = $_FILES['files']['error'][$i];
					$_FILES['file_new']['size'] = $_FILES['files']['size'][$i];

					$config['upload_path'] = './assets/img/gallery/';
					$config['allowed_types'] = 'jpg|jpeg|png|JPG|gif';
					$config['max_size'] = 5000;
					// $config['file_name'] = $_FILES['files']['name'][$i];

					$this->load->library('upload'); 
					$this->upload->initialize($config);

					if($this->upload->do_upload('file_new')){
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];

						$showdata['totalFiles'][] = $filename;
						array_push($hotel_gallery, 'assets/img/gallery/'.$filename);
					}
				}

			}
			/*print_r($hotel_gallery);
			$this->index();
			return;*/
			$add_data = array(
				'key'  => 'hotel_gallery',
				'value' => serialize($hotel_gallery)
			);
			if($this->user_model->update_hotel_meta($add_data, $hotel_id)) {
				// $this->session->set_flashdata('upload_gallery_message', 'Data updated');
				$this->session->set_flashdata('success_message', 'Data updated');
				if($this->session->userdata('user_data')->entity == 'Admin') {
					redirect('hotel_profile?hotel_id='.$hotel_id);
				} else {
					$data_user_data = $this->user_model->get_user_data($hotel_id);
					$this->session->set_userdata('user_data', $data_user_data);
					redirect('hotel_profile');
				}
			} else {
				if($this->session->userdata('user_data')->entity == 'Admin') {
					redirect('hotel_profile?hotel_id='.$hotel_id);
				} else {
					redirect('hotel_profile');
				}
			}
		}
		/*} else {
			$this->index();
		}*/
	}


	public function remove_image() {
		$value = $this->input->post();
		$img_id = $value['value'];
		$hotel_id = $value['hotel_id'];
		// print_r($value['value']); 
		$gallery_data = $this->user_model->get_amenities($hotel_id,'hotel_gallery');
		$gallery_data = array_values($gallery_data);
		unset($gallery_data[$img_id]);
		$add_data = array(
			'key'  => 'hotel_gallery',
			'value' => serialize($gallery_data)
		);
		$this->user_model->update_hotel_meta($add_data, $hotel_id);
		$gallery_data = $this->user_model->get_amenities($hotel_id,'hotel_gallery');
		ob_start();
		?>
		<?php if($gallery_data) : ?>
		  <?php $i = 0; ?>
		  <?php foreach ($gallery_data as $image) : ?>
		    <div class="col-sm-3 mt-4 remove-img-gallery-wrap-<?php echo $i; ?> ">
		      <div class="card" style="width:210px;">
		        <div class="p-2">
		          <div class="card-tools text-right card-tools-cust-abs">
		            <button title="remove" type="button" class="btn btn-tool text-danger remove-img-gallery" data-img-id="<?php echo $i; ?>"><i class="fas fa-times"></i>
		            </button>
		          </div>
		          <a class="example-image-link" data-lightbox="example-1" href="<?php echo base_url(); ?><?php echo $image; ?>">
		          <img width="190px" src="<?php echo base_url(); ?><?php echo $image; ?>" alt="">
		          </a>
		          <!-- /.card-tools -->
		        </div>
		      </div>
		    </div>
		    <?php $i++; ?>
		  <?php endforeach; ?>
		<?php endif; ?>
		<?php
		$html = ob_get_clean();
		echo $html;
	}

	public function update_amenities() {
		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$hotel_id = $this->input->get('hotel_id');
		} else {
			$hotel_id = $user_id;
		}
		$this->form_validation->set_rules('amenities[]','amenities','trim|required');

		if($this->form_validation->run()) {
			if(count($this->input->post('amenities[]')) > 6) {
				$this->session->set_flashdata('amenities_error_message', 'You can add only 6 amenities');
				$this->index();
				return;
			}
			$data = array(
				'key'  => 'amenities',
				'value' => serialize($this->input->post('amenities[]'))
			);
			// print_r($data);
			if($this->user_model->update_hotel_meta($data, $hotel_id)) {
				// $this->session->set_flashdata('amenities_message', 'Data updated');
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

	public function update_nearby() {
		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$hotel_id = $this->input->get('hotel_id');
		} else {
			$hotel_id = $user_id;
		}
		$this->form_validation->set_rules('nearby[]','nearby','trim|required');

		if($this->form_validation->run()) {
			if(count($this->input->post('nearby[]')) > 5) {
				$this->session->set_flashdata('nearby_error_message', 'You can add only 5 nearby');
				$this->index();
			}
			$data = array(
				'key'  => 'nearby',
				'value' => serialize($this->input->post('nearby[]'))
			);
			// print_r($data);
			if($this->user_model->update_hotel_meta($data, $hotel_id)) {
				// $this->session->set_flashdata('nearby_message', 'Data updated');
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

	public function update_nearby_rest() {
		$user_id = $this->session->userdata('id');
		if($this->session->userdata('user_data')->entity == 'Admin') {
			$hotel_id = $this->input->get('hotel_id');
		} else {
			$hotel_id = $user_id;
		}
		$this->form_validation->set_rules('restaurants[]','restaurants','trim|required');

		if($this->form_validation->run()) {
			if(count($this->input->post('restaurants[]')) > 5) {
				$this->session->set_flashdata('restaurants_error_message', 'You can add only 5 restaurants');
				$this->index();
			}
			$data = array(
				'key'  => 'restaurants',
				'value' => serialize($this->input->post('restaurants[]'))
			);
			// print_r($data);
			if($this->user_model->update_hotel_meta($data, $hotel_id)) {
				// $this->session->set_flashdata('restaurants_message', 'Data updated');
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
		$this->form_validation->set_rules('contact_no','Contact No','trim|required|min_length[10]|max_length[15]|regex_match[/^[0-9-()]+$/]');

		if($this->form_validation->run()) {
			$data = array(
				'contact_name'  => $this->input->post('contact_name'),
				'contact_email'  => $this->input->post('contact_email'),
				'contact_no'  => $this->input->post('contact_no')
			);
			if($this->user_model->update_hotel_data($data, $hotel_id)) {
				// $this->session->set_flashdata('contact_message', 'Data updated');
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
		$this->form_validation->set_rules('name','Name','trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('phone_number','Phone Number','trim|required|min_length[10]|max_length[15]|regex_match[/^[0-9-()]+$/]');

		if($this->form_validation->run()) {
			$data = array(
				'name'  => $this->input->post('name'),
				'phone_number'  => $this->input->post('phone_number')
			);
			if($this->user_model->update_user_data($data, $hotel_id)) {
				// $this->session->set_flashdata('user_message', 'Data updated');
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
				// $this->session->set_flashdata('user_message', 'Data updated');
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
