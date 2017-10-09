<?php
class cliente_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function guardarDataCliente($array, $opc) {
		$data=array(); $dataCliente=array();
    	if ($opc==1) {
    		$this->db->truncate('clientes');
	    	for ($i=1; $i <= count($array); $i++) {	    		
				$data = array(
					'ID_Cliente' => $array[$i]['ID_Cliente'],
					'Nombre' => $array[$i]['Nombre'],
					'Direccion' => $array[$i]['Direccion'],
					'Telefono1' => $array[$i]['Telefono1'],
					'Telefono2' => $array[$i]['Telefono2'],
					'Telefono3' => $array[$i]['Telefono3'],
					'Vendedor' => $array[$i]['Vendedor']
				);
				$dataCliente[]=$data;
			}
			$this->db->insert_batch("clientes",$dataCliente);
			redirect('clientes','refresh');
    	}elseif ($opc==2) {
			for ($i=2; $i <= count($array)+1; $i++) {
				$data = array(
					'ID_Cliente' => $array[$i]['ID_Cliente'],
					'Nombre' => $array[$i]['Nombre'],
					'Direccion' => $array[$i]['Direccion'],
					'Telefono1' => $array[$i]['Telefono1'],
					'Telefono2' => $array[$i]['Telefono2'],
					'Telefono3' => $array[$i]['Telefono3'],
					'Vendedor' => $array[$i]['Vendedor']
				);				
				$dataCliente[]=$data;
			}
			$this->db->insert_batch("clientes",$dataCliente);
			redirect('clientes','refresh');
    	}
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