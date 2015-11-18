<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {
	public function index () {
		$this->_view('v_schedule/data');
	}

	public function insert () {
		$this->_view('v_schedule/insert');
	}

	public function edit () {
		$this->_view('v_schedule/edit');
	}

	public function detail () {
		$this->_view('v_schedule/detail');
	}

	private function _view($template, $data = true) {
		$this->load->view('v_theme/header', $data);
		$this->load->view($template);
		$this->load->view('v_theme/footer');
	}
}