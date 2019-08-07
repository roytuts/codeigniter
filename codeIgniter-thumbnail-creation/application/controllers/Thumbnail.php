<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thumbnail extends CI_Controller {

	//variable for storing error message
    private $error;
	
    //variable for storing success message
    private $success;
	
    function __construct() {
        parent::__construct();
        //load this to validate the inputs in upload form
        $this->load->library('form_validation');
    }
	
    //appends all error messages
    private function handle_error($err) {
        $this->error .= nl2br($err . "\r\n");
    }
	
    //appends all success messages
    private function handle_success($succ) {
        $this->success .= nl2br($succ . "\r\n");
    }
	
    //file upload action
    public function index() {
        //check whether submit button was clicked or not
        if ($this->input->post('file_upload')) {
            //set preferences
            
            //file upload destination
            $config['upload_path'] = './upload/';
            //allowed file types. * means all types
            $config['allowed_types'] = 'gif|jpg|png';
            //allowed max file size. 0 means unlimited file size
            $config['max_size'] = '0';
            //max file name size
            $config['max_filename'] = '255';
            //whether file name should be encrypted or not
            $config['encrypt_name'] = TRUE;
            
            //thumbnail path
            $thumb_path = './upload/thumb/';
            //store file info once uploaded
            $file_data = array();
            //check for errors
            $is_file_error = FALSE;
            //check if file was selected for upload
            if (!$_FILES) {
                $is_file_error = TRUE;
                $this->handle_error('Select at least one file.');
            }
            //if file was selected then proceed to upload
            if (!$is_file_error) {
                //load the preferences
                $this->load->library('upload', $config);
                //check file successfully uploaded. 'file_name' is the name of the input
                if (!$this->upload->do_upload('file_name')) {
                    //if file upload failed then catch the errors
                    $this->handle_error($this->upload->display_errors());
                    $is_file_error = TRUE;
                } else {
                    //store the file info
                    $file_data = $this->upload->data();
                    if (!is_file($thumb_path . $file_data['file_name'])) {
                        $config = array(
                            'source_image' => $file_data['full_path'], //get original image
                            'new_image' => $thumb_path,
                            'maintain_ratio' => true,
                            'width' => 150,
                            'height' => 100
                        );
                        $this->load->library('image_lib', $config); //load library
                        $this->image_lib->resize(); //do whatever specified in config
                    }
                }
            }
            // There were errors, we have to delete the uploaded files
            if ($is_file_error) {
                if ($file_data) {
                    $file = './upload/' . $file_data['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                    $thumb = $thumb_path . $file_data['file_name'];
                    if ($thumb) {
                        unlink($thumb);
                    }
                }
            } else {
                $this->handle_success('File was successfully uploaded and thumbnail created.');
            }
        }
        
        //load the error and success messages
        $data['errors'] = $this->error;
        $data['success'] = $this->success;
        //load the view along with data
        $this->load->view('file_upload', $data);
    }
}
/* End of file Thumbnail.php */
/* Location: ./application/controllers/Thumbnail.php */
