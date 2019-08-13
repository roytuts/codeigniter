<?php

/**
 * Description of LeftJoinModel
 *
 * @author https://www.roytuts.com
 */
class LeftJoinModel extends CI_Model {

    private $blogs = 'blogs';   // blog table
    private $blog_comments = 'blog_comments';   // blog comment table

    function __construct() {
        parent::__construct();
    }

    function left_outer_join() {
        $this->db->select($this->blogs . '.blog_id,comment_id,blog_title,blog_content,blog_date,comment_text,comment_date');
        $this->db->from($this->blogs);
        //third parameter indicates left outer join
        $this->db->join($this->blog_comments, $this->blog_comments . '.blog_id = ' . $this->blogs . '.blog_id', 'left outer');
        $query = $this->db->get();
        return $query->result();
    }

}