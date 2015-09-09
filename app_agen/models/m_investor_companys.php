<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_investor_companys extends CI_Model{

	// Retrieve all data from table investor_companys
	public function get_investor_companys () {
		$database = $this->db->select('*')
					->from('investor_companys')
					->get()->result();
		return $database;
	}

	// Retrieve data from table investor_companys by id
	public function get_investor_companys_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('investor_companys')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table investor_companys
	public function insert_investor_companys ($data = array()) {
		/*
			$data['company_name']	= ;
			$data['description']	= ;
			$data['legal_name']		= ;
			$data['office_address']	= ;
			$data['office_phone']	= ;
			$data['found_date']		= ;
			$data['is_verified']	= ;
			$data['verified_date']	= ;
		*/
		$database = $this->db->insert('investor_companys', $data);
		return $database;
	}

	// Update data to table investor_companys by id
	public function update_investor_companys ($id = '', $data = array()) {
		/*
			$data['company_name']	= ;
			$data['description']	= ;
			$data['legal_name']		= ;
			$data['office_address']	= ;
			$data['office_phone']	= ;
			$data['found_date']		= ;
			$data['is_verified']	= ;
			$data['verified_date']	= ;
		*/
		$this->db->where('id', $id);
		$database = $this->db->update('investor_companys', $data);
		return $database;
	}

	// Delete data in table investor_companys by id
	public function delete_investor_companys_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('investor_companys');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

}