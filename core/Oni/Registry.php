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
	 * Static instance
	 */
	private static $_instance;

	/**
	 * Object hash map
	 */
	private $_map = array();

	/**
	 * Private registry constructor
	 */
	private function __construct()
	{ }

	/**
	 * Get the singeton instance
	 */
	public static function get_instance()
	{
		if (self::$_instance === null) {
			self::$_instance = new self();
		}

		return self::$_instance;
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