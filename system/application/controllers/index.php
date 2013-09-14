<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
	$this->load->helper('form_validation');
	$this->load->model('m_usuarios');
 	}
 	
	public function index()
	{
		$this->load->view('index');
		
		if(!isset($_POST['usuario'])){     
			$this->load->view('index');     
		}
		else{                        
			$this->form_validation->set_rules('usuario','required|valid_email');      
			$this->form_validation->set_rules('password','password','required');
			if(($this->form_validation->run()==FALSE)){           
				$this->load->view('index');                    
			}
			else{                                      
				$this->load->model('usuarios_model');
				$ExisteUsuarioyPassoword=$this->usuarios_model->ValidarUsuario($_POST['usuario'],$_POST['password']);   
				if($ExisteUsuarioyPassoword){   
					$this->load->view('mesas/index');   
				}
				else{   
					$data['error']="Usuario o password incorrecto, por favor vuelva a intentar";
					$this->load->view('login',$data);  
				}
			}
		}
	}
}