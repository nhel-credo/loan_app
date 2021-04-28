<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Plan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('plan_model');
		$this->load->helper(array('form', 'url'));
	}

	function insert()
	{
		$data = array(
			'term' =>$this->input->post('months'),
			'interest'=>$this->input->post('interest_percentage'),
			'penalty_rate'=>$this->input->post('penalty_rate'),
			 );
		$query= $this->plan_model->insert($data);
		return $query;
	}

	function get_data()
	{	$this->callHeader();
		$result['data']=$this->plan_model->get_data();
		$this->load->view('loan/plans',$result);
		$this->callFooter();
	}
	 function callHeader()
	{
		$this->load->view('header');
		$this->load->view('nav-bar');
		$this->load->view('side-bar');
	}

	 function callFooter()
	{
		$this->load->view('footer');
	}

	function delete()
	{
		$id=$this->input->post('id');	
		$query=$this->plan_model->delete($id);
	
	}


	function getby_id()
	{
		$id=$this->input->post('id');
		$result=$this->plan_model->getby_id($id);
		echo json_encode($result);
	}

	function on_save_changes()
	{
		$id=$this->input->post('id');
		$data = array(
			'term' =>$this->input->post('months'),
			'interest'=>$this->input->post('interest_percentage'),
			'penalty_rate'=>$this->input->post('penalty_rate'),

		 );	
		$this->plan_model->on_save_changes($id,$data);
	}
}
?>
