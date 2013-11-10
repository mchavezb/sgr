<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes extends CI_Controller {

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
		$this->ventas();
	}

  public function ventas(){
    $data['ventas']  = $this->ventas_mo->get_ventas();
    $this->load->view('reportes_vw',$data);
  }

  public function ver_reporte(){
    $id = $this->input->post('idVenta');
    $data['detalle_venta']  = $this->ventas_mo->get_venta_by_idventa($id);
    $this->load->view('det_venta_vw',$data);
  }

  public function ver_ingresos(){
    $data['ingresos']  = $this->caja_mo->get_ingresos();
    $this->load->view('reportes_ing_vw',$data);
  }

  public function ver_egresos(){
    $data['egresos']  = $this->caja_mo->get_egresos();
    $this->load->view('reportes_egr_vw',$data);
  }

  public function flujo(){
    $data['flujo']  = $this->caja_mo->get_ing_egr();
    $this->load->view('reportes_flujo_vw',$data);
  }
}