<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of tagmodel
 *
 * @author https://www.roytuts.com
 */
class TagModel extends CI_Model {

    private $tag = 'tag';

    function __construct() {
        
    }

    function add_tags($tags) {
        if (!empty($tags)) {
            foreach ($tags as $tag) {
                $tag_array = array('tag_name' => $tag);
                $this->db->insert($this->tag, $tag_array);
            }
            return TRUE;
        }
        return NULL;
    }

}