<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Active_loans extends CI_Controller{

public function __construct()
{
	parent:: __construct();
	$this->load->database();
	$this->load->helper(array('form', 'url'));
	$this->load->model('active_loans_model');

}


function get_all_active()
{	$this->callHeader();
	$query=$this->active_loans_model->get_all_active();
	$this->load->view('loan/active_loans',array('active_loans'=>$query));
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

}?>