<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	
/**
* Description of RandomRow_Model
*
* @author https://www.roytuts.com
*/

class RandomRow_Model extends CI_Model {
	
	private $celebrity = 'celebrity';

	function pickTodayCeleb() {
		$tdate = date('Y-m-d');
		$this->db->select('id, full_name, photo')->where('created_date', $tdate)->from($this->celebrity, 1);
		$res = $this->db->get();
			
		if($res->num_rows < 1) {
			return $this->pickRandomCeleb();
		}
			
		$data['celeb'] = $res->row_array();
			
		return $data;
	}
	
	function pickRandomCeleb() {
		//Find yesterdays entry and change to true
		$ydate = strtotime('yesterday');
		$ydate = date('Y-m-d', $ydate);
		$update = array('shown' => 1); 
		$this->db->where('created_date', $ydate);
		$this->db->update($this->celebrity, $update);
			
		//Find a random entry that hasn't already been shown
		$this->db->select('id, full_name, photo');
		$this->db->where('shown !=', TRUE);
		$res = $this->db->get($this->celebrity);
			
		if($res->num_rows < 1) {
			//all rows have been shown. Reset all shown values to false and run the randomizer again.
			$update = array('shown' => 0);
			$this->db->update('celebrity', $update);
				
			//Find a random entry that hasn't already been shown
			$this->db->select('id, full_name, photo');
			$this->db->where('shown !=', TRUE);//->from($this->celebrity);
			$res = $this->db->get($this->celebrity);
				
			$num_rows = $res->num_rows > 1 ? $res->num_rows : 1;
			$rand = mt_rand(0, $num_rows);
			$res = $res->result_array();
				
			$data['celeb'] = $res[$rand];
				
			$update = array('created_date' => date('Y-m-d'));
			$this->db->where('id', $data['celeb']['id']);
			$this->db->update($this->celebrity, $update);

			return $data;
		}
		
		$num_rows = $res->num_rows > 1 ? $res->num_rows : 1;
		$rand = mt_rand(0, $num_rows);
		$res = $res->result_array();
			
		$data['celeb'] = $res[$rand];
			
		$update = array('created_date' => date('Y-m-d'));
		$this->db->where('id', $data['celeb']['id']);
		$this->db->update($this->celebrity, $update);
			
		return $data;
	}

}