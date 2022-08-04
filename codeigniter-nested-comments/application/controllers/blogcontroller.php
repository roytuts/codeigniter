<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of blogcontroller
 *
 * @author https://roytuts.com
 */
class BlogController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('blogmodel', 'blog');
    }
	
    function blog_details() {
        $data['blog_detail'] = $this->blog->get_blog_detail('test-blog'); //blog slug should not be hardcoded
        $data['blog_comments'] = $this->blog->get_blog_comments('test-blog'); //blog slug should not be hardcoded
        $this->load->view('blog_details', $data);
    }

    function add_blog_comment() {
        if (isset($_POST) && isset($_POST['comment_text'])) {
            $blog_id = $_POST['content_id'];
            $parent_id = $_POST['reply_id'];
            $comment_text = $_POST['comment_text'];
            $data = array(
                'comment_text' => $comment_text,
                'parent_id' => $parent_id,
                'comment_date' => date('Y-m-d h:i:sa'),
                'blog_id' => $blog_id
            );
            $resp = $this->blog->add_blog_comment($data);
            if ($resp != NULL) {
                foreach ($resp as $row) {
                    $date = mysql_to_php_date($row->comment_date);
                    echo "<li id=\"li_comment_{$row->comment_id}\">" .
                    "<div><span class=\"comment_date\">{$date}</span></div>" .
                    "<div style=\"margin-top:4px;\">{$row->comment_text}</div>" .
                    "<a href=\"#\" class=\"reply_button\" id=\"{$row->comment_id}\">reply</a>" .
                    "</li>";
                }
            } else {
                echo 'Error in adding comment';
            }
        } else {
            echo 'Error: Please enter your comment';
        }
    }

}

/* End of file category.php */
/* Location: ./application/controllers/category.php */
