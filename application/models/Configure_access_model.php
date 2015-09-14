<?php

if (!defined('BASEPATH'))
    exit('Not A Valid Request');

class Configure_access_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('string');
    }


//-------------------------------------------------------------------------
    /*
     * This function is used to to update password.
     */
    public function update_password() {
        #check user exists or not
        $db_result = $this->db->get_where('fejiro_users', array('user_id' => $this->session->userdata('userID')));
        if ($db_result && $db_result->num_rows() > 0) {
            #user exists
            #check old password is same or not
            $old_hashed_password = sha1('admin' . (md5('admin' . $_POST['old_password'])));
			$row = $db_result->result();
            if ($old_hashed_password == $row[0]->password_hash) {
                #update pssword
                $data = array(
                    'password_hash' => sha1('admin' . (md5('admin' . $_POST['new_password'])))
                );
                $this->db->update('fejiro_users', $data, array('user_id' => $this->session->userdata('userID')));
            }

            if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
	//--------------------------------------------------------------------
    /**
     * Handles requests for add new items into database
     * 
     * @access		public
     * @since		1.0.0
     */
    public function add_new_item() {
        date_default_timezone_set('Asia/Kolkata');
        $data = array(
			'FK_userid_id' => $this->session->userdata('userID'),
			'item_name' => $_POST['item_name'],
			'item_genre' => implode(",", $_POST['item_genre']),
			'item_description' => $_POST['item_description'],
			'item_image' => $_POST['item_image'],
			
			'item_sample1_name' => $_POST['item_sample1_name'],
			'item_sample1_new_name' => $_POST['item_sample1_new_name'],
			'beat1_duration' => $_POST['beat1_duration'],
			
			'item_sample2_name' => $_POST['item_sample2_name'],
			'item_sample2_new_name' => $_POST['item_sample2_new_name'],
			'beat2_duration' => $_POST['beat2_duration'],
			
			'item_music_name' => $_POST['item_music_name'],
			'item_music_new_name' => $_POST['item_music_new_name'],
			'beat0_duration' => $_POST['beat0_duration'],
			
			'project_file_name' => $_POST['project_file_name'],
			'project_file_new_name' => $_POST['project_file_new_name'],
			
			'item_price' => $_POST['item_price'],
			'added_by' => $this->session->userdata('userID'),
			#updated query
			'added_date' => date('Y-m-d'),
			'added_time' => date('H:i:s'),
        );
		

        $result = $this->db->insert('fejiro_item', $data);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
		
	//--------------------------------------------------------------------------
    /**
     * This function is used to upload image for edit section of profile.
     */
    public function edit_upload_image($filename) {
        if ($_POST['image_profile'] == 'profile') {
            $data = array(
                'profile_image' => $filename,
            );
            $result = $this->db->update('fejiro_profile', $data, array('FK_userid_id' => $this->session->userdata('userID')));
        }elseif($_POST['image_profile'] == 'beat'){
			 $data = array(
                'item_image' => $filename,
            );
            $result = $this->db->update('fejiro_item', $data, array('item_id' => $_POST['image_item_id']));
		}elseif($_POST['image_profile'] == 'ads'){
			 $data = array(
                'ads_image' => $filename,
            );
            $result = $this->db->update('fejiro_ads', $data, array('ads_id' => $_POST['image_ads_id']));
		}
        if ($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	//-------------------------------------------------------------------------
    /*
     * This function is used to list out all beat information.
     */
    public function get_list_of_all_beats($current_user_id) {
		$this->db->order_by('item_id','desc');
		$this->db->where(array('status' => 'active'));
		if($current_user_id != 'all'){
			$this->db->where(array('FK_userid_id' => $current_user_id));
        }
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
	//-------------------------------------------------------------------------
    /*
     * This function is used to update beat status
     * 
     * @access		public
     * @since		1.0.0
     */
    public function update_beat_status() {
		$data = array(
            'beat_status' => $_POST['beat_status'],
        );
        $result = $this->db->update('fejiro_item', $data, array('item_id' => $_POST['item_id']));
        if ($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
	}
	//--------------------------------------------------------------------
    /**
     * Handles requests for edit beat information in database.
     * 
     * @access		public
     * @since		1.0.0
     */
    public function edit_beat_information() {
        $data = array(
            'item_name' => $_POST['edit_item_name'],
			'item_genre' => implode(",", $_POST['edit_item_genre']),
			'item_description' => $_POST['edit_item_description'],
			
			'item_sample1_name' => $_POST['edit_item_sample1_name'],
			'item_sample1_new_name' => $_POST['edit_item_sample1_new_name'],
			'beat1_duration' => $_POST['edit_beat1_duration'],
			
			'item_sample2_name' => $_POST['edit_item_sample2_name'],
			'item_sample2_new_name' => $_POST['edit_item_sample2_new_name'],
			'beat2_duration' => $_POST['edit_beat2_duration'],
			
			'item_music_name' => $_POST['edit_item_music_name'],
			'item_music_new_name' => $_POST['edit_item_music_new_name'],
			'beat0_duration' => $_POST['edit_beat0_duration'],
			
			'item_price' => $_POST['edit_item_price'],
        );
        $result = $this->db->update('fejiro_item', $data, array('item_id' => $_POST['edit_item_id'] ));
        if ($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

	
	//-------------------------------------------------------------------------
    /*
     * This function is used to get profile details of user for login
     */
    public function get_profile_details_of_user() {
		$this->db->from('fejiro_users as fu');
		$this->db->join('fejiro_profile as fp','fp.FK_userid_id = fu.user_id');
		$this->db->where(array('fu.status' => 'active','fu.user_id' => $this->session->userdata('userID') ));
		$db_result = $this->db->get();
        //$db_result = $this->db->get_where('fejiro_profile', array('status' => 'active'));
        if ($db_result && $db_result->num_rows() > 0) {
            $data = array();
            $data_value = array();
            foreach ($db_result->result() as $row) {
                if (!array_key_exists($row->profile_id, $data)) {
                    $data[$row->profile_id] = array();
                }
                if (array_key_exists($row->profile_id, $data)) {
                    $data[$row->profile_id] = array(
                        'profile_id' => $row->profile_id,
						'email' => $row->email,
						'user_id'=> $row->user_id,
						'name' => $row->firstname,
						'profile_age' => $row->profile_age,
                        'profile_sex' => $row->profile_sex,
                        'profile_pnumber' => $row->profile_pnumber,
						'profile_nation' => $row->profile_nation,
						'profile_raddress' => $row->profile_raddress,
                        'profile_image'=> $row->profile_image,
                        'producer_name'=> $row->producer_name,
                        'producer_description'=> $row->producer_description,
                        'correspondence_caddress'=> $row->correspondence_caddress,
                    );
                    array_push($data_value, $data[$row->profile_id]);
                }
            }
            return $data_value;
        } else {
            return FALSE;
        }
    }
	
	//-------------------------------------------------------------------------
    /*
     * This function is used to edit profile details of user
     */
    public function edit_profile_details_user() {
		 $this->db->trans_start();
        $data = array(
            'firstname' => $_POST['profile_name'],
        );
		$data1 = array(
            'profile_age' => $_POST['profile_age'],
            'profile_sex' => $_POST['profile_sex'],
			'profile_pnumber' => $_POST['profile_pnumber'],
            'profile_nation' => $_POST['profile_nation'],
            'profile_raddress' => $_POST['profile_raddress'],
			//'profile_caddress' => $_POST['profile_caddress'],
			
			'producer_name' => $_POST['producer_name'],
			'producer_description' => $_POST['producer_description'],
			'correspondence_caddress' => $_POST['correspondence_caddress'],
        );
        $this->db->update('fejiro_users', $data, array('user_id' => $this->session->userdata('userID')));
		$this->db->update('fejiro_profile', $data1, array('FK_userid_id' => $this->session->userdata('userID')));
		$this->session->set_userdata(array(
                'userName' => $_POST['profile_name'],
              ));
		#transition compalete
		$this->db->trans_complete();
		#check status of transition
		if ($this->db->trans_status() === FALSE) {
			return FALSE;
		} else {
			return TRUE;
		}
    }
	
	//-------------------------------------------------------------------------
    /*
     * This function is used to get user list
     */
    public function get_list_of_user() {
		$this->db->from('fejiro_users as fu');
		$this->db->join('fejiro_profile as fp','fp.FK_userid_id = fu.user_id');
		$this->db->where(array('fu.status' => 'active'));
		
		$db_result = $this->db->get();
        //$db_result = $this->db->get_where('fejiro_profile', array('status' => 'active'));
        if ($db_result && $db_result->num_rows() > 0) {
            $data = array();
            $data_value = array();
            foreach ($db_result->result() as $row) {
                if (!array_key_exists($row->profile_id, $data)) {
                    $data[$row->profile_id] = array();
                }
                if (array_key_exists($row->profile_id, $data)) {
                    $data[$row->profile_id] = array(
                        'profile_id' => $row->profile_id,
						'FK_userid_id' => $row->FK_userid_id,
						'email' => $row->email,
						'name' => $row->firstname,
						'profile_age' => $row->profile_age,
                        'profile_sex' => $row->profile_sex,
                        'profile_pnumber' => $row->profile_pnumber,
						'profile_nation' => $row->profile_nation,
						'profile_raddress' => $row->profile_raddress,
						'profile_caddress' => $row->profile_caddress,
                        'profile_image'=> $row->profile_image,
                    );
                    array_push($data_value, $data[$row->profile_id]);
                }
            }
            return $data_value;
        } else {
            return FALSE;
        }
    }
	
	//-------------------------------------------------------------------------
    /*
     * This function is used to to decativate user from the list
     * 
     * @access		public
     * @since		1.0.0
     */
    public function deactivate_user() {
        $data = array(
            'status' => 'old',
        );
        $result = $this->db->update('fejiro_users', $data, array('user_id' => $_POST['edit_user_id']));
        if ($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	
	//-------------------------------------------------------------------------
    /*
     * This function is used to to remove beat from the list
     * 
     * @access		public
     * @since		1.0.0
     */
    public function remove_beat() {
        $data = array(
            'status' => 'old',
        );
        $result = $this->db->update('fejiro_item', $data, array('item_id' => $_POST['item_id']));
        if ($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	
	
		
	
	//-------------------------------------------------------------------------
    /*
     * This function is used to decativate user from the update_feature_place_of_beat
     * 
     * @access		public
     * @since		1.0.0
     */
    public function update_feature_place_of_beat() {
		$data = array(
            'feature_type' => $_POST['feature_type'],
        );
        $result = $this->db->update('fejiro_item', $data, array('item_id' => $_POST['item_id']));
        if ($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
	}
	
	//-------------------------------------------------------------------------
    /*
     * This function is used to get ads list
     */
    public function get_list_of_ads() {
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
	
	//-------------------------------------------------------------------------
    /*
     * This function is used to update beat ads
     * 
     * @access		public
     * @since		1.0.0
     */
    public function update_ads() {
		$ads_id = (int)$_POST['ads_id'];
		$data = array(
            'ads_name' => $_POST['ads_name'],
            'ads_image' => $_POST['ads_image'],
            'navigation' => $_POST['navigation'],
        );
		if($ads_id == 0){
			$result = $this->db->insert('fejiro_ads', $data);      
			if ($result) {
				return TRUE;
			} else {
				return FALSE;
			}
		}else{
			$result = $this->db->update('fejiro_ads', $data, array('ads_id' => $ads_id));      
			if ($this->db->affected_rows()) {
				return TRUE;
			} else {
				return FALSE;
			}
		}  	
	}
	//-------------------------------------------------------------------------
    /*
     * This function is used to remove ads from the list
     * 
     * @access		public
     * @since		1.0.0
     */
    public function remove_ads() {
		$data = array(
            'status' => 'old',
        );
        $result = $this->db->update('fejiro_ads', $data, array('ads_id' => $_POST['ads_id']));
        if ($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
	
	}
	
	/*----------------------------------------------------------------------------------------*/
	/*****************************************************************************************/
	//-------------------------------------------------------------------------
    /*
     * This function is used to list out current month beat information.
     */
    function get_list_of_current_month_beats($current_user_id) {
		$this->db->order_by('item_id','desc');
		$this->db->where('status' , 'active');
		//$this->db->like('added_date',date('Y-m-'),'after');
		if($current_user_id != 'all'){
			$this->db->where(array('FK_userid_id' => $current_user_id));
        }
		$db_result = $this->db->get('fejiro_item');
        if ($db_result && $db_result->num_rows() > 0){ 
			$data_value = $db_result->result_array();
			return $data_value;
        } else {
            return FALSE;
        }
    }
	
	function get_list_of_current_users() {
		$this->db->order_by('user_id','desc');
		$this->db->where(array('status' => 'active','role'=>'user'));
		//$this->db->like('created_date',date('Y-m-'),'after');
		$db_result = $this->db->get('fejiro_users');
        if ($db_result && $db_result->num_rows() > 0){ 
			$data_value = $db_result->result_array();
			return $data_value;
        } else {
            return FALSE;
        }
    }
	
	function get_list_of_inbox_messages(){
		$this->db->select('fm.*,fu.firstname,fu.lastname');
		$this->db->order_by('fm.message_id','desc');
		$this->db->where(array('fm.message_to' => $this->session->userdata('userID')));
		//$this->db->or_where(array('fm.message_from' => $this->session->userdata('userID')));
		$this->db->from('fejiro_message as fm');
		$this->db->join('fejiro_users as fu','fu.user_id = fm.message_from');
		$db_result = $this->db->get();
        if ($db_result && $db_result->num_rows() > 0){ 
			$data_value = $db_result->result_array();
			return $data_value;
        } else {
            return FALSE;
        }
    }
	
	function get_list_of_outbox_messages(){
		$this->db->select('fm.*,fu.firstname,fu.lastname');
		$this->db->order_by('fm.message_id','desc');
		//$this->db->where(array('fm.message_to' => $this->session->userdata('userID')));
		$this->db->or_where(array('fm.message_from' => $this->session->userdata('userID')));
		$this->db->from('fejiro_message as fm');
		$this->db->join('fejiro_users as fu','fu.user_id = fm.message_to');
		$db_result = $this->db->get();
        if ($db_result && $db_result->num_rows() > 0){ 
			$data_value = $db_result->result_array();
			return $data_value;
        } else {
            return FALSE;
        }
    }
	
	function save_reply(){
		$this->db->select('fm.*,fu.email as fuemail,fu.*');
		$this->db->from('fejiro_message as fm');
		$this->db->join('fejiro_users as fu','fm.message_to = fu.user_id');
		$this->db->where('fm.message_id',$_POST['item']);
		$res = $this->db->get();
		if($res)
			$message = $res->row_array();
		else
			return false;
		
		date_default_timezone_set('Asia/Kolkata');
		$insert_Message = array(
					'email' => $message['fuemail'],
					'message' => $_POST['comment'],
					'item_id' => $message['item_id'],
					'message_to' => $message['message_from'],
					'date_time' => date('Y-m-d H:i:s'),
					'message_from' => $message['message_to'],
					'parent_message' => $message['message_id'],
				);
		$this->db->insert('fejiro_message',$insert_Message);
	}
}
