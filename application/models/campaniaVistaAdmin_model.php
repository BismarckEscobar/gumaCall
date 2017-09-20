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

    public function campaniaInfo($numCampania) {
    	
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
}
?>