<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class JoinController extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model('joinmodel');
    }
	
	public function index()	{
		$data['blogs'] = $this->joinmodel->join();
        $this->load->view('join_view', $data);
	}
}
