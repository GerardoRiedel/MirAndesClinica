<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 12/10/16
 * Time: 09:22
 */
class Profesionales_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default',true);
        $this->load->model("ingreso_model");
    }

     public function dameTodo()
    {
        //$db = $this->load->database('ugh', TRUE);
        return  $this->db->select('id, nombres,apellidoPaterno, apellidoMaterno,rut')//i.isapre isaNombre, i.id isaId, 
                        ->from('ficha_ugh_profesionales')
                        ->where('activo','si')
                        ->where('activoMirAndes',1)
                        ->order_by('apellidoPaterno','asc')
                        ->get()
                        ->result();
    }
     public function dameTodoHD()
    {
        //$db = $this->load->database('ugh', TRUE);
        return  $this->db->select('id, nombres,apellidoPaterno, apellidoMaterno')//i.isapre isaNombre, i.id isaId, 
                        ->from('ficha_ugh_profesionales')
                        ->where('activo','si')
                        ->order_by('apellidoPaterno','asc')
                        ->get()
                        ->result();
    }
     public function dameTO()
    {
        return  $this->db->select('id, nombre,apePat, apeMat')
                        ->from('ficha_hd_toyps')
                        ->where('profesion',1)
                        ->order_by('apePat','asc')
                        ->get()
                        ->result();
    }
     public function damePS()
    {
        return  $this->db->select('id, nombre,apePat, apeMat')
                        ->from('ficha_hd_toyps')
                        ->where('profesion',2)
                        ->order_by('apePat','asc')
                        ->get()
                        ->result();
    }
     public function dameUno($id)
    {
        //$db = $this->load->database('ugh', TRUE);
        return  $this->db->select('id, nombres,apellidoPaterno, apellidoMaterno,rut,email')//i.isapre isaNombre, i.id isaId, 
                        ->from('ficha_ugh_profesionales')
                        ->where('id',$id)
                        ->get()
                        ->row();
    }
     public function guardar()
    {
        if(isset($this->id)){
        $this->db->update('ficha_ugh_profesionales', $this, array('id' => $this->id));}
        else{
        $this->db->insert('ficha_ugh_profesionales', $this);}
    }
    
    
    
     public function dameUnoControl($id)
    {
        return  $this->db->select('r.fechaIngreso,e.id,e.registro,e.fechaCreacion,e.fechaEdicion,e.evaluacion,e.medicamentos,e.medicamentosSOS,e.tipoReposo,e.autorizacionVisitas,e.autorizacionVisitasSi,e.regimenAlimentario,e.regimenAlimentarioOtro,e.autorizacionLlamadas,e.autorizacionLlamadasSi,e.controlSignosVitales,e.controlSignosVitalesOtro,e.solicitudInterconsulta,e.solicitudInterconsultaSi,e.indicacionesOtro,e.profesionalId,e.profesionalRut,e.profesionalNombre,e.edad,p.rut,r.ingresoMirandes')
                        ->from('ficha_ugh_evaluaciondiaria e')
                        ->join('ficha_ugh_registro r','r.id=e.registro')
                        ->join('ficha_pacientes p','r.paciente=p.id')
                        ->where('e.id',$id)
                        ->order_by('e.id','desc')
                        ->get()
                        ->row();
    }
     public function dameTodosControles($registro)
    {
        return  $this->db->select('r.fechaIngreso,e.id,e.registro,e.fechaCreacion,e.fechaEdicion,e.evaluacion,e.medicamentos,e.medicamentosSOS,e.tipoReposo,e.autorizacionVisitas,e.autorizacionVisitasSi,e.regimenAlimentario,e.regimenAlimentarioOtro,e.autorizacionLlamadas,e.autorizacionLlamadasSi,e.controlSignosVitales,e.controlSignosVitalesOtro,e.solicitudInterconsulta,e.solicitudInterconsultaSi,e.indicacionesOtro,e.profesionalId,e.profesionalRut,e.profesionalNombre,e.edad,p.rut,r.ingresoMirandes')
                        ->from('ficha_ugh_evaluaciondiaria e')
                        ->join('ficha_ugh_registro r','r.id=e.registro')
                        ->join('ficha_pacientes p','r.paciente=p.id')
                        ->where('e.registro',$registro)
                        ->order_by('e.id','desc')
                        ->get()
                        ->result();
    }
    public function dameTodosEvoluciones($registro)
    {
        return  $this->db->select('r.fechaIngreso,e.evoId id,e.evoRegistro registro,e.evoFechaRegistro fechaCreacion,e.evoDia,evoNoche,e.evoVisitas,e.evoTelefono,e.evoSalidas,e.evoCuidador,e.evoAlimentacion, u.uspId ,u.uspRut profesionalRut,CONCAT(u.uspNombre, ,u.uspApellidoP, ,u.uspApellidoM ) profesionalNombre,p.rut')
                        ->from('evoluciones e')
                        ->join('ficha_ugh_registro r','r.id=e.evoRegistro')
                        ->join('ficha_pacientes p','r.paciente=p.id')
                        ->join('usuarios_panel u','u.uspId=e.evoUsuario')
                        ->where('e.evoRegistro',$registro)
                        ->order_by('e.evoId','desc')
                        ->get()
                        ->result();
    }
    public function dameTodosEvaluacion($registro)
    {
        return  $this->db->select('r.fechaIngreso,r.diagnostico,e.enfId id,e.enfRegistro registro,e.enfFechaRegistro fechaCreacion,e.enfHabitos,e.enfTabaco,e.enfAlcohol,e.enfDrogas,e.enfMorbidos,e.enfExamenFisico,e.enfMotivo,e.enfEliminacion,e.enfFarmacos,e.enfPsiquiatrico,e.enfApariencia,e.enfConciencia,e.enfActitud,e.enfConducta,e.enfCognitiva,e.enfAfectividad,e.enfAnimo,e.enfLenguaje,e.enfEstPensamiento,e.enfJuicio,e.enfComentario, g.regNombre,u.uspId ,u.uspRut profesionalRut,CONCAT(u.uspNombre, ,u.uspApellidoP, ,u.uspApellidoM ) profesionalNombre,p.rut,p.ocupacion')
                        ->from('enfermeria e')
                        ->join('ficha_ugh_registro r','r.id=e.enfRegistro')
                        ->join('ficha_pacientes p','r.paciente=p.id')
                        ->join('usuarios_panel u','u.uspId=e.enfUsuario')
                        ->join('regimenes g','g.regId=e.enfRegimen')
                        ->where('e.enfRegistro',$registro)
                        ->order_by('e.enfId','desc')
                        ->get()
                        ->result();
    }
    public function dameTodosEvolucionEnfermeria($registro)
    {
        
        return  $this->db->select('*')
          //return  $this->db->select('r.fechaIngreso,r.diagnostico,e.evoId id,e.evoRegistro registro,e.evoFechaRegistro fechaCreacion,e.evoMorbidos,e.evoExamenFisico,e.evoMotivo,e.evoEliminacion,e.evoFarmacos,e.evoPsiquiatrico,e.evoApariencia,e.evoConciencia,e.evoActitud,e.evoConducta,e.evoCognitiva,e.evoAfectividad,e.evoAnimo,e.evoLenguaje,e.evoEstPensamiento,e.evoJuicio,e.evoComentario, g.regNombre,u.uspId ,u.uspRut profesionalRut,CONCAT(u.uspNombre, ,u.uspApellidoP, ,u.uspApellidoM ) profesionalNombre,p.rut,p.ocupacion')
                        ->from('evoluciones_enfermeria e')
                        ->join('ficha_ugh_registro r','r.id=e.evoEnfRegistro')
                        ->join('ficha_pacientes p','r.paciente=p.id')
                        ->join('usuarios_panel u','u.uspId=e.evoEnfUsuario')
                        //->join('regimenes g','g.regId=e.evoRegimen')
                        ->where('e.evoEnfRegistro',$registro)
                        ->order_by('e.evoEnfId','desc')
                        ->get()
                        ->result();
    }
     public function dameTodosControlesUGH($rut)
    {
        $db = $this->load->database('ugh', TRUE);
        $return = $db->select('r.fechaIngreso,e.id,e.registro,e.fechaCreacion,e.fechaEdicion,e.evaluacion,e.medicamentos,e.medicamentosSOS,e.tipoReposo,e.autorizacionVisitas,e.autorizacionVisitasSi,e.regimenAlimentario,e.regimenAlimentarioOtro,e.autorizacionLlamadas,e.autorizacionLlamadasSi,e.controlSignosVitales,e.controlSignosVitalesOtro,e.solicitudInterconsulta,e.solicitudInterconsultaSi,e.indicacionesOtro,p.rut,r.ingresoMirandes')
                        ->from('ficha_ugh_evaluaciondiaria e')
                        ->join('ficha_ugh_registro r','r.id=e.registro')
                        ->join('ficha_pacientes p','r.paciente=p.id')
                        ->where('p.rut',$rut)
                        ->get()
                        ->result();
        $this->load->database('default',true);
        return $return;
    }
     public function guardarControl()
    {
        //$this->load->database('default',true);
        if(isset($this->id)){
        $this->db->update('ficha_ugh_evaluaciondiaria', $this, array('id' => $this->id));}
        else{
        $this->db->insert('ficha_ugh_evaluaciondiaria', $this);}
    }
     public function dameIdProfesional($rut)
    {
        $db = $this->load->database('ugh', TRUE);
        $return =  $db->select('*')
                        ->from('ficha_ugh_profesionales')
                        ->where('rut',$rut)
                        ->get()
                        ->row();
         $this->load->database('default',true);
         return $return;
    }
}