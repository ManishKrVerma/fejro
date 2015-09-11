<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	/**
	 * This function is used to get list of all beat by there category
	 */
	public function beat(){		
		$beat_cat = $this->uri->segment(3);
		
		
		#loading required modal
        $this->load->model('Beat_model', 'obj_beat', TRUE);
        $data['details'] = $this->obj_beat->get_detail_of_beat_by_beat_cat($beat_cat);
		
		$data['cart_info'] = $this->obj_beat->get_user_cart_info();
		$data['session_id']=$this->session->userdata('userID');
		
		$this->load->view('components/header',$data);
		$this->load->view('beat_list',$data);
		$this->load->view('components/footer');	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
