<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
	
/**
* Description of Product_model
*
* @author https://roytuts.com
*/

class Product_model extends CI_Model {		

	private $product = 'product';

	function get_salesinfo() {
		$query = $this->db->get($this->product);

		if ($query->num_rows() > 0) {
			return $query->result();
		}
		
		return NULL;
	}
	
}

/* End of file product_model.php */
/* Location: ./application/models/product_model.php */