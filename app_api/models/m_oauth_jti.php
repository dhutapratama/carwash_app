<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_oauth_jti extends CI_Model{

	// Retrieve all data from table oauth_jti
	public function get_oauth_jti () {
		$database = $this->db->select('*')
					->from('oauth_jti')
					->get()->result();
		return $database;
	}

	// Retrieve data from table oauth_jti by id
	public function get_oauth_jti_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('oauth_jti')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table oauth_jti
	public function insert_oauth_jti ($data = array()) {
		/*
			$data['issuer']				= ;
			$data['subject']			= ;
			$data['audience']			= ;
			$data['expires']			= ;
			$data['jti']				= ;
		*/

		$database = $this->db->insert('oauth_jti', $data);
		return $database;
	}

	// Update data to table oauth_jti by id
	public function update_oauth_jti ($id = '', $data = array()) {
		/*
			$data['issuer']				= ;
			$data['subject']			= ;
			$data['audience']			= ;
			$data['expires']			= ;
			$data['jti']				= ;
		*/

		$this->db->where('id', $id);
		$database = $this->db->update('oauth_jti', $data);
		return $database;
	}

	// Delete data in table oauth_jti by id
	public function delete_oauth_jti_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('oauth_jti');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in oauth_jti
	public function get_total_oauth_jti () {
		$database = $this->db->count_all('oauth_jti');
		return $database;
	}
}
