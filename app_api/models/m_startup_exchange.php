<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_startup_exchange extends CI_Model{

	// Retrieve all data from table startup_exchange
	public function get_startup_exchange () {
		$database = $this->db->select('*')
					->from('startup_exchange')
					->get()->result();
		return $database;
	}

	// Retrieve data from table startup_exchange by id
	public function get_startup_exchange_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('startup_exchange')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table startup_exchange
	public function insert_startup_exchange ($data = array()) {
		/*
			$data['id_startup']	= ;
			$data['sell_price']	= ;
			$data['buy_price']	= ;
			$data['date']		= ;
		*/
		$database = $this->db->insert('startup_exchange', $data);
		return $database;
	}

	// Update data to table startup_exchange by id
	public function update_startup_exchange ($id = '', $data = array()) {
		/*
			$data['id_startup']	= ;
			$data['sell_price']	= ;
			$data['buy_price']	= ;
			$data['date']		= ;
		*/
		$this->db->where('id', $id);
		$database = $this->db->update('startup_exchange', $data);
		return $database;
	}

	// Delete data in table startup_exchange by id
	public function delete_startup_exchange_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('startup_exchange');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

}