<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_oauth_public_keys extends CI_Model{

	// Retrieve all data from table oauth_public_keys
	public function get_oauth_public_keys () {
		$database = $this->db->select('*')
					->from('oauth_public_keys')
					->get()->result();
		return $database;
	}

	// Retrieve data from table oauth_public_keys by id
	public function get_oauth_public_keys_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('oauth_public_keys')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table oauth_public_keys
	public function insert_oauth_public_keys ($data = array()) {
		/*
			$data['client_id']				= ;
			$data['public_key']				= ;
			$data['private_key']			= ;
			$data['encryption_algorithm']	= ;
		*/

		$database = $this->db->insert('oauth_public_keys', $data);
		return $database;
	}

	// Update data to table oauth_public_keys by id
	public function update_oauth_public_keys ($id = '', $data = array()) {
		/*
			$data['client_id']				= ;
			$data['public_key']				= ;
			$data['private_key']			= ;
			$data['encryption_algorithm']	= ;
		*/

		$this->db->where('id', $id);
		$database = $this->db->update('oauth_public_keys', $data);
		return $database;
	}

	// Delete data in table oauth_public_keys by id
	public function delete_oauth_public_keys_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('oauth_public_keys');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in oauth_public_keys
	public function get_total_oauth_public_keys () {
		$database = $this->db->count_all('oauth_public_keys');
		return $database;
	}
}
