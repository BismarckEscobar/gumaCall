<?php
class Usuario_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }

    public function cargarUsuarios(){/*CARGAR USUARIOS*/
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->order_by('IdUser','asc');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return 0;
        }
    }

    public  function cargarRoles() {
        $this->db->select('tipo');
        $this->db->select('descripcion');
        $this->db->from('roles');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return 0;
        }
    }

    public function guardarUsuario($nombreCompleto, $nombreUsuario, $contrasenia, $rolTipo) {
        $q = $this->verificarUsuario($nombreUsuario,$contrasenia);
        if ($q == 1) {
            $dataUsuario = array(
            'Nombre' => $nombreCompleto,
            'Usuario' => $nombreUsuario,
            'contrasenia' => MD5($contrasenia),
            'Rol' => $rolTipo,
            'Activo' => 1
            );
            $query = $this->db->insert('usuario', $dataUsuario);
            if ($query) {
                redirect('usuarios','refresh');
                echo  "1";
            }
        }
        else if ($q == 0){
            echo "ESTE USUARIO YA ESTA REGISTRADO";
        }else{
            echo "ERROR AL CREAR EL USUARIO";
        }
    }

    public function verificarUsuario($usuario,$contrasenia) {
        $this->db->where('usuario',$usuario);
        $this->db->where('contrasenia',MD5($contrasenia));
        $query = $this->db->get('usuario');
        if ($query->num_rows()>0) {
            return 0;
        }else{
            return 1;
        }
    }
    public function actulizarEstado($IdUsuario,$estado){
        if ($estado==1) {
            $estado=1;
        }else{$estado=0;}
        $data = array(
            'Activo' => $estado,
        );
        $this->db->where('IdUser', $IdUsuario);
        $result=$this->db->update('usuario',$data);
        echo json_encode($result);
    }
}