<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 20/09/16
 * Time: 09:22
 */
class listaDeposito_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
    }
    public function guardar()
    {
        if(isset($this->lisDepId)){
        $this->db->update('lista_depositos', $this, array('lisDepId' => $this->lisDepId));}
        else{
        $this->db->insert('lista_depositos', $this);}
    }
    public function dameUnoUsuario($usuario)
    {
        return $this->db->distinct()
                        ->select('depRendicion,ctaId,ctaNombre,ctaApellido,ctaApellidoM,ctaFicha,ctaRegistro,b.banNombre,ctaNumero,ctaRut,ctaRutPaciente,ctaNomPaciente,ctaEmail,depId,depFicha,depTipo,depFechaRegistro,tipNombre,depConNombre,depSuma,depSerie,d.banNombre depBanNombre,depEstado')
                        ->from('cuentas_pacientes')
                        ->join('bancos b','banId=ctaBanco','left')
                        ->join('tipos_cuenta','tipId=ctaTipo','left')
                        ->join('depositos','ctaRegistro=depFichaElectro','left')
                        ->join('depositos_conceptos','depConcepto=depConId','left')
                        ->join('bancos d','d.banId=depBanco','left')
                        ->join('rendiciones r','depRendicion=r.renNumero','left')
                        ->join('lista_depositos l','depId=l.lisDepDeposito','left')
                        ->where('lisDepUsuario',$usuario)
                        ->get()
                        ->result();
    }
    public function eliminar()
    {
        $this->db->where('lisDepDeposito', $this->lisDepDeposito);
        $this->db->delete('lista_depositos');
    }
    public function eliminarUser()
    {
        $this->db->where('lisDepUsuario', $this->lisDepUsuario);
        $this->db->delete('lista_depositos');
    }
}