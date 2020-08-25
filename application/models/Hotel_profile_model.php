<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

class Hotel_profile_model extends CI_Model {
	public function __construct() {
		parent::__construct();
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

	public function get_user_data($id) {
		$this->db->where('id', $id);
		$query = $this->db->get("tr_users");
		return $query->result()[0];
	}

	public function update_hotel_data($data, $id) {
        $this->db->where('user_id',$id);
        return $this->db->update('tr_hotels',$data);
	}

	public function update_user_data($data, $id) {
        $this->db->where('id',$id);
        return $this->db->update('tr_users',$data);
	}

}
/* End of file '/Hotel_profile_model.php' */
/* Location: ./application/models//Hotel_profile_model.php */