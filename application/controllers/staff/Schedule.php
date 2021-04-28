<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Schedule extends CI_Controller{

 public function __construct()
 {
 		parent:: __construct();

 	$this->load->database();
	
	$this->load->model('schedule_model');
	$this->load->helper(array('form', 'url'));
 }



 function test_date()
{
$begin = new DateTime( '2012-01-01' );
$end = new DateTime( '2012-08-01' );
$end = $end->modify( '+30 day' ); 

$interval = new DateInterval('P1M');
$daterange = new DatePeriod($begin, $interval ,$end);

	foreach($daterange as $date){
	    $date->format("Y-m-d");
	}
	echo $date;
}

function date_schedule($loan_id) {

	$monthly=$this->get_monthly($loan_id);
	$interest=$this->monthly_interest($loan_id);
	$principal=$this->get_principal($loan_id);

	$release=$this->get_date_release($loan_id);
	$maturity=$this->get_maturity($loan_id);

	$first=$release;
	$last=$maturity;
	

    $datas = [];
    $current = strtotime( $first );
    $last = strtotime( $last );
    $step = '+1 month';
    $format = 'm-d-Y';

    while( $current < $last ) {

    	$current = strtotime( $step, $current );
        $datas[]= array(
        	'dates'=> date( $format, $current),
        	'principal'=>$principal,
        	'interest'=>$interest,
        	'monthly'=>$monthly,
        	'penalty'=>"0" );       
        
    }
    return $datas;
   // var_dump($datas);
    
}

function monthly_interest($loan_id)
{
	$query=$this->schedule_model->get_details($loan_id);	
	foreach ($query as $value) {
		$term=$value->plan;
		$amount=$value->amount;
		$interest_rate=$value->interest_rate;
		$interest=$amount*$interest_rate/100;    	
	}
	// var_dump($interest);
	return $interest;
}

function get_principal($loan_id)
{

	$query=$this->schedule_model->get_details($loan_id);	
	foreach ($query as $value) {
		$term=$value->plan;
		$amount=$value->amount;
		$principal=$amount/$term;
    	
	}
		return $principal;
}

function get_monthly($loan_id)
{
	$query=$this->schedule_model->get_details($loan_id);
	
	foreach ($query as $value) {
		$term=$value->plan;
		$amount=$value->amount;
		$interest=$value->interest_rate;
		$total_interest=($amount*$interest/100)*$term;
		$total_payable=$total_interest+$amount;
		$monthly=$total_payable/$term;    	
	}
	return $monthly;
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

function get_date_release($loan_id)
{
	$query=$this->schedule_model->get_details($loan_id);	
	foreach ($query as $value) {
		
    	// $release=date('Y-m-d',strtotime($value->date_released.'+1 month'));
    	$release=$value->date_released;
	}
	return $release;
	// var_dump($release);
	
}


function get_details($loan_id)
{
	
	$query=$this->schedule_model->get_details($loan_id);
	return $query;
	
}

function populate_schedule()
{
	$this->load->view('header');

	$loan_id=$this->input->get('id');

	$schedule=$this->date_schedule($loan_id);
	$data=$this->get_details($loan_id);

	$this->load->view('loan/schedule',array('data'=>$data,'schedule'=>$schedule));
}



}?>
