<?php
class Campanna_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }

    public function getTPF(){
    	$this->db->where('Activa',1);
        $query = $this->db->get('Campanna_Tipificacion');
        if($query->num_rows() > 0){
        	return $query->result_array();
        }
        return 0;
    }
    public function getRealCamp($CID){
        $this->db->where('ID_Campannas',$CID);
        $this->db->limit(1);
        $query = $this->db->get('View_campannas_info');
        if ($query->num_rows()>0) {
            return $query->result_array()[0]['MONTO_REAL'];
        }

    }
    public function getRealCliente($CID,$UID){
        $this->db->where('ID_Campannas',$CID);
        $this->db->where('ID_CLIENTE',$UID);
        $this->db->limit(1);
        $query = $this->db->get('View_Monto_Clientes');
        if ($query->num_rows()>0) {
            return $query->result_array()[0]['MONTO_REAL'];
        }

    }
    public function My_Campannas_Header($id){
        $this->db->limit(1);
        $this->db->where('ID_Campannas',$id);
        $Querry_Campanna = $this->db->get('View_campannas_info');
        if($Querry_Campanna->num_rows() > 0){
            return $Querry_Campanna->result_array();
        }
        return 0;

    }
    public function My_Campannas_Clientes($id){
        $array_Clientes_camp=array();
        $c=0;
        $this->db->where('ID_Campannas',$id);
        $Querry_Campanna = $this->db->get('View_campannas_Clientes');
         if($Querry_Campanna->num_rows() > 0){
            foreach ( $Querry_Campanna->result_array() as $Cmp){
                $array_Clientes_camp[$c]['ID_Campannas'] = $Cmp['ID_Campannas'];
                $array_Clientes_camp[$c]['ID_Cliente'] = $Cmp['ID_Cliente'];
                $array_Clientes_camp[$c]['Nombre'] = $Cmp['Nombre'];
                $array_Clientes_camp[$c]['Telefono1'] = $Cmp['Telefono1'];
                $array_Clientes_camp[$c]['Meta'] = $Cmp['Meta'];
                $array_Clientes_camp[$c]['Real'] = $this->getRealCliente($Cmp['ID_Campannas'],$Cmp['ID_Cliente']);
                $c++;
            }
            return $array_Clientes_camp;
        }
        return 0;

    }
    public function My_Campannas(){
        $i=0;
        $c=0;
        $MyCmp = array();
        $array_my_campanas=array();
        $this->db->where('ID_Usuario',$this->session->userdata('id'));
        $Querry_asigna_Campanna = $this->db->get('campanna_asignacion');
        if($Querry_asigna_Campanna->num_rows() > 0){
            foreach ( $Querry_asigna_Campanna->result_array() as $C){
                $MyCmp[$i] = $C['ID_Campannas'];
                $i++;
            }
        }

        $this->db->where('Activo',1);
        $this->db->where_in('ID_Campannas', $MyCmp);
        $Querry_my_campanna = $this->db->get('campanna');
        if($Querry_my_campanna->num_rows() > 0){
            foreach ( $Querry_my_campanna->result_array() as $Cmp){
                $array_my_campanas[$c]['ID_Campannas'] = $Cmp['ID_Campannas'];
                $array_my_campanas[$c]['Fecha_Inicio'] = $Cmp['Fecha_Inicio'];
                $array_my_campanas[$c]['Fecha_Cierre'] = $Cmp['Fecha_Cierre'];
                $array_my_campanas[$c]['Nombre'] = $Cmp['Nombre'];
                $array_my_campanas[$c]['Meta'] = $Cmp['Meta'];
                $array_my_campanas[$c]['Real'] = $this->getRealCamp($Cmp['ID_Campannas']);
                $array_my_campanas[$c]['Observaciones'] = $Cmp['Observaciones'];
                $c++;
            }
            return $array_my_campanas;
        }
        return 0;

    }
    public function guardar_llamada($Monto,$Duracion,$Comentario,$TPF)
    {
        $this->db->insert('campanna_registros',array(
            'ID_Usuario' => $this->session->userdata('id'),
            'ID_Campannas' => "CP-00000",
            'Monto' => $Monto,
            'Tiempo' => $Duracion,
            'Comentarios' => $Comentario,
            'ID_TPF' => $TPF
        ));
        echo ($this->db->affected_rows() > 0) ? 1 : 0;

    }
}