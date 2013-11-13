<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adm_platos extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
  		$this->load->model('admplatos_mo');

 	}
 	
	public function index()
	{
		$data=array(
			'productos'=>$this->admplatos_mo->listar_platos(),
			);
		$this->load->view('administracion/platos',$data);
	}

	public function registrar()
	{

		$data = array();
		if($this->input->post()){
			$id_producto=$this->input->post('id_producto');
			$p_nombre=$this->input->post('p_nombre');
			$p_tiempoestimado=$this->input->post('p_tiempoestimado');
			$p_precio=$this->input->post('p_precio');
			$TipoProducto_idTipoProducto=$this->input->post('TipoProducto_idTipoProducto');
			

			$result = $this->admplatos_mo->registrar_plato($id_producto,$p_nombre,$p_tiempoestimado,$p_precio,$TipoProducto_idTipoProducto);
			if($result==false){
				$data['mensaje']='El usuario no se registró correctamente';
			}
			redirect('adm_platos');
		}
		    
		    $this->load->view('administracion/registrarPlato',$data);


	}

	public function eliminarPlato()
	{

		$id=$this->uri->segment(3);
		$this->admplatos_mo->eliminarPlato($id);
		redirect('adm_platos');
	}	


	public function modificarPlato($id)
	{
		$obtenerPlato=$this->admplatos_mo->modificar($id);
		if($obtenerPlato!=FALSE)
		{
			foreach ($obtenerPlato->result() as $row) {
				$p_nombre=$row->p_nombre;
				$p_tiempoestimado=$row->p_tiempoestimado;
				$p_precio=$row->p_precio;
				$TipoProducto_idTipoProducto=$row->TipoProducto_idTipoProducto;
				
				
			}
			$data=array('p_nombre'=>$p_nombre, 'p_tiempoestimado'=>$p_tiempoestimado,'p_precio'=>$p_precio,'TipoProducto_idTipoProducto'=>$TipoProducto_idTipoProducto);

		}else{
			$data='';
			return FALSE;
		}
		if($_POST)
		{
			$this->cambiarPlato($id);
		}
		$this->load->view('administracion/modificarPlato',$data);
	}	

	public function cambiarPlato($id)
	{
		
		$data=array(
				//'idMesa'=>$this->input->post('id_mesa', true),
				'p_nombre'=>$this->input->post('p_nombre', true),
				'p_tiempoestimado'=>$this->input->post('p_tiempoestimado',true),
				'p_precio'=>$this->input->post('p_precio',true),
				'TipoProducto_idTipoProducto'=>$this->input->post('TipoProducto_idTipoProducto',true),
				
			);
		$this->admplatos_mo->cambiarPlato($id,$data);
		
		redirect('adm_platos');
	}


}