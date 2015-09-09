<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_investor_users extends CI_Model{

	// Retrieve all data from table investor_users
	public function get_investor_users () {
		$database = $this->db->select('*')
					->from('investor_users')
					->get()->result();
		return $database;
	}

	// Retrieve data from table investor_users by id
	public function get_investor_users_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('investor_users')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table investor_users
	public function insert_investor_users ($data = array()) {
		/*
			$data['username']			= ;
			$data['password']			= ;
			$data['first_name']			= ;
			$data['last_name']			= ;
			$data['address']			= ;
			$data['phone']				= ;
			$data['email']				= ;
			$data['backup_email']		= ;
			$data['user_picture_path']	= ;
			$data['confirmation_code']	= ;
			$data['is_verified']		= ;
		*/
		$database = $this->db->insert('investor_users', $data);
		return $database;
	}

	// Update data to table investor_users by id
	public function update_investor_users ($id = '', $data = array()) {
		/*
			$data['username']			= ;
			$data['password']			= ;
			$data['first_name']			= ;
			$data['last_name']			= ;
			$data['address']			= ;
			$data['phone']				= ;
			$data['email']				= ;
			$data['backup_email']		= ;
			$data['user_picture_path']	= ;
			$data['confirmation_code']	= ;
			$data['is_verified']		= ;
		*/
		$this->db->where('id', $id);
		$database = $this->db->update('investor_users', $data);
		return $database;
	}

	// Delete data in table investor_users by id
	public function delete_investor_users_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('investor_users');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

}