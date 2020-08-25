<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

	function reg_insert($data) {
		$this->db->insert('tr_users', $data);
		$user_id = $this->db->insert_id();
		if($data['entity'] == 'Hotel') {
			$hotel_data = array(
				'user_id' => $user_id,
				'email' => $data['email'],
			);
			$this->db->insert('tr_hotels', $hotel_data);
		} elseif($data['entity'] == 'RPF') {
			$company_data = array(
				'user_id' => $user_id,
				'email' => $data['email'],
			);
			$this->db->insert('tr_company', $company_data);
		}
		return $user_id;
	}

	function can_login($email, $password) {
		$this->db->where('email', $email);
		$query = $this->db->get('tr_users');
		if($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				$store_password = $this->encryption->decrypt($row->password);
				if($password == $store_password) {
					$this->session->set_userdata('id', $row->id);
					$this->session->set_userdata('user_data', $row);
				} else {
					return 'Wrong Password';
				}
			}
		} else {
			return 'Wrong Email Address';
		}
	}

	public function get_user_data($id) {
		$this->db->where('id', $id);
		$query = $this->db->get("tr_users");
		return $query->result()[0];
	}
}


/* End of file '/Register_model.php' */
/* Location: ./application/models//Register_model.php */