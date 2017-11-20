<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 20/09/16
 * Time: 09:22
 */
class Isapres_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
        
    }

    public function dameTodo()
    {
        //$db = $this->load->database('ugh', TRUE);
        return $this->db->select('id, isapre')
                        ->from('ficha_isapres')
                        ->get()
                        ->result();
    }

    
}