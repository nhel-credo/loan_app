<?php
/**
 * 
 */
class Payment_model extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}


	function get_payment_details($loan_id)
	{
		$query=$this->db->query("SELECT * FROM `next_payment` INNER JOIN loans_tbl on next_payment.loan_id=loans_tbl.loan_id WHERE next_payment.loan_id='$loan_id'");
		return $query->result();
	}

	function insert_payment($data)
	{
		$query=$this->db->insert('payments_tbl',$data);
		$q = $this->db->query("SELECT max(id) as id from next_payment");
		return $q->result();
	}

	function update_is_current($loan_id,$is_current)
	{
		$query=$this->db->query("UPDATE `is_current_loan` SET `is_current`='$is_current' WHERE loan_id='$loan_id' ");
		return $query;
	}

	function update_nextpayment($loan_id,$next_payment,$current_balance)
	{
		$query=$this->db->query("UPDATE `next_payment` SET `next_payment`='$next_payment',`total_balance`='$current_balance' WHERE loan_id='$loan_id' ");
		return $query;
	}


	function update_unpaid($existing_balance,$due_date,$loan_id)
	{
		$query=$this->db->query("UPDATE `unpaid_balance` SET `existing_balance`='$existing_balance',`due_date`='$due_date' WHERE loan_id='$loan_id' ");	
		return $query;
	}

	function get_existing_balance($loan_id)
	{
		$query=$this->db->query("SELECT * FROM `unpaid_balance` WHERE loan_id='$loan_id' ");
		return $query->result();
	}

	function clear_existing()
	{
		$query=$this->db->query("DELETE FROM `unpaid_balance` ");
		return $query;
	}

	function insert_existing($data)
	{
		$query=$this->db->insert('unpaid_balance',$data);
		// $q = $this->db->query("SELECT max(id) as id from next_payment");
		// return $q->result();
	}
}
?>