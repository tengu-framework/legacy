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

class View
{
	/**
	 * Private data array used by the set method
	 */
	private $data = array();

	public function __construct()
	{
		$this->oni = \Oni\Registry::getInstance();
	}

	/**
	 * View set method
	 *
	 * @param  mixed  $key
	 * @param  mixed  $value
	 * @return void
	 */
	public function set($key, $value)
	{
		$this->data[$key] = $value;
	}

	public function render($file)
	{
		$path = APP_PATH.'/view/'.$file.'.php';

		if ( ! file_exists($path)) {
			die('View not found: ('.$path.')');
		}

		// Load in the variables
		foreach ($this->data as $key => $value) {
			$$key = $value;
		}

		include $path;
	}
}

/* End of file core/oni/View.php */