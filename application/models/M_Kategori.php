<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kategori extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function get_all_categories()
    {
        // Urutkan berdasar abjad
        $this->db->order_by('nmKategori');

        $query = $this->db->get('kategori');
        return $query->result();
    }

    public function create_category()
    {
        $data = array(
            'nmKategori'      => $this->input->post('nmKategori'),
            'deskripsi'       => $this->input->post('deskripsi')
        );

        return $this->db->insert('kategori', $data);
    }

    // Dapatkan kategori berdasar ID
    public function get_category_by_id($id)
    {
        $query = $this->db->get_where('kategori', array('idKategori' => $id));
        return $query->row();
    }

    public function update_category($data, $id) 
    {
        if ( !empty($data) && !empty($id) ){
            $update = $this->db->update( 'kategori', $data, array('idKategori'=>$id) );
            return $update ? true : false;
        } else {
            return false;
        }
    }

    public function delete_category($id)
    {
        if ( !empty($id) ){
            $delete = $this->db->delete('kategori', array('idKategori'=>$id) );
            return $delete ? true : false;
        } else {
            return false;
        }
    }

    public function generate_cat_dropdown()
    {

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
