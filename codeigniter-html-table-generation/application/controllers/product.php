<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
* Description of product
*
* @author https://roytuts.com
*/

class Product extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('product_model');
	}
	
	public function index() {
		$data['salesinfo'] = $this->product_model->get_salesinfo();
		$this->load->view('salesinfo', $data);
	}
	
}

/* End of file product.php */
/* Location: ./application/controllers/product.php */