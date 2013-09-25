<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller
{
 
    public function __construct()
    {
    parent:: __construct();
    $this->load->model('login_model');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('session');
    }
   
    public function index()
    {
 	
        if(!isset($_POST['usuario']))
        {
        $this->load->view('index_login'); 
        }
        else
        {
        
       
        $this->form_validation->set_rules('usuario','Usuario','required|min_lenght[5]|max_lenght[20]');
        $this->form_validation->set_rules('password','Password','required');
       
            if($this->form_validation->run() == FALSE) 
            {
            $this->load->view('index_login');
            }
            else
            {
            $isValidLogin = $this->login_model->getLogin($_POST['usuario'],$_POST['password']); 
           
                if($isValidLogin)
                {
                
               
                    $sesion_data = array(
                                    'username' => $_POST['usuario'],
                                    'password' => $_POST['password']
                                        );
                    $this->session->set_userdata($sesion_data);
               
                $data['username'] = $this->session->userdata['username'];
                $data['password'] = $this->session->userdata['password'];
                   
                redirect('/mesas');
                }
                else
                {
                if($this->session->userdata['username'] == TRUE)
        		{
   					redirect('/mesas');
   				}else{
                
                	$this->load->view('login_error');
                }
            	}
       
       
        	}
   


    }
       
    }
   
   
   
 
    public function data()
    {
        if($this->session->userdata['username'] == TRUE)
        {
        echo $this->session->userdata['username'];
        echo "<br>";
        echo $this->session->userdata['password'];
        }
    }
   
   
    public function destroy()
    {
    
    $this->login_model->close();
 
        echo "Sesión cerrada"."<br>";

       redirect('/index/');
 
    }
   
   
    /*public function perfil()
    {
    //pagina restringida a usuarios registrados.
    $logged = $this->login_model->isLogged();
       
        if($logged == TRUE)
        {
        echo "Tienes permiso para ver el contenido privado";
        }
        else
        {
        //si no tiene permiso, abrimos el formulario para loguearse
        $this->load->view('index_login');
        }
    }*/
   
   
 
   
 
}