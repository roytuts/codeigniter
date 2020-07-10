<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SPCRUD extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model('spcrud_model', 'spm');
    }

	public function index() {
		$data['users'] = $this->spm->get_user_list();
		$this->load->view('users', $data);
	}
	
	public function insert() {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required');
            $this->form_validation->set_rules('phone', 'Phone No.', 'trim|required');
            $this->form_validation->set_rules('address', 'Contact Address', 'trim|required');

            if ($this->form_validation->run() !== FALSE) {
                $result = $this->spm->insert_user($this->input->post('name'), $this->input->post('email'), $this->input->post('phone'), $this->input->post('address'));
                redirect('/');
            } else {
				$data['error'] = 'error occurred during saving data: all fields are required';
                $this->load->view('user_create', $data);
            }
        } else {
            $this->load->view('user_create');
        }
    }
	
	public function update($id) {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required');
            $this->form_validation->set_rules('phone', 'Phone No.', 'trim|required');
            $this->form_validation->set_rules('address', 'Contact Address', 'trim|required');

            if ($this->form_validation->run() !== FALSE) {
                $result = $this->spm->update_user($id, $this->input->post('name'), $this->input->post('email'), $this->input->post('phone'), $this->input->post('address'));
                redirect('/');
            } else {
				$data['error'] = 'error occurred during saving data: all fields are mandatory';
                $this->load->view('user_update', $data);
            }
        } else {
			$data['user'] = $this->spm->get_user($id);
            $this->load->view('user_update', $data);
        }
    }
	
	public function delete($id) {
        if ($id) {
            $this->spm->delete_user($id);
        }
		redirect('/');
    }
}