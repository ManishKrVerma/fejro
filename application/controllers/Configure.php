<?php

if (!defined('BASEPATH'))
    exit('Not a valid request!');

/**
 * Controller class to configure RBAC system.
 * 
 */
class Configure extends CI_Controller {

    /**
     * Default constructor.
     * 
     * @access	public
     * @since	1.0.0
     */
    function __construct() {
        parent::__construct();
        if (!($this->session->userdata('loggedIN') == 1)) {
            redirect(base_url() . 'login');
        }
    }

    //-------------------------------------------------------------
    /**
     * This function is used to load admin dashboard
     * 
     * @access		public
     * @since		1.0.0
     */
    public function index() {
		#loading the require model
		$this->load->model('Configure_access_model', 'obj_ca', TRUE);
		
		//$current_user_id = $this->session->userdata('role') == 'user'?$this->session->userdata('userID'):'all';
		$current_user_id = 'all';
		
		$data['allBeats'] = $this->obj_ca->get_list_of_current_month_beats($current_user_id);
		$data['allusers'] = $this->obj_ca->get_list_of_current_users();
		$data['allInbox'] = $this->obj_ca->get_list_of_inbox_messages();
		$data['alloutbox'] = $this->obj_ca->get_list_of_outbox_messages();
		
		$this->load->view('configure/configure_header');
		if($this->session->userdata('role') == 'user')
			$this->load->view('configure/user_dashboard',$data);
		if($this->session->userdata('role') == 'admin')
			$this->load->view('configure/admin_dashboard',$data);
        $this->load->view('configure/configure_footer');
    }

	//--------------------------------------------------------------
    /**
     * This function is used to change user password
     * 
     * @access		public
     * @since		1.0.0
     */
    public function change_password() {
        $this->load->view('configure/configure_header');
        $this->load->view('configure/change_password');
        $this->load->view('configure/configure_footer');
    }

    //--------------------------------------------------------------
    /**
     * This function is used to to update password.
     * 
     * @access		public
     * @since		1.0.0
     */
    public function update_password() {
        //array to store ajax responses
        $arr_response = array('status' => ERR_DEFAULT);

            //Load Required modal
            $this->load->model('Configure_access_model', 'obj_ca', TRUE);

            $return_val = $this->obj_ca->update_password();
            if ($return_val) {
                $arr_response['status'] = SUCCESS;
                $arr_response['message'] = 'Password has been updated successfully';
            } else {
                $arr_response['status'] = DB_ERROR;
                $arr_response['message'] = 'Something went Wrong! Please try again';
            }
        echo json_encode($arr_response);
    }
	
    //-------------------------------------------------------------------------
    /**
     * Controller to handle logout request
     * 
     * @version 0.0.1
     * @since 0.0.1
     */
    public function logout() {
		session_destroy();
    }

	//-------------------------------------------------------------
    /**
     * This function is used to load page for add items
     * 
     * @access		public
     * @since		1.0.0
     */
    public function add_beat() {
			
			$this->load->view('configure/configure_header');
			$this->load->view('configure/add_item');
			$this->load->view('configure/configure_footer');	
    }
	//--------------------------------------------------------------------
    /**
     * Handles requests for adding  new product  into database
     * 
     * @access		public
     * @since		1.0.0
     */
    public function add_new_item() {
        //array to store ajax responsesadd_new_item
        $arr_response = array('status' => ERR_DEFAULT); /* 500 */
        #loading the require model
        $this->load->model('Configure_access_model', 'obj_ca', TRUE);
        #calling the function to register a new product into the database
        $return_value = $this->obj_ca->add_new_item();
        if ($return_value) {
            $arr_response['status'] = SUCCESS; /* 200 */
            $arr_response['message'] = 'Thank you for uploading your beat. Please wait for your file to be approved. This may take a while…';
        } else {
            $arr_response['status'] = DB_ERROR; /* 201 */
            $arr_response['message'] = 'Something went Wrong! Please try again';
        }
        echo json_encode($arr_response);
    }
	
