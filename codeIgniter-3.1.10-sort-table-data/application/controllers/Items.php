<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Author: https://www.roytuts.com
*/

class Items extends CI_Controller {
    
	function __construct() {
        parent::__construct();
		
        $this->load->model('item_model', 'item');
    }
    
	public function index() {
        redirect('items/item_list');
    }
    
	function item_list($sort_by = 'item_name', $sort_order = 'ASC') {
        $results = $this->item->get_item_list($sort_by, $sort_order);
        
		$data['item_list'] = $results['item_list'];
        $data['sort_by'] = $sort_by;
        $data['sort_order'] = $sort_order;
        
		$this->load->view('items', $data);
    }
}

/* End of file items.php */
/* Location: ./application/controllers/Items.php */