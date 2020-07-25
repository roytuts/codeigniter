<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of User
 *
 * @author roytuts.com
 */
class UserModel extends CI_Model {

    function insert_user($name, $email, $phone, $address) {
        $insert_user_stored_proc = "CALL sp_insert_user(?, ?, ?, ?)";
        $data = array('name' => $name, 'email' => $email, 'phone' => $phone, 'address' => $address);
        $result = $this->db->query($insert_user_stored_proc, $data);
        if ($result !== NULL) {
            return TRUE;
        }
        return FALSE;
    }

}