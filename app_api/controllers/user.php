<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	var $message = false;

	public function index () {
		$output['error']				= true;
		$output['error_code']			= 404;
		$output['message']				= "Request Error";

		$output['data'] = $output;
		$this->load->view('parse_json', $output);
	}

	public function userdata() {
		$access_token 		= $this->input->get('access_token');

		$userdata 			= $this->carwash->userdata($access_token);

		if($userdata && $access_token) {
			$output['error']	= false;
			$output['userdata']	= $this->m_members->get_members_public_by_id($userdata->user_id);

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		} else {
			$output['error']				= true;
			$output['error_code']			= 404;
			$output['message']				= "Access token not match";

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		}
	}
}