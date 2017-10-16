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

    public function generarReporte($identificador, $tipoRpt) {
        $this->reportes_model->generandoReporte($identificador, $tipoRpt);
    }

    public function generarReportePDF($tipo, $data) {
       $data_['data_campania'] =  $this->reportes_model->generandoReporte($data, 1);        
        $PdfCliente = new mPDF('utf-8','A4');
        $PdfCliente->SetFooter("Página {PAGENO} de {nb}");
        $PdfCliente -> writeHTML($this->load->view('pages/reportes/reportePDF', $data_, true));
        $PdfCliente->Output();
        //$this->load->view('pages/reportes/reportePDF', $data_);     
    }
}