<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
* Author: https://www.roytuts.com
*/

class Item_Model extends CI_Model {
	
    private $items = 'items';
    
	function __construct() {        
    }
	
    function get_item_list($sort_by, $sort_order) {
        $sort_order = ($sort_order == 'DESC') ? 'DESC' : 'ASC';
		
        $sort_columns = array('item_name', 'item_desc', 'item_price');
        
		$sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'item_name';
		
        $sql = 'SELECT item_id, item_name, item_desc, item_price
            FROM ' . $this->items . ' ORDER BY ' . $sort_by . ' ' . $sort_order;
        
		$query = $this->db->query($sql);
        
		$result['item_list'] = $query->result();        
        
		return $result;
    }
	
}

/* End of file item_model.php */
/* Location: ./application/models/Item_Model.php */