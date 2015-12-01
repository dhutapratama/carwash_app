<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_request_taken extends CI_Model{

	// Retrieve all data from table request_taken
	public function get_request_taken () {
		$database = $this->db->select('*')
					->from('request_taken')
					->get()->result();
		return $database;
	}

	// Retrieve data from table request_taken by id
	public function get_request_taken_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('request_taken')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table request_taken
	public function insert_request_taken ($data = array()) {
		/*
			$data['contract_id']			= ;
			$data['member_id']				= ;
			$data['member_car_id']			= ;
			$data['cleaning_user_id']		= ;
			$data['location_id']			= ;
			$data['location_detail']		= ;
			$data['request_date']			= ;
			$data['process_date']			= ;
			$data['finish_date']			= ;
			$data['is_taken']				= ;
			$data['cleaning_process_id']	= ;
		*/

		$database = $this->db->insert('request_taken', $data);
		return $database;
	}

	// Update data to table request_taken by id
	public function update_request_taken ($id = '', $data = array()) {
		$this->db->where('id', $id);
		$database = $this->db->update('request_taken', $data);
		return $database;
	}

	// Delete data in table request_taken by id
	public function delete_request_taken_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('request_taken');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in request_taken
	public function get_total_request_taken () {
		$database = $this->db->count_all('request_taken');
		return $database;
	}

	public function get_request_taken_by_last_cleaning ($contract_id = '') {

		$database = $this->db->select('*')
					->from('request_taken')
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

	public function get_request_taken_by_now ($member_id = '') {
		$database = $this->db->select('*')
					->from('request_taken')
					->where('member_id', $member_id)
					->order_by('id', 'desc')
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	public function get_request_taken_by_cleaning_user_id_today ($cleaning_user_id = '') {
		$database = $this->db->select('*')
					->from('request_taken')
					->where('cleaning_user_id', $cleaning_user_id)
					->where('process_date', date('Y-m-d'))
					->get();

		return $database->num_rows();
	}

	public function get_request_taken_by_cleaning_user_id_total ($cleaning_user_id = '') {
		$database = $this->db->select('*')
					->from('request_taken')
					->where('cleaning_user_id', $cleaning_user_id)
					->get();

		return $database->num_rows();
	}
}
