<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	
/**
* Description of ProductModel
*
* @author https://www.roytuts.com
*/

class Product_Model extends CI_Model {
	
	private $product = 'product';

	function get_products() {		
		$query = $this->db->get($this->product);
		
		if($query->result()) {
			return $query->result();
		}
		
		return NULL;
	}
	
	function delete_products_by_ids($ids) {
		$this->db->where_in('id', $ids);
		
		if($this->db->delete($this->product)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
}

/* End of file product_model.php */
/* Location: ./application/models/product_model.php */