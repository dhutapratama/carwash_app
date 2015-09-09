<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_configuration extends CI_Model{

	// Retrieve all data from table configuration
	public function get_configuration () {
		$database = $this->db->select('*')
					->from('configuration')
					->get()->result();
		return $database;
	}

	// Update data to table configuration
	public function update_configuration ($data = array()) {
		/*
			$data['startups_angelist_counter'] = ;
		*/

		$database = $this->db->update('configuration', $data);
		return $database;
	}

	// Delete data in table configuration by id
	public function delete_configuration_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('configuration');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

}
