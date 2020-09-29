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
		$this->db->order_by('tr_users.id', 'DESC');
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
		$this->db->order_by('tr_users.id', 'DESC');
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
		$this->db->order_by('tr_users.id', 'DESC');
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


	public function get_hotels_employee($emp_id = 0,$hotel_id = 0) {
		$user_role = $this->session->userdata('user_data')->entity;
		$user_id = $this->session->userdata('user_data')->id;
		$this->db->select('user.*,tr_hotels_emp.*,admin_user.name as hotel_name');
		$this->db->from('tr_users as user');
		if($user_role == 'Hotel') {
			$this->db->join('tr_hotels_emp', 'tr_hotels_emp.user_id = user.id AND tr_hotels_emp.hotel_id = '.$user_id);	
		} elseif($hotel_id) {
			$this->db->join('tr_hotels_emp', 'tr_hotels_emp.user_id = user.id AND tr_hotels_emp.hotel_id = '.$hotel_id);
		} else {
			$this->db->join('tr_hotels_emp', 'tr_hotels_emp.user_id = user.id');
		}
		$this->db->join('tr_users as admin_user', 'tr_hotels_emp.hotel_id = admin_user.id');
		$this->db->where('user.entity', 'Hotel_EMP');
		if($emp_id) {
			$this->db->where('user.id', $emp_id);
		}
		if($user_role != 'Admin') {
			$this->db->where('user.status', '1');
		}
		$this->db->order_by('user.id', 'DESC');
		$query = $this->db->get();
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function get_company_employee($emp_id = 0,$company_id = 0) {
		$user_role = $this->session->userdata('user_data')->entity;
		$user_id = $this->session->userdata('user_data')->id;
		$this->db->select('user.*,tr_company_emp.*,admin_user.name as company_name');
		$this->db->from('tr_users as user');
		if($user_role == 'RFP') {
			$this->db->join('tr_company_emp', 'tr_company_emp.user_id = user.id AND tr_company_emp.company_id = '.$user_id);	
		} elseif($company_id) {
			$this->db->join('tr_company_emp', 'tr_company_emp.user_id = user.id AND tr_company_emp.company_id = '.$company_id);
		} else {
			$this->db->join('tr_company_emp', 'tr_company_emp.user_id = user.id');
		}
		$this->db->join('tr_users as admin_user', 'tr_company_emp.company_id = admin_user.id');
		$this->db->where('user.entity', 'RFP_EMP');
		if($emp_id) {
			$this->db->where('user.id', $emp_id);
		}
		if($user_role != 'Admin') {
			$this->db->where('user.status', '1');
		}
		$this->db->order_by('user.id', 'DESC');
		$query = $this->db->get();
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}
}
/* End of file '/User_lists_model.php' */
/* Location: ./application/models//User_lists_model.php */