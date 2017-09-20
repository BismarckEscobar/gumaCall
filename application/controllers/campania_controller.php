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
        $data['My_camp'] = $this->campanna_model->My_Campannas();
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/campanias/campanias',$data);
        $this->load->view('footer/footer');
        $this->load->view('jsview/js_campanias');

    }
    public function detalles_camp(){
        $id = $this->input->get('C');
        $data['My_camp_Header'] = $this->campanna_model->My_Campannas_Header($id);
        $data['My_camp_Clientes'] = $this->campanna_model->My_Campannas_Clientes($id);
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/campanias/detallescamp',$data);
        $this->load->view('footer/footer');
        $this->load->view('jsview/js_campanias');

    }
    public function get_info_cliente(){
        $CP = $this->input->get('CP');
        $CL = $this->input->get('CL');

        $data['My_camp_Header'] = $this->campanna_model->My_Campannas_Header($CP);
        $data['My_camp_Clientes'] = $this->campanna_model->My_Campannas_Clientes($CP);
        $data['query'] = $this->campanna_model->HstCompra_3M($CL);
        $data['query2'] = $this->campanna_model->Info_Cliente($CL);
        $data['lst_TPF'] = $this->campanna_model->getTPF();



        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/campanias/infocliente',$data);
        $this->load->view('footer/footer');
        $this->load->view('jsview/js_campanias');

    }

    public function guardar_llamada()
    {
        $this->campanna_model->guardar_llamada(
            $this->input->post('num'),
            $this->input->post('Cliente'),
            $this->input->post('Camp'),
            $this->input->post('Monto'),
            $this->input->post('TimeInCall'),
            $this->input->post('Coment'),
            $this->input->post('TPF')
        );

    }
}
?>