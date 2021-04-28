<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Controller extends CI_Controller{


	function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->model('home_model');
		$this->load->helper(array('form', 'url'));
	}

public function index(){

$borrower=$this->count_borrower();
$payments_today=$this->payments_today();
$current_loan=$this->get_current_loan();
$count_due=$this->count_if_due();
$total_released=$this->total_released();
$total_recievable=$this->total_recievable();

// var_dump($payments_today);
$data= array(
	'borrower' =>$borrower,
	'payments'=>$payments_today,
	'current_loan'=>$current_loan,
	'count_due'=>$count_due,
	'total_released'=>$total_released,
	'total_recievable'=>$total_recievable );

// die;

	$this->callHeader();
	$this->load->view('home',$data);
	$this->callFooter();
	
}

function total_recievable()
{
	$query=$this->home_model->total_recievable();
	return $query[0]->total_balance;
}

function total_released()
{
	$query=$this->home_model->total_released();
	return $query[0]->total_released;
}

function count_if_due()
{
	$cur_date=date('Y-m-d');
	$query=$this->home_model->count_if_due($cur_date);
	return $query[0]->due_today;
}

function get_current_loan()
{
	$query=$this->home_model->get_current_loan();
	return $query[0]->current_loan;
}

function count_current_loan()
{
	echo $this->get_current_loan();
}

function payments_today()
{
	$cur_date=date('Y-m-d');
	$query=$this->home_model->payments_today($cur_date);
	return $query[0]->total_payment;
}

function count_borrower()
{
	$query=$this->home_model->count_borrower();
	
	return $query[0]->total_borrower;
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




}?>