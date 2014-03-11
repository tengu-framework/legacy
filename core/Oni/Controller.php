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

class Controller
{
	/**
	 * The registry object
	 */
	private $registry;

	/**
	 * Controller construct method
	 *
	 * @param  object  $registry
	 */
	public function __construct($registry)
	{
		$this->oni = $registry;
	}
}