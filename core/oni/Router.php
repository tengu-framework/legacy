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

class Router
{
	/**
	 * The registry object
	 */
	private $registry;

	/**
	 * The controller path
	 */
	private $path;

	/**
	 * The controller file
	 */
	public $file;

	/**
	 * Router construct method
	 *
	 * @param  object  $registry
	 */
	public function __construct()
	{
		$this->oni = \Oni\Registry::getInstance();
	}

	/**
	 * Set the controller directory path
	 *
	 * @param   string  $path
	 * @return  void
	 */
	public function setPath($path)
	{
		// Check if the path is a directory
		if (is_dir($path) == false) {
			throw new Exception('Invalid controller path: "'.$path.'"');
		}

		// If path is a directory, set it!
		$this->path = $path;
	}

	/**
	 * Load controller
	 *
	 * @return  void
	 */
	public function load()
	{
		// Check the route
		$this->getController();

		// Check if file is readable, if not redirect to 404
		if (is_readable($this->file) == false) {
			die ('404: File Not Found ("'.$this->file.'")');
		}

		// Include controller
		include $this->file;

		// Initiate new instance of controller class
		$class       = 'Controller'.ucfirst($this->controller);
		$controller  = new $class;

		$action = $this->action;

		// Run the action
		$controller->$action();
	}

	public function getController()
	{
		// Get the route from the URL
		$uri = trim(substr($_SERVER['REQUEST_URI'], 1));

		// Remove trailing slashes if they exist
		$uri = rtrim($uri, '/');

		// Check for any custom routes and redirect as needed
		$route = $this->parseRoutes($uri);

		if ( ! empty($route)) {
			$uri = $route;
		}

		$parts = explode('/', $uri);
		$this->controller = $parts[0];

		if (isset($parts[1])) {
			$this->action = $parts[1];
		}

		// Default to "index" action if one is not specified
		if (empty($this->action)) {
			$this->action = 'index';
		}

		// Get the file path
		$this->file = $this->path.'/'.ucfirst($this->controller).'.php';
	}

	private function parseRoutes($uri)
	{
		// Include routes config file
		include APP_PATH.'/config/routes.php';

		// Is there a literal math? If so, we're done here
		if (isset($routes[$uri])) {
			$redirect = $routes[$uri];
		} else {
			// Loop through the routes array looking for wildcard matches
			foreach ($routes as $key => $value) {
				// Convert wildcards to regex
				$key = str_replace(array(':any', ':alnum', ':num', ':alpha', ':segment'), array('.+', '[[:alnum:]]+', '[[:digit:]]+', '[[:alpha:]]+', '[^/]*'), $key);

				// Do any of the regex have a match?
				if (preg_match('#^'.$key.'$#', $uri, $matches)) {
					// Remove the original string from the matches array
					array_shift($matches);

					// Shift array keys up by one
					array_unshift($matches, 'temporary');
					unset($matches[0]);

					$routed_uri = $value;

					foreach ($matches as $match_key => $match_value) {
						$routed_uri = str_replace('$'.$match_key, $match_value, $routed_uri);
					}

					$redirect = $routed_uri;
				} elseif ($uri == '') {
					// Else, let's check to see if we're on the "homepage" and load our default controller
					if ( ! empty($routes['default_controller'])) {
						return $routes['default_controller'];
					} else {
						// If $routes['default_controller'] is empty or not set, simply try and load the fallback default controller of "home"
						return 'home';
					}
				}
			}
		}

		if (isset($redirect)) {
			return $redirect;
		}
	}
}

/* End of file core/Oni/Router.php */