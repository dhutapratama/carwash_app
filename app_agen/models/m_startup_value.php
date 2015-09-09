<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_startup_value extends CI_Model{

	// Retrieve all data from table startup_value
	public function get_startup_value () {
		$database = $this->db->select('*')
					->from('startup_value')
					->get()->result();
		return $database;
	}

	// Retrieve data from table startup_value by id
	public function get_startup_value_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('startup_value')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table startup_value
	public function insert_startup_value ($data = array()) {
		/*
			$data['id_startup']		= ;
			$data['id_investment']	= ;
			$data['fund_value']		= ;
			$data['debt_value']		= ;
			$data['assets_value']	= ;
			$data['date']			= ;
		*/
		$database = $this->db->insert('startup_value', $data);
		return $database;
	}

	// Update data to table startup_value by id
	public function update_startup_value ($id = '', $data = array()) {
		/*
			$data['id_startup']		= ;
			$data['id_investment']	= ;
			$data['fund_value']		= ;
			$data['debt_value']		= ;
			$data['assets_value']	= ;
			$data['date']			= ;
		*/
		$this->db->where('id', $id);
		$database = $this->db->update('startup_value', $data);
		return $database;
	}

	// Delete data in table startup_value by id
	public function delete_startup_value_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('startup_value');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

}