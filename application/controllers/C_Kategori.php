<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Kategori extends CI_Controller{
	public function __construct()
	{
		parent::__construct();

		// Load custom helper applications/helpers/MY_helper.php
		//$this->load->helper('MY');

		// Load semua model yang kita pakai
		$this->load->model('List_Blog');
		$this->load->model('M_Kategori');
	}

	public function index() 
	{
		// Dapatkan semua kategori
		$data['kategori'] = $this->M_Kategori->get_all_categories();

		$this->load->view('Header.php');
		$this->load->view('kategori/v_Kategori', $data);
	}

	public function create() 
	{
		// Kita butuh helper dan library berikut
		$this->load->helper('form');
		$this->load->library('form_validation');

		// Form validasi untuk Nama Kategori
		$this->form_validation->set_rules(
			'nmKategori',
			'Nama Kategori',
			'required|is_unique[kategori.nmKategori]',
			array(
				'required' => 'Please fill the %s',
				'is_unique' => 'Judul <strong>' . $this->input->post('nmKategori') . '</strong> sudah ada.'
			)
		);

		if($this->form_validation->run() === FALSE){
			$this->load->view('Header.php');
			$this->load->view('kategori/v_CreateCategory');
		} else {
			$this->M_Kategori->create_category();
			redirect('C_Kategori/');
		}
	}

	// Membuat fungsi edit
	public function edit($id = NULL)
	{
		// Get artikel dari model berdasarkan $id
		$data['kategori'] = $this->M_Kategori->get_category_by_id($id);
		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman list category
		if ( empty($id) || !$data['kategori'] ) redirect('C_Kategori');

		// Kita butuh helper dan library berikut
	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // Kita validasi input sederhana, sila cek http://localhost/ci3/user_guide/libraries/form_validation.html
		$this->form_validation->set_rules('nmKategori', 'Nama Kategori', 'required',
			array('required' => 'Please fill the %s '));
	    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

	    // Cek apakah input valid atau tidak
	    if ($this->form_validation->run() === FALSE)
	    {
	    	$this->load->view('Header.php');
	        $this->load->view('kategori/v_EditCategory', $data, FALSE);

	    } else {

	    	$post_data = array(
	    	    'nmKategori' => $this->input->post('nmKategori'),
	    	    'deskripsi' => $this->input->post('deskripsi'),
	    	);
    		
    		// Update kategori sesuai post_data dan id-nya
	        if ($this->M_Kategori->update_category($post_data, $id)) {
	        	$this->load->view('Header.php');
		        $this->load->view('kategori/v_Kategori');
	        } else {
	        	$this->load->view('Header.php');
		        $this->load->view('kategori/v_Kategori');
	        }

	    }
	}


	public function delete($id)
	{

		$this->M_Kategori->delete_category($id);
		$this->load->view('Header.php');
		$this->load->view('kategori/v_Kategori');
	}
}
