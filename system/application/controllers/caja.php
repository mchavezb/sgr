<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caja extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
  	$this->load->database();
  	$this->load->model('comanda_mo');
  	$this->load->model('ventas_mo');
  	$this->load->model('mesas_mo');
  	$this->load->model('usuarios_mo');
  	$this->load->model('producto_mo');
  	$this->load->model('caja_mo');
  	$this->load->helper('url');
 	}

	public function index()
	{
		$this->load->view('apert_caja');
	}

	public function apert()
	{
		$data['lista_cajeros'] = $this->usuarios_mo->get_usuario_by_idperfil('04');
		$data['lista_cajas'] = $this->caja_mo->get_lista_cajas();
		$this->load->view('apert_caja',$data);
	}

	public function cerrar()
	{
		$data['lista_cajeros'] = $this->usuarios_mo->get_usuario_by_idperfil('04');
		$data['lista_cajas'] = $this->caja_mo->get_lista_cajas();
		$this->load->view('cierre_caja',$data);
	}

	public function apert_caja(){
		$data = array();
		$data['lista_cajeros'] = $this->usuarios_mo->get_usuario_by_idperfil('04');
		$data['lista_cajas'] = $this->caja_mo->get_lista_cajas();
		if($this->input->post()){				
			$id_usuario=$this->input->post('id_usuario');
			$id_caja=$this->input->post('id_caja');

			if($this->caja_mo->check_caja($id_caja)){
				$data['mensaje']='<p class="form-error">La apertura de caja no se pudo realizar porque dicha caja ya se encuentra abierta.</p>';
			}
			elseif($this->usuarios_mo->check_user_caja($id_usuario)){
				$data['mensaje']='<p class="form-error">La apertura de caja no se pudo realizar porque el usuario ya tiene una caja abierta.</p>';
			}
			else{
				if($this->input->post('tipo_apertura')=='resumida'){
				$soles_inicio = $this->input->post('soles_inicio');
				$dolares_inicio=$this->input->post('dolares_inicio');
				$this->caja_mo->ing_apert($id_usuario, $id_caja, $soles_inicio, $dolares_inicio);
				$operacion = $this->caja_mo->get_op_caja($id_caja);
					foreach ($operacion->result() as $row) {
						$id=$row->id_operacion;
					}
				}
				elseif($this->input->post('tipo_apertura')=='detallada'){
					$m010 = ($this->input->post('mon_010i')!='')?$this->input->post('mon_010i'):0;
					$m020 = ($this->input->post('mon_020i')!='')?$this->input->post('mon_020i'):0;
					$m050 = ($this->input->post('mon_050i')!='')?$this->input->post('mon_050i'):0;
					$m1 = ($this->input->post('mon_1i')!='')?$this->input->post('mon_1i'):0;
					$m2 = ($this->input->post('mon_2i')!='')?$this->input->post('mon_2i'):0;
					$m5 = ($this->input->post('mon_5i')!='')?$this->input->post('mon_5i'):0;
					$b10 = ($this->input->post('bill_10i')!='')?$this->input->post('bill_10i'):0;
					$b20 = ($this->input->post('bill_20i')!='')?$this->input->post('bill_20i'):0;
					$b50 = ($this->input->post('bill_50i')!='')?$this->input->post('bill_50i'):0;
					$b100 = ($this->input->post('bill_100i')!='')?$this->input->post('bill_100i'):0;
					$b200 = ($this->input->post('bill_200i')!='')?$this->input->post('bill_200i'):0;
					$b10d = ($this->input->post('bill_10di')!='')?$this->input->post('bill_10di'):0;
					$b20d = ($this->input->post('bill_20di')!='')?$this->input->post('bill_20di'):0;
					$b50d = ($this->input->post('bill_50di')!='')?$this->input->post('bill_50di'):0;
					$b100d = ($this->input->post('bill_100di')!='')?$this->input->post('bill_100di'):0;
					$soles_inicio = $m010*0.1+$m020*0.2+$m050*0.5+$m1+$m2*2+$m5*5+$b10*10+$b20*20+$b50*50+$b100*100+$b200*200;
					$dolares_inicio = $b10d*10+$b20d*20+$b50d*50+$b100d*100;
					$this->caja_mo->ing_apert($id_usuario, $id_caja, $soles_inicio, $dolares_inicio);
					$operacion = $this->caja_mo->get_op_caja($id_caja);
						foreach ($operacion->result() as $row) {
							$id=$row->id_operacion;
						}
					$this->caja_mo->ing_apert_det($id, $m010, $m020, $m050, $m1, $m2, $m5, $b10, $b20, $b50, $b100, $b200, $b10d, $b20d, $b50d, $b100d);
				}
				$data['mensaje']='<p class="form-valid">La apertura de caja se realizó correctamente.</p>';
				$this->usuarios_mo->log_usuario($this->session->userdata('idUsuario'),$idlog='003');
				$this->session->set_userdata('caja_ok', 1);
				$this->caja_mo->activar_caja($id_caja);
			}
			$this->load->view('apert_caja',$data);
		}

	}
	
	public function cerrar_caja(){
		$data = array();
		$data['lista_cajeros'] = $this->usuarios_mo->get_usuario_by_idperfil('04');
		$data['lista_cajas'] = $this->caja_mo->get_lista_cajas();
		if($this->input->post()){
			$id_usuario=$this->input->post('id_usuario');
			$id_caja=$this->input->post('id_caja');
			$tarj_soles_final = $this->input->post('tarj_soles_final');
			$tarj_dolares_final = $this->input->post('tarj_dolares_final');
			if($this->input->post('tipo_cierre')=='resumida'){
				$soles_final = $this->input->post('soles_final');
				$dolares_final=$this->input->post('dolares_final');
				$operacion = $this->caja_mo->get_op_caja($id_caja);
					foreach ($operacion->result() as $row) {
						$id=$row->id_operacion;
					}
				$this->caja_mo->ing_cierre($id, $id_usuario, $id_caja, $soles_final, $dolares_final, $tarj_soles_final, $tarj_dolares_final);
				$this->caja_mo->fin_apert($id);
			}
			if($this->input->post('tipo_cierre')=='detallada'){
				$m010f = ($this->input->post('mon_010f')!='')?$this->input->post('mon_010f'):0;
				$m020f = ($this->input->post('mon_020f')!='')?$this->input->post('mon_020f'):0;
				$m050f = ($this->input->post('mon_050f')!='')?$this->input->post('mon_050f'):0;
				$m1f = ($this->input->post('mon_1f')!='')?$this->input->post('mon_1f'):0;
				$m2f = ($this->input->post('mon_2f')!='')?$this->input->post('mon_2f'):0;
				$m5f = ($this->input->post('mon_5f')!='')?$this->input->post('mon_5f'):0;
				$b10f = ($this->input->post('bill_10f')!='')?$this->input->post('bill_10f'):0;
				$b20f = ($this->input->post('bill_20f')!='')?$this->input->post('bill_20f'):0;
				$b50f = ($this->input->post('bill_50f')!='')?$this->input->post('bill_50f'):0;
				$b100f = ($this->input->post('bill_100f')!='')?$this->input->post('bill_100f'):0;
				$b200f = ($this->input->post('bill_200f')!='')?$this->input->post('bill_200f'):0;
				$b10df = ($this->input->post('bill_10df')!='')?$this->input->post('bill_10df'):0;
				$b20df = ($this->input->post('bill_20df')!='')?$this->input->post('bill_20df'):0;
				$b50df = ($this->input->post('bill_50df')!='')?$this->input->post('bill_50df'):0;
				$b100df = ($this->input->post('bill_100df')!='')?$this->input->post('bill_100df'):0;
				$soles_final = $m010f*0.1+$m020f*0.2+$m050f*0.5+$m1f+$m2f*2+$m5f*5+$b10f*10+$b20f*20+$b50f*50+$b100f*100+$b200f*200;
				$dolares_final = $b10df*10+$b20df*20+$b50df*50+$b100df*100;
				$operacion = $this->caja_mo->get_op_caja($id_caja);
					foreach ($operacion->result() as $row) {
						$id=$row->id_operacion;
					}
				$this->caja_mo->ing_cierre($id, $id_usuario, $id_caja, $soles_final, $dolares_final, $tarj_soles_final, $tarj_dolares_final);
				$datos = $this->caja_mo->get_cierre_by_idapert($id);
					foreach ($datos->result() as $row) {
						$id_cierre=$row->id_operacion;
					}
				$this->caja_mo->ing_cierre_det($id_cierre, $m010f, $m020f, $m050f, $m1f, $m2f, $m5f, $b10f, $b20f, $b50f, $b100f, $b200f, $b10df, $b20df, $b50df, $b100df);
				$this->caja_mo->fin_apert($id);
			}
			$datos2 = $this->caja_mo->get_cierre_by_idapert($id);
					foreach ($datos2->result() as $row) {
						$tar_soles=$row->tarj_soles;
						$tar_dol=$row->tarj_dolares;
						$horafecha = $row->hora ;
						$usuariocaja = $row->Usuario_idUsuario;
					}
			$datos3 = $this->caja_mo->get_apert_by_idapert($id);
				foreach($datos3 as $key => $v){
						$data['sol_apert'] = $v['soles'];
						$data['dol_apert'] = $v['dolares'];
					}
			$data['tar_soles'] = $tar_soles;
			$data['tar_dol'] = $tar_dol;
			$data['horafecha'] = $horafecha;
			$data['usuariocaja'] = $usuariocaja;
			$data['soles_final'] = $soles_final ;
			$data['idcaja'] = $id_caja;
			$data['dolares_final'] = $dolares_final ;
			$data['mensaje']='El cierre de caja se realizó correctamente';
			$data['info_ventas'] = $this->ventas_mo->get_ventas_by_idapert($id);
			$this->caja_mo->desactivar_caja($id_caja);
			$this->load->view('arqueo_caja',$data);
		}

		
	}
	function cotizar(){
		$v_compra = $this->input->post('v_compra');
		$v_venta = $this->input->post('v_venta');
		$this->caja_mo->ingresar_cambio($v_compra,$v_venta);
		$data['cotizacion'] = $this->caja_mo->get_cotiz();
		$this->usuarios_mo->log_usuario($this->session->userdata('idUsuario'),$idlog='005');
		$this->load->view('welcome_vw',$data);
	}

	function operaciones()
	{
		$this->load->view('operaciones_vw');
	}
	function ingresos()
	{
		$ing_efe_sol = $this->input->post('ing_efe_sol');
		$ing_efe_dol = $this->input->post('ing_efe_dol');
		$ing_tar_sol = $this->input->post('ing_tar_sol');
		$ing_tar_dol = $this->input->post('ing_tar_dol');
		$comentario = $this->input->post('comentario');
		$id_usuario_ = $this->session->userdata('idUsuario');
		$this->caja_mo->ingresos($ing_efe_sol, $ing_efe_dol, $ing_tar_sol, $ing_tar_dol, $comentario, $id_usuario_);
		$this->load->view('operaciones_vw');
		//print_r($this->input->post());
	}
	function egresos()
	{
		$egr_efe_sol = $this->input->post('egr_efe_sol');
		$egr_efe_dol = $this->input->post('egr_efe_dol');
		$egr_tar_sol = $this->input->post('egr_tar_sol');
		$egr_tar_dol = $this->input->post('egr_tar_dol');
		$comentario = $this->input->post('comentario');
		$id_usuario_ = $this->session->userdata('idUsuario');
		$this->caja_mo->egresos($egr_efe_sol, $egr_efe_dol, $egr_tar_sol, $egr_tar_dol, $comentario, $id_usuario_);
		$this->load->view('operaciones_vw');
		//print_r($this->input->post());
	}

	function cortesia(){
		$idcomanda = $this->input->post('id_com_');
		$this->comanda_mo->exonerar_pago($idcomanda);
		redirect('/pedidos');
		//print_r($this->input->post());
	}

	function descuento(){
		print_r($this->input->post());
	}
}