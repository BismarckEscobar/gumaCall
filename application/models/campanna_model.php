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
        return 0;

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
        $cmp = array();
        $c=0;
        $this->db->limit(1);
        $this->db->where('ID_Campannas',$id);
        $Querry_Campanna = $this->db->get('campanna');
        if($Querry_Campanna->num_rows() > 0){
            foreach ( $Querry_Campanna->result_array() as $Cmp){
                $cmp[$c]['ID_Campannas'] = $Cmp['ID_Campannas'];
                $cmp[$c]['Nombre'] = $Cmp['Nombre'];
                $cmp[$c]['Mensaje'] = $Cmp['Mensaje'];
                $cmp[$c]['Fecha_Inicio'] = $Cmp['Fecha_Inicio'];
                $cmp[$c]['Fecha_Cierre'] = $Cmp['Fecha_Cierre'];
                $cmp[$c]['Meta'] = $Cmp['Meta'];
                $cmp[$c]['MONTO_REAL'] = $this->getRealCamp($Cmp['ID_Campannas']);
                $c++;
            }
        }
        return $cmp;

    }
    public function My_Campannas_Clientes($id){
        $array_Clientes_camp=array();
        $c=0;
        $Querry_Campanna = $this->db->get_where('View_campannas_Clientes',array('ID_Campannas'=>$id));
         if($Querry_Campanna->num_rows()>0){
            foreach ( $Querry_Campanna->result_array() as $Cmp){
                $array_Clientes_camp[$c]['ID_Campannas'] = $Cmp['ID_Campannas'];
                $array_Clientes_camp[$c]['ID_Cliente'] = $Cmp['ID_Cliente'];
                $array_Clientes_camp[$c]['Nombre'] = $Cmp['Nombre'];
                $array_Clientes_camp[$c]['Telefono1'] = $Cmp['Telefono1'];
                $array_Clientes_camp[$c]['Telefono2'] = $Cmp['Telefono2'];
                $array_Clientes_camp[$c]['Telefono3'] = $Cmp['Telefono3'];
                $array_Clientes_camp[$c]['Meta'] = $Cmp['Meta'];
                $array_Clientes_camp[$c]['Real'] = $this->getRealCliente($Cmp['ID_Campannas'],$Cmp['ID_Cliente']);
                $c++;
            }
            return $array_Clientes_camp;

        }
        return 0;

    }

    /*FUNCION PARA MOSTRAR CLIENTES POR VENDEDOR*/
    public function clientePorVendedor($id,$usuario){
        $array_Clientes_camp = array();
        $temp;
        $c = 0;
        $vendedores = $this->db->query("SELECT * FROM view_vendedoresporgrupo WHERE idUsuario = ".$usuario."");
        foreach ($vendedores->result_array() as $key) {
            $index = explode(", ", $key['vendedores']);
            for ($i = 0; $i < count($index); $i++) {
                $clientes = $this->db->query("SELECT * FROM view_campannas_clientes WHERE ID_Campannas = '".$id."' AND Vendedor='".$index[$i]."'; ");
                foreach ($clientes->result_array() as $Cmp) {
                    $temp = array(
                        'ID_Campannas' => $id,
                        'ID_Cliente' => $Cmp['ID_Cliente'],
                        'Nombre' => $Cmp['Nombre'],
                        'Telefono1' => $Cmp['Telefono1'],
                        'Telefono2' => $Cmp['Telefono2'],
                        'Telefono3' => $Cmp['Telefono3'],
                        'Meta' => $Cmp['Meta'],
                        'Real' => $this->getRealCliente($id, $Cmp['ID_Cliente']),
                        'Vendedor' => $Cmp['Vendedor']
                    );
                     $array_Clientes_camp[] = $temp;  
                }
            }
        }
        return $array_Clientes_camp;
        print_r($array_Clientes_camp);
    }
    /*FIN FUNCION PARA MOSTRAR CLIENTES POR VENDEDOR*/

    public function My_Campannas_Clientes1($Id)
    {
        $array_Clientes_camp = array();
        $c = 0;
        $Querry_Campanna = $this->db->get_where('View_campannas_Clientes', array('ID_Cliente' => $Id));
        if ($Querry_Campanna->num_rows()>0) {
            foreach ($Querry_Campanna->result_array() as $Cmp) {
                $array_Clientes_camp[$c]['ID_Campannas'] = $Cmp['ID_Campannas'];
                $array_Clientes_camp[$c]['ID_Cliente'] = $Cmp['ID_Cliente'];
                $array_Clientes_camp[$c]['Nombre'] = $Cmp['Nombre'];
                $array_Clientes_camp[$c]['Telefono1'] = $Cmp['Telefono1'];
                $array_Clientes_camp[$c]['Telefono2'] = $Cmp['Telefono2'];
                $array_Clientes_camp[$c]['Telefono3'] = $Cmp['Telefono3'];
                $array_Clientes_camp[$c]['Meta'] = $Cmp['Meta'];
                $array_Clientes_camp[$c]['Real'] = $this->getRealCliente($Cmp['ID_Campannas'], $Cmp['ID_Cliente']);
                $c++;
            }
            return $array_Clientes_camp;
        }
        return 0;

    }

    public function HstCompra_3M($CL){
        $i=0;
        $json = array();

        $iCliente = $this->sqlsrv->fetchArray("SELECT T0.ARTICULO,T0.DESCRIPCION,CONVERT(VARCHAR,T0.FECHA_FACTURA,105) as FECHA_FACTURA,T0.ARTICULO,SUM(T0.CANTIDAD) AS CANTIDAD FROM vtCC_hstCompra_3M T0 WHERE T0.Cliente='".$CL."' GROUP BY T0.FECHA_FACTURA,T0.ARTICULO,T0.DESCRIPCION",SQLSRV_FETCH_ASSOC);
        foreach($iCliente as $key){
            $json[$i]['ARTICULO']      = $key['ARTICULO'];
            $json[$i]['DESCRIPCION']       = $key['DESCRIPCION'];
            $json[$i]['FECHA']       = $key['FECHA_FACTURA'];
            $json[$i]['CANTIDAD']    = number_format($key['CANTIDAD'],0);
            $i++;
        }
        return $json;
        $this->sqlsrv->close();

    }
    public function Info_Cliente($CL){
        $i=0;
        $json = array();
        $HstCompra = $this->sqlsrv->fetchArray("SELECT * FROM vtCC_CLIENTES WHERE Cliente='".$CL."' ",SQLSRV_FETCH_ASSOC);
        foreach($HstCompra as $key){
            $json[$i]['DIRECCION']      = $key['DIRECCION'];
            $json[$i]['RUC']      = $key['RUC'];
            $json[$i]['CREDITO']      = $key['LIMITE_CREDITO'];
            $json[$i]['SALDO']       = $key['SALDO'];
            $json[$i]['DISPONIBLE']       = $key['CREDITODISP'];
            $i++;
        }
        return $json;
        $this->sqlsrv->close();

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

        if (count($MyCmp)> 0){
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
        }


        return 0;

    }
    public function guardar_llamada($num,$Cliente,$Camp,$Monto,$Duracion,$Comentario,$TPF,$EXT,$unidad)
    {
        $this->db->insert('campanna_registros',array(
            'Num_CLI' => $num,
            'ID_Usuario' => $this->session->userdata('id'),
            'ID_Campannas' => $Camp,
            'ID_CLIENTE' => $Cliente,
            'Monto' => $Monto,
            'Fecha' => date('Y-m-d'),
            'Hora' => date('H:i:s'),
            'Duracion' => $Duracion,
            'Comentarios' => $Comentario,
            'ID_TPF' => $TPF,
            'EXT' => $EXT,
            "Unidad" => $unidad
        ));
        echo ($this->db->affected_rows() > 0) ? 1 : 0;

    }
}