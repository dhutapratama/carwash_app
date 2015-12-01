<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_oauth_jwt extends CI_Model{

	// Retrieve all data from table oauth_jwt
	public function get_oauth_jwt () {
		$database = $this->db->select('*')
					->from('oauth_jwt')
					->get()->result();
		return $database;
	}

	// Retrieve data from table oauth_jwt by id
	public function get_oauth_jwt_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('oauth_jwt')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table oauth_jwt
	public function insert_oauth_jwt ($data = array()) {
		/*
			$data['client_id']				= ;
			$data['subject']				= ;
			$data['public_key']				= ;
		*/

		$database = $this->db->insert('oauth_jwt', $data);
		return $database;
	}

	// Update data to table oauth_jwt by id
	public function update_oauth_jwt ($id = '', $data = array()) {
		/*
			$data['client_id']				= ;
			$data['subject']				= ;
			$data['public_key']				= ;
		*/

		$this->db->where('id', $id);
		$database = $this->db->update('oauth_jwt', $data);
		return $database;
	}

	// Delete data in table oauth_jwt by id
	public function delete_oauth_jwt_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('oauth_jwt');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in oauth_jwt
	public function get_total_oauth_jwt () {
		$database = $this->db->count_all('oauth_jwt');
		return $database;
	}
}
