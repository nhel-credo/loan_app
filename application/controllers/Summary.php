<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Summary extends CI_Controller
{

	 function __construct()
	 {
	 	parent::__construct();

	 	$this->load->helper(array('form', 'url'));
	 	$this->load->database();
	 	$this->load->model('summary_model');
	 }


	function active_loan_summary()
	{
		$summary_data= $this->summary_model->active_loan_summary();
		$this->callHeader();
		$this->load->view('loan/summary',array('summary_data'=>$summary_data));
		$this->callFooter();
	}

	function callHeader()
	{
		$this->load->view('header');
		$this->load->view('nav-bar');
		$this->load->view('side-bar');
	}

	 function callFooter()
	{
		$this->load->view('footer');
	}


	function get_maturity($loan_id)
	{

		$query=$this->schedule_model->get_details($loan_id);
		
		foreach ($query as $value) {
			$term=$value->plan;
			$m= date('Y-m-d',strtotime($value->date_released.'+'.$term.' month'));
			// $maturity= date('Y-m-d',strtotime($m.'-1 month'));
	    	
		}
		return $m;
		// var_dump($maturity);
	}

}
?>