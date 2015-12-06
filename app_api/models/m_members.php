<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_members extends CI_Model{

	// Retrieve all data from table members
	public function get_members () {
		$database = $this->db->select('*')
					->from('members')
					->get()->result();
		return $database;
	}

	// Retrieve data from table members by id
	public function get_members_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('members')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table members
	public function insert_members ($data = array()) {
		/*
			$data['username']			= ;
			$data['password']			= ;
			$data['full_name']			= ;
			$data['address']			= ;
			$data['location_id']		= ;
			$data['phone']				= ;
			$data['email']				= ;
			$data['picture_url']		= ;
			$data['cover_url']			= ;
			$data['oauth_scope']		= ;
			$data['is_verified']		= ;
			$data['referral_code']		= ;
			$data['reffering_code']		= ;
		*/

		$database = $this->db->insert('members', $data);
		return $database;
	}

	// Update data to table members by id
	public function update_members ($id = '', $data = array()) {
		$this->db->where('id', $id);
		$database = $this->db->update('members', $data);
		return $database;
	}

	// Delete data in table members by id
	public function delete_members_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('members');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in members
	public function get_total_members () {
		$database = $this->db->count_all('members');
		return $database;
	}

	// Retrieve data from table members by username
	public function get_members_by_username ($username = '') {

		$database = $this->db->select('*')
					->from('members')
					->where('username', $username)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Retrieve data from table members by username and password
	public function check_members_by_username_password ($username = '', $password = '') {

		$database = $this->db->select('*')
					->from('members')
					->where('username', $username)
					->where('password', md5($password))
					->get();

		if ($database->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	// Retrieve public data from table members by id
	public function get_members_public_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('members')
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
