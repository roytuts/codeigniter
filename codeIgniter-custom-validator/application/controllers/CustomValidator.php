<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomValidator extends CI_Controller {
	
	function __construct() {
        parent::__construct();
    }

	function index() {
		
		if ($this->input->post('verify')) {
			$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required|max_length[10]|callback_is_start_date_valid');
			
			if ($this->form_validation->run()) { //validation ok
				//process your business
				//for testing purpose only
				$data['msg'] = 'Validation passed!';
				$this->load->view('date', $data);
			} else {
				$this->load->view('date');
			}
		} else {		
			$this->load->view('date');
		}
	}
	
	function is_start_date_valid($date) {

		if (date('Y-m-d', strtotime($date)) == $date) {
			return TRUE;
		} else {
			$this->form_validation->set_message('is_start_date_valid', 'The {field} must be in format "yyyy-mm-dd"');
			return FALSE;
		}
		
	}
	
}
