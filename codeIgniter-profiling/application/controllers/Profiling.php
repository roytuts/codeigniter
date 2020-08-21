<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profiling extends CI_Controller {

	/*public function index()	{
		$this->output->enable_profiler(TRUE);
		$this->load->view('profiling');
	}*/
	
	/*public function index()	{
		$this->output->enable_profiler(TRUE);
		
		$sections = array(
			'config'  => FALSE,
			'memory_usage' => FALSE
		);

		$this->output->set_profiler_sections($sections);
		
		$this->load->view('profiling');
	}*/
	
	public function index()	{
		$this->output->enable_profiler(TRUE);
		
		$sections = array(
			'memory_usage' => TRUE
		);

		$this->output->set_profiler_sections($sections);
		
		$this->load->view('profiling');
	}
}
