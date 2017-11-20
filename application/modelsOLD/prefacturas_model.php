<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 21/03/17
 * Time: 09:22
 */
class Prefacturas_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
    }

    public function dameUno($id='')
    {
        if(!empty($id)){
        return $this->db->select('*')
                        ->from('ficha_hd_prefacturas')
                        ->where('preRegistro',$id)
                        ->where('preEstado',1)
                        ->order_by('preId','desc')
                        ->get()
                        ->result();
        }
    }
    public function dameUnaPref($id)
    {
        return $this->db->select('*')
                        ->from('ficha_hd_prefacturas')
                        ->where('preId',$id)
                        ->where('preEstado',1)
                        ->get()
                        ->result();
    }
    public function dameUltimaPref($id)
    {
        return $this->db->select('*')
                        ->from('ficha_hd_prefacturas')
                        ->where('preRegistro',$id)
                        ->where('preEstado',1)
                        ->order_by('prePrefactura','desc')
                        ->get()
                        ->row();
    }
    public function guardar()
    {
        if(isset($this->preId)){
        $this->db->update('ficha_hd_prefacturas', $this, array('preId' => $this->preId));}
        else{
        $this->db->insert('ficha_hd_prefacturas', $this);}
    }
    
    
    
    public function dameUnoClinica($id='')
    {
        if(!empty($id)){
        return $this->db->select('*')
                        ->from('prefacturas')
                        ->where('prePaciente',$id)
                        ->where('preEstado',1)
                        ->order_by('preId','desc')
                        ->get()
                        ->result();
        }
    }
    public function dameUnaPrefClinica($id)
    {
        return $this->db->select('*')
                        ->from('prefacturas')
                        ->where('preId',$id)
                        ->where('preEstado',1)
                        ->get()
                        ->result();
    }
    public function dameUltimaPrefClinica($id)
    {
        return $this->db->select('*')
                        ->from('prefacturas')
                        ->where('preRegistro',$id)
                        ->where('preEstado',1)
                        ->order_by('prePrefactura','desc')
                        ->get()
                        ->row();
    }
    public function dameNPref($id)
    {
        IF($id==='1'){$this->db->where('preGes',1);}
        IF($id==='2'){$this->db->where('preGes',2);}
        return $this->db->select('*')
                        ->from('prefacturas')
                        ->where('preEstado',1)
                        ->order_by('preNPrefactura','desc')
                        ->get()
                        ->row();
    }
    public function guardarClinica()
    {
        if(isset($this->preId)){
        $this->db->update('prefacturas', $this, array('preId' => $this->preId));}
        else{
        $this->db->insert('prefacturas', $this);}
    }
}