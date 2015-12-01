<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_member_cars extends CI_Model{

	// Retrieve all data from table member_cars
	public function get_member_cars () {
		$database = $this->db->select('*')
					->from('member_cars')
					->get()->result();
		return $database;
	}

	// Retrieve data from table member_cars by id
	public function get_member_cars_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('member_cars')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table member_cars
	public function insert_member_cars ($data = array()) {
		/*
			$data['user_id']			= ;
			$data['car_number']			= ;
			$data['color']				= ;
			$data['brand']				= ;
			$data['type']				= ;
		*/

		$database = $this->db->insert('member_cars', $data);
		return $database;
	}

	// Update data to table member_cars by id
	public function update_member_cars ($id = '', $data = array()) {
		/*
			$data['user_id']			= ;
			$data['car_number']			= ;
			$data['color']				= ;
			$data['brand']				= ;
			$data['type']				= ;
		*/

		$this->db->where('id', $id);
		$database = $this->db->update('member_cars', $data);
		return $database;
	}

	// Delete data in table member_cars by id
	public function delete_member_cars_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('member_cars');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in member_cars
	public function get_total_member_cars () {
		$database = $this->db->count_all('member_cars');
		return $database;
	}

	// Retrieve data from table member_cars by member_id
	public function get_member_cars_by_member_id ($member_id = '') {

		$database = $this->db->select('*')
					->from('member_cars')
					->where('member_id', $member_id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database;
		} else {
			return false;
		}
	}
}
