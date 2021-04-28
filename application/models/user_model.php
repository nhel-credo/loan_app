<?php
/**
 * 
 */
class user_model extends CI_Model
{
	
	 function __construct()
	{
		parent:: __construct();
	}


function delete($id)
{
	$this->db->where('id',$id);
	$this->db->delete('user_tbl');
}


 function insert_user($data)
{
	$this->db->insert('user_tbl',$data);
	 
}


function email_exists($email)
{
   $this->db->select()->from('user_tbl')->where('email', $email);
   $query = $this->db->get();
   if($query->num_rows()>0)
   {
   	return 1;
   }
   else
   {
   	return 0;
   }
  
}

function onsave_update($data,$userid){
		$this->db->where('id', $userid);
        $this->db->update('user_tbl', $data);
        return;
}

 function delete_user($userid){
    
    $this->db->query("delete  from user_tbl where id='".$userid."'");
    return;
}



function get_user()
{
	$this->db->select('*');
	$this->db->from("user_tbl");
 	$query=$this->db->get();
		return $query->result();
}


function getuserby_id($id)
{
	$this->db->select('*');
	$this->db->from("user_tbl");
	$this->db->where("id='".$id."'");
 	$query=$this->db->get();
		return $query->result();
}



}




?>