<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$active_group = 'default';
$active_record = TRUE;

if ($_SERVER['HTTP_HOST'] == 'carwash.app'
	OR $_SERVER['HTTP_HOST'] == 'www.carwash.app'
	OR $_SERVER['HTTP_HOST'] == 'api.carwash.app'
	OR $_SERVER['HTTP_HOST'] == 'admin.carwash.app'
	OR $_SERVER['HTTP_HOST'] == 'agen.carwash.app') {

	$db['default']['hostname'] = 'localhost';
	$db['default']['username'] = 'carwash';
	$db['default']['password'] = 'carwash';
	$db['default']['database'] = 'zadmin_carwash';

} elseif ($_SERVER['HTTP_HOST'] == 'gogreencarwash.id'
	OR $_SERVER['HTTP_HOST'] == 'www.gogreencarwash.id'
	OR $_SERVER['HTTP_HOST'] == 'api.gogreencarwash.id'
	OR $_SERVER['HTTP_HOST'] == 'manage.gogreencarwash.id'
	OR $_SERVER['HTTP_HOST'] == 'agen.gogreencarwash.id') {

	$db['default']['hostname'] = '192.168.23.16:3306';
	$db['default']['username'] = 'gogreen_carwash';
	$db['default']['password'] = '^X5rh1v7';
	$db['default']['database'] = 'ggcw_apps';
} else {
	$db['default']['hostname'] = 'localhost';
	$db['default']['username'] = 'root';
	$db['default']['password'] = '';
	$db['default']['database'] = '';
}

$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;


/* End of file database.php */
/* Location: ./application/config/database.php */