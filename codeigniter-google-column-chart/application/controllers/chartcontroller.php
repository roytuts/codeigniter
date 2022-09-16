<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Blog
 *
 * @author https://roytuts.com
 */
class ChartController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('chartmodel', 'chart');
    }

    public function index() {
        $results = $this->chart->get_chart_data();
        $data['chart_data'] = $results['chart_data'];
        $data['min_year'] = $results['min_year'];
        $data['max_year'] = $results['max_year'];
        $this->load->view('column_chart', $data);
    }

}
