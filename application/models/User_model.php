<?php  
if(!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

	public function get_user_data($id) {
		$this->db->where('id', $id);
		$query = $this->db->get("tr_users");
		if($query->result()) {
			return $query->result()[0];
		} else {
			return array();
		}
	}
		
	public function get_company_data($id) {
		$this->db->where('user_id', $id);
		$query = $this->db->get("tr_company");
		if($query->result()) {
			return $query->result()[0];
		} else {
			return array();
		}
	}

	public function get_hotel_data($id) {
		$this->db->where('user_id', $id);
		$query = $this->db->get("tr_hotels");
		if($query->result()) {
			return $query->result()[0];
		} else {
			return array();
		}
	}


	public function get_links_count($user_id,$role) {
		$this->db->select('count(tr_links.id) as count' );
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
		$user_role = $this->session->userdata('user_data')->entity;
		if($user_role != 'Admin') {
			$this->db->where('tr_links.status', '1');
		}
		$query = $this->db->get();
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function get_hotels_count_company($user_id) {
		$this->db->select('tr_links.id as count, tr_hotel_locations.hotel_id as hotel_id' );
		$this->db->from('tr_links');
		$this->db->join('tr_users', 'tr_users.id = tr_links.company_id');
		$this->db->join('tr_hotel_locations', 'tr_hotel_locations.id = tr_links.hotel_location_id');
		$this->db->join('tr_locations', 'tr_locations.id = tr_hotel_locations.location_id','left');
		$this->db->join('tr_states', 'tr_states.ID = tr_locations.ID_STATE','left');
		$this->db->where('tr_links.company_id', $user_id);
		$user_role = $this->session->userdata('user_data')->entity;
		if($user_role != 'Admin') {
			$this->db->where('tr_links.status', '1');
		}
		$query = $this->db->get();
		if($query->result()) {
			return count(array_unique(array_column($query->result(), 'hotel_id')));
		} else {
			return 0;
		}
	}

	public function update_company_data($data, $id) {
		$timestamp = date('Y-m-d H:i:s');
		$data['updated_at'] = $timestamp;
        $this->db->where('user_id',$id);
        return $this->db->update('tr_company',$data);
	}

	public function update_hotel_data($data, $id) {
		$timestamp = date('Y-m-d H:i:s');
		$data['updated_at'] = $timestamp;
        $this->db->where('user_id',$id);
        return $this->db->update('tr_hotels',$data);
	}

	public function update_user_data($data, $id) {
        $this->db->where('id',$id);
        return $this->db->update('tr_users',$data);
	}

	public function delete_user($user_id) {
		$data = array(
			'status' => '2'
		);
		$this->db->where('id',$user_id);
		return $this->db->update('tr_users',$data);
        // return $this->db->delete('tr_users', array('id' => $user_id));
    }

    public function activate_user($user_id) {
		$data = array(
			'status' => '1'
		);
		$this->db->where('id',$user_id);
		return $this->db->update('tr_users',$data);
        // return $this->db->delete('tr_users', array('id' => $user_id));
    }	

    public function get_general_amenities() {
    	$amenities = array(
    		array('icon'=> 'child_friendly', 'name' => 'Babysitting'),
    		array('icon'=> 'pool', 'name' => 'Pool'),
    		array('icon'=> 'ac_unit', 'name' => 'Air Conditioning'),
    		array('icon'=> 'spa', 'name' => 'Spa'),
    		array('icon'=> 'local_dining', 'name' => 'Restaurant'),
    		array('icon'=> 'fitness_center', 'name' => 'Gym'),
    		array('icon'=> 'free_breakfast', 'name' => 'Breakfast Available'),
    		array('icon'=> 'business_center', 'name' => 'Business Services'),
    		array('icon'=> 'local_parking', 'name' => 'Parking Available'),
    		array('icon'=> 'local_bar', 'name' => 'Bar'),
    		array('icon'=> 'local_laundry_service', 'name' => 'Laundry'),
    		array('icon'=> 'room_service', 'name' => 'Room Service'),
    		array('icon'=> 'local_convenience_store', 'name' => '24/7 Front Desk'),
    		array('icon'=> 'hot_tub', 'name' => 'Hot Tub')
    	);

    	return $amenities;
    }

    public function update_hotel_meta($data, $id) {
    	$this->db->where('user_id', $id);
    	$this->db->where('meta_key', $data['key']);
    	$query = $this->db->get("tr_user_meta");
		if($query->result()) {
			$enter_id = $query->result()[0]->id;
			$this->db->where('id',$enter_id);
			$this->db->where('meta_key',$data['key']);
			$update_data = array('meta_value' => $data['value']);
        	return $this->db->update('tr_user_meta',$update_data);
		} else {
			$insert_data = array(
				'user_id' => $id,
				'meta_key' => $data['key'],
				'meta_value' => $data['value']
			);
			return $this->db->insert('tr_user_meta', $insert_data);
		}
	}

	public function get_amenities($user_id,$key) {
    	$this->db->where('user_id', $user_id);
    	$this->db->where('meta_key', $key);
    	$query = $this->db->get("tr_user_meta");
		if($query->result()) {
			$returndata = unserialize($query->result()[0]->meta_value);
			if(is_array($returndata)) {
				return $returndata;
			} else {
				return array();
			}
		} else {
			return array();
		}
	}


	public function search_amenities($value) {
		$search_array = $this->get_general_amenities();
		$key = 'name';
		$results = array(); 

		foreach ($search_array as $array) {
			if($array['name'] == $value) {
				return $array;
			}
		}
	}

}
/* End of file '/User_model.php' */
/* Location: ./application/models//User_model.php */