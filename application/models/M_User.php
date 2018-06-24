<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function register_user($enc_password){
        // Array data user 
        $data = array(
            'nmUser' => $this->input->post('nmUser'),
            'kodepos' => $this->input->post('kodepos'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $enc_password,
            'dateRegister' => date("Y/m/d"),
            'fk_idLevel' => $this->input->post('membership'),
        );

        // Insert user
        return $this->db->insert('user', $data);
    }

    // Proses login user
    public function login_user($username, $password){
        // Validasi
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('user');


        if($result->num_rows() == 1){
            return $result->row(0)->idUser;
        } else {
            return false;
        }
    }

    public function get_user_level($idUser) {
       // Dapatkan data level
       $this->db->select('fk_idLevel');
       $this->db->where('idUser', $idUser);

       $result = $this->db->get('user');

       if ($result->num_rows() == 1) {
           return $result->row(0)->fk_idLevel;
       } else {
           return false;
       }
   }

   public function get_user_details($username)
   {
       $this->db->join('level','level.idLevel = user.fk_idLevel','left');
       $this->db->where('username', $username);

       $result = $this->db->get('user');

       if ($result->num_rows() == 1) {
           return $result->row();
       } else {
           return false;
       }
   }

   public function get_level_name($idLevel)
   {
        $this->db->select('nmLevel');
        $this->db->where('idLevel', $idLevel);

        $result = $this->db->get('level');

        if ($result->num_rows() == 1) {
            return $result->row();
        } else {
            return false;
        }
   }
}
