<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();
        // logic for template
        $this->template->set_template('admin');
    }

}

/* End of file Admin_Controller.php */
/* Location: ./application/core/Admin_Controller.php */