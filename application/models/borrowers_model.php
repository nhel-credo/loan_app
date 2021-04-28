<?php

/**
 *  
 */
class borrowers_model extends CI_Model
{

	function __construct()
	{
		Parent::__construct();
	}

function get_last_id(){
		
		$query=$this->db->query('SELECT max(id) FROM `borrower_tbl`');
		return $query->row_array();
	}

public function insert_borrower($data)
{
  $query= $this->db->insert("borrower_tbl",$data);
  return $query;
	 
}



function get_borrower()
{
	$this->db->select('*');
	$this->db->from("borrower_tbl");
 	$query=$this->db->get();
	return $query->result();
}


function getby_id($id)
{
	$this->db->select('*');
	$this->db->from("borrower_tbl");
	$this->db->where("id='".$id."'");
 	$query=$this->db->get();
		return $query->result();
}

function on_update($data,$borrower_id)
{
	$this->db->where('id',$borrower_id);
    $this->db->update('borrower_tbl',$data);
    return;
}

function delete($id)
{
	$this->db->where('id',$id);
	$this->db->delete('borrower_tbl');
}





}

?>