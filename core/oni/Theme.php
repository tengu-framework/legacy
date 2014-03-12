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

class Theme
{
	/**
	 * Storage for defined view partials
	 */
	protected $partials = array();

	/**
	 * Define theme to load
	 */
	public $theme = null;

	/**
	 * Define template for the loaded theme
	 */
	public $template = null

	public function __construct()
	{
		$this->oni = \Oni\Registry::getInstance();
	}

	public function set_theme($theme = null)
	{
		if ( ! $theme !== null) {
			$this->theme = $theme;
		}
	}

	public function set_template($template = null)
	{
		if ( ! $template !== null) {
			$this->template = $template;
		}
	}

	public function render_partial($name)
	{
		$app_location   = APP_PATH.'/view/partial/'.$name.'.php';
		$theme_location = BASE_PATH.'/themes/'.$this->theme.'/view/partial/'.$name.'.php';

		if (file_exists($theme_location)) {
			$location = $theme_location;
		} elseif (file_exists($app_location) === false) {
			throw new \Exception ('Partial not found ('.$app_location.')');
		} else {
			$location = $app_location;
		}
	}
}

/* End of file core/oni/Theme.php */