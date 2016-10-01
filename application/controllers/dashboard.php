<?php

//session_start();


//Definindo constantes de direitos (R+W+X+)
// No PHP 7 usar o define ( ex. define('DEFAULT_ROLES', array('guy', 'development team'));
// Usa o referenciamento de dtos do linux como base (R=4, W=2, X=1)
const Dtos_Leitura = [4,5,6,7];
const Dtos_Escrita = [2,3,6,7];
const Dtos_Execucao = [1,3,5,7];

//define('TesteConstante', 'teste2');

class dashboard extends CI_Controller {
    
    public $status;
    public $roles;

    public $VarFotoCand;
    public $VarFotoMembro;
    
    public $VarTeste='TESTE';
    

            // Usa o referenciamento de dtos do linux como base (R=4, W=2, X=1) //Definir os valores de direitos como constante
            /** Como os valores não mudam, atribuí em constantes
            $leitura = array(4,5,6,7);
            $escrita = array(2,3,6,7);
            $execucao = array (1,3,5,7);
             * 
             */
    
    //define('ValLeitura' 'testeLeitura');


    public function __construct() {
            parent::__construct();
            $this->load->helper('url','array','date','security');
            $this->load->model('PDCModel');
            //$this->load->helper('url');
            $this->load->library('form_validation');
            $this->load->library('xmlrpc');
            $this->load->library('xmlrpcs');
            //$this->load->helper('security');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->status = $this->config->item('status');
            $this->roles = $this->config->item('roles');
            //$this->load->library('google_weather_api'); 
        }


