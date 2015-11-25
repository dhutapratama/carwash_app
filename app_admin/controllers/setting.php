<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {
	public function index () {
		$this->_view('v_setting/data');
	}

	public function insert () {
		$this->_view('v_setting/insert');
	}

	public function edit () {
		$this->_view('v_setting/edit');
	}

	public function detail () {
		$this->_view('v_setting/detail');
	}

	private function _view($template, $data = true) {
		$this->load->view('v_theme/header', $data);
		$this->load->view($template);
		$this->load->view('v_theme/footer');
	}
}