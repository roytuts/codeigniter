<?php

	if (!defined('BASEPATH'))
		exit('No direct script access allowed');

	/**
	* Description of bookmark_model
	*
	* @author https://www.roytuts.com
	*/
	class Bookmark_Model extends CI_Model {

		private $bookmark = 'bookmark';

		function __construct() {
		}

		function bookmark($title, $url) {
			$ip = $this->input->server('REMOTE_ADDR');
			$browser = $this->agent->agent_string();
			
			$data = array(
				'ip_address' => $ip,
				'bookmark_title' => $title,
				'bookmark_url' => $url,
				'browser' => $browser,
				'created_date' => date('Y-m-d H:i:s')
			);
			
			if ($this->db->insert($this->bookmark, $data)) {
				return TRUE;
			}
			
			return FALSE;
		}

	}

/* End of file bookmark_model.php */
/* Location: ./application/models/bookmark_model.php */