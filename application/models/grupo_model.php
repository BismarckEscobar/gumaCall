<?php 
class Grupo_model extends CI_Model {

	public function __construct() {
        parent::__construct();
    }

    public function listarAgentes() {
    	$this->db->select('Nombre');
    	$this->db->select('Usuario');
        $this->db->select('IdUser');
        $this->db->where('Rol', 1);
        $this->db->where('Activo', 1);
        $this->db->from('usuario');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return 0;
        }
    }

    public function guardarGrupos($nombreGrupo, $agenteResponsable) {
    	
    }
}
?>