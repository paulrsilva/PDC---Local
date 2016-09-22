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
         //require 'application/libraries/Password.php';
            $string = array(
                'first_name'=>$d['register-firstname'],
                'last_name'=>$d['register-lastname'],
                'email'=>$d['register-email'],
                'password'=>$d['register-password'],
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
               //'password' => $post['password'],
               'last_login' => date('Y-m-d h:i:s A'), 
               'status' => $this->status[1],
                'email_verificado' => 1 //se a primeira verificação for por email
            );
        
        $this->db->where('id', $post['user_id']);
        $this->db->update('users', $data); 
        $success = $this->db->affected_rows(); 
              
        if(!$success){
            echo 'impossivel atualizar user';
            error_log('Unable to updateUserInfo('.$post['user_id'].')');
            return false;
        }
        
        $user_info = $this->getUserInfo($post['user_id']); 
        return $user_info; 
    }
    
    public function carregaDadosCadastro($userID){
                
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $userID);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
        
    }


    public function atualizaCadastro($id, $data){
        
         $string = array(
                'username'=>$data['user_username'],
                'sexo'=>$data['register-lastname'],
                'CPF'=>$data['masked_CPF'],
                'Data_Nascimento'=>$data['masked_date'],
                'NumCelular'=>$data['masked_cel_user'], 
                'NumFixo'=>$data['masked_phone_user'], 
                'UF'=>$data['user-UF'], 
                'Cidade'=>$data['user-cidade'],
                'CEP'=>$data['masked_cep_user'],
                'End'=>$data['user_end'],             
                'role'=>$data['user-role']
                //'status'=>$this->status[0]
            );
            $q = $this->db->insert_string('users',$string);             
            $this->db->query($q);
        
        $this->db->where('id', $id);
        $this->db->update('users',$data);
        
    }
    
    public function atualizaCadastroUser($id, $data){
        
        $this->db->where('id', $id);
        $this->db->update('users',$data);
        
        $success = $this->db->affected_rows(); 
              
        if(!$success){
            echo 'impossivel atualizar user';
            error_log('Impossível atualizar o usuário ('.$id.')');
            return false;
        }  
        return TRUE;      
    }

    public function insereCandidato ($data)
    {
        /**
        $q = $this->db->insert_string('Candidato',$data);             
        $this->db->query($q);
        return $this->db->insert_id();
         * 
         * @param type $id
         * @return boolean
         */
             
        //var_dump($data);     
        $this->db->insert('Candidato',$data ); 
        $success=$this->db->affected_rows();
        if(!$success){
            error_log('Impossível inserir Candidato');
            return FALSE;
        }
        return $this->db->insert_id(); //Pega a id_Candidato inserido
    }

    public function atualizaCadastroCandidato($id, $data){
     
        var_dump($data);   
        //$this->db-where('id_Candidato',$idCandidato); //Por alguma razão alienígena a clausula WHERE não está funcionando aqui   
        $this->db->update('Candidato',$data, "id_Candidato=$id");
        $success = $this->db->affected_rows();
        if(!$success){
            error_log('Impossível atualizar Candidato ('.$id.')');
            //ECHO "QUE ERRO DA PORRA?";
            return FALSE;
            
        }  
        return TRUE;    
    }
    
    public function CarregaPalavrasChave($idCandidato){
        //$idTeste=83;
        $query = $this->db->query("SELECT * from PalavrasChave WHERE Candidato='$idCandidato'");
        return $query;      
    }
    
    public function ArmazenaPalavrasChave($idCandidato, $string){
           $palavras = explode(",", $string); //Convertendo para array com a ',' como delimitador

           //Limpando as Palavras Chave do Candidato
           $this->db->where('Candidato', $idCandidato);
           $this->db->delete('PalavrasChave');

           //Adicionando o novo array de palavras chave
           foreach ($palavras as $palavra){
               $data=array(
                 'Candidato'  => $idCandidato,
                  'PalavraChave' => $palavra  
               );
               $this->db->insert('PalavrasChave',$data);
           }
           
           return count($palavras); //retorna o nº de palavras incluídas
    }

    public function getUserInfo($id)
    {
        $q = $this->db->get_where('users', array('id' => $id), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('usuário não encontrado('.$id.')');
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
                   'idUsuario' =>$rows->id,
                   'email' => $rows->email,
                   'logged_in' => TRUE,
                   'nome' => $rows->first_name,
                   'sobrenome' =>$rows->last_name,
                    );     
                
                $idUsuario = $rows->id;
                
                //atualiza ultimo login do usuário
               $data = array(
                    'last_login' => date('Y-m-d h:i:s A'), 
                    'logado'=>1
                    //'status' => $this->status[1]
               );
                                
                $this->db->where('id', $idUsuario);
                $this->db->update('users', $data); 
      
            }
            $this->session->set_userdata($newdata);
            return true;
        } else 
            {
                return FALSE;
            }
        
    }
    
    public function logout($email)
    {
        
        $this->db->where('email',$email);
        $this->db->update('users', array('logado' => 0));
               
        
    }
    
    
    public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('users', array('email' => $email), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('usuário não encontrado('.$email.')');
            return false;
        }
    }   
    
    
    public function updatePassword($post)
    {   
        $this->db->where('id', $post['user_id']);
        $this->db->update('users', array('password' => $post['password'])); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updatePassword('.$post['user_id'].')');
            return false;
        }        
        return true;
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
    
    public function lista_estados(){
        $query = $this->db->get('estado');
        $query_result = $query->result();
        return $query_result;
    }
    
    public function PegaUFSelecionada ($UF_db){

         //$query = $this->db-query("select idestado from estado where uf='PR'");
         //$row = $query->row();
         $query = $this->db->query("SELECT idestado from estado WHERE uf='$UF_db'");
         $row = $query->row();
         return $row->idestado; 
    }
    
    //Retorna apenas uma linha com o estado selecionado
    public function estado_selecionado($idestado, $UF_db){ 
        
        /**
        if (!isset($idestado)){
            $idUf=18; //Se ão estiver definido na chamada, puxa as cidades do PR
        } else {
            $idUf=$idestado;
        }
         * 
         */
        
        if (isset($idestado)){
            $idUf=$idestado;
        } else if (isset($UF_db)) {
            $idUf=$UF_db;
        } else {
            $idUf=18; //Se ão estiver definido na chamada, puxa as cidades do PR
        }
        
        $query = $this->db->query("SELECT * from estado WHERE idestado=$idUf");
        $row = $query->row();
        return $row->uf; //Mudar para que seja apresentado a UF Completa
    }


    public function lista_cidades($idestado){

        if (!isset($idestado)){
            $idUf=18; //Se ão estiver definido na chamada, puxa as cidades do PR
        } else {
            $idUf=$idestado;
        }
        $query = $this->db->query("SELECT * FROM cidade WHERE idestado=$idUf");
        $query_result = $query->result();
        return $query_result;
    }

    
    public function lista_partidos(){
        $query = $this->db->get('Partidos');
        $query_result = $query->result();
        return $query_result;
    }

    /**
    public function ListaEstados(){
            $this->db->select('idestado','nome');
            $this->db->from('estado');
            $query = $this->db->get();
            return $query->result();
        }
    * 
    */
    
    public function PegaDadosUser($idusuario){
        
        // Ampliar para pegar a id de usuário pelo email ou celular
        
        $query = $this->db->query("select * from users where email='$idusuario'");
        $row = $query->row();
        if (isset($row))
        {
                // echo $row->id;
                // echo $row->first_name;
                // echo $row->last_name;
                return $row;           
        } else {
            return false;
        }
    }
    
    public function PegaDadosCandidato($idCandidato){
        $query = $this->db->query("select * from Candidato Where id_Candidato = '$idCandidato'");
        $row = $query->row();
        if (isset($row))
        {
            return $row;
        } else {
            return false;
        }
    }
    
    public function PegaIdCandidato_User($idUsuario){
        //Colocar validação para multiplos candidatos 
        $query = $this->db->query("select id_candidato from users where id='$idUsuario'");
        $row = $query->row();
        if (isset($row)){
           return $row->id_candidato;  
        } else {
            return FALSE;
        }
          

        //var_dump($row);
    }






    public function AtualizaFotoUser ($id,$data) {
        $this->db->where('id', $id);
        $this->db->update('users',$data);
        
        $success = $this->db->affected_rows(); 
              
        if(!$success){
            //error_log('Impossível atualizar o usuário ('.$id.')');
            return FALSE;
        }
        
        return TRUE;
    }
    
    public function atualizaFotoCandidatoDB ($id,$data){
      //var_dump($data);
      //$this->db->where('id', $id);  
      $this->db->update('Candidato',$data,"id_Candidato=$id");
      $success = $this->db->affected_rows();
      if(!$success){
            error_log('Impossível atualizar foto do candidato ('.$id.')');
            return FALSE;
      }
      return TRUE;
    }


    public function RetornaFotoUser ($idusuario){
        $query = $this->db->query("select * from users where email='$idusuario'");
        $row = $query->row();
        if (isset($row)){
            return $row;
        }   else {
            return FALSE;
        }

    }
    
    public function RetornaFotoCandidato ($idCandidato){
        $query = $this->db->query("select foto from Candidato where id_Candidato='$idCandidato'");
        $row = $query->row(); 
        if (isset($row)){
            return $row->foto;
        }   else {
            return FALSE;
        }
    }
    
    public function RetornaNomeUrnaCandidato ($idCandidato){
        $query = $this->db->query("select ApelidoPolitico from Candidato where id_Candidato='$idCandidato'");
        $row = $query->row();
        if (isset($row)){
            return $row->ApelidoPolitico;
        }   else {
            return FALSE;
        }
    }
            
    
    public function RetornaPartidoCandidato ($idCandidato){
        
       $query = $this->db->query("select id_partido FROM Candidato where id_Candidato='$idCandidato'"); 
       $row = $query->row(); 
       $query2 = $this->db->query("select SiglaPartido from Partidos where id_Partido=$row->id_partido");
       $row2 = $query2->row();
       if (isset($row2))   {
           return $row2->SiglaPartido;
       } else {
           return FALSE;
       }
            
    }


}

?>