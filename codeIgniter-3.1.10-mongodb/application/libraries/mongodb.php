<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Author: https://www.roytuts.com
*/

class MongoDB {
	
	private $conn;
	
	function __construct() {
		$this->ci =& get_instance();
		$this->ci->load->config('mongodb');
		
		$host = $this->ci->config->item('host');
		$port = $this->ci->config->item('port');
		$username = $this->ci->config->item('username');
		$password = $this->ci->config->item('password');
		$authenticate = $this->ci->config->item('authenticate');
		
		try {
			if($authenticate === TRUE) {
				$this->ci->conn = new MongoDB\Driver\Manager('mongodb://' . $username . ':' . $password . '@' . $host. ':' . $port);
			} else {
				$this->ci->conn = new MongoDB\Driver\Manager('mongodb://' . $host. ':' . $port);
			}
		} catch(MongoDB\Driver\Exception\MongoConnectionException $ex) {
			show_error('Couldn\'t connect to mongodb: ' . $ex->getMessage(), 500);
		}
	}
	
	function getConn() {
		return $this->ci->conn;
	}
	
}