<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller {

	    public function index()
		{
			$this->load->view('Header.php');
			$this->load->view('frontend/v_Bootstrap');	
		}
	}
?>