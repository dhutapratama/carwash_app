<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Model ini akan di run setiap saat user membuka aplikasi.
*/

class Initial extends CI_Model {

	public function __construct() {
		parent::__construct();

		// Security Section

		// When not match with url
		//if (!isset($_SERVER['HTTPS']) OR $_SERVER['HTTP_HOST'] != $this->config->item('simple_url')) {
		//	redirect();
		//}

		// When blocked ip from database
		$hacked_logs = $this->m_hacked_logs->get_hacked_logs();

		foreach ($hacked_logs as $key => $value) {
			$this->blacklist->add_ip($value->ip_address);
		}

		if($this->blacklist->check_ip($_SERVER['REMOTE_ADDR'])->is_blocked()) {
			echo 'Kami memblokir akses anda karena terindikasi melakukan hacking.';
			exit();
		}

		// When indicating flooding request
		if($this->flooding_checker()) {
			$data['ip_address']		= $_SERVER['REMOTE_ADDR'];
			$data['hacking_type']	= 'flooding_post';
			$data['resolving_type']	= 'ban_ip';
			$this->m_hacked_logs->insert_hacked_logs($data);
			echo 'Your ip has been blocked because too much requesting session in one time.';
			exit();
		}

		if ($_SERVER['HTTP_HOST'] == 'americanecocarwash.com') {

		// Get regional by ip send to db and for language
			$geolocation 	= $this->traffic();
		}

		// Check saved language
		if (!$this->session->userdata('lang')) {
			if (!isset($geolocation->countryCode)) {
				$this->session->set_userdata('lang', "EN");
			} else {
				$this->session->set_userdata('lang', $geolocation->countryCode);
			}

		}

		// Overide data language
		$lang_list		= $this->config->item('lang_list');
		$lang_code		= $lang_list[$this->session->userdata('lang')];
		$this->lang->load('carwash', $lang_code);


		//$this->output->enable_profiler(TRUE);
/*
		$user_type = $this->session->userdata('user_type');

		if ($this->uri->segment(1) != $user_type) {

			switch ($user_type) {
				case '':

					switch ($this->uri->segment(1)) {
						case '':
							break;

						case 'home':
							if ($_SERVER['REQUEST_METHOD'] == 'POST') {
								# Jika user sedang benar2 login
							} else {
								redirect();
							}
							break;

						case 'admin':
							$data['message'] = 'Anda harus login untuk mengakses halaman ini';
							$data['message_type'] = 'danger';
							$this->session->set_flashdata($data);
							redirect();
							break;

						case 'siswa':
							$data['message'] = 'Anda harus login untuk mengakses halaman ini';
							$data['message_type'] = 'danger';
							$this->session->set_flashdata($data);
							redirect();
							break;

						default:

							break;
					}

					break;

				default:
					switch ($this->uri->segment(2)) {
						case 'logout':
							# code...
							break;

						default:
							redirect($user_type);
							break;
						}
				break;
			}
		} */
	}

	// Detect flooding on session, if detected it will return true
	public function flooding_checker() {
		$session_total = $this->session->count_session_last_10s();

		if ($session_total >= 10) {
			$flooding_status = true;
		} else {
			$flooding_status = false;
		}
		return $flooding_status;
	}

	// Analisa for traffic based on geolocation
	public function traffic(){
		if ($_SERVER['HTTP_HOST'] == 'americanecocarwash.com') {
			$get_geolocation = $this->carwash->geolocation();

			$data['ip_address']		= $get_geolocation->ipAddress;
			$data['country_code']	= $get_geolocation->countryCode;
			$data['country_name']	= $get_geolocation->countryName;
			$data['region_name']	= $get_geolocation->regionName;
			$data['city_name']		= $get_geolocation->cityName;
			$data['latitude']		= $get_geolocation->latitude;
			$data['longitude']		= $get_geolocation->longitude;
			$data['zip_code']		= $get_geolocation->zipCode;
			$data['time_zone']		= $get_geolocation->timeZone;
			$data['hit_count']		= 1;

			$this->m_traffic_infos->insert_traffic_infos($data);
			return $get_geolocation;
		}
	}

	public function is_post() {
		if ($_SERVER['REQUEST_METHOD'] != "POST") {
			redirect();
		} else {
			return TRUE;
		}
	}
}
