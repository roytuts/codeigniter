<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Benchmarking extends CI_Controller {

	public function index()	{
		
		/*$this->benchmark->mark('b_mark_start1');

		$a=5;
		$b=10;
		$c = $a * $b * 100000000000097987979879879798797790000000;
		
		$b=$b/$a/$a;
		
		for($i=1;$i<1000;$i++){
			for($j=1;$j<$i/2;$j++){
				if($j%2==0){
					break;
				}
			}
		}

		$this->benchmark->mark('b_mark_end1');*/

		$this->load->view('benchmarking');
		
	}
}
