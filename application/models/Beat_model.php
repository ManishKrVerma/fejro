<?php

if (!defined('BASEPATH'))
    exit('Not A Valid Request');

class Beat_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('string');
    }
	
	/** =========================================================
	  * This function is used to get beat details by beat id
	  */
	 public function get_detail_of_beat_by_beat_id($beat_id) {
		$this->db->from('fejiro_item as fi');
		$this->db->where(array('fi.status' => 'active'));
		$this->db->where(array('item_id' => $beat_id));
		$db_result = $this->db->get();
		if ($db_result && $db_result->num_rows() > 0) {
			$data = array();
			$data_value = array();
			
			foreach ($db_result->result() as $row) {
				if (!array_key_exists($row->item_id, $data)) {
                    $data[$row->item_id] = array();
				}
				/*Producer details*/
				$user_id = 0;
				$producer_name = '';
				$producer_description = '';
				$producer_db = $this->db->get_where('fejiro_profile', array('FK_userid_id' => $row->added_by));
				if($producer_db && $producer_db->num_rows() > 0){
					foreach ($producer_db->result() as $producer_row){
						$user_id = $producer_row->FK_userid_id;
						$producer_name = $producer_row->producer_name;
						$producer_description = $producer_row->producer_description;
					}
				}
				$user_name = '';
				$producer_user_db = $this->db->get_where('fejiro_users', array('user_id' => $row->added_by));
				if($producer_user_db && $producer_user_db->num_rows() > 0){
					foreach ($producer_user_db->result() as $producer_user_row){
						$user_name = $producer_user_row->firstname . ' ' . $producer_user_row->lastname;
					}
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
						'item_sample2_new_name' => $row->item_sample2_new_name,
                        'feature_type'=> $row->feature_type,
						'added_by'=> $row->added_by,
						'user_id' => $user_id,
						'producer_name' => $producer_name,
						'producer_description' => $producer_description,
						'user_name' => $user_name,						
					);
                    array_push($data_value, $data[$row->item_id]);
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
	public function get_detail_of_beat_list_of_producer_beat(){
		$this->db->order_by('item_id','desc');
		$this->db->where(array('status' => 'active'));
		$this->db->where(array('FK_userid_id' => $this->session->userdata('userID')));
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
                    );
                    array_push($data_value, $data[$row->item_id]);
                }
            }
            return $data_value;
        } else {
            return FALSE;
        }
	}
	 
	/** =========================================================
	  * This function is used to update card of a user
	 */
	public function update_cart_by_id(){
		if($_POST['flag'] == 'add'){
			$data = array(
				'beat_id' => $_POST['beat_id'],
				'beat_name' => $_POST['beat_name'],
				'beat_price' => $_POST['beat_price'],
				'user_id' => $this->session->userdata('userID'),
			);
			
			$result = $this->db->insert('fejiro_cart', $data);
			if ($result) {
				return $insert_id = $this->db->insert_id();
			} else {
				return FALSE;
			}			
		}else if($_POST['flag'] == 'remove'){
			#update pssword
			$data = array(
				'status' => 'old'
			);
			$this->db->update('fejiro_cart', $data, array('cart_id' => $_POST['cart_id']));
			if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }			
		}	 
	}
	
	/** =========================================================
	  * This function is used to get cart info by user_id
	  */
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
	 public function get_detail_of_beat_by_beat_cat($beat_cat) {
		$this->db->from('fejiro_item');
		$this->db->where(array('status' => 'active'));
		if($beat_cat == 'new_arrivals'){
		
		}else{
			$this->db->like(array('item_genre' => $beat_cat));
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
	 
	 /** =========================================================
	  * This function is used to save message and make new user if email not exits.
	  */
		function save_message($result){
			date_default_timezone_set('Asia/Kolkata');
			
			$this->db->from('fejiro_item as fi');
			$this->db->join('fejiro_users as fu','fi.FK_userid_id = fu.user_id');
			$this->db->where('fi.item_id',$_POST['item']);
			$res = $this->db->get();
			if($res)
				$producer = $res->row_array();
			else
				return false;
			
			if($this->session->userdata('userID') != ''){
				$userId = $this->session->userdata('userID');
			}else if($result == FALSE){
				$this->db->where('email',$_POST['email']);
				$user = $this->db->get('fejiro_users');
				if($user)
					$user = $user->row_array();
				else
					return false;
				$userId = $user['user_id'];
				$return = 'Thanks for your comment.';
			}else{
				$password = substr(implode('',range('a','z')).implode('',range('A','Z')).time(),0,8);
				$hashed_password = sha1('admin' . (md5('admin' . $password)));
				$insert_User = array(
						'email' => $_POST['email'],
						'password_hash' => $hashed_password,
						'created_date' => date('Y-m-d'),
						'created_time' => date('H:i:s'),
						'status' => 'active',
						'role' => 'user',
					);
				$this->db->insert('fejiro_users',$insert_User);
				if($this->db->insert_id()){
					$userId = $this->db->insert_id();
					$this->load->library('email');
					
					#Email sending start..
					$to = $_POST['email'];
					$subject = "Welcome to beatsrack";
					$message = "Dear user,<br/><br/>";
					$message .= "You are just commented on Beatsrack.,<br/><br/>";
					$message .= 'Comment : "'.$_POST['comment'].'"'."<br/><br/>";
					$message .= "For details you can login to beatsrack <br/><br/>";
					$message .= "Login details are : <br/> Email : ".(isset($_POST['email'])?$_POST['email']:$producer['email'])."<br/> password : $password  <br/><br/>";
					$e_config = array(
										'charset'=>'utf-8',
										'wordwrap'=> TRUE,
										'mailtype' => 'html',
										'priority' => '1'
									);
									
					$this->email->initialize($e_config);
					$this->email->from('no-reply@beatsrack.in', 'Beatsrack');
					$this->email->to($to); 
					$this->email->subject($subject);
					$this->email->message($message);	
					$this->email->send();
					$return = 'Thanks for your comment. Check email to see copy of your comment.';
				}else{
					return false;
				}
			}
			$insert_Message = array(
						'email' => isset($_POST['email'])?$_POST['email']:$producer['email'],
						'phone' => isset($_POST['phone'])?$_POST['phone']:'',
						'message' => $_POST['comment'],
						'item_id' => $_POST['item'],
						'message_to' => $producer['user_id'],
						'date_time' => date('Y-m-d H:i:s'),
						'message_from' => $userId,
					);
			$this->db->insert('fejiro_message',$insert_Message);
			if($this->db->insert_id()){
				return isset($return)?$return:'Thanks for your comment.';
			}else{
				return false;
			}
	  }
	 
	
}