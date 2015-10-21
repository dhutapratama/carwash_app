<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Static url
if ($_SERVER['HTTP_HOST'] == 'carwash.app'
	OR $_SERVER['HTTP_HOST'] == 'www.carwash.app'
	OR $_SERVER['HTTP_HOST'] == 'api.carwash.app'
	OR $_SERVER['HTTP_HOST'] == 'admin.carwash.app'
	OR $_SERVER['HTTP_HOST'] == 'agen.carwash.app') {

	$config['static_url'] = 'http://static.carwash.app';
	$config['simple_url'] = 'carwash.app';
	
} elseif ($_SERVER['HTTP_HOST'] == 'gogreencarwash.id'
	OR $_SERVER['HTTP_HOST'] == 'www.gogreencarwash.id'
	OR $_SERVER['HTTP_HOST'] == 'api.gogreencarwash.id'
	OR $_SERVER['HTTP_HOST'] == 'admin.gogreencarwash.id'
	OR $_SERVER['HTTP_HOST'] == 'agen.gogreencarwash.id') {

	$config['static_url'] = 'http://static.gogreencarwash.id';
	$config['simple_url'] = 'gogreencarwash.id';
} else {
	$config['static_url'] = 'http://localhost/static';
	$config['simple_url'] = 'localhost';
}

$config['app_version'] 	= '0.0.1 - 07 Oktober 2015';
$config['app_name'] 	= 'Go Green Carwash';
$config['client_id']		= "2d48ad81ef13471a99dccbf57981a27c";
$config['client_secret']	= "4d3e131d2244763fec17955c4fb93d94";

$config['legal_name'] 	= 'PT. Raja Asia Pasifik';
$config['legal_number'] = '-';
$config['legal_npwp'] 	= '-';
$config['legal_siup'] 	= '-';

$config['google_site_verification']	= '8Cwz0XYIZytEn86e1dZzjYPdbrJ1ZiPUCRdlrNF_lIA';
$config['detectify_verification']	= '';

$config['apikey_ipdbinfo']	= '06f00aeac86750febc6e3f3a248511fcd687755204df5b394412f34ad8c64e30';

$config['lang_list']	= array(
								'ID' => 'indonesian',
								'FR' => 'french',
								'EN' => 'english',
								'-'  => 'indonesian'
							);
