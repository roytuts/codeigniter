<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of message
 *
 * @author roytuts.com
 */
class Message extends Public_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if ($message = $this->session->flashdata($this->config->item('msg_key'))) {
            $data['msg'] = $message;
            $this->template->write('title', 'Message', TRUE);
            $this->template->write_view('content', 'message', $data, TRUE);
            $this->template->render();
        } else {
            redirect(site_url());
        }
    }

}

/* End of file message.php */
/* Location: ./application/modules/message/controllers/message.php */