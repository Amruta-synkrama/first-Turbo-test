<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class Register_employee_model extends CI_Model
{
	function reg_insert($data) {
		$timestamp = date('Y-m-d H:i:s');
		$data['created_at'] = $timestamp;
		$this->db->insert('tr_users', $data);
		$user_id = $this->db->insert_id();
		if($data['entity'] == 'Hotel_EMP') {
			$hotel_data = array(
				'user_id' => $user_id,
				'email' => $data['email'],
				'updated_at' => $timestamp
			);
			$this->db->insert('tr_hotels_emp', $hotel_data);
		} elseif($data['entity'] == 'RFP_EMP') {
			$company_data = array(
				'user_id' => $user_id,
				'email' => $data['email'],
				'updated_at' => $timestamp
			);
			$this->db->insert('tr_company_emp', $company_data);
		}
		return $user_id;
	}

	public function get_user_data($id) {
		$this->db->where('id', $id);
		$query = $this->db->get("tr_users");
		return $query->result()[0];
	}
}
/* End of file '/Register_employee.php' */
/* Location: ./application/models//Register_employee.php */