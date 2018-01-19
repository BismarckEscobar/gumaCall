<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CampaniaVistaAdmin_controller extends CI_Controller {
 public function __construct(){
        parent::__construct();
        $this->load->library('session');
        //echo APPPATH.'libraries\Excel\reader.php';
        require_once(APPPATH.'libraries\Excel\reader.php');
        require_once(APPPATH.'libraries\PHPExcel\Classes\PHPExcel.php');
        
        if($this->session->userdata('logged')==0){
            redirect(base_url().'index.php/login','refresh');
        }
    }

    public function listadoCampanias() {
        $data['listaCampanias'] = $this->campaniaVistaAdmin_model->listarCampaniasActivas();
        $data["Clients"] = $this->campaniaVistaAdmin_model->mostrarClientes();
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/campanias/campanias_vista_admin', $data);
        $this->load->view('footer/footer');
        $this->load->view('jsview/js_campanias_vista_admin');
    }

    public function detalle_vista_admin($numCampania) {
        $data['clientes'] = $this->campaniaVistaAdmin_model->listarClientes($numCampania);
        $data['campaniaInfo'] = $this->campaniaVistaAdmin_model->campaniaInfo($numCampania);
        
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/campanias/detallescampVA', $data);
        $this->load->view('footer/footer');
        $this->load->view('jsview/js_campanias_vista_admin');
    }

    public function nuevaCampania() {
        $data['agentes'] = $this->campaniaVistaAdmin_model->listarAgentes();
        $data['catalogoArticulos'] = $this->campaniaVistaAdmin_model->listandoArticulos();
        $data['ultNoCampania'] = $this->campaniaVistaAdmin_model->ultimoNoCampania();
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/campanias/nuevaCampania', $data);
        $this->load->view('footer/footer');
        $this->load->view('jsview/js_campanias_vista_admin');
    }

    public function subirExcelCampanias(){
        $numCampania=$this->input->post('codigoCampania');
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $this->campaniaVistaAdmin_model->guardarCampaniaCliente($objReader->load($_FILES['dataExcel']['tmp_name']), $numCampania);
    }

    public function guardandoData() {
        $this->campaniaVistaAdmin_model->guardandoNuevaCampania($this->input->post('agentes'),$this->input->post('dataCampania'),$this->input->post('articulos'));    
    }

    public function cambiandoEstadoCamp($numCampania, $nuevoEstado) {
        $this->campaniaVistaAdmin_model->actualizandoEstado($numCampania, $nuevoEstado);
    }

    public function graficarMontoReal($idCampania) {
        $this->campaniaVistaAdmin_model->generandoDataGrafica($idCampania);
    }

    public function graficarDiasCampania($idCampania) {
        $this->campaniaVistaAdmin_model->generandoDataGraficaDias($idCampania);
    }

    public function editandoCampania() {
        $this->campaniaVistaAdmin_model->guardandoEdicion($this->input->post('campaniaModificacion'));
    }

    public function cargaAgentes($idCampania) {
        $this->campaniaVistaAdmin_model->listandoAgentes($idCampania);
    }

    public function editarAgentesCamp() {
        $this->campaniaVistaAdmin_model->editarAgentesCamp($this->input->post('nuevosAgentes'), $this->input->post('campania'));
    }

    public function saveClientes()
    {
        $idCampania = $this->input->get_post("idCampaniaclient");
        $idcliente = $this->input->get_post("idclient");
        $meta = $this->input->get_post("metaclient");
        echo $idCampania." ".$idcliente." ".$meta;
        $this->campaniaVistaAdmin_model->saveClientes($idCampania,$idcliente,$meta);
    }

    public function validar($idCampania, $idcliente)
    {
        $this->campaniaVistaAdmin_model->validar($idCampania,$idcliente);
    }
}
?>