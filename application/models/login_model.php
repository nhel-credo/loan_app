<?php
/**
  * 
  */
 class Login_model extends CI_Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}


 	function user_login($username,$pass)
 	{
 		$user = $this->db->escape($username);
 		$password = $this->db->escape($pass);
 		$sql="SELECT email,role FROM `user_tbl` WHERE email=$user AND password=$password UNION SELECT email,role FROM borrower_account WHERE email=$user AND password=$password";
 		//$sql="SELECT email,role FROM `user_tbl` WHERE email=$user AND password=$password";

 		$query=$this->db->query($sql);
 		if($query->num_rows()>0)
 		{
 			return $query->result();
 		} 		
 	}

 	function insert_borrower_account($user_data)
 	{
 		$query=$this->db->insert('borrower_account',$user_data); 		
 	}


 	function get_user_info($user,$password)
 	{
 		// $query=$this->db->query("SELECT * FROM `user_tbl` WHERE email='$user' AND password='$password' ");
 		// return $query->result();

 		$username = $this->db->escape($user);
 		$pass=$this->db->escape($password);
		$query=$this->db->query("SELECT * FROM user_tbl WHERE email=$username AND password=$pass");
		return $query->result();

 	}


 	function get_borrower_info($pass)
 	{
 		$password=$this->db->escape($pass);

 		$sql="SELECT borrower_tbl.ref_id,borrower_account.role,borrower_tbl.fname,borrower_tbl.lname,borrower_tbl.image  FROM `borrower_account` INNER JOIN borrower_tbl ON borrower_tbl.ref_id=borrower_account.password WHERE borrower_account.password=$password ";
 		$query=$this->db->query($sql);

 		return $query->result();
 	}

 	function set_login_status($user,$password,$status)
 	{
 		$query=$this->db->query("UPDATE `user_tbl` SET `login_status`='$status' WHERE email='$user' AND password='$password' ");
 	}
 } 
?>