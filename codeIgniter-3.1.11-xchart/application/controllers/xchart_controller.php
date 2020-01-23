<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class XChart_controller extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->model('xchart_model');
		$this->load->library('form_validation');
	}

	public function index() {
		$this->load->view('xchart');
	}

	function get_chart_data() {
		if (isset($_POST['start']) AND isset($_POST['end'])) {
			$start_date = $_POST['start'];
			$end_date = $_POST['end'];
			
			$results = $this->xchart_model->get_chart_data_for_visits($start_date, $end_date);
			
			if ($results === NULL) {
				echo json_encode('No record found');
			} else {
				echo json_encode($results);
			}
		} else {
			echo json_encode('You must select date');
		}
	}
}
