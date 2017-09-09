<?php
class Campanna_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }

    public function getTPF(){
    	$this->db->where('Activa',1);
        $query = $this->db->get('Campanna_Tipificacion');

        if($query->num_rows() > 0){
        	return $query->result_array();
        }
        return 0;
    }
}