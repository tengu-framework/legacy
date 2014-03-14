<?php
/**
 * Tengu Framework
 *
 * @package  Tengu
 * @version  1.0
 * @author   Shea Lewis (Kai) <shea.lewis89@gmail.com>
 * @license  MIT License
 */
if ( ! defined('ENVIRONMENT')) exit('No direct script access allowed');

$config['message_types']    = array('help', 'info', 'warning', 'success', 'error');
$config['message_class']    = 'message';
$config['message_wrapper']  = "<div class='%s %s'>\n\t%s\n</div>\n";
$config['message_before']   = '<p>';
$config['message_after']    = '</p>';

/* End of file application/config/session.php */