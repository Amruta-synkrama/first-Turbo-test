<?php  
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_profile_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_company_data($id) {
		$this->db->where('user_id', $id);
		$query = $this->db->get("tr_company");
		return $query->result()[0];
	}

	public function get_user_data($id) {
		$this->db->where('id', $id);
		$query = $this->db->get("tr_users");
		return $query->result()[0];
	}

	public function update_company_data($data, $id) {
        $this->db->where('user_id',$id);
        return $this->db->update('tr_company',$data);
	}

	public function update_user_data($data, $id) {
        $this->db->where('id',$id);
        return $this->db->update('tr_users',$data);
	}
}
/* End of file '/Admin_profile.php' */
/* Location: ./application/models//Admin_profile.php */