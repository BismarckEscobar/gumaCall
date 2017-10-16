<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tipificaciones_controller extends CI_Controller {
 
	public function __construct(){
		parent::__construct();
		$this->load->library('session');

		if($this->session->userdata('logged')==0){
		redirect(base_url().'index.php/login','refresh');
		}
	}

	public function index() {
		$data['tipificaciones'] = $this->tipificacion_model->listarTipificaciones();
        $this->load->view('header/header');
        $this->load->view('pages/menu');
        $this->load->view('pages/tipificaciones/tipificaciones', $data);
        $this->load->view('footer/footer');
        $this->load->view('jsview/js_tipificaciones');
	}

	public function guardarTipificacion() {
		$comentario = "";
		if ($this->input->post('comentarioTipificacion')=="") {
			$comentario = "Ninguno";
		}else {
			$comentario = $this->input->post('comentarioTipificacion');
		}
		$data = array(
			'Tipificacion' => $this->input->post('nombreTipificacion'),
			'Fecha_TPF' => date('Y-m-d H:i:s'),
			'Activa' => 1
		);
		$this->tipificacion_model->guardandoTipificacion($data);
	}

	public function cambiarEstado($idTipificacion, $estado) {
		$this->tipificacion_model->actulizarEstado($idTipificacion,$estado);
	}
}
?>