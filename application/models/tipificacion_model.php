<?php
class tipificacion_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function listarTipificaciones() {
		$query=$this->db->get('tipificaciones');
		if ($query->num_rows()>0) {
			return $query->result_array();
		}else {
			return false;
		}
	}

	public function guardandoTipificacion($data) {
		if (count($data)>0) {
	        $query = $this->db->insert('tipificaciones', $data);
	        if ($query) {
	            redirect('tipificaciones','refresh');
	            //echo "1";
	        }
		}
	}

    public function actulizarEstado($idTipificacion,$estado){
        if ($estado==1) {
            $estado=1;
        }else{$estado=0;}
        $data = array(
            'estado' => $estado,
        );
        $this->db->where('ID_Tipificacion', $idTipificacion);
        $result=$this->db->update('tipificaciones',$data);
        echo json_encode($result);
    }


}
?>