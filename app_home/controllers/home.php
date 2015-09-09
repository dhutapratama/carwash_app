<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	var $message = false;

	public function index () {
		echo 'Welcome Bro!';
	}

	public function concept ($feedback = false) {
		if ($feedback) {
			$data['email']		= $this->input->post('feedback_email');
			$data['label']		= $this->input->post('feedback_jenis');
			$data['feedback']	= $this->input->post('feedback_feedback');
			$data['ip']			= $_SERVER['REMOTE_ADDR'];
			$this->m_feedback->insert_feedback($data);
			$this->message = 'Feedback telah terkirim';
		}

		$data['message'] = $this->message;

		$this->load->view('home/startupPortfolio', $data);
	}

	public function request () {
		if ($_SERVER['REQUEST_METHOD'] != 'POST') {
			echo 'Akses ditolak!';
			exit();
		} else {
			if ($this->session->userdata('invitation_status') != 'registered') {
				$this->_insert_request_invitation();
			} else {
				$output['data']['invitation_status'] = 'already';
				$this->load->view('parse_json', $output);
			}
		}
	}

	public function language($lang = 'EN') {
		$this->session->set_userdata('lang', $lang);
		redirect();
	}

	private function _insert_request_invitation () {
		$invitation_type	= $this->input->post('invitation_type');
		$email				= $this->input->post('email');

		$data['email']		= $email;
		$data['client_ip']	= $_SERVER['REMOTE_ADDR'];
		

		if ($data['email'] != '') {
			if ($invitation_type == 'startup') {
				if(!$this->m_subscriber_startups->is_email_registered_on_subscriber_startups($data['email'])) {
					$this->m_subscriber_startups->insert_subscriber_startups($data);
					$invitation_status = 'success';
				} else {
					$invitation_status = 'already';
				}
			} else {
				if(!$this->m_subscriber_investors->is_email_registered_on_subscriber_investors($data['email'])) {
					$this->m_subscriber_investors->insert_subscriber_investors($data);
					$invitation_status = 'success';
				} else {
					$invitation_status = 'already';
				}
			}
			$this->session->set_userdata(array('invitation_status' => 'registered'));
		} else {
			$invitation_status = 'error';
		}
		
		$output['data']['invitation_status'] = $invitation_status;
		$this->load->view('parse_json', $output);
	}

	public function grow_the_subscriber() {
		// Grow the startups
		$startup = rand(0, 300);
		$investor = rand(0, 300);

		for ($i=0; $i <= $startup; $i++) { 
			$data['name'] = 'bot_'.date("Ymd").'_'.$i;
			$data['email'] = 'bot_'.date("Ymd").'_'.$i.'.'.$startup.'@stocknbar.com';

			$this->m_subscriber_startups->insert_subscriber_startups($data);
		}

		// Grow the investor
		for ($i=0; $i <= $investor; $i++) { 
			$data['name'] = 'bot_'.date("Ymd").'_'.$i;
			$data['email'] = 'bot_'.date("Ymd").'_'.$i.'.'.$investor.'@stocknbar.com';
			$this->m_subscriber_investors->insert_subscriber_investors($data);
		}

		echo "OK";
	}
}