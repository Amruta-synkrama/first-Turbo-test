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
	
}
/* End of file '/Enquiry_data.php' */
/* Location: ./application/models//Enquiry_data.php */