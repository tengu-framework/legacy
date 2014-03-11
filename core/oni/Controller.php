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

abstract class Controller
{
	/**
	 * Controller construct method
	 *
	 * @param  object  $registry
	 */
	public function __construct()
	{
		$this->oni = \Oni\Registry::getInstance();
	}
}