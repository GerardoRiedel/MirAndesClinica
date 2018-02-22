<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 21/09/16
 * Time: 09:22
 */
class hd_taller_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
    }
    
    public function dameTalleres()
    {
        return $this->db->select('*')
                        ->from('ficha_hd_talleres')
                        ->join('usuarios_panel','uspId=talUsuario','inner')
                        ->where('talEstado !=',5)
                        ->get()
                        ->result();
    }
    public function dameTaller($id)
    {
        return $this->db->select('*')
                        ->from('ficha_hd_talleres')
                        ->join('usuarios_panel','uspId=talUsuario','inner')
                        ->where('talId',$id)
                        ->get()
                        ->row();
    }
    public function damePacientesActivos()
    {
        return $this->db->select('*')
                        ->from('ficha_hd_talleres_pacientes')
                        ->join('ficha_pacientes','id=talPaciente','inner')
                        ->where('talEstado !=',5)
                        ->get()
                        ->result();
    }
    public function dameAsociaciones()
    {
        return $this->db->select('*')
                        ->from('ficha_hd_talleres_asociacion')
                        ->join('ficha_hd_talleres','asoTaller=talId','inner')
                        ->where('asoEstado !=',5)
                        ->get()
                        ->result();
    }
    public function dameAsociacionesPaciente()
    {
        return $this->db->select('*')
                        ->from('ficha_hd_talleres_asopaciente')
                        ->where('talAsoEstado !=',5)
                        ->get()
                        ->result();
    }
    public function guardar()
    {
        if(isset($this->talId)){
        $this->db->update('ficha_hd_talleres', $this, array('talId' => $this->talId));}
        else{
        $this->db->insert('ficha_hd_talleres', $this);}
    }
    public function guardarPaciente()
    {
        if(isset($this->talId)){
        $this->db->update('ficha_hd_talleres_pacientes', $this, array('talId' => $this->talId));}
        else{
        $this->db->insert('ficha_hd_talleres_pacientes', $this);}
    }
    public function guardarAsociacion()
    {
        if(isset($this->asoId)){
        $this->db->update('ficha_hd_talleres_asociacion', $this, array('asoId' => $this->asoId));}
        else{
        $this->db->insert('ficha_hd_talleres_asociacion', $this);}
    }
    public function guardarAsociacionPaciente()
    {
        if(isset($this->talAsoId)){
        $this->db->update('ficha_hd_talleres_asopaciente', $this, array('talAsoId' => $this->talAsoId));}
        else{
        $this->db->insert('ficha_hd_talleres_asopaciente', $this);}
    }
    

    
}