<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of HighChartModel
 *
 * @author https://roytuts.com
 */
class HighChartModel extends CI_Model {

    private $temperature = 'temperature';

    function __construct() {
        
    }

    function get_chart_data($start_date, $end_date) {
        $sql = 'SELECT * 
                FROM ' . $this->temperature . '
				WHERE DATE(temp_date)>=' . $this->db->escape($start_date) .
                ' AND DATE(temp_date)<=' . $this->db->escape($end_date);
        $query = $this->db->query($sql);
        $results = $query->result();
        return $results;
    }

}

/* End of file HighChartModel.php */
/* Location: ./application/models/HighChartModel.php */