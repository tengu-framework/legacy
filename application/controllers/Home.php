<?php
/**
 * Tengu Framework
 *
 * @package  Tengu
 * @version  1.0
 * @author   Shea Lewis (Kai) <shea.lewis89@gmail.com>
 * @license  MIT License
 */

 class ControllerHome extends Tengu\Controller
 {
 	public function index($name = '')
 	{
 		$hello = Model\Welcome::hello('Godzilla');

 		$this->tengu->theme->setTheme('bootstrap')
 			->setLayout('public')
 			->set('hello', $hello)
			->render('hello');
 	}
 }

 /* End of file application/controller/Home.php */