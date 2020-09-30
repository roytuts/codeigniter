<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of BlogModel
 *
 * @author https://www.roytuts.com
 */
class BlogModel extends CI_Model {

    private $blogs = 'blog';   // blog table

    function __construct() {
        parent::__construct();
    }

    //save new blog
    function save_new_blog($title, $content) {
        //Escaping Query
        $sql = "INSERT INTO " . $this->blogs . "(blog_title,blog_content,blog_date)"
                . " VALUES(" . $this->db->escape($title) . "," . $this->db->escape($content) .
                "," . $this->db->escape(date('Y-m-d H:i:s')) . ")";
        $this->db->query($sql);
        
        //Query Binding
        $sql = $sql = "INSERT INTO " . $this->blogs . "(blog_title,blog_content,blog_date)"
                . " VALUES(?,?,?)";
        $this->db->query($sql, array($title, $content, date('Y-m-d H:i:s')));
        
        //Active Record
        $data = array(
            'blog_title' => $title,
            'blog_content' => $content,
            'blog_date' => date('Y-m-d H:i:s')
        );		
        $this->db->insert($this->blogs, $data);
    }

}