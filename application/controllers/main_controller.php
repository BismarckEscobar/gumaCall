<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controller extends CI_Controller
{
 public function __construct(){
        parent::__construct();
        $this->load->library('session');

        if($this->session->userdata('logged')==0){
            redirect(base_url().'index.php/login','refresh');
        }
    }

    public function index() {
        switch ($this->session->userdata('RolUser')) {
            case '0':
                redirect('campaniasVA');
            break;
            case '1':
                redirect('campanias');
            break;
        }
    }
}
?>