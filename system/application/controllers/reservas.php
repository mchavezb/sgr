<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservas extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
 	}
 	
	public function index()
	{
		echo 'Estás ejecutando el controlador reservas.php';
	}
}