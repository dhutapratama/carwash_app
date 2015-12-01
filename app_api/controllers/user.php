<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	var $message = false;

	public function index () {
		$output['error']				= true;
		$output['error_code']			= 404;
		$output['message']				= "Request Error";

		$output['data'] = $output;
		$this->load->view('parse_json', $output);
	}

	public function userdata() {
		$access_token 		= $this->input->get('access_token');

		$userdata 			= $this->carwash->userdata($access_token);

		if($userdata && $access_token) {
			$output['error']	= false;
			$output['userdata']	= $this->m_members->get_members_public_by_id($userdata->user_id);

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		} else {
			$output['error']				= true;
			$output['error_code']			= 404;
			$output['message']				= "Access token not match";

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		}
	}

	public function mycars() {
		$access_token 		= $this->input->get('access_token');

		$userdata 			= $this->carwash->userdata($access_token);

		if($access_token && $userdata) {
			$output['error']	= false;

			$member_cars_data	= $this->m_member_cars->get_member_cars_by_member_id($userdata->user_id);

			$html				= "";

			foreach ($member_cars_data as $value) {
				$contracts_data	= $this->m_contracts->get_contracts_by_member_car_id($value->id);
				//print_r(($contracts_data->expired_date > date("Y-m-d H:i:s"))); exit();
				if ($contracts_data) {
					if ($contracts_data->expired_date > date("Y-m-d H:i:s")) {
						$subscription = "Subscribed";
						$expired_date = $contracts_data->expired_date;
					} else {
						$subscription = "Expired Subscription";
						$expired_date = $contracts_data->expired_date;
					}
				}

				$html .= '<li>'."\n";
				$html .= '<a href="#" class="mycars-link">'."\n";
				$html .= '<div class="mycars-image" style="background-image:url('.$value->photo_url.')">'."\n";
				$html .= '<h2 class="mycars-date">'.$value->car_number.'</h2>'."\n";
				$html .= '<p class="mycars-address">'.$subscription.'</p>'."\n";
				$html .= '<p class="mycars-carnumber">Exp : '.$expired_date.'</p>'."\n";
				$html .= '</div>'."\n";
				$html .= '</a>'."\n";
				$html .= '</li>'."\n";
			}

			$output['member_car']		= $html;

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		} else {
			$output['error_code']			= 404;
			$output['message']				= "Access token not match";

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		}
	}

	public function last_cleaning() {
		$access_token 		= $this->input->get('access_token');
		$userdata 			= $this->carwash->userdata($access_token);

		if($access_token && $userdata) {
			$output['error']	= false;
			$data	= $this->m_request_taken->get_request_taken_by_now($userdata->user_id);

			$process_date   = strtotime($data->process_date);
			$output['time'] = date('H:i', $process_date);
			$output['date'] = date('d M', $process_date);
			$output['year'] = date('Y', $process_date);
			if ($data->finish_date) {
				$output['status'] = "Done";
			} else {
				$output['status'] = "Progress";
			}
			$output['address'] = $data->location_detail;


			$html	= "";

			if ($data) {
				$washing_photos_data = $this->m_washing_photos->get_washing_photos_by_request_taken_id($data->id);
				
				$i_before = 0;
				$i_after = 0;

				if ($washing_photos_data) {
					foreach ($washing_photos_data as $value) {
						if ($value->is_after) {
							$output['photos_after'][$i_after] = $value->photo_url;
							$i_after++;
						} else {
							$output['photos_before'][$i_before] = $value->photo_url;
							$i_before++;
						}
					}
				}
			} else {
				$output['photos_before']	= false;
				$output['photos_after']		= false;
			}
		} else {
			$output['error_code']			= 404;
			$output['message']				= "Access token not match";

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		}

		$output['data'] = $output;
		$this->load->view('parse_json', $output);
	}

	public function add_car() {
		$access_token 		= $this->input->get('access_token');
		$userdata 			= $this->carwash->userdata($access_token);

		if($access_token && $userdata) {
			$member_car['member_id']		= $userdata->user_id;
			$this->m_member_cars->insert_member_cars($member_car);

			$photo_data						= $this->input->post('photo_data');
			$member_car_id					= $this->db->insert_id();
			$upload_path					= 'cars/' . $member_car_id . '.jpg';
			$photo_url						= $this->config->item('static_url') . $upload_path;
			$capture_data			 		= $this->carwash->save_base64_image(base64_decode($photo_data), $upload_path);

			$member_car['photo_url']		= $photo_url;
			$this->m_member_cars->update_member_cars($member_car_id, $member_car);

			$member = $this->m_members->get_members_by_id($userdata->user_id);

			$contract['member_id']			= $userdata->user_id;
			$contract['member_car_id']		= $member_car_id;
			$contract['location_id']		= $member->location_id;
			$contract['start_date']			= date("Y-m-d H:i:s");
			$contract['due_date']			= date("Y-m-d H:i:s");
			$contract['expired_date']		= date("Y-m-d H:i:s");
			$contract['is_expired']			= 1;
			$this->m_contracts->insert_contracts($contract);

			$output['error'] 				= false;
			$output['member_car_id'] 		= $member_car_id;
			$output['member_car_photo_url'] = $photo_url;

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		} else {
			$output['error_code']			= 404;
			$output['message']				= "Access token not match";

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		}
	}

	public function update_car() {
		$access_token 		= $this->input->get('access_token');
		$userdata 			= $this->carwash->userdata($access_token);

		if($access_token && $userdata) {
			$data['car_number']			= $this->input->post("car_number");
			$data['color']				= $this->input->post("car_color");
			$data['brand']				= $this->input->post("car_brand");
			$data['type']				= $this->input->post("car_type");
			$data['longitude']			= 0;
			$data['latitude']			= 0;
			$data['location_name']		= $this->input->post("location_name");
			$data['updated_date']		= date("Y-m-d H:i:s");

			$this->m_member_cars->update_member_cars($this->input->post("member_car_id"), $data);

			$output['error']	= false;
			$output['message']	= "Member car updated";

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		} else {
			$output['error_code']			= 404;
			$output['message']				= "Access token not match";

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		}
	}

	public function change_profile_image() {
		$access_token 		= $this->input->get('access_token');
		$userdata 			= $this->carwash->userdata($access_token);

		if($access_token && $userdata) {
			$photo_data			= $this->input->post('photo_data');
			$hash_name			= "photo";
			$upload_path		= 'profile_pictures/' . $hash_name . '.jpg';
			$photo_url			= $this->config->item('static_url') . $upload_path;

			$this->carwash->save_base64_image(base64_decode($photo_data), $upload_path);
		} else {
			$output['error_code']			= 404;
			$output['message']				= "Access token not match";

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		}
	}

	public function change_cover() {
		$access_token 		= $this->input->get('access_token');
		$userdata 			= $this->carwash->userdata($access_token);

		if($access_token && $userdata) {
			$photo_data			= $this->input->post('photo_data');
			$washing_photo_id	= "cover";
			$upload_path		= 'profile_pictures/' . $washing_photo_id . '.jpg';
			$photo_url			= $this->config->item('static_url') . $upload_path;

			$this->carwash->save_base64_image(base64_decode($photo_data), $upload_path);
		} else {
			$output['error_code']			= 404;
			$output['message']				= "Access token not match";

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		}
	}
}