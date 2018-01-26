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

    public function libro_de_registro($ID,$UserName,$Nombre,$Fecha_inicio,$Fecha_fin,$TIPO)
    {
        if ($TIPO=='IN'){
            $this->db->insert('usuario_registros', array(
                'ID_Usuario' => $ID,
                'session_id' => session_id(),
                'UserName' => $UserName,
                'Nombre' => $Nombre,
                'FechaInicio' => $Fecha_inicio,
                'Tipo' => 'ON',
                'Tipo_de_Usuario' => $this->session->userdata('RolUser')
            ));
        }else{
            $Tiempo_Total = $this->get_diff($Fecha_inicio,$Fecha_fin);
            $this->db->where('session_id', session_id());
            $this->db->where('Tipo', 'ON');
            $this->db->update('usuario_registros', array(
                'FechaFinal' => $Fecha_fin,
                'Tiempo_Total' => $Tiempo_Total
            ));
        }


    }

    private function get_diff($strStart,$strEnd){
        $dteStart = new DateTime($strStart);
        $dteEnd   = new DateTime($strEnd);
        $dteDiff  = $dteStart->diff($dteEnd);
        return $dteDiff->format("%H:%I:%S");
    }
    public function Guardar_pausa($Fecha_inicio,$Fecha_fin,$ID,$UserName,$Nombre,$TIPO)
    {
        if ($TIPO=='PAUSA'){
            $this->db->insert('usuario_registros', array(
                'ID_Usuario' => $ID,
                'session_id' => session_id(),
                'UserName' => $UserName,
                'Nombre' => $Nombre,
                'FechaInicio' => date('Y-m-d H:i:s',strtotime($Fecha_inicio)),
                'Tipo' => 'PAUSA',
                'Tipo_de_Usuario' => $this->session->userdata('RolUser')
            ));
        }else{
            $Tiempo_Total = $this->get_diff($Fecha_inicio,$Fecha_fin);
            $this->db->where('session_id', session_id());
            $this->db->where('Tipo', 'PAUSA');
                $this->db->where('FechaInicio', date('Y-m-d H:i:s',strtotime($Fecha_inicio)));
            $this->db->update('usuario_registros', array(
                'FechaFinal' => date('Y-m-d H:i:s',strtotime($Fecha_fin)),
                'Tiempo_Total' => $Tiempo_Total
            ));
        }
    }

    public function login($name, $pass ){
        if($name != FALSE && $pass != FALSE){
            $this->db->where('usuario', $name);
            $this->db->where('contrasenia', MD5($pass));
            $this->db->where('Activo',1);
            $query = $this->db->get('view_login');

            if($query->num_rows() == 1){
                return $query->result_array();
            }
            return 0;
        }
    }
}