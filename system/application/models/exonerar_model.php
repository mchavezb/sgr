<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Exonerar_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function seleccionar_comandaxpedido($id)
    {
        $this->db->where('idPedido',$id);
        $query = $this->db->get('comandaxpedido');
        if($query->num_rows() > 0)
        {
            return $query;

        }else{
            return FALSE;
        }
    }

    public function exonerar_comandaxpedido($id,$data)
    {
        $this->db->where('idPedido',$id);
        $this->db->update('comandaxpedido',$data);
        return true;
    }

    public function cancelar_comandaxpedido($id)
    {
        $this->db->where('idPedido',$id);
        $this->db->delete('comandaxpedido');
        return true;
    }


  }
