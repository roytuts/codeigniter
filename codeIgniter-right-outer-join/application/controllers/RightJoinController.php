<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RightJoinController extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model('rightjoinmodel');
    }
	
	public function index()	{
		$data['blogs'] = $this->rightjoinmodel->right_outer_join();
        $this->load->view('right_join_view', $data);
	}
}
