<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 // namespace application\libraries;
Class Header{


public static function callHeader()
	{
		$this->load->view('header');
		$this->load->view('nav-bar');
		$this->load->view('side-bar');
	}


		public static function callFooter()
	{
		$this->load->view('footer');
	}

}

?>