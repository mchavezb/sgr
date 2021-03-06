<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comanda extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
  	$this->load->database();
  	$this->load->model('comanda_mo');
  	$this->load->model('mesas_mo');
  	$this->load->model('usuarios_mo');
  	$this->load->model('producto_mo');
  	$this->load->helper('url');
 	}

	public function m($id_mesa)
	{
		$data['categorias'] = $this->producto_mo->listar_cat();
		$data['idmesa'] = $id_mesa;
		$data['info_comanda'] = $this->comanda_mo->get_comanda_by_table($id_mesa);
		$data['lista_mozos'] = $this->usuarios_mo->get_usuario_by_idperfil('03');
			if($data['info_comanda']!=FALSE){
				foreach ($data['info_comanda'] as $key=>$value) {
					$data['idComanda'] = $value['idComanda'];
					$data['fecha'] = date_create($value['fecha']);
					$id_mozo = $value['Usuario_idUsuario'];
				}
				$data['info_usuario'] = $this->usuarios_mo->get_usuario_by_idusuario($id_mozo);
					foreach($data['info_usuario'] as $key => $v){
						$data['idMozo_c'] = $v['idUsuario'];
						$data['nombres'] = $v['nombres'];
						$data['apellidos'] = $v['apellidos'];
					}
				$data['detalle_com'] = $this->comanda_mo->get_detalle_comanda($data['idComanda']);
			}
			else{
				// OBTENER ID DEL MOZO QUE HA INICIADO SESIÓN PARA INGRESARLO A LA COMANDA
				if($this->session->userdata('idPerfil')=='03'){
					$idMozo = $this->session->userdata('idUsuario');
				}else{
					$idMozo = '0001';
				}

				$this->comanda_mo->add_new_comanda($id_mesa,$idMozo);
				$this->mesas_mo->update_mesa_est($id_mesa);

				//aca deberia ir la grabada de mesas!!!
				
				$data['info_comanda'] = $this->comanda_mo->get_comanda_by_table($id_mesa);
					if($data['info_comanda']!=FALSE){
						foreach ($data['info_comanda'] as $key=>$value) {
							$data['idComanda'] = $value['idComanda'];
							$data['fecha'] = date_create($value['fecha']);
							$id_mozo = $value['Usuario_idUsuario'];
						}
						$data['info_usuario'] = $this->usuarios_mo->get_usuario_by_idusuario($id_mozo);
							foreach($data['info_usuario'] as $key => $v){
								$data['idMozo_c'] = $v['idUsuario'];
								$data['nombres'] = $v['nombres'];
								$data['apellidos'] = $v['apellidos'];
							}
						$data['detalle_com'] = $this->comanda_mo->get_detalle_comanda($data['idComanda']);
					}
			}
		$data['info_mesa'] = $this->mesas_mo->get_mesa_by_id($id_mesa);
			foreach ($data['info_mesa'] as $key => $val) {
				$data['numMesa'] = $val['mesa_num'];
				//$data['estMesa'] = $val['mesa_estado'];
				$data['capacidad_mesa'] = $val['capacidad'];
				$data['clientes_mesa'] = $val['client_mesa'];
			}
		
		$this->load->view('comanda_vw',$data);
	}

	public function add_prod($idcom,$id_mesa,$idProd)
	{
		$this->producto_mo->add_prod($idcom,$idProd);
		redirect('/comanda/m/'.$id_mesa);
	}

	public function busc()
	{
		$comandamesa = $this->input->post('comandamesa');
		$busc = $this->input->post('busc');
		$data['productos'] = $this->producto_mo->get_producto_like_name($busc);
		foreach ($data['productos'] as $key => $v) {
			echo "<div class='busqueda-platillo'><a href='".$this->config->item('base_url')."index.php/comanda/add_prod/".$comandamesa."/".$v->idProducto."'><img src='".$this->config->item('base_url')."f/img/add.png' width='22px' height='22px' href='www.google.com'></a> - ".$v->p_nombre."</div>";
		}
//		print_r($data['productos']);
	}

	public function cobrar()
	{
		 //print_r($this->input->post());
		$id_c = $this->input->post('comanda_d');
		$mesaid = $this->input->post('mesaid');
		//consultar estado de la comanda
		$res = $this->comanda_mo->get_comanda_by_id($id_c);
		//$est = $res[0]->estado;
		if($res[0]->estado==0){
			$this->comanda_mo->enviar_a_caja($id_c);
			$this->mesas_mo->update_mesa_est2($mesaid);
			redirect('/mesas');
		}else{
			redirect('/comanda/m/'.$mesaid);
		}
	}

	public function actualizar()
	{
		//print_r($this->input->post());
		$idmozo = $this->input->post('mozo');
		$cantclientes = $this->input->post('cant_clientes');
		$idcomanda = $this->input->post('identComanda');
		$idmesa = $this->input->post('identMesa');
		$this->comanda_mo->act_mozo_com($idmozo , $idcomanda);
		$this->mesas_mo->act_cant_clientes($cantclientes , $idmesa);
		redirect('/comanda/m/'.$idmesa);
	}
}