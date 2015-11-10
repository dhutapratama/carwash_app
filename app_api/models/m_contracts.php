<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_contracts extends CI_Model{

	// Retrieve all data from table contracts
	public function get_contracts () {
		$database = $this->db->select('*')
					->from('contracts')
					->get()->result();
		return $database;
	}

	// Retrieve data from table contracts by id
	public function get_contracts_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('contracts')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table contracts
	public function insert_contracts ($data = array()) {
		/*
			$data['name']				= ;
			$data['location']			= ;
			$data['city']				= ;
			$data['longitude']			= ;
			$data['latitude']			= ;
			$data['user_id']			= ;
			$data['created_at']			= ;
			$data['updated_at']			= ;
			$data['is_expired']			= ;
		*/

		$database = $this->db->insert('contracts', $data);
		return $database;
	}

	// Update data to table contracts by id
	public function update_contracts ($id = '', $data = array()) {
		$this->db->where('id', $id);
		$database = $this->db->update('contracts', $data);
		return $database;
	}

	// Delete data in table contracts by id
	public function delete_contracts_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('contracts');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in contracts
	public function get_total_contracts () {
		$database = $this->db->count_all('contracts');
		return $database;
	}

	// Retrieve data from table contracts by member_car_id
	public function get_contracts_by_member_car_id ($member_car_id = '') {

		$database = $this->db->select('*')
					->from('contracts')
					->where('member_car_id', $member_car_id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	public function get_contracts_active_membership() {
		$database = $this->db->select('*')
					->from('contracts')
					->where('expired_date >=', date('Y-m-d')." 00:00:00")
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database;
		} else {
			return false;
		}
	}
}
