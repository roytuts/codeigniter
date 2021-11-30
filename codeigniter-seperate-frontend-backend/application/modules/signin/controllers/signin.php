<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of signin
 *
 * @author roytuts.com
 */
class Signin extends Public_Controller {

    private $error;

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    private function handle_error($err) {
        $this->error .= $err . "\r\n";
    }

    public function index() {
        if ($this->session->flashdata($this->config->item('msg_key'))) {
            $this->session->keep_flashdata($this->config->item('msg_key'));
            redirect('message');
        } else {
            if ($this->userauth->is_logged_in()) {         // logged in
                redirect('home');
            } else {
                $data['errors'] = array();
                if ($this->input->post('signin')) {
                    //$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[100]|xss_clean'); //codeigniter 3.1.10
                    //$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[20]|xss_clean'); //codeigniter 3.1.10
					$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[100]'); //codeigniter 3.1.11
                    $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[20]'); //codeigniter 3.1.11
                    if ($this->form_validation->run($this)) {        // validation ok
                        $password = $this->input->post('password');
                        $email = $this->input->post('email');
                        if ($this->userauth->login($email, $password)) {        // success
                            $this->session->set_flashdata($this->config->item('msg_key'), 'You have successfully logged in.');
                            redirect('home');
                        } else {
                            $errors = $this->userauth->get_error_message();
                            $this->handle_error($errors);
                        }
                    }
                }
                $data['errors'] = $this->error;
                $this->template->write('title', 'Login to Your Account', TRUE);
                $this->template->write_view('content', 'signin', $data, TRUE);
                $this->template->render();
            }
        }
    }

    /**
     * Logout user
     *
     * @return void
     */
    function logout() {
        if ($this->userauth->is_logged_in()) {
            $this->userauth->logout();
            $this->session->sess_create();
            $this->session->set_flashdata($this->config->item('msg_key'), 'You have been successfully logged out.');
            redirect('signin');
        } else {
            if ($this->userauth->is_logged_in()) {
                redirect('home');
            } else {
                redirect('signin');
            }
        }
    }

}

/* End of file signin.php */
/* Location: ./application/modules/signin/controllers/signin.php */