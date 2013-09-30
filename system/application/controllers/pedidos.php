<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedidos extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
  	$this->load->model('pedidos_mo');
 	}

	public function enviar(){
		$id_com = $this->input->post('comanda_id');
		$data['pedidos'] = $this->pedidos_mo->get_pedidos0_by_com($id_com);
		foreach ($data['pedidos'] as $key => $value) {
			$this->pedidos_mo->env_ped_cocina($value['idPedido']);
		}
		$datos['inf_ped1'] = $this->pedidos_mo->get_pedidos1();
		$data_json = file_put_contents("C://xampp/htdocs/sgr/data/data_pedidos_1.json",json_encode($datos));
		redirect('/comanda/m/'.$this->input->post('mesaid'));
	}
	public function preparar(){
		

	}
	public function terminar(){

	}

}