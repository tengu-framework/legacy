<?php
/**
 * Tengu Framework
 *
 * @package  Tengu
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
 * Initiate the registry class
 * ---------------------------------------------------------------
 */
$tengu = new Tengu\Registry;

/*
 * ---------------------------------------------------------------
 * Initiate Whoops and set Whoops as the default
 * error and exception handler in PHP
 * ---------------------------------------------------------------
 */
if (ENVIRONMENT == 'development') {
	$tengu->whoops = new Whoops\Run();
	$tengu->whoops->pushHandler(new Whoops\Handler\PrettyPageHandler());
	$tengu->whoops->register();	
}

/*
 * ---------------------------------------------------------------
 * Initiate Monolog to handle logging
 * ---------------------------------------------------------------
 */
$tengu->log = new Monolog\Logger('Tengu');
$tengu->log->pushHandler(new Monolog\Handler\StreamHandler(APP_PATH.'/logs/'.date('Y-m-d').'.txt', Monolog\Logger::DEBUG));
$tengu->log->pushHandler(new Monolog\Handler\FirePHPHandler());

/*
 * ---------------------------------------------------------------
 * Initiate the session class
 * ---------------------------------------------------------------
 */
$tengu->session = new Tengu\Session;

/*
 * ---------------------------------------------------------------
 * Initiate the router class
 * ---------------------------------------------------------------
 */
$tengu->router = new Tengu\Router($tengu);
$tengu->router->setPath(APP_PATH.'/controllers');

/*
 * ---------------------------------------------------------------
 * Initiate the view class
 * ---------------------------------------------------------------
 */
$tengu->config = new Tengu\Config;

/*
 * ---------------------------------------------------------------
 * Initiate the view and theme class
 * ---------------------------------------------------------------
 */
$tengu->view   = new Tengu\View;
$tengu->theme  = new Tengu\Theme;

/*
 * ---------------------------------------------------------------
 * Hajime!
 * ---------------------------------------------------------------
 */
$tengu->router->load();

/* End of file core/bootstrap.php */