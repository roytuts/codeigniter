<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of admin
 *
 * @author Admin
 */
class Admin extends Admin_Controller {

    private $msg;

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    private function display_msg($msg) {
        $this->msg .= $msg . "\r\n";
    }

    function index() {
        if (!$this->userauth->is_logged_in() && !$this->userauth->is_admin()) {
            redirect('admin/login');
        }
        $this->template->write('title', 'Dashboard');
        $this->template->write_view('content', 'admin/dashboard', NULL, TRUE);
        $this->template->render();
    }

    function login() {
        if ($this->userauth->is_logged_in() && $this->userauth->is_admin()) {
            redirect('admin');
        }
        if ($this->input->post('login')) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[100]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[25]|xss_clean');
            if ($this->form_validation->run()) {        // validation ok
                $password = $this->input->post('password');
                if ($this->userauth->login($email, $password)) {        // success
                    $this->session->set_flashdata($this->config->item('msg_key'), 'You have successfully logged in.');
                    $this->session->keep_flashdata($this->config->item('msg_key'));
                    redirect('admin');
                } else {
                    $errors = $this->userauth->get_error_message();
                    $this->display_msg($errors);
                }
            }
        }
        $data['errors'] = $this->msg;
        $data['msg'] = '';
        if ($message = $this->session->flashdata($this->config->item('msg_key'))) {
            $data['msg'] = $message;
        }
        $this->load->view('admin/login', $data);
    }

    function logout() {
        if ($this->userauth->is_logged_in() && $this->userauth->is_admin()) {
            $this->userauth->logout();
            $this->session->sess_create();
            $this->session->set_flashdata($this->config->item('msg_key'), 'You have successfully logged out.');
            $this->session->keep_flashdata($this->config->item('msg_key'));
        }
        redirect('admin/login');
    }

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */