<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Borrower_Controller extends CI_Controller{

public function __construct()
{
	parent:: __construct();
	$this->load->database();
	$this->load->helper(array('form', 'url'));
	$this->load->model('borrower/active_loans_model');
	$this->load->model('borrower/previous_loans_model');

}


 function get_ledger()
{
	$loan_id=$this->input->post('loan_id');

	$info=$this->get_info($loan_id);
	$ledger=$this->previous_loans_model->get_ledger($loan_id);
	

	// echo json_encode($ledger);

	echo json_encode([ 
		'info' => $info,
		'ledger' => $ledger
	]);

	
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



function get_all_active()
{	
	$borrower_id=$this->input->get('id');
	// echo $borrower_id;
	

	$this->callHeader();
	$query=$this->active_loans_model->get_all_active($borrower_id);
	$this->load->view('borrower/active_loans',array('active_loans'=>$query));
	$this->callFooter();
}

function my_loan_records()
{
	$borrower_id=$this->input->get('id');
	// echo $borrower_id;
		
	// var_dump($ledger['loan_id']);
	// $loan_id=$this->input->post('loan_id');	

	// $ledger=$this->populate_ledger($loan_id);
	// $info=$this->get_info($loan_id);

	

	$this->callHeader();
	$query=$this->active_loans_model->my_loan_records($borrower_id);
	$this->load->view('borrower/previous_loans',['active_loans'=>$query,]);
	$this->callFooter();
}


public function callHeader()
	{
		$this->load->view('header');
		$this->load->view('nav-bar');
		$this->load->view('borrower/side-bar');
	}

public function callFooter()
	{
		$this->load->view('footer');
	}




	

}?>