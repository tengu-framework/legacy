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

	/**
	 * Static instance object
	 */
	public static $instance;

	/**
	 * Theme __construct method
	 */
	public function __construct()
	{
		self::$instance = $this;

		$this->tengu = \Tengu\Registry::getInstance();

		// Load the theme config file
		$this->tengu->config->load('theme');

		// Set theme and layout default from the theme config if they
		// are null. This allows us to override these settings in any
		// of our controllers as needed.
		if (is_null($this->theme)) {
			$this->setTheme($this->tengu->config->item('theme'));
		}
		
		if (is_null($this->layout)) {
			$this->setLayout($this->tengu->config->item('theme_layout'));
		}
	}

	/**
	 * Static method to get theme instance
	 */
	public static function getInstance()
	{
		return self::$instance;
	}

	/**
	 * Set theme
	 *
	 * @param   string  $theme
	 * @return  object  $this
	 */
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

	/**
	 * Set layout
	 *
	 * @param   string  $layout
	 * @return  object  $this
	 */
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
	 * @param   mixed   $key
	 * @param   mixed   $value
	 * @return  object  $this
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

	public static function asset($folder, $file)
	{
		$tengu = \Tengu\Registry::getInstance();
		$theme = \Tengu\Theme::getInstance();

		switch($folder) {
			case 'js':
				return '<script src="'.$tengu->config->item('base_url').'/themes/'.$theme->theme.'/assets/'.$folder.'/'.$file.'"></script>';
				break;
			case 'css':
				return '<link href="'.$tengu->config->item('base_url').'/themes/'.$theme->theme.'/assets/'.$folder.'/'.$file.'" rel="stylesheet">';
				break;
		}
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

/* End of file core/tengu/Theme.php */