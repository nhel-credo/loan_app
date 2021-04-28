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


	function get_all_active($borrower_id)
	{
		$query=$this->db->query("SELECT loans_tbl.loan_type,loans_tbl.amount,loans_tbl.loan_id, is_current_loan.is_current,next_payment.next_payment,next_payment.total_balance FROM `is_current_loan`  INNER JOIN next_payment ON next_payment.loan_id=is_current_loan.loan_id INNER JOIN borrower_tbl ON borrower_tbl.id=next_payment.borrower_id INNER JOIN loans_tbl ON loans_tbl.loan_id=next_payment.loan_id WHERE is_current_loan.is_current='current' AND borrower_tbl.ref_id='$borrower_id' ");
		return $query->result();
	}

	function my_loan_records($borrower_id)
	{
		$query=$this->db->query("SELECT loans_tbl.plan,loans_tbl.interest_rate,loans_tbl.description,loans_tbl.loan_type,loans_tbl.amount,loans_tbl.loan_id, is_current_loan.is_current,next_payment.next_payment,next_payment.total_balance FROM `is_current_loan`  INNER JOIN next_payment ON next_payment.loan_id=is_current_loan.loan_id INNER JOIN borrower_tbl ON borrower_tbl.id=next_payment.borrower_id INNER JOIN loans_tbl ON loans_tbl.loan_id=next_payment.loan_id WHERE is_current_loan.is_current='paid-up' AND borrower_tbl.ref_id='$borrower_id' ");
		return $query->result();
	}
}

?>