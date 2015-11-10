<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Client side apps dapat merequest data public tanpa menggunakan token.
 *
 * Registration
 */

class Detailer extends CI_Controller {
	
	var $message = false;

	public function index () {
		$access_token		= $this->input->get('access_token');
		$userdata 			= $this->carwash->userdata($access_token);

		if($userdata && $access_token) {
			$users_data		= $this->m_users->get_users_by_id($userdata->user_id);

			$response['error']	= false;
			$response['user_data']['full_name']		= $users_data->full_name;
			$response['user_data']['picture_url']	= $users_data->picture_url;
			$response['user_data']['user_type']		= $this->m_user_type->get_user_type_by_id($users_data->user_type_id)->name;
			$response['user_data']['user_type_id']	= $users_data->user_type_id;
			$response['user_data']['location']		= $this->m_locations->get_locations_by_id($users_data->location_id)->name;

			$response['today_works']	= $this->m_request_taken->get_request_taken_by_cleaning_user_id_today($userdata->user_id);
			$response['total_works']	= $this->m_request_taken->get_request_taken_by_cleaning_user_id_total($userdata->user_id);
			$response['worklist']		= $this->_worklist($userdata->user_id, $users_data->location_id);

			$response['data'] = $response;
			$this->load->view('parse_json', $response);
		} else {
			$output['error']		= true;
			$output['error_code']	= 404;
			$output['message']		= "your access token is expired, please login again";

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		}
	}

	private function _worklist($user_id, $location_id) {
		$cleaning_process_data	= $this->m_cleaning_process->get_cleaning_process_by_user_id($user_id);
		$cleaning_process_spv_data	= $this->m_cleaning_process->get_cleaning_process_by_spv_id($user_id);
		$request_lists_data		= $this->m_request_lists->get_request_lists_by_location_id($location_id);
		$array					= 0;

		if ($cleaning_process_data) {
			foreach ($cleaning_process_data as $value) {
				$members_data		= $this->m_members->get_members_by_id($value->member_id);
				$member_cars_data	= $this->m_member_cars->get_member_cars_by_id($value->member_car_id);

				$output[$array]['id']				= $value->request_list_id;
				$output[$array]['status']			= 'Process';
				$output[$array]['full_name']		= $members_data->full_name;
				$output[$array]['location_name']	= $member_cars_data->location_name;
				$output[$array]['car_number']		= $member_cars_data->car_number;
				$array++;
			}
		}

		if ($cleaning_process_spv_data) {
			foreach ($cleaning_process_spv_data as $value) {
				$members_data		= $this->m_members->get_members_by_id($value->member_id);
				$member_cars_data	= $this->m_member_cars->get_member_cars_by_id($value->member_car_id);

				$output[$array]['id']				= $value->request_list_id;
				$output[$array]['status']			= 'Process';
				$output[$array]['full_name']		= $members_data->full_name;
				$output[$array]['location_name']	= $member_cars_data->location_name;
				$output[$array]['car_number']		= $member_cars_data->car_number;
				$array++;
			}
		}

		if ($request_lists_data) {
			foreach ($request_lists_data as $value) {
				$members_data		= $this->m_members->get_members_by_id($value->member_id);
				$member_cars_data	= $this->m_member_cars->get_member_cars_by_id($value->member_car_id);

				$output[$array]['id']				= $value->id;
				$output[$array]['status']			= 'Waiting';
				$output[$array]['full_name']		= $members_data->full_name;
				$output[$array]['location_name']	= $value->location_detail;
				$output[$array]['car_number']		= $member_cars_data->car_number;
				$array++;
			}
		}

		if (!$cleaning_process_data && !$request_lists_data && !$cleaning_process_spv_data) {
			$output		=	false;
		}

		return $output;
	}

