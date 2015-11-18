<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contract extends CI_Controller {
	public function index () {
		$this->_view('dashboard');
	}

	public function insert () {
		$this->_view('v_contract/insert');
	}

	public function edit () {
		$this->_view('v_contract/edit');
	}

	public function detail () {
		$this->_view('v_contract/detail');
	}

	private function _view($template, $data = true) {
		$this->load->view('v_theme/header', $data);
		$this->load->view($template);
		$this->load->view('v_theme/footer');
	}
}