<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user_type extends CI_Model{

	// Retrieve all data from table user_type
	public function get_user_type () {
		$database = $this->db->select('*')
					->from('user_type')
					->get()->result();
		return $database;
	}

	// Retrieve data from table user_type by id
	public function get_user_type_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('user_type')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table user_type
	public function insert_user_type ($data = array()) {
		/*
			$data['name']				= ;
			$data['description']		= ;
		*/

		$database = $this->db->insert('user_type', $data);
		return $database;
	}

	// Update data to table user_type by id
	public function update_user_type ($id = '', $data = array()) {
		/*
			$data['name']				= ;
			$data['description']		= ;
		*/

		$this->db->where('id', $id);
		$database = $this->db->update('user_type', $data);
		return $database;
	}

	// Delete data in table user_type by id
	public function delete_user_type_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('user_type');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in user_type
	public function get_total_user_type () {
		$database = $this->db->count_all('user_type');
		return $database;
	}
}
