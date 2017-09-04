<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Grupos_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if($this->session->userdata('logged')==0){
            redirect(base_url().'index.php/login','refresh');
            $this->load->model('grupos_model');
        }
    }
    public function index() {    
        $data['agentes'] = $this->grupo_model->listarAgentes();      
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/grupos/grupos', $data);
        $this->load->view('footer/footer');
        $this->load->view('jsview/js_grupos');
    }
    public function nuevoGrupo() {
        $nombreGrupo = $_POST['nombreGrupo'];
        $agenteResponsable = $_POST['agente'];
        $this->grupos_model->guardarGrupos($nombreGrupo, $agenteResponsable);
        redirect('grupos','refresh');
    }
    public function getVendedoresGrupoAct($idGrupo) {
        //$this->grupos_model->getVendedoresGrupoAct($idGrupo);
    }
    public function getVendedoresGrupo($idGrupo) {
        //$this->grupos_model->getVendedoresGrupo($idGrupo);
    }
    public function editarGrupo() {
        //$this->grupos_model->editarGrupo($this->input->post('grupo'));
    }

}
?>