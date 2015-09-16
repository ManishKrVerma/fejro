<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('messages_model','mm',true);
	}

	function index(){
		$this->mm->allMessages();
	}
	
}
