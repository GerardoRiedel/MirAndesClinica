<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 20/09/16
 * Time: 09:22
 */
class Comunas_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
    }

    public function dameTodo()
    {
        //$db = $this->load->database('ugh', TRUE);
        return $this->db->select('id, comuna')
                        ->from('ficha_comunas')
                        ->get()
                        ->result();
    }

    
    public function dameUno($comuna)
    {
        //$db = $this->load->database('ugh', TRUE);
        return $this->db->select('id, comuna, padre')
                        ->from('ficha_comunas')
                        ->where('id',$comuna)
                        ->get()
                        ->row();
    }

   
    
}