<?php
/**
 * Oni MVC Framework
 *
 * @package  Oni
 * @version  1.0
 * @author   Shea Lewis (Kai) <shea.lewis89@gmail.com>
 * @license  MIT License
 */

/*
 * ---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 * ---------------------------------------------------------------
 */
define('ONI_VERSION', '1.0');

/*
 * ---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 * ---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     staging
 *     production
 *
 */
define('ENVIRONMENT', 'development');

/*
 * ---------------------------------------------------------------
 * DEFAULT TIMEZONE SETTING
 * ---------------------------------------------------------------
 *
 * Sets the default timezone used by all date/time functions in the framework.
 */
date_default_timezone_set('America/Los_Angeles');

/*
 * ---------------------------------------------------------------
 * ERROR REPORTING
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
error_reporting(E_ALL);

switch (ENVIRONMENT) {
	case 'development':
		error_reporting(-1);
		ini_set("display_errors", 1);
		ini_set("log_errors", 1);
		break;
	case 'staging':
	case 'production':
		error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
		ini_set("display_errors", 0);
		ini_set("log_errors", 1);
		break;
	default:
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'The application environment is not set correctly.';
		exit(1);
}

/*
 * ---------------------------------------------------------------
 * PATH CONSTANTS
 * ---------------------------------------------------------------
 */
define('BASE_PATH', realpath(dirname(__FILE__)));
define('APP_PATH', BASE_PATH.'/application');
define('CORE_PATH', BASE_PATH.'/core');
define('VENDOR_PATH', BASE_PATH.'/vendor');


/*
 * ---------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * ---------------------------------------------------------------
 */
require_once(CORE_PATH.'/bootstrap.php');

/* End of file index.php */