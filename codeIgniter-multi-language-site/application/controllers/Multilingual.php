<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Author: https://www.roytuts.com
*/

class Multilingual extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$language = '';
		if ($this->input->post('locale')) {
			$language = $this->input->post('locale');
			if($language == 'bn') {
				$this->lang->load('locale', 'bengali');
			} else if($language == 'hi') {
				$this->lang->load('locale', 'hindi');
			} else if($language == 'nl') {
				$this->lang->load('locale', 'dutch');
			} else if($language == 'fr') {
				$this->lang->load('locale', 'french');
			} else {
				$this->lang->load('locale', 'english');
			}
		} else {
			$this->lang->load('locale', 'english');
		}
		
		$data['language'] = $language == '' ? 'en' : $language;
		
		$this->load->view('multilingual', $data);
	}
}
