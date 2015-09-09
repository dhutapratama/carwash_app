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

} elseif ($_SERVER['HTTP_HOST'] == 'americanecocarwash.app'
	OR $_SERVER['HTTP_HOST'] == 'www.americanecocarwash.app'
	OR $_SERVER['HTTP_HOST'] == 'api.americanecocarwash.app'
	OR $_SERVER['HTTP_HOST'] == 'admin.americanecocarwash.app'
	OR $_SERVER['HTTP_HOST'] == 'agen.americanecocarwash.app') {

	$db['default']['hostname'] = 'localhost';
	$db['default']['username'] = '';
	$db['default']['password'] = '';
	$db['default']['database'] = '';
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