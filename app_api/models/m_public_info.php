<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_public_info extends CI_Model{

	// Retrieve all data from table public_info
	public function get_public_info () {
		$database = $this->db->select('*')
					->from('public_info')
					->get()->result();
		return $database;
	}

	// Retrieve data from table public_info by id
	public function get_public_info_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('public_info')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table public_info
	public function insert_public_info ($data = array()) {
		/*
			$data['author_name']			= ;
			$data['profile_picture_url']	= ;
			$data['created_date']			= ;
			$data['updated_date']			= ;
			$data['title']					= ;
			$data['image_url']				= ;
			$data['contents']				= ;
			$data['url']					= ;
			$data['video_id']				= ;
		*/

		$database = $this->db->insert('public_info', $data);
		return $database;
	}

	// Update data to table public_info by id
	public function update_public_info ($id = '', $data = array()) {
		/*
			$data['author_name']			= ;
			$data['profile_picture_url']	= ;
			$data['created_date']			= ;
			$data['updated_date']			= ;
			$data['title']					= ;
			$data['image_url']				= ;
			$data['contents']				= ;
			$data['url']					= ;
			$data['video_id']				= ;
		*/

		$this->db->where('id', $id);
		$database = $this->db->update('public_info', $data);
		return $database;
	}

	// Delete data in table public_info by id
	public function delete_public_info_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('public_info');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in public_info
	public function get_total_public_info () {
		$database = $this->db->count_all('public_info');
		return $database;
	}
}