	public function workdetail() {
		$access_token			= $this->input->get('access_token');
		$request_list_id		= $this->input->post('request_list_id');

		$userdata 				= $this->carwash->userdata($access_token);

		if ($userdata && $access_token) {
			$users_data				= $this->m_users->get_users_by_id($userdata->user_id);
			$html					= "";

			if ($users_data->user_type_id == 2) {
				$request_lists_data		= $data	= $this->m_request_lists->get_request_lists_by_id($request_list_id);

				if (!$request_lists_data->is_taken) {
					$members_data			= $this->m_members->get_members_by_id($request_lists_data->member_id);
					$member_cars_data		= $this->m_member_cars->get_member_cars_by_id($request_lists_data->member_car_id);
					
					$response['error']				= false;
					$response['is_taken']			= false;

					$response['process_date']		= false;

					$response['car_photo']			= $member_cars_data->photo_url;
					$response['car_number']			= $member_cars_data->car_number;
					$response['car_detail']			= $member_cars_data->brand . ', ' . $member_cars_data->type . ', ' . $member_cars_data->color;

					$response['location_name']		= $member_cars_data->location_name;

					$response['member_id']			= $members_data->id;
					$response['request_list_id']	= $request_lists_data->id;

					$response['cleaning_user_id']	= false;
					$response['cleaning_full_name']	= '-';

					$response['photos']['after']	= false;
					$response['photos']['before']	= false;

					$output['data'] = $response;
					$this->load->view('parse_json', $output);
				} else {
					$cleaning_process_data 			= $this->m_cleaning_process->get_cleaning_process_by_request_list_id($request_list_id);
					$members_data					= $this->m_members->get_members_by_id($request_lists_data->member_id);
					$member_cars_data				= $this->m_member_cars->get_member_cars_by_id($request_lists_data->member_car_id);
					
					$response['error']				= false;
					$response['is_taken']			= true;

					$response['process_date']		= $cleaning_process_data->process_date;

					$response['car_photo']			= $member_cars_data->photo_url;
					$response['car_number']			= $member_cars_data->car_number;
					$response['car_detail']			= $member_cars_data->brand . ', ' . $member_cars_data->type . ', ' . $member_cars_data->color;

					$response['location_name']		= $member_cars_data->location_name;

					$response['member_id']			= $members_data->id;
					$response['request_list_id']	= $request_lists_data->id;

					$response['cleaning_user_id']	= $cleaning_process_data->cleaning_user_id;
					$response['cleaning_full_name']	= $this->m_users->get_users_by_id($cleaning_process_data->cleaning_user_id)->full_name;

					$response['photos']['after']	= '';
					$response['photos']['before']	= '';

					$washing_photos_data = $this->m_washing_photos->get_washing_photos_by_request_list_id($request_lists_data->id);

					if ($washing_photos_data) {
						foreach ($washing_photos_data as $value) {
							if ($value->is_after) {
								$response['photos']['after']  .= '<img src="'.$value->photo_url.'" class="work_detail-image" data-image_id="'.$value->id.'">'."\n";
							} else {
								$response['photos']['before'] .= '<img src="'.$value->photo_url.'" class="work_detail-image" data-image_id="'.$value->id.'">'."\n";
							}
						}
					}

					$output['data'] = $response;
					$this->load->view('parse_json', $output);
				}
			} elseif ($users_data->user_type_id == 3) {
				$request_lists_data		= $data	= $this->m_request_lists->get_request_lists_by_id($request_list_id);

				if (!$request_lists_data->is_taken) {
					$members_data			= $this->m_members->get_members_by_id($request_lists_data->member_id);
					$member_cars_data		= $this->m_member_cars->get_member_cars_by_id($request_lists_data->member_car_id);
					
					$response['error']				= false;
					$response['is_taken']			= false;

					$response['process_date']		= false;

					$response['car_photo']			= $member_cars_data->photo_url;
					$response['car_number']			= $member_cars_data->car_number;
					$response['car_detail']			= $member_cars_data->brand . ', ' . $member_cars_data->type . ', ' . $member_cars_data->color;

					$response['location_name']		= $member_cars_data->location_name;

					$response['member_id']			= $members_data->id;
					$response['request_list_id']	= $request_lists_data->id;

					$response['cleaning_user_id']	= false;
					$response['cleaning_full_name']	= '-';

					$response['photos']['after']	= false;
					$response['photos']['before']	= false;

					$output['data'] = $response;
					$this->load->view('parse_json', $output);
				} else {
					$cleaning_process_data 			= $this->m_cleaning_process->get_cleaning_process_by_request_list_id_and_cleaning_user_id($request_lists_data->id, $users_data->id);
					if ($cleaning_process_data) {
						$members_data					= $this->m_members->get_members_by_id($request_lists_data->member_id);
						$member_cars_data				= $this->m_member_cars->get_member_cars_by_id($request_lists_data->member_car_id);
						
						$response['error']				= false;
						$response['is_taken']			= true;

						$response['process_date']		= $cleaning_process_data->process_date;

						$response['car_photo']			= $member_cars_data->photo_url;
						$response['car_number']			= $member_cars_data->car_number;
						$response['car_detail']			= $member_cars_data->brand . ', ' . $member_cars_data->type . ', ' . $member_cars_data->color;

						$response['location_name']		= $member_cars_data->location_name;

						$response['member_id']			= $request_lists_data->member_id;
						$response['request_list_id']	= $request_lists_data->id;

						$response['cleaning_user_id']	= $cleaning_process_data->cleaning_user_id;
						$response['cleaning_full_name']	= $this->m_users->get_users_by_id($cleaning_process_data->cleaning_user_id)->full_name;

						$washing_photos_data = $this->m_washing_photos->get_washing_photos_by_request_list_id($request_lists_data->id);

						$response['photos']['after'] = '';
						$response['photos']['before'] = '';

						if ($washing_photos_data) {
							foreach ($washing_photos_data as $value) {
								if ($value->is_after) {
									$response['photos']['after']  .= '<img src="'.$value->photo_url.'" class="work_detail-image" data-image_id="'.$value->id.'">'."\n";
								} else {
									$response['photos']['before'] .= '<img src="'.$value->photo_url.'" class="work_detail-image" data-image_id="'.$value->id.'">'."\n";
								}
							}
						}

						$output['data'] = $response;
						$this->load->view('parse_json', $output);
					} else {
						$output['error']				= true;
						$output['error_code']			= 404;
						$output['message']				= "This list has already taken by other user.";

						$output['data'] = $output;
						$this->load->view('parse_json', $output);
					}
				}
			} else {
				$output['error']		= true;
				$output['error_code']	= 404;
				$output['message']		= "Request list has already taken by other user.";

				$output['data'] = $output;
				$this->load->view('parse_json', $output);
			}
		} else {
			$output['error']		= true;
			$output['error_code']	= 404;
			$output['message']		= "your access token is expired, please login again";

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		}
	}
	
