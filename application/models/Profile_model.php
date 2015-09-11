<?php

if (!defined('BASEPATH'))
    exit('Not A Valid Request');

class Profile_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('string');
    }
	
	/** =========================================================
	  * This function is used to get beat details by beat id
	  */
	 public function get_detail_of_producer_by_producer_id($producer_id) {
		
		$db_result = $this->db->get_where('fejiro_profile', array('FK_userid_id' => $producer_id));
		if ($db_result && $db_result->num_rows() > 0) {
			$data = array();
			$data_value = array();
			
			foreach ($db_result->result() as $row) {
				if (!array_key_exists($row->FK_userid_id, $data)) {
                    $data[$row->FK_userid_id] = array();
				}
				
				$user_name = '';
				$producer_user_db = $this->db->get_where('fejiro_users', array('user_id' => $producer_id));
				if($producer_user_db && $producer_user_db->num_rows() > 0){
					foreach ($producer_user_db->result() as $producer_user_row){
						$user_name = $producer_user_row->firstname . ' ' . $producer_user_row->lastname;
					}
				}
				
				if (array_key_exists($row->FK_userid_id, $data)) {
                    $data[$row->FK_userid_id] = array(
						'user_id' => $row->FK_userid_id,
						'producer_name' => $row->producer_name,
						'producer_description'=> $row->producer_description,
						'profile_image' => $row->profile_image,
						'user_name' => $user_name,						
					);
                    array_push($data_value, $data[$row->FK_userid_id]);
                }
            }			
            return $data_value;
        } else {
			return FALSE;
		}
	 }
	/** =========================================================
	  * This function is used get list of all beat of the particular producer
	  */
	public function get_detail_of_beat_list_of_producer_beat($producer_id){
		$this->db->order_by('item_id','desc');
		$this->db->where(array('status' => 'active'));
		$this->db->where(array('beat_status' => 'Approved'));
		$this->db->where(array('FK_userid_id' => $producer_id));
		$db_result = $this->db->get('fejiro_item');
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
						'item_image' => $row->item_image,
						'item_genre' => $row->item_genre,
                        'item_description' => $row->item_description,
                        'item_price' => $row->item_price,
                        'beat_status' => $row->beat_status,
						'added_date' => $row->added_date,
						'added_time' => $row->added_time,
			
						'item_sample1_name' => $row->item_sample1_name,
						'item_sample1_new_name' => $row->item_sample1_new_name,
						'beat1_duration' => $row->beat1_duration,
						
						
						'item_sample2_name' => $row->item_sample2_name,
						'item_sample2_new_name' => $row->item_sample2_new_name,
						'beat2_duration' => $row->beat2_duration,
						
						'item_music_name' => $row->item_music_name,
						'item_music_new_name' => $row->item_music_new_name,
						'beat0_duration' => $row->beat0_duration,
						
						'project_file_name' => $row->project_file_name,
						'project_file_new_name' => $row->project_file_new_name,
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