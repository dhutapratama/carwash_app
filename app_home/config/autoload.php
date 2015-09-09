<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$autoload['packages'] 	= array();
$autoload['libraries'] 	= array('database', 'session', 'encrypt', 'blacklist', 'stocknbar');
$autoload['helper'] 	= array('url', 'stocknbar', 'language');
$autoload['config'] 	= array('stocknbar');
$autoload['language'] 	= array();
$autoload['model'] 		= array(
							'm_subscriber_startups',
							'm_subscriber_investors',
							'm_hacked_logs',
							'm_traffic_infos',
							'initial',

							'm_feedback',
							'm_startups',
							'm_configuration'
						);
