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
}
?>