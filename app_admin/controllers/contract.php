<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contract extends CI_Controller {

	var $data = array('error' => false);

	public function index () {
		$data['contracts'] = $this->m_contracts->get_contracts_all_data();
		$this->_view('v_contract/data', $data);
	}

	public function edit () {
		// $this->_view('v_contract/edit');
		echo "under development";
	}

	public function detail ($contract_id = '') {
		if ($contract_id) {
			$data['contract'] = $this->m_contracts->get_contracts_all_data_by_id($contract_id);
			$data['contract_histories'] = $this->m_contract_histories->get_contract_histories_by_contract_id($contract_id);
			$this->_view('v_contract/detail', $data);
		} else {
			$data['error'] = "Wrong contract ID";
			redirect(admin_uri('contract'));
		}
	}

	public function extend ($contract_id = '', $action = "") {
		$data = $this->data;
		if ($action) {
			$data['error'] = $this->_extend($contract_id);
			redirect(admin_uri('contract/detail/'.$contract_id));
		} else {
			if ($contract_id) {
				$data['contract'] = $this->m_contracts->get_contracts_all_data_by_id($contract_id);
				$data['price_list'] = $this->m_price_lists->get_price_lists();

				$this->_view('v_contract/extend', $data);
			} else {
				$data['error'] = "Wrong contract ID";
				redirect(admin_uri('contract'));
			}
		}
	}

	private function _extend ($contract_id = '') {
		$contract 	= $this->m_contracts->get_contracts_by_id($contract_id);
		if ($this->input->post('use_pricelist') == "true") {
			$price_list = $this->m_price_lists->get_price_lists_by_id($this->input->post('price_list_id'));

			$data['contract_id']	= $contract_id;
			$data['member_id']		= $contract->member_id;
			$data['member_car_id']	= $contract->member_car_id;
			$data['note']			= $price_list->name;
			$data['price']			= $price_list->price;
			$data['total_day']		= 30;

			$due_date = 27;
			$exp_date = 30;

			$this->form_validation
				->set_rules('price_list_id', 'Price List ID', 'required|numeric');
		} else {
			$data['contract_id']	= $contract_id;
			$data['member_id']		= $contract->member_id;
			$data['member_car_id']	= $contract->member_car_id;
			$data['note']			= $this->input->post('note');
			$data['price']			= $this->input->post('price');
			$data['total_day']		= $this->input->post('day');

			$due_date	= $this->input->post('day') - 3;
			$exp_date	= $this->input->post('day');

			$this->form_validation
				->set_rules('price', 'Price', 'required|numeric')
				->set_rules('day', 'Day', 'required|numeric')
				->set_rules('note', 'Note', 'required');
		}

		if ($this->form_validation->run() == FALSE){
			return validation_errors('<li>', '</li>');
		} else {
			$this->m_contract_histories->insert_contract_histories($data);

			if ($contract->expired_date < date("Y-m-d H:i:s")) {
				if ($due_date < 1) {
					$due_date = 0;
				}
				$contract_data['start_date']	= date("Y-m-d H:i:s");
				$contract_data['due_date']		= date('Y-m-d 00:00:00', strtotime(date('Y-m-d 00:00:00') . ' +'.$due_date.' day'));
				$contract_data['expired_date']	= date('Y-m-d 00:00:00', strtotime(date('Y-m-d 00:00:00') . ' +'.$exp_date.' day'));
				$contract_data['is_expired']	= 0;
			} else {
				$contract_data['due_date']		= date('Y-m-d 00:00:00', strtotime($contract->expired_date . ' +'.$due_date.' day'));
				$contract_data['expired_date']	= date('Y-m-d 00:00:00', strtotime($contract->expired_date . ' +'.$exp_date.' day'));
			}
			$this->m_contracts->update_contracts($contract_id, $contract_data);
			return false;
		}
	}

	private function _view($template, $data = true) {
		$this->load->view('v_theme/header', $data);
		$this->load->view($template);
		$this->load->view('v_theme/footer');
	}
}