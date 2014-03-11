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

abstract class Model
{
	public function __construct()
	{
		$this->oni = \Oni\Registry::getInstance();
	}
}

/* End of file core/oni/Model.php */