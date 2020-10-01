<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Send_enquiry extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('user_model');
		$this->load->model('enquiry_data_model');
	}
	
	public function index() {
		$form_data = $this->input->post();
		if(!empty($form_data)) {
			$this->enquiry_data_model->insert_contact_enquiry($form_data['form_id'], $form_data['form_data']);
		}
	}
	
}
/* End of file '/Send_enquiry.php' */
/* Location: ./application/controllers//Send_enquiry.php */
