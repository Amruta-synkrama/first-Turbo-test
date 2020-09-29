<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class Register_employee_model extends CI_Model
{
	function reg_insert($data) {
		$timestamp = date('Y-m-d H:i:s');
		$data['created_at'] = $timestamp;
		$admin_user = $data['admin_user'];
		$emp_id = $data['emp_id'];
		unset($data['admin_user']);
		unset($data['emp_id']);
		$this->db->insert('tr_users', $data);
		$user_id = $this->db->insert_id();
		if($data['entity'] == 'Hotel_EMP') {
			$hotel_data = array(
				'user_id' => $user_id,
				'hotel_id' => $admin_user,
				'email' => $data['email'],
				'emp_id' => $emp_id,
				'updated_at' => $timestamp
			);
			$this->db->insert('tr_hotels_emp', $hotel_data);
		} elseif($data['entity'] == 'RFP_EMP') {
			$company_data = array(
				'user_id' => $user_id,
				'company_id' => $admin_user,
				'email' => $data['email'],
				'emp_id' => $emp_id,
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

	
	public function get_users($flag) {
		$this->db->select('id,name');
		$this->db->from('tr_users');
		if($flag == 'Hotel_EMP') :
		$this->db->where('tr_users.entity', 'Hotel');
		elseif($flag == 'RFP_EMP') :
		$this->db->where('tr_users.entity', 'RFP');
		endif;	
		$this->db->order_by('tr_users.id', 'DESC');
		$query = $this->db->get();
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}
}
/* End of file '/Register_employee.php' */
/* Location: ./application/models//Register_employee.php */