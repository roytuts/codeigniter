<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Description of Product
*
* @author https://www.roytuts.com
*/

class Product extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->model('product_model', 'pm');
    }

	public function index()	{
		$data['products'] = $this->pm->get_products();
		$this->load->view('products', $data);
	}
	
	public function delete_products() {
		if (isset($_POST['ids'])) {
			$ids = explode(',', $_POST['ids']);
			
			$results = $this->pm->delete_products_by_ids($ids);
			
			if ($results === TRUE) {
				echo '<span style="color:green;">Product(s) successfully deleted</span>';
			} else {
				echo '<span style="color:red;">Something went wrong during product deletion</span>';
			}
		} else {
			echo '<span style="color:red;">You must select at least one product for deletion</span>';
		}
	}
	
}

/* End of file product.php */
/* Location: ./application/controllers/product.php */