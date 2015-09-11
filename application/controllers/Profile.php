<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	/**
	 * This function is used to get list of all beat by there category
	 */
	public function producer(){		
		$producer_id = $this->uri->segment(3);		
		
		#loading required modal
        $this->load->model('Beat_model', 'obj_beat', TRUE);
        $this->load->model('Profile_model', 'obj_profile', TRUE);
        $data['details'] = $this->obj_profile->get_detail_of_producer_by_producer_id($producer_id);
        $data['beats_add_by_producer'] = $this->obj_profile->get_detail_of_beat_list_of_producer_beat($producer_id);
		
		$data['cart_info'] = $this->obj_beat->get_user_cart_info();
		$data['session_id']=$this->session->userdata('userID');
		
		$this->load->view('components/header',$data);
		$this->load->view('producer_info',$data);
		$this->load->view('components/footer');	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
