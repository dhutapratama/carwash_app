<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_oauth_scopes extends CI_Model{

	// Retrieve all data from table oauth_scopes
	public function get_oauth_scopes () {
		$database = $this->db->select('*')
					->from('oauth_scopes')
					->get()->result();
		return $database;
	}

	// Retrieve data from table oauth_scopes by id
	public function get_oauth_scopes_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('oauth_scopes')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table oauth_scopes
	public function insert_oauth_scopes ($data = array()) {
		/*
			$data['scope']				= ;
			$data['is_default']			= ;
		*/

		$database = $this->db->insert('oauth_scopes', $data);
		return $database;
	}

	// Update data to table oauth_scopes by id
	public function update_oauth_scopes ($id = '', $data = array()) {
		/*
			$data['scope']				= ;
			$data['is_default']			= ;
		*/

		$this->db->where('id', $id);
		$database = $this->db->update('oauth_scopes', $data);
		return $database;
	}

	// Delete data in table oauth_scopes by id
	public function delete_oauth_scopes_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('oauth_scopes');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in oauth_scopes
	public function get_total_oauth_scopes () {
		$database = $this->db->count_all('oauth_scopes');
		return $database;
	}
}
