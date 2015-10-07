<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_price extends CI_Model{

	// Retrieve all data from table price
	public function get_price () {
		$database = $this->db->select('*')
					->from('price')
					->get()->result();
		return $database;
	}

	// Retrieve data from table price by id
	public function get_price_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('price')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table price
	public function insert_price ($data = array()) {
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

		$database = $this->db->insert('price', $data);
		return $database;
	}

	// Update data to table price by id
	public function update_price ($id = '', $data = array()) {
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

		$this->db->where('id', $id);
		$database = $this->db->update('price', $data);
		return $database;
	}

	// Delete data in table price by id
	public function delete_price_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('price');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in price
	public function get_total_price () {
		$database = $this->db->count_all('price');
		return $database;
	}
}
