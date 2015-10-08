<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$autoload['packages'] 	= array();
$autoload['libraries'] 	= array('database', 'session', 'encrypt', 'blacklist', 'carwash', 'oauthlib');
$autoload['helper'] 	= array('url', 'carwash', 'language');
$autoload['config'] 	= array('carwash');
$autoload['language'] 	= array();
$autoload['model'] 		= array(
							'm_hacked_logs',
							'm_traffic_infos',
							'initial',

							'm_users',
							'm_oauth_clients',
							'm_oauth_authorization_codes',
							'm_oauth_access_tokens'
						);
