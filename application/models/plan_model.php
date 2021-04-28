<?php
/**
 * 
 */
class Plan_model extends CI_Model
{
	
	function get_data()
	{
		$this->db->select('*')->from('loan_plan');
		return $this->db->get()->result();
	}

	function insert($data)
	{
		$this->db->insert("loan_plan",$data);
	}

	function delete($id)
	{
    
    $this->db->query("delete  from loan_plan where id='".$id."'");
    return;
	}

	function getby_id($id)
	{
		$this->db->select('*');
		$this->db->from("loan_plan");
		$this->db->where("id='".$id."'");
	 	$query=$this->db->get();
		return $query->result();
	}

	function on_save_changes($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('loan_plan',$data);
	}


	function get_interest_list()
	{
		$query=$this->db->query("SELECT DISTINCT interest FROM `loan_plan`");
		return $query->result();
	}

	function get_plan_list()
	{
		$query=$this->db->query("SELECT DISTINCT term FROM `loan_plan`");
		return $query->result();
	}

	function get_penalty_list()
	{
		$query=$this->db->query("SELECT DISTINCT penalty_rate FROM `loan_plan`");
		return $query->result();
	}
}

?>