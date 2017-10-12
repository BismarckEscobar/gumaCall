<?php
class monitoreo_model extends CI_Model
{
    function __construct() {
        parent::__construct();
    }

    public function listarSesion($f1 = "",$f2= ""){
       $json = array();
       $i=0;
       $consulta = "SELECT * FROM usuario_registros WHERE Tipo='ON' ";
       if($f1 != "" && $f2 !=""){
            $consulta .= "AND FechaInicio AND FechaFinal 
       BETWEEN '" . date('Y-m-d H:i:s', strtotime($f1)) . "' AND '" . date('Y-m-d H:i:s', strtotime($f2)) . "' ";
       } 
       $consulta.= " AND UserName NOT IN('SU') ORDER BY FechaInicio ASC ";
       $query = $this->db->query($consulta);
       if ($query->num_rows()>0) {
           foreach ($query->result_array() as $key) {
               switch ($key['Tipo']) {
                   case 'ON':
                        $key['Tipo'] = "ACCESO";
                       break;
               }
               $json['data'][$i]['session_id'] = substr($key['session_id'],0,7);
                $json['data'][$i]['UserName'] = $key['UserName'];
                $json['data'][$i]['Nombre'] = $key['Nombre'];
                $json['data'][$i]['FechaInicio'] = $key['FechaInicio'];
                $json['data'][$i]['FechaFinal'] = $key['FechaFinal'];
                $json['data'][$i]['Tiempo_Total'] = $key['Tiempo_Total'];
                $json['data'][$i]['Tipo'] = $key['Tipo'];
                if($key['FechaFinal'] == null){
                    $json['data'][$i]['Enlace'] = 
                    "<a id='session_id' href='javascript:void(0)' onclick='CerrarSesion(".'"'.$key['session_id'].'","'.$key['FechaInicio'].'"'.")'
                     class='btn-floating red'><i class='tiny material-icons'>lock</i></a>";
                }else{
                    $json['data'][$i]['Enlace'] = " ";
                }
               $i++;
           }
       }
       else{
            $json['data'][$i]['session_id'] = "-";
            $json['data'][$i]['UserName'] = "-";
            $json['data'][$i]['Nombre'] = "-";
            $json['data'][$i]['FechaInicio'] ="-";
            $json['data'][$i]['FechaFinal'] = "-";
            $json['data'][$i]['Tiempo_Total'] = "-";
            $json['data'][$i]['Tipo'] = "-";
            $json['data'][$i]['Enlace'] = "-";
       }
       echo json_encode($json);
    }

    public function forzarCierre($id, $Fecha_inicio, $Fecha_fin, $Tiempo_Total)
    {
        $Tiempo_Total = $this->get_diff($Fecha_inicio, $Fecha_fin);
        $this->db->where('session_id', $id);
        $this->db->update('usuario_registros', array(
            'FechaFinal' => $Fecha_fin,
            'Tiempo_Total' => $Tiempo_Total
        ));
    }

    public function get_diff($strStart, $strEnd)
    {
        $dteStart = new DateTime($strStart);
        $dteEnd = new DateTime($strEnd);
        $dteDiff = $dteStart->diff($dteEnd);
        return $dteDiff->format("%H:%I:%S");
    }
}