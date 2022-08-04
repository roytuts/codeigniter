<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of cdcontroller
 *
 * @author https://roytuts.com
 */
class CdController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('cdmodel', 'cd');
    }

    function index() {
        $this->load->view('cds', NULL);
    }

    function cd_list() {
        $results = $this->cd->get_cd_list();
        echo json_encode($results);
    }

}

/* End of file cdcontroller.php */
/* Location: ./application/controllers/cdcontroller.php */
