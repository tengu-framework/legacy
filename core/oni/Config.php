<?php
/**
 * Oni MVC Framework
 *
 * @package  Oni
 * @version  1.0
 * @author   Shea Lewis (Kai) <shea.lewis89@gmail.com>
 * @license  MIT License
 */
namespace Oni;

class Config
{
	/**
	 * Array to hold all config items
	 */
	public $config = array();

	/**
	 * Config constructor
	 *
	 * Loads the initial config file and stores the parsed results within our global $config array.
	 * This also checks if the base_url is set in the config file. If not, it will attempt to auto-guess
	 * the URL and set it. If it doesn't work, update the main config file with the correct base_url.
	 */
	public function __construct()
	{
		// Load the base config file
		$this->load();

		// Set the base_url automatically if none was provided
		if (empty($this->config['base_url'])) {
			if (isset($_SERVER['HTTP_HOST'])) {
				$base_url  = 'http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
			} else {
				$base_url = 'http://localhost/';
			}

			$this->setItem('base_url', $base_url);
		}
	}

	/**
	 * Temporarily stores a new value for the specified config item
	 *
	 * @param   string  $key
	 * @param   mixed   $value
	 * @return  void
	 */
	public function setItem($key, $value)
	{
		$this->config[$key] = $value;
	}

	/**
	 * Returns config item's value
	 *
	 * @param   string  $key
	 * @return  mixed   $this->config[$key]
	 */
	public function item($key)
	{
		return isset($this->config[$key]) ? $this->config[$key] : null;
	}

	/**
	 * Load config file
	 *
	 * Loads the specified config file and merges the returned array values in
	 * with the global $config array to be utilized across the entire framework
	 *
	 * @param   string  $file
	 * @return  void
	 */
	public function load($file = null)
	{
		$file = (is_null($file)) ? 'config' : str_replace('.php', '', $file);

		$base_path         = APP_PATH.'/config/'.$file.'.php';
		$environment_path  = APP_PATH.'/config/'.strtolower(ENVIRONMENT).'/'.$file.'.php';

		if (file_exists($base_path)) {
			require $base_path;
		}

		if (file_exists($environment_path)) {
			require $environment_path;
		}

		if ( ! file_exists($base_path) and ! file_exists($environment_path)) {
			throw new \Exception("Your $file file does not seem to exist.");
		}

		if ( ! isset($config) or ! is_array($config)) {
			throw new \Exception("Your $file file does not seem to contain a valid configuration array.");
		}

		$this->config = array_merge($this->config, $config);
		unset($config);
	}
}

/* End of file core/oni/Config.php */