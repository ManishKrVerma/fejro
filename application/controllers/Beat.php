<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beat extends CI_Controller {

	/**
	 *  This function is used to get details of a particular beat  by beat_id
	 */
	public function details(){
		$beat_id = $this->uri->segment(3);
		
		#loading required modal
        $this->load->model('Beat_model', 'obj_beat', TRUE);
        $data['details'] = $this->obj_beat->get_detail_of_beat_by_beat_id($beat_id);
		$data['producer_beat_details'] = $this->obj_beat->get_detail_of_beat_list_of_producer_beat();
		
		$data['cart_info'] = $this->obj_beat->get_user_cart_info();
		$data['session_id']=$this->session->userdata('userID');
		
		$this->load->view('components/header',$data);
		$this->load->view('beat_detail',$data);
		$this->load->view('components/footer');		
	}

	/**
	 *  This function is used to update card of a user
	 */
	public function update_cart_by_id(){
		//array to store ajax responses
        $arr_response = array('status' => ERR_DEFAULT);

		#Load Required modal
		$this->load->model('Beat_model', 'obj_ca', TRUE);

		$return_val = $this->obj_ca->update_cart_by_id();
		if ($return_val) {
			$arr_response['status'] = SUCCESS;
			$arr_response['message'] = 'cart has been updated successfully';
			$arr_response['cart_id'] = $return_val;
		} else {
			$arr_response['status'] = DB_ERROR;
			$arr_response['message'] = 'Something went Wrong! Please try again';
		}
        echo json_encode($arr_response);
	}
	
	
	/***************************************************************************************/
	
	function save_message(){
		$this->load->model('Beat_model', 'obj_ca', TRUE);
		$this->load->model('Registration_model', 'obj_rm', TRUE);
		if($this->session->userdata('userID') != ''){
			$result = true;
		}else{
			$result = $this->obj_rm->check_availability();
		}
		
		/*if($result){*/
			$res = $this->obj_ca->save_message($result);
			if($res){
				$return['message'] = $res;
				$return['status'] = 'success';
			}else{
				$return['message'] = $res;
				$return['status'] = 'error';
			}
		/*}else{
			$return['message'] = 'Email already exists.Please login to comment with this email.';
			$return['status'] = 'error';
		}*/
		
		echo json_encode($return);
	}

	
	
	
	
	
	
	
	
	
	
	
	
	
}
