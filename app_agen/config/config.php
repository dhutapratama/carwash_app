<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ($_SERVER['HTTP_HOST'] == 'carwash.app'
	OR $_SERVER['HTTP_HOST'] == 'www.carwash.app'
	OR $_SERVER['HTTP_HOST'] == 'api.carwash.app'
	OR $_SERVER['HTTP_HOST'] == 'admin.carwash.app'
	OR $_SERVER['HTTP_HOST'] == 'agen.carwash.app') {

	$config['base_url'] = 'http://carwash.app';
	
} elseif ($_SERVER['HTTP_HOST'] == 'americanecocarwash.com'
	OR $_SERVER['HTTP_HOST'] == 'www.americanecocarwash.com'
	OR $_SERVER['HTTP_HOST'] == 'api.americanecocarwash.com'
	OR $_SERVER['HTTP_HOST'] == 'admin.americanecocarwash.com'
	OR $_SERVER['HTTP_HOST'] == 'agen.americanecocarwash.com') {

	$config['base_url'] = 'https://americanecocarwash.com';
} else {
	$config['base_url'] = 'http://localhost';
}

$config['index_page'] 			= '';
$config['uri_protocol']			= 'AUTO';
$config['url_suffix'] 			= '.html';
$config['language']				= 'english';
$config['charset'] 				= 'UTF-8';
$config['enable_hooks'] 		= FALSE;
$config['subclass_prefix'] 		= 'MY_';
$config['permitted_uri_chars'] 	= 'a-z 0-9~%.:_\-';
$config['allow_get_array']		= TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger']	= 'c';
$config['function_trigger']		= 'm';
$config['directory_trigger']	= 'd'; // experimental not currently in use

$config['log_threshold'] 		= 0;
$config['log_path'] 			= '';
$config['log_date_format'] 		= 'Y-m-d H:i:s';
$config['cache_path'] 			= '';
$config['encryption_key'] 		= 'lkl1ZXne0enW1OkU-googreencarwash-BVyKtqvW9pZXyp1T';

$config['sess_cookie_name']		= 'ggcw_key';
$config['sess_expiration']		= 7200;
$config['sess_expire_on_close']	= FALSE;
$config['sess_encrypt_cookie']	= TRUE;
$config['sess_use_database']	= TRUE;
$config['sess_table_name']		= 'login_sessions';
$config['sess_match_ip']		= FALSE;
$config['sess_match_useragent']	= TRUE;
$config['sess_time_to_update']	= 300;

$config['cookie_prefix']		= "";
$config['cookie_domain']		= "";
$config['cookie_path']			= "/";
$config['cookie_secure']		= FALSE;

$config['global_xss_filtering'] = TRUE;

$config['csrf_protection'] 		= FALSE;
$config['csrf_token_name'] 		= 'csrf_token';
$config['csrf_cookie_name'] 	= 'aecw_a';
$config['csrf_expire'] 			= 7200;

$config['compress_output'] 		= FALSE;

$config['time_reference'] 		= 'local';

$config['rewrite_short_tags'] 	= FALSE;

$config['proxy_ips'] 			= '';


/* End of file config.php */
/* Location: ./application/config/config.php */
