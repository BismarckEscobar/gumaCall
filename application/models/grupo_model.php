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
    
    public function listarGrupos() {
        $this->db->where('Estado', 1);
        $this->db->from('grupos');
        $this->db->join('usuario', 'usuario.IdUser = grupos.IdResponsable');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return 0;
        }
    }

    public function guardarGrupos($nombreGrupo, $agenteResponsable) {
    	$q = $this->verificarGrupo($nombreGrupo,$agenteResponsable);
        if ($q == 1) {
            $dataGrupo = array(
            'NombreGrupo' => $nombreGrupo,
            'IdResponsable' => $agenteResponsable,
            'Estado' => 1,
            'FechaCreada' => date('Y-m-d')
            );
            $query = $this->db->insert('grupos', $dataGrupo);
            if ($query) {
                redirect('grupos','refresh');
                echo  "1";
            }
        }
        else if ($q == 0){
            echo "ESTE GRUPO YA EXISTE";
        }else{
            echo "ERROR AL CREAR EL GRUPO";
        }
    }

    public function verificarGrupo($nombreGrupo,$agenteResponsable) {
        $this->db->where('NombreGrupo',$nombreGrupo);
        $this->db->where('IdResponsable',$agenteResponsable);
        $query = $this->db->get('grupos');
        if ($query->num_rows()>0) {
            return 0;
        }else{
            return 1;
        }
    }
}
?>