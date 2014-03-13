<?php
/**
 * Tengu Framework
 *
 * @package  Tengu
 * @version  1.0
 * @author   Shea Lewis (Kai) <shea.lewis89@gmail.com>
 * @license  MIT License
 */
namespace Tengu;

class View
{
	/**
	 * Private data array used by the set method
	 */
	private $data = array();

	public function __construct()
	{
		$this->tengu = \Tengu\Registry::getInstance();
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
		$path = APP_PATH.'/views/'.$file.'.php';

		if ( ! file_exists($path)) {
			die('View not found: ('.$path.')');
		}

		// Load in the variables
		extract($this->data, EXTR_SKIP);

		include $path;
	}
}

/* End of file core/tengu/View.php */