	public function get_employee() {
		$access_token			= $this->input->get('access_token');
		$userdata 				= $this->carwash->userdata($access_token);

		if ($userdata && $access_token) {
			$users_data				= $this->m_users->get_users_by_id($userdata->user_id);
			$html					= "";

			$response['employee'] = $this->m_users->get_users_by_supervisor_id($userdata->user_id);

			$response['data'] = $response;
			$this->load->view('parse_json', $response);
		} else {
			$output['error']		= true;
			$output['error_code']	= 404;
			$output['message']		= "your access token is expired, please login again";

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		}
	}

	public function start_working() {
		$access_token			= $this->input->get('access_token');
		$request_list_id		= $this->input->post('request_list_id');

		$userdata 				= $this->carwash->userdata($access_token);

		if ($userdata && $access_token) {
			$users_data				= $this->m_users->get_users_by_id($userdata->user_id);

			if ($users_data->user_type_id == 2) {
				$cleaning_user_id = $this->input->post('cleaning_user_id');
				$request_lists_data	= $this->m_request_lists->get_request_lists_by_id($request_list_id);

				$cleaning_process['contract_id']		= $request_lists_data->contract_id;
				$cleaning_process['member_id']			= $request_lists_data->member_id;
				$cleaning_process['member_car_id']		= $request_lists_data->member_car_id;
				$cleaning_process['location_id']		= $request_lists_data->location_id;
				$cleaning_process['location_detail']	= $request_lists_data->location_detail;
				$cleaning_process['request_date']		= $request_lists_data->request_date;
				$cleaning_process['request_list_id']	= $request_lists_data->id;
				$cleaning_process['notes']				= '';
				$cleaning_process['cleaning_user_id']	= $cleaning_user_id;
				$this->m_cleaning_process->insert_cleaning_process($cleaning_process);

				$request_list['is_taken'] = 1;
				$this->m_request_lists->update_request_lists($request_lists_data->id, $request_list);

				$contracts_data = $this->m_contracts->get_contracts_by_id($request_lists_data->contract_id);

				if ($contracts_data->expired_date >= date("Y-m-d")." 00:00:00") {
					$request_list['contract_id']		= $contracts_data->id;
					$request_list['member_id']			= $contracts_data->member_id;
					$request_list['member_car_id']		= $contracts_data->member_car_id;
					$request_list['location_id']		= $contracts_data->location_id;
					$request_list['location_detail']	= $this->m_member_cars->get_member_cars_by_id($contracts_data->member_car_id)->location_name;
					$request_list['request_date']		= date("Y-m-d", strtotime(date("Y-m-d H:i:s"). ' + 3 days'))." 00:00:00";
					$request_list['is_taken']			= 0;

					$this->m_request_lists->insert_request_lists($request_list);
				} else {
					$contract['is_expired']			= 1;
					$this->m_contracts->update_contracts($contracts_data->id, $contract);
				}

				$output['error']	= false;
				$output['started']	= true;

				$output['data'] = $output;
				$this->load->view('parse_json', $output);

			} elseif ($users_data->user_type_id == 3) {
				$cleaning_user_id = $users_data->id;
				$request_lists_data	= $this->m_request_lists->get_request_lists_by_id($request_list_id);

				$cleaning_process['contract_id']		= $request_lists_data->contract_id;
				$cleaning_process['member_id']			= $request_lists_data->member_id;
				$cleaning_process['member_car_id']		= $request_lists_data->member_car_id;
				$cleaning_process['location_id']		= $request_lists_data->location_id;
				$cleaning_process['location_detail']	= $request_lists_data->location_detail;
				$cleaning_process['request_date']		= $request_lists_data->request_date;
				$cleaning_process['request_list_id']	= $request_lists_data->id;
				$cleaning_process['notes']				= '';
				$cleaning_process['cleaning_user_id']	= $cleaning_user_id;
				$this->m_cleaning_process->insert_cleaning_process($cleaning_process);

				$request_list['is_taken'] = 1;
				$this->m_request_lists->update_request_lists($request_lists_data->id, $request_list);

				$contracts_data = $this->m_contracts->get_contracts_by_id($request_lists_data->contract_id);

				if ($contracts_data->expired_date <= date("Y-m-d")." 00:00:00") {
					$request_list['contract_id']		= $contracts_data->id;
					$request_list['member_id']			= $contracts_data->member_id;
					$request_list['member_car_id']		= $contracts_data->member_car_id;
					$request_list['location_id']		= $contracts_data->location_id;
					$request_list['location_detail']	= $this->m_member_cars->get_member_cars_by_id($contracts_data->member_car_id)->location_name;
					$request_list['request_date']		= date("Y-m-d")." 00:00:00";
					$request_list['is_taken']			= 0;

					$this->m_request_lists->insert_request_lists($request_list);
				} else {
					$contract['is_expired']			= 1;
					$this->m_contracts->update_contracts($contracts_data->id, $contract);
				}

				$output['error']	= false;
				$output['started']	= true;

				$output['data'] = $output;
				$this->load->view('parse_json', $output);
			} else {
				$output['error']		= true;
				$output['error_code']	= 404;
				$output['message']		= "You are not registered as detailer or supervisor";

				$output['data'] = $output;
				$this->load->view('parse_json', $output);
			}
		} else {
			$output['error']		= true;
			$output['error_code']	= 404;
			$output['message']		= "your access token is expired, please login again";

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		}
	}

