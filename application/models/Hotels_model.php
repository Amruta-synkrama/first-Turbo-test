<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class Hotels_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function get_hotels($hotel_id) {
		$this->db->select('*');
		$this->db->from('tr_users');
		$this->db->join('tr_hotels', 'tr_hotels.user_id = tr_users.id');
		$this->db->where('tr_users.entity', 'Hotel');
		if($hotel_id) {
			$this->db->where('tr_users.id', $hotel_id);
		}
		$query = $this->db->get();
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}
}
/* End of file '/Hotels.php' */
/* Location: ./application/models//Hotels.php */