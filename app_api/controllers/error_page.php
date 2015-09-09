<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error_page extends CI_Controller {

	public function index()
	{
		redirect();
		//$this->load->view('error_page/404');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */