<?php

if (!defined('BASEPATH'))
    exit('Not A Valid Request');

class Comman_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('string');
    }
	
	function get_all_category() {
		$this->db->from('fejiro_item');	
		$res = $this->db->get();
		$data = $res->result_array();
		$return = array();
		foreach($data as $item){
			$categories = explode(',',$item['item_genre']);
			foreach($categories as $category){
				if(!in_array($category,$return)){
					$return[] = $category;
				}
			}
		}
		return $return;
	 }
		
}
