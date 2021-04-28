<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Borrower extends CI_Controller{

 public function __construct(){
	
	parent:: __construct();

	$this->load->database();
	$this->load->model('borrowers_model');
	$this->load->model('process_model');
	$this->load->helper(array('form', 'url'));
	$this->load->model('payment_model');
	$this->load->model('plan_model');

}

function insert_payment(){
	$loan_id=$this->input->post('loan_id');
	$balance=$this->input->post('balance');
	$payment_date=$this->input->post('payment_date');
	$monthly_principal=$this->input->post('monthly_principal');
	$monthly_interest=$this->input->post('monthly_interest');
	$penalty=$this->input->post('penalty');
	$monthly_payable=$this->input->post('amount');

	$payment_amount=$this->input->post('payment_amount');
	$existing_balance=$this->input->post('existing_balance');
	$existing_penalty=$this->input->post('existing_penalty');
	$date=date("Y-m-d");
	

	$next_payment = date('Y-m-d', strtotime("+1 months", strtotime($payment_date)));
	
	$total_dues=$existing_balance+$existing_penalty;

	$overall_penalties=$penalty+$existing_penalty;

	$change=$payment_amount-$existing_balance-$existing_penalty-$penalty;
	$current_balance=$balance-$change;

	$total_payment=$payment_amount;
	$net= $total_payment-$penalty-$total_dues;
	$remaining_payments=$monthly_payable-$net;

	$data =array(
		'loan_id'=> $loan_id,
		'principal'=>$monthly_principal,
		'interest'=>$monthly_interest,
		'penalties'=>$penalty,
		'total_payment'=>$total_payment,
		'balance'=>$current_balance,
		'date_created'=>$date,
		'existing_balance'=>$existing_balance,
		'existing_penalty'=>$existing_penalty,
		 );

	// $remaining=$monthly_payable-$total_payment;

	if($current_balance<1)
	{
		$is_current="paid-up";
		$this->payment_model->insert_payment($data);
		$this->payment_model->update_is_current($loan_id,$is_current);
		$this->payment_model->update_nextpayment($loan_id,"N/A",$current_balance);
		
	}else
	{
		$is_current="current";

		// echo json_encode($unpaid);return;

		$max_id = $this->payment_model->insert_payment($data);
		$this->payment_model->update_is_current($loan_id,$is_current);
		$this->payment_model->update_nextpayment($loan_id,$next_payment,$current_balance);

		// echo var_dump(intval($max_id[0]->id)); return;

		$unpaid=array(
			'existing_balance'=>$remaining_payments,
			'loan_id'=>$loan_id,
			'due_date'=>$payment_date,
			'payment_date'=>$date,
			// 'payment_id' => intval($max_id[0]->id)
		);

		$this->payment_model->clear_existing();
		$this->payment_model->insert_existing($unpaid);


		echo json_encode($unpaid);return;

	}
	
}

function payments()
{
	$loan_id=$this->input->get('id');
	$details=$this->get_payment_details($loan_id);
	$ledger=$this->populate_ledger($loan_id);
	$info=$this->get_info($loan_id);
	$existing=$this->get_existing_balance($loan_id);

	
	$this->load->view('header');
	$this->load->view('loan/payments',array('data' => $details,'ledger'=>$ledger,'info'=>$info,'existing'=>$existing ));
	$this->load->view('script');
	
}

function get_existing_balance($loan_id)
{
	$query=$this->payment_model->get_existing_balance($loan_id);
	// var_dump($query);
	return $query;
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


function get_payment_details($loan_id)
{
	// $loan_id="2104-069592";
	$details= $this->payment_model->get_payment_details($loan_id);
	return $details;
}


public function insert_borrower()
{
	$unique=$this->refID();

	$data = array(
		'ref_id'=>$unique,
		'fname' =>$this->input->post('fname') ,
		'mname'=>$this->input->post('mname'),
		'lname'=>$this->input->post('lname'),
		'suffix'=>$this->input->post('suffix'),
		'dob'=>$this->input->post('dob'),
		'gender'=>$this->input->post('gender'),
		'status'=>$this->input->post('status'),
		'nationality'=>$this->input->post('nationality'),
		'contact'=>$this->input->post('contact'),
		'occupation'=>$this->input->post('occupation'),
		'address'=>$this->input->post('address'),
		'image'=>$this->upload_image(),
	);
	$query=$this->borrowers_model->insert_borrower($data);	
	
	$fname=$this->input->post('fname');
	$lname=$this->input->post('lname');
	$user_email=ucwords($fname).'.'.ucwords($lname);	

	$this->load->model('login_model');
	$user_data=array('email'=>$user_email,'password'=>$unique,'role'=>"borrower");

	$borrower_account=$this->login_model->insert_borrower_account($user_data);
	
    


	
}

function refID()
{
	$last_id=$this->get_last_id();
	$year=substr(date("Y"),-2);
	$month=date('m');
	$rand = sprintf("%04d", rand(0,9999));
	$unique = $year.'-'.$month.'-'.$last_id;
	
	return $unique;
}

function get_current_date()
{
	$today= date("m-d-Y");
	return $today;
}

function get_last_id()
{
	
	$last_id=$this->borrowers_model->get_last_id();
	$id= $last_id["max(id)"];
	if($id==0){
		return "0000".$id+1;
	}else
	{
		return "0000".$id+1;
	}
}


function upload_image()  
{  
   if(isset($_FILES["user_image"]))  
   {  
        $extension = explode('.', $_FILES['user_image']['name']);  
        $new_name = rand() . '.' . $extension[1];  
        $destination = './upload/' . $new_name;  
        move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
        return $new_name;  
   }

   if(isset($_FILES["update_user_image"]))  
   {  
        $extension = explode('.', $_FILES['update_user_image']['name']);  
        $new_name = rand() . '.' . $extension[1];  
        $destination = './upload/' . $new_name;  
        move_uploaded_file($_FILES['update_user_image']['tmp_name'], $destination);  
        return $new_name;  
   }   
}



public 	function get_current_loans()
{
	$borrower_id= $this->input->post('id');
	$data = $this->process_model->get_current_loans($borrower_id);	

    echo json_encode($data);
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
public function get_borrower()
{
	$result=$this->borrowers_model->get_borrower();
	$r1=$this->get_loan_type();
	$plans=$this->get_plan_list();
	$interest=$this->get_interest_list();
	$penalty=$this->get_penalty_list();
	$r3=$this->get_loan_deductions();
	$r4=$this->get_distinct_loan_type();
	


	$this->callHeader();	
	$this->load->view('loan/borrowers',array('data'=>$result,'description'=>$r1,'plans'=>$plans,'deductions'=>$r3,'types'=>$r4,'interest'=>$interest,'penalty'=>$penalty));
	$this->callFooter();
	
}

function get_plan_list()
{
	$query=$this->plan_model->get_plan_list();
	return $query;
}
function get_interest_list()
{
	$query=$this->plan_model->get_interest_list();
	return $query;
}
function get_penalty_list()
{
	$query=$this->plan_model->get_penalty_list();
	return $query;
	// var_dump($query);
}


public function getby_id()
{
		
	$id=$this->input->post('borrower_id');
	$result=$this->borrowers_model->getby_id($id);
	echo json_encode($result);
	
}

public function get_loan_deductions()
{
	$this->load->model('deduction_model');
	$result=$this->deduction_model->get_loan_deductions();
	return $result;
}


public function get_loan_type()
{	
	$this->load->model('loan_model');
	$result=$this->loan_model->get_loan_type();
	return $result;
}

public function get_distinct_loan_type()
{
	$this->load->model('loan_model');
	$result=$this->loan_model->get_distinct_loan_type();
	return $result;
}

function get_loan_plan()
	{	
		$this->load->model('plan_model');
		$result=$this->plan_model->get_data();
		return $result;
	}


public function on_update()
{

	$id= $this->input->post('borrower_id');
	$data = array(

		'fname' => $this->input->post('fname'),
		'mname' => $this->input->post('mname'),
		'lname' => $this->input->post('lname'),
		'suffix' => $this->input->post('suffix'),
		'dob' => $this->input->post('dob'),
		'gender' => $this->input->post('gender'),
		'status' => $this->input->post('status'),
		'nationality' => $this->input->post('nationality'),
		'contact'=>$this->input->post('contact'),
		'occupation'=>$this->input->post('occupation'),
		'address'=>$this->input->post('address'),
		'image'=>$this->upload_image(),
	);

$query=$this->borrowers_model->on_update($data,$id);

}

function delete()
{
	$id=$this->input->post('id');
	
	$query=$this->borrowers_model->delete($id);
	
}



function insert_deductions()
{

$this->load->model('loan_deductions');

$dd=$this->input->post('deductions');
$r=$this->input->post('reference');
$amt=$this->input->post('amount');
 $counter = count($dd);    
  
    for($i=0; $i < $counter; $i++)
    {
      
      $data = array(
      	'deduction_name' =>$this->input->post('deductions')[$i],
      	'reference'=>$this->input->post('reference')[$i],
      	'amount'=>$this->input->post('amount')[$i],
      );

      $query=$this->loan_deductions->insert($data);
    }
			if($query){
				echo 'inserted';
			}else
			{
				echo 'failed';
			}	
	}


} ?>