	//--------------------------------------------------------------------------
    /**
     * This function is used to upload image.
     */
    public function upload_image() {
        #array to hold the response values to be displayed
        $arr_response = array();

        $info = pathinfo($_FILES['myFile']['name']);
        $ext = $info['extension']; // get the extension of the file

        if (($ext == "GIF" || $ext == "PNG" || $ext == "JPG" || $ext == "jpg" || $ext == 'gif' || $ext == 'png' || $ext == 'jpeg') && ($_FILES["myFile"]["type"] == "image/PNG" || $_FILES["myFile"]["type"] == "image/GIF" || $_FILES["myFile"]["type"] == "image/JPG" || $_FILES["myFile"]["type"] == "image/jpg" ||$_FILES["myFile"]["type"] == "image/jpeg" || $_FILES["myFile"]["type"] == 'image/gif' || $_FILES["myFile"]["type"] == 'image/png') &&
                ($_FILES["myFile"]["size"] < 20485760)) {
            $file = $info['filename'];
            $filename = $_POST['image_cat'] . '_' . uniqid() . '.' . $ext;
            $target = './uploads/' . $filename;
            $file = $_FILES['myFile']['tmp_name'];
            move_uploaded_file($file, $target);

            $arr_response['status'] = 200;
            $arr_response['filename'] = $filename;
        } else {
            $arr_response['status'] = FAILED;
            $arr_response['message'] = "Not a valid File";
        }
        echo json_encode($arr_response);
    }
	
	//--------------------------------------------------------------------------
    /**
     * This function is used to upload project file.
     */
    public function upload_project_file() {
        #array to hold the response values to be displayed
        $arr_response = array();

        $info = pathinfo($_FILES['myFile']['name']);
        $ext = $info['extension']; // get the extension of the file
		$original_filename = $info['basename'];
        if (($ext == "zip" || $ext == "ZIP" || $ext == "rar" || $ext == "RAR") && ($_FILES["myFile"]["type"] == "application/zip" || $_FILES["myFile"]["type"] == "application/ZIP" || $_FILES["myFile"]["type"] == "application/rar" || $_FILES["myFile"]["type"] == "application/RAR" || $_FILES["myFile"]["type"] == "application/x-zip" || $_FILES["myFile"]["type"] == "application/x-zip-compressed" || $_FILES["myFile"]["type"] == "application/octet-stream" || $_FILES["myFile"]["type"] == "application/x-compress" || $_FILES["myFile"]["type"] == "application/x-compressed" || $_FILES["myFile"]["type"] == "multipart/x-zip")){
            $file = $info['filename'];
            $filename = $_POST['image_cat']. '_' .uniqid(). '.' . $ext;
            $target = './uploads/' . $filename;
            $file = $_FILES['myFile']['tmp_name'];
            move_uploaded_file($file, $target);

            $arr_response['status'] = 200;
            $arr_response['filename'] = $filename;
			$arr_response['original_filename'] = $original_filename;
        } else {
            $arr_response['status'] = FAILED;
            $arr_response['message'] = "Not a valid File";
        }
        echo json_encode($arr_response);
    }
	
	//--------------------------------------------------------------------------
    /**
     * This function is used to upload audio.
     */
    public function upload_audio() {
        #array to hold the response values to be displayed
        $arr_response = array();

        $info = pathinfo($_FILES['file']['name']);
	
        $ext = $info['extension']; // get the extension of the file
        if (($ext == "mp3" || $ext == "MP3" || $ext == "WMA" || $ext == "wma" || $ext == "WAV" || $ext == "wav" || $ext == 'mid' || $ext == 'MID' || $ext == 'OGG' || $ext == 'ogg') && ($_FILES["file"]["type"] == "audio/mp3" || $_FILES["file"]["type"] == "audio/MP3" || $_FILES["file"]["type"] == "audio/WMA" || $_FILES["file"]["type"] == "audio/wma" || $_FILES["file"]["type"] == "audio/WAV" || $_FILES["file"]["type"] == "audio/wav" ||$_FILES["file"]["type"] == "audio/MID" || $_FILES["file"]["type"] == 'audio/mid' || $_FILES["file"]["type"] == 'audio/ogg' || $_FILES["file"]["type"] == 'audio/OGG'))
        {
            $file = $info['filename'];
            $filename = $_POST['audio_cat'] . '_' . uniqid() . '.' . $ext;
            $target = './uploads/' . $filename;
            $file = $_FILES['file']['tmp_name'];
            move_uploaded_file($file, $target);
            $arr_response['status'] = 200;
            $arr_response['filename'] = $filename;
            $arr_response['originalName'] = $info['basename'];
        } else {
            $arr_response['status'] = FAILED;
            $arr_response['message'] = "Not a valid File";
        }
        echo json_encode($arr_response);
    }
	
