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
		$this->load->view('reportes_vw');
	}

}