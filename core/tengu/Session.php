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

class Session
{
	/**
	 * Class variables
	 */
	var $message_id;

	/**
	 * Session __construct method
	 */
	public function __construct()
	{
		$this->tengu = \Tengu\Registry::getInstance();

		// Start session
		$this->start();

		// Generate a unique ID for this user and session
		$this->message_id = md5(uniqid());

		// Load session config
		$this->tengu->config->load('session');

		// Assign message config items to the $this object for use by the class
		$this->message_types = $this->tengu->config->item('message_types');
		$this->message_class = $this->tengu->config->item('message_class');

		// Create the session array if it doesn't already exist
		if ( ! array_key_exists('flash_messages', $_SESSION))
		{
			$_SESSION['flash_messages'] = array();
		}
	}

	public function start()
	{
		session_start();

		return $this;
	}

	public function destroy()
	{
		session_destroy();

		return $this;
	}

	public function set($key, $value)
	{
		$_SESSION[$key] = $value;

		return $this;
	}

	public function get($key)
	{
		return $_SESSION[$key];
	}

	public function setFlash($type, $message, $redirect_to = null)
	{
		if ( ! isset($_SESSION['flash_messages'])) {
			$_SESSION['flash_messages'] = array();
		}

		if ( ! isset($type) or ! isset($message[0])) {
			return false;
		}

		// Make sure it's a valid message type
		if ( ! in_array($type, $this->tengu->config->item('message_types'))) {
			throw new \Exception('"'.$type.'" is not a valid flash message type.');
		}

		// If the session array doesn't exist, create it
		if ( ! array_key_exists($type, $_SESSION['flash_messages'])) {
			$_SESSION['flash_messages'][$type] = array();
		}

		if ( ! in_array($message, $_SESSION['flash_messages'][$type])) {
			$_SESSION['flash_messages'][$type][] = $message;
		}

		if ($redirect_to == 'home') {
			$this->tengu->response->redirect('');
		} elseif ( ! is_null($redirect_to)) {
			$this->tengu->response->redirect($redirect_to);
		}

		return $this;
	}

	public function displayFlash($type = 'all', $print = true)
	{
		$messages  = '';
		$data      = '';

		if ( ! isset($_SESSION['flash_messages'])) {
			return false;
		}

		// Print a certain type of message?
		if (in_array($type, $this->message_types)) {
			foreach ($_SESSION['flash_messages'][$type] as $message) {
				$messages .= $this->tengu->config->item('message_before').$message.$this->tengu->config->item('message_after');
			}

			$data .= sprintf($this->tengu->config->item('message_wrapper'), $this->tengu->config->item('message_class'), $type, $messages);

			// Clear the viewed messages
			$this->clearFlash($type);
		} elseif ($type == 'all') {
			foreach ($_SESSION['flash_messages'] as $type => $message_array) {
				$messages = '';

				foreach ($message_array as $message) {
					$messages .= $this->tengu->config->item('message_before').$message.$this->tengu->config->item('message_after');
				}

				$data .= sprintf($this->tengu->config->item('message_wrapper'), $this->tengu->config->item('message_class'), $type, $messages);
			}

			// Clear ALL messages
			$this->clearFlash();
		} else {
			return false;
		}

		if (isset($print)) {
			echo $data;
		} else {
			return $data;
		}
	}

	public function clearFlash($type = 'all')
	{
		if ($type == 'all') {
			unset($_SESSION['flash_messages']);
		} else {
			unset($_SESSION['flash_messages'][$type]);
		}

		return $this;
	}
}

/* End of file core/tengu/Session.php */