<?php
/**
 * Oni MVC Framework
 *
 * @package  Oni
 * @version  1.0
 * @author   Shea Lewis (Kai) <shea.lewis89@gmail.com>
 * @license  MIT License
 */

 class ControllerHome extends Oni\Controller
 {
 	public function index($name = '')
 	{
 		echo Model\Welcome::hello('Godzilla');
 	}
 }