<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Oauth extends CI_Controller {

	var $message = false;

	// GET authorize?client_id=...&state=...&response_type=code
	

	public function index () {
		$output['error']				= true;
		$output['error_code']			= 404;
		$output['message']				= "Request Error";

		$output['data'] = $output;
		$this->load->view('parse_json', $output);
	}

	// POST token?client_id=...&client_secret=...&code=...&grant_type=authorization_code
	// logged requet method
	public function token () {
		$this->initial->is_post();

		$client_id 		= $this->input->post('client_id');
		$client_secret	= $this->input->post('client_secret');
		$code 			= $this->input->post('code');
		$grant_type 	= $this->input->post('grant_type');
		$authorization 	= false;
		
		$oauth_authorization_codes_data = $this->m_oauth_authorization_codes->get_oauth_authorization_codes_by_authorization_code_client_id($code, $client_id);
		$this->m_oauth_authorization_codes->delete_oauth_authorization_codes_by_authorization_code($code);

		if ($oauth_authorization_codes_data) {
			if ($oauth_authorization_codes_data->expires >= date('Y-m-d H:i:s')) {
				$oauth_clients_data = $this->m_oauth_clients->get_oauth_clients_by_client_id_client_secret($client_id, $client_secret);
				
				if ($oauth_clients_data) {
					$authorization 	= true;
				} else {
					$message = "Authorization clientid and client id is failed ";
				}
			} else {
				$message = "Authorization code and client id is expired";
			}
		} else {
			$message = "Authorization code and client id is failed";
		}

		if ($authorization) {
			$output['error']			= false;
			$output['access_token']		= $this->oauthlib->hashcode();
			$output['expires_in']		= 999999;
			$output['token_type']		= "bearer";
			$output['scope']			= null;

			$output['data'] = $output;
			$this->load->view('parse_json', $output);

			$data['access_token']		= $output['access_token'];
			$data['client_id']			= $client_id;
			$data['user_id']			= $oauth_authorization_codes_data->user_id;
			$data['expires']			= date("Y-m-d H:i:s", time() + 999999);
			$data['scope']				= null;

			$this->m_oauth_access_tokens->insert_oauth_access_tokens($data);
		} else {
			$output['error']				= true;
			$output['error_code']			= 404;
			$output['message']				= $message;

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		}
	}

	// Non logged in
	public function login () {
		$this->initial->is_post();

		$username		= $this->input->post('username');
		$password		= $this->input->post('password');
		$client_id		= $this->input->post('client_id');

		$members_data		= $this->m_members->get_members_by_username($username);

		$logged			= false;
		$apps_available	= false;

		if ($members_data) {
			if ($members_data->is_verified) {
				if ($this->m_members->check_members_by_username_password($username, $password)) {
						$logged = true;
				} else {
					$message = "Wrong Password";
				}
			} else {
				$message = "Not Verified User";
			}
		} else {
			$message = "User not registered";
		}

		if ($this->m_oauth_clients->get_oauth_clients_by_client_id($client_id)) {
			$apps_available	= true;
		} else {
			$message		= "Apps not registered";
		}

		if ($logged && $apps_available) {

			$output['error']				= false;
			$output['authorization_code']	= $this->oauthlib->hashcode();

			$data['authorization_code']	= $output['authorization_code'];
			$data['client_id']			= $client_id;
			$data['user_id']			= $members_data->id;
			$data['redirect_uri']		= "mobile";
			$data['expires']			= date("Y-m-d H:i:s", time() + 600);
			$data['scope']				= "default";

			$this->m_oauth_authorization_codes->insert_oauth_authorization_codes($data);

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		} else {
			$output['error']				= true;
			$output['error_code']			= 404;
			$output['message']				= $message;

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		}
	}
}