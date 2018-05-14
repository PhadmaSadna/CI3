<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class BlogAdmin extends CI_Controller {

	    public function __construct(){
	    	parent::__construct();
	    	$this->load->model('List_Blog');
            $this->load->helper('url_helper','date','file','pagination');
	    }

	    public function index()
        {
            $limit_per_page = 6;

            $start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;

            $total_records = $this->List_Blog->get_total_news();

            if ($total_records > 0) {
                $data['all_news'] = $this->List_Blog->get_all_news($limit_per_page, $start_index);

                $config['base_url'] = base_url() . 'Blog/index';
                $config['total_rows'] = $total_records;
                $config['per_page'] = $limit_per_page;
                $config["uri_segment"] = 3;
                
                //$this->pagination->initialize($config);
                    
                //$data["links"] = $this->pagination->create_links();

            }
            
            $this->load->view('Header.php');
            $this->load->view('frontend/v_BlogAdmin', $data);
        }

        public function insert_news(){
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['kategori'] = $this->List_Blog->generate_cat_dropdown();

            $this->form_validation->set_rules('author', 'Author', 'required');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('content', 'Content', 'required');
            $this->form_validation->set_rules('idKategori', 'ID Kategori', 'required');


               if ($this->form_validation->run() == FALSE) {
                    $this->load->view('Header.php');
                    $this->load->view('blog/v_CreateNews', $data, FALSE);
               } else {
                    $config['upload_path'] = 'assets/img/';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    
                    $this->load->library('upload', $config);
                    
                    if ( ! $this->upload->do_upload('image')){
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    }
                    else{
                        $data = array('upload_data' => $this->upload->data());
                        
                        $data['input'] = array(
                            'idKategori' => $this->input->post('idKategori'),
                            'author' => $this->input->post('author'),
                            'title' => $this->input->post('title'),
                            'content' => $this->input->post('content'),
                            'datepost' => date("Y/m/d"),
                            'image' => $this->upload->data('file_name')
                        );
                        
                        $this->List_Blog->create_news($data['input']);
                        
                        redirect('blog/index');
                    }
               }
        }

        public function edit_news(){
            $data['kategori'] = $this->List_Blog->generate_cat_dropdown();
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('author', 'Author', 'required');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('content', 'Content', 'required');
            $this->form_validation->set_rules('idKategori', 'ID Kategori', 'required');

            $id = $this->uri->segment(3);
            $data['show_article'] = $this->List_Blog->get_news_by_id($id);
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('Header.php');
                $this->load->view('blog/v_EditNews',$data, FALSE);
            } else {
                $config['upload_path'] = 'assets/img/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                
                $this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('image')){
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                }
                else {
                    $data = array('upload_data' => $this->upload->data());
                    
                    $data['input'] = array(
                        'idKategori' => $this->input->post('idKategori'),
                        'author' => $this->input->post('author'),
                        'title' => $this->input->post('title'),
                        'content' => $this->input->post('content'),
                        'datepost' => date("Y/m/d"),
                        'image' => $this->upload->data('file_name')
                    );
                    $this->List_Blog->edit_news($id, $data['input']);
                    
                    redirect('blog/index');
                }
            }   
        }

        public function delete_news(){
            $id = $this->uri->segment(3);
            $this->List_Blog->delete_news($id);
            redirect('blog/index','refresh');
        }



	}
?>