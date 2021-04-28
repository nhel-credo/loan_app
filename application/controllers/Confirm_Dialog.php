<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirm_Dialog extends CI_Controller{

function __construct()
{
	parent:: __construct();
	$this->load->library('toastr');
}

public function success_dialog()
{
	$this->load->view('header');
	$this->load->view('confirmations/success-dialog');
}

}


?>