        public function index() {                        
                $this->load->helper('url');
                
                // Verificar se o usuário está logado com sessão ativa
                // Se estiver, recupere os dados e envie para o Dash        
                // $this->dash();
                // Senão envie para página de login
                
                //Se no primeiro login, sem candidato definido,
                // envia para página de finalização de cadastro
                
                $sessao_ativa = $this->verifica_sessao();
                
                //$sessao_ativa = TRUE; //Mantem sessao ativa para testes
                
                if (!isset($this->session->userdata['logged_in'])){
                        //verifica se o usuário está logado
                        $this->login(); 
                    } elseif (!$this->PDCModel->PegaIdCandidato_User($this->session->userdata['idUsuario'])) {
                       // se estiver, mas sem candidato atribuído envia para página de finalização de cadastro
                       $this->finalizaCadastro();
                    } else {
                       $this->dash();
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
               // echo 'Funcão de Teste';
                $this->load->library('xmlrpc');
                $this->load->library('xmlrpcs');
                $this->load->helper('url');
                //$this->load->library('gweather');
                      
                
                
                //$feed = file_get_contents("http://weather.yahooapis.com/forecastrss?w=2295424&u=c");
                //$xml = new SimpleXmlElement($feed);
                
                //$url = 'http://weather.yahooapis.com/forecastrss?w=2295424&u=c';
  
                
                //$handle=  fopen($url, "rb");
                //$contents = stream_get_contents($handle);
                //fclose($handle);
                //$xml =  $contents;
                
               // $weatherData = $this->simplexml->xml_parse($xml);
                
               // $fields = array();
               //$fields['temp'] = $weatherData['channel']['item']['yweather:condition']['@attributes']['temp'];
               //$fields['conditions'] = $weatherData['channel']['item']['yweather:condition']['@attributes']['text'];
               // $fields['recorded_at'] = date('Y-m-d H:i:s',strtotime($weatherData['channel']['item']['yweather:condition']['@attributes']['date']));
                
               // echo $fields['temp'];
                
                $feed = file_get_contents("http://weather.yahooapis.com/forecastrss?OAuth=dj0yJmk9VkZhVmNLWElBUmt6JmQ9WVdrOWQwNU9iV3BNTkhFbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD1jOQ--,w=2442047&u=c");
                
                print($feed);
                
                echo 'teste function';
            
                
                /**
                
                   foreach($xml->channel->item as $entry1)
                   {
                       $yweather1 = $entry1->children("http://xml.weather.yahoo.com/ns/rss/1.0");
                       $tag1 = $yweather1->condition;
                       foreach($tag1->attributes() as $a => $b)
                      {
                           if($a == 'text')
                           {
                               $weather_climate = $b;
                           }
                           if($a == 'temp')
                           {
                                   $weather_temperature = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$b."&deg;";
                           }
                      }
                   }
                   $image_name =explode("<img src=",$xml->channel->item->description);
                   $w_image = explode("/>",$image_name[1]);
                   $weather_image = $w_image[0];
                   echo 'Weather image: <img src='.$weather_image.'>';
                   echo "<br><br><br>";
                   echo $weather_climate;
                   echo $weather_temperature.'C';
                   echo '----';
                 * 
                 * @param string $pass
                 * @param type $salt
                 * @return type
                 */
                                           
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
           $this->load->helper('array','date');
           if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
            {
                // Whoops, we don't have a page for that!
                show_404(); 
            }
            
            //$this->VarDash = 'kkkk';  //testando variavel entre funcoes
            
            $DadosUsuario = array(
                    'nome' => $this->session->nome,
                    'foto' => $this->FotoUsuario()
            );
            
            $DadosCandidato = array(
                'foto' => $this->RetornaImagemCandidato(),
                'TituloCandidato' => $this->RetornaNomeResumidoCandidato($this->pegaNumeroCandidato()),
                'dadosDB' => $this->PDCModel->PegaDadosCandidato($this->pegaNumeroCandidato()) // Atribuir matriz multidimensional mais tarde
            );
            
            $data['title'] = ucfirst($page); // Colocar o nome do candidato aqui
            $data['PeriodoDoDia'] = $this->PeriodoDia();
            $data['orcamento']= $this->orcamento();
            $data['avaliacoes']=  $this->avaliacoes();
            $data['avisos']= $this->avisos();
            $data['localizacao']= $this->localizacao();
            $data['PrevisaoTempo']= $this->PrevisaoTempo();
            //$data['fotoUsuario']= $this->FotoUsuario();
            $data['Usuario']=$DadosUsuario;
            $data['Candidato']=$DadosCandidato;
            $data['CandidatoDB']=$this->PDCModel->PegaDadosCandidato($this->pegaNumeroCandidato());
            $data['cabecalho']=$this->DefineHeaderDash();
            //$data['listaEstados']=  $this->listaEstados();
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
                            echo "<script type='text/javascript'> alert('Email já cadastrado'); </script> ";
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
                                $message .= '<strong>Confirme seu cadastro no PDC</strong><br><br>';
                                $message .= '<br><strong>Clique  no link para Validar seu endereco de email: </strong> ' . $link;  
                                
                               $this->send_mail($this->input->post('register-email'),'PDC - Confirmar Cadastro', $message);
                               
                               echo "<script type='text/javascript'> alert('Um email de verificação foi enviado. Por favor verifique para continuar o cadastro'); </script> ";
                               $this->session->set_flashdata('flash_message', 'Aguardando verificação de email');
                               redirect('/login#register');
                               } 
                                
                               
                                //echo $message; //send this in email      
                         exit;                                          
                        }
                        
        } 
       
        public function conf_usuario($data){ // Função para os settings, Modal, das configurações do usuário
            $this->load->helper('array','date');
            $this->load->library('table');  
            
            var_dump($_POST);

   
            $InfoUsuario = $this->PDCModel->PegaDadosUser($this->session->userdata['email']);
            $idUsuario = $InfoUsuario->id;
        
            $config = array(
                'upload_path' => "./images/placeholders/usuarios",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => TRUE,
                'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "768",
                'max_width' => "1024"
            );
            
            //Mudando o nome da foto enviada
            // Formato: = idUser_data.formatoArquivo

        $new_name = $idUsuario.'_'.date('dmY-h').$_FILES["userfiles"]['name'];
        
        $config['file_name'] = $new_name;
        
        
        //Fim mudando nome do arquivo de foto
        
        $this->load->library('upload', $config);
        
        if($this->upload->do_upload())
            {
                $data = array('upload_data' => $this->upload->data());

                $extencaoNome = element('file_ext' , $data['upload_data']); //pegando extencao nome

                $novaFotoUser = $new_name.$extencaoNome;

                $page='upload_sucess';

                if ($this->AtualizaFotoUserDB($idUsuario, $novaFotoUser)){
                    echo "<script type='text/javascript'> alert('DB atualizado com sucesso'); </script> ";
                } else {
                    echo "<script type='text/javascript'> alert('DB  nao atualizado'); </script> ";
                }
                //$this->load->helper('url');
                //$this->load->view('/'.$page, $data);
                $this->finalizaCadastro();



                var_dump($data);
                echo "<br>";
                echo element('file_name', $data['upload_data']); //*Works

                echo "<br>";
                echo $new_name;
                //$data['upload_data']='xxx.jpg';

                echo "<br>";

                echo element('file_name', $data['upload_data']);

                echo "<br>";

                echo element('file_ext' , $data['upload_data']);
                echo "<br>";
                echo $novaFotoUser;

                //$result = $data->result();       
                //print_r($data);

               // echo "<br>";

               // $replacement = array('file_name' => 'xxx.jpe');

               // $data2 = array_replace($data['upload_data'],$replacement);

               // echo "<br>";
              //  var_dump($data2);


            }
            else
            {
                $error = array('error' => $this->upload->display_errors());
                $page='upload_sucess';
                $this->load->helper('url');
                $this->load->view('/'.$page, $error);
            }
       
            
            
        }
        
        public function atualiza_usuario() { //atualização do usuário pela finalização de cadastro

            $this->load->helper(array('form', 'url', 'date'));    
            $this->load->helper('array');
            $this->load->library('upload');   
            $this->load->library('form_validation');
            
           // echo $this->VarFotoCand;
           // echo $this->VarTeste;
            //var_dump($_POST);
            
            $InfoUsuario = $this->PDCModel->PegaDadosUser($this->session->userdata['email']);
            $idUsuario = $InfoUsuario->id;     
            
            $dateU = strtr($this->input->post('masked_nasc_user'), '/', '-'); // substituindo o '/' pelo '-' para compatibilidade
            $dateC = strtr($this->input->post('masked_nasc_cand'), '/', '-'); // substituindo o '/' pelo '-' para compatibilidade
                                
            $nascimento_user = mdate( "%Y-%m-%d", strtotime($dateU)); //convertendo p/ Data p/o MySQL
            
            $nascimento_candidato = mdate( "%Y-%m-%d",strtotime($dateC)); //convertendo p/ Data p/o MySQL
           
            //
            //echo $this->VarFotoCand;                  
            //$post = $this->input->post();
           
           //echo $this->VarFotoCand; //Variavel global definida na classe

           //$this->enviaFotoCandidato($this->input->post('candidato_foto')); - Testar mais tarde
   
           $dataCandidato = array (
                   'Reference_id'=> $idUsuario, //verificar se alguem já referenciou o candidato
                   'NomeCandidato'=> $this->input->post('nome_candidato'),
                   'CPF_Candidato'=> $this->input->post('masked_cpf_candidato'),
                   //'foto'=> $this->input->post('FotoEnvCand'),
                   'ApelidoPolitico'=> $this->input->post('NomeUrna_candidato'),
                   'Sexo'=> $this->input->post('sexo_candidato'),
                   'data_nascimento'=> $nascimento_candidato,
                   'Email_candidato'=> $this->input->post('email_candidato'),
                   'site'=> $this->input->post('website_canditato'),
                   'Celular'=> $this->input->post('masked_cel_candidato'),
                   'Telefone'=> $this->input->post('masked_phone_candidato'),
                   'Pleito'=> $this->input->post('pleito_disputa'),
                   'CargoDisputa'=> $this->input->post('cargo_disputa'),
                    'UFDisputa'=> $this->input->post('local_disputa_uf'),
                   'CidadeDisputa'=> $this->input->post('local_disputa_cidade'),
                   'id_Partido'=> $this->input->post('partido_candidato'),
                   'Coligacao'=> $this->input->post('coligacoes-tags'),
                   'Numero_Candidato'=> $this->input->post('NumCandidato'),
                   'ExerceCargo'=> $this->input->post('cb_exerceCargo'),
                   'Reeleicao'=>  $this->input->post('cb_reeleicao'),
                   'JaConcorreu'=>$this->input->post('cb_jaconcorreu'),
                   'Resumo' => $this->input->post('example-clickable-bio'),
                   'facebook' => $this->input->post('val_facebook'),
                   'twitter' => $this->input->post('val_twitter' ),
                   'google' => $this->input->post( 'val_google'),
                   'instagram' => $this->input->post('val_instagram')
                   //'UF_Candidato'=> $this->input->post('nome_usuario'),
                   //'Cidade_Candidato'=> $this->input->post('nome_usuario'),
                   //'SituacaoCandidato'=> $this->input->post('nome_usuario'),
                   //'Endereço_Candidato'=> $this->input->post('nome_usuario')
                   //'Obs'=> $this->input->post('nome_usuario')
            );
           
           /**
           var_dump($dataCandidato);
           echo "<BR>";
           echo "--- / ---";
            * 
            */
   
           
            if ($idExistenteCandidato=$this->pegaNumeroCandidato()){
                
                /**
                echo "Atualiza Candidato - ";
                echo $idExistenteCandidato;
                echo "<BR>";
                echo $nascimento_candidato;
                 * 
                 */
 
                 $this->PDCModel->atualizaCadastroCandidato($idExistenteCandidato,$dataCandidato);
                 $idCandidatoInserido = $idExistenteCandidato;
                 $msgCandidato = 'Candidato Atualizado com sucesso ';
             } Else { 
                 //echo "Insere Candidato";
                 $idCandidatoInserido = $this->PDCModel->insereCandidato($dataCandidato); // Insere o candidato e pega a ID de inserção (id_Candidato);
                 $msgCandidato = ' Candidato Inserido com sucesso ';
             }    

             //Fim inserindo candidato
             
             //Adicionando a lista de palavras chave do candidato
             
             $numeroPalavrasIncluidas = $this->PDCModel->ArmazenaPalavrasChave($idCandidatoInserido,$this->input->post('palavras_chave-tags'));
             
             //fim adicionando lista de palavras chave do candidato
           
            // ATUALIZANDO O USUARIO
           
            $dataUsuario = array(
                'first_name'=> $this->input->post('primeiroNome_usuario'),
                'last_name'=> $this->input->post('sobrenome_usuario'),
                'username'=>  $this->input->post('nome_usuario'),
                'sexo'=> $this->input->post('sexo_user'),
                'CPF'=> $this->input->post('masked_cpf_user'),
                'Data_Nascimento'=>$nascimento_user,
                'NumCelular'=> $this->input->post('masked_cel_user'),
                'NumFixo'=> $this->input->post('masked_phone_user'),
                'UF'=> $this->input->post('user-UF'),
                'Cidade'=>  $this->input->post('user-cidade'),
                'CEP'=>  $this->input->post('masked_CEP_user'),
                'End'=> $this->input->post('user_end'),
                'role'=> $this->input->post('user_role'),
                'id_candidato'=> $idCandidatoInserido
            );

           if ($this->PDCModel->atualizaCadastroUser($idUsuario, $dataUsuario)){
               $msgUsuario = 'Usuario atualizado com sucesso';
           } else {
               $msgUsuario =  'usuário não atualizado';
           }
           
           $msgInclusao = $msgUsuario." ".$msgCandidato." ".$numeroPalavrasIncluidas." palavras de plataforma";
           
           echo "<script type='text/javascript'> alert($msgInclusao); </script> ";
           
            //$this->load->helper('url');
            //$this->load->view('/'.$page, $data);
            $this->dash();
  
           //Fim atualizando o usuário
            
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
        
        function send_mail($emailDestino,$assunto, $mensagem){
            
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://email-ssl.com.br',
                'smtp_port' => 465,
                'smtp_user' => 'portaldocandidato@portaldocandidato.inf.br', 
                'smtp_pass' => 'Fagundez@2016', 
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
              );
            
            $this->load->library('email', $config);
            $this->email->initialize($config); // Add 

            $this->email->from('portaldocandidato@portaldocandidato.inf.br','Portal do Candidato');
            $this->email->to($emailDestino);
            $this->email->cc('portaldocandidato@portaldocandidato.inf.br');
            $this->email->subject($assunto);
            ;
            $this->email->message($mensagem);
            
            if($this->email->send()) {
                //echo 'Email sent.';    
                return TRUE;
              } else {
                print_r($this->email->print_debugger()); 
                return FALSE;
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
        
        public function finalizaCadastro($idestado, $page='add_candidato'){
   
          $sessao_ativa = $this->verifica_sessao(); 
          //echo $this->VarFotoCand;
            if ($sessao_ativa==TRUE){
                if ( ! file_exists(APPPATH.'views/'.$page.'.php'))
                 {
                     // Whoops, we don't have a page for that!
                     show_404(); 
                 }
                 
                //$idUsuario = $this->PDCModel->PegaIdUser($this->session->userdata['email']);
                 
                $DadosUsuario = array(
                    'nome' => $this->session->nome,
                    'foto' => $this->FotoUsuario(),
                );
                
                
                
                $DadosCandidato = array (
                    'TituloCandidato' => $this->RetornaNomeResumidoCandidato($this->pegaNumeroCandidato()),
                    'foto' => $this->RetornaImagemCandidato()
                );
                    
                 $this->load->helper(array('form', 'url', 'date'));
                 $this->load->library('upload');
                 
                 
                 $data['usuario'] =  $this->PDCModel->PegaDadosUser($this->session->userdata['email']);
                 
                 
                 $data['CandidatoDB'] = $this->PDCModel->PegaDadosCandidato($this->pegaNumeroCandidato());
                 
                 $data['estado']=$this->PDCModel->lista_estados();
                 
                 
                 $EstadoDB = $this->PDCModel->PegaUFSelecionada($data['usuario']->UF);
                 
                 
                 $data['uf_selecionada']=  $this->PDCModel->estado_selecionado($idestado, $EstadoDB); //manda o estado selecionado JS e o que esta no BD
                 $data['cidade']=$this->PDCModel->lista_cidades($idestado);
                 $data['cidadeCandidato']=$this->PDCModel->lista_cidades($idestado); //Atualizar para o estado do candidato
                 $data['partidos']=$this->PDCModel->lista_partidos();
                 $data['Usuario']=$DadosUsuario;
                 
                 $data['Candidato']=$DadosCandidato;
                 
                 $data['fotoEnviadaCandidato']=$this->RetornaImagemCandidato();
                 
                 $data['PalavrasChave']=  $this->CarregaPalavrasChave($this->pegaNumeroCandidato());
         
                 $this->load->view('/'.$page, $data); 
                 
            } else {
                $this->login(); 
            }
        }
        
        
        public function gerenciarEquipe($idMembro, $page='add_equipe'){
            if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php')) {
                     // Whoops, we don't have a page for that!
                     show_404(); 
            }
            
            //carregando lista de membros da equipe
            $idDoCandidato=$this->pegaNumeroCandidato(); 
            $data['listaEquipe'] = $this->PDCModel->listaMembrosEquipeCandidato($idDoCandidato); 
            
            $listaEquipe = $this->PDCModel->listaMembrosEquipeCandidato($idDoCandidato);
            
            //Criando array com dados atualizados de lista de equipe
            
            foreach ($listaEquipe->result() as $membroEquipe){
                $dataMembrosEquipe[$membroEquipe->Id_MembroEquipe]=array(
                  'id' => $membroEquipe->Id_MembroEquipe,
                  'nome'  => $membroEquipe->Nome,
                  'foto' => $this->RetornaImagemMembro($membroEquipe->foto),
                  'email' =>  $membroEquipe->email,
                  'Acesso' =>  $membroEquipe->Role
                );
            }
            $data['MembrosEquipe'] = $dataMembrosEquipe;
            
            //Fim criando array com dados atualizados de lista de equipe
            
            
            
            //Carregando a lista de atribuições para membro
            $data['atrib']=$this->PDCModel->lista_atrib();
           
            //Se o numero do membro for passado na chamada, atualiza membro
            if (isset($idMembro)){
                $DadosMembro=$this->PDCModel->CarregaDadosMembroEquipe($idMembro);  
                $data['Membro'] = array (
                        'Id_MembroEquipe' => $idMembro,
                        'Nome' => $DadosMembro->Nome,
                        'CPF' => $DadosMembro->CPF,
                        'sexo' => $DadosMembro->sexo,
                        'DataNascimento'=> $DadosMembro->DataNascimento,
                        'foto' => $this->RetornaImagemMembro($DadosMembro->foto),
                        'Email' => $DadosMembro->email,
                        'CEP' => $DadosMembro->CEP,
                        'Endereco' => $DadosMembro->Endereco,
                        'Cidade' => $DadosMembro->Cidade,
                        'UF' => $DadosMembro->UF,
                        'Telefone' => $DadosMembro->Telefone,
                        'Celular' => $DadosMembro->Celular,
                        'AtribMembro' => $DadosMembro->Role
                    );
                
                $data['AcessoGestaoCampanha'] = $this->RetornaDireitos($DadosMembro->AcessoGestCamp);
                $data['AcessoGestaoFinanceira'] = $this->RetornaDireitos($DadosMembro->AcessoGestFin);
                $data['AcessoGestaoGabinete'] = $this->RetornaDireitos($DadosMembro->AcessoGestGab);
                
                //Carrega Grupos do Membro
                $data['GruposMembro']=  $this->CarregaGruposMembro($idMembro);
            }

            //Carregando os dados que serão passados para o View
            $DadosUsuario = array(
                'nome' => $this->session->nome,
                'foto' => $this->FotoUsuario()
            );
            
            $DadosCandidato = array(
                'foto' => $this->RetornaImagemCandidato(),
                'TituloCandidato' => $this->RetornaNomeResumidoCandidato($this->pegaNumeroCandidato()),
                //'dadosDB' => $this->PDCModel->PegaDadosCandidato($this->pegaNumeroCandidato()) // Atribuir matriz multidimensional mais tarde
            );
            $data['Usuario']=$DadosUsuario;
            $data['Candidato']=$DadosCandidato;
            $data['CandidatoDB']=$this->PDCModel->PegaDadosCandidato($this->pegaNumeroCandidato());
            
            //Fim dos dados que serão passados para o View

            
            $this->load->helper('url');
            $this->load->view('/admin/'.$page, $data); 
        }   
        
        public function RetornaDireitos($atrib){
            
            //Constantes no topo. Linha 8
            // Usando o padra RWX do Linux
            
            //R - Read | W - Write | X - Execute
            //Verificando direitos de leitura    
            
             if (in_array($atrib, Dtos_Leitura )){
                $R=TRUE;
            } else {
                $R = FALSE;
            }
            
            if (in_array($atrib, Dtos_Escrita )){
                $W=TRUE;
            } else {
                $W = FALSE;
            }
            
            if (in_array($atrib, Dtos_Execucao )){
                $X=TRUE;
            } else {
                $X = FALSE;
            }     
            
            //Colocando os direitos num array
            $dtos = array(
                    'R' => $R,
                    'W' => $W,
                    'X' => $X
            );       

            return $dtos;

            /**
            echo '<BR>';
            var_dump($dtos);
            echo '<BR>';
            
            var_dump(Dtos_Leitura) ;
             * 
             */ 
            
        }


        public function adicionarEquipe(){
           
           $this->load->helper('array', 'form', 'url', 'date');  

           //var_dump($_POST);
           
           //Adicionando a imagem do membro no diretorio /placeholders/membros        
            $config = array(
                'upload_path' => "./images/placeholders/membros",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => TRUE,
                'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "768",
                'max_width' => "1024",
                'encrypt_name' => true
             ); 
             $this->load->library('upload', $config);
             $this->upload->do_upload('MemberPicInput');
             
            $data = array('upload_data' => $this->upload->data());    
            $extencaoNome = element('file_ext' , $data['upload_data']); //pegando extencao nome
            
            $fotoMembro  = element('file_name', $data['upload_data']); 
          
            //var_dump($data);
            //var_dump($fotoMembro);
           //fim aficionando imagem no diretorio /placeholders/membros
           
           //$dataTeste = $this->input->post('masked_nasc_membro');
           //Formata data para o MySQL       
           $dateM = strtr($this->input->post('masked_nasc_membro'), '/', '-'); // substituindo o '/' pelo '-' para compatibilidade
           
            //$nascimentoMembro = mdate( "%Y-%m-%d", strtotime($dateM)); //convertendo p/ Data p/o MySQL | por alguma razão o mdate não está rolando aqui
           
           $nascimentoMembro = date("Y-m-d", strtotime($dateM));
           
           //Converte dtos da equipe para armazenamento num byte no sql
           
           // Direitos para Gestão de Campanha
           $ValGestCamp_R = intval($this->input->post('gestaoCampanha_ler'));
           $ValGestCamp_W = intval($this->input->post('gestaoCampanha_escrever'));
           $ValGestCamp_X= intval($this->input->post('gestaoCampanha_executar'));  
           
           $AtribGestaoCampanha = $ValGestCamp_R + $ValGestCamp_W + $ValGestCamp_X;
           
           //Direitos para Gestão Financeira
           $ValGestFin_R = intval($this->input->post('gestaoFinanceira_ler'));
           $ValGestFin_W = intval($this->input->post('gestaoFinanceira_escrever'));
           $ValGestFin_X= intval($this->input->post('gestaoFinanceira_executar'));           
           
           $AtribGestaoFinanceira = $ValGestFin_R + $ValGestFin_W + $ValGestFin_X;
           
           //Direitos para Gestão de Gabinete
           
           $ValGestGab_R = intval($this->input->post('gestaoGabinente_ler'));
           $ValGestGab_W = intval($this->input->post('gestaoGabinete_escrever'));
           $ValGestGab_X= intval($this->input->post('gestaoGabinete_executar'));            
           
           $AtribGestaoGabinete = $ValGestGab_R + $ValGestGab_W  + $ValGestGab_X ;
   
           //var_dump($AtribGestaoCampanha);
           //var_dump($AtribGestaoFinanceira);
           //var_dump($AtribGestaoGabinete);
            
           // adiciona os dados enviados no form numa array
            $dataMembroEquipe = array (
               'Id_Candidato' => $this->pegaNumeroCandidato(),
               'CPF' => $this->input->post('add-membro-CPF'),
               'sexo' => $this->input->post('sexo_membro'),
               'DataNascimento' => $nascimentoMembro,
               'foto' =>  $fotoMembro,
               'Nome' => $this->input->post('add-membro-nome'),
               'email' =>  $this->input->post('add-membro-email'),
               'CEP' => $this->input->post('edit-membro-CEP'),
               'Endereco' => $this->input->post('edit-membro-address'),
               'Cidade' => $this->input->post('edit-membro-Cidade'),
               'UF'=> $this->input->post('edit-membro-UF'),
               'Telefone'=> $this->input->post('add-membro-phone'),
               'Celular'=> $this->input->post('add-membro-mobile'),
               'AcessoGestCamp' => $AtribGestaoCampanha,
               'AcessoGestFin' => $AtribGestaoFinanceira,
               'AcessoGestGab'=> $AtribGestaoGabinete,
                'Role' => $this->input->post('membro-role')
           );
            
           //Verifica se o membro está sendo atualizado
           $IdMembroAdicionado = $this->input->post('membro_id'); //pega o membro_id num hidden form field
                      
           //echo $this->PDCModel->verificaMembroCadastrado($this->input->post('add-membro-email'));
           
           if ($IdMembroAdicionado !=''){
               //atualizando membro
               $this->PDCModel->AtualizaEquipeCandidato($IdMembroAdicionado,$dataMembroEquipe);
               $this->PDCModel->ArmazenaGruposMembro($IdMembroAdicionado, $this->input->post('add-membro-group')); //Adicionando grupos membro em outra tabela
               $this->gerenciarEquipe();
           } else {          
               //Se o membro não estiver sendo adicionado, simplesmente adiciona               
               //Verifica se já tem um email igual cadastrado
               if ($IdMembroExistente = $this->PDCModel->verificaMembroCadastrado($this->input->post('add-membro-email'))){
                   echo "<script type='text/javascript'> alert('Email já cadastrado'); </script> ";
                   $this->gerenciarEquipe($IdMembroExistente); 
                   //exit();
               } else {
                    $MAdicionado =  $this->PDCModel->InsereEquipeCandidato($dataMembroEquipe);
                    $this->PDCModel->ArmazenaGruposMembro($MAdicionado, $this->input->post('add-membro-group'));
                    $this->gerenciarEquipe();
               }
               
           } 
           
           //Adicionando os grupos do Membro Inserido
           

                      


             
           //Verificando se o membro já existe no cadastro
            
           /**
           $EmailMembro = $this->input->post('add-membro-email');
           
           if ($this->PDCModel->getUserInfoByEmail($EmailMembro)){
               echo 'Existe no cadastro PDC';
           } else {
              echo 'NNAAOOO Existe no cadastro PDC';
           }
            * 
            */
           
           
           //echo $EmailMembro;
           
          /** 
          $DadosMembro = array (
              'EmailMembro' => $this->input->post('add-membro-email')  
               );
           * 
           */
           
           // - $this->PDCModel->getUserInfoByEmail($EmailMembro);
           
           //Verifica se o membro já está definido na equipe
           
           //Caso o membro não exista, insere como membro e envia um email para cadastro de senha
           
           
       }
       
        public function DeletaMembroEquipeCandidato($idMembro){
            //echo 'deletando ';
            //echo $idMembro; 
            $this->PDCModel->DeletaMembroEquipe($idMembro);
            $this->gerenciarEquipe();
        }


        public function mostra_ufs(){
            //$query = $this->db->query('SELECT * FROM estado');
            
            $query = $this->db->query('SELECT * FROM estado');
            $row = $query->row_array();
            foreach ($row as $uf) {
                
            //echo $row->idestado.' '.$row->nome.'<br>';
                echo $uf['nome'];
            }
            //return $row;
            //return $row;

            /**
            foreach ($query->result() as $row) {
                
                //echo $row->idestado.' '.$row->nome.'<br>';
                echo $row['nome'];
            }
             * 
             * @return string
             */
            
        }
        
        public function atualiza_cidades($idestado, $page='add_candidato'){
         if ( ! file_exists(APPPATH.'views/'.$page.'.php'))
            {
                // Whoops, we don't have a page for that!
                show_404(); 
            }
            $this->load->helper('url');
            $data['estado']=$this->PDCModel->lista_estados();
            $data['uf_selecionada']=  $this->PDCModel->estado_selecionado($idestado);
            $data['cidade']=$this->PDCModel->lista_cidades($idestado);
            $data['cidadeCandidato']=$this->PDCModel->lista_cidades(18);
            //$data['partidos']=$this->PDCModel->lista_partidos();
  
            $this->load->view('/'.$page, $data);
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
            
            $this->load->library('xmlrpc');
            $this->load->library('xmlrpcs');
            $this->load->helper('url');
            //$this->load->library('Google_weather_api');            
                    
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
    
            return '14';
        }

        public function FotoUsuario(){
         $InfoUsuario = $this->PDCModel->PegaDadosUser($this->session->userdata['email']);
         
         if ($InfoUsuario->foto_user){
            $caminho = 'images/placeholders/usuarios/';
            $fotoUsuario = $InfoUsuario->foto_user;
         } else {
                $SexoUsuario = $InfoUsuario->sexo;
                $caminho = 'images/placeholders/avatars/';
                if ($SexoUsuario=='M') {
                    $fotoUsuario='imagemAvatar_homem.png'; 
                } elseif ($SexoUsuario=='F') {
                    $fotoUsuario='imagemAvatar_mulher.png';    
                } else
                {
                   $fotoUsuario='unknown-avatar.png'; 
                }      
            }
         /**
         if (!isset($InfoUsuario->foto_user)){
             $caminho = 'images/placeholders/avatars/';
             if ($InfoUsuario->sexo=='M'){
                $fotoUsuario='imagemAvatar_homem.png';
             } elseif ($InfoUsuario->sexo=='F') {
                $fotoUsuario='imagemAvatar_mulher.png'; 
             } else {
                $fotoUsuario='unknown-avatar.png'; 
             }
         } else{
             $caminho = 'images/placeholders/usuarios/';
             $fotoUsuario = $InfoUsuario->foto_user;
         }
          * 
          */
         
         return $caminho.$fotoUsuario;  
        }
        
        
        public function RetornaImagemMembro($fotoMembro){
            if ($fotoMembro!=""){
                $caminho = "images/placeholders/membros/";
                return $caminho.$fotoMembro;            
            } else {
                $caminho = "images/placeholders/avatars/";
                $imagem="unknown-avatar.png";
                return $caminho.$imagem;
            }
        }
        
        public function RetornaImagemCandidato()
        {
            $idDoCandidato=$this->pegaNumeroCandidato();
            if ($FotoEnviadaCandidato = $this->PDCModel->RetornaFotoCandidato($idDoCandidato)){
                $imagemCandidato=$FotoEnviadaCandidato;          
            } else {
               $SexoCandidato = $this->PDCModel->RetornaSexoCandidato($idDoCandidato);
               if ($SexoCandidato=='M'){
                   $imagemCandidato="imagemAvatar_homem.png";
               } elseif ($SexoCandidato=='F') {
                   $imagemCandidato="imagemAvatar_mulher.png"; 
                 } else {
                    $imagemCandidato="imagemAvatar_desconhecido.png";  
                 }
            }
         
            //$imagemCandidato="imagemAvatar_homem.png";
            $caminho = 'images/placeholders/candidatos/';
 
            return $caminho.$imagemCandidato;    
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
    
        
        public function CarregaGruposMembro($idMembro) { //em uma string
           
            $gruposMembro = $this->PDCModel->CarregaGruposMembro($idMembro);
            
            foreach ($gruposMembro->result() as $grupo) {    
                $listaGrupo = $grupo->Grupo.' ,'.$listaGrupo;
            }    
            
            return $listaGrupo;      
        }


        public function CarregaPalavrasChave($idCandidato){ //em uma string
            
            $PalavrasChave = $this->PDCModel->CarregaPalavrasChave($idCandidato);   
        
            
            foreach ($PalavrasChave->result() as $PalavraChave) {
                //echo $PalavraChave->PalavraChave."<br>";
                $listaPalavrasChave= $PalavraChave->PalavraChave.' ,'.$listaPalavrasChave;
            }

            //echo "<BR>".'Numero de palavras: '.$PalavrasChave->num_rows();
            return $listaPalavrasChave;
        }
        
        public function ArmazenaPalavrasChave(){
            $string="Cidadania, bem-estar, acessibilidade";
            $palavras = explode(",", $string); //Convertendo para array com a ',' como delimitador
            $idCandidato='82';
            
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
            
            echo count($palavras);
        }


        public function DefineHeaderDash(){
            switch ($this->PDCModel->RetornaPartidoCandidato($this->pegaNumeroCandidato())){
                case "PSDB":
                    $imagemHeader='dashboard_header_psdb.jpg';
                    break;
                case "PSD":
                    $imagemHeader='dashboard_header_PSD.jpg';
                    break;
                case "PMDB":
                    $imagemHeader='dashboard_header_pmdb.jpg';
                    break;
                case "PDT":
                    $imagemHeader='dashboard_header_pdt.jpg';
                    break;
                case "PEN":
                    $imagemHeader='dashboard_header_pen.jpg';
                    break;
                case "REDE":
                    $imagemHeader='dashboard_header_rede.jpg';
                    break;
                case "PV":
                    $imagemHeader='dashboard_header_pv.jpg';
                    break;
                case "SD":
                    $imagemHeader='dashboard_header_sd.jpg';
                    break;
                default:
                     $imagemHeader='dashboard_header.jpg';   
            }
            
            $caminho='images/placeholders/headers/';
            
            return $caminho.$imagemHeader;
        }
        
        
        public function RetornaNomeResumidoCandidato($idCandidato){
            $NomeCompleto=  $this->PDCModel->RetornaNomeUrnaCandidato($idCandidato);
            $Nomes = explode(' ', $NomeCompleto);
            $PrimeiroNome = $Nomes[0];
            $LetraPrimeiroNome = $PrimeiroNome[0];
            $idUltimoNome = count($Nomes)-1;
            return $LetraPrimeiroNome.'.'.$Nomes[$idUltimoNome];
        }


        public function teste2(){
            
            echo 'listando equipe';
            
            $idDoCandidato=$this->pegaNumeroCandidato(); 
            $listaEquipe = $this->PDCModel->listaMembrosEquipeCandidato($idDoCandidato);
            
            
            //Criando um array com dados da equipe
            /**
            foreach ($listaEquipe->result() as $membroEquipe){
                $data=array(
                  'Candidato'  => $idCandidato,
                   'PalavraChave' => $palavra  
                );
                //$this->db->insert('PalavrasChave',$data);
            }
            
            echo count($palavras);
             * 
             */
            
            //var_dump($listaEquipe);
            
            /**
            $query = $this->db->query("SELECT * from Equipe WHERE Id_Candidato='$idCandidato'")->result_array();
            $array = array();
            
            foreach ( $query as $key => $val )
            {
                $temp = array_values($val);
                $array[] = $temp[0];
            }
            
            var_dump($temp);
             * 
             */
            
            foreach ($listaEquipe->result() as $membroEquipe){
                $dataMembrosEquipe[$membroEquipe->Id_MembroEquipe]=array(
                  'id' => $membroEquipe->Id_MembroEquipe,
                  'nome'  => $membroEquipe->Nome,
                  'foto' => $this->RetornaImagemMembro($membroEquipe->foto),
                  'email' =>  $membroEquipe->email,
                  'Acesso' =>  $membroEquipe->Role
                );
            }
            var_dump($dataMembrosEquipe);
            
            
            $DataEquipe = array ('foto','nome');
       
            foreach ($listaEquipe->result() as $Equipe ) { //object version. a versao array usa result_array()
                $DataEquipe['foto']= $this->RetornaImagemMembro($Equipe->foto);
                $DataEquipe['nome'] = $Equipe->Nome;
                //echo "<br>";
                //echo '--';
                echo $Equipe->Nome;
                //echo $row->idestado.' '.$row->nome.'<br>';
                //echo $uf['nome'];
            }
            
           echo "numero de membros ". $listaEquipe->num_rows();
           echo "<br>";
            
            var_dump($testeArray);
            echo $DataEquipe['FotoMembro'];
            
            
            
         
            
         /** carregando foto avatar 
         $InfoUsuario = $this->PDCModel->PegaDadosUser($this->session->userdata['email']);
         $fotoUsuario = $InfoUsuario->foto_user;
         if (!isset($fotoUsuario)){
             echo 'avatar';
         } else{
             echo 'foto usuario';
         }
         //var_dump($fotoUsuario);
          * 
          */
        
        /**
        if (!isset($this->session->userdata['logged_in'])){ //verifica finalização de cadastro
            echo "Não logado";
        } elseif (!$this->PDCModel->PegaIdCandidato_User($this->session->userdata['idUsuario'])) {
           echo 'NAO TEM CANDIDATO'; 
        } else {
           echo 'TEM CANDIDATO';  
        }
         * 
         */
       
        /**
        if (!$this->PDCModel->PegaIdCandidato_User($this->session->userdata['idUsuario'])) {
         
         exit;
        }
         * 
         */
        
       
 
        /** Formatando array de nomes    
        $this->load->helper('array');  
        
        $NomeCompleto = 'Francisco Garcez';
        
        $Nomes = explode(' ', $NomeCompleto);
        
        // echo count($Nomes);      
         
         $PrimeiroNome = $Nomes[0];
         $LetraPrimeiroNome = $PrimeiroNome[0];
         
         $idUltimoNome = count($Nomes)-1;
         
         //echo $idUltimoNome;
         
         
         echo $LetraPrimeiroNome.'.'.$Nomes[$idUltimoNome];
         
         //echo $Nomes[1];
         
         var_dump($Nomes);
         * 
         */
         
         
         
            
         //Adicionando o novo array de palavras chave


     
        
        /** Recuperando partidos
        echo $this->pegaNumeroCandidato();
        
        echo $this->PDCModel->RetornaPartidoCandidato($this->pegaNumeroCandidato());
        
       // echo $this->PDCModel->RetornaFotoCandidato($this->pegaNumeroCandidato());
         * 
         */
        
        
        /**
        $DadosCandidato = array(
                'nome' => 'F.Garcezz',
                'numero' => '45000',
                'dadosDB' => $this->PDCModel->PegaDadosCandidato($this->pegaNumeroCandidato())
         );
        
         var_dump($DadosCandidato);
        echo "<br>";
        echo "---";
        echo element('NomeCandidato', $DadosCandidato['dadosDB']);
        
        echo $DadosCandidato->dadosDB->NomeCandidato;
         * 
         */
        
        
                
        //$extencaoNome = element('file_ext' , $data['upload_data']); //pegando extencao nome

        
        /**
        $query = $this->db->query('SELECT PalavraChave from PalavrasChave WHERE Candidato=83');
        
        foreach ($query->result() as $row)
        {
                echo $row->id;
                echo $row->PalavraChave;
        }

        echo 'Total Results: ' . $query->num_rows(); 
         * 
         */
         
        /** Palavras chave    
        $PalavrasChave = $this->PDCModel->CarregaPalavrasChave();   
        
        foreach ($PalavrasChave->result() as $PalavraChave) {
            echo $PalavraChave->PalavraChave."<br>";
        }
        
        echo "<BR>".'Numero de palavras: '.$PalavrasChave->num_rows();
         * 
         */
         
         //$date1 = strtr($dataNascimento, '/', '-'); //ERA SO SUBSTITUIR CACETE
         //echo date('d-m-Y', strtotime($date1));
         
         
         
         //novo - testes data
            //$date = new DateTime(strtotime($this->input->post('masked_nasc_user')));
           // echo $date.'date'."<BR>";
            //$dataNascimentoUser = mdate("%Y-%d-%m", $date );
            //echo $dataNascimentoUser.'dataNascimentoUser'."<BR>";
        //fim novo - testes data
            
        //Pegando informações do usuário
         //$InfoUsuario = $this->PDCModel->PegaDadosUser($this->session->userdata['email']);
         //$fotoUsuario = $InfoUsuario->foto_user;
         
         //echo $idUsuario;
         
         //echo $fotoUsuario;
    
         //echo $idUsuario.'_'.date('dmY-h');
         //echo "<br>";
         //echo standard_date([$fmt = 'DATE_RFC822'[, $time = NULL]]);
         
         
         /**
         echo "teste 2";
         echo "<br>";
         //var_dump($this->session->userdata());
         
         echo $this->session->userdata('email');
         echo "<br>";
         echo $this->session->userdata('idUsuario');
        
         
         //pegando dados do candidato com a id do usuario
         
         $varteste = $this->pegaNumeroCandidato();
         echo $varteste;
         
         echo $this->PDCModel->PegaIdCandidato_User('32');
         
         if ($var_a=$this->pegaNumeroCandidato()){
             echo "Atualiza Candidato";
             echo $var_a;
         } Else { 
             echo "Insere Candidato";
             echo $var_a;
         }       
          * 
          */  
         
         
         
         
         //$InfoCandidato = $this->PDCModel->PegaDadosCandidato($this->session->userdata['idUsuario']);
         
         //var_dump($InfoCandidato);
         
         
         /**
         echo "<br>";
         $this->VarFotoCand='YYYY';
         echo $this->VarFotoCand;
         echo "<br>";
          * 
          */
         
         
         //Testando conversões de data
       }
       
       public function file_view(){
        $page='file_view';
        $this->load->helper('url');
        $this->load->view('/'.$page, array('error' => ' ' ));
       }      
       
       
       public function pegaNumeroCandidato() { //Atualizar para quando o usuário gerenciar mais de um candidato
           //var_dump($this->PDCModel->PegaIdCandidato_User($this->session->userdata['idUsuario']));
           return $this->PDCModel->PegaIdCandidato_User($this->session->userdata['idUsuario']);
           
       }
       
       public function enviaFotoCandidato(){
        $this->load->helper('array','date');
        $this->load->library('table'); 
        
        $config = array(
            'upload_path' => "./images/placeholders/candidatos",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024",
            'encrypt_name' => true
        );    
            
        $this->load->library('upload', $config);  
     
        $data = array('upload_data' => $this->upload->data());
        $extencaoNome = element('file_ext' , $data['upload_data']); //pegando extencao nome
               
        if(!$this->upload->do_upload('userfile')){
             $data = array('upload_data' => $this->upload->data());
             $extencaoNome = element('file_ext' , $data['upload_data']); //pegando extencao nome
             echo "<script type='text/javascript'> alert('Falha no envio da Foto'); </script> ";
             $uploadedDetails    = $this->upload->display_errors();
           }else{
               $data = array('upload_data' => $this->upload->data());
               $extencaoNome = element('file_ext' , $data['upload_data']); //pegando extencao nome
               echo "<script type='text/javascript'> alert('Foto Enviada'); </script> ";
               $uploadedDetails    = $this->upload->data();    
           }
          // print_r($uploadedDetails);die;      

        //echo element('file_name', $data['upload_data']); // WORKS **
           
        $this->VarFotoCand=element('file_name', $data['upload_data']); //Colocando o nome da foto do candidato numa variável global
        
        //colocando o nome da foto enviada na tabela do candidato
         $dataFoto = array (
            'foto' => element('file_name', $data['upload_data'])    
        );
            
        $this->PDCModel->atualizaFotoCandidatoDB($this->PegaNumeroCandidato(),$dataFoto);       
        
        //$this->PDCModel->atualizaFotoCandidato($this->pegaNumeroCandidato(),element('file_name', $data['upload_data']));
        //$this->PDCModel->atualizaFotoCandidato('83','foto.jpg');
                
        //return element('file_name', $data['upload_data']);
           
        $this->finalizaCadastro();
            
       }
       
       // cria uma função única para enviar fotos, idendificando o diretorio
       // Para membros e candidatos, que não estão no db ainda
       // armazena o nome do arquivo numa variavel global para iserir quando
       // não houver cadastro no db.
       
       public function enviaFoto(){
            $this->load->helper('array','date');
            $this->load->library('user_agent'); 
           
            //var_dump($_POST);
            
            echo $this->agent->referrer(); //Origem da chamada

            //echo $this->router->fetch_class(); // retorna class = controller
            //echo $this->router->fetch_method(); //retorna o método

            
            $quem = $this->input->post('quem'); //definido no formulario. Id de quem é a foto (Candidato, Usuário ou Membro)
            
            $idExistente = $this->input->post('idExistente'); //se a foto enviada for de um usuário existente, será passado num hiddem no POST
                        
            switch ($quem){
                case "Candidato":
                    $caminho='./images/placeholders/candidatos';
                    break;
                case "Usuario":
                    $caminho='./images/placeholders/usuarios';
                    break;
                case "Membro":
                    $caminho='./images/placeholders/membros';
                    break;
                default:
                    $caminho='./images/placeholders/outras';   
            }
            
            $config = array(
                'upload_path' => $caminho,
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => TRUE,
                'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "768",
                'max_width' => "1024",
                'encrypt_name' => true
            );   
            
            $this->load->library('upload', $config);  
            $data = array('upload_data' => $this->upload->data());
            $extencaoNome = element('file_ext' , $data['upload_data']); //pegando extencao nome
            
            
            if(!$this->upload->do_upload('userfile')){
             $data = array('upload_data' => $this->upload->data());
             $extencaoNome = element('file_ext' , $data['upload_data']); //pegando extencao nome
             echo "<script type='text/javascript'> alert('Falha no envio da Foto'); </script> ";
             $uploadedDetails    = $this->upload->display_errors();
           }else{
               $data = array('upload_data' => $this->upload->data());
               $extencaoNome = element('file_ext' , $data['upload_data']); //pegando extencao nome
               echo "<script type='text/javascript'> alert('Foto Enviada'); </script> ";
               $uploadedDetails    = $this->upload->data();    
           }
           
            //folocando a foto num array para envio ao banco de dados
            $dataFoto = array (
                'foto' => element('file_name', $data['upload_data'])    
            );
                       
           if ($quem=="Candidato"){   
               $this->PDCModel->atualizaFotoCandidatoDB($this->PegaNumeroCandidato(),$dataFoto);  
               $this->VarFotoCand=element('file_name', $data['upload_data']); //Colocando o nome da foto do candidato numa variável global 
               redirect($this->agent->referrer()); //depois de atualizado envia a página para origem de chamada
           } else if ($quem=="Membro") {
               $this->VarFotoMembro=element('file_name', $data['upload_data']); //Colocando o nome da foto do membro numa variável global 
               $this->PDCModel->atualizaFotoMembro($idExistente,$dataFoto);  
               $this->VarFotoMembro=element('file_name', $data['upload_data']); //Colocando o nome da foto do membro numa variável global 
               redirect($this->agent->referrer()); //depois de atualizado envia a página para origem de chamada
               //var_dump($this->VarFotoMembro);
               //var_dump($idExistente);
           }
 
       }
       

       /**
       public function do_upload(){
        
        $this->load->helper('array','date');
        $this->load->library('table');
   
        $InfoUsuario = $this->PDCModel->PegaDadosUser($this->session->userdata['email']);
        $idUsuario = $InfoUsuario->id;
        
        $config = array(
            'upload_path' => "./images/placeholders/usuarios",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
        );
        
        
        //Mudando o nome da foto enviada
        // Formato: = idUser_data.formatoArquivo

        $new_name = $idUsuario.'_'.date('dmY-h').$_FILES["userfiles"]['name'];
        
        $config['file_name'] = $new_name;
        
        
        //Fim mudando nome do arquivo de foto
        
        $this->load->library('upload', $config);
        
        if($this->upload->do_upload())
        {
            $data = array('upload_data' => $this->upload->data());
            
            $extencaoNome = element('file_ext' , $data['upload_data']); //pegando extencao nome
            
            $novaFotoUser = $new_name.$extencaoNome;

            $page='upload_sucess';
            
            if ($this->AtualizaFotoUserDB($idUsuario, $novaFotoUser)){
                echo "<script type='text/javascript'> alert('DB atualizado com sucesso'); </script> ";
            } else {
                echo "<script type='text/javascript'> alert('DB  nao atualizado'); </script> ";
            }
            //$this->load->helper('url');
            //$this->load->view('/'.$page, $data);
            $this->finalizaCadastro();
            

         /**   
            var_dump($data);
            echo "<br>";
            echo element('file_name', $data['upload_data']); //*Works
            
            echo "<br>";
            echo $new_name;
            //$data['upload_data']='xxx.jpg';
                        
            echo "<br>";
            
            echo element('file_name', $data['upload_data']);
            
            echo "<br>";
            
            echo element('file_ext' , $data['upload_data']);
            echo "<br>";
            echo $novaFotoUser;
            
            //$result = $data->result();       
            //print_r($data);
  
           // echo "<br>";
            
           // $replacement = array('file_name' => 'xxx.jpe');
            
           // $data2 = array_replace($data['upload_data'],$replacement);
            
           // echo "<br>";
          //  var_dump($data2);
          * 
          */
   /**
        }
        else
        {
            $error = array('error' => $this->upload->display_errors());
            $page='upload_sucess';
            $this->load->helper('url');
            $this->load->view('/'.$page, $error);
        }
       } **/
      
       
       public function AtualizaFotoUserDB($idUser, $nomeArquivo){
        
        //tualizando o nome no array para o mysql
            $dataUsuario = array(
                //'foto_user'=>  $this->input->post('nome_usuario')
                'foto_user'=>  $nomeArquivo
            );
            
            if ($this->PDCModel->AtualizaFotoUser($idUser, $dataUsuario)){      
                    //echo "<script type='text/javascript'> alert('atualizado com sucesso'); </script> ";  
                    return TRUE;
                } else {
                    //echo "<script type='text/javascript'> alert('Erro de Atualização'); </script> ";
                    return FALSE;
            }  
            
           
           
       }


       public function AtualizaFotoUser()
       {
            $this->load->helper(array('form', 'url', 'array'));
            $this->load->library('form_validation');
            
            //Pegando informações do usuário
            $InfoUsuario = $this->PDCModel->PegaDadosUser($this->session->userdata['email']);
            $idUsuario = $InfoUsuario->id;
            
            
            
            //Configurando atributos de envio de foto
            $config = array(
                'upload_path' => "./images/placeholders/usuarios",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => TRUE,
                'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "768",
                'max_width' => "1024"
            );


               // Mudando o nome da foto enviada
                //Formato: = idUser_data.formatoArquivo
 
            //$new_name = time().$_FILES["userfiles"]['name'];

            $new_name = $idUsuario.'_'.date('dmY-h').$_FILES["userfiles"]['name'];
            $config['file_name'] = $new_name;
            //Fim mudando nome do arquivo de foto
            
            //tualizando o nome no array para o mysql
            $dataUsuario = array(
                //'foto_user'=>  $this->input->post('nome_usuario')
                'foto_user'=>  $new_name
            );
            
            //Carregando biblioteca de envio com as conf. definidas
            $this->load->library('upload', $config);
    
            //Dados de Sucesso ou Erro
           if($this->upload->AtualizaFotoUser()){
                $data = array('upload_data' => $this->upload->data());
                echo "<script type='text/javascript'> alert('Foto atualizada'); </script> ";
                //echo "Atualizado com Sucesso";
                //var_dump($data);
           } else
            {
                $error = array('error' => $this->upload->display_errors());
                $page='upload_sucess';
                $this->load->helper('url');
                $this->load->view('/'.$page, $error);
            }
           
            //atualizando o nome no BD
           if ($this->PDCModel->AtualizaFotoUser($idUsuario, $dataUsuario)){
               echo 'atualizado com sucesso';
           } else {
               echo 'problema de atualização';
           }
            
            
       }
        
}