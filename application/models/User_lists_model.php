<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class User_lists_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function get_companies($company_id) {
		$this->db->select('*');
		$this->db->from('tr_users');
		$this->db->join('tr_company', 'tr_company.user_id = tr_users.id');
		$this->db->where('tr_users.entity', 'RFP');
		if($company_id) {
			$this->db->where('tr_users.id', $company_id);
		}
		$user_role = $this->session->userdata('user_data')->entity;
		if($user_role != 'Admin') {
			$this->db->where('tr_users.status', '1');
		}
		$query = $this->db->get();
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function get_hotels($hotel_id) {
		$this->db->select('*');
		$this->db->from('tr_users');
		$this->db->join('tr_hotels', 'tr_hotels.user_id = tr_users.id');
		$this->db->where('tr_users.entity', 'Hotel');
		if($hotel_id) {
			$this->db->where('tr_users.id', $hotel_id);
		}
		$user_role = $this->session->userdata('user_data')->entity;
		if($user_role != 'Admin') {
			$this->db->where('tr_users.status', '1');
		}
		$query = $this->db->get();
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function get_admins() {
		$this->db->select('*');
		$this->db->from('tr_users');
		$this->db->where('tr_users.entity', 'Admin');
		$this->db->where_not_in('tr_users.id', 1);
		$query = $this->db->get();
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function update_user_data($data, $id) {
        $this->db->where('id',$id);
        return $this->db->update('tr_users',$data);
	}
}
/* End of file '/User_lists_model.php' */
/* Location: ./application/models//User_lists_model.php */