	public function image_update() {
		$access_token			= $this->input->get('access_token');
		$request_list_id		= $this->input->post('request_list_id');
		$photo_data				= $this->input->post('photo_data');
		$is_after				= $this->input->post('is_after');

		$userdata 				= $this->carwash->userdata($access_token);

		if ($access_token && $userdata) {
			$request_lists_data					= $this->m_request_lists->get_request_lists_by_id($request_list_id);

			$washing_photo['member_id']			= $request_lists_data->member_id;
			$washing_photo['request_list_id']	= $request_list_id;
			$washing_photo['user_id']			= $userdata->user_id;
			$washing_photo['created_date']		= date("Y-m-d H:i:s");
			$washing_photo['expired_date']		= date("Y-m-d", strtotime(date("Y-m-d H:i:s"). ' + 30 days'))." 00:00:00";
			$washing_photo['is_after']			= $is_after;
			$this->m_washing_photos->insert_washing_photos($washing_photo);

			$washing_photo_id 	= $this->db->insert_id();
			$upload_path		= 'washing_cars/' . $washing_photo_id . '.jpg';
			$photo_url			= $this->config->item('static_url') . $upload_path;

			$this->carwash->save_base64_image(base64_decode($photo_data), $upload_path);

			$data['photo_url']	= $photo_url;

			$this->m_washing_photos->update_washing_photos($washing_photo_id, $data);

			$this->workdetail();
		} else {
			$output['error']		= true;
			$output['error_code']	= 404;
			$output['message']		= "your access token is expired, please login again";

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		}
	}

