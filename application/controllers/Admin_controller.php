<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller{

public function index(){
	$this->callHeader();
	$this->load->view('admin/dashboard');
	
}


	public function callHeader()
	{
		$this->load->view('header');
		
		$this->load->view('side-bar');
	}

	public function callFooter()
	{
		$this->load->view('footer');
	}

}


?>