<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('registration');
	}
	
	  //--------------------------------------------------------------------
    /**
     * Handles requests for adding new user into database
     * 
     * @access		public
     * @since		1.0.0
     */
    public function add_new_user() {
        //array to store ajax responses
        $arr_response = array('status' => ERR_DEFAULT); /* 500 */


            #loading the require model
            $this->load->model('Registration_model', 'obj_re', TRUE);
            #calling the function to register a new user into the database
            $return_value = $this->obj_re->add_new_user();
            if ($return_value) {
                $arr_response['status'] = SUCCESS; /* 200 */
                $arr_response['message'] = 'User has been added successfully';
            } else {
                $arr_response['status'] = DB_ERROR; /* 201 */
                $arr_response['message'] = 'Something went Wrong! Please try again';
            }
        echo json_encode($arr_response);
    }
	
	 //------------------------------------------------------------------------------
    /**
     * This function is used to check weather entered email is already exists or not.
     */
    public function check_availability() {

        #array to hold the response values to be displayed
        $arr_response = array();

        #default response status message
        $arr_response['status'] = ERR_DEFAULT;

        #loading the require model
        $this->load->model('Registration_model', 'obj_ca', TRUE);
        #checking if parameter already exists
        $result = $this->obj_ca->check_availability();
        if ($result) {
            echo 'true';
        } else {
            echo 'false';
        }
        // echo json_encode($arr_response);
    }
	
	//--------------------------------------------------------------------
    /**
     * Handles requests for checks the login credentials entered by the users.
     * 
     * @access		public
     * @since		1.0.0
     */
    public function check_login_credentials() {
        //array to store ajax responses
        $arr_response = array('status' => ERR_DEFAULT); /* 500 */


            #loading the require model
            $this->load->model('Registration_model', 'obj_re', TRUE);
            #calling the function to register a new user into the database
            $return_value = $this->obj_re->check_login_credentials();
			if($return_value == 'admin'){
				$arr_response['redirect']= 'configure';
			}else {
                $arr_response['redirect']= 'configure';
            }
            if ($return_value) {
				$arr_response['status'] = SUCCESS; /* 200 */
				$arr_response['message'] = 'User has been added successfully';			
            } else {
                $arr_response['status'] = DB_ERROR; /* 201 */
                $arr_response['message'] = 'Something went Wrong! Please try again';
            }
        echo json_encode($arr_response);
    }
	
}
