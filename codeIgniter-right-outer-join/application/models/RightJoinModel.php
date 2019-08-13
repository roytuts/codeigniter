<?php

/**
 * Description of RightJoinModel
 *
 * @author https://www.roytuts.com
 */
class RightJoinModel extends CI_Model {

    private $blogs = 'blogs';   // blog table
    private $blog_comments = 'blog_comments';   // blog comment table

    function __construct() {
        parent::__construct();
    }

    function right_outer_join() {
        $this->db->select($this->blogs . '.blog_id,comment_id,blog_title,blog_content,blog_date,comment_text,comment_date');
        $this->db->from($this->blogs);
        //third parameter indicates right outer join
        $this->db->join($this->blog_comments, $this->blog_comments . '.blog_id = ' . $this->blogs . '.blog_id', 'right outer');
        $query = $this->db->get();
        return $query->result();
    }

}