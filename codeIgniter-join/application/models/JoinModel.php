<?php

/**
 * Description of JoinModel
 *
 * @author https://www.roytuts.com
 */
class JoinModel extends CI_Model {

    private $blogs = 'blogs';   // blog table
    private $blog_comments = 'blog_comments';   // blog comment table

    function __construct() {
        parent::__construct();
    }

    function join() {
        // Produces:
        // SELECT * FROM blogs JOIN blog_comments ON blog_comments.blog_id = blogs.blog_id
        //$this->db->select('*');
        //$this->db->from($this->blogs);
        //$this->db->join($this->blog_comments, $this->blog_comments . 'blog_id = ' . $this->blogs . 'blog_id');
        //or
        //$this->db->join($this->blog_comments, $this->blog_comments . 'blog_id = ' . $this->blogs . 'blog_id', 'inner');
        //$query = $this->db->get();
        
        // Produces:
        // SELECT blogs.blog_id,comment_id,blog_title,blog_content,blog_date,comment_text,comment_date
        //    FROM blogs JOIN blog_comments ON blog_comments.blog_id = blogs.blog_id
        $this->db->select($this->blogs . '.blog_id,comment_id,blog_title,blog_content,blog_date,comment_text,comment_date');
        $this->db->from($this->blogs);
        $this->db->join($this->blog_comments, $this->blog_comments . '.blog_id = ' . $this->blogs . '.blog_id');
        //or
        //$this->db->join($this->blog_comments, $this->blog_comments . 'blog_id = ' . $this->blogs . 'blog_id', 'inner');
        $query = $this->db->get();
        return $query->result();
    }

}