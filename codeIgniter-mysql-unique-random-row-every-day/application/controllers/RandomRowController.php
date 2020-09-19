<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RandomRowController extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('RandomRow_Model' , 'rm');
    }
	
	public function index()	{
		$data['celeb'] = $this->rm->pickTodayCeleb();
		$this->load->view('random', $data);
	}
}
