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
        $query1 = $this->db->select('evaId,evaRegistro registro,evaFechaRegistro,uspNombre,uspApellidoP,evaObservacion,perId,perNombre,perNombreCorto,evaUsuario,evaPaciente,("Intervensión")  evaProceso')
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
        $query2 = $this->db->select('uspNombre,uspApellidoP,perId,perNombre,perNombreCorto,id registro,usuarioIn as evaUsuario,paciente as evaPaciente,id as evaId, dateIn as  evaFechaRegistro, ("Admisión")  evaProceso, ("")  evaObservacion')
                                            ->from('ficha_hd_registro')
                                            ->join('usuarios_panel','uspId=usuarioIn')
                                            ->join('usuarios_panel_perfiles','uspPerfil=perId')
                                            ->where('ficha >',1)
                                            ->where('paciente',$paciente)
                                            ->get()
                                            ->result();
        $query3 = $this->db->select('uspNombre,uspApellidoP,perId,perNombre,perNombreCorto,ingRegistro registro,ingUsuario as evaUsuario,ingPaciente as evaPaciente,ingId as evaId, ingFechaRegistro as  evaFechaRegistro, ("")  evaObservacion, ("Ingreso a Hospital") evaProceso, ingAntGenerales,ingAntSalud,ingInfFamiliar,ingConsideraciones')
                                            ->from('ficha_hd_ingresosto')
                                            ->join('usuarios_panel','uspId=ingUsuario')
                                            ->join('usuarios_panel_perfiles','uspPerfil=perId')
                                            ->where('ingEstado !=',5)
                                            ->where('ingPaciente',$paciente)
                                            ->get()
                                            ->result();
        $query4 = $this->db->select('uspNombre,uspApellidoP,perId,perNombre,perNombreCorto,enfRegistro registro,enfUsuario as evaUsuario,enfPaciente as evaPaciente,enfId as evaId, enfFechaRegistro as  evaFechaRegistro, ("")  evaObservacion, ("Ingreso Enfermeria") evaProceso')
                                            ->from('ficha_hd_enfermeria')
                                            ->join('usuarios_panel','uspId=enfUsuario')
                                            ->join('usuarios_panel_perfiles','uspPerfil=perId')
                                            //->where('ingEstado !=',5)
                                            ->where('enfPaciente',$paciente)
                                            ->get()
                                            ->result();
        $query5 = $this->db->select('uspNombre,uspApellidoP,perId,perNombre,perNombreCorto,registro,usuario,paciente as evaPaciente,id as evaId,fechaCreacion as evaFechaRegistro,evaluacion,indicacionesOtro as indicaciones,medicamentos,("medico")  evaObservacion, ("Evolución Médica") evaProceso')
                                            ->from('ficha_hd_evaluacionmedica')
                                            ->join('usuarios_panel','uspId=usuario')
                                            ->join('usuarios_panel_perfiles','uspPerfil=perId')
                                            //->where('ingEstado !=',5)
                                            ->where('paciente',$paciente)
                                            ->get()
                                            ->result();
        // var_dump($query1);die;
        $query = array_merge($query1, $query2,$query3,$query4,$query5);
        return  $query;
    }
}