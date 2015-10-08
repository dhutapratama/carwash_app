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
			$data['phone']				= ;
			$data['email']				= ;
			$data['user_type_id']		= ;
			$data['picture_path']		= ;
			$data['oauth_scope']		= ;
			$data['is_verified']		= ;
		*/

		$database = $this->db->insert('users', $data);
		return $database;
	}

	// Update data to table users by id
	public function update_users ($id = '', $data = array()) {
		/*
			$data['username']			= ;
			$data['password']			= ;
			$data['full_name']			= ;
			$data['phone']				= ;
			$data['email']				= ;
			$data['user_type_id']		= ;
			$data['picture_path']		= ;
			$data['oauth_scope']		= ;
			$data['is_verified']		= ;
		*/

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
}
