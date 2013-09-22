<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delivery extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
  		$this->load->model('delivery_mo');
 	}
 	
	public function index()
	{
		$this->load->view('ventas/deliverys');
	}

	public function registrar()
	{
		$data = array();
		if($this->input->post()){
			$id_usuario = "LRAMIREZ";
			$fecha=$this->input->post('fecha');
			$cliente=$this->input->post('cliente');
			$direccion=$this->input->post('direccion');
			$distrito=$this->input->post('distrito');
			$telefono=$this->input->post('telefono');
			$result = $this->delivery_mo->insertar_delivery($fecha,$cliente,$direccion,$distrito,$telefono);
			$data['mensaje'] = $result ? "SI REGISTRA" : "NO REGISTRA";
		}
		$this->load->view('ventas/registrarDelivery',$data);

	}

	public function lista_delivery()
	{
		$data['query'] = $this->delivery_mo->listar_delivery(); 
        $this->load->view('ventas/deliverys',$data);

	}	
}