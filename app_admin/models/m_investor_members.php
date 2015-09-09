<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_investor_members extends CI_Model{

	// Retrieve all data from table investor_members
	public function get_investor_members () {
		$database = $this->db->select('*')
					->from('investor_members')
					->get()->result();
		return $database;
	}

	// Retrieve data from table investor_members by id
	public function get_investor_members_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('investor_members')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table investor_members
	public function insert_investor_members ($data = array()) {
		/*
			$data['id_investor_user']		= ;
			$data['id_company']				= ;
			$data['id_investor_position']	= ;
			$data['is_admin']				= ;
		*/
		$database = $this->db->insert('investor_members', $data);
		return $database;
	}

	// Update data to table investor_members by id
	public function update_investor_members ($id = '', $data = array()) {
		/*
			$data['id_investor_user']		= ;
			$data['id_company']				= ;
			$data['id_investor_position']	= ;
			$data['is_admin']				= ;
		*/
		$this->db->where('id', $id);
		$database = $this->db->update('investor_members', $data);
		return $database;
	}

	// Delete data in table investor_members by id
	public function delete_investor_members_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('investor_members');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

}