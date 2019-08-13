<?php

/**
 * Description of FullJoinModel
 *
 * @author https://www.roytuts.com
 */
class FullJoinModel extends CI_Model {

    private $blogs = 'blogs';   // blog table
    private $blog_comments = 'blog_comments';   // blog comment table

    function __construct() {
        parent::__construct();
    }

    function full_outer_join() {
        $sql = 'SELECT ' . $this->blogs . '.blog_id,comment_id,blog_title,blog_content,blog_date,comment_text,comment_date
                FROM ' . $this->blogs . ' LEFT OUTER JOIN ' . $this->blog_comments . ' ON ' . $this->blog_comments . '.blog_id = ' . $this->blogs . '.blog_id
                    UNION
                SELECT ' . $this->blogs . '.blog_id,comment_id,blog_title,blog_content,blog_date,comment_text,comment_date
                FROM ' . $this->blogs . ' RIGHT OUTER JOIN ' . $this->blog_comments . ' ON ' . $this->blog_comments . '.blog_id = ' . $this->blogs . '.blog_id';
        $query = $this->db->query($sql);
        return $query->result();
    }

}