	//--------------------------------------------------------------------------
    /**
     * This function is used to upload audio.
     */
    public function edit_upload_audio() {
        #array to hold the response values to be displayed
        $arr_response = array();

        $info = pathinfo($_FILES['file']['name']);
	
        $ext = $info['extension']; // get the extension of the file
        if (($ext == "mp3" || $ext == "MP3" || $ext == "WMA" || $ext == "wma" || $ext == "WAV" || $ext == "wav" || $ext == 'mid' || $ext == 'MID' || $ext == 'OGG' || $ext == 'ogg') && ($_FILES["file"]["type"] == "audio/mp3" || $_FILES["file"]["type"] == "audio/MP3" || $_FILES["file"]["type"] == "audio/WMA" || $_FILES["file"]["type"] == "audio/wma" || $_FILES["file"]["type"] == "audio/WAV" || $_FILES["file"]["type"] == "audio/wav" ||$_FILES["file"]["type"] == "audio/MID" || $_FILES["file"]["type"] == 'audio/mid' || $_FILES["file"]["type"] == 'audio/ogg' || $_FILES["file"]["type"] == 'audio/OGG'))
        {
            $file = $info['filename'];
            $filename = $_POST['audio_cat'] . '_' . uniqid() . '.' . $ext;
            $target = './uploads/' . $filename;
            $file = $_FILES['file']['tmp_name'];
            move_uploaded_file($file, $target);
            $arr_response['status'] = 200;
            $arr_response['filename'] = $filename;
            $arr_response['originalName'] = $info['basename'];
        } else {
            $arr_response['status'] = FAILED;
            $arr_response['message'] = "Not a valid File";
        }
        echo json_encode($arr_response);
    }
	
	//-------------------------------------------------------------
    /**
     * This function is used to load page for profile
     * 
     * @access		public
     * @since		1.0.0
     */
    public function profile() {
		$this->load->model('Configure_access_model', 'obj_ca', TRUE);
		$data['profile_detail'] = $this->obj_ca->get_profile_details_of_user();
        $this->load->view('configure/configure_header');
        $this->load->view('configure/profile',$data);
        $this->load->view('configure/configure_footer');
    }
	
	 //--------------------------------------------------------------------
    /**
     * Handles requests for edit profile details of user in database.
     * 
     * @access		public
     * @since		1.0.0
     */
    public function edit_profile_details_user() {
        //array to store ajax responses
        $arr_response = array('status' => ERR_DEFAULT);

            //Load Required modal
            $this->load->model('Configure_access_model', 'obj_ca', TRUE);

            $return_val = $this->obj_ca->edit_profile_details_user();
            if ($return_val) {
                $arr_response['status'] = SUCCESS;
                $arr_response['message'] = 'User Detail has been updated successfully';
            } else {
                $arr_response['status'] = DB_ERROR;
                $arr_response['message'] = 'Something went Wrong! Please try again';
            }
        echo json_encode($arr_response);
    }
	
	//--------------------------------------------------------------------------
    /**
     * This function is used to edit uploaded profile image.
     */
     public function edit_upload_image() {
        #array to hold the response values to be displayed
        $arr_response = array();

        $info = pathinfo($_FILES['myFile']['name']);
        $ext = $info['extension']; // get the extension of the file
        if (($ext == "GIF" || $ext == "PNG" || $ext == "JPG" || $ext == "jpg" || $ext == 'gif' || $ext == 'png' || $ext == 'jpeg') && ($_FILES["myFile"]["type"] == "image/PNG" || $_FILES["myFile"]["type"] == "image/GIF" || $_FILES["myFile"]["type"] == "image/JPG" || $_FILES["myFile"]["type"] == "image/jpg" ||$_FILES["myFile"]["type"] == "image/jpeg" || $_FILES["myFile"]["type"] == 'image/gif' || $_FILES["myFile"]["type"] == 'image/png') &&
                ($_FILES["myFile"]["size"] < 30485760)) {
            $file = $info['filename'];
            $filename = $_POST['image_profile'] . '_' . uniqid() . '.' . $ext;
            $target = './uploads/' . $filename;
            $file = $_FILES['myFile']['tmp_name'];
            move_uploaded_file($file, $target);
            //Load Required modal
            $this->load->model('Configure_access_model', 'obj_ca', TRUE);
            $return_val = $this->obj_ca->edit_upload_image($filename);
            if ($return_val) {
                $arr_response['status'] = SUCCESS;
                $arr_response['filename'] = $filename;
            } else {
                $arr_response['status'] = FAILED;
                $arr_response['message'] = "Something went wrong! Please try again.";
            }
        } else {
            $arr_response['status'] = FAILED;
            $arr_response['message'] = "Not a valid File.";
        }
        echo json_encode($arr_response);
    }
	
