<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_cleaning_process extends CI_Model{

	// Retrieve all data from table cleaning_process
	public function get_cleaning_process () {
		$database = $this->db->select('*')
					->from('cleaning_process')
					->get()->result();
		return $database;
	}

	// Retrieve data from table cleaning_process by id
	public function get_cleaning_process_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('cleaning_process')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table cleaning_process
	public function insert_cleaning_process ($data = array()) {
		/*
			$data['contract_id']		= ;
			$data['member_id']			= ;
			$data['member_car_id']		= ;
			$data['location_id']		= ;
			$data['location_detail']	= ;
			$data['request_date']		= ;
			$data['request_list_id']	= ;
			$data['notes']				= ;
			$data['cleaning_user_id']	= ;
			$data['process_date']		= ;
		*/

		$database = $this->db->insert('cleaning_process', $data);
		return $database;
	}

	// Update data to table cleaning_process by id
	public function update_cleaning_process ($id = '', $data = array()) {
		$this->db->where('id', $id);
		$database = $this->db->update('cleaning_process', $data);
		return $database;
	}

	// Delete data in table cleaning_process by id
	public function delete_cleaning_process_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('cleaning_process');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in cleaning_process
	public function get_total_cleaning_process () {
		$database = $this->db->count_all('cleaning_process');
		return $database;
	}

	// Retrieve data from table cleaning_process by member_car_id
	public function get_cleaning_process_by_user_id ($user_id = '') {

		$database = $this->db->select('*')
					->from('cleaning_process')
					->where('cleaning_user_id', $user_id)
					->where('is_finish', 0)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database;
		} else {
			return false;
		}
	}

	// Retrieve data from table cleaning_process by request_list_id for supervisor 
	public function get_cleaning_process_by_spv_id ($supervisor_id = '') {

		$database = $this->db->select('*')
					->from('users')
					->where('supervisor_id', $supervisor_id)
					->join('cleaning_process', 'cleaning_process.cleaning_user_id = users.id')
					->where('is_finish', 0)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database;
		} else {
			return false;
		}
	}

	// Retrieve data from table cleaning_process by request_list_id and cleaning_user_id for detailer
	public function get_cleaning_process_by_request_list_id_and_cleaning_user_id ($request_list_id = '', $cleaning_user_id = '') {

		$database = $this->db->select('*')
					->from('cleaning_process')
					->where('request_list_id', $request_list_id)
					->where('cleaning_user_id', $cleaning_user_id)
					->where('is_finish', 0)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Retrieve data from table cleaning_process by request_list_id for supervisor 
	public function get_cleaning_process_by_request_list_id ($request_list_id = '') {

		$database = $this->db->select('*')
					->from('cleaning_process')
					->where('request_list_id', $request_list_id)
					->where('is_finish', 0)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}
}
