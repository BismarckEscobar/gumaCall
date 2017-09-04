<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_controller extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        if($this->session->userdata('logged')==0){
            redirect(base_url().'index.php/login','refresh');
        }        
    }
    public function index() {
        $data['dataUsuario'] = $this->usuario_model->cargarUsuarios();
        $data['roles'] = $this->usuario_model->cargarRoles();
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/usuarios/usuarios', $data);
        $this->load->view('footer/footer');
        $this->load->view('jsview/js_usuarios');
    }
    public function agregandoUsuario() {
        $nombreCompleto = $this->input->post('nombreUsuario');
        $nombreUsuario = $this->input->post('usuario');
        $contrasenia = $this->input->post('contrasenia');
        $rol = $this->input->post('tipoUsuario');
        
        $this->usuario_model->guardarUsuario($nombreCompleto, $nombreUsuario, $contrasenia, $rol);
    }    

    public function cambiarEstado($IdUser,$estado) {
        $this->usuario_model->actulizarEstado($IdUser,$estado);
    }
}