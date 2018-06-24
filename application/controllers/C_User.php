<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_User extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
                
        $this->load->library('form_validation');
        $this->load->model('M_User');
    }

    // Register user
    public function register_user(){

        $this->form_validation->set_rules('nmUser', 'Nama', 'required');
        $this->form_validation->set_rules('kodepos', 'Kode Pos', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');

        if($this->form_validation->run() === FALSE){
            $this->load->view('Header');
            $this->load->view('user/v_register');
        } else {
            // Encrypt password
            $enc_password = md5($this->input->post('password'));

            $this->M_User->register_user($enc_password);

            // Set message
            $this->session->set_flashdata('user_registered', 'Anda telah terdaftar.');

            redirect('Blog');
        }
    }

    // Log in user
    public function login_user(){

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('Header');
            $this->load->view('user/v_login');
        } else {
            
            // Get username
            $username = $this->input->post('username');
            // Get & encrypt password
            $password = md5($this->input->post('password'));

            // Login user
            $idUser = $this->M_User->login_user($username, $password);

            if($idUser){
                // Buat session
                $user_data = array(
                    'idUser' => $idUser,
                    'username' => $username,
                    'logged_in' => true,
                    'level' => $this->M_User->get_user_level($idUser)
                );

                $this->session->set_userdata($user_data);

                // Set message
                $this->session->set_flashdata('user_loggedin', 'Anda sudah login');

                redirect('C_User/dashboard');
            } else {
                // Set message
                $this->session->set_flashdata('login_failed', 'Login invalid');

                redirect('C_User/login_user');
            }       
        }
    }

    // Log user out
    public function logout(){
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('idUser');
        $this->session->unset_userdata('username');

        // Set message
        $this->session->set_flashdata('user_loggedout', 'Anda sudah log out');

        redirect('C_User/login_user');
    }

    public function dashboard(){

        if(!$this->session->userdata('logged_in')){
            redirect('C_User/login_user');
        }

        $idUser = $this->session->userdata('username');

        // Dapatkan detail user
        $data['user'] = $this->M_User->get_user_details($idUser);

        // Load dashboard
        $this->load->view('Header');
        $this->load->view('user/v_dashboard', $data);
    }


}