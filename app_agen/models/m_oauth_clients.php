<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_oauth_clients extends CI_Model{

	// Retrieve all data from table oauth_clients
	public function get_oauth_clients () {
		$database = $this->db->select('*')
					->from('oauth_clients')
					->get()->result();
		return $database;
	}

	// Retrieve data from table oauth_clients by id
	public function get_oauth_clients_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('oauth_clients')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table oauth_clients
	public function insert_oauth_clients ($data = array()) {
		/*
			$data['application_name']			= ;
			$data['application_description']	= ;
			$data['client_id']					= ;
			$data['client_secret']				= ;
			$data['redirect_uri']				= ;
			$data['grant_types']				= ;
			$data['scope']						= ;
			$data['user_id']					= ;
			$data['public_key']					= ;
		*/

		$database = $this->db->insert('oauth_clients', $data);
		return $database;
	}

	// Update data to table oauth_clients by id
	public function update_oauth_clients ($id = '', $data = array()) {
		/*
			$data['application_name']			= ;
			$data['application_description']	= ;
			$data['client_id']					= ;
			$data['client_secret']				= ;
			$data['redirect_uri']				= ;
			$data['grant_types']				= ;
			$data['scope']						= ;
			$data['user_id']					= ;
			$data['public_key']					= ;
		*/

		$this->db->where('id', $id);
		$database = $this->db->update('oauth_clients', $data);
		return $database;
	}

	// Delete data in table oauth_clients by id
	public function delete_oauth_clients_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('oauth_clients');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in oauth_clients
	public function get_total_oauth_clients () {
		$database = $this->db->count_all('oauth_clients');
		return $database;
	}
}
