<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

	var $data = array('error' => false);

	public function index () {
		$data['members'] = $this->m_members->get_members();
		$this->_view('v_member/data', $data);
	}

	public function insert ($action = '') {
		$data = $this->data;
		if ($action == 'do') {
			$data['error'] = $this->_insert();

			if (!$data['error']) {
				$this->session->set_flashdata('success', 'You are success adding new Member data, open detail :
					<a href="'.admin_uri('member/detail/'.$this->db->insert_id()).'" class="btn btn-warning btn-sm">'.$this->input->post('username').'</a>
					or <a href="'.admin_uri('contract/edit/'.$this->db->insert_id()).'" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Create Contract</a>');
				redirect(admin_uri('member'));
			}
		}
		$data['locations'] = $this->m_locations->get_locations();
		$this->_view('v_member/insert', $data);
	}

	public function edit ($member_id = '', $do = '') {
		$data = $this->data;
		$data['member'] = $this->m_members->get_members_by_id($member_id);
		if ($data['member']) {
			if ($do) {
				$this->_update($member_id);
				redirect(admin_uri('member/detail/'.$member_id));
			} else {
				$data['locations'] = $this->m_locations->get_locations();
				$this->_view('v_member/edit', $data);	
			}
		} else {
			$data['error'] = "Wrong member ID";
			redirect(admin_uri('member'));
		}
	}

	public function detail ($member_id = '') {
		$data = $this->data;
		$data['member']		= $this->m_members->get_members_by_id($member_id);
		$data['contract']	= $this->m_contracts->get_contracts_by_member_id($member_id);

		if ($data['member']) {
			$this->_view('v_member/detail', $data);
		} else {
			$data['error'] = "Wrong member ID";
			redirect(admin_uri('member'));
		}
	}

	private function _insert () {
		$this->form_validation
			->set_rules('username', 'Username', 'required|min_length[5]|max_length[25]|is_unique[members.username]|xss_clean')
			->set_rules('password', 'Password', 'required|min_length[5]|md5')
			->set_rules('full_name', 'Full Name', 'required')
			->set_rules('email', 'Email', 'required|valid_email|is_unique[members.email]')
			->set_rules('full_name', 'Full Name', 'required')
			->set_rules('address', 'Address', 'required')
			->set_rules('location_id', 'location', 'required')
			->set_rules('phone', 'Phone', 'required|numeric')
			->set_rules('referring_code', 'Reffering Code', 'numeric');

		if ($this->form_validation->run() == FALSE){
			return validation_errors('<li>', '</li>');
		} else {
			$data['username']			= $this->input->post('username');
			$data['password']			= $this->input->post('password');
			$data['full_name']			= $this->input->post('full_name');
			$data['address']			= $this->input->post('address');
			$data['location_id']		= $this->input->post('location_id');
			$data['phone']				= $this->input->post('phone');
			$data['email']				= $this->input->post('email');
			$data['picture_url']		= 'http://static.gogreencarwash.id/profile_pictures/2.jpg';
			$data['cover_url']			= 'http://static.gogreencarwash.id/profile_pictures/2_cover.jpg';
			$data['oauth_scope']		= 'member';
			$data['is_verified']		= '1';
			$data['referral_code']		= rand(10000, 99999);
			$data['referring_code']		= $this->input->post('referral_code');

			$this->m_members->insert_members($data);
			return false;
		}
	}

	private function _update ($member_id = '') {
		$this->form_validation
			->set_rules('username', 'Username', 'required|min_length[5]|max_length[25]|xss_clean')
			->set_rules('full_name', 'Full Name', 'required')
			->set_rules('email', 'Email', 'required|valid_email')
			->set_rules('full_name', 'Full Name', 'required')
			->set_rules('address', 'Address', 'required')
			->set_rules('location_id', 'location', 'required')
			->set_rules('phone', 'Phone', 'required|numeric')
			->set_rules('referring_code', 'Reffering Code', 'numeric');

		if ($this->form_validation->run() == FALSE){
			return validation_errors('<li>', '</li>');
		} else {
			$data['username']			= $this->input->post('username');
			$data['full_name']			= $this->input->post('full_name');
			$data['address']			= $this->input->post('address');
			$data['location_id']		= $this->input->post('location_id');
			$data['phone']				= $this->input->post('phone');
			$data['email']				= $this->input->post('email');

			$this->m_members->update_members($member_id, $data);
			return false;
		}
	}

	private function _view($template, $data = true) {
		$this->load->view('v_theme/header', $data);
		$this->load->view($template);
		$this->load->view('v_theme/footer');
	}
}