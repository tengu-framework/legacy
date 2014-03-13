<?php
/**
 * Tengu Framework
 *
 * @package  Tengu
 * @version  1.0
 * @author   Shea Lewis (Kai) <shea.lewis89@gmail.com>
 * @license  MIT License
 */
namespace Model;

class Welcome extends \Tengu\Model
{
	public static function hello($name)
	{
		return 'Hello '.$name.'! Nice to meet you! I am Tengu!';
	}
}

 /* End of file application/model/Walcome.php */