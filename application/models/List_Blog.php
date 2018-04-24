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

		public function get_articles($offset = 0){
			$query['select'] = $this->db->select('*')->from('artikel')->limit(2,$offset)->order_by('datepost', 'desc')->get();
            $rows = $this->db->get('artikel');
            $query['getRows'] = $rows->num_rows();
     		return $query;
		}

		public function create_news($data){
			$this->db->insert('artikel', $data);
		}

		public function edit_news($id, $data){
			$this->db->where('id', $id);
			return $this->db->update('artikel', $data);
		}

		public function delete_news($idN){
			$this->db->where('id', $idN);
			return $this->db->delete('artikel');
		}
	}
?>