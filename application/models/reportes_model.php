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
                $temp[] = array(
                    'value' => $key['ID_Campannas'],
                    'desc' => $key['ID_Campannas'].' - '.$key['Nombre']
                );                
            }
            return $temp;
        }elseif ($tipoRpt=='rptagentes' || $tipoRpt=='rptLlamadas') {
            $this->db->select('IdUser');
            $this->db->select('Usuario');
            $this->db->select('Nombre');
            $this->db->where('Rol', 1);
            $query_agentes = $this->db->get('usuario');

            foreach ($query_agentes->result_array() as $key) {
                $temp[] = array(
                    'value' => $key['IdUser'],
                    'desc' => $key['Usuario'].' - '.$key['Nombre']
                );                
            }
            return $temp;
        }elseif ($tipoRpt=='rptclientes') {
            $this->db->select('ID_Cliente');
            $this->db->select('Nombre');
            $query_clientes = $this->db->get('clientes');

            foreach ($query_clientes->result_array() as $key) {
                $temp[] = array(
                    'value' => $key['ID_Cliente'],
                    'desc' => $key['ID_Cliente'].' - '.$key['Nombre']
                );                
            }
            return $temp;
        }elseif ($tipoRpt=='RegLlmdRealizadas') {
            $this->db->select('EXT');
            $this->db->select('Usuario');
            $this->db->select('Nombre');
            $this->db->where('Rol', 1);
            $query_agentes = $this->db->get('usuario');

            foreach ($query_agentes->result_array() as $key) {
                $temp[] = array(
                    'value' => $key['EXT'],
                    'desc' => $key['Usuario'].' - '.$key['Nombre'].' / EXT:'.$key['EXT']
                );                
            }
            return $temp;
        } else {
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
        $nc=$index[4];
        $cl=$index[5];

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
        }elseif ($tipoRpt==3) {
            $i=0;
            $query = $this->db->query("CALL sp_infoCliente('".$identificador."')");
            $query->next_result();

            if ($nc!="") {
                foreach ($query->result_array() as $key) {
                    if($key['campania']==$nc){
                        $row[]=$query->row_array($i);
                        break;
                    }else { $i++; }
                }
                echo json_encode($row);              
            }else {
                echo json_encode($query->result_array());
            }
                     
        }elseif ($tipoRpt==4) {
            $array_llamadas_info=$this->db->query("CALL sp_infoGeneral('%".$nc."%','%".$identificador."%', '%".$cl."%', '".$d1."', '".$d2."')");
            $array_llamadas_info->next_result();

            if ($array_llamadas_info->num_rows()>0) {         
                echo json_encode($array_llamadas_info->result_array());
            }    
        }elseif ($tipoRpt==5) {
            $data_final=array();$cantTotal=0;
            $db_asterisk = $this->load->database('db_asterisk', TRUE);
            
            if ($identificador=='1T0OD1O0S') {
                $identificador='';
            }
            
            $array_agentLlamda_info=$this->db->query("CALL sp_infoLlamadas('%".$identificador."%', '".$d1."', '".$d2."')");
            $array_agentLlamda_info->next_result();

            $ext=$this->db->query("SELECT GROUP_CONCAT(DISTINCT EXT SEPARATOR ', ') AS EXT FROM usuario;");
            
            $array_planta=$db_asterisk->query("SELECT * FROM vst_cdr WHERE ORIGEN LIKE '%".$identificador."%' AND FECHA BETWEEN '".$d1."' AND '".$d2."' AND TIPO = 'EXTERNO' AND ORIGEN IN (".$ext->result_array()[0]['EXT'].");");
            for ($i=0;$i<=count($array_planta->result_array());$i++) {
                $cantTotal=$cantTotal+intval($array_planta->result_array()[$i]['duration']);
                /*list($h, $m, $s) = explode(':', $array_planta->result_array()[$i]['DURACION']); 
                $minutos = ($h * 3600) + ($m * 60) + $s;     
                $this->cantTotal += $minutos;*/
            }

            $data_final[] = array(
                'array_1' => $array_agentLlamda_info->result_array(),
                'array_2' => $array_planta->result_array(),
                'tiempoTotal' => date('H:i:s', strtotime($this->conversorSegundosHoras($cantTotal)))
            );                     
            echo json_encode($data_final);
        }
    }
    
    public function conversorSegundosHoras($tiempo_en_segundos) {
        $horas = floor($tiempo_en_segundos / 3600);
        $minutos = floor(($tiempo_en_segundos - ($horas * 3600)) / 60);
        $segundos = $tiempo_en_segundos - ($horas * 3600) - ($minutos * 60);

        return $horas . ':' . $minutos . ":" . $segundos;
    }

    public function generandoPDF($identificador, $tipoRpt, $d1, $d2, $nc, $cl) {
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
            $array_final = array();
            $array_agente_info=$this->db->query("CALL sp_infoUsuario('".$identificador."', '".$d1."', '".$d2."')");

            $array_agente_info->next_result();

            if ($array_agente_info->num_rows()>0) {

                $dtConexion=$this->db->query("SELECT * FROM usuario_registros WHERE ID_Usuario='".$identificador."' AND FechaInicio >= '".$d1."' AND FechaFinal <= '".$d2."'");
    
                $array_final[] = array(
                    'array_1' => $array_agente_info->result_array(),
                    'array_2' => $dtConexion->result_array()
                );                
            } return $array_final;    
        }elseif ($tipoRpt==3) {
            $i=0;
            $query = $this->db->query("CALL sp_infoCliente('".$identificador."')");
            $query->next_result();

            if ($nc!="") {
                foreach ($query->result_array() as $key) {
                    if($key['campania']==$nc){
                        $row[]=$query->row_array($i);
                        break;
                    }else { $i++; }
                }
                return $row;              
            }else {
                return $query->result_array();
            }
            
        }elseif ($tipoRpt==4) {
            $array_llamadas_info=$this->db->query("CALL sp_infoGeneral('%".$nc."%','%".$identificador."%', '%".$cl."%', '".$d1."', '".$d2."')");
            $array_llamadas_info->next_result();

            if ($array_llamadas_info->num_rows()>0) {         
                return $array_llamadas_info->result_array();
            }
        }elseif ($tipoRpt==5) {
            $data_final=array();$cantTotal=0;
            $db_asterisk = $this->load->database('db_asterisk', TRUE);
            
            if ($identificador=='1T0OD1O0S') {
                $identificador='';
            }
            
            $array_agentLlamda_info=$this->db->query("CALL sp_infoLlamadas('%".$identificador."%', '".$d1."', '".$d2."')");
            $array_agentLlamda_info->next_result();

            $ext=$this->db->query("SELECT GROUP_CONCAT(DISTINCT EXT SEPARATOR ', ') AS EXT FROM usuario;");
            
            $array_planta=$db_asterisk->query("SELECT * FROM vst_cdr WHERE ORIGEN LIKE '%".$identificador."%' AND FECHA BETWEEN '".$d1."' AND '".$d2."' AND TIPO = 'EXTERNO' AND ORIGEN IN (".$ext->result_array()[0]['EXT'].");");
            for ($i=0;$i<=count($array_planta->result_array());$i++) {
                $cantTotal=$cantTotal+intval($array_planta->result_array()[$i]['duration']);
                /*list($h, $m, $s) = explode(':', $array_planta->result_array()[$i]['DURACION']); 
                $minutos = ($h * 3600) + ($m * 60) + $s;     
                $this->cantTotal += $minutos;*/
            }

            $data_final[] = array(
                'array_1' => $array_agentLlamda_info->result_array(),
                'array_2' => $array_planta->result_array(),
                'tiempoTotal' => date('H:i:s', strtotime($this->conversorSegundosHoras($cantTotal)))
            );                     
            return $data_final;
        }
    }
}