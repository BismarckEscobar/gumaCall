<?php
class cliente_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		require_once(APPPATH.'libraries\PHPExcel\Classes\PHPExcel.php'); 
	}

	public function guardarDataCliente($objPHPExcel) {
		$i=2;$param=0;
		$this->db->truncate('clientes');

		while ($param==0) {
			$this->db->insert('clientes', array(
				'ID_Cliente' => $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue(),
				'RUC' => $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue(),
				'Nombre' => $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue(),
				'Direccion' => $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue(),
				'Telefono1' => $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue(),
				'Telefono2' => $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue(),
				'Telefono3' => $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue(),
				'Vendedor' => $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue()
			));
			$i++;
			if($objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue()==NULL){
				$param=1;				
			}
		}
		redirect('clientes','refresh');
	}

	public function listarClientes() {
		$query=$this->db->get('clientes');
		if ($query->num_rows()>0) {
			return $query->result_array();
		}else {
			return false;
		}
	}

	public function listandoRutas() {
		$query = $this->sqlsrv->fetchArray('SELECT VENDEDOR,NOMBRE FROM vtVS2_Vendedor', SQLSRV_FETCH_ASSOC);

		if (count($query)>0) {
	        foreach ($query as $key) {
	            $temp[] = array(
	                'value' => $key['VENDEDOR'],
	                'desc' => $key['VENDEDOR'].' - '.$key['NOMBRE']
	            );                
	        }
	        return $temp;
		}else {
			return false;
		}        
	}

	public function editarRegcliente($tipo,$idCliente,$ruc,$nombre,$direccion,$telefono1,$telefono2,$telefono3,$vendedor) {
		$this->db->where('ID_Cliente', $idCliente);
		$val = $this->db->get('clientes');

		if ($val->num_rows()>0 && $tipo=="U") {
	        $this->db->where('ID_Cliente', $idCliente);
	        $result=$this->db->update('clientes', array(
				'RUC' => $ruc,
				'Nombre' => $nombre,
				'Direccion' => $direccion,
				'Telefono1' => $telefono1,
				'Telefono2' => $telefono2,
				'Telefono3' => $telefono3
	        ));
	        echo ($this->db->affected_rows() > 0) ? 1 : 0;
		}elseif ($val->num_rows()==0 && $tipo=="I") {
			$this->db->insert('clientes', array(
				'ID_Cliente' => $idCliente,
				'RUC' => $ruc,
				'Nombre' => $nombre,
				'Direccion' => $direccion,
				'Telefono1' => $telefono1,
				'Telefono2' => $telefono2,
				'Telefono3' => $telefono3,
				'Vendedor' => $vendedor
			));
			echo ($this->db->affected_rows() > 0) ? 1 : 0;	
		}elseif ($val->num_rows()>0 && $tipo=="D") {
	        $this->db->where('ID_Cliente', $idCliente);
	        $this->db->delete('clientes');

	        echo ($this->db->affected_rows() > 0) ? 1 : 0;
		}
	}

	public function listandoClientesCampania() {
        $i=0;
        $json = array();
        $query = $this->db->query('SELECT * FROM clientes');

        if ($query->num_rows()>0) {
            foreach ($query->result_array() as $key) {         
				$json['data'][$i]['CODIGO'] = "<span>".$key['ID_Cliente']."</span>";
				$json['data'][$i]['RUC'] = "<textarea wrap='soft' id='ruc-".$key['ID_Cliente']."' readonly cols='30' class='no-edit input-edit-".$key['ID_Cliente']."'>".$key['RUC']."</textarea>";
				$json['data'][$i]['NOMBRE'] = "<textarea wrap='soft' id='nombre-".$key['ID_Cliente']."' readonly cols='50' rows='4' title='".$key['Nombre']."' class='no-edit input-edit-".$key['ID_Cliente']."'>".$key['Nombre']."</textarea>";
				$json['data'][$i]['TELEFONO1'] = "<input id='telf1-".$key['ID_Cliente']."' readonly class='no-edit input-edit-".$key['ID_Cliente']."' value='".$key['Telefono1']."'>";
				$json['data'][$i]['TELEFONO2'] = "<input id='telf2-".$key['ID_Cliente']."' readonly class='no-edit input-edit-".$key['ID_Cliente']."' value='".$key['Telefono2']."'>";
				$json['data'][$i]['TELEFONO3'] = "<input id='telf3-".$key['ID_Cliente']."' readonly class='no-edit input-edit-".$key['ID_Cliente']."' value='".$key['Telefono3']."'>";
				$json['data'][$i]['DIRECCION'] = "<textarea id='dir-".$key['ID_Cliente']."' readonly cols='40' rows='2' title='".$key['Direccion']."' class='no-edit input-edit-".$key['ID_Cliente']."'>".$key['Direccion']."</textarea>";
				$json['data'][$i]['OPC'] = "<div id='opciones1-".$key['ID_Cliente']."'>
                                        <a class='dropdown-button btn-floating blue' href='#' data-activates='dropdown1-".$key['ID_Cliente']."'><i class='small material-icons'>list</i></a>
                                        <ul id='dropdown1-".$key['ID_Cliente']."' class='dropdown-content ul-dr'>
                                            <li><a href='#!' onclick='editar_registro(".'"'.$key["ID_Cliente"].'"'.")' >Editar</a></li>
                                            <li class='divider'></li>
                                            <li><div id='' style='padding: 7px 7px'><a onclick='eliminar_registro(".'"'.$key["ID_Cliente"].'"'.")' href='#' style='color:red'>Eliminar</a></div></li>
                                        </ul>
                                    </div>
                                    <div id='opciones2-".$key['ID_Cliente']."' class='row' style='display:none;'>
                                        <div class='col s6'>
                                            <a href='#!' onclick='guardarEdicion(".'"'.$key["ID_Cliente"].'"'.")' class='btn-floating green'><i class='small material-icons'>done</i></a>
                                        </div><br><br>
                                        <div class='col s6'>
                                            <a href='#!' onclick='cancelarEdicion(".'"'.$key["ID_Cliente"].'"'.")' class='btn-floating red'><i class='small material-icons'>clear</i></a>
                                        </div>
                                    </div>";
				$i++;          
            }
        }
        echo json_encode($json);
	}

	public function eliminandoClientes($clientes, $campania) {
		$clientesSeleccionados=""; $ii=0;

		foreach ($clientes as $key => $value) {
			if ($ii==0) {
				$clientesSeleccionados = '"'.$value.'"';
			}else {
			 	$clientesSeleccionados = $clientesSeleccionados.',"'.$value.'"';
			}
			$ii++;
		}
		$this->db->query("DELETE FROM campanna_cliente WHERE ID_Cliente IN (".$clientesSeleccionados.") AND ID_Campannas = ".'"'.$campania.'"'.";");

		echo ($this->db->affected_rows() > 0) ? 1 : 0;
	}
}
?>