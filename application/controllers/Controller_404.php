<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Controller_404 extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('id')) {
			redirect('login');
		}
		$this->load->model('model_404');
	}
	
	public function index() {
		$user_id = $this->session->userdata('id');
		$data['user_data'] = $this->model_404->get_user_data($user_id);
		$data['session'] = $this->session->userdata('user_data');
		$this->load->view('templates/header', $data);
		$this->load->view('view_404', $data);
		$this->load->view('templates/footer', $data);
	}
		
	
}
/* End of file '/404.php' */
/* Location: ./application/controllers//404.php */
