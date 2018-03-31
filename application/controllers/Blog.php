<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Blog extends CI_Controller {

	    public function index()
		{
			$this->load->view('v_Blog');	
		}

		public function view($id) {
		
			if ($id == 1) {
				$this->load->view('v_Blog1');
			} else if ($id == 2) {
				$this->load->view('v_Blog2');
			}
			
		}

	}
?>