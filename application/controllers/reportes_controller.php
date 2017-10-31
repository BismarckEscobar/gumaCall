<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('MPDF/mpdf');
        $this->load->library('session');
        if($this->session->userdata('logged')==0){
            redirect(base_url().'index.php/login','refresh');
        }        
    }
    public function index() {
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/reportes/reportes');
        $this->load->view('footer/footer');
        $this->load->view('jsview/js_reportes');
    }

    public function tipoReporte($tipoReporte) {
        $data['dataRpt'] = $this->reportes_model->listarOpciones($tipoReporte);
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/reportes/reporteDetalle', $data);
        $this->load->view('footer/footer');
        $this->load->view('jsview/js_reportes');
    }

    public function generarReporte() {
        $this->reportes_model->generandoReporte($this->input->post('data'));
    }

    public function filtrarPorCampanias() {
        echo json_encode($this->reportes_model->listarOpciones('rptcampania'));
    }

    public function filtrarPorClientes() {
        echo json_encode($this->reportes_model->listarOpciones('rptclientes'));
    }
    public function rpt2() {
        $this->reportes_model->rpt2();
    }
    

    public function generarReportePDF() {
        $tipo=$_GET['tipo'];
        $id=$_GET['id'];
        $d1=$_GET['f1'];
        $d2=$_GET['f2'];
        $nc=$_GET['nc'];
        $cl=$_GET['cl'];
        
        if ($tipo=='rptcampania') {
            $tipo=1;
            $data_['tipoReporte'] = 'rpt_campania';
        }elseif ($tipo=='rptagentes') {      
            $tipo=2;
            $data_['tipoReporte'] = 'rpt_agente';
        }elseif ($tipo=='rptclientes') {
            $tipo=3;
            $data_['tipoReporte'] = 'rpt_cliente';
        }elseif ($tipo=='rptllamadas') {
            $tipo=4;
            $data_['tipoReporte'] = 'rpt_llamadas';
            $data_['fechas'] = 'Del '.date('d/m/Y', strtotime($d1)).' al '.date('d/m/Y', strtotime($d2));
        }elseif ($tipo=='rptregllamadas') {
            $tipo=5;
            $data_['tipoReporte'] = 'rpt_regLlamadas';
            $data_['fechas'] = 'Del '.date('d/m/Y', strtotime($d1)).' al '.date('d/m/Y', strtotime($d2));
        }

        $data_['data_reporte'] =  $this->reportes_model->generandoPDF($id, $tipo, $d1, $d2, $nc, $cl);
        $PdfCliente = new mPDF('utf-8','A4');
        $PdfCliente->SetFooter("Página {PAGENO} de {nb}");
        $PdfCliente -> writeHTML($this->load->view('pages/reportes/reportePDF', $data_, true));
        $PdfCliente->Output();
        //$this->load->view('pages/reportes/reportePDF', $data_);
    }
}