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

abstract class Controller
{
	/**
	 * Controller construct method
	 *
	 * @param  object  $registry
	 */
	public function __construct()
	{
		$this->tengu = \Tengu\Registry::getInstance();
	}
}

/* End of file core/tengu/Controller.php */