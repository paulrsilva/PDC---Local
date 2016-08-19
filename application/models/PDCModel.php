<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class PDCModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }


    // Insert registration data in database
    public function registration_insert($data) {

    // Query to check whether username already exist or not
    $condition = "user_name =" . "'" . $data['user_name'] . "'";
    $this->db->select('*');
    $this->db->from('user_login');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {

    // Query to insert data in database
    $this->db->insert('user_login', $data);
    if ($this->db->affected_rows() > 0) {
    return true;
    }
    } else {
    return false;
    }
    }

    // Lê os dados usando o email e a senha
    public function login($email,$password) {
        
        $this->db->where("email",$email);
        $this->db->where("password",$password);
        
        $query=  $this->db->get("users");
        
        if ($query->num_rows()>0)
        {
            foreach ($query->result() as $rows)
            {
               //Adiciona todos os dados na sessão
              
                $newdata = array(
                   'email' => $rows->email,
                   'logged_in' => TRUE,
                   'nome' => $rows->first_name,
                    'sobrenome' =>$rows->last_name,                  
                    );          
            }
            $this->session->set_userdata($newdata);
            return true;
        } else 
            {
                return FALSE;
            }
        
        
        /**
        $condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('email');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
        return true;
        } else {
        return false;
        }
         * **/
        
    
    }

    // Read data from database to show data in admin page
    public function read_user_information($username) {

    $condition = "user_name =" . "'" . $username . "'";
    $this->db->select('*');
    $this->db->from('user_login');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
    return $query->result();
    } else {
    return false;
    }
    }

}

?>