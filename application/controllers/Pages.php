<?php 

session_start(); //we need to start session in order to access it through CI



class Pages extends CI_Controller {
    
            
        // Show login page
       public function index() {
                //$this->load->view('pages/login');
                $this->load->view('admin/dashboard_view.php');
                //$this->load->view('index.php');
       }      
       
       
       // Validate and store registration data in database

  public function new_user_registration() {

        // Check validation for user input in SignUp form
            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
            $this->load->view('registration_form');
            } else {
            $data = array(
            'user_name' => $this->input->post('username'),
            'user_email' => $this->input->post('email_value'),
            'user_password' => $this->input->post('password')
            );
            $result = $this->login_database->registration_insert($data);
            if ($result == TRUE) {
            $data['message_display'] = 'Registration Successfully !';
            $this->load->view('login_form', $data);
            } else {
            $data['message_display'] = 'Username already exist!';
            $this->load->view('registration_form', $data);
            }
            }
        }     
       
            
	public function view($page='home')
	{
		
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        // $this->load->view('templates/header', $data);
        
        $this->load->view('pages/'.$page, $data);
        
        
        // $this->load->view('templates/footer', $data);
		
	}
        
        
        public function test()
        {
            echo 1;
        }
        
	public function login($page='login')
	{
		
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        // $this->load->view('templates/header', $data);
        
        $this->load->view('pages/'.$page, $data);
        
        //$this->load->helper('url');
        //redirect('home.php');
        
        // $this->load->view('templates/footer', $data);
		
	}
        
}