<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// use application\libraries\header;

Class Login extends CI_Controller{


function __construct(){
	parent:: __construct();
	$this->load->model('login_model');
	$this->load->database();
	$this->load->helper(array('form', 'url'));
	$this->load->view('header');
	$this->load->model('home_model');
	$this->load->library('session');

}
	

	public function index()
	{

	$this->session->set_flashdata('err_msg',null);
	$this->load->view('header');
	$this->load->view('login_form');
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

	protected function clearCache()
	{
    $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    $this->output->set_header('Pragma: no-cache');
    $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

	}

	 public function logout()
    {
    	$this->clearCache();
  
        redirect('login');
    }

	function user_login()
	{
		$user=$this->input->post('username');
		$password=$this->input->post('password');
		// $user="admin@admin.com";
		// $password="admin";
		$user_info=$this->get_user_info($user,$password);
		$borrower_info=$this->get_borrower_info($password);
		

		$query=$this->login_model->user_login($user,$password);

		$msg="";
		
		if($query)
		{

			// $this->set_login_status($user,$password,'1');
			
			if($query[0]->role=="Admin")
			{
				$this->session->set_userdata(array('user_info'=>$user_info));
				$this->load->view('nav-bar');
				$this->load->view('side-bar');
				$this->dashboard();
				$this->callFooter();
			}
			if($query[0]->role=="Staff")
			{
				$this->session->set_userdata(array('user_info'=>$user_info));
				$this->load->view('nav-bar');
				$this->load->view('staff/side-bar');
				$this->dashboard();
				$this->callFooter();
			}
			if($query[0]->role=="borrower")
			{

				
				$this->session->set_userdata(array('user_info'=>$borrower_info));
				$this->load->view('nav-bar');
				$this->load->view('borrower/side-bar');
				$this->dashboard();
				$this->callFooter();
			}

		}
		else
		{
			
			$msg="<div class='text-center alert alert-danger alert-dismissible fade show' role='alert' style='color: #721c24;background-color: #f8d7da;border-color: #f5c6cb'><strong>Login Failed!</strong> User Not Found!</div>";
			// $session['error_msg']=$msg;	
			$this->session->set_flashdata('err_msg',$msg);		
			return $this->load->view('login_form');
		
		}


	}


	function get_user_info($user,$password)
	{
		$query=$this->login_model->get_user_info($user,$password);
		return $query;
	}

	function get_borrower_info($password)
	{
		$query=$this->login_model->get_borrower_info($password);
		return $query;
	}

	function set_login_status($user,$password,$status)
	{
		$query=$this->login_model->set_login_status($user,$password,$status);
	}





 function dashboard(){

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

	// $this->callHeader();
	$this->load->view('home',$data);
	// $this->callFooter();
	
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


}

?>