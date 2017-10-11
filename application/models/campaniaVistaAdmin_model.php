<?php 
class campaniaVistaAdmin_model extends CI_Model { 
	
	public function __construct() {
        parent::__construct();
    }

    public function listarCampaniasActivas() {
    	$dataFinal=array();$montoTemp=0;
    	$result=$this->db->get('campanna');

    	if ($result->num_rows()>0) {
    		foreach ($result->result_array() as $key) {
    			$temp=$key['ID_Campannas'];

    			$this->db->where('ID_Campannas', $temp);
    			$this->db->select_sum('Monto');
    			$monto=$this->db->get('campanna_registros');

    			if ($monto->result_array()[0]['Monto']!="") {
    				$montoTemp=$monto->result_array()[0]['Monto'];
    			}elseif ($monto->result_array()[0]['Monto']=="") {
    				$montoTemp=0;
    			}
    			$data=array(
    				'ID_Campannas'=>$key['ID_Campannas'],
    				'Nombre'=>$key['Nombre'],
    				'Fecha_Inicio'=>$key['Fecha_Inicio'],
    				'Fecha_Cierre'=>$key['Fecha_Cierre'],
    				'Estado'=>$key['Estado'],
    				'Activo'=>$key['Activo'],
    				'Meta'=>$key['Meta'],
    				'Observaciones'=>$key['Observaciones'],
    				'Mensaje'=>$key['Mensaje'],
    				'monto'=>$montoTemp
    			);
    			$dataFinal[]=$data;
    		}
    		return $dataFinal;
    	}else {
    		return false;
    	}
    }

    public function listarClientes($numCampania) {
    	$this->db->where('ID_Campannas', $numCampania);
    	$query = $this->db->get('view_clientescampaniadetalle');

    	if ($query->num_rows()>0) {
    		return $query->result_array();
    	}else {
    		return false;
    	}
    }

    public function campaniaInfo($numCampania) {
    	$query=$this->db->query("CALL sp_infoCampania('".$numCampania."')");
    	if ($query->num_rows()>0) {
    		return $query->result_array();
    	}else {
    		return false;
    	}
		$query->free_result();
		$query->next_result();
    }

    public function ultimoNoCampania() {
    	$temp="";$verifica=false;
    	$this->db->select('valor');
    	$this->db->limit(1);
    	$this->db->order_by("valor", "desc");
    	$idCampania=$this->db->get('llaves');

    	if ($idCampania->num_rows()>0) {    		
    		$temp=$idCampania->result_array()[0]['valor'];
    		
    		$temp = $temp + 1;

			while($verifica == false) {
	    		switch ($temp) {
	    			case strlen($temp) <= 1:
	    				$temp='CP-'.'0000'.$temp;
	    				break;
	    			case strlen($temp) <=2:
	   					$temp='CP-'.'000'.$temp;
	   					break;
	   				case strlen($temp) <=3:
	   					$temp='CP-'.'00'.$temp;
	   					break;
	   				case strlen($temp) <=4:
	   					$temp='CP-'.'0'.$temp;
	   					break;
	   				case strlen($temp) <=5:
	   					$temp='CP-'.$temp;
	   					break;
	   			}
	   			$verifica=true;
	   			return $temp;
	   		}
    	}else {
    		return false;
    	}
    }

    public function guardarCampaniaCliente($array, $opc) { 
    	if ($opc==1) {
	    	for ($i=1; $i <= count($array); $i++) { 
					$data = array(
						'ID_Campannas' => $array[$i]['ID_Campannas'],
						'ID_Cliente' => $array[$i]['ID_Cliente'],
						'Meta' => $array[$i]['Meta']
					);
				$query = $this->db->insert('campanna_cliente', $data);	
			}
			redirect('campaniasVA','refresh');
    	}elseif ($opc==2) {
			for ($i=2; $i <= count($array)+1; $i++) {
				$data = array(
					'ID_Campannas' => $array[$i]['ID_Campannas'],
					'ID_Cliente' => $array[$i]['ID_Cliente'],
					'Meta' => $array[$i]['Meta']
				);				
				$query = $this->db->insert('campanna_cliente', $data);							
			}
			redirect('campaniasVA','refresh');
    	}
	}

