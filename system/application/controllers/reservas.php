<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservas extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
  		$this->load->model('reservas_mo');

 	}
 	
	public function index()
	{
		$data=array(
			'reservas'=>$this->reservas_mo->seleccionar_reserva(),
			);
		$this->load->view('ventas/reservas',$data);
	}

	public function registrar()
	{

		$data = array();
		if($this->input->post()){
			$id_usuario = "0001";
			$fecha=$this->input->post('fecha');
			$num_personas=$this->input->post('num_personas');
			$id_mesa=$this->input->post('id_mesa');
			$nom_cliente=$this->input->post('cliente');
			$result = $this->reservas_mo->insertar_reserva($fecha,$num_personas,$id_mesa,$id_usuario,$nom_cliente);
			if($result==false){
				$data['mensaje']='La mesa no está disponible';
			}
		}
		    
		    $this->load->view('ventas/registrarReserva',$data);


	}

	public function modificarReserva($id)
	{
		#$id=$this->uri->segment(3);
		#var_dump($id);
		$obtenerReserva=$this->reservas_mo->modificar($id);
		if($obtenerReserva!=FALSE)
		{
			foreach ($obtenerReserva->result() as $row) {
				$id_mesa=$row->Mesa_idMesa;
				$fecha=$row->fecha;
				$num_personas=$row->numero_personas;
				$nom_cliente=$row->nom_cliente;
			
			}
			$data=array('id'=>$id, 'id_mesa'=>$id_mesa, 'fecha'=>$fecha,'num_personas'=>$num_personas, 'nom_cliente'=>$nom_cliente);

		}else{
			$data='';
			return FALSE;
		}
		if($_POST)
		{
			$this->cambiarReserva($id);
		}
		$this->load->view('ventas/modificarReserva',$data);
	}	

	public function cambiarReserva($id)
	{
		#$id=$this->uri->segment(3);
		$data=array(
				'Mesa_idMesa'=>$this->input->post('id_mesa', true),
				'fecha'=>$this->input->post('fecha', true),
				'numero_personas'=>$this->input->post('num_personas',true),
				'nom_cliente'=>$this->input->post('cliente',true),
			);
		$this->reservas_mo->cambiarReserva($id,$data);
		
		redirect('reservas');
	}

	public function cancelarReserva()
	{

		$id=$this->uri->segment(3);
		$this->reservas_mo->cancelarReserva($id);
		redirect('reservas');
	}	






}