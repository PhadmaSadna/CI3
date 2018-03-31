<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Blog extends CI_Controller {

	    public function index()
		{
			$this->load->view('v_Blog');	
		}

		public function view() {
			$this->load->view('v_Blog1');
		}
	}
?>