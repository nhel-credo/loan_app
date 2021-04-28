<?php
/**
 * 
 */
class deduction_model extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}

	function delete_deductions($id)
	{
    
    $this->db->query("delete  from loan_deductions where id='".$id."'");
    return;
	}

	function get_loan_deductions()
	{
		$this->db->select('*');
		$this->db->from('loan_deductions');
		$query=$this->db->get();
		return $query->result();
	}

	function insert($data){
		$query=$this->db->insert('loan_deductions',$data);
		return $query;
	}

	function getby_id($id)
	{
		$this->db->select('*');
		$this->db->from("loan_deductions");
		$this->db->where("id='".$id."'");
	 	$query=$this->db->get();
		return $query->result();
	}

	function on_save_changes($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('loan_deductions',$data);
	}

}

?>