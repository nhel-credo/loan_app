<?php

Class Home_model extends CI_Model
{

	function count_borrower()
	{
		$query=$this->db->query("SELECT COUNT(*)as total_borrower FROM `borrower_tbl`");
		return $query->result();
	}

	function payments_today($cur_date)
	{
		$query=$this->db->query("SELECT SUM(total_payment)as total_payment FROM `payments_tbl` WHERE date_created='$cur_date'");
		return $query->result();
	}

	function get_current_loan()
	{
		$query=$this->db->query("SELECT COUNT(*)as current_loan FROM `is_current_loan` WHERE is_current='current' ");
		return $query->result();
	}

	function count_if_due($cur_date)
	{
		$query=$this->db->query("SELECT COUNT(*)as due_today FROM `next_payment` WHERE next_payment<='$cur_date' ");
		return $query->result();
	}

	function total_released()
	{
		$query=$this->db->query("SELECT COUNT(*)as total_released FROM `loans_tbl` WHERE approve_status='released' ");
		return $query->result();
	}

	function total_recievable()
	{
		$query=$this->db->query("SELECT SUM(total_balance)as total_balance FROM `next_payment`");
		return $query->result();
	}

	function yearly_payment()
	{
		$query=$this->db->query("SELECT sum(payments_tbl.total_payment)as total_payment,year(date_created)as year_counted  FROM `payments_tbl` GROUP BY year(date_created) ");
		return  $query->result();
	}

	function daily_released()
	{
		$query=$this->db->query("SELECT SUM(amount)as amount,date_released FROM `loans_tbl` GROUP BY date_released");
		return $query->result();
	}

	function daily_payment()
	{
		$query=$this->db->query("SELECT SUM(total_payment)as total_payment,date_created  FROM `payments_tbl` GROUP BY date_created");
		return $query->result();
	}


}
?>