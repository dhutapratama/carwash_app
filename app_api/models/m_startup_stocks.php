<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_startup_stocks extends CI_Model{

	// Retrieve all data from table startup_stocks
	public function get_startup_stocks () {
		$database = $this->db->select('*')
					->from('startup_stocks')
					->get()->result();
		return $database;
	}

	// Retrieve data from table startup_stocks by id
	public function get_startup_stocks_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('startup_stocks')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table startup_stocks
	public function insert_startup_stocks ($data = array()) {
		/*
			$data['id_startup']	= ;
			$data['stocks']		= ;
			$data['min_invest']	= ;
			$data['price']		= ;
			$data['date']		= ;
		*/
		$database = $this->db->insert('startup_stocks', $data);
		return $database;
	}

	// Update data to table startup_stocks by id
	public function update_startup_stocks ($id = '', $data = array()) {
		/*
			$data['id_startup']	= ;
			$data['stocks']		= ;
			$data['min_invest']	= ;
			$data['price']		= ;
			$data['date']		= ;
		*/
		$this->db->where('id', $id);
		$database = $this->db->update('startup_stocks', $data);
		return $database;
	}

	// Delete data in table startup_stocks by id
	public function delete_startup_stocks_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('startup_stocks');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

}