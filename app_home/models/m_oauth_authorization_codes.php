<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_oauth_authorization_codes extends CI_Model{

	// Retrieve all data from table oauth_authorization_codes
	public function get_oauth_authorization_codes () {
		$database = $this->db->select('*')
					->from('oauth_authorization_codes')
					->get()->result();
		return $database;
	}

	// Retrieve data from table oauth_authorization_codes by id
	public function get_oauth_authorization_codes_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('oauth_authorization_codes')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table oauth_authorization_codes
	public function insert_oauth_authorization_codes ($data = array()) {
		/*
			$data['authorization_code']	= ;
			$data['client_id']			= ;
			$data['user_id']			= ;
			$data['redirect_uri']		= ;
			$data['expires']			= ;
			$data['scope']				= ;
			$data['id_token']			= ;
		*/

		$database = $this->db->insert('oauth_authorization_codes', $data);
		return $database;
	}

	// Update data to table oauth_authorization_codes by id
	public function update_oauth_authorization_codes ($id = '', $data = array()) {
		/*
			$data['authorization_code']	= ;
			$data['client_id']			= ;
			$data['user_id']			= ;
			$data['redirect_uri']		= ;
			$data['expires']			= ;
			$data['scope']				= ;
			$data['id_token']			= ;
		*/

		$this->db->where('id', $id);
		$database = $this->db->update('oauth_authorization_codes', $data);
		return $database;
	}

	// Delete data in table oauth_authorization_codes by id
	public function delete_oauth_authorization_codes_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('oauth_authorization_codes');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in oauth_authorization_codes
	public function get_total_oauth_authorization_codes () {
		$database = $this->db->count_all('oauth_authorization_codes');
		return $database;
	}
}
