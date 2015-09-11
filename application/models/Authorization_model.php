<?php

if (!defined('BASEPATH'))
    exit('Not a valid request!');

/**
 * Model Class to handle DB related operations for
 * authorization of a user.
 *
 * @version     0.0.1
 */
class Authorization_model extends CI_Model {

    /**
     * Default Constructor
     * 
     * @access  public
     * @since   0.0.1
     */
    public function __construct() {
        parent::__construct();
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
        $this->db->where('email', $_POST['username']);
        $this->db->where('password_hash', sha1('admin' . (md5('admin' . $_POST['password']))));
        $db_result = $this->db->get('mayas_users');

        if ($db_result && $db_result->num_rows() == 1) {
            #login credentials matched

            $row = $db_result->row();
            #setting up the session variables
            $this->session->set_userdata(array(
                'userID' => $row->user_id,
                'userEmail' => $row->email,
                'loggedIN' => 1,
                'userName' => $row->username,
            ));
            return TRUE;
        } else {
            #query failed or no matching values found
            return FALSE;
        }
    }

    //--------------------------------------------------------------------------  
    /**
     * This function checks the user email id and send the link for update password.
     * 
     * @access  public 
     * @return  boolean    
     * @since   0.0.1 
     */
    public function send_link_for_reset_password() {
        /* setup mail details */
        ini_set('SMTP', 'relay-hosting.secureserver.net');
        $subject = '';
        $headers = "From: Freshers Campus <job@xxx.co.in>\r\n";
        $headers .= "Reply-To: job@xxx.co.in\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $message = '<html><body>';
        $message .= $data;
        $message .= '</body></html>';

        /* Fatch email ids from db from starting point to end point */
        $this->db->where('email_id >=', $_POST['start']);
        $this->db->where('email_id <', $_POST['end']);
        $this->db->where('fresher', 'active');
        $email_result = $this->db->get('meonlinejobhub_email');
        if ($email_result && $email_result->num_rows() > 0) {
            foreach ($email_result->result() as $datam) {
                $to = $datam->emails;
                mail($to, $datam->emails, $message, $headers);
            }
            return TRUE;
        }
    }

}

//End of class Authorization_model

//End of file authorization_model.php
/* Location: ../../models/authorization/authorization_model.php */