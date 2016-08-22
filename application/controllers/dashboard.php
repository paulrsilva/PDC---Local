<?php

//session_start();

class dashboard extends CI_Controller {
    
    public $status;
    public $roles;


    public function __construct() {
            parent::__construct();
            $this->load->model('PDCModel');
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->status = $this->config->item('status');
            $this->roles = $this->config->item('roles');
        }


        public function index() {                        
                $this->load->helper('url');
                
                // Verificar se o usuário está logado com sessão ativa
                // Se estiver, recupere os dados e envie para o Dash
                
                // $this->dash();
                
                // Senão envie para página de login              
                
                $sessao_ativa = $this->verifica_sessao();
                
                if ($sessao_ativa==TRUE){
                    $this->dash();
                } else {
                    $this->login(); 
                }
                
                //$this->dash2();      
       }    
        
       
       
        public function view($page='user_profile')
        {
          if ( ! file_exists(APPPATH.'views/'.$page.'.php'))
            {
                // Whoops, we don't have a page for that!
                show_404(); 
            }
            $this->load->helper('url');
            $this->load->view('/'.$page, $data);
        }
       
        public function teste()
            {
                echo 'Funcão de Teste';
            }
            
            
        public function verifica_sessao() //substituir com função privada ?
        {
          if ($this->session->userdata('logged_in')){
            return TRUE;
        } else {
            return FALSE;
        }
        }

        public function login ($page='login')
        {
            if ( ! file_exists(APPPATH.'views/'.$page.'.php'))
            {
                // Whoops, we don't have a page for that!
                show_404(); 
            }
            $this->load->helper('url');
            $data['title'] = ucfirst($page); // Colocar o nome do candidato aqui
            $this->load->view('/'.$page, $data);

        }
        
        public function logout()
        {
            $this->session->sess_destroy();
            $this->load->helper('url');
            redirect('/');
        }

        public function dash ($page='dashboard')
        {
           if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
            {
                // Whoops, we don't have a page for that!
                show_404(); 
            }
            $data['title'] = ucfirst($page); // Colocar o nome do candidato aqui
            $this->load->view('admin/'.$page, $data);
        }
    
        public function redireciona (){
            redirect('/views/admin/dashboard_view.php');
        }
        
        
        public function autentica_usuario(){
            
            //a validação do formulário já está sendo feita pelo js
            $this->load->library('form_validation');
            $this->form_validation->set_rules('login-email','Seu email','trim|required');
            $this->form_validation->set_rules('login-password','Sua senha','trim|required');
            
            if ($this->form_validation->run() == false)
            {
                echo 'falha de validacao';
                //$this->load->view("login");
            }
            else
            {
               $email=$this->input->post('login-email');
               $password= $this->input->post('login-password');
               
               $result=$this->PDCModel->login($email,$password);
               
               $this->load->helper('url');

               if($result)
               {                   
                   //$this->load->view("dashboard");
                   redirect('/');                   
               } else
               {
                   $this->session->set_flashdata('flash_message', 'The login was unsucessful');
                   //redirect('/');
                   redirect(site_url().'dashboard/login');
               }       
            }
            
        }
        
        public function registra_usuario()
        {
            $this->form_validation->set_rules('register-firstname', 'First Name', 'required');
            $this->form_validation->set_rules('register-lastname', 'Last Name', 'required');    
            $this->form_validation->set_rules('register-email', 'Email', 'required|valid_email');  
            
            if ($this->form_validation->run() == false)
                {
                    echo 'falha de registro';
                    //$this->load->view("login");
                } else 
                    {
                        if($this->PDCModel->isDuplicate($this->input->post('register-email')))
                        {
                            echo 'email duplicado'; //Verificar como chamar msg bootstrp do controlador ci
                        } else {
                                $clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
                                $id = $this->PDCModel->insertUser($clean); 
                                $token = $this->PDCModel->insertToken($id);                                        

                                $qstring = base64_encode($token);                    
                                $url = site_url() . 'dashboard/complete/token/' . $qstring;
                                $link = '<a href="' . $url . '">' . $url . '</a>'; 

                                $message = '';                     
                                $message .= '<strong>You have signed up with our website</strong><br>';
                                $message .= '<strong>Please click:</strong> ' . $link;                          
                                echo $message; //send this in email
                                exit;   
                        }
                        
                    } 
        }
        
        

        
        public function dash2 ($page='admin_page')
        {
         if ( ! file_exists(APPPATH.'views/'.$page.'.php'))
            {
                // Whoops, we don't have a page for that!
                show_404(); 
            } 
            $this->load->view('/'.$page);
        }
    
        
        
}