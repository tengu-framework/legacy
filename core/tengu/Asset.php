<?php
/**
 * Tengu Framework
 *
 * @package  Tengu
 * @version  1.0
 * @author   Shea Lewis (Kai) <shea.lewis89@gmail.com>
 * @license  MIT License
 */
namespace Tengu;

class Asset
{
	/**
	 * Spits out the specified CSS file for you in HTML
	 */
	public static function css($file)
	{
		$tengu = \Tengu\Registry::getInstance();

		return '<link href="'.$tengu->config->item('base_url').'assets/css/'.$file.'" rel="stylesheet">';
	}

	/**
	 * Spits out the specified JavaScript file for you in HTML
	 */
	public static function js($file)
	{
		$tengu = \Tengu\Registry::getInstance();

		return '<script src="'.$tengu->config->item('base_url').'assets/js/'.$file.'"></script>';
	}
}

/* End of file core/tengu/Asset.php */