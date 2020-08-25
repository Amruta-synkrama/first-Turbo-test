<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class Hotel_branches_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}
	
	public function get_location_data($id, $branch_id = NULL) {
		$this->db->select('*');
		$this->db->from('tr_hotel_locations');
		$this->db->join('tr_locations', 'tr_locations.ID = tr_hotel_locations.location_id');
		$this->db->join('tr_states', 'tr_states.ID = tr_locations.ID_STATE');
		$this->db->where('hotel_id', $id);
		if($branch_id) {
			$this->db->where('tr_hotel_locations.id', $branch_id);
		}
		$query = $this->db->get();
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function get_state() {
		$query = $this->db->get('tr_states');
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function get_city($state_id) {
		if($state_id) {
			$this->db->where('ID_STATE', $state_id);
		}
		$query = $this->db->get('tr_locations');
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function add_branch($data) {
		$this->db->insert('tr_hotel_locations', $data);
		$location_id = $this->db->insert_id();
		return $location_id;
	}

	public function update_branch($branch_id, $data) {
		$this->db->where('id',$branch_id);
		return $this->db->update('tr_hotel_locations',$data);
	}

	public function delete_branch($branch_id) {
        return $this->db->delete('tr_hotel_locations', array('id' => $branch_id));
    }

}
/* End of file '/Hotel_branches.php' */
/* Location: ./application/models//Hotel_branches.php */