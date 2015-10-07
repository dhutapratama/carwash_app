<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_oauth_access_tokens extends CI_Model{

	// Retrieve all data from table oauth_access_tokens
	public function get_oauth_access_tokens () {
		$database = $this->db->select('*')
					->from('oauth_access_tokens')
					->get()->result();
		return $database;
	}

	// Retrieve data from table oauth_access_tokens by id
	public function get_oauth_access_tokens_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('oauth_access_tokens')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table oauth_access_tokens
	public function insert_oauth_access_tokens ($data = array()) {
		/*
			$data['access_token']		= ;
			$data['client_id']			= ;
			$data['user_id']			= ;
			$data['expires']			= ;
			$data['scope']				= ;
		*/

		$database = $this->db->insert('oauth_access_tokens', $data);
		return $database;
	}

	// Update data to table oauth_access_tokens by id
	public function update_oauth_access_tokens ($id = '', $data = array()) {
		/*
			$data['access_token']		= ;
			$data['client_id']			= ;
			$data['user_id']			= ;
			$data['expires']			= ;
			$data['scope']				= ;
		*/

		$this->db->where('id', $id);
		$database = $this->db->update('oauth_access_tokens', $data);
		return $database;
	}

	// Delete data in table oauth_access_tokens by id
	public function delete_oauth_access_tokens_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('oauth_access_tokens');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in oauth_access_tokens
	public function get_total_oauth_access_tokens () {
		$database = $this->db->count_all('oauth_access_tokens');
		return $database;
	}
}
