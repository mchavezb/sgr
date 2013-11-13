<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adm_caja extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
  		$this->load->model('admcajas_mo');

 	}
 	
	public function index()
	{
		$data=array(
			'cajas'=>$this->admcajas_mo->listar_caja(),
			);
		$data['estado']="";
		$this->load->view('administracion/cajas',$data);
	}

	public function registrar()
	{

		$data = array();
		if($this->input->post()){
			$caja_numero=$this->input->post('caja_numero');
			
			$result = $this->admcajas_mo->registrar_caja($caja_numero);
			if($result==FALSE){
				$data['mensaje']='El número de caja ya está registrado, intente nuevamente';
			}else{

				$data['mensaje']='La caja se registró correctamente';
			}
			redirect('adm_caja');
		}

		    
		    $this->load->view('administracion/registrarCaja',$data);


	}

	public function eliminarMesa()
	{

		$id=$this->uri->segment(3);
		$this->admcajas_mo->eliminarCaja($id);
		redirect('adm_caja');
	}	


	public function modificarCaja($id)
	{
		$obtenerCaja=$this->admcajas_mo->modificar($id);
		if($obtenerCaja!=FALSE)
		{
			foreach ($obtenerCaja->result() as $row) {
				$caja_numero=$row->caja_numero;
				
				
			}
			$data=array('caja_numero'=>$caja_numero);

		}else{
			$data='';
			return FALSE;
		}
		if($_POST)
		{
			$this->cambiarCaja($id);
		}
		$this->load->view('administracion/modificarCaja',$data);
	}	

	public function cambiarCaja($id)
	{
		
		$data=array(
				//'idMesa'=>$this->input->post('id_mesa', true),
				'caja_numero'=>$this->input->post('caja_numero', true),
				
				
			);
		$this->admcajas_mo->cambiarCaja($id,$data);
		
		redirect('adm_cajas');
	}


}