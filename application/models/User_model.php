<?php  
if(!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

	public function get_user_data($id) {
		$this->db->where('id', $id);
		$query = $this->db->get("tr_users");
		if($query->result()) {
			return $query->result()[0];
		} else {
			return array();
		}
	}
		
	public function get_company_data($id) {
		$this->db->where('user_id', $id);
		$query = $this->db->get("tr_company");
		if($query->result()) {
			return $query->result()[0];
		} else {
			return array();
		}
	}

	public function get_hotel_data($id) {
		$this->db->where('user_id', $id);
		$query = $this->db->get("tr_hotels");
		if($query->result()) {
			return $query->result()[0];
		} else {
			return array();
		}
	}

	public function update_company_data($data, $id) {
		$timestamp = date('Y-m-d H:i:s');
		$data['updated_at'] = $timestamp;
        $this->db->where('user_id',$id);
        return $this->db->update('tr_company',$data);
	}

	public function update_hotel_data($data, $id) {
		$timestamp = date('Y-m-d H:i:s');
		$data['updated_at'] = $timestamp;
        $this->db->where('user_id',$id);
        return $this->db->update('tr_hotels',$data);
	}

	public function update_user_data($data, $id) {
        $this->db->where('id',$id);
        return $this->db->update('tr_users',$data);
	}

	public function delete_user($user_id) {
		$data = array(
			'status' => '2'
		);
		$this->db->where('id',$user_id);
		return $this->db->update('tr_users',$data);
        // return $this->db->delete('tr_users', array('id' => $user_id));
    }

    public function activate_user($user_id) {
		$data = array(
			'status' => '1'
		);
		$this->db->where('id',$user_id);
		return $this->db->update('tr_users',$data);
        // return $this->db->delete('tr_users', array('id' => $user_id));
    }	
}
/* End of file '/User_model.php' */
/* Location: ./application/models//User_model.php */