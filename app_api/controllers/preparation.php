<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Preparation extends CI_Controller {
	/**
	*	Menggunakan api angel.co untuk menyerap data startup.
	*/

	var $client_id			= '7480179705459c2575661519150148733a8c73bfa8ff94fd';
	var $client_secret	= '9b3ffd81faaa8726dc31ac336e55a508eb74e58c5ad9e241';
	var $code						= '';
	var $access_token 	= 'b1051fc55d581e6b0051d004f78e78fac578821c6e39c4b1';
	var $request_url		= 'https://angel.co/api/oauth/token';

	public function index () {
		$total_startups = $this->m_configuration->get_configuration()[0]->startups_angelist_counter;

		$data['startups_angelist_counter'] = $total_startups + 1;
		$this->m_configuration->update_configuration($data);

		$start = $total_startups + 6702;
		$stop = $start + 1;

		for ($i=$start; $i < $stop; $i++) {
			$this->_get_startup($i);
		}
	}

	public function regcode() {
		// Get auth code
		$this->code = $this->input->get('code');
		$this->_get_auth_code();
	}

	private function _get_auth_code () {
		$curl = curl_init( $this->request_url );
		curl_setopt( $curl, CURLOPT_POST, true );
		curl_setopt( $curl, CURLOPT_POSTFIELDS, array(
		    'client_id' => $this->client_id,
		    'client_secret' => $this->client_secret,
				'code' => $this->code,
		    'grant_type' => 'authorization_code'
		) );
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1);
		$auth = curl_exec( $curl );
		$auth = json_decode($auth);

		$access_token = $auth->access_token; // Ini simpan kedalam database yang berhubungan dengan user yg sedang login
		$token_type = $auth->token_type;

		$this->session->set_userdata('access_token', $access_token);
	}

	private function _get_startup($startup_id = '6701') {
		$curl = curl_init( 'https://api.angel.co/1/startups/' . $startup_id . '?access_token='.$this->access_token);
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec( $curl );
		$result = json_decode( $result );

		if (isset($result->success)) {
			$data['angellist_id']				= $startup_id;
			$data['startup_name']				= 'unavailable';
		} else {
			if(!$result->hidden) {
				$data['startup_name']				= $result->name;
				$data['description']				= $result->product_desc;
				$data['legal_name']					= $result->name;
				$data['office_address']			= '';
				foreach ($result->locations as $value) {
					if ($data['office_address'] != '') {
						$data['office_address']		.= ', ';
					}
					$data['office_address']		.= $value->display_name;
				}
				$data['startup_logo']				= $result->logo_url;
				$data['startup_logo_thumb']	= $result->thumb_url;
				$data['startup_url']				= $result->company_url;
				$created_at = strtotime($result->created_at);
				$updated_at = strtotime($result->updated_at);
				$data['found_date']					= date('Y-m-d H:i:s', $created_at);
				$data['create_date']				= date('Y-m-d H:i:s', $created_at);
				$data['update_date']				= date('Y-m-d H:i:s', $updated_at);
				$data['angellist_id']				= $startup_id;
			} else {
				$data['startup_name']				= 'hidden';
				$data['angellist_id']				= $startup_id;
			}
		}
		$this->m_startups->insert_startups($data);

		echo $startup_id.'. '.$data['startup_name'].' <br />
';
	}

	public function stm() {
		$time = strtotime('2015-09-02T18:52:40Z');
		echo date('Y-m-d H:i:s', $time);
	}
}