	public function incrementarLlave() {
    	$this->db->select('valor');
    	$this->db->limit(1);
    	$this->db->order_by("valor", "desc");
    	$llave=$this->db->get('llaves');

    	if ($llave->num_rows()>0) {
    		$temp=$llave->result_array()[0]['valor'];

    		$temp = $temp + 1;

    		$data = array(
    			'concepto' => 'Campaña',
    			'valor' => $temp
    		);

    		$this->db->insert('llaves', $data);
    	}
	}

	public function listarAgentes() {
		$this->db->where('rol', 1);
		$this->db->where('Activo', 1);
		$query=$this->db->get('usuario');
		if ($query->num_rows()>0) {
			return $query->result_array();
		} else {
			return false;
		}
	}

	public function guardandoNuevaCampania($agentes,$campania) {
		$result=0;
		for ($i=0; $i < count($campania) ; $i++) { 
			$index=explode(",", $campania[$i]);
			$temp=array(
				'ID_Campannas'=>$index[0],
				'Nombre'=>$index[1],
				'Fecha_Inicio'=>$index[2],
				'Fecha_Cierre'=>$index[3],
				'Estado'=>1,
				'Activo'=>1,
				'Meta'=>$index[4],
				'Observaciones'=>$index[5],
				'Mensaje'=>$index[6],
				'Fecha_Creacion'=>date('Y-m-d H:i:s'),
				'ID_Usuario'=>$index[7]
			);
			$result=$this->db->insert('campanna', $temp);
		}
		if ($result!=0) {			
			for ($i=0; $i<count($agentes) ; $i++) {
				$index=explode(",",$agentes[$i]);
				$temp=array(
					'ID_Campannas'=>$index[0],
					'ID_Usuario'=>$index[1],
					'Fecha_asignacion'=>date('Y-m-d H:i:s')
				);
				$result=$this->db->insert('campanna_asignacion', $temp);
			}
		}
		if ($result) {			
			echo json_encode(true);
		}else {			
			echo json_encode('0');
		}
		return $result;
	}

	public function guardandoEdicion($array) {
		$temp = array(); $numCampania = ''; $valor = ''; $tipo=0;
		for ($i=0; $i < count($array); $i++) { 
			$index=explode(",", $array[$i]);
				$numCampania=$index[0];
				$valor=$index[1];
				$tipo=$index[2];
		}
		switch ($tipo) {
			case 1:
				$temp = array(
					'Nombre' => (string)$valor
				);
			break;
			case 2:
				$fechatemp=explode("/",$valor); 
				$dia=$fechatemp[0];
				$mes=$fechatemp[1];
				$anyo=$fechatemp[2];

				$fecha = $anyo.'/'.$mes.'/'.$dia;
				$fechaInicio = date("Y/m/d", strtotime($fecha));
				$temp = array(
					'Fecha_Inicio' => $fechaInicio
				);
			break;
			case 3:
				$meta = (float)$valor;
				$temp = array(
					'Meta'=> $meta
				);
			break;
			case 4:
				$fechatemp=explode("/",$valor); 
				$dia=$fechatemp[0];
				$mes=$fechatemp[1];
				$anyo=$fechatemp[2];

				$fecha = $anyo.'/'.$mes.'/'.$dia;
				$fechaCierre = date("Y/m/d", strtotime($fecha));
				$temp = array(
					'Fecha_Cierre' => $fechaCierre
				);
			break;
			case 5:
				$temp = array(
					'Observaciones' => (string)$valor
				);
			break;
			case 6:
				$temp = array(
					'Mensaje' => (string)$valor
				);
			break;
		}

		$this->db->where('ID_Campannas', $numCampania);
		$result=$this->db->update('campanna', $temp);

		if ($result) {
			echo json_encode(true);
		}
	}

	public function actualizandoEstado($numCampania, $estado) {
		$data = array(
			'Estado'=>$estado
		);
		$this->db->where('ID_Campannas', $numCampania);
		$result=$this->db->update('campanna', $data);

		if ($result) {
			echo json_encode(true);
		}
	}

