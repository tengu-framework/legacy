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

class Registry
{
	/**
	 * Object hash map
	 */
	private $_map = array();

	/**
	 * Static instance object
	 */
	public static $instance;

	public function __construct()
	{
		self::$instance = $this;
	}

	public static function getInstance()
	{
		return self::$instance;
	}

	/**
	 * Registry __set method
	 *
	 * @return  void
	 */
	public function __set($key, $value)
	{
		$this->_map[$key] = $value;
	}

	/**
	 * Registry __get method
	 *
	 * @return  void
	 */
	public function __get($key)
	{
		return $this->_map[$key];
	}
}

/* End of file core/Oni/Registry.php */