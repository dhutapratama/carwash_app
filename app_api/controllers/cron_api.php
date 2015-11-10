<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cron_api extends CI_Controller {

	public function index () {
		echo "Scheduling Cron";
	}

	public function scheduling() {
		$contracts_data = $this->m_contracts->get_contracts_active_membership();

		foreach ($contracts_data as $contract) {
			$request_lists_data = $this->m_request_lists->get_request_lists_by_last_cleaning($contract->id);
			if (!$request_lists_data) {
				$data['contract_id']		= $contract->id;
				$data['member_id']			= $contract->member_id;
				$data['member_car_id']		= $contract->member_car_id;
				$data['location_id']		= $contract->location_id;
				$data['request_date']		= date("Y-m-d")." 00:00:00";
				$data['is_taken']			= 0;
				$this->m_request_lists->insert_request_lists($data);
			}
		}
		$data['detail'] = "Scheduling Processed";
		$this->db->insert('cron_log', $data);
	}
}