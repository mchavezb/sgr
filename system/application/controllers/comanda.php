<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comanda extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
 	}

	public function m($id)
	{
		$data['id'] = $id;
		$this->load->view('comanda_vw',$data);
	}
}