<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_startups extends CI_Model{

	// Retrieve all data from table startups
	public function get_startups () {
		$database = $this->db->select('*')
					->from('startups')
					->get()->result();
		return $database;
	}

	// Retrieve data from table startups by id
	public function get_startups_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('startups')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table startups
	public function insert_startups ($data = array()) {
		/*
			$data['startup_name']				= ;
			$data['description']				= ;
			$data['legal_name']					= ;
			$data['office_address']			= ;
			$data['office_phone']				= ;
			$data['npwp_number']				= ;
			$data['siup_umber']					= ;
			$data['startup_logo']				= ;
			$data['startup_logo_thumb']	= ;
			$data['startup_url']				= ;
			$data['found_date']					= ;
			$data['is_verified']				= ;
			$data['verified_date']			= ;
			$data['create_date']				= ;
			$data['update_date']				= ;
			$data['angellist_id']				= ;
		*/

		$database = $this->db->insert('startups', $data);
		return $database;
	}

	// Update data to table startups by id
	public function update_startups ($id = '', $data = array()) {
		/*
			$data['startup_name']				= ;
			$data['description']				= ;
			$data['legal_name']					= ;
			$data['office_address']			= ;
			$data['office_phone']				= ;
			$data['npwp_number']				= ;
			$data['siup_umber']					= ;
			$data['startup_logo']				= ;
			$data['startup_logo_thumb']	= ;
			$data['startup_url']				= ;
			$data['found_date']					= ;
			$data['is_verified']				= ;
			$data['verified_date']			= ;
			$data['create_date']				= ;
			$data['update_date']				= ;
			$data['angellist_id']				= ;
		*/

		$this->db->where('id', $id);
		$database = $this->db->update('startups', $data);
		return $database;
	}

	// Delete data in table startups by id
	public function delete_startups_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('startups');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in subscriber_startups
	public function get_total_startups () {
		$database = $this->db->count_all('startups');
		return $database;
	}
}
