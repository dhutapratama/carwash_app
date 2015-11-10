<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carwash {

	function geolocation ()
	{
		$CI =& get_instance();
		$ip_address = $_SERVER['REMOTE_ADDR'];
		$user_agent	='Stock N\' Bar (Analisa v1.0) http://stocknbar.com';
		$url 		= 'http://104.243.47.44/v3/ip-city/?format=json&key=';
		$url 		.= $CI->config->item('apikey_ipdbinfo');
		$url 		.= '&ip='.$ip_address;

		$ch 		= curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);

		$data = curl_exec($ch);

		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		curl_close($ch);

		$result = ($httpcode>=200 && $httpcode<300) ? $data : false;
		return json_decode($result);
	}

	function userdata($access_token = '') {
		$CI =& get_instance();

		return $CI->m_oauth_access_tokens->get_oauth_access_tokens_by_access_token($access_token);
	}

	function save_base64_image($content, $filename) {
		$CI =& get_instance();
		$upload_path = $CI->config->item('upload_path');

		file_put_contents($upload_path.$filename, $content);
	}
}