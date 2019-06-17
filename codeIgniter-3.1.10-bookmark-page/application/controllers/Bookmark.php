<?php

	if (!defined('BASEPATH'))
		exit('No direct script access allowed');

	/**
	* Description of bookmark
	*
	* @author https://www.roytuts.com
	*/
	class Bookmark extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->model('bookmark_model', 'bookmark');
		}
		
		function index() {
			$this->load->view('bookmark');
		}

		function bookmark() {
			if (isset($_POST)) {
				$title = $_POST['title'];
				$url = $_POST['url'];
				
				if (strlen(trim($title)) && strlen(trim($url))) {
					$resp = $this->bookmark->bookmark($title, $url);
					
					if ($resp === TRUE) {
						echo 'Page successfully bookmarked';
					} else {
						echo 'Error occurred while bookmarking this page';
					}
				}
			}
		}
	}

/* End of file bookmark.php */
/* Location: ./application/controllers/bookmark.php */