	//--------------------------------------------------------------
    /**
     * This function is used to list out all user information.
     * 
     * @access		public
     * @since		1.0.0
     */
    public function view_user() {
		if($this->session->userdata('role') == 'admin'){
			#load required model
			$this->load->model('Configure_access_model', 'obj_ca', TRUE);
			$data['user'] = $this->obj_ca->get_list_of_user();

			$this->load->view('configure/configure_header');
			$this->load->view('configure/view_user', $data);
			$this->load->view('configure/configure_footer');
		}else{
			echo 'You are not authorized to access this page. Please contact to system administrater.';
		}
    }
	
	//--------------------------------------------------------------
    /**
     * This function is used to list out all beat information.
     * 
     * @access		public
     * @since		1.0.0
     */
    public function edit_beat() {	    
			#load required model
			$this->load->model('Configure_access_model', 'obj_ca', TRUE);
			$current_user_id = $this->session->userdata('userID');
			//$current_user_id = 'all';
			
			$data['beat'] = $this->obj_ca->get_list_of_all_beats($current_user_id);

			$this->load->view('configure/configure_header');
			$this->load->view('configure/edit_beat', $data);
			$this->load->view('configure/configure_footer');
    }
		
	//--------------------------------------------------------------------
    /**
     * Handles requests for edit beat information in database.
     * 
     * @access		public
     * @since		1.0.0
     */
    public function edit_beat_information() {
        //array to store ajax responses
        $arr_response = array('status' => ERR_DEFAULT);

        //Load Required modal
        $this->load->model('configure_access_model', 'obj_ca', TRUE);
        $return_val = $this->obj_ca->edit_beat_information();
        if ($return_val) {
            $arr_response['status'] = SUCCESS;
            $arr_response['message'] = 'Beat has been updated successfully';
        } else {
            $arr_response['status'] = DB_ERROR;
            $arr_response['message'] = 'Something went Wrong! Please try again';
        }
        echo json_encode($arr_response);
    }
	
	//--------------------------------------------------------------
    /**
     * This function is used to list out new added beat information.
     * 
     * @access		public
     * @since		1.0.0
     */
    public function my_rack() {
		if($this->session->userdata('role') == 'admin'){
			#load required model
			$this->load->model('Configure_access_model', 'obj_ca', TRUE);
			//$current_user_id = $this->session->userdata('userID');
			$current_user_id = 'all';
			
			$data['beat'] = $this->obj_ca->get_list_of_all_beats($current_user_id);

			$this->load->view('configure/configure_header');
			$this->load->view('configure/new_added_beats', $data);
			$this->load->view('configure/configure_footer');
		}else{
			echo 'You are not authorized to access this page. Please contact to system administrater.';
		}
    }
	
