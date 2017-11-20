<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 13/02/17
 * Time: 09:22
 */
class Tecs_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
    }

    public function dameTodo()
    {
        return $this->db->select('*')
                        ->from('tecs')
                        ->join('ficha_pacientes p','p.id=tecPaciente','left')
                        ->where('tecFicha >',0)
                        ->get()
                        ->result();
    }
   public function dameUno($id)
    {
       // $db = $this->load->database('ugh', TRUE);
        return $this->db->select('t.tecId, t.tecUsuario, t.tecFechaRegistro, t.tecFechaIngreso, t.tecFechaIngreso fechaIngreso, t.tecIsapre, t.tecComentario,t.tecSessiones, t.tecDiagnostico, t.tecFicha, t.tecFicha ficha, t.tecGes, t.tecModalidad, t.tecPaciente, t.tecComuna, t.tecEmergenciaDerivar, t.tecRutTitular, t.tecMedicoAsignado,m.nombres nombresmedicoAsignado,m.apellidoPaterno apellidomedicoAsignado,m.apellidoMaterno apellidoMmedicoAsignado,m.rut rutmedico,m.email emailmedico, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.rut, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion, p.nacionalidad, p.alergia, c.id comId, c.comuna, i.isapre isapreNombre')
                    ->from('tecs t')
                    ->join('ficha_pacientes p','p.id=t.tecPaciente','left')
                    ->join('ficha_comunas c','p.comuna=c.id','left')
                    ->join('ficha_isapres i','t.tecIsapre=i.id','left')
                    ->join('ficha_ugh_profesionales m','m.id=t.tecMedicoAsignado','left')
                    ->join('apoderados a','a.apoFichaElectronica=tecId','left')
                    ->where('t.tecId',$id)
                    ->order_by('t.tecId','desc')
                    ->get()
                    ->row();
        
    }
    public function dameTecFicha($paciente)
    {
        //$db = $this->load->database('ugh', TRUE);
        $ficha = $this->db->select('tecId, tecFicha')
                    ->from('tecs')
                    ->where('tecPaciente',$paciente)
                    ->where('tecFicha >=',0)
                    ->order_by('tecFicha','desc')
                    ->get()
                    ->row();
        IF (empty($ficha->tecId)){
            $nvaFicha = $this->db->select('tecId, tecFicha')
                                ->from('tecs')
                                ->order_by('tecFicha','desc')
                                ->limit(1)
                                ->get()
                                ->row();
            
            $n = $nvaFicha->tecFicha;
            $nn= $nvaFicha->tecFicha-10;
            
            FOR($i = $nn;$i <= $n; $i++){
              
                $checkFicha = $this->db->select('tecId, tecFicha')
                                       ->from('tecs')
                                       ->where('tecFicha',$i)
                                       ->get()
                                       ->row();
                IF(empty($checkFicha)){$ficha = $i;}
            }
            IF(empty($ficha)){$ficha = $nvaFicha->tecFicha+1;}
            
        }
        ELSE {
            $ficha = $ficha->tecFicha;
        }
        return $ficha;
    }
    public function dameUnoPorRut($rut)
    {
       // $db = $this->load->database('ugh', TRUE);
         $fichaTec = $this->db->select('t.tecId, t.tecUsuario, t.tecFechaRegistro, t.tecFechaIngreso, t.tecIsapre, t.tecComentario, t.tecDiagnostico, t.tecFicha, t.tecGes, t.tecModalidad, t.tecPaciente, t.tecComuna, t.tecEmergenciaDerivar, t.tecRutTitular, t.tecMedicoAsignado,m.nombres nombresmedicoAsignado,m.apellidoPaterno apellidomedicoAsignado,m.apellidoMaterno apellidoMmedicoAsignado,m.rut rutmedico,m.email emailmedico, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.rut, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion, p.nacionalidad, p.alergia, c.id comId, c.comuna, i.isapre isapreNombre')
                    ->from('tecs t')
                    ->join('ficha_pacientes p','p.id=t.tecPaciente','left')
                    ->join('ficha_comunas c','p.comuna=c.id','left')
                    ->join('ficha_isapres i','t.tecIsapre=i.id','left')
                    ->join('ficha_ugh_profesionales m','m.id=t.tecMedicoAsignado','left')
                    ->where('p.rut',$rut)
                    ->order_by('t.tecId','desc')
                    ->get()
                    ->row();
        
        IF(empty($fichaTec)){
            
         $fichaTec = $this->db->select(' r.ges, r.emergenciaDerivar tecEmergenciaDerivar, r.fechaIngreso, r.horaIngreso, r.fechaSalidaReal, r.horaSalidaReal, r.fechaAltaEpicrisis, r.fechaAltaInformada, r.id tecId, r.ficha tecFicha, r.paciente, r.regimen, r.dateIn, r.isapre tecIsapre, r.rutTitular, r.diagnosticoDerivacion, r.diagnostico tecDiagnostico, r.comentario tecComentario, r.medicoAsignado,m.nombres nombresmedicoAsignado,m.apellidoPaterno apellidomedicoAsignado,m.apellidoMaterno apellidoMmedicoAsignado,m.rut rutmedico,m.email emailmedico, r.nombresMedicoSolicitante, r.apellidoPaternoMedicoSolicitante, r.apellidoMaternoMedicoSolicitante, r.edadPaciente, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.rut, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion, p.nacionalidad, p.alergia, c.id comId, c.comuna, i.isapre isapreNombre')
                    ->from('ficha_ugh_registro r')
                    ->join('ficha_pacientes p','p.id=r.paciente','left')
                    ->join('ficha_comunas c','p.comuna=c.id','left')
                    ->join('ficha_isapres i','r.isapre=i.id','left')
                    ->join('ficha_ugh_solicitudhospitalizacion s','r.id=s.registro','left')
                    ->join('ficha_ugh_profesionales m','m.id=r.medicoAsignado','left')
                    ->join('licencias l','l.licRegistro=r.id','left')
                    ->where('p.rut',$rut)
                    ->order_by('r.id','desc')
                    ->get()
                    ->row();
        }
        return $fichaTec;
    }
    
    public function dameIdFicha($paciente)
    {
        //$db = $this->load->database('ugh', TRUE);
        return $this->db->select('tecId')
                    ->from('tecs')
                    ->where('tecPaciente',$paciente)
                    ->order_by('tecId','desc')
                    ->get()
                    ->row();
    }
    public function dameIdFichaHoy($paciente)
    {
        $hoy = date('Y-m-d').' 00:00:00';
        return $this->db->select('tecId')
                    ->from('tecs')
                    ->where('tecPaciente',$paciente)
                    ->where('tecFechaRegistro >=',$hoy)
                    ->get()
                    ->row();
        
    }
    
    public function guardar()
    {
        if(isset($this->tecId)){
        $this->db->update('tecs', $this, array('tecId' => $this->tecId));}
        else{
        $this->db->insert('tecs', $this);}
    }
    public function guardarSession()
    {
        if(isset($this->tecSesId)){
        $this->db->update('tecs_sessiones', $this, array('tecSesId' => $this->tecSesId));}
        else{
        $this->db->insert('tecs_sessiones', $this);}
    }
    public function depositos_conceptos_tec()
    {
        return $this->db->select('*')
                        ->from('depositos_conceptos_tec')
                        ->get()
                        ->result();
    }
    
    public function dameSessiones()
    {
        return $this->db->select('d.depId,b.banNombre,d.depCuenta,d.depSerie,d.depSuma,d.depTipo,d.depConcepto,d.depFicha,d.depFechaRegistro,d.depEstado,c.depConTecNombre depConNombre,p.rut rutPaciente,p.nombres,p.apellidoPaterno,p.apellidoMaterno,p.fechaNacimiento,t.tecDiagnostico,t.tecModalidad,t.tecGes,t.tecSessiones,s.tecSesFechaRegistro,s.tecSesCalculo')
                        ->from('tecs_sessiones s')
                        ->join('tecs t','t.tecId=s.tecSesTecId','left')
                        ->join('depositos_tec d','t.tecId=d.depFichaElectro','left')
                        ->join('bancos b','b.banId=d.depBanco','left')
                        ->join('depositos_conceptos_tec c','c.depConTecId=d.depConcepto','left')
                        ->join('ficha_pacientes p','p.id=t.tecPaciente')
                        //->where('d.depFichaElectro',$ficha)
                        ->where('d.depEstado != "5"')
                        ->order_by('d.depId','desc')
                        ->get()
                        ->result();
    }
    public function dameSessionesMes()
    {
        $GESH = $this->db->select('count(t.tecId)tec,count(s.tecSesId)sessiones,Year(tecSesFechaRegistro) as ano,MONTH(tecSesFechaRegistro) as mes')
                        ->from('tecs_sessiones s')
                        ->join('tecs t','t.tecId = s.tecSesTecId','left')
                        ->join('ficha_pacientes p','p.id = t.tecPaciente','left')
                        ->where('t.tecGes',1)
                        ->where('t.tecModalidad',1)
                        ->order_by('mes','asc')
                        ->group_by('ano,mes')
                        ->get()
                        ->result();
        $GESA = $this->db->select('count(t.tecId)tec,count(s.tecSesId)sessiones,Year(tecSesFechaRegistro) as ano,MONTH(tecSesFechaRegistro) as mes')
                        ->from('tecs_sessiones s')
                        ->join('tecs t','t.tecId=s.tecSesTecId','left')
                        ->join('ficha_pacientes p','p.id=t.tecPaciente','left')
                        ->where('t.tecGes',1)
                        ->where('t.tecModalidad',2)
                        ->order_by('mes','asc')
                        ->group_by('ano,mes')
                        ->get()
                        ->result();
        $LEH = $this->db->select('count(t.tecId)tec,count(s.tecSesId)sessiones,Year(tecSesFechaRegistro) as ano,MONTH(tecSesFechaRegistro) as mes')
                        ->from('tecs_sessiones s')
                        ->join('tecs t','t.tecId=s.tecSesTecId','left')
                        ->join('ficha_pacientes p','p.id=t.tecPaciente','left')
                        ->where('t.tecGes',2)
                        ->where('t.tecModalidad',1)
                        ->order_by('mes','asc')
                        ->group_by('ano,mes')
                        ->get()
                        ->result();
        $LEA = $this->db->select('count(t.tecId)tec,count(s.tecSesId)sessiones,Year(tecSesFechaRegistro) as ano,MONTH(tecSesFechaRegistro) as mes')
                        ->from('tecs_sessiones s')
                        ->join('tecs t','t.tecId=s.tecSesTecId','left')
                        ->join('ficha_pacientes p','p.id=t.tecPaciente','left')
                        ->where('t.tecGes',2)
                        ->where('t.tecModalidad',2)
                        ->order_by('mes','asc')
                        ->group_by('ano,mes')
                        ->get()
                        ->result();
        $MES = $this->db->select('Year(tecSesFechaRegistro) as ano,MONTH(tecSesFechaRegistro) as mes')
                        ->from('tecs_sessiones s')
                        ->join('tecs t','t.tecId=s.tecSesTecId','left')
                        ->join('ficha_pacientes p','p.id=t.tecPaciente','left')
                        ->order_by('mes','asc')
                        ->group_by('ano,mes')
                        ->get()
                        ->result();
        
        $arr[] = $GESH;
        $arr[] = $GESA;
        $arr[] = $LEH;
        $arr[] = $LEA;
        $arr[] = $MES;
        return $arr;
    }
    public function dameSessionesId($tecId)
    {
        return $this->db->select('s.tecSesId,s.tecSesMedico,count(tecSesId)suma, p.rut rutPaciente,p.nombres,p.apellidoPaterno,p.apellidoMaterno,p.fechaNacimiento,t.tecDiagnostico,t.tecModalidad,t.tecGes,t.tecSessiones,s.tecSesFechaRegistro,s.tecSesCalculo,t.tecId,t.tecFechaRegistro')
                        ->from('tecs_sessiones s')
                        ->join('tecs t','t.tecId=s.tecSesTecId')
                        //->join('depositos_tec d','t.tecId=d.depFichaElectro','left')
                        
                        //->join('bancos b','b.banId=d.depBanco','left')
                        //->join('depositos_conceptos_tec c','c.depConTecId=d.depConcepto','left')
                        ->join('ficha_pacientes p','p.id=t.tecPaciente')
                        ->where('s.tecSesTecId',$tecId)
                        //->where('d.depEstado != "5"')
                        //->order_by('d.depId','desc')
                        ->get()
                        ->result();
    }
    public function dameListaSessiones($tecId)
    {
        return $this->db->select('s.tecSesTecId,s.tecSesId,s.tecSesMedico,s.tecSesFechaRegistro,nombres medNombre,apellidoPaterno medApePat,apellidoMaterno medApeMat')
                        ->from('tecs_sessiones s')
                        ->join('tecs t','t.tecId=s.tecSesTecId','left')
                        ->join('ficha_ugh_profesionales p','p.id=s.tecSesMedico','left')
                        //->join('depositos_tec d','t.tecId=d.depFichaElectro','left')
                        //->join('bancos b','b.banId=d.depBanco','left')
                        //->join('depositos_conceptos_tec c','c.depConTecId=d.depConcepto','left')
                        //->join('ficha_pacientes p','p.id=t.tecPaciente','left')
                        ->where('s.tecSesTecId',$tecId)
                        //->where('d.depEstado != "5"')
                        //->order_by('d.depId','desc')
                        ->get()
                        ->result();
        //die(var_dump($return));
    }
    public function dameSessionesIdParaMostrar($tecId)
    {
        return $this->db->select('s.tecSesId,s.tecSesFechaRegistro,s.tecSesCalculo')
                        ->from('tecs_sessiones s')
                        ->where('s.tecSesTecId',$tecId)
                        ->get()
                        ->result();
    }
    
    
    // public function dameInsumos()
    //{
    //    return $this->db->select('*')
    //                ->from('insumos')
    //                ->order_by('insNombre','asc')
    //                ->get()
    //                ->result();
    //}
    //public function dameExamenes()
    //{
    //    return $this->db->select('*')
    //                ->from('examenes')
    //                ->order_by('exaNombre','asc')
    //                ->get()
    //                ->result();
    //}
    public function dameInsumosAsignados($id)
    {
        return $this->db->select('*')
                    ->from('insumos_asignados_tec')
                    ->join('insumos_tec','insId=inaInsumo','left')
                    ->join('farmacos_tec','idfarmaco=inaInsumo','left')
                    //->join('examenes','exaId=inaInsumo','left')
                    ->join('usuarios_panel','uspId=inaUsuario')
                    ->where('inaSes',$id)
                    ->where('inaEstado',1)
                    ->get()
                    ->result();
    }
    
    public function guardarInsumosAsignados()
    {
        if(isset($this->inaId)){
        $this->db->update('insumos_asignados_tec', $this, array('inaId' => $this->inaId));}
        else{
        $this->db->insert('insumos_asignados_tec', $this);}
    }
    public function dameFarmacos()
    {
        return $this->db->select('idfarmaco,descripcion,farmValor')
                        ->from('farmacos_tec')
                        ->order_by('descripcion','asc')
                        ->get()
                        ->result();
    }
    public function dameInsumos()
    {
        return $this->db->select('*')
                    ->from('insumos_tec')
                    ->order_by('insNombre','asc')
                    ->get()
                    ->result();
    }
    public function dameCostosInsumos()
    {
        return $this->db->select('sum(inaValor)valor, Year(inaFechaRegistro) as ano, MONTH(inaFechaRegistro) as mes')
                    ->from('insumos_asignados_tec')
                    ->where('inaEstado',1)
                    ->group_by('ano,mes')
                    ->get()
                    ->result();
    }
    
}