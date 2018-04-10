<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Blog extends CI_Controller {

	    public function __construct(){
	    	parent::__construct();
	    	$this->load->model('List_Blog');
            $this->load->helper('url_helper','date','file','pagination');
	    }

	    public function index()
        {
            $x['data'] = $this->List_Blog->get_all_news();
            $this->load->view('v_Blog', $x);
        }

        public function view()
        {
            $id = $this->uri->segment(3);
            $x['data'] = $this->List_Blog->get_news_by_id($id);
            $this->load->view('v_BlogId', $x);
        }

        public function insert_news(){
               $this->load->helper('form');
               $this->load->library('form_validation');

               $this->form_validation->set_rules('title', 'Title', 'required');
               $this->form_validation->set_rules('author', 'Author', 'required');
               $this->form_validation->set_rules('content', 'Content', 'required');

               if ($this->form_validation->run() == FALSE) {
                   $this->load->view('v_CreateNews');
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
            $this->load->helper('form');
            $this->load->library('form_validation');
            //validasi inputan yang masuk
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('content', 'content', 'required');
            $this->form_validation->set_rules('author', 'Author', 'required');
            //Mendapatkan key id dati Route
            $id = $this->uri->segment(3);
            //Mengambil data dari model dan di filter dan ditambahkan ke dalam array
            $data['show_article'] = $this->List_Blog->get_news_by_id($id);
            //Jika validasi belum berjalam
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('v_EditNews',$data);
            } else {
                $config['upload_path'] = 'assets/img/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                //Memulai Upload
                $this->load->library('upload', $config);
                //Cek kondisi upload
                if ( ! $this->upload->do_upload('image')){
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                }
                else {
                    $data = array('upload_data' => $this->upload->data());
                    // Data input ke model
                    $data['input'] = array(
                        'author' => $this->input->post('author'),
                        'title' => $this->input->post('title'),
                        'content' => $this->input->post('content'),
                        'datepost' => date("Y/m/d"),
                        'image' => $this->upload->data('file_name')
                    );
                    $this->List_Blog->edit_news($id, $data['input']);
                    //kembali ke home
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