<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of home
 *
 * @author Admin
 */
class Home extends Public_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->template->write('title', 'Home Page', TRUE);
        $this->template->write_view('content', 'home', NULL, TRUE);
        $this->template->render();
    }

}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/home.php */