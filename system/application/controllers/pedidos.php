<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedidos extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
  	$this->load->model('pedidos_mo');
 	}

 	public function index()
	{
		//$data['inf_mesas'] = $this->mesas_mo->get_mesas();
		//$data_json = file_put_contents("C://xampp/htdocs/sgr/data/data_tables.json",json_encode($data));
		$this->load->view('pedidos_vw'/*,$data*/);
	}

	public function enviar(){
		$id_com = $this->input->post('comanda_id');
		$data['pedidos'] = $this->pedidos_mo->get_pedidos0_by_com($id_com);
		foreach ($data['pedidos'] as $key => $value) {
			$this->pedidos_mo->env_ped_cocina($value['idPedido']);
		}
		$datos['inf_ped1'] = $this->pedidos_mo->get_pedidos(1);
		$data_json = file_put_contents("C://xampp/htdocs/sgr/data/data_pedidos_1.json",json_encode($datos));
		redirect('/comanda/m/'.$this->input->post('mesaid'));
	}
	public function preparar(){
		$id_pedido = $this->input->post('idPedido');
		$this->pedidos_mo->preparar_pedido($id_pedido);
		$dato1['inf_ped1'] = $this->pedidos_mo->get_pedidos(1);
		$data_json = file_put_contents("C://xampp/htdocs/sgr/data/data_pedidos_1.json",json_encode($dato1));
		$dato2['inf_ped2'] = $this->pedidos_mo->get_pedidos(2);
		$data_json2 = file_put_contents("C://xampp/htdocs/sgr/data/data_pedidos_2.json",json_encode($dato2));
		redirect('/cocina');
		//print_r($this->input->post());

	}
	public function terminar(){
		$id_pedido = $this->input->post('idPedido');
		$this->pedidos_mo->terminar_pedido($id_pedido);
		$dato2['inf_ped2'] = $this->pedidos_mo->get_pedidos(2);
		$data_json2 = file_put_contents("C://xampp/htdocs/sgr/data/data_pedidos_2.json",json_encode($dato2));
		$dato3['inf_ped3'] = $this->pedidos_mo->get_pedidos(3);
		$data_json3 = file_put_contents("C://xampp/htdocs/sgr/data/data_pedidos_3.json",json_encode($dato3));
		redirect('/cocina');
	}
	public function servir(){
		//print_r($this->input->post());
		
		$id_pedido = $this->input->post('idPedido');
		$this->pedidos_mo->servir_pedido($id_pedido);
		$dato3['inf_ped3'] = $this->pedidos_mo->get_pedidos(3);
		$data_json3 = file_put_contents("C://xampp/htdocs/sgr/data/data_pedidos_3.json",json_encode($dato3));
		$dato4['inf_ped4'] = $this->pedidos_mo->get_pedidos(4);
		$data_json4 = file_put_contents("C://xampp/htdocs/sgr/data/data_pedidos_4.json",json_encode($dato4));
		redirect('/mesas');
	}

	public function anotar(){
		//print_r($this->input->post());
		$nota = $this->input->post('nota');
		$idped = $this->input->post('idpedido');
		$id_mesa = $this->input->post('id_mesa');
		$this->pedidos_mo->agregar_nota($nota,$idped);
		redirect('/comanda/m/'.$id_mesa);
	}

	public function eliminar(){ // FALTA QUE SOLAMENTE SE ELIMINEN LOS PEDIDOS QUE ESTAN EN ESTADO 0!!!!!
		print_r($this->input->post());
		$id_ped = $this->input->post('elim_pedido');
		$id_mesa = $this->input->post('id_mesa');
		$this->pedidos_mo->eliminar_pedido($id_ped);
		$dato1['inf_ped1'] = $this->pedidos_mo->get_pedidos(1);
		$data_json = file_put_contents("C://xampp/htdocs/sgr/data/data_pedidos_1.json",json_encode($dato1));
		redirect('/comanda/m/'.$id_mesa);
	}
}