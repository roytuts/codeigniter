<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Site_Config
 *
 * @author https://roytuts.com
 */
class Site_Config {

    /**
     * dynamically generate year dropdown
     * @param int $startYear start year
     * @param int $endYear end year
     * @param string $id id of the select-option
     * @return html
     */
    function generate_years($id = 'year', $startYear = '', $endYear = '') {
        $startYear = (strlen(trim($startYear)) ? $startYear : date('Y') - 10);
        $endYear = (strlen(trim($endYear)) ? $endYear : date('Y'));

        if (!$this->holds_int($startYear) || !$this->holds_int($endYear)) {
            return 'Year must be integer value!';
        }

        if ((strlen(trim($startYear)) < 4) || (strlen(trim($endYear)) < 4)) {
            return 'Year must be 4 digits in length!';
        }

        if (trim($startYear) > trim($endYear)) {
            return 'Start Year cannot be greater than End Year!';
        }

        //start the select tag
        $html = '<select id="' . $id . '" name="' . $id . '">"n"';
        $html .= '<option value="">-- Year --</option>"n"';
        //echo each year as an option    
        for ($i = $endYear; $i >= $startYear; $i--) {
            $html .= '<option value="' . $i . '">' . $i . '</option>"n"';
        }
        //close the select tag
        $html .= "</select>";

        return $html;
    }

    /**
     * dynamically generate months dropdown
     * @param string $id id of the select-option
     * @return html
     */
    function generate_months($id = 'month') {
        //start the select tag
        $html = '<select id="' . $id . '" name="' . $id . '">"n"';
        $html .= '<option value="">-- Month --</option>"n"';
        //echo each month as an option    
        for ($i = 1; $i <= 12; $i++) {
            $timestamp = mktime(0, 0, 0, $i);
            $label = date("F", $timestamp);
            $html .= '<option value="' . $i . '">' . $label . '</option>"n"';
        }
        //close the select tag
        $html .= "</select>";

        return $html;
    }

    private function holds_int($str) {
        return preg_match("/^[1-9][0-9]*$/", $str);
    }

}

/* End of file Site_Config.php */
/* Location: ./application/libraries/Site_Config.php */