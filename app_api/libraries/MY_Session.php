<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Session extends CI_Session {

	function count_session_last_10s ()
	{
		$ip_address = $_SERVER['REMOTE_ADDR'];
		$time		= strtotime('-25 seconds');
		$database 	= $this->CI->db->select('*')
					->from('login_session')
					->where('ip_address', $ip_address)
					->where('last_activity >=', $time)
					->get()->num_rows();

		return $database;
	}
}