<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Deduction extends CI_Controller{

 public function __construct(){
	
	parent:: __construct();

	$this->load->database();
	$this->load->model('deduction_model');
	$this->load->helper(array('form', 'url'));


	}

	function insert(){
		$deductions=$this->input->post('deductions_name');
		$amount=$this->input->post('amount');
		$data = array(
			'deductions_name' =>$deductions,
			'amount'=>$amount,			
			 );
		// var_dump($data);
		$this->deduction_model->insert($data);

	}


 

	public function get_loan_deductions()
	{
		$this->callHeader();
		$result['data']=$this->deduction_model->get_loan_deductions();
		$this->load->view('loan/deductions',$result);
		$this->callFooter();
	}

	function delete_deductions()
	{
		$id=$this->input->post('id');	
		$query=$this->deduction_model->delete_deductions($id);
	
	}


	

	public function callHeader()
	{
		$this->load->view('header');
		$this->load->view('nav-bar');
		$this->load->view('side-bar');
	}

public function callFooter()
	{
		$this->load->view('footer');
	}

	function getby_id()
	{
		$id=$this->input->post('id');
		$result=$this->deduction_model->getby_id($id);
		echo json_encode($result);
	}

	function on_save_changes()
	{
		$id=$this->input->post('id');
		$data = array(
			'deductions_name' =>$this->input->post('update_deductions_name'),
			'amount'=>$this->input->post('update_amount'),

		 );	
		$this->deduction_model->on_save_changes($id,$data);
	}


	function loan_form()
	{
		$this->load->view('header');
		$this->load->view('loan/loan-form');
		// $this->callFooter();
	}

}