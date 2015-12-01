<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales extends CI_Controller {
	public function index () {
		$this->_view('v_sales/data');
	}

	public function insert () {
		$this->_view('v_sales/insert');
	}

	public function edit () {
		$this->_view('v_sales/edit');
	}

	public function detail () {
		$this->_view('v_sales/detail');
	}

	private function _view($template, $data = true) {
		$this->load->view('v_theme/header', $data);
		$this->load->view($template);
		$this->load->view('v_theme/footer');
	}
}