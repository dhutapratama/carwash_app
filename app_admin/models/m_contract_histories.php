<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_contract_histories extends CI_Model{

	// Retrieve all data from table contract_histories
	public function get_contract_histories () {
		$database = $this->db->select('*')
					->from('contract_histories')
					->get()->result();
		return $database;
	}

	// Retrieve data from table contract_histories by id
	public function get_contract_histories_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('contract_histories')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table contract_histories
	public function insert_contract_histories ($data = array()) {
		/*
			$data['contract_id']	= ;
			$data['member_id']		= ;
			$data['member_car_id']	= ;
			$data['created_date']	= ;
			$data['note']			= ;
			$data['total_day']		= ;
			$data['price']			= ;
		*/

		$database = $this->db->insert('contract_histories', $data);
		return $database;
	}

	// Update data to table contract_histories by id
	public function update_contract_histories ($id = '', $data = array()) {
		$this->db->where('id', $id);
		$database = $this->db->update('contract_histories', $data);
		return $database;
	}

	// Delete data in table contract_histories by id
	public function delete_contract_histories_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('contract_histories');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in contract_histories
	public function get_total_contract_histories () {
		$database = $this->db->count_all('contract_histories');
		return $database;
	}

	// Retrieve data from table contract_histories by contract_id
	public function get_contract_histories_by_contract_id ($contract_id = '') {

		$database = $this->db->select('*')
					->from('contract_histories')
					->where('contract_id', $contract_id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database;
		} else {
			return false;
		}
	}

}
