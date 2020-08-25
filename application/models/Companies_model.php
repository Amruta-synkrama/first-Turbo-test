<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class Companies_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function get_companies($company_id) {
		$this->db->select('*');
		$this->db->from('tr_users');
		$this->db->join('tr_company', 'tr_company.user_id = tr_users.id');
		$this->db->where('tr_users.entity', 'RPF');
		if($company_id) {
			$this->db->where('tr_users.id', $company_id);
		}
		$query = $this->db->get();
		if($query->result()) {
			return $query->result();
		} else {
			return array();
		}
	}
}
/* End of file '/Companies.php' */
/* Location: ./application/models//Companies.php */