	public function generandoDataGraficaDias($numCampania) {
		$fecha1="";$fecha2="";$json=array();
		$this->db->where('ID_Campannas', $numCampania);
		$query=$this->db->get('campanna');

		if ($query->num_rows()>0) {
			foreach ($query->result_array() as $key) {
				$fecha1 = $key['Fecha_Inicio'];
				$fecha2 = $key['Fecha_Cierre'];
			}
		}		

		for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){
			$temp = date('w', strtotime($i));
			if ($temp!=0 && $i<=date('Y-m-d')) {
				$json['name'][] = date('d/m', strtotime($i));	
			}
		}
		echo json_encode($json);
	}

	public function returnMonto($numCampania, $fecha) {
		$monto = $this->db->query("SELECT SUM(Monto) AS monto FROM campanna_registros WHERE ID_Campannas = '".$numCampania."' AND Fecha = '".date('Y-m-d', strtotime($fecha))."';");
		return $monto;
	}

	public function generandoDataGrafica($idCampania) { 
		$json = array();$real=array();$meta=array();
		$this->db->where('ID_Campannas', $idCampania);
		$query1=$this->db->get('campanna');

		if ($query1->num_rows()>0) {		
			for($i=$query1->result_array()[0]['Fecha_Inicio'];$i<=$query1->result_array()[0]['Fecha_Cierre'];$i = date("Y-m-d", strtotime($i ."+1 days"))){
				$temp = date('w', strtotime($i));

				if ($temp!=0 && $i<=date('Y-m-d')) {
					$monto = $this->returnMonto($idCampania, date('Y-m-d',strtotime($i)));
					if ($monto->result_array()[0]['monto']=="") {
						$real[] = 0;	
					}else {
						$real[] = floatval($monto->result_array()[0]['monto']);						
					}
					$meta[] = floatval($query1->result_array()[0]['Meta']);
				}else {
					continue;
				}
			}
		}

        $data1[] = array(
        	'Tipo' => 'Real',
        	'Data' => $real
        );        

        $data2[] = array(
        	'Tipo' => 'Meta',
        	'Data' => $meta
        );
        
        $json = array_merge($data1,$data2);
        
        echo json_encode($json);
	}

    public function listandoAgentes($idCampania) {
        $i = 0;
        $json = array();
        $query = $this->db->query('SELECT * FROM usuario WHERE Rol = 1 AND Activo = 1;');

        if (count($query)>0) {
            foreach ($query->result_array() as $key) {
                $validador = $this->db->query('SELECT * FROM campanna_asignacion WHERE ID_Campannas="'.$idCampania.'" AND ID_Usuario="'.$key['IdUser'].'"');
                if ($validador->num_rows()==0) {
                	$json['data'][$i]['ACTIVO'] = '<input type="checkbox" class="filled-in" id="chkAgente'.$key['IdUser'].'">
                								   <label for="chkAgente'.$key['IdUser'].'"></label>';                  
                    $json['data'][$i]['ID_USUARIO'] = $key['IdUser'];
                    $json['data'][$i]['NOMBRE'] = $key['Usuario'];                    
                    $i++;
                }else {
                	$json['data'][$i]['ACTIVO'] = '<input type="checkbox" checked="checked" class="filled-in" id="chkAgente'.$key['IdUser'].'">
                								   <label for="chkAgente'.$key['IdUser'].'"></label>';                    
                    $json['data'][$i]['ID_USUARIO'] = $key['IdUser'];
                    $json['data'][$i]['NOMBRE'] = $key['Usuario'];                    
                    $i++;
                }
            }
        }
        echo json_encode($json);
    }

    public function editarAgentesCamp($data, $campania) {
  		$result=false;
		if (count($data)>0) {
			$this->db->where('ID_Campannas', $campania);
			$this->db->delete('campanna_asignacion');
			for ($i=0; $i<count($data) ; $i++) {
				if ($data[$i]!="") {
					$index=explode(",",$data[$i]);
					$temp=array(
						'ID_Campannas'=>$index[0],
						'ID_Usuario'=>$index[1],
						'Fecha_asignacion'=>date('Y-m-d H:i:s')
					);
					$result=$this->db->insert('campanna_asignacion', $temp);
				}				
			}
			echo json_encode($result);
		}
    }
}
?>