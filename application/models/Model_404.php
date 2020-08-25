<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Model_404 extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	public function get_user_data($id) {
		$this->db->where('id', $id);
		$query = $this->db->get("tr_users");
		return $query->result()[0];
	}
}
/* End of file '/404.php' */
/* Location: ./application/models//404.php */