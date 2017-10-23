<?php
class Reportes_model extends CI_Model {
    
    public function __construct(){
        parent::__construct();

    }

    public function listarOpciones($tipoRpt) {
        $temp = array();
        if ($tipoRpt=='rptcampania') {
            $this->db->select('ID_Campannas');
            $this->db->select('Nombre');
            $this->db->where('Estado', 1);
            $query_campanias = $this->db->get('campanna');

            foreach ($query_campanias->result_array() as $key) {
                $data = array(
                    'value' => $key['ID_Campannas'],
                    'desc' => $key['ID_Campannas'].' - '.$key['Nombre']
                );
                $temp[] = $data;
            }
            return $temp;
        }elseif ($tipoRpt=='rptagentes') {
            $this->db->select('IdUser');
            $this->db->select('Usuario');
            $this->db->select('Nombre');
            $this->db->where('Rol', 1);
            $query_agentes = $this->db->get('usuario');

            foreach ($query_agentes->result_array() as $key) {
                $data = array(
                    'value' => $key['IdUser'],
                    'desc' => $key['Usuario'].' - '.$key['Nombre']
                );
                $temp[] = $data;
            }
            return $temp;
        }elseif ($tipoRpt=='rptclientes') {
            $this->db->select('ID_Cliente');
            $this->db->select('Nombre');
            $query_clientes = $this->db->get('clientes');

            foreach ($query_clientes->result_array() as $key) {
                $data = array(
                    'value' => $key['ID_Cliente'],
                    'desc' => $key['ID_Cliente'].' - '.$key['Nombre']
                );
                $temp[] = $data;
            }
            return $temp;
        }else {
            return false;
        }
    }

    public function generandoReporte($data) {
        $array_final=array(); 
        $index=explode(",", $data[0]);
        $identificador=$index[0];
        $tipoRpt=$index[1];
        $d1=$index[2];
        $d2=$index[3];

        if ($tipoRpt==1) { 
            $array_campania_info=$this->db->query("CALL sp_infoCampania('".$index[0]."')");

            $array_campania_info->next_result();

            if ($array_campania_info->num_rows()>0) {

                $this->db->where('ID_Campannas', $identificador);
                $array_info_cliente = $this->db->get('view_clientescampaniadetalle');
                               
                $array_final[] = array(
                    'array_1' => $array_campania_info->result_array(),
                    'array_2' => $array_info_cliente->result_array()
                );
                echo json_encode($array_final);                
            }

        }elseif ($tipoRpt==2) {
            $array_agente_info=$this->db->query("CALL sp_infoUsuario('".$identificador."', '".$d1."', '".$d2."')");

            $array_agente_info->next_result();

            if ($array_agente_info->num_rows()>0) {

                $dtConexion=$this->db->query("SELECT * FROM usuario_registros WHERE ID_Usuario='".$identificador."' AND FechaInicio >= '".$d1."' AND FechaFinal <= '".$d2."'");
    
                $array_final[] = array(
                    'array_1' => $array_agente_info->result_array(),
                    'array_2' => $dtConexion->result_array()
                );
         
                echo json_encode($array_final);
            }            
        }else if ($tipoRpt==3) {
            $array_cliente_info=$this->db->query("CALL sp_infoCliente('".$identificador."')");

            $array_cliente_info->next_result();

            if ($array_cliente_info->num_rows()>0) {
                 echo json_encode($array_cliente_info->result_array());            
            } 
        }
    }

    public function generandoPDF($identificador, $tipoRpt, $d1, $d2) {
        if ($tipoRpt==1) { 
            $array_campania_info=$this->db->query("CALL sp_infoCampania('".$identificador."')");

            $array_campania_info->next_result();

            if ($array_campania_info->num_rows()>0) {

                $this->db->where('ID_Campannas', $identificador);
                $array_info_cliente = $this->db->get('view_clientescampaniadetalle');

                if ($array_info_cliente->num_rows()>0) {                    
                    $array_final[] = array(
                        'array_1' => $array_campania_info->result_array(),
                        'array_2' => $array_info_cliente->result_array()
                    );     
                    return $array_final;               
                }else {
                    return false;
                }                             

            }else {
                return false;
            }            

        }elseif ($tipoRpt==2) {
            $array_agente_info=$this->db->query("CALL sp_infoUsuario('".$identificador."', '".$d1."', '".$d2."')");

            $array_agente_info->next_result();

            if ($array_agente_info->num_rows()>0) {
                return $array_agente_info->result_array();
            }            
        }elseif ($tipoRpt==3) {
            $array_cliente_info=$this->db->query("CALL sp_infoCliente('".$identificador."')");

            $array_cliente_info->next_result();

            if ($array_cliente_info->num_rows()>0) {
                return $array_cliente_info->result_array();
            }  
        }

    }
}