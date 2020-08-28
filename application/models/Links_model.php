<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class Links_model extends CI_Model
{
	public function __construct()
	{
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
		$user_role = $this->session->userdata('user_data')->entity;
		if($user_role != 'Admin') {
			$this->db->where('tr_links.status', '1');
		}
		$this->db->order_by('tr_links.updated_at', 'DESC');
		$query = $this->db->get();
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function get_companies() {
		$this->db->select('*');
		$this->db->from('tr_users');
		$this->db->join('tr_company', 'tr_company.user_id = tr_users.id');
		$this->db->where('tr_users.entity', 'RFP');
		$query = $this->db->get();
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function get_hotel_locations($id) {
		$this->db->select('*');
		$this->db->from('tr_hotel_locations');
		$this->db->join('tr_locations', 'tr_locations.ID = tr_hotel_locations.location_id');
		$this->db->join('tr_states', 'tr_states.ID = tr_locations.ID_STATE');
		$this->db->where('hotel_id', $id);
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

	public function add_link($data) {
		$timestamp = date('Y-m-d H:i:s');
		$data['updated_at'] = $timestamp;
		$this->db->insert('tr_links', $data);
		$location_id = $this->db->insert_id();
		return $location_id;
	}

	public function update_link($link_id, $data) {
		$timestamp = date('Y-m-d H:i:s');
		$data['updated_at'] = $timestamp;
		$this->db->where('id',$link_id);
		return $this->db->update('tr_links',$data);
	}

	public function reject_link($link_id) {
		$timestamp = date('Y-m-d H:i:s');
		$data = array(
			'link_status' => '3',
			'updated_at' => $timestamp
		);
		$this->db->where('id',$link_id);
		return $this->db->update('tr_links',$data);
        // return $this->db->delete('tr_links', array('id' => $link_id));
    }

	public function delete_link($link_id) {
		$timestamp = date('Y-m-d H:i:s');
		$data = array(
			'status' => '2',
			'updated_at' => $timestamp
		);
		$this->db->where('id',$link_id);
		return $this->db->update('tr_links',$data);
        // return $this->db->delete('tr_links', array('id' => $link_id));
    }
 
}
/* End of file '/Links_model.php' */
/* Location: ./application/models//Links_model.php */