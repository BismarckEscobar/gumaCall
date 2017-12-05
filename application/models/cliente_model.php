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

	public function guardarUncliente($idCliente,$ruc,$nombre,$direccion,$telefono1,$telefono2,$telefono3,$vendedor) {
		$this->db->where('ID_Cliente', $idCliente);
		$val = $this->db->get('clientes');

		if ($val->num_rows()>0) {
			echo false;
		}else {
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
		}
	}
}
?>