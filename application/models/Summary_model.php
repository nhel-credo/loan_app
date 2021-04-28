<?php
/**
 * 
 */
class Summary_model extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}


	function active_loan_summary()
	{
		$query=$this->db->query("SELECT loans_tbl.loan_id,borrower_tbl.lname,borrower_tbl.fname,borrower_tbl.mname,borrower_tbl.suffix,loans_tbl.loan_type,loans_tbl.description,loans_tbl.amount,loans_tbl.plan,loans_tbl.interest_rate,loans_tbl.penalty_rate,sum(payments_tbl.total_payment)as total_payment,loans_tbl.date_released,next_payment.total_balance FROM `loans_tbl` INNER JOIN borrower_tbl on borrower_tbl.id=loans_tbl.borrower_id INNER JOIN payments_tbl ON payments_tbl.loan_id=loans_tbl.loan_id INNER JOIN next_payment ON next_payment.loan_id=payments_tbl.loan_id GROUP BY loan_id ");

		return $query->result();
	}

}?>

