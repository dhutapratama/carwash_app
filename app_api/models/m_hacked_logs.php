<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_hacked_logs extends CI_Model{

	// Retrieve all data from table hacked_logs
	public function get_hacked_logs ($array_output = false) {
		$database = $this->db->select('*')
					->from('hacked_logs')
					->get();

		if ($array_output) {
			$database = $database->result_array();
		} else {
			$database = $database->result();
		}
		return $database;
	}

	// Retrieve data from table hacked_logs by id
	public function get_hacked_logs_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('hacked_logs')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table hacked_logs
	public function insert_hacked_logs ($data = array()) {
		/*
			$data['detection_date']	= ;
			$data['ip_address']		= ;
			$data['hacking_type']	= ;
			$data['resolving_type']	= ;
		*/
		$data['detection_date']	= date('Y-m-d H:i:s');
		$data['ip_address']		= $_SERVER['REMOTE_ADDR'];
		$database = $this->db->insert('hacked_logs', $data);
		return $database;
	}

	// Update data to table hacked_logs by id
	public function update_hacked_logs ($id = '', $data = array()) {
		/*
			$data['detection_date']	= ;
			$data['ip_address']		= ;
			$data['hacking_type']	= ;
			$data['resolving_type']	= ;
		*/
		$this->db->where('id', $id);
		$database = $this->db->update('hacked_logs', $data);
		return $database;
	}

	// Delete data in table hacked_logs by id
	public function delete_hacked_logs_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('hacked_logs');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------


}