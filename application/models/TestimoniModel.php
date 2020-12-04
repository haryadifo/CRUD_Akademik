<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TestimoniModel extends CI_Model {
	public function getListTestimoni(){
		$sql="SELECT * FROM testimoni";
		$res = $this->db->query($sql);
		return $res->result_array();
	}
	
}