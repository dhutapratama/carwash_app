<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_price extends CI_Controller {
	public function index () {
		$this->_view('v_app_price/data');
	}

	public function insert () {
		$this->_view('v_app_price/insert');
	}

	public function edit () {
		$this->_view('v_app_price/edit');
	}

	public function detail () {
		$this->_view('v_app_price/detail');
	}

	private function _view($template, $data = true) {
		$this->load->view('v_theme/header', $data);
		$this->load->view($template);
		$this->load->view('v_theme/footer');
	}
}