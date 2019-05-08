<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of site
 *
 * @author https://www.roytuts.com
 */
class Site extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->template->write('title', 'Welcome to Roy Tutorials', TRUE);
        /**
         * if you have any js to add for this page
         */
        //$this->template->add_js('assets/js/niceforms.js');
        /**
         * if you have any css to add for this page
         */
        $this->template->add_css('assets/css/page.css');
        $this->template->write_view('content', 'home', '', TRUE);
        $this->template->render();
    }

}

/* End of file site.php */
/* Location: ./application/modules/site/controllers/site.php */