<?php
/**
 * Oni MVC Framework
 *
 * @package  Oni
 * @version  1.0
 * @author   Shea Lewis (Kai) <shea.lewis89@gmail.com>
 * @license  MIT License
 */
defined('BASE_PATH') or exit('No direct script access allowed.');

/*
 * ---------------------------------------------------------------
 * Load Composer autoloader
 * ---------------------------------------------------------------
 */
if ( ! is_readable(VENDOR_PATH.'/autoload.php')) {
	die('Please install Composer first by running "php composer.phar install" from the root of your installation');
}

require VENDOR_PATH.'/autoload.php';

/*
 * ---------------------------------------------------------------
 * Load common functions
 * ---------------------------------------------------------------
 */
require CORE_PATH.'/Oni/Common.php';

/*
 * ---------------------------------------------------------------
 * Initiate the registry class
 * ---------------------------------------------------------------
 */
$oni = new Oni\Registry;

/*
 * ---------------------------------------------------------------
 * Initiate the router class
 * ---------------------------------------------------------------
 */
$oni->router = new Oni\Router($oni);

/* End of file core/bootstrap.php */