	public function finish_working() {
		$access_token			= $this->input->get('access_token');
		$request_list_id		= $this->input->post('request_list_id');

		$userdata 				= $this->carwash->userdata($access_token);

		if ($access_token && $userdata) {
			$request_lists_data		= $this->m_request_lists->get_request_lists_by_id($request_list_id);
			$users_data				= $this->m_users->get_users_by_id($userdata->user_id);

			// FINISHING PROJECT
			$cleaning_process['is_finish'] = 1;
			$this->m_cleaning_process->update_cleaning_process($id, $cleaning_process);

			$cleaning_process_data = $this->m_cleaning_process->get_cleaning_process_by_id($id);

			$request_taken['contract_id']			= $cleaning_process_data->contract_id;
			$request_taken['member_id']				= $cleaning_process_data->member_id;
			$request_taken['member_car_id']			= $cleaning_process_data->member_car_id;
			$request_taken['cleaning_user_id']		= $cleaning_process_data->cleaning_user_id;
			$request_taken['finish_user_id']		= '';
			$request_taken['location_id']			= $cleaning_process_data->location_id;
			$request_taken['location_detail']		= $cleaning_process_data->location_detail;
			$request_taken['request_date']			= $cleaning_process_data->request_date;
			$request_taken['process_date']			= $cleaning_process_data->process_date;
			$request_taken['cleaning_process_id']	= $cleaning_process_data->id;

			$this->m_request_taken->insert_request_taken($request_taken);

			$output['error']		= false;
			$output['message']		= "Your work is finished";

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		} else {
			$output['error']		= true;
			$output['error_code']	= 404;
			$output['message']		= "your access token is expired, please login again";

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		}
	}

	public function aaa() {
	}
}