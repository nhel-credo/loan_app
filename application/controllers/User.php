<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User extends CI_Controller{

public function __construct()
{
	parent::__construct();

	$this->load->database();
	$this->load->model('user_model');
	$this->load->helper(array('form', 'url'));

    $this->load->library('form_validation');
    
}


function delete()
{
	$id=$this->input->post('id');
	$this->user_model->delete($id);
}

function check_email()
{
 if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  
           {  
                echo '<label class="text" style="color:#d9534f"><span class="glyphicon glyphicon-remove"></span> Invalid Email</span></label>';  
           }  
           else  
           {  
                $this->load->model("user_model");  
                if($this->user_model->email_exists($_POST["email"]))  
                {  
                     echo '<label class="text" style="color:#d9534f"><span class="glyphicon glyphicon-remove"></span> Email Already Exist</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success" style="color:#5cb85c"><span class="glyphicon glyphicon-ok"></span>OK</label>';  
                }  
           }  
}

function if_email_exist()
{
				$this->load->model("user_model");  
               if($this->user_model->email_exists($_POST["email"]))
               {
               	 echo 1;   
               }
              else
              {
              	echo 0;
              }
              
}

public function onsave_update()
{

	$userid= $this->input->post('user-id');
	$data = array(

		'firstname' => $this->input->post('update-fname'),
		'middlename' => $this->input->post('update-mname'),
		'lastname' => $this->input->post('update-lname'),
		'contact' => $this->input->post('update-contact'),
		'address' => $this->input->post('update-address'),
		'email' => $this->input->post('email'),
		'password' => $this->input->post('update-password'),
		'role' => $this->input->post('update-role'),
		'registered_on'=>$this->get_current_date(),
		'image'=>$this->upload_image(),
	);
// var_dump($data);
$user=$this->user_model->onsave_update($data,$userid);


}   



public function insert_user()
{


	$data = array(
		'firstname' => $this->input->post('firstname'),
		'middlename' => $this->input->post('middlename'),
		'lastname' => $this->input->post('lastname'),
		'contact' => $this->input->post('contact'),
		'address' => $this->input->post('address'),
		'email' => $this->input->post('email'),
		'password' => $this->input->post('password1'),
		'role' => $this->input->post('role'),
		'registered_on'=>$this->get_current_date(),
		'image'=>$this->upload_image(),
	);


// var_dump($data);
$user=$this->user_model->insert_user($data);

}

function delete_user()
{
	$userid=$this->input->post('userid');
	
	$query=$this->user_model->delete_user($userid);
	
}

function get_current_date(){
		$today= date("m-d-Y");
		return $today;
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



 public function add_user()
{
$this->callHeader();
$this->load->view('users/add-user');

$this->callFooter();
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



public function get_user()
{
	$this->callHeader();
	$result['data']=$this->user_model->get_user();
	$this->load->view('users/user-list',$result);
	$this->callFooter();

}


public function getuserby_id()
{
	
	
	$id=$this->input->post('userid');

	// $this->load->view('header');
	$result=$this->user_model->getuserby_id($id);
	  
      echo json_encode($result);
	
}

function show(){

	$this->load->view('header');
	$this->load->view('users/userby-id');
}







}

?>