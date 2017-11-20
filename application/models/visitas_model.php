<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 07/02/17
 * Time: 14:22
 */
class Visitas_model extends CI_Model
{
    public function dameUltimo()
    {
        return $this->db->select('*')
                        ->from('visitas')
                        ->order_by('visId','desc')
                        ->get()
                        ->row();
    }
    
    public function guardar()
    {
        if(isset($this->visId)){
        $this->db->update('visitas', $this, array('visId' => $this->visId));}
        else{
        $this->db->insert('visitas', $this);}
        
        
    }
}