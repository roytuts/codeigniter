<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of category
 *
 * @author https://roytuts.com
 */
class Category extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('categorymodel', 'cat');
    }

    function index() {
        $data['categories'] = $this->cat->category_menu();
        $this->load->view('category', $data);
    }

}

/* End of file category.php */
/* Location: ./application/controllers/category.php */
