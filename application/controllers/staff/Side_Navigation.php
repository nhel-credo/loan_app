<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Side_Navigation extends CI_Controller{

public function index(){

	$this->load->view('sidebar_menu');
}


}


?>