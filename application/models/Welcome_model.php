<?php

if (!defined('BASEPATH'))
    exit('Not A Valid Request');

class Welcome_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('string');
    }
	
	public function get_profile_details_of_user() {
		$this->db->from('fejiro_item as fi');
		$this->db->order_by("item_id", "desc");
		$this->db->limit(1);
		$this->db->where(array('fi.status' => 'active'));
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
	/**
	 * this function is used to get all list of ads
	 */ 	
	public function get_detail_of_ads() {
		$db_result = $this->db->get_where('fejiro_ads', array('status' => 'active'));
        if ($db_result && $db_result->num_rows() > 0) {
            $data = array();
            $data_value = array();
            foreach ($db_result->result() as $row) {
                if (!array_key_exists($row->ads_id, $data)) {
                    $data[$row->ads_id] = array();
                }
                if (array_key_exists($row->ads_id, $data)) {
                    $data[$row->ads_id] = array(
                        'ads_id' => $row->ads_id,
						'ads_name' => $row->ads_name,
						'ads_image' => $row->ads_image,
                        'navigation'=> $row->navigation,
                    );
                    array_push($data_value, $data[$row->ads_id]);
                }
            }
            return $data_value;
        } else {
            return FALSE;
        }
	 }
	
	 
	 /*---
			This script is used for sorting all beats
	----*/
	
	
		public function get_beat_of_all_beat() {
		$this->db->from('fejiro_item as fi');
		$this->db->order_by("item_id", "desc");
		$this->db->limit(12);		
		$this->db->where(array('fi.status' => 'active'));
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
							'item_sample1_name' => $row->item_sample1_name,
							'item_music_name' => $row->item_music_name,
							'item_sample1_new_name' => $row->item_sample1_new_name,
							'feature_type'=> $row->feature_type,
					);
                    array_push($data_value, $data[$row->item_id]);
                }
            }
		
				return $data_value;
			}
				else {
					return FALSE;
			
				}
			} 

	
	
	/*---
			This script is used for sorting Dance beats
	----*/
	
	
		public function get_beat_by_item_gener_dance() {
		$this->db->from('fejiro_item as fi');		
		$this->db->order_by("item_id", "desc");
		$this->db->limit(12);		
		$this->db->where(array('fi.status' => 'active'));
		$this->db->where(array('item_genre' =>'dance'));
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
							'item_sample1_name' => $row->item_sample1_name,
							'item_music_name' => $row->item_music_name,
							'item_sample1_new_name' => $row->item_sample1_new_name,
							'feature_type'=> $row->feature_type,
					);
                    array_push($data_value, $data[$row->item_id]);
                }
            }
				return $data_value;
			}
				else {
					return FALSE;
			
				}
			} 
		 
		/*---
			This script is used for sorting hip hop beats
	----*/
	 
		
		public function get_beat_by_item_gener_Rap() {
		$this->db->from('fejiro_item as fi');
		$this->db->order_by("item_id", "desc");
		$this->db->limit(12);		
		$this->db->where(array('fi.status' => 'active'));
		$this->db->where(array('item_genre' =>'Rap'));
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
							'item_sample1_name' => $row->item_sample1_name,
							'item_music_name' => $row->item_music_name,
							'item_sample1_new_name' => $row->item_sample1_new_name,
							'feature_type'=> $row->feature_type,
					);
                    array_push($data_value, $data[$row->item_id]);
                }
            }
	        return $data_value;
			}
				else {
					return FALSE;
			
				}
			} 
		 
	/*---
			This script is used for sorting R_N_B beats
	----*/
		 
		public function get_beat_by_item_gener_Soul() {
		$this->db->from('fejiro_item as fi');
		$this->db->order_by("item_id", "desc");
		$this->db->limit(12);				
		$this->db->where(array('fi.status' => 'active'));
		$this->db->where(array('item_genre' =>'Soul'));
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
							'item_sample1_name' => $row->item_sample1_name,
							'item_music_name' => $row->item_music_name,
							'item_sample1_new_name' => $row->item_sample1_new_name,
							'feature_type'=> $row->feature_type,
					);
                    array_push($data_value, $data[$row->item_id]);
                }
            }
				return $data_value;
			}
					else {
						return FALSE;
			
					}
			} 
		 
		 /*---
			This script is used for sorting Reggae beats
	----*/
		 
		  public function get_beat_by_item_gener_Reggae() {
		$this->db->from('fejiro_item as fi');	
		$this->db->order_by("item_id", "desc");
		$this->db->limit(12);			
		$this->db->where(array('fi.status' => 'active'));
		$this->db->where(array('item_genre' =>'Reggae'));
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
							'item_sample1_name' => $row->item_sample1_name,

							'item_music_name' => $row->item_music_name,
							'item_sample1_new_name' => $row->item_sample1_new_name,
							'feature_type'=> $row->feature_type,
					);
                    array_push($data_value, $data[$row->item_id]);
                }
            }
	
			    return $data_value;
			}
				else {
					return FALSE;
			
				}
			} 
		 
		 /*---
			This script is used for sorting Rock beats
	----*/
		 
		  public function get_beat_by_item_gener_Rock() {
		$this->db->from('fejiro_item as fi');	
		$this->db->order_by("item_id", "desc");
		$this->db->limit(12);			
		$this->db->where(array('fi.status' => 'active'));
		$this->db->where(array('item_genre' =>'Rock'));
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
							'item_sample1_name' => $row->item_sample1_name,
							'item_sample2_name' => $row->item_sample2_name,
							'item_sample2_new_name'=> $row-> item_sample2_new_name,
							'item_music_name' => $row->item_music_name,
							'item_sample1_new_name' => $row->item_sample1_new_name,
							'feature_type'=> $row->feature_type,
					);
                    array_push($data_value, $data[$row->item_id]);
                }
            }
			
			    return $data_value;
			}
				else {
					return FALSE;
			
				}
			} 
		 
		 /*---
			This script is used for add to cart all beats
	----*/
	public function get_add_to_cart() {
		$this->db->from('fejiro_item as fi');		
		$this->db->where(array('fi.status' => 'active'));
		$this->db->where(array('item_id' =>38));
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
							'item_sample1_name' => $row->item_sample1_name,
							'item_music_name' => $row->item_music_name,
							'item_sample1_new_name' => $row->item_sample1_new_name,
							'item_sample2_name'=> $row->item_sample2_name,
							'item_sample2_new_name'=> $row-> item_sample2_new_name,
							
							'beat0_duration'=> $row->beat0_duration,
							'beat0_duration'=> $row->beat0_duration,
							'feature_type'=> $row->feature_type,
					);
                    array_push($data_value, $data[$row->item_id]);
                }
            }				
				return $data_value;
			}
				else {	
					return FALSE;
			
				}
			} 
	/** =========================================================
	  * This function is used to get list of all beat of feature
	  */
	public function get_detail_of_beat_by_feature1() {
		$this->db->from('fejiro_item');		
		$this->db->where(array('status' => 'active'));
		$this->db->where(array('feature_type' =>1));
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
							'item_sample1_name' => $row->item_sample1_name,
							'item_music_name' => $row->item_music_name,
							'item_sample1_new_name' => $row->item_sample1_new_name,
							'item_sample2_name'=> $row->item_sample2_name,
							'item_sample2_new_name'=> $row-> item_sample2_new_name,
							
							'beat0_duration'=> $row->beat0_duration,
							'beat0_duration'=> $row->beat0_duration,
							'feature_type'=> $row->feature_type,
					);
					array_push($data_value, $data[$row->item_id]);
				}
			}
			return $data_value;
		}
		else {	
			return FALSE;
		}	 
	}
	
	/** =========================================================
	  * This function is used to get list of all beat of feature
	  */
	public function get_detail_of_beat_by_feature3() {
		$this->db->from('fejiro_item');		
		$this->db->where(array('status' => 'active'));
		$this->db->where(array('feature_type' =>3));
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
							'item_sample1_name' => $row->item_sample1_name,
							'item_music_name' => $row->item_music_name,
							'item_sample1_new_name' => $row->item_sample1_new_name,
							'item_sample2_name'=> $row->item_sample2_name,
							'item_sample2_new_name'=> $row-> item_sample2_new_name,
							
							'beat0_duration'=> $row->beat0_duration,
							'beat0_duration'=> $row->beat0_duration,
							'feature_type'=> $row->feature_type,
					);
					array_push($data_value, $data[$row->item_id]);
				}
			}
			return $data_value;
		}
		else {	
			return FALSE;
		}	 
	}
	
	
	
}
