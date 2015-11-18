<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_washing_photos extends CI_Model{

	// Retrieve all data from table washing_photos
	public function get_washing_photos () {
		$database = $this->db->select('*')
					->from('washing_photos')
					->get()->result();
		return $database;
	}

	// Retrieve data from table washing_photos by id
	public function get_washing_photos_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('washing_photos')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table washing_photos
	public function insert_washing_photos ($data = array()) {
		/*
			$data['member_id']			= ;
			$data['request_list_id']	= ;
			$data['user_id']			= ;
			$data['created_date']		= ;
			$data['expired_date']		= ;
			$data['photo_url']			= ;
			$data['is_after']			= ;
		*/

		$database = $this->db->insert('washing_photos', $data);
		return $database;
	}

	// Update data to table washing_photos by id
	public function update_washing_photos ($id = '', $data = array()) {
		$this->db->where('id', $id);
		$database = $this->db->update('washing_photos', $data);
		return $database;
	}

	// Delete data in table washing_photos by id
	public function delete_washing_photos_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('washing_photos');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in washing_photos
	public function get_total_washing_photos () {
		$database = $this->db->count_all('washing_photos');
		return $database;
	}

		// Retrieve data from table washing_photos by request_taken_id
	public function get_washing_photos_by_request_taken_id ($request_taken_id = '') {

		$database = $this->db->select('*')
					->from('washing_photos')
					->where('request_list_id', $request_taken_id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database;
		} else {
			return false;
		}
	}

	public function get_washing_photos_by_request_list_id ($request_list_id = '') {

		$database = $this->db->select('*')
					->from('washing_photos')
					->where('request_list_id', $request_list_id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database;
		} else {
			return false;
		}
	}
}
