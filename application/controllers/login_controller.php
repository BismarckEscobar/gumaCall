<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('session');
        $this->load->helper('cookie');
    }

    public function index(){
      if($this->session->userdata('logged')==0){
            $this->load->view('header/header_login');
            $this->load->view('login/login');
            $this->load->view('footer/footer_login');
        }else{
            redirect('Main');
        }

    }

    public function Salir(){

            $this->login_model->libro_de_registro(
            $this->session->userdata('id'),
            $this->session->userdata('UserN'),
            $this->session->userdata('UserName'),
            $this->session->userdata('FechaAcceso'),
            date('Y-m-d H:i:s'),
            'OFF');



        $this->session->sess_destroy();
        $sessiondata = array('logged' => 0);
        $this->session->unset_userdata($sessiondata);
        $this->index();
    }

    public function Guardar_pausa()
    {
        $this->login_model->Guardar_pausa(
            $this->input->post('FECHA_INICIO'),
            $this->input->post('FECHA_FIN'),
            $this->session->userdata('id'),
            $this->session->userdata('UserN'),
            $this->session->userdata('UserName'),
            $this->input->post('TIPO')
        );
    }

    public function Acreditar(){
        $this->form_validation->set_rules('txtUsuario', 'nombre', 'required');
        $this->form_validation->set_rules('txtpassword', 'pass', 'required');

        if ($this->form_validation->run()== FALSE){
            redirect('?error=1');
        } else {
            $name = $this->input->get_post('txtUsuario');
            $pass = $this->input->get_post('txtpassword');
            $data['user'] = $this->login_model->login($name, $pass);
            
            if ($data['user'] == 0){
                redirect('?error=2');
            } else {
                $sessiondata = array(
                    'id' => $data['user'][0]['IdUser'],
                    'UserN' => $data['user'][0]['Usuario'],
                    'UserName' => $data['user'][0]['Nombre'],
                    'RolUser'=>$data['user'][0]['Rol'],
                    'FechaAcceso'=>date('Y-m-d H:i:s'),
                    'logged' => 1
                );
                $this->session->set_userdata($sessiondata);

                $this->login_model->libro_de_registro(
                    $this->session->userdata('id'),
                    $this->session->userdata('UserN'),
                    $this->session->userdata('UserName'),
                    $this->session->userdata('FechaAcceso'),
                    date('Y-m-d H:i:s'),
                'IN');

                if($this->session->userdata){
                    redirect('Main');
                }
            }
        }
    }
}