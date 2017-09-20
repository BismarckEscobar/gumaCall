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
            'FechaCreada' => date('Y-m-d H:i:s')
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
        $i=0;
        $json = array();
        $query = $this->sqlsrv->fetchArray('SELECT * FROM vtVS2_Vendedor', SQLSRV_FETCH_ASSOC);

        if (count($query)>0) {
            foreach ($query as $key) {
                $validador = $this->db->query('SELECT * FROM grupo_asignacion WHERE idGrupo='.$idGrupo.' AND Vendedor="'.$key['VENDEDOR'].'"');
                if ($validador->num_rows()==0) {
                    $json['data'][$i]['RUTA'] = $key['VENDEDOR'];
                    $json['data'][$i]['NOMBRE'] = $key['NOMBRE'];
                    $i++;
                }
            }
        }
        echo json_encode($json);
        $this->sqlsrv->close();
    }

    public function listandoVendedoresAgregados($idGrupo) {
        $i = 0;
        $json = array();
        $query = $this->sqlsrv->fetchArray('SELECT * FROM vtVS2_Vendedor', SQLSRV_FETCH_ASSOC);

        if (count($query)>0) {
            foreach ($query as $key) {
                $validador = $this->db->query('SELECT * FROM grupo_asignacion WHERE idGrupo='.$idGrupo.' AND Vendedor="'.$key['VENDEDOR'].'"');
                if ($validador->num_rows()!=0) {
                    $json['data'][$i]['VENDEDOR'] = $key['VENDEDOR'];
                    $json['data'][$i]['NOMBRE'] = $key['NOMBRE'];
                    $i++;
                }
            }
        }
        echo json_encode($json);
        $this->sqlsrv->close();
    }

    public function guardarInfoGrupo($dataGrupo) {
        $datos = explode(",", $dataGrupo[0]);
        $this->db->where('IdGrupo',$datos[0]);
        $this->db->delete('grupo_asignacion');
        for ($i = 0; $i <count($dataGrupo); $i++) {
            $datos = explode(",", $dataGrupo[$i]);
            if ($datos[1]) {            
                $data = array(
                    'IdGrupo' => $datos[0],
                    'Vendedor' => (string)$datos[1],
                    'fechaCreacion' => date("Y-m-d"),
                    'ID_User' => 1                          
                );
                $query = $this->db->insert('grupo_asignacion',$data);                
            }
        }
        echo json_encode($query);
    }

    public function actualizarInfoGrupo($idGrupo,$nombreGrupo,$responsable,$estado) {        
        if ($estado!=true) {
            $estado=0;
        }
        if ($responsable=="") {
            $data=array(
                'NombreGrupo'=>$nombreGrupo,
                'Estado'=>$estado
            );
        }else {
            $data=array(
                'NombreGrupo'=>$nombreGrupo,
                'IdResponsable'=>$responsable,
                'Estado'=>$estado
            );
        }
        $this->db->where('IdGrupo', $idGrupo);
        $result=$this->db->update('grupos', $data);
    }
}
?>