<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Oauth extends CI_Controller {

	var $message = false;

	// GET authorize?client_id=...&state=...&response_type=code
	

	public function index () {
		echo json_encode("Request Error 404");
	}

	// POST token?client_id=...&client_secret=...&code=...&grant_type=authorization_code
	public function token () {
		//$this->initial->is_post();

		$client_id 		= $this->input->post('client_id');
		$client_secret	= $this->input->post('client_secret');
		$code 			= $this->input->post('code');
		$grant_type 	= $this->input->post('grant_type');

		$this->m_oauth_clients->client;
	}
}