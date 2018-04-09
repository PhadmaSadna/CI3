<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class List_Blog extends CI_Model {

	    public function __construct()
		{
			$this->load->database();
		}

		public function get_news_by_id($idN = 0){
			$query = $this->db->get_where('artikel', array('id' => $idN));
			return $query->row_array();
		}

		public function get_all_news(){
			$query = $this->db->get('artikel');
			return $query;
		}

		public function create_news($data){
			$this->db->insert('artikel', $data);
		}
	}
?>