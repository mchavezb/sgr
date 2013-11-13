<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservas extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
  		$this->load->model('reservas_mo');
  		$this->load->helper('form');
  		$this->load->library('form_validation');

 	}
 	
	public function index()
	{
		$data=array(
			'reservas'=>$this->reservas_mo->seleccionar_reserva(),
			);
		
		$this->load->view('ventas/reservas',$data);
	}

	public function registrar()
	{

		$data = array();
		if($this->input->post()){
			$id_usuario = "0001";
			$fech=$this->input->post('fecha');
			$hora=$this->input->post('hora');
			$num_personas=$this->input->post('num_personas');
			$id_mesa=$this->input->post('id_mesa');
			$nombre_cliente=$this->input->post('cliente');

			$this->form_validation->set_rules('fecha', 'Fecha', 'required|min_length[3]');
    		$this->form_validation->set_rules('hora', 'Hora', 'required');
    		$this->form_validation->set_rules('num_personas', 'Numero de Personas','required|max_length[2]');
    		$this->form_validation->set_rules('id_mesa','Número de mesa','required|numeric');
    		$this->form_validation->set_rules('cliente','Cliente','required|callback_caracteres');

    		$this->form_validation->set_error_delimiters('<p >', '</p>');

    		if($this->form_validation->run()==TRUE){

    			$fecha=$fech.' '.$hora;
				var_dump($fecha, $hora);
				$query=$this->reservas_mo->validar_mesa($id_mesa);



				foreach ($query->result() as $row) {
					var_dump($row->mesa_estado);
					if($row->mesa_estado==0){
					$this->reservas_mo->insertar_reserva($fecha,$num_personas,$id_mesa,$id_usuario,$nombre_cliente);

					$data['mensaje']='La mesa se reservó correctamente';

				}else{
					$data['mensaje']='La mesa ya está reservada. Seleccione otra mesa.';
				}

    			}

		}
		}
		    $this->load->view('ventas/registrarReserva',$data);

		
	}

	public function modificarReserva($id)
	{
		#$id=$this->uri->segment(3);
		#var_dump($id);
		$obtenerReserva=$this->reservas_mo->modificar($id);
		if($obtenerReserva!=FALSE)
		{
			foreach ($obtenerReserva->result() as $row) {
				$id_mesa=$row->Mesa_idMesa;
				$fecha=$row->fecha;
				$num_personas=$row->numero_personas;
				$nombre_cliente=$row->nombre_cliente;
			
			}
			$data=array('id'=>$id, 'id_mesa'=>$id_mesa, 'fecha'=>$fecha,'num_personas'=>$num_personas, 'nombre_cliente'=>$nombre_cliente);

		}else{
			$data='';
			return FALSE;
		}
		if($_POST)
		{
			$this->cambiarReserva($id);
		}
		$this->load->view('ventas/modificarReserva',$data);
	}	

	public function cambiarReserva($id)
	{
		#$id=$this->uri->segment(3);
		$data=array(
				'Mesa_idMesa'=>$this->input->post('id_mesa', true),
				'fecha'=>$this->input->post('fecha', true),
				'numero_personas'=>$this->input->post('num_personas',true),
				'nombre_cliente'=>$this->input->post('cliente',true),
			);
		$this->reservas_mo->cambiarReserva($id,$data);
		
		redirect('reservas');
	}

	public function cancelarReserva()
	{

		$id=$this->uri->segment(3);
		$this->reservas_mo->cancelarReserva($id);
		redirect('reservas');
	}

	function caracteres($str)
    {
        if (preg_match("/^[a-zA-Z]/i", $str))
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('caracteres', 'El %s debe contener solo letras.');
            return FALSE;
        }
    }	






}