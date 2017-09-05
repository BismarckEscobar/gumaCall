<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Campania_controller extends CI_Controller
{
 public function __construct(){
        parent::__construct();
        $this->load->library('session');

        if($this->session->userdata('logged')==0){
            redirect(base_url().'index.php/login','refresh');
        }
    }

    public function index() {
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/campanias/campanias');
        $this->load->view('footer/footer');
        $this->load->view('jsview/js_campanias');
    }
    public function detalles_camp(){
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/campanias/detallescamp');
        $this->load->view('footer/footer');
        $this->load->view('jsview/js_campanias');

    }
    public function get_info_cliente(){
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/campanias/infocliente');
        $this->load->view('footer/footer');
        $this->load->view('jsview/js_campanias');

    }
}
?>