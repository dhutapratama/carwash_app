<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_public_news extends CI_Model{

	// Retrieve all data from table public_news
	public function get_public_news () {
		$database = $this->db->select('*')
					->from('public_news')
					->get()->result();
		return $database;
	}

	// Retrieve data from table public_news by id
	public function get_public_news_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('public_news')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table public_news
	public function insert_public_news ($data = array()) {
		/*
			$data['author_name']			= ;
			$data['profile_picture_url']	= ;
			$data['created_date']			= ;
			$data['updated_date']			= ;
			$data['title']					= ;
			$data['image_url']				= ;
			$data['contents']				= ;
			$data['url']					= ;
		*/

		$database = $this->db->insert('public_news', $data);
		return $database;
	}

	// Update data to table public_news by id
	public function update_public_news ($id = '', $data = array()) {
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
		$database = $this->db->update('public_news', $data);
		return $database;
	}

	// Delete data in table public_news by id
	public function delete_public_news_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('public_news');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in public_news
	public function get_total_public_news () {
		$database = $this->db->count_all('public_news');
		return $database;
	}
}
