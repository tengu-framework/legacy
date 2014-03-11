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
		$oni = \Oni\Registry::getInstance();

		$string  = 'Hello '.$name.'! Nice to meet you! I am Oni!';
		
		return $string;
	}
}