<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
  		$this->load->helper('form');
  		$this->load->library('form_validation'); 
 	}
 	
	public function index()
	{
		$this->Login();
	}

	public function Login()
	{
		$this->form_validation->set_rules('nombre', 'Usuario', 'required');
		$this->form_validation->set_rules('password', 'Contrasena', 'required');
		$this->form_validation->set_message('required', 'El campo %s esta vacío');

		if(!isset($_POST['nombre']))
		{
			if($this->session->userdata('usuario'))
			{
				$this->load->view('mesas_mw');
			}else
			{
				$this->load->view('index_login');	
			}
		}else
		{
			if($this->form_validation->run()==FALSE)
			{
				$this->load->view('index_login');
			}else
			{
				$user1=$this->input->post('nombre');
				$clave1=$this->input->post('pass');
				$this->load->model('login_model', 'uno');
				$extraer=$this->uno->datos($user1,$clave1);
				$conteo=$this->uno->conteo($user1,$clave1);

				foreach ($extraer as $c)
				{
					$user2=$c->usuario;
					$clave2=$c->pass;
				}

				if($conteo>0)
				{
					if($clave1 == $clave2){
						$arreglo=array('usuario'=>$user1,'online'=>TRUE);
						$this->session->set_userdata($arreglo);
						$this->load->view('mesas_mw');	
					}else{
						$this->load->view('index_login');
					}
				}else{
					$data['error']="El usuario no existe en la base de datos";
					$this->load->view('index_login',$data);
				}
			}
		}

		function Cerrar()
		{
			if($this->session->userdata('usuario')==TRUE)
			{
				$this->session->sess_destroy();
				$this->load->view('index_login');	
			}else{
				$this->load->view('index_login');
			}	
		}

	}
}
		