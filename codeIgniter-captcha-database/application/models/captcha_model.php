<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	
/**
* Description of Captcha_Model
*
* @author https://www.roytuts.com
*/

class Captcha_Model extends CI_Model {
	
	private $login = 'captcha';

	function _create_captcha($cap) {        
		// Save captcha params in database
        $data = array(
            'captcha_time' => $cap['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $cap['word']
        );
		
        $query = $this->db->insert_string('captcha', $data);
        $this->db->query($query);
        
		return $cap['image'];
    }

    function check_captcha($code) {
        // First, delete old captchas
        $expiration = time() - $this->config->item('captcha_expire'); // 3 mins limit
        
		$this->db->where('captcha_time < ', $expiration)->delete('captcha');
		
        // Then see if a captcha exists:
        $sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
        $binds = array($code, $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();
        
        return $row->count;
    }
	
}

/* End of file captcha_model.php */
/* Location: ./application/models/captcha_model.php */