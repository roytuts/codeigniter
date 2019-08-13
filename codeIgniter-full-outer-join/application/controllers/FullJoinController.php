<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FullJoinController extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model('fulljoinmodel');
    }
	
	public function index()	{
		$data['blogs'] = $this->fulljoinmodel->full_outer_join();
        $this->load->view('full_join_view', $data);
	}
}
