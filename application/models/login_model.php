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


 	function user_login($user,$password)
 	{
 		$query=$this->db->query("SELECT email,role FROM `user_tbl` WHERE email='$user' AND password='$password' UNION SELECT email,role FROM borrower_account WHERE email='$user' AND password='$password' ");
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
 		$query=$this->db->query("SELECT * FROM `user_tbl` WHERE email='$user' AND password='$password' ");
 		return $query->result();
 	}


 	function get_borrower_info($password)
 	{
 		$query=$this->db->query("SELECT borrower_tbl.ref_id,borrower_account.role,borrower_tbl.fname,borrower_tbl.lname,borrower_tbl.image  FROM `borrower_account` INNER JOIN borrower_tbl ON borrower_tbl.ref_id=borrower_account.password WHERE borrower_account.password='$password' ");
 		return $query->result();
 	}

 	function set_login_status($user,$password,$status)
 	{
 		$query=$this->db->query("UPDATE `user_tbl` SET `login_status`='$status' WHERE email='$user' AND password='$password' ");
 	}
 } 
?>