<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_oauth_authorization_codes extends CI_Model{

	// Retrieve all data from table oauth_authorization_codes
	public function get_oauth_authorization_codes () {
		$database = $this->db->select('*')
					->from('oauth_authorization_codes')
					->get()->result();
		return $database;
	}

	// Retrieve data from table oauth_authorization_codes by authorization_code
	public function get_oauth_authorization_codes_by_authorization_code ($authorization_code = '') {

		$database = $this->db->select('*')
					->from('oauth_authorization_codes')
					->where('authorization_code', $authorization_code)
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
		*/

		$database = $this->db->insert('oauth_authorization_codes', $data);
		return $database;
	}

	// Update data to table oauth_authorization_codes by authorization_code
	public function update_oauth_authorization_codes ($authorization_code = '', $data = array()) {
		/*
			$data['authorization_code']	= ;
			$data['client_id']			= ;
			$data['user_id']			= ;
			$data['redirect_uri']		= ;
			$data['expires']			= ;
			$data['scope']				= ;
		*/

		$this->db->where('authorization_code', $authorization_code);
		$database = $this->db->update('oauth_authorization_codes', $data);
		return $database;
	}

	// Delete data in table oauth_authorization_codes by authorization_code
	public function delete_oauth_authorization_codes_by_authorization_code ($authorization_code = '') {
		$this->db->where('authorization_code', $authorization_code);
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

	public function get_oauth_authorization_codes_by_authorization_code_client_id ($authorization_code = '', $client_id = "") {

		$database = $this->db->select('*')
					->from('oauth_authorization_codes')
					->where('authorization_code', $authorization_code)
					->where('client_id', $client_id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}
}
