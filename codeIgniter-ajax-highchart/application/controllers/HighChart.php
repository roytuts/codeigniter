<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of HighChart
 *
 * @author https://roytuts.com
 */
class HighChart extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('highchartmodel', 'chart');
    }

    public function index() {
        $this->load->view('high_chart');
    }

    public function get_chart_data() {
        if (isset($_POST['start']) AND isset($_POST['end'])) {
            $start_date = $_POST['start'];
            $end_date = $_POST['end'];
            $results = $this->chart->get_chart_data($start_date, $end_date);
            if ($results === NULL) {
                echo json_encode('No record found');
            } else {
                $json = '[';
                $counter = 1;
                foreach ($results as $result) {
                    $json .= '[';
                    $json .= strtotime($result->temp_date);
                    $json .= ',';
                    $json .= $result->temp_min;
                    $json .= ',';
                    $json .= $result->temp_max;
                    $json .= ']';
                    if ($counter < count($results)) {
                        $json .= ',';
                    }
                    $counter++;
                }
                $json .= ']';
                echo $json;
            }
        } else {
            echo json_encode('Date must be selected.');
        }
    }

}

/* End of file HighChart.php */
/* Location: ./application/controllers/HighChart.php */