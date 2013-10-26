<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adm_mesas extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
  		$this->load->model('admmesas_mo');

 	}
 	
	public function index()
	{
		$data=array(
			'mesas'=>$this->admmesas_mo->listar_mesa(),
			);
		$data['estado']="";
		$this->load->view('administracion/mesas',$data);
	}

	public function registrar()
	{

		$data = array();
		if($this->input->post()){
			$id_mesa=$this->input->post('id_mesa');
			$mesa_num=$this->input->post('mesa_num');
			$capacidad=$this->input->post('capacidad');
			$result = $this->admmesas_mo->registrar_mesa($id_mesa,$mesa_num,$capacidad);
			if($result==FALSE){
				$data['mensaje']='El número de mesa ya está registrado, intente nuevamente';
			}else{

				$data['mensaje']='La mesa se registró correctamente';
			}
			redirect('adm_mesas');
		}

		    
		    $this->load->view('administracion/registrarMesa',$data);


	}

	public function eliminarMesa()
	{

		$id=$this->uri->segment(3);
		$this->admmesas_mo->eliminarMesa($id);
		redirect('adm_mesas');
	}	


	public function modificarMesa($id)
	{
		$obtenerMesa=$this->admmesas_mo->modificar($id);
		if($obtenerMesa!=FALSE)
		{
			foreach ($obtenerMesa->result() as $row) {
				$mesa_num=$row->mesa_num;
				$capacidad=$row->capacidad;
				
			}
			$data=array('mesa_num'=>$mesa_num, 'capacidad'=>$capacidad);

		}else{
			$data='';
			return FALSE;
		}
		if($_POST)
		{
			$this->cambiarMesa($id);
		}
		$this->load->view('administracion/modificarMesa',$data);
	}	

	public function cambiarMesa($id)
	{
		
		$data=array(
				//'idMesa'=>$this->input->post('id_mesa', true),
				'mesa_num'=>$this->input->post('mesa_num', true),
				'capacidad'=>$this->input->post('capacidad',true),
				
			);
		$this->admmesas_mo->cambiarMesa($id,$data);
		
		redirect('adm_mesas');
	}


}