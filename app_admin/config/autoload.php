<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$autoload['packages'] 	= array();
$autoload['libraries'] 	= array('database', 'session', 'encrypt', 'blacklist', 'carwash');
$autoload['helper'] 	= array('url', 'carwash', 'language');
$autoload['config'] 	= array('carwash');
$autoload['language'] 	= array();
$autoload['model'] 		= array(
							'm_hacked_logs',
							'm_traffic_infos',
							'initial',

						);
