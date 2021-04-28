<?php
/**
 * 
 */
class loan_model extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}

	function delete_type($id)
	{
    
    $this->db->query("delete  from loan_type where id='".$id."'");
    return;
	}

	function get_loan_type()
	{	

		$this->db->select('*');
		$this->db->from('loan_type');
		$this->db->order_by('type','asc');
		$query=$this->db->get();
		return $query->result();
	}

	function get_distinct_loan_type(){
		$this->db->distinct('type');
		$this->db->select('type');
		$this->db->from('loan_type');
		$this->db->order_by('type','asc');
		$query=$this->db->get();
		return $query->result();
	}

	function insert($data){
		$query=$this->db->insert('loan_type',$data);
		return $query;
	}

	function getby_id($id)
	{
		$this->db->select('*');
		$this->db->from("loan_type");
		$this->db->where("id='".$id."'");
	 	$query=$this->db->get();
		return $query->result();
	}

	function on_save_changes($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('loan_type',$data);
	}

}

?>