<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function get_hotels() {
		$this->db->select('*');
		$this->db->from('tr_users');
		$this->db->join('tr_hotels', 'tr_hotels.user_id = tr_users.id');
		$this->db->where('tr_users.entity', 'Hotel');
		$user_role = $this->session->userdata('user_data')->entity;
		if($user_role != 'Admin') {
			$this->db->where('tr_users.status', '1');
		}
		$this->db->order_by('tr_users.id', 'DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function get_hotels_count() {
		$this->db->select('count(tr_users.id) as count');
		$this->db->from('tr_users');
		$this->db->where('tr_users.entity', 'Hotel');
		$user_role = $this->session->userdata('user_data')->entity;
		if($user_role != 'Admin') {
			$this->db->where('tr_users.status', '1');
		}
		$this->db->order_by('tr_users.id', 'DESC');
		$query = $this->db->get();
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function get_companies() {
		$this->db->select('*');
		$this->db->from('tr_users');
		$this->db->join('tr_company', 'tr_company.user_id = tr_users.id');
		$this->db->where('tr_users.entity', 'RFP');
		$user_role = $this->session->userdata('user_data')->entity;
		if($user_role != 'Admin') {
			$this->db->where('tr_users.status', '1');
		}
		$this->db->order_by('tr_users.id', 'DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function get_companies_count() {
		$this->db->select('count(tr_users.id) as count');
		$this->db->from('tr_users');
		$this->db->where('tr_users.entity', 'RFP');
		$user_role = $this->session->userdata('user_data')->entity;
		if($user_role != 'Admin') {
			$this->db->where('tr_users.status', '1');
		}
		$this->db->order_by('tr_users.id', 'DESC');
		$query = $this->db->get();
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function get_links_count($user_id,$role) {
		if($role == 'Hotel_EMP') {
			$hotel_id = $this->get_hotel_emp_data($user_id)->hotel_id;
		}
		if($role == 'RFP_EMP') {
			$company_id = $this->get_company_emp_data($user_id)->company_id;
		}
		$this->db->select('count(tr_links.id) as count' );
		$this->db->from('tr_links');
		$this->db->join('tr_users', 'tr_users.id = tr_links.company_id');
		$this->db->join('tr_hotel_locations', 'tr_hotel_locations.id = tr_links.hotel_location_id');
		$this->db->join('tr_locations', 'tr_locations.id = tr_hotel_locations.location_id','left');
		$this->db->join('tr_states', 'tr_states.ID = tr_locations.ID_STATE','left');
		if($role == 'RFP') {
			$this->db->where('tr_links.company_id', $user_id);
		}
		if($role == 'Hotel') {
			$this->db->where('tr_hotel_locations.hotel_id', $user_id);
		}
		if($role == 'Hotel_EMP') {
			$this->db->where('tr_hotel_locations.hotel_id', $hotel_id);
		}
		if($role == 'RFP_EMP') {
			$this->db->where('tr_links.company_id', $company_id);
		}
		$user_role = $this->session->userdata('user_data')->entity;
		if($user_role != 'Admin') {
			$this->db->where('tr_links.status', '1');
		}
		$query = $this->db->get();
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function get_hotel_emp_data($id) {
		$this->db->where('user_id', $id);
		$query = $this->db->get("tr_hotels_emp");
		if($query->result()) {
			return $query->result()[0];
		} else {
			return array();
		}
	}

	public function get_company_emp_data($id) {
		$this->db->where('user_id', $id);
		$query = $this->db->get("tr_company_emp");
		if($query->result()) {
			return $query->result()[0];
		} else {
			return array();
		}
	}
}
/* End of file '/Dashboard_model.php' */
/* Location: ./application/models//Dashboard_model.php */