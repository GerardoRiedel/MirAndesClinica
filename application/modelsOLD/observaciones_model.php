<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 24/02/17
 * Time: 13:32
 */
class Observaciones_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
    }
    
    public function dameTodos($id)
    {
        return $this->db->select('comComentario,comId,comUsuario,comFechaRegistro,comRegistro,uspNombre,uspApellidoP,uspApellidoM')
                ->from('comentarios')
                ->join('usuarios_panel','uspId=comUsuario','left')
                ->where('comRegistro',$id)
                ->get()
                ->result();
    }
    public function dameTodosPaciente($paciente)
    {
        return $this->db->select('comComentario,comId,comUsuario,comFechaRegistro,comRegistro,uspNombre,uspApellidoP,uspApellidoM')
                ->from('comentarios')
                ->join('usuarios_panel','uspId=comUsuario','left')
                ->join('ficha_ugh_registro','id=comRegistro','left')
                ->where('paciente',$paciente)
                ->get()
                ->result();
    }
    public function guardar()
    {
        if(isset($this->comId)){
        $this->db->update('comentarios', $this, array('comId' => $this->comId));}
        else{
        $this->db->insert('comentarios', $this);}
    }
}