<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LeftJoinController extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model('leftjoinmodel');
    }
	
	public function index()	{
		$data['blogs'] = $this->leftjoinmodel->left_outer_join();
        $this->load->view('left_join_view', $data);
	}
}
