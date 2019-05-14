<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('mysql_to_php_date')) {

    function mysql_to_php_date($mysql_date) {
        $datetime = strtotime($mysql_date);
        $format = date("F j, Y, g:i a", $datetime);
        return $format;
    }

}