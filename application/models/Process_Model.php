<?php
/**
 * 
 */
class Process_Model extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}


	function get_current_loans($borrower_id){
		$query=$this->db->query("SELECT loans_tbl.loan_id,loans_tbl.loan_type,is_current_loan.is_current FROM `loans_tbl` INNER JOIN is_current_loan ON loans_tbl.loan_id=is_current_loan.loan_id WHERE loans_tbl.borrower_id='$borrower_id'");
		return $query->result();
	}

	function get_last_id(){
		
		$query=$this->db->query('SELECT max(id) FROM `loan_deductions`');
		return $query->row_array();
	}

	function create_new_loan($data){
		$query=$this->db->insert('loans_tbl',$data);
		return $query;
	}


	function insert_references($data){
		$query=$this->db->insert('reference_tbl',$data);
		return $query;				
	}

	function insert_deductions($data){
		$query=$this->db->insert('deduction_tbl',$data);
		return $query;				
	}

	
	function get_total_deductions($loan_id)
	{
		$query=$this->db->query("SELECT ROUND(SUM(amount),2)as amount FROM `deduction_tbl` WHERE loan_id='$loan_id'");		
		return $query->result();
	}

	function get_loans()
	{
		$query=$this->db->query("SELECT * FROM `borrower_tbl`
						INNER JOIN loans_tbl
					 	on loans_tbl.borrower_id=borrower_tbl.id");
		return $query->result();

	}

	function get_loans_byID($loan_id)
	{
		$query=$this->db->query("SELECT * FROM `borrower_tbl`
						INNER JOIN loans_tbl
					 	on loans_tbl.borrower_id=borrower_tbl.id
                        where loans_tbl.loan_id='$loan_id'");
		return $query->result();

	}

	function get_deductions_byID($loan_id)
	{
		$query=$this->db->query("SELECT * FROM `deduction_tbl` WHERE deduction_tbl.loan_id='$loan_id'");
		return $query->result();
	}

	function approve_status($loan_id,$status,$date_approved)
	{
		$query=$this->db->query("UPDATE loans_tbl SET approve_status='$status',date_approved='$date_approved' WHERE loan_id='$loan_id'");
		return $query;
	}

	function denied($loan_id,$status)
	{
		$query=$this->db->query("UPDATE loans_tbl SET approve_status='$status' WHERE loan_id='$loan_id'");
		return $query;
	}

	function released($loan_id,$status,$date_released)
	{
		$query=$this->db->query("UPDATE loans_tbl SET approve_status='$status',date_released='$date_released' WHERE loan_id='$loan_id'");
		return $query;
	}

	function on_is_current($data){
		$query=$this->db->insert('is_current_loan',$data);
		return $query;				
	}

	function set_next_payment($data)
	{
		$query=$this->db->insert('next_payment',$data);
		return $query;
	}
	

}

?>