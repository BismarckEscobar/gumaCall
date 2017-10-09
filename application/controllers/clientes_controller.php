<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class clientes_controller extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');

        require_once(APPPATH.'libraries\Excel\reader.php');
        require_once(APPPATH.'libraries\PHPExcel\Classes\PHPExcel.php'); 

        if($this->session->userdata('logged')==0){ 
            redirect(base_url().'index.php/login','refresh');
        }
    }
    public function index() {
        $data['clientes'] = $this->cliente_model->listarClientes();
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/clientes/clientes', $data);
        $this->load->view('footer/footer');
        $this->load->view('jsview/js_clientes');
    }

    public function agregandoClientes() {
        $dataCliente=array(); $temp=array();
        $tmp = explode('.', $_FILES['dataCliente']['name']);
        
        $file_extension = end($tmp);

        if ($file_extension=="xlsx") {
            $objReader = PHPExcel_IOFactory::createReader('Excel2007');
            
            $objPHPExcel = $objReader->load($_FILES['dataCliente']['tmp_name']);
            
            foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
                $arrayData[$worksheet->getTitle()] = $worksheet->toArray();
                for ($i=0; $i < count($worksheet->toArray()); $i++) {
                    if ($i>0) {
                        $dataCliente[$i]['ID_Cliente'] = $worksheet->toArray()[$i][0];;
                        $dataCliente[$i]['Nombre'] = $worksheet->toArray()[$i][1];
                        $dataCliente[$i]['Direccion'] = $worksheet->toArray()[$i][2];
                        $dataCliente[$i]['Telefono1'] = $worksheet->toArray()[$i][3];
                        $dataCliente[$i]['Telefono2'] = $worksheet->toArray()[$i][4];
                        $dataCliente[$i]['Telefono3'] = $worksheet->toArray()[$i][5];
                        $dataCliente[$i]['Vendedor'] = $worksheet->toArray()[$i][6];
                    }
                }                        
            }
            $this->cliente_model->guardarDataCliente($dataCliente, 1);
        }else if ($file_extension=="xls") {
            $data = new Spreadsheet_Excel_Reader();
            $data->setOutputEncoding('CP-1251');
            $data->read($_FILES["dataCliente"]['tmp_name']);
            error_reporting(E_ALL ^ E_NOTICE);

            for ($i=0; $i <= count($data->sheets[0]['cells']); $i++) {

            $Cuenta = (@ereg_replace("[^0-9]", "", $data->sheets[0]['cells'][$i][1]));
                if ($Cuenta<>0){
                    $dataCliente[$i]['ID_Cliente'] = $data->sheets[0]['cells'][$i][0];
                    $dataCliente[$i]['Nombre']  = $data->sheets[0]['cells'][$i][1];
                    $dataCliente[$i]['Direccion'] = $data->sheets[0]['cells'][$i][2];
                    $dataCliente[$i]['Telefono1'] = $data->sheets[0]['cells'][$i][3];
                    $dataCliente[$i]['Telefono2'] = $data->sheets[0]['cells'][$i][4];
                    $dataCliente[$i]['Telefono3'] = $data->sheets[0]['cells'][$i][5];
                    $dataCliente[$i]['Vendedor'] = $data->sheets[0]['cells'][$i][6];
                }                
            }
            $this->cliente_model->guardarDataCliente($dataCliente, 2);
        } 
    }
}
?>