<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_waiting_list extends CI_Model{

	// Retrieve all data from table waiting_list
	public function get_waiting_list () {
		$database = $this->db->select('*')
					->from('waiting_list')
					->get()->result();
		return $database;
	}

	// Retrieve data from table waiting_list by id
	public function get_waiting_list_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('waiting_list')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table waiting_list
	public function insert_waiting_list ($data = array()) {
		/*
			$data['request_date']		= ;
			$data['location']			= ;
			$data['custommer_id']		= ;
			$data['car_id']				= ;
		*/

		$database = $this->db->insert('waiting_list', $data);
		return $database;
	}

	// Update data to table waiting_list by id
	public function update_waiting_list ($id = '', $data = array()) {
		/*
			$data['request_date']		= ;
			$data['location']			= ;
			$data['custommer_id']		= ;
			$data['car_id']				= ;
		*/

		$this->db->where('id', $id);
		$database = $this->db->update('waiting_list', $data);
		return $database;
	}

	// Delete data in table waiting_list by id
	public function delete_waiting_list_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('waiting_list');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in waiting_list
	public function get_total_waiting_list () {
		$database = $this->db->count_all('waiting_list');
		return $database;
	}
}
