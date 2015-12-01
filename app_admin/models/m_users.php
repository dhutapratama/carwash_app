<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_users extends CI_Model{

	// Retrieve all data from table users
	public function get_users () {
		$database = $this->db->select('*')
					->from('users')
					->get()->result();
		return $database;
	}

	// Retrieve data from table users by id
	public function get_users_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('users')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table users
	public function insert_users ($data = array()) {
		/*
			$data['username']			= ;
			$data['password']			= ;
			$data['full_name']			= ;
			$data['address']			= ;
			$data['phone']				= ;
			$data['email']				= ;
			$data['user_type_id']		= ;
			$data['picture_url']		= ;
			$data['oauth_scope']		= ;
			$data['is_verified']		= ;
			$data['supervisor_id']		= ;
			$data['location_id']		= ;

		*/

		$database = $this->db->insert('users', $data);
		return $database;
	}

	// Update data to table users by id
	public function update_users ($id = '', $data = array()) {
		$this->db->where('id', $id);
		$database = $this->db->update('users', $data);
		return $database;
	}

	// Delete data in table users by id
	public function delete_users_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('users');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in users
	public function get_total_users () {
		$database = $this->db->count_all('users');
		return $database;
	}

	// Retrieve data from table users by username
	public function get_users_by_username ($username = '') {

		$database = $this->db->select('*')
					->from('users')
					->where('username', $username)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Retrieve data from table users by username and password
	public function check_users_by_username_password ($username = '', $password = '') {

		$database = $this->db->select('*')
					->from('users')
					->where('username', $username)
					->where('password', md5($password))
					->get();

		if ($database->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	// Retrieve public data from table users by id
	public function get_users_public_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('users')
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

	public function get_users_by_supervisor_id($supervisor_id = '') {
		$database = $this->db->select('id, full_name')
					->from('users')
					->where('supervisor_id', $supervisor_id)
					->get();

		if ($database->num_rows() > 0) {
			return $database->result();
		} else {
			return false;
		}
	}
}
