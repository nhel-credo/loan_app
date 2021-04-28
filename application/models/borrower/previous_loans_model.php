<?php /**
 * 
 */
class Previous_loans_model extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}


	function get_ledger($loan_id)
	{
		$query= $this->db->query("SELECT * FROM `payments_tbl` WHERE loan_id='$loan_id' ");
		return $query->result();
	}
}

?>