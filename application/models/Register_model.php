<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

	function reg_insert($data) {
		$this->db->insert('tr_users', $data);
		return $this->db->insert_id();
	}

	function can_login($email, $password) {
		$this->db->where('email', $email);
		$query = $this->db->get('tr_users');
		if($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				$store_password = $this->encryption->decrypt($row->password);
				if($password == $store_password) {
					$this->session->set_userdata('id', $row->id);
				} else {
					return 'Wrong Password';
				}
			}
		} else {
			return 'Wrong Email Address';
		}
	}
}


/* End of file '/Register_model.php' */
/* Location: ./application/models//Register_model.php */