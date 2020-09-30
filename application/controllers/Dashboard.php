<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('id')) {
			redirect('login');
		}
		$this->load->model('dashboard_model');
	}

	function index() {
		$user_id = $this->session->userdata('id');
		$data['session'] = $this->session->userdata('user_data');
		$data['company_count'] = $this->dashboard_model->get_companies_count();
		$data['companies_data'] = $this->dashboard_model->get_companies();
		$data['hotels_count'] = $this->dashboard_model->get_hotels_count();
		$data['hotels_data'] = $this->dashboard_model->get_hotels();
		$data['links_count'] = $this->dashboard_model->get_links_count($user_id,$this->session->userdata('user_data')->entity);
		$data['room_count1'] = 12345;
		$data['room_count2'] = 54321;
		$this->load->view('templates/header', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer', $data);
	}

	function logout() {
		$data = $this->session->all_userdata();
		foreach($data as $row => $rows_value) {
			$this->session->unset_userdata($row);
		}
		redirect('login');
	}
}
