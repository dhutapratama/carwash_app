<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_cars extends CI_Model{

	// Retrieve all data from table cars
	public function get_cars () {
		$database = $this->db->select('*')
					->from('cars')
					->get()->result();
		return $database;
	}

	// Retrieve data from table cars by id
	public function get_cars_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('cars')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table cars
	public function insert_cars ($data = array()) {
		/*
			$data['user_id']			= ;
			$data['car_number']			= ;
			$data['color']				= ;
			$data['brand']				= ;
			$data['type']				= ;
		*/

		$database = $this->db->insert('cars', $data);
		return $database;
	}

	// Update data to table cars by id
	public function update_cars ($id = '', $data = array()) {
		/*
			$data['user_id']			= ;
			$data['car_number']			= ;
			$data['color']				= ;
			$data['brand']				= ;
			$data['type']				= ;
		*/

		$this->db->where('id', $id);
		$database = $this->db->update('cars', $data);
		return $database;
	}

	// Delete data in table cars by id
	public function delete_cars_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('cars');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in cars
	public function get_total_cars () {
		$database = $this->db->count_all('cars');
		return $database;
	}
}
