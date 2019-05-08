<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of signin
 *
 * @author https://www.roytuts.com
 */
class Signin extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function index() {
        $data['title'] = 'Signin';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->template->write('title', 'Signin to Roy Tutorials', TRUE);
            /**
             * if you have any js to add for this page
             */
            //$this->template->add_js('assets/js/niceforms.js');
            /**
             * if you have any css to add for this page
             */
            $this->template->add_css('assets/css/page.css');
            $this->template->write_view('content', 'signin', '', TRUE);
            $this->template->render();
        } else {
            redirect();
        }
    }

}

/* End of file signin.php */
/* Location: ./application/modules/signin/controllers/signin.php */