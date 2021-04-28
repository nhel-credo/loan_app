<?php

// namespace Application\Models;

class person_model extends CI_Model
{

	public function __construct() 
	{
		Parent::__construct();
	}
	public function persons()
	{
		return array(
			"Person 1",
			"Person 2",
		);
	}
}


?>

