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
			$data['member_id']			= ;
			$data['member_car_id']		= ;
			$data['location_id']		= ;
			$data['start_date']			= ;
			$data['due_date']			= ;
			$data['expired_date']		= ;
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

	public function get_contracts_by_member_id ($member_id = '') {

		$database = $this->db->select('*')
					->from('contracts')
					->where('member_id', $member_id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database;
		} else {
			return false;
		}
	}

	// Retrieve all data from table contracts
	public function get_contracts_all_data () {
		$database = $this->db->select('contracts.id as contract_id, contracts.*, members.*, member_cars.*, locations.*')
					->from('contracts')
					->join('members', 'members.id = contracts.member_id')
					->join('member_cars', 'member_cars.id = contracts.member_car_id')
					->join('locations', 'locations.id = contracts.location_id')
					->get()->result();
		return $database;
	}

	// Retrieve data from table contracts by contract_id
	public function get_contracts_all_data_by_id ($contract_id = '') {
		$database = $this->db->select('contracts.id as contract_id, contracts.*, members.*, member_cars.*, locations.*')
					->from('contracts')
					->where('contracts.id', $contract_id)
					->join('members', 'members.id = contracts.member_id')
					->join('member_cars', 'member_cars.id = contracts.member_car_id')
					->join('locations', 'locations.id = contracts.location_id')
					->get()->result();
		return $database;
	}
}
