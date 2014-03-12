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

class Assets
{
	public static function css($file)
	{
		$oni = \Oni\Registry::getInstance();

		return '<link href="'.$oni->config->item('base_url').'assets/css/'.$file.'" rel="stylesheet">';
	}

	public static function js($file)
	{
		$oni = \Oni\Registry::getInstance();

		return '<script src="'.$oni->config->item('base_url').'assets/js/'.$file.'"></script>';
	}
}