	//--------------------------------------------------------------
    /**
     * This function is used to list out new added beat information.
     * 
     * @access		public
     * @since		1.0.0
     */
    public function my_ads() {
		if($this->session->userdata('role') == 'admin'){
			#load required model
			$this->load->model('Configure_access_model', 'obj_ca', TRUE);
			
			$data['ads'] = $this->obj_ca->get_list_of_ads();

			$this->load->view('configure/configure_header');
			$this->load->view('configure/my_ads',$data);
			$this->load->view('configure/configure_footer');
		}else{
			echo 'You are not authorized to access this page. Please contact to system administrater.';
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
        #array to hold value to be display
        $arr_response = array();
        $this->load->model('Configure_access_model', 'obj_ca', TRUE);

        $return_val = $this->obj_ca->update_ads();
        if ($return_val) {
            $arr_response['status'] = SUCCESS;
            $arr_response['message'] = "Ads has been updated successfully!";
        } else {
            $arr_response['status'] = DB_ERROR;
            $arr_response['message'] = "Something went Wrong! Please try again";
        }
        echo json_encode($arr_response);
    }
	//-------------------------------------------------------------------------
    /*
     * This function is used to remove ads from the list
     * 
     * @access		public
     * @since		1.0.0
     */
    public function remove_ads() {
        #array to hold value to be display
        $arr_response = array();
        $this->load->model('Configure_access_model', 'obj_ca', TRUE);

        $return_val = $this->obj_ca->remove_ads();
        if ($return_val) {
            $arr_response['status'] = SUCCESS;
            $arr_response['message'] = "Ads has been removed successfully!";
        } else {
            $arr_response['status'] = DB_ERROR;
            $arr_response['message'] = "Something went Wrong! Please try again";
        }
        echo json_encode($arr_response);
    }
	//-------------------------------------------------------------------------
    /*
     * This function is used to update beat status
     * 
     * @access		public
     * @since		1.0.0
     */
    public function update_beat_status() {
        #array to hold value to be display
        $arr_response = array();
        $this->load->model('Configure_access_model', 'obj_ca', TRUE);

        $return_val = $this->obj_ca->update_beat_status();
        if ($return_val) {
            $arr_response['status'] = SUCCESS;
            $arr_response['message'] = "Beat Status has been removed successfully!";
        } else {
            $arr_response['status'] = DB_ERROR;
            $arr_response['message'] = "Something went Wrong! Please try again";
        }
        echo json_encode($arr_response);
    }
	
	//-------------------------------------------------------------------------
    /*
     * This function is used to decativate user from the list
     * 
     * @access		public
     * @since		1.0.0
     */
    public function deactivate_user() {
        #array to hold value to be display
        $arr_response = array();
        $this->load->model('Configure_access_model', 'obj_ca', TRUE);

        $return_val = $this->obj_ca->deactivate_user();
        if ($return_val) {
            $arr_response['status'] = SUCCESS;
            $arr_response['message'] = "User has been removed successfully!";
        } else {
            $arr_response['status'] = DB_ERROR;
            $arr_response['message'] = "Something went Wrong! Please try again";
        }
        echo json_encode($arr_response);
    }
	//-------------------------------------------------------------------------
    /*
     * This function is used to decativate user from the list
     * 
     * @access		public
     * @since		1.0.0
     */
    public function deactivate_profile() {
        #array to hold value to be display
        $arr_response = array();
        $this->load->model('Configure_access_model', 'obj_ca', TRUE);

        $return_val = $this->obj_ca->deactivate_user();
        if ($return_val) {
            $arr_response['status'] = SUCCESS;
            $arr_response['message'] = "User has been removed successfully!";
        } else {
            $arr_response['status'] = DB_ERROR;
            $arr_response['message'] = "Something went Wrong! Please try again";
        }
        echo json_encode($arr_response);
    }
	
	//-------------------------------------------------------------------------
    /*
     * This function is used to remove beat from the list
     * 
     * @access		public
     * @since		1.0.0
     */
    public function remove_beat() {
        #array to hold value to be display
        $arr_response = array();
        $this->load->model('Configure_access_model', 'obj_ca', TRUE);

        $return_val = $this->obj_ca->remove_beat();
        if ($return_val) {
            $arr_response['status'] = SUCCESS;
            $arr_response['message'] = "User has been removed successfully!";
        } else {
            $arr_response['status'] = DB_ERROR;
            $arr_response['message'] = "Something went Wrong! Please try again";
        }
        echo json_encode($arr_response);
    }
	
	//-------------------------------------------------------------------------
    /*
     * This function is used to decativate user from the update_feature_place_of_beat
     * 
     * @access		public
     * @since		1.0.0
     */
    public function update_feature_place_of_beat() {
        #array to hold value to be display
        $arr_response = array();
        $this->load->model('Configure_access_model', 'obj_ca', TRUE);

        $return_val = $this->obj_ca->update_feature_place_of_beat();
        if ($return_val) {
            $arr_response['status'] = SUCCESS;
            $arr_response['message'] = "Feature has been enable on the beat!";
        } else {
            $arr_response['status'] = DB_ERROR;
            $arr_response['message'] = "Something went Wrong! Please try again";
        }
        echo json_encode($arr_response);
    }
		
	
	#**************************************************************************************#
	function save_reply(){
		$this->load->model('Configure_access_model', 'obj_ca', TRUE);
		$return_val = $this->obj_ca->save_reply();
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	
	
	function banner($action='',$id='') {
		if($this->session->userdata('role') == 'admin'){
			#load required model
			$this->load->model('Configure_access_model', 'obj_ca', TRUE);
			if($action != ''){
				if($action == 'delete'){
					$this->obj_ca->delete_banner($id);
					redirect($_SERVER['HTTP_REFERER']);
				}else if($action == 'add'){
					if($this->input->post('submit')){
						$this->obj_ca->add_banner();
						redirect('configure/banner');
					}else{
						$this->load->view('configure/configure_header');
						$this->load->view('configure/add_banner');
						$this->load->view('configure/configure_footer');
					}
				}
			}else{
				$data['banners'] = $this->obj_ca->get_list_of_all_banners();

				$this->load->view('configure/configure_header');
				$this->load->view('configure/banners', $data);
				$this->load->view('configure/configure_footer');
			}
			
		}else{
			echo 'You are not authorized to access this page. Please contact to system administrater.';
		}
    }
	
	
	
	
}

// end of class Configure_access
// end of file configure_access.php


 

  