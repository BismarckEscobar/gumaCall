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

    public function editarGrupo($idGrupo) {
        $this->db->where('IdGrupo', $idGrupo);
        $this->db->from('grupos');
        $query=$this->db->get();

        if ($query->num_rows()>0) {
            echo json_encode($query->result_array());
        }else {
            echo "0";
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

    public function guardarGrupos($idGrupo, $nombreGrupo, $agenteResponsable,$estado) {
    	$q = $this->verificarGrupo($idGrupo, $nombreGrupo, $agenteResponsable);
        if ($q == 1) {
            $dataGrupo = array(
            'NombreGrupo' => $nombreGrupo,
            'IdResponsable' => $agenteResponsable,
            'Estado' => $estado,
            'FechaCreada' => date('Y-m-d')
            );
            $query = $this->db->insert('grupos', $dataGrupo);
            if ($query) {
                //redirect('grupos','refresh');
                echo  "1";
            }
        }
        else if ($q == 0){
            echo "ESTE GRUPO YA EXISTE";
        }else{
            echo "ERROR AL CREAR EL GRUPO";
        }
    }

    public function verificarGrupo($idGrupo, $nombreGrupo,$agenteResponsable) {
        $this->db->where('IdGrupo',$idGrupo);
        $this->db->where('NombreGrupo',$nombreGrupo);
        $this->db->where('IdResponsable',$agenteResponsable);
        $query = $this->db->get('grupos');
        if ($query->num_rows()>0) {
            return 0;
        }else{
            return 1;
        }
    }

    public function listandoVendedoresAct($idGrupo) {
        $i = 0;
        $json = array();
        $query = $this->db->query('SELECT * FROM usuario WHERE Rol ="1" AND ACTIVO = 1');
            if ($query->num_rows()>0) {
                foreach ($query->result_array() as $key) {
                    $json['data'][$i]['IDUSUARIO'] = $key['IdUser'];
                    $json['data'][$i]['RUTA'] = $key['Usuario'];
                    $json['data'][$i]['NOMBRE'] = $key['Nombre'];
                    $i++;
                }
            }
        echo json_encode($json);
    }
}
?>