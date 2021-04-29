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

	function monthly_summary()
	{	
		$from="2021-04-01";
		$to="2021-04-30";
		// $from=$this->input->post('from');
		// $to= $this->input->post('to');
		$summary_data=$this->summary_model->monthly_summary($from,$to);

		$this->callHeader();
		$this->load->view('loan/monthly_summary',array('data'=>$summary_data,));
		$this->callFooter();
		// var_dump($summary_data)	;
		// echo $from.$to;	
		// echo json_encode($summary_data);
	}

	function get_payment_summary()
	{	
		// $from="2021-04-01";
		// $to="2021-04-30";
		// $id=$this->input->post('id');
		$from= $this->input->post('from');
		$to= $this->input->post('to');
		$summary_data=$this->summary_model->monthly_summary($from,$to);
		echo json_encode($summary_data);
		
	}


	function borrower_detailed()
	{
		$query=$this->summary_model->detailed_borrower();
		$this->callHeader();
		$this->load->view('loan/borrower_detailed',array('detail'=>$query));
		$this->callFooter();
		// var_dump($query);

	}

	function callHeader()
	{
		$this->load->view('header');
		$this->load->view('nav-bar');
		$this->load->view('staff/side-bar');
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