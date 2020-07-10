<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SPCRUD_model extends CI_Model {

    private $table_user = 'user';
	
	function get_user_list() {
		$sp_read_users = "CALL sp_read_users()";
        $query = $this->db->query($sp_read_users);
        if ($query) {
            return $query->result();
        }
        return NULL;
    }
	
	function get_user($id) {
		$sp_read_user = "CALL sp_read_user(?)";
		$data = array('id' => $id);
        $query = $this->db->query($sp_read_user, $data);
        if ($query) {
            return $query->row();
        }
        return NULL;
    }
	
	function insert_user($name, $email, $phone, $address) {
		$sp_insert_user = "CALL sp_insert_user(?, ?, ?, ?)";
        $data = array('name' => $name, 'email' => $email, 'phone' => $phone, 'address' => $address);
        $result = $this->db->query($sp_insert_user, $data);
        if ($result) {
            return $result;
        }
        return NULL;
    }
	
	function update_user($id, $name, $email, $phone, $address) {
		$sp_update_user = "CALL sp_update_user(?, ?, ?, ?, ?)";
        $data = array('id' => $id, 'name' => $name, 'email' => $email, 'phone' => $phone, 'address' => $address);
        $result = $this->db->query($sp_update_user, $data);
        if ($result) {
            return $result;
        }
        return NULL;
    }
	
	function delete_user($id) {
		$sp_delete_user = "CALL sp_delete_user(?)";
        $data = array('id' => $id);
        $result = $this->db->query($sp_delete_user, $data);
        if ($result) {
            return $result;
        }
        return NULL;
    }

}