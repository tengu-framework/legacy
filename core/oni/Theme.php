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
	 * Define theme to load
	 */
	public $theme = null;

	/**
	 * Define layout for the loaded theme
	 */
	public $layout = null;

	/**
	 * Private data array used by the set method
	 */
	private $data = array();

	public function __construct()
	{
		$this->oni = \Oni\Registry::getInstance();
	}

	public function setTheme($theme = null)
	{
		if ( ! $theme !== null) {
			if (is_dir(THEME_PATH.'/'.$theme)) {
				$this->theme = $theme;
			} else
			{
				throw new \Exception('The theme "'.$theme.'" does not appear to exist.');
			}
		}

		return $this;
	}

	public function setLayout($layout = null)
	{
		if ( ! $layout !== null) {
			if ( ! isset($this->theme)) {
				throw new \Exception("You must first define a theme using setTheme()");
			} elseif (file_exists(THEME_PATH.'/'.$this->theme.'/layouts/'.$layout.'.php')) {
				$this->layout = $layout;
			} else {
				throw new \Exception('The layout "'.$this->theme.'/layouts/'.$layout.'.php" does not appear to exist.');
			}
		}

		return $this;
	}

	/**
	 * Theme set method
	 *
	 * @param  mixed  $key
	 * @param  mixed  $value
	 * @return void
	 */
	public function set($key, $value)
	{
		$this->data[$key] = $value;

		return $this;
	}

	public function render($view)
	{
		$view = $this->getView($view);

		extract($this->data, EXTR_SKIP);

		// Read view file into $content variable
		ob_start();
		include $view;
		$content = ob_get_contents();
		ob_end_clean();

		include THEME_PATH.'/'.$this->theme.'/layouts/'.$this->layout.'.php';
	}

	private function getView($view)
	{
		$application_path  = APP_PATH.'/views/'.$view.'.php';
		$theme_path        = THEME_PATH.'/'.$this->theme.'/views/'.$view.'.php';

		if (file_exists($theme_path)) {
			$path = $theme_path;
		} elseif ( ! file_exists($application_path)) {
			throw new \Exception('Theme view not found for '.$view.'.php');
		} else {
			$path = $application_path;
		}

		return $path;
	}
}

/* End of file core/oni/Theme.php */