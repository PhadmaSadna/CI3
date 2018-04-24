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
            $url = $this->uri->segment(3);
            $this->load->library('pagination');

            $x['data'] = $this->List_Blog->get_articles($url);
            
            $paging = $x['data']['getRows'];
            $config['base_url'] = 'http://localhost/ci3/page';
            $config['total_rows'] = $paging;
            $config['per_page'] = 2;
            $config['uri_segment'] = 3;
            $config['num_links'] = 2;
            $config['full_tag_open'] = '<div><ul class="pagination">';
            $config['full_tag_close'] = '</ul></div>';
            $config['prev_link'] = '&lt; Prev';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next &gt;';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            
            $this->pagination->initialize($config);

            $this->load->view('v_BlogAdmin', $x);
            $x['pagination'] = $this->pagination->create_links();
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

            $this->form_validation->set_rules('author', 'Author', 'required');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('content', 'Content', 'required');
            $this->form_validation->set_rules('image', 'Image', 'required');

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

            $this->form_validation->set_rules('author', 'Author', 'required');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('content', 'Content', 'required');
            $this->form_validation->set_rules('image', 'Image', 'required');

            $id = $this->uri->segment(3);
            $data['show_article'] = $this->List_Blog->get_news_by_id($id);
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('v_EditNews',$data);
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