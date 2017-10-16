<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoreo_controller extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->model("monitoreo_model");
        $this->load->model("login_model");
        $this->load->library('session');
        if($this->session->userdata('logged')==0){
            redirect(base_url().'index.php/login','refresh');
        }        
    }
    public function index() {
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/monitoreo/monitoreo');
        $this->load->view('footer/footer');
        $this->load->view('jsview/js_monitoreo');
    }

    /**
     * @author [César Mejía]
     * @email [analista4.guma@gmail.com]
     * @create date 2017-10-10 11:42:34
     * @modify date 2017-10-10 11:42:34
     * @desc [description]
     */

    public function monitoreoSesion()
    {
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/monitoreo/monitoreoSesion');
        $this->load->view('footer/footer');
       $this->load->view('jsview/js_monitoreo');
    }

    public function ajaxLog(){
        $this->monitoreo_model->listarSesion($_POST['f1'], $_POST['f2']);
    }

    public function forzarCierre()
    {
        $FechaFinal = date('Y-m-d H:i:s');
        $id = $this->input->get_post("id");
        $fechainicio = $this->input->get_post("fecha");
        $Tiempo_Total = $this->monitoreo_model->get_diff($fechainicio, $FechaFinal);
       $this->monitoreo_model->forzarCierre($id, $fechainicio ,$FechaFinal,$Tiempo_Total);
        echo $id." ". $fechainicio ." ".$FechaFinal." ". $Tiempo_Total;
    }
    
}