<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class Notifications_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function get_links($link_id,$user_id,$role) {
		$this->db->select('tr_links.*, tr_users.id as company_user_id, tr_users.name as company_name,  tr_locations.LOCATION, tr_hotel_locations.branch_name, tr_hotel_locations.hotel_id, tr_states.STATE_NAME' );
		$this->db->from('tr_links');
		$this->db->join('tr_users', 'tr_users.id = tr_links.company_id');
		$this->db->join('tr_hotel_locations', 'tr_hotel_locations.id = tr_links.hotel_location_id');
		$this->db->join('tr_locations', 'tr_locations.id = tr_hotel_locations.location_id','left');
		$this->db->join('tr_states', 'tr_states.ID = tr_locations.ID_STATE','left');
		if($role == 'RFP') {
			$this->db->where('tr_links.company_id', $user_id);
		}
		if($role == 'Hotel') {
			$this->db->where('tr_hotel_locations.hotel_id', $user_id);
		}
		if($link_id) {
			$this->db->where('tr_links.id', $link_id);
		}
		$this->db->limit(3);
		$this->db->order_by('tr_links.updated_at', 'DESC');
		$query = $this->db->get();
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}
}
/* End of file '/Notifications.php' */
/* Location: ./application/models//Notifications.php */