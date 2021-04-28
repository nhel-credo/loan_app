<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Loan extends CI_Controller{

 public function __construct(){
	
	parent:: __construct();

	$this->load->database();
	$this->load->model('loan_model');
	$this->load->helper(array('form', 'url'));


	}

	function insert(){
		$type=$this->input->post('loan_type');
		$desc=$this->input->post('description');
		$data = array(
			'type' =>$type,
			'description'=>$desc,
			
			 );
		// var_dump($data);
		$this->loan_model->insert($data);

	}


 

	public function get_loan_type()
	{
		$this->callHeader();
		$result['data']=$this->loan_model->get_loan_type();
		$this->load->view('loan/loan-types',$result);
		$this->callFooter();
	}

	function delete_type()
	{
		$id=$this->input->post('id');	
		$query=$this->loan_model->delete_type($id);
	
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

	function getby_id()
	{
		$id=$this->input->post('id');
		$result=$this->loan_model->getby_id($id);
		echo json_encode($result);
	}

	function on_save_changes()
	{
		$id=$this->input->post('id');
		$data = array(
			'type' =>$this->input->post('update-type'),
			'description'=>$this->input->post('update-description'),

		 );	
		$this->loan_model->on_save_changes($id,$data);
	}


	function loan_form()
	{
		$this->load->view('header');
		$this->load->view('loan/loan-form');
		// $this->callFooter();
	}



	function test()
	{
		$this->load->model('deduction_model');
		$result=$this->deduction_model->get_loan_deductions();
		$this->load->view('header');
		$this->load->view('loan/loan-records',array('deductions' => $result,));
	}

}