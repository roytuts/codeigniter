<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of AuthLibrary
 *
 * @author https://www.roytuts.com
 */
class AuthLibrary {

    private $ci;
    private $msg;

    function __construct() {
        $this->ci = & get_instance();
		$this->ci->load->model('authmodel');
    }

    /*
     * get message
     */

    private function get_msg($msg) {
        $this->msg .= $msg . nl2br("\n");
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
     * @param	string	(username)
     * @param	string  (password)
     */
    function login($username, $password) {
        if ((strlen($username) > 0) AND (strlen($password) > 0)) {
			$user = $this->ci->authmodel->get_user($username, $password);
			
            if ($user !== NULL) {
				$this->ci->session->set_userdata(array(
					'user_name' => $user->username,
					'last_login' => $user->last_login
				));
                return TRUE;
            } else {
                $this->get_msg('Incorrect username or password');
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
        $this->ci->session->set_userdata(array('user_name' => '', 'last_login' => ''));
		//$this->ci->session->unset_userdata('user_name');
		//$this->ci->session->unset_userdata('last_login');
        $this->ci->session->sess_destroy();
    }

    /**
     * Check if user logged in. Also test if user is activated or not.
     *
     * @param	bool
     * @return	bool
     */
    function is_logged_in() {
        if($this->ci->session->userdata('user_name') && ($this->ci->session->userdata('user_name') !== NULL || $this->ci->session->userdata('user_name') !== '')) {
			return TRUE;
		}
		
		return FALSE;
    }

    /**
     * Get user_name
     *
     * @return	string
     */
    function get_username() {
        if ($this->ci->session->userdata('user_name')) {
            return $this->ci->session->userdata('user_name');
        }
        return '';
    }

    /**
     * Get error message.
     * Can be invoked after any failed operation such as login.
     *
     * @return	string
     */
    function get_error_message() {
        return $this->msg;
    }

}

/* End of file authlibrary.php */
/* Location: ./application/libraries/authlibrary.php */