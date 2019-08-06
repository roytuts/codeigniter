<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
	//header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Content-Type');
	exit;
}

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/*
 * @author https://www.roytuts.com
 */

class FileUploadRestController extends CI_Controller {
	
	use REST_Controller {
		REST_Controller::__construct as private __resTraitConstruct;
	}
	
	function __construct() {
        parent::__construct();
		$this->__resTraitConstruct();
    } 
	
	function upload_post() {
		if ($this->input->method()) {
			if(!$_FILES) {
				$this->response('Please choose a file', 500);
				return;
			}
			
			$upload_path = './uploads/';
			//file upload destination
			$config['upload_path'] = $upload_path;
			//allowed file types. * means all types
			$config['allowed_types'] = '*';
			//allowed max file size. 0 means unlimited file size
			$config['max_size'] = '0';
			//max file name size
			$config['max_filename'] = '255';
			//whether file name should be encrypted or not
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if (file_exists($upload_path . $_FILES['file']['name'])) {
				$this->response('File already exists => ' . $upload_path . $_FILES['file']['name']);
				return;
			} else {
				if (!file_exists($upload_path)) {
					mkdir($upload_path, 0777, true);
				}
				
				if($this->upload->do_upload('file')) {
					$this->response('File successfully uploaded => "' . $upload_path . $_FILES['file']['name']);
					return;
				} else {
					$this->response('Error during file upload => "' . $this->upload->display_errors(), 500);
					return;
				}
			}
		}
	}
	
}
