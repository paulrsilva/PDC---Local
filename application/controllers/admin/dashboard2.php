<?php

class dashboard extends CI_Controller {
    
    
       public function index() {
           
            //$this->load->view('pages/login');
            //$this->load->view('admin/dashboard_view.php');
            //$this->load->view('index.php');
            //echo 'Conectado';
            //$candidato = 'candidato';
            //$data['title'] = ucfirst($candidato); // Colocar o nome do candidato aqui
            //$this->load->view('admin/dashboard', $data);
           
           //$this->load->helper('url');
           //$this->dash();
            
            if ($this->session->userdata('logged_in'))
                {
                    echo 'Logado'."<br>";
                    echo '---'."<br>";      
                    echo $this->session->userdata('email');
                    echo "<br>";
                    echo $this->session->userdata('nome').' '.$this->session->userdata('sobrenome');
                } 
                    else {
                    echo 'Não Logado';
                }
             
           
           // echo 'conectado como '. $this->session->userdata('email');
           // echo "<br>";
           //  echo '----';
           //  echo 'Logado: '. $this->session->userdata('logged_in');
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
    
}