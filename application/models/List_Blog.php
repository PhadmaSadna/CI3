<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class List_Blog extends CI_Model {

	    public function __construct()
		{
			$this->load->database();
		}

		public function get_news_by_id($idN = 0){
			$this->db->select ( '
	            artikel.*, 
	            kategori.idKategori as idKategori, 
	            kategori.nmKategori,
	            kategori.deskripsi,
	        ' );
	        $this->db->join('kategori', 'kategori.idKategori = artikel.idKategori');

			$query = $this->db->get_where('artikel', array('id' => $idN));
			return $query->row_array();
		}

		public function get_all_news($limit = FALSE, $offset = FALSE){
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			$this->db->order_by('artikel.datepost', 'DESC');

			$this->db->join('kategori', 'kategori.idKategori = artikel.idKategori');

			$query = $this->db->get('artikel');

			return $query;
		}

		public function get_total_news(){
			return $this->db->get('artikel')->num_rows();
		}

		// public function get_articles($offset = 0){
		// 	$query['select'] = $this->db->select('*')->from('artikel')->limit(2,$offset)->order_by('datepost', 'desc')->get();
  //           $rows = $this->db->get('artikel');
  //           $query['getRows'] = $rows->num_rows();
  //    		return $query;
		// }

		public function get_articles($limit = null, $offset = null){
			 $this->db->limit($limit, $offset);
          return $this->db->get('artikel');
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

		public function generate_cat_dropdown() {
	        // Mendapatkan data ID dan nama kategori saja
	        $this->db->select ('
	            kategori.idKategori,
	            kategori.nmKategori
	        ');

	        // Urut abjad
	        $this->db->order_by('nmKategori');

	        $result = $this->db->get('kategori');
	        
	        // bikin array
	        // please select berikut ini merupakan tambahan saja agar saat pertama
	        // diload akan ditampilkan text please select.
	        $dropdown[''] = 'Please Select';

	        if ($result->num_rows() > 0) {
	            
	            foreach ($result->result_array() as $row) {
	                // Buat array berisi 'value' (id kategori) dan 'nama' (nama kategori)
	                $dropdown[$row['idKategori']] = $row['nmKategori'];
	            }
	        }

	        return $dropdown;
	    }
	}
?>