<?php

if (!defined('BASEPATH'))
    exit('Not a valid request!');

/**
 * Model Class to handle DB related operations for
 * authorization of a user.
 *
 * @version     0.0.1  
 * @created on 	27 May,2015 
 * @created by 	Chaturbhuj Prajpat <chaturbhuj@lennoxsoft.com>
 */
class Registration_model extends CI_Model {

    /**
     * Default Constructor
     * 
     * @access  public
     * @since   0.0.1
     */
    public function __construct() {
        parent::__construct();
    }
	
	//-------------------------------------------------------------------------
    /*
     * add new_user_into_database into databse
     */
    public function add_new_user() {
        date_default_timezone_set('Asia/Kolkata');
        #Generate hashed password.
        $hashed_password = sha1('admin' . (md5('admin' . $_POST['passwd'])));
        $data = array(
            'email' => $_POST['email'],
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'password_hash' => $hashed_password,
            'created_date' => date('Y-m-d'),
            'created_time' => date('H:m:s'),
        );
        $result = $this->db->insert('fejiro_users', $data);
		$insert_id = $this->db->insert_id();
		$data1 = array(
            'FK_userid_id' => $insert_id,
        );
		$this->db->insert('fejiro_profile', $data1);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	
	 //-------------------------------------------------------------------------
    /*
     * This function is used to check availability of email etc.
     */
    public function check_availability() {
        if ($_POST['param'] == 'registration') {
            $db_result = $this->db->get_where('fejiro_users', array('email' => $_POST['email']));
        } else if ($_POST['param'] == 'edit_users') {
            $db_result = $this->db->get_where('fejiro_users', array('email' => $_POST['edit_user_email']));
        }
        if ($db_result && $db_result->num_rows() > 0) {
            #param already exists
            return FALSE;
        } else {
            return TRUE;
        }
    }
	
	//--------------------------------------------------------------------------  
    /**
     * This function checks the login credentials entered by the users.
     * 
     * @access  public 
     * @return  boolean     TRUE if login credentials are correct otherwise FALSE
     * @since   0.0.1 
     */
    public function check_login_credentials() {
        if (empty($_POST)) {
            return FALSE;
        }
        $this->db->where('email', $_POST['loginUserEmail']);
        $this->db->where('password_hash', sha1('admin' . (md5('admin' . $_POST['loginPassword']))));
        $db_result = $this->db->get('fejiro_users');

        if ($db_result && $db_result->num_rows() == 1) {
            #login credentials matched

            $row = $db_result->row();
            #setting up the session variables
            $this->session->set_userdata(array(
                'userID' => $row->user_id,
                'userEmail' => $row->email,
                'loggedIN' => 1,
                'userName' => $row->firstname,
                'role' => $row->role,
            ));
            return $row->role;
        } else {
            #query failed or no matching values found
            return FALSE;
        }
    }
	
	
	}
?>