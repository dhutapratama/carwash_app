<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_feedback extends CI_Model{

	// Retrieve all data from table feedback
	public function get_feedback () {
		$database = $this->db->select('*')
					->from('feedback')
					->get()->result();
		return $database;
	}

	// Retrieve data from table feedback by id
	public function get_feedback_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('feedback')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table feedback
	public function insert_feedback ($data = array()) {
		/*
			$data['email']		= ;
			$data['label']		= ;
			$data['feedback']	= ;
			$data['ip']	= 		= ;
		*/
		$database = $this->db->insert('feedback', $data);
		return $database;
	}

	// Update data to table feedback by id
	public function update_feedback ($id = '', $data = array()) {
		/*
			$data['email']		= ;
			$data['label']		= ;
			$data['feedback']	= ;
			$data['ip']	= 		= ;
		*/
		$this->db->where('id', $id);
		$database = $this->db->update('feedback', $data);
		return $database;
	}

	// Delete data in table feedback by id
	public function delete_feedback_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('feedback');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

}