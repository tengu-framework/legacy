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
 	public function __construct()
 	{
 		parent::__construct();
 		
 		$this->oni->log->addInfo('Home controller loaded.');
 	}

 	public function index($name = '')
 	{
 		$hello = Model\Welcome::hello('Godzilla');

 		$this->oni->view->set('hello', $hello);
 		$this->oni->view->render('hello');
 	}
 }

 /* End of file application/controller/Home.php */