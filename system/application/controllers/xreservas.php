<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservas extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
  		$this->load->model('reservas_mo');

 	}
 	
	public function index()
	{
		$this->load->view('ventas/reservas');
	}

	public function registrar()
	{
		$data = array();
		if($this->input->post()){
			$id_usuario = "LRAMIREZ";
			$fecha=$this->input->post('fecha');
			$num_personas=$this->input->post('num_personas');
			$id_mesa=$this->input->post('id_mesa');
			$cliente=$this->input->post('cliente');
			$result = $this->reservas_mo->insertar_reserva($fecha,$num_personas,$id_mesa,$id_usuario,$cliente);
			$data['mensaje'] = $result ? "SI REGISTRA" : "NO REGISTRA";
		}
		$this->load->view('ventas/registrarReserva',$data);

	}	


}