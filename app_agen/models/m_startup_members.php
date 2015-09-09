<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_startup_members extends CI_Model{

	// Retrieve all data from table startup_members
	public function get_startup_members () {
		$database = $this->db->select('*')
					->from('startup_members')
					->get()->result();
		return $database;
	}

	// Retrieve data from table startup_members by id
	public function get_startup_members_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('startup_members')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table startup_members
	public function insert_startup_members ($data = array()) {
		/*
			$data['id_startup']				= ;
			$data['id_startup_user']		= ;
			$data['is_admin']				= ;
			$data['id_startup_position']	= ;
		*/
		$database = $this->db->insert('startup_members', $data);
		return $database;
	}

	// Update data to table startup_members by id
	public function update_startup_members ($id = '', $data = array()) {
		/*
			$data['id_startup']				= ;
			$data['id_startup_user']		= ;
			$data['is_admin']				= ;
			$data['id_startup_position']	= ;
		*/
		$this->db->where('id', $id);
		$database = $this->db->update('startup_members', $data);
		return $database;
	}

	// Delete data in table startup_members by id
	public function delete_startup_members_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('startup_members');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

}