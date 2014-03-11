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
 	public function index()
 	{
 		echo Model\Welcome::hello('Kai');
 		
 		echo 'Home controller has been loaded.<br><br>';
 	}
 }