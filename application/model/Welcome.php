<?php
/**
 * Oni MVC Framework
 *
 * @package  Oni
 * @version  1.0
 * @author   Shea Lewis (Kai) <shea.lewis89@gmail.com>
 * @license  MIT License
 */
namespace Model;

class Welcome extends \Oni\Model
{
	public static function hello($name)
	{
		return 'Hello '.$name.'! Nice to meet you! I am Oni!';
	}
}

 /* End of file application/model/Walcome.php */