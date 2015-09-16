<?php

if (!defined('BASEPATH'))
    exit('Not A Valid Request');

class Search_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('string');
    }
	
	 public function get_user_cart_info() {
		$this->db->from('fejiro_cart');
		$this->db->where(array('status' => 'active'));
		$this->db->where(array('user_id' => $this->session->userdata('userID')));
		$db_result = $this->db->get();
		if ($db_result && $db_result->num_rows() > 0) {
			$data = array();
			$data_value = array();
			
			foreach ($db_result->result() as $row) {
				if (!array_key_exists($row->cart_id, $data)) {
                    $data[$row->cart_id] = array();
				}
                if (array_key_exists($row->cart_id, $data)) {
                    $data[$row->cart_id] = array(
						'cart_id' => $row->cart_id,
						'beat_id' => $row->beat_id,
						'beat_name' => $row->beat_name,
						'beat_price' => (double)$row->beat_price,
						'user_id' => $row->user_id,
					);
                    array_push($data_value, $data[$row->cart_id]);
                }
            }			
            return $data_value;
        } else {
				return FALSE;
			}
	 }
	 /** =========================================================
	  * This function is used to get list of all beat by there category
	  */
	 public function get_detail_of_beat_by_beat_search($beat_cat,$beat) {
		$this->db->from('fejiro_item');
		$this->db->where(array('status' => 'active'));
		if($beat_cat == 'new_arrivals'){
		
		}else{
			$this->db->like(array('item_genre' => $beat_cat));
		}
		if($beat){
			$this->db->like('item_name',$beat,'both');
		}
		$db_result = $this->db->get();
		if ($db_result && $db_result->num_rows() > 0) {
			$data = array();
			$data_value = array();
			
			foreach ($db_result->result() as $row) {
				if (!array_key_exists($row->item_id, $data)) {
                    $data[$row->item_id] = array();
				}
                if (array_key_exists($row->item_id, $data)) {
                    $data[$row->item_id] = array(
						'item_id' => $row->item_id,
						'item_name' => $row->item_name,
						'item_image'=> $row->item_image,
						'status' => $row->status,
						'item_genre' => $row->item_genre,
                        'item_description' =>$row->item_description,
                        'item_price' => $row->item_price,
						'beat0_duration' => $row->beat0_duration,
						'item_sample1_name' => $row->item_sample1_name,
						'item_music_name' => $row->item_music_name,
						'item_sample1_new_name' => $row->item_sample1_new_name,
                        'feature_type'=> $row->feature_type,
					);
                    array_push($data_value, $data[$row->item_id]);
                }
            }
            return $data_value;
        } else {
				return FALSE;
			}
	 }
	
}