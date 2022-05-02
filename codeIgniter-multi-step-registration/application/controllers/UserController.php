<?php

/**
 * Description of UserController
 *
 * @author https://roytuts.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('usermodel');
    }

    public function index() {
        if ($this->input->post('finish')) {
            $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required');
            $this->form_validation->set_rules('phone', 'Phone No.', 'trim|required');
            $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
            $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
            $this->form_validation->set_rules('address', 'Contact Address', 'trim|required');

            if ($this->form_validation->run() !== FALSE) {
                $result = $this->usermodel->insert_user($this->input->post('name'), $this->input->post('password'), $this->input->post('email'), $this->input->post('phone'), $this->input->post('gender'), $this->input->post('dob'), $this->input->post('address'));
                $data['success'] = $result;
                $this->load->view('user', $data);
            } else {
                $this->load->view('user');
            }
        } else {
            $this->load->view('user');
        }
    }

}
