<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Blog
 *
 * @author https://www.roytuts.com
 */
class Blog extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('blogmodel');
        $this->load->library('form_validation');
    }

    public function index() {
        $data = array();
        if ($this->input->post('add_blog')) {
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('content', 'Content', 'required');
            if ($this->form_validation->run()) {
                $title = $this->input->post('title');
                $content = $this->input->post('content');
                $result = $this->blogmodel->save_new_blog($title, $content);
                $data['success'] = 'Blog successfully added';
            }
        }
        $this->load->view('add_blog', $data);
    }

}
