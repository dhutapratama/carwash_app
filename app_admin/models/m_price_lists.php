<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_price_lists extends CI_Model{

	// Retrieve all data from table price_lists
	public function get_price_lists () {
		$database = $this->db->select('*')
					->from('price_lists')
					->get()->result();
		return $database;
	}

	// Retrieve data from table price_lists by id
	public function get_price_lists_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('price_lists')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table price_lists
	public function insert_price_lists ($data = array()) {
		/*
			$data['name']				= ;
			$data['price']				= ;
			$data['price_type_id']		= ;
			$data['month']				= ;
			$data['day']				= ;
			$data['credit']				= ;
			$data['is_active']			= ;
			$data['created_at']			= ;
			$data['updated_at']			= ;
			$data['creator_id']			= ;
		*/

		$database = $this->db->insert('price_lists', $data);
		return $database;
	}

	// Update data to table price_lists by id
	public function update_price_lists ($id = '', $data = array()) {
		/*
			$data['name']				= ;
			$data['price_lists']				= ;
			$data['price_lists_type_id']		= ;
			$data['month']				= ;
			$data['day']				= ;
			$data['credit']				= ;
			$data['is_active']			= ;
			$data['created_at']			= ;
			$data['updated_at']			= ;
			$data['creator_id']			= ;
		*/

		$this->db->where('id', $id);
		$database = $this->db->update('price_lists', $data);
		return $database;
	}

	// Delete data in table price_lists by id
	public function delete_price_lists_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('price_lists');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in price_lists
	public function get_total_price_lists () {
		$database = $this->db->count_all('price_lists');
		return $database;
	}
}
