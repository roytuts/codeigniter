<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

define('STATUS_ACTIVATED', '1');
define('STATUS_NOT_ACTIVATED', '0');

/**
 * Description of UserAuth
 *
 * @author Admin
 */
class UserAuth {

    private $ci;
    private $msg;

    function __construct() {
        $this->ci = & get_instance();
        $this->ci->lang->load('msg');
    }

    /*
     * get message
     */

    private function get_msg($msg) {
        $this->msg .= $msg . "\r\n";
    }

    /*
     * display message
     */

    function display_msg() {
        return $this->msg;
    }

    /**
     * Login user on the site. Return TRUE if login is successful
     * (user exists and activated, password is correct), otherwise FALSE.
     *
     * @param	string	(email)
     * @param	string  (password)
     */
    function login($email, $password) {
        if ((strlen($email) > 0) AND (strlen($password) > 0)) {
            if ($email == 'admin@roytuts.com') { // email ok --should be checked against database
                if ($password == 'admin') {  // password ok //should be checked against database
                        $this->ci->session->set_userdata(array(
                            'user_id' => 1, //should come from database
                            'user_email' => 'admin@roytuts.com', //should come from database
                            'last_login' => '2015-05-05 12:00:25', //should come from database
                            'user_role' => 'admin', //should come from database
                            'user_status' => STATUS_ACTIVATED //should be checked against database
                        ));
                    return TRUE;
                } else {              // fail - wrong password
                    $this->get_msg($this->ci->lang->line('incorrect_password'));
                }
            } else {               // fail - wrong email
                $this->get_msg($this->ci->lang->line('incorrect_email'));
            }
        }
        return FALSE;
    }

    /**
     * Logout user from the site
     *
     * @return	void
     */
    function logout() {
        // See http://codeigniter.com/forums/viewreply/662369/ as the reason for the next line
        $this->ci->session->set_userdata(array('user_id' => '', 'user_email' => '', 'last_login' => '',
            'user_role' => '', 'user_status' => ''));
        $this->ci->session->sess_destroy();
    }

    /**
     * Get user role_id
     *
     * @param int
     * @return int
     */
    function get_role_id($user_id = 1) {
        return 1; //should come from database
    }

    /**
     * Check if user logged in. Also test if user is activated or not.
     *
     * @param	bool
     * @return	bool
     */
    function is_logged_in($activated = TRUE) {
        return $this->ci->session->userdata('user_status') === ($activated ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED);
    }

    /**
     * Get role name from role_id
     *
     * @param	string
     * @param	integer
     */
    function get_role_name($role_id = 1) {
        if ($role_id > 0) {
            return 'admin'; //should come from database
        }
        return '';
    }

    /**
     * Get user_id
     *
     * @return	string
     */
    function get_user_id() {
        if ($this->ci->session->userdata('user_id')) {
            return $this->ci->session->userdata('user_id');
        }
        return -1;
    }

    /**
     * Get username
     *
     * @return	string
     */
    function get_user_email() {
        if ($this->ci->session->userdata('user_email')) {
            return $this->ci->session->userdata('user_email');
        }
        return '';
    }

    /**
     * check logged in user is admin
     *
     * @param	string
     * @return	bool
     */
    function is_admin() {
        if ($this->ci->session->userdata('user_role')) {
            if (strtolower(trim($this->ci->session->userdata('user_role'))) === 'admin') {
                return TRUE;
            }
        }
        return FALSE;
    }

    /**
     * Get error message.
     * Can be invoked after any failed operation such as login or register.
     *
     * @return	string
     */
    function get_error_message() {
        return $this->msg;
    }

}

/* End of file userAuth.php */
/* Location: ./application/libraries/userauth.php */