<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_traffic_infos extends CI_Model{

	// Retrieve all data from table traffic_infos
	public function get_traffic_infos () {
		$database = $this->db->select('*')
					->from('traffic_infos')
					->get()->result();
		return $database;
	}

	// Retrieve data from table traffic_infos by id
	public function get_traffic_infos_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('traffic_infos')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table traffic_infos
	public function insert_traffic_infos ($data = array()) {
		/*
			$data['ip_address']		= ;
			$data['country_code']	= ;
			$data['country_name']	= ;
			$data['region_name']	= ;
			$data['city_name']		= ;
			$data['latitude']		= ;
			$data['longitude']		= ;
			$data['zip_code']		= ;
			$data['time_zone']		= ;
		*/
		$database = $this->db->insert('traffic_infos', $data);
		return $database;
	}

	// Update data to table traffic_infos by id
	public function update_traffic_infos ($id = '', $data = array()) {
		/*
			$data['ip_address']		= ;
			$data['country_code']	= ;
			$data['country_name']	= ;
			$data['region_name']	= ;
			$data['city_name']		= ;
			$data['latitude']		= ;
			$data['longitude']		= ;
			$data['zip_code']		= ;
			$data['time_zone']		= ;
		*/
		$this->db->where('id', $id);
		$database = $this->db->update('traffic_infos', $data);
		return $database;
	}

	// Delete data in table traffic_infos by id
	public function delete_traffic_infos_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('traffic_infos');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

}