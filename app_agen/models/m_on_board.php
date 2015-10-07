<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_on_board extends CI_Model{

	// Retrieve all data from table on_board
	public function get_on_board () {
		$database = $this->db->select('*')
					->from('on_board')
					->get()->result();
		return $database;
	}

	// Retrieve data from table on_board by id
	public function get_on_board_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('on_board')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table on_board
	public function insert_on_board ($data = array()) {
		/*
			$data['custommer_id']			= ;
			$data['agent_id']				= ;
			$data['cs_id']					= ;
			$data['request_date']			= ;
			$data['onboard_date']			= ;
			$data['finish_date']			= ;
			$data['photo_id']				= ;
		*/

		$database = $this->db->insert('on_board', $data);
		return $database;
	}

	// Update data to table on_board by id
	public function update_on_board ($id = '', $data = array()) {
		/*
			$data['custommer_id']			= ;
			$data['agent_id']				= ;
			$data['cs_id']					= ;
			$data['request_date']			= ;
			$data['onboard_date']			= ;
			$data['finish_date']			= ;
			$data['photo_id']				= ;
		*/

		$this->db->where('id', $id);
		$database = $this->db->update('on_board', $data);
		return $database;
	}

	// Delete data in table on_board by id
	public function delete_on_board_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('on_board');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in on_board
	public function get_total_on_board () {
		$database = $this->db->count_all('on_board');
		return $database;
	}
}
