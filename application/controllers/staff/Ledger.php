<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Ledger extends CI_Controller{

 public function __construct()
 {
 		parent:: __construct();

 	$this->load->database();
	
	$this->load->model('ledger_model');
	$this->load->helper(array('form', 'url'));
 }


 function get_ledger()
{
	$loan_id=$this->input->get('id');	
	$ledger=$this->populate_ledger($loan_id);
	$info=$this->get_info($loan_id);

	
	$this->load->view('header');
	$this->load->view('loan/ledger',array('ledger'=>$ledger,'info'=>$info ));

	
}

function get_info($loan_id)
{
	$this->load->model('ledger_model');
	$info=$this->ledger_model->get_borrower_info($loan_id);
	return $info;
}

function populate_ledger($loan_id)
{
	$this->load->model('ledger_model');
	$ledger=$this->ledger_model->get_ledger($loan_id);
	return $ledger;
}

}?>