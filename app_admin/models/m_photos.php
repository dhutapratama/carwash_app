<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_photos extends CI_Model{

	// Retrieve all data from table photos
	public function get_photos () {
		$database = $this->db->select('*')
					->from('photos')
					->get()->result();
		return $database;
	}

	// Retrieve data from table photos by id
	public function get_photos_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('photos')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table photos
	public function insert_photos ($data = array()) {
		/*
			$data['session_id']				= ;
			$data['description']			= ;
			$data['user_id']				= ;
			$data['on_board_id']			= ;
			$data['created_date']			= ;
			$data['expired_date']			= ;
			$data['photo_path']				= ;
			$data['photo_url']				= ;
		*/

		$database = $this->db->insert('photos', $data);
		return $database;
	}

	// Update data to table photos by id
	public function update_photos ($id = '', $data = array()) {
		/*
			$data['session_id']				= ;
			$data['description']			= ;
			$data['user_id']				= ;
			$data['on_board_id']			= ;
			$data['created_date']			= ;
			$data['expired_date']			= ;
			$data['photo_path']				= ;
			$data['photo_url']				= ;
		*/

		$this->db->where('id', $id);
		$database = $this->db->update('photos', $data);
		return $database;
	}

	// Delete data in table photos by id
	public function delete_photos_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('photos');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in photos
	public function get_total_photos () {
		$database = $this->db->count_all('photos');
		return $database;
	}
}
