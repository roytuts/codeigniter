<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PhotoGallery extends CI_Controller {

	public function index()	{
		$this->load->helper('url');
		$this->load->helper('directory');
		$this->load->view('photo_gallery');
	}
}
