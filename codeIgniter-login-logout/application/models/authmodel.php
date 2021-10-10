<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	
/**
* Description of AuthModel
*
* @author https://www.roytuts.com
*/

class AuthModel extends CI_Model {
	
	private $login = 'login';

	function get_user($username, $password) {
		$this->db->limit(1);
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		
		$query = $this->db->get($this->login);
		
		if($query->row()) {
			return $query->row();
		}
		
		return NULL;
	}
	
}

/* End of file authmodel.php */
/* Location: ./application/models/authmodel.php */
