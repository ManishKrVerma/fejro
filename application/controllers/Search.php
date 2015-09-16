<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	/**
	 * This function is used to get list of all beat by there category
	 */
	public function beat(){		
		$category = $this->input->get('category');
		$beat = $this->input->get('beat');
		
		
		#loading required modal
        $this->load->model('search_model', 'obj_beat', TRUE);
        $data['details'] = $this->obj_beat->get_detail_of_beat_by_beat_search($category,$beat);
		
		$data['cart_info'] = $this->obj_beat->get_user_cart_info();
		$data['session_id']=$this->session->userdata('userID');
		
		$this->load->view('components/header',$data);
		$this->load->view('beat_list',$data);
		$this->load->view('components/footer');	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
