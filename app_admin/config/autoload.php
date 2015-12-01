<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$autoload['packages'] 	= array();
$autoload['libraries'] 	= array('database', 'session', 'encrypt', 'blacklist', 'carwash', 'oauthlib', 'form_validation');
$autoload['helper'] 	= array('url', 'carwash', 'language');
$autoload['config'] 	= array('carwash');
$autoload['language'] 	= array();
$autoload['model'] 		= array(
							'm_hacked_logs',
							'm_traffic_infos',
							'initial',

							'm_members',
							'm_oauth_clients',
							'm_oauth_authorization_codes',
							'm_oauth_access_tokens',
							'm_public_info',
							'm_public_news',
							'm_price_lists',
							'm_member_cars',
							'm_contracts',
							'm_request_lists',
							'm_request_taken',
							'm_users',
							'm_washing_photos',
							'm_cleaning_process',
							'm_user_type',
							'm_locations',
							'm_contract_histories'
						);
