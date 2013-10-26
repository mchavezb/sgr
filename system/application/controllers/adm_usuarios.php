<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adm_usuarios extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
  		$this->load->model('admusuarios_mo');

 	}
 	
	public function index()
	{
		$data=array(
			'usuarios'=>$this->admusuarios_mo->listar_usuario(),
			);
		$this->load->view('administracion/usuarios',$data);
	}

	public function registrar()
	{

		$data = array();
		if($this->input->post()){
			$id_usuario=$this->input->post('id_usuario');
			$usuario=$this->input->post('usuario');
			$password=$this->input->post('password');
			$nombres=$this->input->post('nombres');
			$apellidos=$this->input->post('apellidos');
			$perfil=$this->input->post('Perfil_idPerfil');

			$result = $this->admusuarios_mo->registrar_usuario($id_usuario,$usuario,$password,$nombres,$apellidos,$perfil);
			if($result==false){
				$data['mensaje']='El usuario no se registró correctamente';
			}
			redirect('adm_usuarios');
		}
		    
		    $this->load->view('administracion/registrarUsuario',$data);


	}

	public function eliminarUsuario()
	{

		$id=$this->uri->segment(3);
		$this->admusuarios_mo->eliminarUsuario($id);
		redirect('adm_usuarios');
	}	


	public function modificarUsuario($id)
	{
		$obtenerUsuario=$this->admusuarios_mo->modificar($id);
		if($obtenerUsuario!=FALSE)
		{
			foreach ($obtenerUsuario->result() as $row) {
				$usuario=$row->usuario;
				$password=$row->password;
				$nombres=$row->nombres;
				$apellidos=$row->apellidos;
				$perfil=$row->Perfil_idPerfil;
				
			}
			$data=array('usuario'=>$usuario, 'password'=>$password,'nombres'=>$nombres,'apellidos'=>$apellidos,'Perfil_idPerfil'=>$perfil);

		}else{
			$data='';
			return FALSE;
		}
		if($_POST)
		{
			$this->cambiarUsuario($id);
		}
		$this->load->view('administracion/modificarUsuario',$data);
	}	

	public function cambiarUsuario($id)
	{
		
		$data=array(
				//'idMesa'=>$this->input->post('id_mesa', true),
				'usuario'=>$this->input->post('usuario', true),
				'password'=>$this->input->post('password',true),
				'nombres'=>$this->input->post('nombres',true),
				'apellidos'=>$this->input->post('apellidos',true),
				'Perfil_idPerfil'=>$this->input->post('Perfil_idPerfil',true),
				
			);
		$this->admusuarios_mo->cambiarUsuario($id,$data);
		
		redirect('adm_usuarios');
	}


}