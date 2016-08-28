<?php

//session_start();

class dashboard extends CI_Controller {
    
    public $status;
    public $roles;


    public function __construct() {
            parent::__construct();
            $this->load->model('PDCModel');
            $this->load->library('form_validation');
            $this->load->library('xmlrpc');
            $this->load->library('xmlrpcs');
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
                //echo 'Funcão de Teste';
                $this->load->library('xmlrpc');
                $this->load->library('xmlrpcs');

                $this->xmlrpc->server('http://rpc.pingomatic.com/', 80);
                $this->xmlrpc->method('weblogUpdates.ping');

                $request = array('My Photoblog', 'http://www.my-site.com/photoblog/');
                $this->xmlrpc->request($request);

                if ( ! $this->xmlrpc->send_request())
                {
                        echo $this->xmlrpc->display_error();
                }
            }
            
            
            function hashPassword($pass,$salt=FALSE)
            {
                //coloca o Salt no inicio, meio e fim da senha
                if (!empty($salt)) { $pass=$salt.implode ($salt, str_split ($pass,  floor (strlen ($pass/2))).$salt); }
                return md5($salt) ;
                
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
            //$data['title'] = ucfirst($page); // Colocar o nome do candidato aqui
            $this->load->view('/'.$page);

        }
        
        public function logout()
        {
            $this->PDCModel->logout($this->session->email);
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
            $data['PeriodoDoDia'] = $this->PeriodoDia();
            $data['orcamento']= $this->orcamento();
            $data['avaliacoes']=  $this->avaliacoes();
            $data['avisos']= $this->avisos();
            $data['localizacao']= $this->localizacao();
            $data['PrevisaoTempo']= $this->PrevisaoTempo();
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
               
               $hashpwd= $this->hashPassword($password,$email);
               
               $result=$this->PDCModel->login($email,$hashpwd);
               
               $this->load->helper('url');

               if($result)
               {                   
                   //$this->load->view("dashboard");
                   redirect('/');                   
               } else
               {
                   $this->session->set_flashdata('flash_message', 'Falha de Login. Email ou senha incorretos');
                   //redirect('/');
                   redirect(site_url().'');
               }       
            }
            
        }
        
        public function registra_usuario()
        {
            //require 'application/libraries/Password.php';

            $this->form_validation->set_rules('register-firstname', 'First Name', 'required');
            $this->form_validation->set_rules('register-lastname', 'Last Name', 'required');    
            $this->form_validation->set_rules('register-email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('register-password','Password','required');
            
            if ($this->form_validation->run() == false)
                {
                    $this->session->set_flashdata('flash_message', 'Erro de Cadastro');
                    redirect('/login#register');
                } else 
                    {
                        if($this->PDCModel->isDuplicate($this->input->post('register-email')))
                        {
                            //echo 'email duplicado'; //Verificar como chamar msg bootstrp do controlador ci
                            $this->session->set_flashdata('flash_message', 'Email já Cadastrado');
                            redirect('/login#register');
                        } else {

                                //$this->load->library('password');  #a biblioteca Password estava dando problemas

                                $clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
                                
                                $password = $this->hashPassword($clean['register-password'],$clean['register-email']);
                                
                                $clean['register-password']=$password;
                                
                                $id = $this->PDCModel->insertUser($clean); 
                                $token = $this->PDCModel->insertToken($id);  
 
                                $qstring = base64_encode($token);                    
                                $url = site_url() . 'dashboard/complete/token/' . $qstring;
                                $link = '<a href="' . $url . '">' . $url . '</a>'; 

                                $message = '';                     
                                $message .= '<strong>Você cadastrou-se no PDC</strong><br>';
                                $message .= '<strong>Clique para Validar seu endereço de email</strong> ' . $link;                          
                                echo $message; //send this in email
                                exit;   
                      
                            
                                
                        }
                        
                    } 
        }
        
        public function complete()
        {                                   
            $token = base64_decode($this->uri->segment(4));       
            $cleanToken = $this->security->xss_clean($token);
            
            $user_info = $this->PDCModel->isTokenValid($cleanToken); //either false or array();           
                        
            if(!$user_info){
                $this->session->set_flashdata('flash_message', 'O Token é inválido ou expirou');
                redirect(site_url().'/login');
            }            
            $data = array(
                'firstName'=> $user_info->first_name, 
                'email'=>$user_info->email, 
                'user_id'=>$user_info->id, 
                'token'=>base64_encode($token)
            );
           
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
            
            if ($this->form_validation->run() == FALSE) {   
                $this->load->view('login/header');
                $this->load->view('login/complete', $data);
                $this->load->view('login/footer');
                
               // echo $data['email'].' '.$data['user_id'];
            }else{
                
                //$this->load->library('password');    # biblioteca externa libraries/Password não carregando. Verificar             
                $post = $this->input->post(NULL, TRUE);
                
                $cleanPost = $this->security->xss_clean($post);
                
                //$hashed = $this->password->create_hash($cleanPost['password']); // Antiga utilizacao da bib. ext. Password
                
                $hashed = $this->hashPassword($cleanPost['password'],$data['email']);
                
                $cleanPost['password'] = $hashed;
                
                unset($cleanPost['passconf']);
                
                $userInfo = $this->PDCModel->updateUserInfo($cleanPost);
                if(!$userInfo){
                    $this->session->set_flashdata('flash_message', 'Houve um problema na atualização do usuário');
                    redirect(site_url().'dashboard/login');
                }
                
                unset($userInfo->password);
                
                foreach($userInfo as $key=>$val){
                    $this->session->set_userdata($key, $val);
                }
                redirect(site_url().'/');
                
            }
        }
        
        public function forgot()
        {   
            $this->form_validation->set_rules('reminder-email', 'Email', 'required|valid_email'); 
            
            if($this->form_validation->run() == FALSE) {
                //$this->load->view('header');
                //$this->load->view('forgot');
                //$this->load->view('footer');
                redirect('/login#reminder');
                
            }else{
                $email = $this->input->post('reminder-email');  
                $clean = $this->security->xss_clean($email);
                $userInfo = $this->PDCModel->getUserInfoByEmail($clean);
                
                if(!$userInfo){
                    $this->session->set_flashdata('flash_message', 'Email não encontrado');
                    redirect(site_url().'/login#reminder');
                }   
                
                if($userInfo->status != $this->status[1]){ //if status is not approved
                    $this->session->set_flashdata('flash_message', 'Sua Conta ainda não foi validada/aprovada');
                    redirect(site_url().'/login#reminder');
                }
                
                //build token 
				
                $token = $this->PDCModel->insertToken($userInfo->id);                    
                $qstring = base64_encode($token);                    
                $url = site_url() . 'dashboard/reset_password/token/' . $qstring;
                $link = '<a href="' . $url . '">' . $url . '</a>'; 
                
                $message = '';                     
                $message .= '<strong>Uma redefinição de senha foi solicitada</strong><br>';
                $message .= '<strong>Clique abaixo para gerar outra senha</strong> ' . $link;             
                echo $message; //send this through mail
                exit;   
            }  
        }   
        
        public function reset_password()
        {
            $token = base64_decode($this->uri->segment(4));       
            $cleanToken = $this->security->xss_clean($token);
            
            $user_info = $this->PDCModel->isTokenValid($cleanToken); //either false or array();               
            
            if(!$user_info){
                $this->session->set_flashdata('flash_message', 'O Token é inválido ou expirou');
                redirect(site_url().'/login#reminder');
            }            
            $data = array(
                'firstName'=> $user_info->first_name, 
                'email'=>$user_info->email, 
                'user_id'=>$user_info->id, 
                'token'=>base64_encode($token)
            );
           
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
            
            if ($this->form_validation->run() == FALSE) {   
                $this->load->view('login/header');
                $this->load->view('login/reset_password', $data);
                $this->load->view('login/footer');
            }else{
                                
                //$this->load->library('password');                 
                //$post = $this->input->post(NULL, TRUE);                
                //$cleanPost = $this->security->xss_clean($post);                
                //$hashed = $this->password->create_hash($cleanPost['password']); 
                
                $clean = $this->security->xss_clean($this->input->post(NULL, TRUE));

                $hashed = $this->hashPassword($clean['password'],$clean['email']);

                $clean['password'] = $hashed;
                $id = $this->PDCModel->insertUser($clean); 
                $token = $this->PDCModel->insertToken($id); 

                unset($clean['passconf']);   
                
                if(!$this->PDCModel->updatePassword($clean)){
                    $this->session->set_flashdata('flash_message', 'Houve um problema na atualização de senha');
                }else{
                    $this->session->set_flashdata('flash_message', 'Sua senha foi alterada. Entre Novamente');
                }
                redirect(site_url().'/');                
            }
        }       
        
        public function PeriodoDia(){
            
            //$horaAtual = date('H:i'); - Hora do Servidor
            $h = "3";// Hour for time zone goes here e.g. +7 or -4, just remove the + or -
            $hm = $h * 60; 
            $ms = $hm * 60;
            $gmdate = gmdate("G:i", time()-($ms)); // the "-" can be switched to a plus if that's what your time zone is.
            
            if ($gmdate >0 AND $gmdate < 12 ) {
              $periodo = 'Bom dia';  
            } else if ($gmdate >12 AND $gmdate <19) {
              $periodo = 'Boa Tarde';   
            } else if ($gmdate >19){
               $periodo = 'Boa Noite'; 
            } else {
                $periodo = 'Olá';
            }
            //echo $gmdate;
            return $periodo;
        }
        
        public function orcamento(){
            return '00,00';
        }
        
        public function avaliacoes(){
            return '14';
        }
        
        public function avisos(){
            return '02';
        }

        public function testeHoras(){
             //echo date('H:i');
             $horaAtual = date('H:i');
             $h = "3";// Hour for time zone goes here e.g. +7 or -4, just remove the + or -
             $hm = $h * 60; 
             $ms = $hm * 60;
             $gmdate = gmdate("G:i", time()-($ms)); // the "-" can be switched to a plus if that's what your time zone is.
             echo "Your current time now is :  $gmdate  ";
        }
        
        public function localizacao(){
            return 'Curitiba';
        }

        public function PrevisaoTempo(){
            
            
            /** manual input - problema no xpath
            $cidade='Curitiba';
            $estado='Parana;';
            $pais='Brazil';
            $idioma='pt-br';
            $googleWeather='http://www.google.com/ig/api';
            
            //formatando a url de requisição à API do Google
            $apiURL=$googleWeather.'?weather='.urlencode($cidade).','.urlencode($estado).','.urlencode($pais).'&hl='.$idioma;
            
            // exemplo url formatada: http://www.google.com/ig/api?weather=Curitiba,Parana%3B,Brazil&hl=pt-br
            
            //passando os dados para o SimpleXML
            
            //$resultado=  file_get_contents($apiURL);
            
            $resultado=  file_get_contents('http://www.google.com/ig/api?weather=Maringa,Parana,Brazil&hl=pt-br');
            
            
            // O SimpleXML precisa receber valores em UTF-8, então usamos o uft8_encode()
            
            $xml = simplexml_load_string(utf8_encode($resultado));
            
            //separando as informações XML
            
            //$info = $xml->xpath('/xml_api_reply/weather/forecast_information');
            
            //$atual = $xml->xpath('/xml_api_reply/weather/current_conditions');
            
            //$proximos = $xml->xpath('/xml_api_reply/weather/forecast_conditions');
            
            //echo $atual[0]->temp_c['data']; 
   
             */
            
            //
            //$this->load->library('google_weather_api');
            
            /**
            
            $weather = new weather();
            if (!empty($_GET['loc'])) {
                    $weather->location = $_GET['loc'];
            }
            $weather->get();
            if($weather->error){
                    die('We couldn\'t find your location.');
            }else{
                    echo '
                    <div id="currentWeather">
                            <h1>Now in '.ucwords($weather->location).': '.$weather->current->temp_c['data'].' &#8451;</h1>
                            <img src="http://www.google.com/' .$weather->current->icon['data'] . '"/>
                            <p>'.$weather->current->condition['data'].'</p>
                            <p>'.$weather->current->humidity['data'].'</p>
                            <p>'.$weather->current->wind_condition['data'].'</p>
                    </div>
                    ';
                    // display more days info
                    // print_r($weather->nextdays);
                    //$weather->display();

                        
                    }
             * 
             */
            
            return '26';
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