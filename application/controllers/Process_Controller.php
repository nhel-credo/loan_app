<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Process_Controller extends CI_Controller{

public function __construct()
{
	parent:: __construct();
	$this->load->database();
	$this->load->helper(array('form', 'url'));
	$this->load->model('process_model');

}





function get_records()
{
	$this->callHeader();
	$this->load->view('loan/loan-records');
}

function view_loans()
{	$this->load->view('nav-bar');
	$this->load->view('header');
	$this->load->view('side-bar');
	$this->load->view('loan/loans');
	$this->load->view('footer');
}
//this is for admins
function get_loans()
{
	$this->callHeader();
	$data=$this->process_model->get_loans();
	$this->load->view('loan/loans',array('loan_data'=>$data,));
	$this->callFooter();	
}
//this is for staff
function get_loans_approvals()
{
	$this->callHeader();
	$data=$this->process_model->get_loans();
	$this->load->view('staff/loans',array('loan_data'=>$data,));
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


function create_new_loan()
{
	$loan_id=$this->refID();
	$borrower_id=$this->input->post('borrower_id');

	$data = array(
		'borrower_id' =>$this->input->post('borrower_id'),
		'loan_id'=>$loan_id,
		'loan_type'=>$this->input->post('loan_type'),
		'description'=>$this->input->post('loan_description'),
		'purpose'=>$this->input->post('loan_purpose'),
		'amount'=>$this->input->post('loan_amount'),
		'plan'=>$this->input->post('loan_term'),
		'interest_rate'=>$this->input->post('interest_rate'),
		'penalty_rate'=>$this->input->post('penalty_rate'),
		'collateral'=>$this->input->post('collateral'),
		'image'=>$this->upload_image(),
		'approve_status'=>'for approval',
		);

	$reference=$this->insert_references($loan_id);
	$deductions=$this->insert_deductions($loan_id,$borrower_id);
	$this->process_model->create_new_loan($data);	

}


function loan_statement()
{	


	$loan_id=$this->input->get('id');
	$q1=$this->get_total_deductions($loan_id);
	$q2=$this->get_deductions_byID($loan_id);
	$q3=$this->get_loans_byID($loan_id);

	
	$this->load->view('header');
	$this->load->view('script');
	$query=$this->load->view('loan/loan-statement',
		array(
			'tt_deductions' =>$q1,
			'deductions'=>$q2,
			'loans'=>$q3,
			 ));
	
}

function get_total_deductions($loan_id)
{
	$query=$this->process_model->get_total_deductions($loan_id);
	return $query;
}

function get_deductions_byID($loan_id)
{
	$query=$this->process_model->get_deductions_byID($loan_id);
	return $query;
}

function get_loans_byID($loan_id)
{
	
	$query=$this->process_model->get_loans_byID($loan_id);	
	return $query;
}

function insert_references($loan_id)
{
	// $loan_id=$this->refID();

	$dd=$this->input->post('co-maker');
 	$counter = count($dd);    
  
    for($i=0; $i < $counter; $i++)
    {
      
      $data = array(      	
      	'co_maker'=>$this->input->post('co-maker')[$i],
      	'contact'=>$this->input->post('contact')[$i],
      	'borrower_id'=>$this->input->post('borrower_id'),
      	'loan_id'=>$loan_id,
      );

	$query=$this->process_model->insert_references($data);
	}
}


function refID(){

$year=substr(date('Y'), -2);
$date=date("m-d");
$rand = sprintf("%04d", rand(0,9999));
$unique = $year.$date . $rand;
return $unique;

}



function insert_deductions($loan_id,$borrower_id)
{

$this->load->model('deduction_model');
$d=$this->deduction_model->get_loan_deductions();   
  
    for($i=0; $i < count($d); $i++)
    {
      
      $data = array(
      	'deduction_name'=>$d[$i]->deductions_name,      	
      	'amount'=>$d[$i]->amount,
      	'borrower_id'=>$borrower_id,
      	'loan_id'=>$loan_id,
      );
      // var_dump($data);
      $query=$this->process_model->insert_deductions($data);
    }
			if($query){
				echo 'inserted';
			}else
			{
				echo 'failed';
			}	
	}

	function upload_image()  
      {  
           if(isset($_FILES["collateral_image"]))  
           {  
                $extension = explode('.', $_FILES['collateral_image']['name']);  
                $new_name = rand() . '.' . $extension[1];  
                $destination = './upload/collateral/' . $new_name;  
                move_uploaded_file($_FILES['collateral_image']['tmp_name'], $destination);  
                return $new_name;  
           }

           if(isset($_FILES["update_user_image"]))  
           {  
                $extension = explode('.', $_FILES['update_user_image']['name']);  
                $new_name = rand() . '.' . $extension[1];  
                $destination = './upload/collateral/' . $new_name;  
                move_uploaded_file($_FILES['update_user_image']['tmp_name'], $destination);  
                return $new_name;  
           }   
      }


function approve_status()
{
	$loan_id=$this->input->post('id');
	$status=$this->input->post('status');
	$cur_date=date("Y-m-d");
	$borrower_id=$this->input->post('borrower_id');
	$total_payable=$this->get_total_payable($loan_id);
	
	if($status=="approved"){
	$this->process_model->approve_status($loan_id,$status,$cur_date);
	}

	if($status=="denied")
	{
		$this->process_model->denied($loan_id,$status);
	}
	if($status=="released")
	{
		$this->process_model->released($loan_id,$status,$cur_date);
		$this->on_is_current($borrower_id,$loan_id);
		$this->set_next_payment($loan_id,$cur_date,$borrower_id,$total_payable);
	}
	
}

function get_total_payable($loan_id)
{
	$data=$this->process_model->get_loans_byID($loan_id);
	foreach ($data as $value) {
		$loan_amount= $value->amount;
			   $term= $value->plan;
		   $interest= $value->interest_rate;
	}

	$balance= ($loan_amount*$interest)/100*$term+$loan_amount;
	return $balance;
	
}

function set_next_payment($loan_id,$cur_date,$borrower_id,$total_payable)
{
	$next_payment = date('Y-m-d', strtotime("+1 months", strtotime($cur_date)));
	$data = array(
		'borrower_id' =>$borrower_id ,
		'loan_id'=>$loan_id,
		'next_payment'=>$next_payment,
		'total_balance'=>$total_payable );

	$this->process_model->set_next_payment($data);
}



function on_is_current($borrower_id,$loan_id)
{
	$data = array(
		'borrower_id' =>$borrower_id,
		'loan_id'=>$loan_id,
		'is_current'=>"current" );

	$this->process_model->on_is_current($data);
}





}?>