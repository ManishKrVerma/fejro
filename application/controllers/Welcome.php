<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * this controller is sccript for add to cart/ product info on new page.
	 */
	public function index()	{
		
		$this->load->model('Welcome_model', 'obj_wel', TRUE);
        $this->load->model('Beat_model', 'obj_beat', TRUE);
		
		$data['profile_detail'] = $this->obj_wel->get_profile_details_of_user();/*use to get only one beat  only for testing*/
		$data['all_beat'] = $this->obj_wel->get_beat_of_all_beat();
		$data['dance'] = $this->obj_wel->get_beat_by_item_gener_dance();
		$data['Rap'] = $this->obj_wel->get_beat_by_item_gener_Rap();
		$data['Soul'] = $this->obj_wel->get_beat_by_item_gener_Soul();
		$data['reggae'] = $this->obj_wel->get_beat_by_item_gener_reggae();
		$data['Rock'] = $this->obj_wel->get_beat_by_item_gener_Rock();
		
		$data['feature1'] = $this->obj_wel->get_detail_of_beat_by_feature1();
		$data['feature3'] = $this->obj_wel->get_detail_of_beat_by_feature3();
		$data['feature2ads'] = $this->obj_wel->get_detail_of_ads();
		
		$data['cart_info'] = $this->obj_beat->get_user_cart_info();
		$data['session_id']=$this->session->userdata('userID');
		
		$this->load->view('components/header',$data);
		$this->load->view('welcome_message',$data);
		$this->load->view('components/footer');
		
	}
	
	// ** $this->load->view('product'); ** /
	
	// **this function is used to show selected product info. / 		
	public function product()
	{
		$this->load->model('Welcome_model','obj_wel',TRUE);
		$data['profile_detail'] = $this->obj_wel->get_add_to_cart();
		$data['session_id']=$this->session->userdata('userID');
		
		$this->load->view('components/header',$data);
		$this->load->view('beat_detail',$data);
		$this->load->view('components/footer');
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
