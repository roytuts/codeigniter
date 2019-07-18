<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of AuthController
 *
 * @author https://www.roytuts.com
 */

class AuthController extends CI_Controller {

	private $msg;
	
    function __construct() {
        parent::__construct();
		$this->lang->load('msg');
		$this->load->library('authlibrary');
        $this->load->library('form_validation');
    }
	
    private function display_msg($msg) {
        $this->msg .= $msg . nl2br("\n");
    }
	
	function index() {
		//$this->load->view('home');
		if (!$this->authlibrary->is_logged_in()) {
            redirect('authcontroller/login');
        } else {
			$this->load->view('home');
		}
	}
	
	function login() {
        if ($this->input->post('login')) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[25]|xss_clean');
            if ($this->form_validation->run()) {        // validation ok
				$username = $this->input->post('password');
                $password = $this->input->post('password');
                if ($this->authlibrary->login($username, $password)) {        // success
                    $this->session->set_flashdata($this->config->item('msg_key'), $this->lang->line('login_success'));
                    $this->session->keep_flashdata($this->config->item('msg_key'));
                    redirect('/');
                } else {
                    $errors = $this->authlibrary->get_error_message();
                    $this->display_msg($errors);
                }
            }
        }
        $data['errors'] = $this->msg;
        $data['msg'] = '';
        if ($message = $this->session->flashdata($this->config->item('msg_key'))) {
            $data['msg'] = $message;
        }
        $this->load->view('login', $data);
    }
	
    function logout() {
        if ($this->authlibrary->is_logged_in()) {
            $this->authlibrary->logout();
            $this->session->set_flashdata($this->config->item('msg_key'), $this->lang->line('logout_success'));
            $this->session->keep_flashdata($this->config->item('msg_key'));
        }
        redirect('authcontroller/login');
    }
}
