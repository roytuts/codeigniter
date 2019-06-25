<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of TagController
 *
 * @author https://www.roytuts.com
 */
class TagController extends CI_Controller {

    private $error;
    private $success;

    function __construct() {
        parent::__construct();
        $this->load->model('tagmodel', 'tag');
        $this->load->library('form_validation');
    }

    private function handle_error($msg) {
        $this->error .= '<p>' . $msg . '</p>';
    }

    private function handle_success($msg) {
        $this->success .= '<p>' . $msg . '</p>';
    }

    function index() {
        if ($this->input->post('add_tags')) {
            $this->form_validation->set_rules('tags', 'Tags', 'trim|required');

            $tags = $this->input->post('tags', TRUE);

            $related_tags = '';
            if (is_array(str_split($tags)) && count(str_split($tags)) > 2) {
                $tags = $this->format_tags_keywords($tags);
                $related_tags = explode(',', $tags);
            } else {
                $this->handle_error('Enter Tags');
            }


            if ($this->form_validation->run($this)) {
                $resp = $this->tag->add_tags($related_tags);
                if ($resp === TRUE) {
                    $this->handle_success('Tags are added successfully');
                }
            }

            $data['tags'] = $related_tags;
        }

        $data['errors'] = $this->error;
        $data['success'] = $this->success;
        $this->load->view('tag', $data);
    }


    private function format_tags_keywords($string) {
        preg_match_all('`(?:[^,"]|"((?<=\\\\)"|[^"])*")*`x', $string, $result);

        $tags = '';

		if (is_array($result) || is_object($result)) {
			foreach ($result as $arr) {
				$i = 0;
				foreach ($arr as $val) {
					if ($i % 2 == 1) {
						$i++;
						continue;
					}
					$tags .= $val . ',';
					$i++;
				}

				$tags = str_replace('[', '', $tags);
				$tags = str_replace(']', '', $tags);
				$tags = rtrim($tags, ',');
				$tags = str_replace('"', '', $tags);
				
				break;
			}
		}

        return $tags;
    }

}