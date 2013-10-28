<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exonerar extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
  	$this->load->database();
  	$this->load->model('exonerar_model');
  	$this->load->model('mesas_mo');
  	$this->load->helper('url');
  	$this->load->library('session');
 	}

 	public function exonerarPago()
 	{

 		$id=$this->uri->segment(5);
 		$this->session->set_userdata('id',$id);
 		$pedido=$this->exonerar_model->seleccionar_comandaxpedido($id);
		if($pedido!=FALSE)
		{
			foreach($pedido->result() as $row) {
				 	
				$estado=$row->estado;
				
			}
			if($estado==0)
			{
				$data['texto']="<p>Confirma cancelar pedido?</p>"
				$this->cancelarPedido();

				
			}else{
				if($estado==1 || $estado==2 || $estado==3)
				{
					$data['texto']="<p>Ingrese código de validación</p></br><input type='password' name='clave'>"
					$this->validar();
				}
			}
			
		}else{
			$data='';
			return FALSE;
		}
		$this->load->view('comanda_vw',$data);

 	}

 	public function cancelarPedido()
 	{
 		$id=$this->uri->segment(5);
 		//$id=$this->input->post('id');
		$this->exonerar_model->cancelar_comandaxpedido($id);
		redirect('mesas');
 	}

 	public function validar()
 	{
 		$id=$this->uri->segment(5);
 		$clave=$this->input->post('clave');
		if($clave==123456){
			$data=array(
				'estado'=>5,
				
			);
			$this->exonerar_model->exonerar_comandaxpedido($id,$data);

		}

		var_dump($id);
		die();
		redirect('mesas');
 	}
 }