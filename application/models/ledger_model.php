<?php
/**
 * 
 */
class ledger_model extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}

	function get_ledger($loan_id)
	{
		$query=$this->db->query("SELECT * FROM `payments_tbl` WHERE loan_id='$loan_id' ");
		return $query->result();
	}

	function get_borrower_info($loan_id)
	{
		$query=$this->db->query("SELECT * FROM `borrower_tbl` INNER JOIN loans_tbl on loans_tbl.borrower_id=borrower_tbl.id WHERE loans_tbl.loan_id='$loan_id' ");
		return $query->result();
	}




}?>