<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 19/10/16
 * Time: 09:22
 */
class Licencias_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
    }
    public function dameTodo()
    {
        return $this->db->select('licId,licNumero,licDesde,licDias,licHasta,licNombre,licApePat,licApeMat,licRut')
                        ->from('licencias')
                        ->order_by('licHasta','desc')
                        ->get()
                        ->result();
    }
    public function dameUltimo($id)
    {
        return $this->db->select('licId,licNumero,licDesde,licDias')
                        ->from('licencias')
                        ->where('licRegistro',$id)
                        ->order_by('licId','desc')
                        ->get()
                        ->row();
    }
    public function dameDatosPorRut($rut)
    {
        return $this->db->select('licRut,licNombre,licApePat,licApeMat,licRegistro,licNumero,licDesde,licHasta,licDias')
                        ->from('licencias')
                        ->where('licRut',$rut)
                        ->order_by('licId','desc')
                        ->get()
                        ->row();
    }
    public function dameDatosPorPaciente($paciente)
    {
        return $this->db->select('licRut,licNombre,licApePat,licApeMat,licRegistro,licNumero,licDesde,licHasta,licDias')
                        ->from('licencias')
                        ->where('licPaciente',$paciente)
                        ->order_by('licId','desc')
                        ->get()
                        ->result();
    }
    public function guardar()
    {
        if(isset($this->licId)){
        $this->db->update('licencias', $this, array('licId' => $this->licId));}
        else{
        $this->db->insert('licencias', $this);}
    }
    public function dameLicenciasPorVencer()
    {
        $min = date('Y-m-d',strtotime ( '+2 day' ));
        $max = date('Y-m-d',strtotime ( '-1 day' ));
        return  $this->db->select('licId,licNumero,licDesde,licDias,licHasta,licNombre,licApePat,licApeMat,licRut')
                        ->from('licencias')
                        ->where('licHasta <= "'.$min.'"')
                        ->where('licEstado',1)
                        ->where('licHasta >= "'.$max.'"')
                        ->where('licHD',0)
                        ->order_by('licId','desc')
                        //->group_by('licRegistro','desc')
                        ->get()
                        ->result();
    }
    public function dameLicenciasHD($paciente)
    {
        return $this->db->select('licId,licCentro,licRut,licNombre,licApePat,licApeMat,licRegistro,licNumero,licDesde,licHasta,licDias,nombres licMedNombre,apellidoPaterno licMedApePat,apellidoMaterno licMedApeMat,licMedNombre nombreMedico')
                        ->from('licencias')
                        ->join('ficha_ugh_profesionales','id=licMedId','left')
                        ->where('licPaciente',$paciente)
                        ->where('licHD',1)
                        ->order_by('licId','desc')
                        ->get()
                        ->result();
    }
}