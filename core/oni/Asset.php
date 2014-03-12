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

class Asset
{
	/**
	 * Spits out the specified CSS file for you in HTML
	 */
	public static function css($file)
	{
		$oni = \Oni\Registry::getInstance();

		return '<link href="'.$oni->config->item('base_url').'assets/css/'.$file.'" rel="stylesheet">';
	}

	/**
	 * Spits out the specified JavaScript file for you in HTML
	 */
	public static function js($file)
	{
		$oni = \Oni\Registry::getInstance();

		return '<script src="'.$oni->config->item('base_url').'assets/js/'.$file.'"></script>';
	}
}

/* End of file core/oni/Asset.php */