<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class registration_form extends CI_Controller{


public function index()
{
$this->callHeader();
$this->load->view('registration/registration-form');
$this->callFooter();
}

public function callHeader()
	{
		$this->load->view('header');
		$this->load->view('nav-bar');
		$this->load->view('staff/side-bar');
	}

	public function callFooter()
	{
		$this->load->view('footer');
	}


}

?>