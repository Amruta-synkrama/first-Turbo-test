<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

class Enquiry_data_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function get_contacts($form_id,$enquiry_id) {
		$this->db->where('form_id', $form_id);
		if($enquiry_id) {
			$this->db->where('id', $enquiry_id);
		}
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get("tr_enquiry_data");
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function delete_contact_enquiry($enquiry_id) {
		return $this->db->delete('tr_enquiry_data', array('id' => $enquiry_id));
	}

	public function insert_contact_enquiry($form_id,$data) {
		$timestamp = date('Y-m-d H:i:s');
		$insert_data = array(
            'form_id' => $form_id,
            'form_data' => serialize($data),
            'form_date' => $timestamp
        );
        // $this->send_email_data($data);
        return $this->db->insert('tr_enquiry_data', $insert_data);
	}
	
	public function show_contact_enquiry($enquiry_id) {
		$data = array(
			'status' => '1'
		);
		$this->db->where('id',$enquiry_id);
		return $this->db->update('tr_enquiry_data',$data);
	}

	public function remove_contact_enquiry($enquiry_id) {
		$data = array(
			'status' => '0'
		);
		$this->db->where('id',$enquiry_id);
		return $this->db->update('tr_enquiry_data',$data);
	}

	public function get_contact_data() {
		$this->db->select('form_data' );
		$this->db->where('status', '1');
		$this->db->where('form_id', '16053');
		$query = $this->db->get("tr_enquiry_data");
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}		

	public function send_email_data($data) {
		// $to = "willmartin9797@gmail.com";
		$to = 'sales@turbores.com';
		$subject = "Turbores Enquiry Form";
		$message = "
		Hello Admin,
		<br><br>
        Someone filled out the enqury form. Here are the details<br>Details:<br>";
        foreach ($data as $key => $value) {
        	$key_filter = str_replace('-', ' ', $key);
        	$key_filter = ucfirst(str_replace('_', ' ', $key_filter));
        	$message .= $key_filter ." - ".$value.'<br>';
        }
		$message .= "<br><br>
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
	
}
/* End of file '/Enquiry_data.php' */
/* Location: ./application/models//Enquiry_data.php */