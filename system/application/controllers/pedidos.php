<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedidos extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
  	$this->load->model('pedidos_mo');
  	$this->load->model('comanda_mo');
  	$this->load->model('producto_mo');
  	$this->load->model('usuarios_mo');
  	$this->load->model('mesas_mo');
  	$this->load->model('ventas_mo');
  	$this->load->model('caja_mo');
 	}

 	public function index()
	{
		$data['lista_comandas'] = $this->comanda_mo->listar_comandas();
		$data['list_comxped'] = $this->comanda_mo->list_comxped_e6();
		//$data['inf_mesas'] = $this->mesas_mo->get_mesas();
		//$data_json = file_put_contents("C://xampp/htdocs/sgr/data/data_tables.json",json_encode($data));
		$this->load->view('pedidos_vw',$data);
	}

	public function p($id_mesa)
	{
		$data['categorias'] = $this->producto_mo->listar_cat();
		$data['idmesa'] = $id_mesa;
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
			else{
				// OBTENER ID DEL MOZO QUE HA INICIADO SESIÓN PARA INGRESARLO A LA COMANDA
				$idMozo = '0002';//MOMENTÁNEAMENTE
				$this->comanda_mo->add_new_comanda($id_mesa,$idMozo);
				$this->mesas_mo->update_mesa_est($id_mesa);
				
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
			}
		$data['info_mesa'] = $this->mesas_mo->get_mesa_by_id($id_mesa);
			foreach ($data['info_mesa'] as $key => $val) {
				$data['numMesa'] = $val['mesa_num'];
				//$data['estMesa'] = $val['mesa_estado'];
				$data['clientes_mesa'] = $val['client_mesa'];
			}
		
		$this->load->view('det_pedido_vwx2',$data);
	}

	public function enviar(){

		//print_r($this->input->post());
		
		$id_com = $this->input->post('comanda_id');
		$tipo_at = $this->input->post('tipoA');
		$data['pedidos'] = $this->pedidos_mo->get_pedidos0_by_com($id_com);
		foreach ($data['pedidos'] as $key => $value) {
			$this->pedidos_mo->env_ped_cocina($value['idPedido'],$tipo_at);
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
		//print_r($this->input->post());
		$id_ped = $this->input->post('elim_pedido');
		$id_mesa = $this->input->post('id_mesa');
		$this->pedidos_mo->eliminar_pedido($id_ped);
		$dato1['inf_ped1'] = $this->pedidos_mo->get_pedidos(1);
		$data_json = file_put_contents("C://xampp/htdocs/sgr/data/data_pedidos_1.json",json_encode($dato1));
		redirect('/comanda/m/'.$id_mesa);
	}

	public function cobrar(){
		if($this->input->post('comprobante')=='boleta'){
			$tipo_pago = 1;
		}elseif ($this->input->post('comprobante')=='factura') {
			$tipo_pago = 2;
		}
		$dniruc = $this->input->post('dniruc');
		$razonsocial = $this->input->post('razonsocial');
		$direccion = $this->input->post('direccion');
		$medio_pago = $this->input->post('medio_pago');
		$nomb_tarj = $this->input->post('nomb_tarj');
		$ef_soles = $this->input->post('ef_soles'); 
		$ef_dolares = $this->input->post('ef_dolares'); 
		$tarj_soles = $this->input->post('tarj_soles');
		$tarj_dolares = $this->input->post('tarj_dolares');
		$comanda_id = $this->input->post('comanda_id');
		$total = $this->input->post('total'); 
		$mesaid = $this->input->post('mesaid');
		$id_caja = $this->input->post('idcaja');
		if($this->input->post('medio_pago')=='tarjeta'){
			$ef_soles = 0.00; 
			$ef_dolares = 0.00;
		}
		elseif ($this->input->post('medio_pago')=='efectivo') {
			$nomb_tarj = 0;
			$tarj_soles = 0.00;
			$tarj_dolares = 0.00;
		}
		//obtener id de operacion a partir del id de la caja
		$operacion = $this->caja_mo->get_op_caja($id_caja);
			foreach ($operacion->result() as $row) {
				$id_apert=$row->id_operacion;
			}
		$this->ventas_mo->ingresar_venta($total, $comanda_id, $tipo_pago, $ef_soles, $tarj_soles, $ef_dolares, $tarj_dolares,$id_apert, $dniruc, $razonsocial, $direccion, $nomb_tarj);
		$this->comanda_mo->cobrar_comanda($comanda_id);
		//$this->mesas_mo->update_mesa_est0($mesaid);
		redirect('/pedidos');

	}
}