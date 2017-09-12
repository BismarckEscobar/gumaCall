<?php 
class Login_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function index(){
        $this->load->view('header/header_login');
        $this->load->view('paginas/login');
        $this->load->view('footer/footer_login');
    }
    public function libro_de_registro($ID,$UserName,$Nombre,$Tiempo_Total,$Fecha_inicio,$Fecha_fin)
    {
        //echo 'CALL SP_accesos ("'.session_id().'","'.date('Y-m-d h:i:s',strtotime($Fecha_inicio)).'","'.date('Y-m-d h:i:s',strtotime($Fecha_fin)).'","'.$Tiempo_Total.'","'.$ID.'","'.$UserName.'","'.$Nombre.'")';
        //$this->db->query('CALL SP_accesos ("'.session_id().'","'.date('Y-m-d h:i:s',strtotime($Fecha_inicio)).'","'.date('Y-m-d h:i:s',strtotime($Fecha_fin)).'","'.$Tiempo_Total.'","'.$ID.'","'.$UserName.'","'.$Nombre.'")');
    }
    public function Guardar_pausa($Fecha_inicio,$Fecha_fin,$tTotal,$ID,$UserName,$Nombre)
    {
        //$this->db->query('CALL SP_pausas ("'.session_id().'","'.date('Y-m-d h:i:s',strtotime($Fecha_inicio)).'","'.date('Y-m-d h:i:s',strtotime($Fecha_fin)).'","'.$tTotal.'","'.$ID.'","'.$UserName.'","'.$Nombre.'")');
    }

    public function login($name, $pass ){
        if($name != FALSE && $pass != FALSE){
            $this->db->where('usuario', $name);
            $this->db->where('contrasenia', MD5($pass));
            $this->db->where('Activo',1);

            $query = $this->db->get('usuario');

            if($query->num_rows() == 1){
                return $query->result_array();
            }
            return 0;
        }
    }
}