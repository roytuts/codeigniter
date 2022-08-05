<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EventCalendar extends CI_Controller {
	
	function __construct() {
            parent::__construct();
            $this->load->model('eventcalendar_model', 'em');
        }

	public function index() {
		$this->load->view('calendar_event');
	}
	
	public function load_data() {
		$events = $this->em->get_event_list();
		if($events !== NULL) {
			echo json_encode(array('success' => 1, 'result' => $events));
		} else {
			echo json_encode(array('success' => 0, 'error' => 'Event not found'));
		}
	}
}
