<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

	function reg_insert($data) {
		$timestamp = date('Y-m-d H:i:s');
		$data['created_at'] = $timestamp;
		$this->db->insert('tr_users', $data);
		$user_id = $this->db->insert_id();
		if($data['entity'] == 'Hotel') {
			$hotel_data = array(
				'user_id' => $user_id,
				'email' => $data['email'],
				'updated_at' => $timestamp
			);
			$this->db->insert('tr_hotels', $hotel_data);
		} elseif($data['entity'] == 'RFP') {
			$company_data = array(
				'user_id' => $user_id,
				'email' => $data['email'],
				'updated_at' => $timestamp
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
					if($row->status == '2') {
						return 'Your account is deactivated. Please contact admin.';
					} else {
						// $this->session->set_userdata('id', $row->id);
						// $this->session->set_userdata('user_data', $row);
					}
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

	public function reset_password_link($email) {
		$this->db->where('email', $email);
		$query = $this->db->get('tr_users');
		if($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				$this->send_password_update_email($row);
			}
		} else {
			return 'Wrong Email Address';
		}	
	}

	public function send_password_update_email($data) {
		$token = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 50);
		$this->db->where('id',$data->id);
		$data = array(
			'reset_token'  => $token
		);
		$this->db->update('tr_users',$data);

		$to = 'devleo963@gmail.com';
		// $to = $data->email;
		$subject = "Turbores Password Reset";
		$message = "
		Hello,
		<br><br>
		You are receiving this message in response to your request for password reset. Follow this link to reset your password. 
		<br>
		<a href='".site_url()."login/reset_password/?cid=".$token."' >Reset Password</a>
		<br>
		If You did not make this request kindly ignore!
		<br><br>
		Thank you,<br>
		Turbores.
		";
		// Always set content-type when sending HTML email
		// $headers = "MIME-Version: 1.0" . "\r\n";
		// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		// More headers
		// $headers .= 'From: <willmartin9797@gmail.com>' . "\r\n";


		$headers .= "Reply-To: Turbores <sales@turbores.com>\r\n"; 
		$headers .= "Return-Path: Turbores <sales@turbores.com>\r\n"; 
		$headers .= "From: Turbores <sales@turbores.com>\r\n";  
		$headers .= "Organization: Turbores\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
		$headers .= "X-Priority: 3\r\n";
	  	// $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;

		// $headers .= 'Cc: myboss@example.com' . "\r\n";
		mail($to,$subject,$message,$headers);
	}

	public function check_password_token($token) {
		$this->db->where('reset_token', $token);
		$query = $this->db->get('tr_users');
		if($query->result()) {
			return $query->result()[0]->id;
		} else {
			return 0;
		}
	}

	public function update_password($user_id,$password) {
		$this->db->where('id',$user_id);
		$data = array(
			'password'  => $password
		);
		$this->db->update('tr_users',$data);
	}
}


/* End of file '/Register_model.php' */
/* Location: ./application/models//Register_model.php */