<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_locations extends CI_Model{

	// Retrieve all data from table locations
	public function get_locations () {
		$database = $this->db->select('*')
					->from('locations')
					->get()->result();
		return $database;
	}

	// Retrieve data from table locations by id
	public function get_locations_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('locations')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table locations
	public function insert_locations ($data = array()) {
		/*
			$data['name']			= ;
			$data['location_name']	= ;
			$data['city']			= ;
			$data['logitude']		= ;
			$data['latitude']		= ;
			$data['user_id']		= ;
			$data['created_at']		= ;
			$data['updated_at']		= ;
			$data['is_verified']	= ;
		*/

		$database = $this->db->insert('locations', $data);
		return $database;
	}

	// Update data to table locations by id
	public function update_locations ($id = '', $data = array()) {
		$this->db->where('id', $id);
		$database = $this->db->update('locations', $data);
		return $database;
	}

	// Delete data in table locations by id
	public function delete_locations_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('locations');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in locations
	public function get_total_locations () {
		$database = $this->db->count_all('locations');
		return $database;
	}

	// Retrieve data from table locations by username
	public function get_locations_by_username ($username = '') {

		$database = $this->db->select('*')
					->from('locations')
					->where('username', $username)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Retrieve data from table locations by username and password
	public function check_locations_by_username_password ($username = '', $password = '') {

		$database = $this->db->select('*')
					->from('locations')
					->where('username', $username)
					->where('password', md5($password))
					->get();

		if ($database->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	// Retrieve public data from table locations by id
	public function get_locations_public_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('locations')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();

			$data = new stdClass();

		   	$data->username = $database[0]->username;
		   	$data->full_name = $database[0]->full_name;
		   	$data->phone = $database[0]->phone;
		   	$data->email = $database[0]->email;
		   	$data->picture_path = $database[0]->picture_path;

			return $data;
		} else {
			return false;
		}
	}
}
