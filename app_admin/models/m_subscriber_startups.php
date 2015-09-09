<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_subscriber_startups extends CI_Model{

	// Retrieve all data from table subscriber_startups
	public function get_subscriber_startups () {
		$database = $this->db->select('*')
					->from('subscriber_startups')
					->get()->result();
		return $database;
	}

	// Retrieve data from table subscriber_startups by id
	public function get_subscriber_startups_by_id ($id = '') {

		$database = $this->db->select('*')
					->from('subscriber_startups')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	// Insert data to table subscriber_startups
	public function insert_subscriber_startups ($data = array()) {
		/*
			$data['name']				= ;
			$data['email']				= ;
			$data['position']			= ;
			$data['startup_name']		= ;
			$data['invitation_code']	= ;
			$data['id_invitor_subs']	= ;
			$data['invitor_table']		= ;
			$data['client_ip']			= ;
		*/
		$database = $this->db->insert('subscriber_startups', $data);
		return $database;
	}

	// Update data to table subscriber_startups by id
	public function update_subscriber_startups ($id = '', $data = array()) {
		/*
			$data['name']				= ;
			$data['email']				= ;
			$data['position']			= ;
			$data['startup_name']		= ;
			$data['invitation_code']	= ;
			$data['id_invitor_subs']	= ;
			$data['invitor_table']		= ;
			$data['client_ip']			= ;
		*/
		$this->db->where('id', $id);
		$database = $this->db->update('subscriber_startups', $data);
		return $database;
	}

	// Delete data in table subscriber_startups by id
	public function delete_subscriber_startups_by_id ($id = '') {
		$this->db->where('id', $id);
		$database = $this->db->delete('subscriber_startups');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get total data in subscriber_startups
	public function get_total_subscriber_startups () {
		$database = $this->db->count_all('subscriber_startups');
		return $database;
	}

	// Check if email is already registered on database
	public function is_email_registered_on_subscriber_startups ($email = '') {
		$database = $this->db->select('*')
					->from('subscriber_startups')
					->where('email', $email)
					->get();

		if ($database->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	// Delete data in table subscriber_startups by ip
	public function delete_subscriber_startups_by_ip ($client_ip = '') {
		$this->db->where('client_ip', $client_ip);
		$database = $this->db->delete('subscriber_startups');
		return $database;
	}
}