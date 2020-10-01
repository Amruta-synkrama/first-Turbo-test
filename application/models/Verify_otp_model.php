<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class Verify_otp_model extends CI_Model
{
	public function send_otp($email) {
		$user_id = $this->get_user_id($email)->id;
		$query = $this->get_otp_data($user_id);
		if($query->result()) {
			$otp = $query->result()[0]->otp;
		} else {
			$timestamp = date('Y-m-d H:i:s',strtotime("+ 30 minutes"));
			$otp = $this->generate_otp();
			$data = array(
				'user_id' => $this->get_user_id($email)->id,
				// 'email' => $email,
				'otp' => $otp,
				'expiry_date' => $timestamp
			);
			$this->db->insert('tr_otp_data', $data);
			$user_id = $this->db->insert_id();
		}
		$this->send_email_otp($email,$otp);
		setcookie('otp_email', $email, time() + (86400 * 30), "/");
		return 'OTP sent successfully';
	}

	public function generate_otp() {
		$otp = rand(10000,99999);
		return $otp;
	}

	public function get_user_id($email) {
		$this->db->select('id');
		$this->db->where('email', $email);
		$query = $this->db->get('tr_users');
		if($query->result()) {
			return $query->result()[0];
		} else {
			return array();
		}
	}

	public function get_user_data($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('tr_users');
		if($query->result()) {
			return $query->result()[0];
		} else {
			return array();
		}
	}

	public function get_otp_data($user_id) {
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('tr_otp_data');
		return $query;
	}

	public function verify_otp($email,$otp) {
		$user_id = $this->get_user_id($email)->id;
		$query = $this->get_otp_data($user_id);
		if($query->result()) {
			if($query->result()[0]->otp == $otp) {
				$row = $this->get_user_data($user_id);
				$this->session->set_userdata('id', $row->id);
				$this->session->set_userdata('user_data', $row);
				setcookie("otp_email", "", time() - 3600);
				$this->delete_otp($query->result()[0]->id);
			} else {
				return 'Invalid OTP';
			}
		} else {
			return 'Invalid OTP';
		}
	}

	public function delete_otp($id) {
		return $this->db->delete('tr_otp_data', array('id' => $id));
	}

	public function resend_otp($email) {
		$user_id = $this->get_user_id($email)->id;
		$query = $this->get_otp_data($user_id);
		if($query->result()) {
			$this->send_email_otp($email,$query->result()[0]->otp);
			return 'OTP sent successfully';
		}
	}

	public function send_email_otp($email,$otp) {

		ini_set("SMTP","ssl://smtp.gmail.com");
		ini_set("smtp_port","587");

		$config = Array(
		  'protocol'    => 'smtp',
		  'smtp_host'   => 'smtp.gmail.com',
		  'smtp_port'   => 587,
		  'smtp_user'   => 'willmartin9797@gmail.com',
		  'smtp_pass'   => 'martin?123',
		  'mailtype'    => 'html',
		  'charset'     => 'utf-8',
		  'wordwrap'    => TRUE,
		  '_smtp_auth'  => TRUE,
		  'smtp_timeout' => '60'
		);
		// $message = $row2['content'];
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from("willmartin9797@gmail.com");
		$this->email->to("ajayd920@gmail.com");
		$this->email->subject('Turbores Login OTP'); 
        $this->email->message('Here is otp '.$otp);
		if($this->email->send()) {
		  // echo 'Email sent.';
		} else {
		 // show_error($this->email->print_debugger());
		}

	}

	
}
/* End of file '/Verify_otp.php' */
/* Location: ./application/models//Verify_otp.php */