<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comanda extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
  	$this->load->database();
  	$this->load->model('comanda_mo');
 	}

	public function m($id)
	{
		$data['id'] = $id;
		$data['info_comanda'] = $this->comanda_mo->get_comanda_by_table($id);
		$this->load->view('comanda_vw',$data);
	}
}