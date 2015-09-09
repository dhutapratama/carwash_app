<?php
if ($_SERVER['HTTP_HOST'] == 'carwash.app'
	OR $_SERVER['HTTP_HOST'] == 'www.carwash.app'
	OR $_SERVER['HTTP_HOST'] == 'api.carwash.app'
	OR $_SERVER['HTTP_HOST'] == 'admin.carwash.app'
	OR $_SERVER['HTTP_HOST'] == 'agen.carwash.app') {

	date_default_timezone_set("Asia/Jakarta");
	define('ENVIRONMENT', 'development');
	$system_path 		= 'carwash_system';

	switch ($_SERVER['HTTP_HOST']) {
		case 'api.carwash.com':
			$application_folder = 'app_api';
			break;

		case 'admin.carwash.com':
			$application_folder = 'app_admin';
			break;

		case 'agen.carwash.com':
			$application_folder = 'app_agen';
			break;
		
		default:
			$application_folder = 'app_home';
			break;
	}

} elseif ($_SERVER['HTTP_HOST'] == 'americanecocarwash.app'
	OR $_SERVER['HTTP_HOST'] == 'www.americanecocarwash.app'
	OR $_SERVER['HTTP_HOST'] == 'api.americanecocarwash.app'
	OR $_SERVER['HTTP_HOST'] == 'admin.americanecocarwash.app'
	OR $_SERVER['HTTP_HOST'] == 'agen.americanecocarwash.app') {

	date_default_timezone_set("Asia/Jakarta");
	define('ENVIRONMENT', 'production');
	$system_path 		= 'carwash_system';

	switch ($_SERVER['HTTP_HOST']) {
		case 'api.americanecocarwash.com':
			$application_folder = 'app_api';
			break;

		case 'admin.americanecocarwash.com':
			$application_folder = 'app_admin';
			break;

		case 'agen.americanecocarwash.com':
			$application_folder = 'app_agen';
			break;
		
		default:
			$application_folder = 'app_home';
			break;
	}
} else {
	echo "Please contact software enginer, you wanna change the url?";
	exit();
}

if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(E_ALL);
		break;

		case 'testing':
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}

	// Set the current directory correctly for CLI requests
	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (realpath($system_path) !== FALSE)
	{
		$system_path = realpath($system_path).'/';
	}

	// ensure there's a trailing slash
	$system_path = rtrim($system_path, '/').'/';
	// Is the system path correct?
	if ( ! is_dir($system_path))
	{
		exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: ".pathinfo(__FILE__, PATHINFO_BASENAME));
	}

/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
	// The name of THIS file
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// The PHP file extension
	// this global constant is deprecated.
	define('EXT', '.php');

	// Path to the system folder
	define('BASEPATH', str_replace("\\", "/", $system_path));

	// Path to the front controller (this file)
	define('FCPATH', str_replace(SELF, '', __FILE__));

	// Name of the "system folder"
	define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));


	// The path to the "application" folder
	if (is_dir($application_folder))
	{
		define('APPPATH', $application_folder.'/');
	}
	else
	{
		if ( ! is_dir(BASEPATH.$application_folder.'/'))
		{
			exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
		}

		define('APPPATH', BASEPATH.$application_folder.'/');
	}

/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 *
 * And away we go...
 *
 */
require_once BASEPATH.'core/CodeIgniter.php';

/* End of file index.php */
/* Location: ./index.php */
