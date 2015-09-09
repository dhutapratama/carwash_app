<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_startup_growth extends CI_Model{

	// Retrieve all data from table startup_growth
	public function get_startup_growth () {
		$database = $this->db->select('*')
					->from('startup_growth')
					->get()->result();
		return $database;
	}

	// Retrieve data from table startup_growth by id
	public function get_startup_growth_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('startup_growth')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table startup_growth
	public function insert_startup_growth ($data = array()) {
		/*
			$data['id_startup']	= ;
			$data['provit']		= ;
			$data['date']		= ;
		*/
		$database = $this->db->insert('startup_growth', $data);
		return $database;
	}

	// Update data to table startup_growth by id
	public function update_startup_growth ($id = '', $data = array()) {
		/*
			$data['id_startup']	= ;
			$data['provit']		= ;
			$data['date']		= ;
		*/
		$this->db->where('id', $id);
		$database = $this->db->update('startup_growth', $data);
		return $database;
	}

	// Delete data in table startup_growth by id
	public function delete_startup_growth_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('startup_growth');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

}