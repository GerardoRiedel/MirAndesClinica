<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 27/11/17
 * Time: 09:22
 */
class Hd_historico_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
    }
    public function dameHistorico($paciente)
    { //echo $paciente;
        $query1 = $this->db->select('evaId,evaFechaRegistro,uspNombre,uspApellidoP,evaObservacion,perId,perNombre,perNombreCorto,evaUsuario,evaPaciente')
            //(select usuarioIn from ficha_hd_registro where paciente=evaPaciente limit 1) ')
                                            ->from('ficha_hd_evaluaciones')
                                            //->join('ficha_hd_registro r','r.paciente=evaPaciente')
                                            //->join('ficha_pacientes p','p.id=evaPaciente')
                                            ->join('usuarios_panel','uspId=evaUsuario')
                                            ->join('usuarios_panel_perfiles','uspPerfil=perId')
                                            ->where('evaEstado !=',5)
                                            ->where('evaPaciente',$paciente)
                                            ->get()
                                            ->result();
        $query2 = $this->db->select('uspNombre,uspApellidoP,perId,perNombre,perNombreCorto,usuarioIn as evaUsuario,paciente as evaPaciente,id as evaId, dateIn as  evaFechaRegistro, ("Admisión")  evaObservacion')
                                            ->from('ficha_hd_registro')
                                            ->join('usuarios_panel','uspId=usuarioIn')
                                            ->join('usuarios_panel_perfiles','uspPerfil=perId')
                                            ->where('ficha >',1)
                                            ->where('paciente',$paciente)
                                            ->get()
                                            ->result();
        $query3 = $this->db->select('uspNombre,uspApellidoP,perId,perNombre,perNombreCorto,ingUsuario as evaUsuario,ingPaciente as evaPaciente,ingId as evaId, ingFechaRegistro as  evaFechaRegistro, ("Ingreso a Hospital") evaObservacion')
                                            ->from('ficha_hd_ingresosto')
                                            ->join('usuarios_panel','uspId=ingUsuario')
                                            ->join('usuarios_panel_perfiles','uspPerfil=perId')
                                            ->where('ingEstado !=',5)
                                            ->where('ingPaciente',$paciente)
                                            ->get()
                                            ->result();
        // var_dump($query1);die;
        $query = array_merge($query1, $query2,$query3);
        return  $query;
    }
}