<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class PDCModel extends CI_Model {
    
    public $status;
    public $roles;
    
    public function __construct() {
        parent::__construct();
        $this->status=  $this->config->item('status');
        $this->roles= $this->config->item('roles');
            
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

    
    
    // Pre-cadastro usuário
     public function insertUser($d)
    {  
            $string = array(
                'first_name'=>$d['register-firstname'],
                'last_name'=>$d['register-lastname'],
                'email'=>$d['register-email'],
                'role'=>$this->roles[0], 
                'status'=>$this->status[0]
            );
            $q = $this->db->insert_string('users',$string);             
            $this->db->query($q);
            return $this->db->insert_id();
    }   
    
    
    // Cadastro - Verifica se o email já foi cadastrado
    public function isDuplicate($email)
    {     
        $this->db->get_where('users', array('email' => $email), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;         
    }

    
     public function insertToken($user_id)
    {   
        $token = substr(sha1(rand()), 0, 30); 
        $date = date('Y-m-d');
        
        $string = array(
                'token'=> $token,
                'user_id'=>$user_id,
                'created'=>$date
            );
        $query = $this->db->insert_string('tokens',$string);
        $this->db->query($query);
        return $token;
        
    }   
    
       public function isTokenValid($token)
    {
        $q = $this->db->get_where('tokens', array('token' => $token), 1);        
        if($this->db->affected_rows() > 0){
            $row = $q->row();             
            
            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d'); 
            $todayTS = strtotime($today);
            
            if($createdTS != $todayTS){
                return false;
            }
            
            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;
            
        }else{
            return false;
        }
        
    } 
    
    public function updateUserInfo($post)
    {
        $data = array(
               'password' => $post['password'],
               'last_login' => date('Y-m-d h:i:s A'), 
               'status' => $this->status[1]
            );
        $this->db->where('id', $post['user_id']);
        $this->db->update('users', $data); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updateUserInfo('.$post['user_id'].')');
            return false;
        }
        
        $user_info = $this->getUserInfo($post['user_id']); 
        return $user_info; 
    }
    
      public function getUserInfo($id)
    {
        $q = $this->db->get_where('users', array('id' => $id), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$id.')');
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