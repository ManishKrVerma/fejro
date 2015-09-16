<?php

if (!defined('BASEPATH'))
    exit('Not A Valid Request');

class Messages_model extends CI_Model {
   	
	function allMessages(){
		$userId = $this->session->userdata('userID');
		$this->db->select(
						'fm.*,
						fuf.firstname as from_firstname,
						fuf.lastname as from_lastname,
						fut.firstname as to_firstname,
						fut.lastname as to_lastname
						');
		$this->db->from('fejiro_message as fm');
		$this->db->join('fejiro_users as fuf' ,'fm.message_from = fuf.user_id');
		$this->db->join('fejiro_users as fut' ,'fm.message_to = fut.user_id');
		$this->db->where('fm.parent_message','0');
		$this->db->where("(fm.message_from = '$userId' OR fm.message_to = '$userId' )");
		
		$res = $this->db->get();
		//echo $this->db->last_query();die;
		$arrData = $res->result_array();
		$index = 0;
		$data = array();
		foreach($arrData  as  $child){
			$parents = array();
			$childs = array();
			$merged = array();
			$parents[$index] = $child;
			if(isset($parents['dated'])){
				if($parents['dated'] < $child['date_time']){
					$parents['dated'] = $child['date_time'];
				}
			}else{
				$parents['dated'] = $child['date_time'];
			}
			
			$res = $this->get_hierarchy_messages($child['message_id'],$index);
			if($res)
				$childs = $res;
			$index++;
			$merged = array_merge($parents,$childs);
			$data[] = $merged;
		}
		
		$data = $this->sorted($data);
		echo "<pre>";
		print_r($data);die;
		/*if(isset($data))
			return $data;
		else
			return false;*/
	}
	
	function get_hierarchy_messages($parent_id=0,$index=0){
		$userId = $this->session->userdata('userID');
		$this->db->select(
						'fm.*,
						fuf.firstname as from_firstname,
						fuf.lastname as from_lastname,
						fut.firstname as to_firstname,
						fut.lastname as to_lastname
						');
		$this->db->from('fejiro_message as fm');
		$this->db->join('fejiro_users as fuf' ,'fm.message_from = fuf.user_id');
		$this->db->join('fejiro_users as fut' ,'fm.message_to = fut.user_id');
		$this->db->where('fm.parent_message',$parent_id);
		$this->db->where("(fm.message_from = '$userId' OR fm.message_to = '$userId' )");
		$res = $this->db->get();
		$arrData = $res->result_array();
		
		$parents = array();
		$childs = array();
		foreach($arrData  as  $child){
			$parents[++$index] = $child;
			if(isset($parents['dated'])){
				if($parents['dated'] < $child['date_time']){
					$parents['dated'] = $child['date_time'];
				}
			}else{
				$parents['dated'] = $child['date_time'];
			}
			$res = $this->get_hierarchy_messages($child['message_id'],++$index);
			if($res)
				$childs = $res;
			$index++;
		}
		
		$data = array_merge_recursive($parents,$childs);
		if(isset($data))
			return $data;
		else
			return false;
	}
	
	function bubble_sort($arr) {
		$size = count($arr);
		for ($i=0; $i<$size; $i++) {
			for ($j=0; $j<$size-1-$i; $j++) {
				if ($arr[$j+1]['dated'] > $arr[$j]['dated']) {
					$this->swap($arr, $j, $j+1);
				}
			}
		}
		return $arr;
	}

	function swap(&$arr, $a, $b) {
		$tmp = $arr[$a];
		$arr[$a] = $arr[$b];
		$arr[$b] = $tmp;
	}

	function sorted($results){
		$arr = $results;
		$results = $this->bubble_sort($arr);
		return $results;
	}
	
}
