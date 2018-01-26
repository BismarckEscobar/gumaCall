<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class clientes_controller extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');

        require_once(APPPATH.'libraries\PHPExcel\Classes\PHPExcel.php'); 

        if($this->session->userdata('logged')==0){ 
            redirect(base_url().'index.php/login','refresh');
        }
    }
    public function index() {
        $data['clientes'] = $this->cliente_model->listarClientes();
        $data['rutas'] = $this->cliente_model->listandoRutas();
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/clientes/clientes', $data);
        $this->load->view('footer/footer');
        $this->load->view('jsview/js_clientes');
    }

    public function agregandoClientes() {      
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $this->cliente_model->guardarDataCliente($objReader->load($_FILES['dataCliente']['tmp_name']));
    }

    public function editarRegCliente() {
        $this->cliente_model->editarRegcliente(
            $this->input->post('Tipo'),
            $this->input->post('ID_Cliente'),
            $this->input->post('RUC'),
            $this->input->post('Nombre'),
            $this->input->post('Direccion'),
            $this->input->post('Telefono1'),
            $this->input->post('Telefono2'),
            $this->input->post('Telefono3'),
            $this->input->post('Vendedor')
        );
    }

    public function listandoClientes() {
        $this->cliente_model->listandoClientesCampania();
    }
}
?>