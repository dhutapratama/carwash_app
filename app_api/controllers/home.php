<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	var $message = false;
	public function index () {
		redirect();
		echo "Go Green Carwash API v0.1";
	}
}