<?php 
/**
 * 
 */
class Active_loans_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}


	function get_all_active()
	{
		$query=$this->db->query("SELECT loans_tbl.loan_type,loans_tbl.amount,loans_tbl.loan_id, borrower_tbl.fname,borrower_tbl.mname,borrower_tbl.lname,borrower_tbl.suffix,is_current_loan.is_current,next_payment.next_payment,next_payment.total_balance FROM `is_current_loan`  INNER JOIN next_payment ON next_payment.loan_id=is_current_loan.loan_id INNER JOIN borrower_tbl ON borrower_tbl.id=next_payment.borrower_id INNER JOIN loans_tbl ON loans_tbl.loan_id=next_payment.loan_id WHERE is_current_loan.is_current='current' ");
		return $query->result();
	}
}

?>