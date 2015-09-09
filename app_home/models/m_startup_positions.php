<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_startup_positions extends CI_Model{

	// Retrieve all data from table startup_positions
	public function get_startup_positions () {
		$database = $this->db->select('*')
					->from('startup_positions')
					->get()->result();
		return $database;
	}

	// Retrieve data from table startup_positions by id
	public function get_startup_positions_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('startup_positions')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table startup_positions
	public function insert_startup_positions ($data = array()) {
		/*
			$data['position_name']	= ;
			$data['description']	= ;
		*/
		$database = $this->db->insert('startup_positions', $data);
		return $database;
	}

	// Update data to table startup_positions by id
	public function update_startup_positions ($id = '', $data = array()) {
		/*
			$data['position_name']	= ;
			$data['description']	= ;
		*/
		$this->db->where('id', $id);
		$database = $this->db->update('startup_positions', $data);
		return $database;
	}

	// Delete data in table startup_positions by id
	public function delete_startup_positions_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('startup_positions');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

}