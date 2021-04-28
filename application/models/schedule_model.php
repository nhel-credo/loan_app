<?php
/**
 * 
 */
class Schedule_model extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}



	function get_details($loan_id)
	{
		$query=$this->db->query("SELECT * FROM `loans_tbl` INNER JOIN borrower_tbl ON loans_tbl.borrower_id=borrower_tbl.id WHERE loans_tbl.loan_id='$loan_id' ");
		return $query->result();
	}
}?>