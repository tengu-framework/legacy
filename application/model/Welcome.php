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

class Welcome
{
	public static function hello($name)
	{
		$string  = 'Hello '.$name.'! Nice to meet you! I am Oni!<br><br>';

		return $string;
	}
}