<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] 	= "home";
$route['404_override'] 			= 'error_page';
$route['request'] 				= 'home/request';
$route['concept'] 				= 'home/concept';
$route['concept/(:any)']		= 'home/concept/$1';
$route['language/(:any)']		= 'home/language/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */