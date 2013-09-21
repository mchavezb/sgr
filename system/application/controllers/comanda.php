<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comanda extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
  	$this->load->database();
  	$this->load->model('comanda_mo');
  	$this->load->model('mesas_mo');
  	$this->load->model('usuarios_mo');
 	}

	public function m($id_mesa)
	{
		$data['info_comanda'] = $this->comanda_mo->get_comanda_by_table($id_mesa);
			if($data['info_comanda']!=FALSE){
				foreach ($data['info_comanda'] as $key=>$value) {
					$data['idComanda'] = $value['idComanda'];
					$data['fecha'] = date_create($value['fecha']);
					$id_mozo = $value['Usuario_idUsuario'];
				}
				$data['info_usuario'] = $this->usuarios_mo->get_usuario_by_idusuario($id_mozo);
					foreach($data['info_usuario'] as $key => $v){
						$data['nombres'] = $v['nombres'];
						$data['apellidos'] = $v['apellidos'];
					}
				$data['detalle_com'] = $this->comanda_mo->get_detalle_comanda($data['idComanda']);
			}
		$data['info_mesa'] = $this->mesas_mo->get_mesa_by_id($id_mesa);
			foreach ($data['info_mesa'] as $key => $val) {
				$data['numMesa'] = $val['mesa_num'];
				//$data['estMesa'] = $val['mesa_estado'];
				$data['clientes_mesa'] = $val['client_mesa'];
			}
		
		$this->load->view('comanda_vw',$data);
	}
}