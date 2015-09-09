<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_investments extends CI_Model{

	// Retrieve all data from table investments
	public function get_investments () {
		$database = $this->db->select('*')
					->from('investments')
					->get()->result();
		return $database;
	}

	// Retrieve data from table investments by id
	public function get_investments_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('investments')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table investments
	public function insert_investments ($data = array()) {
		/*
			$data['id_investor_company']	= ;
			$data['id_startup']				= ;
			$data['invest_value']			= ;
			$data['publishment_date']		= ;
		*/
		$database = $this->db->insert('investments', $data);
		return $database;
	}

	// Update data to table investments by id
	public function update_investments ($id = '', $data = array()) {
		/*
			$data['id_investor_company']	= ;
			$data['id_startup']				= ;
			$data['invest_value']			= ;
			$data['publishment_date']		= ;
		*/
		$this->db->where('id', $id);
		$database = $this->db->update('investments', $data);
		return $database;
	}

	// Delete data in table investments by id
	public function delete_investments_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('investments');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

}