<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EventCalendar_model extends CI_Model {

    private $event = 'event';
	
	function get_event_list() {
		$this->db->select("id, title, url, class, UNIX_TIMESTAMP(start_date)*1000 as start, UNIX_TIMESTAMP(end_date)*1000 as end");
        $query = $this->db->get($this->event);
        if ($query) {
            return $query->result();
        }
        return NULL;
    }

}