<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Form_Validation extends CI_Form_validation {

    function run($module = '', $group = '') {
        (is_object($module)) AND $this->CI = &$module;
        return parent::run($group);
    }

}

/* End of file my_form_validation.php */
/* Location: ./application/libraries/my_form_validation.php */