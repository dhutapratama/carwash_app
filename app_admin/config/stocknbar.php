<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Static url
if ($_SERVER['HTTP_HOST'] == 'carwash.app'
	OR $_SERVER['HTTP_HOST'] == 'www.carwash.app'
	OR $_SERVER['HTTP_HOST'] == 'api.carwash.app'
	OR $_SERVER['HTTP_HOST'] == 'admin.carwash.app'
	OR $_SERVER['HTTP_HOST'] == 'agen.carwash.app') {

	$config['static_url'] = 'http://static.carwash.app';
	$config['simple_url'] = 'carwash.app';
	
} elseif ($_SERVER['HTTP_HOST'] == 'americanecocarwash.app'
	OR $_SERVER['HTTP_HOST'] == 'www.americanecocarwash.app'
	OR $_SERVER['HTTP_HOST'] == 'api.americanecocarwash.app'
	OR $_SERVER['HTTP_HOST'] == 'admin.americanecocarwash.app'
	OR $_SERVER['HTTP_HOST'] == 'agen.americanecocarwash.app') {

	$config['static_url'] = 'https://raw.githack.com/dhutapratama/stocknbar_app/static';
	$config['simple_url'] = 'americanecocarwash.com';
} else {
	$config['static_url'] = 'http://localhost/static';
	$config['simple_url'] = 'localhost';
}

$config['app_version'] 	= 'MVP - 20 Agustus 2015';
$config['app_name'] 	= 'Stock N\' Bar';

$config['legal_name'] 	= 'PT. Startup Asia';
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
