<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){

  	parent::__construct();
  	$this->load->database();
  	$this->load->model('usuarios_mo');
 	}


	public function index(){
		
		if($this->session->userdata('esta_logueado')){
			if($this->session->userdata('idPerfil')=='02'){
				//$this->load->view('cocina_vw');
				redirect("http://localhost/cocina/index.php");
			}
			else{
				//echo $this->session->userdata('idPerfil');
				$this->load->view('welcome_vw');
			}
		}else{
			$this->login();
		}
	}

	public function welcome(){
		if($this->session->userdata('esta_logueado')){
			$this->load->view('welcome_vw');
		}else{
			redirect('main/restricted');
		}
	}

	public function restricted(){
		$this->load->view('login_vw');
	}

	public function login(){
		$this->load->view('login_vw');
	}
	public function logout(){
		$idUsuario = $this->session->userdata('idUsuario');
		$this->usuarios_mo->desactivar_us($idUsuario);
		$this->session->sess_destroy();
		redirect('main/login');
	}

	public function validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Usuario','required|trim|callback_validar_login');
		$this->form_validation->set_rules('password','Contraseña','required|md5|trim');
		if($this->form_validation->run()){
			$datos['info_usuario'] = $this->usuarios_mo->get_usuario_by_username($this->input->post('username'));
					foreach($datos['info_usuario'] as $key => $v){
						$nombres = $v['nombres'];
						$apellidos = $v['apellidos'];
						$idUsuario = $v['idUsuario'];
						$idPerfil = $v['Perfil_idPerfil'];
					}
			$data = array ('usuario'=>$this->input->post('username'),'esta_logueado'=>1,'nombres'=>$nombres,'apellidos'=>$apellidos,'idUsuario'=>$idUsuario,'idPerfil'=>$idPerfil);
			$this->session->set_userdata($data);
			$this->usuarios_mo->activar_us($idUsuario);
				if($this->session->userdata('idPerfil')=='02'){
					//redirect('cocina');
					redirect("http://localhost/cocina/index.php");
				}else{
					redirect('main/welcome');	
				}
		}else{
			$this->load->view('login_vw');
		}

	}

	public function validar_login(){
		if($this->usuarios_mo->validar_usuario()){
			return true;
		}else{
			$this->form_validation->set_message('validar_login','Usuario y/o contraseña errados.');
			return false;
		}
	}
}