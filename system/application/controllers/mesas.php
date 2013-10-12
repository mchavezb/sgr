<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mesas extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
  	$this->load->database();
  	$this->load->model('mesas_mo');
  	$this->load->model('comanda_mo');
  	$this->load->helper('url');
 	}
 	
	public function index()
	{
		$data['inf_mesas'] = $this->mesas_mo->get_mesas();
		$data_jason = file_put_contents("C://xampp/htdocs/sgr/data/data_tables.json",json_encode($data));
		$this->load->view('mesas_vw',$data);
	}

	function juntar(){
		$j_mesas = $this->input->post();
		foreach ($j_mesas as $value) {
			$id_mesa = $value; //QUEDA EL ÚLTIMO VALOR
		}
		foreach ($j_mesas as $value) {
			if($value != $id_mesa){
				$nuevalista[] = $value;
			}
		}
		$id_mozo = '002' ; // MOMENTÁNEAMENTE
		$this->comanda_mo->add_new_comanda($id_mesa,$id_mozo);
		$data['datacomanda'] = $this->comanda_mo->get_comanda_by_table($id_mesa);
		foreach ($data['datacomanda'] as $key => $value) {
			$idCom = $value['idComanda'];
		}
		$this->mesas_mo->update_mesa_est1_ref($idCom,$id_mesa);
		foreach ($nuevalista as $v) {
			$this->mesas_mo->update_mesa_est3_ref($idCom,$v);
		}
		redirect('/comanda/m/'.$id_mesa);
	}
	function agregar(){
		$ag_mesas = $this->input->post();
		$id_mozo = '002' ; // MOMENTÁNEAMENTE
		$coman = $ag_mesas['comanda'];
		$idm = $ag_mesas['id_mesa_i'];
		foreach ($ag_mesas as $value) {
			if($value != $coman && $value != $idm){
				$l_ids[] = $value;
			}
		}
		foreach ($l_ids as $v) {
			$this->mesas_mo->update_mesa_est3_ref($coman,$v);
		}
		redirect('/comanda/m/'.$idm);
	}
	function desocupar(){
		$mesa_datos = $this->input->post();
		$idcom_f = $mesa_datos['comanda_d'];
		$mesa_des = $mesa_datos['mesa_d'];
		/* UPDATE ESTADO DE LA COMANDA A FINALIZADA = 1 **/
		$this->comanda_mo->finalizar_comanda($idcom_f);
		/* UPDATE ESTADO DE LAS MESAS A LIBRES = 0 Y SE QUITA REF EN DONDE EXISTA **/
		$this->mesas_mo->update_mesa_est0($mesa_des);
		$this->mesas_mo->update_mesa_est0_ref($idcom_f);
		redirect('/mesas');
	}
}