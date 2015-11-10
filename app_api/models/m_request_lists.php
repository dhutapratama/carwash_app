<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_request_lists extends CI_Model{

	// Retrieve all data from table request_lists
	public function get_request_lists () {
		$database = $this->db->select('*')
					->from('request_lists')
					->get()->result();
		return $database;
	}

	// Retrieve data from table request_lists by id
	public function get_request_lists_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('request_lists')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table request_lists
	public function insert_request_lists ($data = array()) {
		/*
			$data['contract_id']		= ;
			$data['member_id']			= ;
			$data['member_car_id']		= ;
			$data['location_id']		= ;
			$data['location_detail']	= ;
			$data['request_date']		= ;
			$data['is_taken']			= ;
		*/

		$database = $this->db->insert('request_lists', $data);
		return $database;
	}

	// Update data to table request_lists by id
	public function update_request_lists ($id = '', $data = array()) {
		$this->db->where('id', $id);
		$database = $this->db->update('request_lists', $data);
		return $database;
	}

	// Delete data in table request_lists by id
	public function delete_request_lists_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('request_lists');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in request_lists
	public function get_total_request_lists () {
		$database = $this->db->count_all('request_lists');
		return $database;
	}

	public function get_request_lists_by_last_cleaning ($contract_id = '') {

		$database = $this->db->select('*')
					->from('request_lists')
					->where('contract_id', $contract_id)
					->where('request_date >=', date('Y-m-d', time() - (60*60*24*3))." 00:00:00")
					->where('request_date <', date('Y-m-d H:i:s'))
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	public function get_request_lists_by_now ($member_id = '') {
		$database = $this->db->select('*')
					->from('request_lists')
					->where('member_id', $member_id)
					->where('is_taken', 0)
					->order_by('id', 'desc')
					->limit(1)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	public function get_request_lists_by_location_id ($location_id = '') {

		$database = $this->db->select('*')
					->from('request_lists')
					->where('location_id', $location_id)
					->where('is_taken', '0')
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database;
		} else {
			return false;
		}
	}

	public function get_request_lists_by_location_id_and_spv ($location_id = '') {

		$database = $this->db->select('*')
					->from('request_lists')
					->where('location_id', $location_id)
					->where('is_taken', '0')
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database;
		} else {
			return false;
		}
	}
}
