<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Pagination_Model
 *
 * @author https://www.roytuts.com
 */
class Pagination_Model extends CI_Model {

    private $blogs = 'blogs';   // blog table

    function __construct() {
        parent::__construct();
    }

    //fetch blogs
    function get_blogs($limit, $offset) {
		
        if ($offset > 0) {
            $offset = ($offset - 1) * $limit;
        }
		
        $result['rows'] = $this->db->get($this->blogs, $limit, $offset);
        $result['num_rows'] = $this->db->count_all_results($this->blogs);
		
        return $result;
    }

}