<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Client side apps dapat merequest data public tanpa menggunakan token.
 *
 * Registration
 */

class Public_access extends CI_Controller {
	
	var $message = false;

	public function index () {
		$access_token			= $this->input->get('access_token');

		$access_tokens_data		= $this->m_oauth_access_tokens->get_oauth_access_tokens_by_access_token($access_token);

		if ($access_tokens_data) {
			$members_data	= $this->m_members->get_members_by_id($access_tokens_data->user_id);

			$response['error']	= false;
			$response['user_data']['full_name']		= $members_data->full_name;
			$response['user_data']['cover_url']		= $members_data->cover_url;
			$response['user_data']['picture_url']	= $members_data->picture_url;
			$response['user_data']['email']			= $members_data->email;
			$response['user_data']['address']		= $members_data->address;
			$response['user_data']['is_verified']	= $members_data->is_verified;
			$response['user_data']['referral_code']	= $members_data->referral_code;

			$response['info']		= $this->info();
			$response['price_list']	= $this->price_list();
			$response['news']		= $this->news();

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

	private function info() {
		$output['error']	= false;
		$data				= $this->m_public_info->get_public_info();
		$html				= "";

		foreach ($data as $value) {
			$html .= '<a href="https://www.youtube.com/watch?v='.$value->video_id.'" class="link-feed">'."\n";
			$html .= '<div class="feed">'."\n";
			$html .= '<div class="feed-profile">'."\n";
			$html .= '<div class="feed-profile-image" style="background-image:url('.$value->profile_picture_url.');"></div>'."\n";
			$html .= '<div class="feed-profile-id">'."\n";
			$html .= '<div class="feed-profile-name">'.$value->author_name.'</div>'."\n";
			$html .= '<div class="feed-profile-time">'.$value->created_date.'</div>'."\n";
			$html .= '</div>'."\n";
			$html .= '</div>'."\n";
			$html .= '<div class="feed-news">'.$value->contents.'</div>'."\n";
			$html .= '<div class="feed-image">'."\n";
			$html .= '<img src="http://img.youtube.com/vi/'.$value->video_id.'/0.jpg" class="feed-image-item">'."\n";
			$html .= '</div>'."\n";
			$html .= '</div>'."\n";
			$html .= '<div class="feed-link">https://www.youtube.com/watch?v='.$value->video_id.'</div>'."\n";
			$html .= '</a>'."\n";
		}

		return $html;
	}

	private function price_list() {
		$output['error']	= false;
		$data				= $this->m_price_lists->get_price_lists();
		$html				= "";

		foreach ($data as $value) {
			$html .= '<ul data-role="listview" data-inset="true" class="deposit-unlisted">'."\n";
			$html .= '<li class="deposit-list">'."\n";
			$html .= '<a href="#" class="deposit-link">'."\n";
			$html .= '<div class="deposit-image">'."\n";
			$html .= '<img src="'.$value->card_image_path.'" class="deposit-image-item">'."\n";
			$html .= '</div>'."\n";
			$html .= '</a>'."\n";
			$html .= '</li>'."\n";
			$html .= '</ul>'."\n";
		}

		return $html;
	}

	private function news() {
		$output['error']	= false;
		$data		= $this->m_public_news->get_public_news();
		$html				= "";

		foreach ($data as $value) {
			$html .= '<a href="'.$value->url.'" class="link-feed">'."\n";
			$html .= '<div class="feed">'."\n";
			$html .= '<div class="feed-profile">'."\n";
			$html .= '<div class="feed-profile-image" style="background-image:url('.$value->profile_picture_url.');"></div>'."\n";
			$html .= '<div class="feed-profile-id">'."\n";
			$html .= '<div class="feed-profile-name">'.$value->author_name.'</div>'."\n";
			$html .= '<div class="feed-profile-time">'.$value->created_date.'</div>'."\n";
			$html .= '</div>'."\n";
			$html .= '</div>'."\n";
			$html .= '<div class="feed-news">'.$value->contents.'</div>'."\n";
			$html .= '<div class="feed-image">'."\n";
			$html .= '<img src="'.$value->image_path.'" class="feed-image-item">'."\n";
			$html .= '</div>'."\n";
			$html .= '</div>'."\n";
			$html .= '<div class="feed-link">https://www.youtube.com/watch?v='.$value->url.'</div>'."\n";
			$html .= '</a>'."\n";
		}
		return $html;
	}

	public function register() {
		$this->initial->is_post();

		$fullname		= $this->input->post('fullname');
		$username		= $this->input->post('username');
		$password		= $this->input->post('password');
		$conf_pass		= $this->input->post('conf_pass');
		$email			= $this->input->post('email');
		$phone			= $this->input->post('phone');
		$referral_code	= $this->input->post('referal_code');

		$this->load->library('form_validation');

		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[30]|is_unique[members.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[30]');
		$this->form_validation->set_rules('conf_pass', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('referral_code', 'Referral Code', 'numeric');

		if ($this->form_validation->run()) {
			$data['username']		= $username;
			$data['password']		= md5($password);
			$data['full_name']		= $fullname;
			$data['phone']			= $phone;
			$data['email']			= $email;
			$data['user_type_id']	= 4;
			$data['oauth_scope']	= 'user';

			$this->m_members->insert_members($data);

			$output['error']		= false;
			$output['data']			= "registration_success";
			$output['user_id']		= $this->db->insert_id();
			$output['message']		= "Registration success and complete";

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		} else {
			$output['error']		= false;
			$output['message']		= validation_errors();

			$output['data'] = $output;
			$this->load->view('parse_json', $output);
		}
	}
}