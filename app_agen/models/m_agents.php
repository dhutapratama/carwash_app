<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_agents extends CI_Model{

	// Retrieve all data from table agents
	public function get_agents () {
		$database = $this->db->select('*')
					->from('agents')
					->get()->result();
		return $database;
	}

	// Retrieve data from table agents by id
	public function get_agents_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('agents')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table agents
	public function insert_agents ($data = array()) {
		/*
			$data['name']				= ;
			$data['location']			= ;
			$data['city']				= ;
			$data['longitude']			= ;
			$data['latitude']			= ;
			$data['user_id']			= ;
			$data['created_at']			= ;
			$data['updated_at']			= ;
		*/

		$database = $this->db->insert('agents', $data);
		return $database;
	}

	// Update data to table agents by id
	public function update_agents ($id = '', $data = array()) {
		/*
			$data['name']				= ;
			$data['location']			= ;
			$data['city']				= ;
			$data['longitude']			= ;
			$data['latitude']			= ;
			$data['user_id']			= ;
			$data['created_at']			= ;
			$data['updated_at']			= ;
		*/

		$this->db->where('id', $id);
		$database = $this->db->update('agents', $data);
		return $database;
	}

	// Delete data in table agents by id
	public function delete_agents_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('agents');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in agents
	public function get_total_agents () {
		$database = $this->db->count_all('agents');
		return $database;
	}
}
