<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 26/09/16
 * Time: 14:22
 */
class Ingreso_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
        
    }
    public function dameIngresos($filtro='',$inicio='',$termino='',$altaDesde='',$altaHasta='',$alta='',$administrador='')
    {
        IF(empty($administrador))$this->db->where('alta','no');
        //$alta = Es para filtrar los pacientes que se encuentren con o sin alta registrada
        if(empty($filtro) && empty($inicio) && empty($termino)&& empty($altaDesde) && empty($altaHasta) && empty($alta)){
            return $this->db->select('p.nacionalidad,c.ctaNombre,c.ctaApellido,c.ctaApellidoM,c.ctaRut,b.banNombre,t.tipNombre,c.ctaNumero,c.ctaEmail, p.fechaNacimiento,p.telefono,p.celular,p.ocupacion,p.direccion,s.comuna comNombre, c.ctaId, r.id, r.ficha, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.rut, r.dateIn,r.fechaIngreso,r.fechaSalidaReal,r.piso,r.ges')
                        ->from('ficha_ugh_registro r')
                        ->join('ficha_pacientes p','p.id=r.paciente','left')
                        ->join('cuentas_pacientes c','c.ctaRegistro=r.id','left')
                        ->join('ficha_comunas s','s.id=p.comuna','left')
                     ->join('tipos_cuenta t','t.tipId=c.ctaTipo','left')
                     ->join('bancos b','b.banId=c.ctaBanco','left')
                       // ->join('apoderados a','a.apoFichaElectronica=r.id','left')
                        //->where('a.apoTipo',2)
                        ->order_by('dateIn','desc')
                        ->where('ingresoMirAndes',1)
                        ->where('ficha >',0)
                        ->limit('1000')
                        ->get()
                        ->result();
        }
        else{
            IF (!empty($filtro)){
                
            return $this->db->select('p.nacionalidad,c.ctaNombre,c.ctaApellido,c.ctaApellidoM,c.ctaRut,b.banNombre,t.tipNombre,c.ctaNumero,c.ctaEmail, p.fechaNacimiento,p.telefono,p.celular,p.ocupacion,p.direccion,s.comuna comNombre, c.ctaId, r.id, r.ficha, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.rut, r.dateIn,r.fechaIngreso,r.fechaSalidaReal,r.piso,r.ges')
                       ->from('ficha_ugh_registro r')
                        ->join('ficha_pacientes p','p.id=r.paciente','left')
                        ->join('cuentas_pacientes c','c.ctaRegistro=r.id','left')
                    ->join('ficha_comunas s','s.id=p.comuna','left')
                     ->join('tipos_cuenta t','t.tipId=c.ctaTipo','left')
                     ->join('bancos b','b.banId=c.ctaBanco','left')
                        ->where('ficha >',0)
                        ->like('p.rut',$filtro)
                        ->or_like('r.ficha',$filtro)
                        ->order_by('dateIn','desc')
                        ->get()
                        ->result();
            }
            ELSEIF (!empty ($inicio) && empty ($altaDesde)){
                IF(empty($termino))$termino = date('Y-m-d H:i:s');
                return $this->db->select('p.nacionalidad,c.ctaNombre,c.ctaApellido,c.ctaApellidoM,c.ctaRut,b.banNombre,t.tipNombre,c.ctaNumero,c.ctaEmail, p.fechaNacimiento,p.telefono,p.celular,p.ocupacion,p.direccion,s.comuna comNombre, c.ctaId, r.id, r.ficha, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.rut, r.dateIn,r.fechaIngreso,r.fechaSalidaReal,r.piso,r.ges')
                   ->from('ficha_ugh_registro r')
                        ->join('ficha_pacientes p','p.id=r.paciente','left')
                        ->join('cuentas_pacientes c','c.ctaRegistro=r.id','left')
                        ->join('ficha_comunas s','s.id=p.comuna','left')
                     ->join('tipos_cuenta t','t.tipId=c.ctaTipo','left')
                     ->join('bancos b','b.banId=c.ctaBanco','left')
                        ->where('r.fechaIngreso >=',$inicio)
                        ->where('r.fechaIngreso <=',$termino)
                        ->where('r.ficha >',0)
                        ->order_by('r.dateIn','desc')
                        ->get()
                        ->result();
            }
            ELSEIF (!empty ($altaDesde) && empty ($inicio)){
                IF(empty($altaHasta))$altaHasta = date('Y-m-d H:i:s');
                return $this->db->select('p.nacionalidad,c.ctaNombre,c.ctaApellido,c.ctaApellidoM,c.ctaRut,b.banNombre,t.tipNombre,c.ctaNumero,c.ctaEmail, p.fechaNacimiento,p.telefono,p.celular,p.ocupacion,p.direccion,s.comuna comNombre, c.ctaId, r.id, r.ficha, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.rut, r.dateIn,r.fechaIngreso,r.fechaSalidaReal,r.piso,r.ges')
                    ->from('ficha_ugh_registro r')
                        ->join('ficha_pacientes p','p.id=r.paciente','left')
                        ->join('cuentas_pacientes c','c.ctaRegistro=r.id','left')
                        ->join('ficha_comunas s','s.id=p.comuna','left')
                     ->join('tipos_cuenta t','t.tipId=c.ctaTipo','left')
                     ->join('bancos b','b.banId=c.ctaBanco','left')
                        ->where('r.fechaSalidaReal >=',$altaDesde)
                        ->where('r.fechaSalidaReal <=',$altaHasta)
                        ->where('r.ficha >',0)
                        ->order_by('r.dateIn','desc')
                        ->get()
                        ->result();
            }
            ELSE {
                IF(empty($altaHasta))$altaHasta = date('Y-m-d H:i:s');
                IF(empty($termino))$termino = date('Y-m-d H:i:s');
                return $this->db->select('p.nacionalidad,c.ctaNombre,c.ctaApellido,c.ctaApellidoM,c.ctaRut,b.banNombre,t.tipNombre,c.ctaNumero,c.ctaEmail, p.fechaNacimiento,p.telefono,p.celular,p.ocupacion,p.direccion,s.comuna comNombre, c.ctaId, r.id, r.ficha, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.rut, r.dateIn,r.fechaIngreso,r.fechaSalidaReal,r.piso,r.ges')
                        ->from('ficha_ugh_registro r')
                        ->join('ficha_pacientes p','p.id=r.paciente','left')
                        ->join('cuentas_pacientes c','c.ctaRegistro=r.id','left')
                        ->join('ficha_comunas s','s.id=p.comuna','left')
                        ->join('tipos_cuenta t','t.tipId=c.ctaTipo','left')
                        ->join('bancos b','b.banId=c.ctaBanco','left')
                        ->where('r.fechaSalidaReal >=',$altaDesde)
                        ->where('r.fechaSalidaReal <=',$altaHasta)
                        ->where('r.fechaIngreso >=',$inicio)
                        ->where('r.fechaIngreso <=',$termino)
                        ->where('r.ficha >',0)
                        ->order_by('r.dateIn','desc')
                        ->get()
                        ->result();
            }
        }
    }
    public function dameUno($id)
    {
       // $db = $this->load->database('ugh', TRUE);
        return $this->db->select('p.nacionalidad,r.ingresoAdministrativo,r.alta,s.esGes, r.ges, r.emergenciaDerivar, r.fechaDerivacion, r.fechaIngreso, r.horaIngreso, r.fechaSalidaReal, r.horaSalidaReal, r.fechaAltaEpicrisis, r.fechaAltaInformada, r.id, r.ficha, r.paciente, e.regNombre regimen, r.dateIn, r.isapre, r.rutTitular, r.diagnosticoDerivacion, r.diagnostico, r.comentario, r.medicoAsignado,m.nombres nombresmedicoAsignado,m.apellidoPaterno apellidomedicoAsignado,m.apellidoMaterno apellidoMmedicoAsignado,m.rut rutmedico,m.email emailmedico, r.nombresMedicoSolicitante, r.apellidoPaternoMedicoSolicitante, r.apellidoMaternoMedicoSolicitante, r.edadPaciente, r.piso, r.emergenciaDerivar, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.rut, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion, p.nacionalidad, p.alergia, c.id comId, c.comuna, i.isapre isapreNombre')
                    ->from('ficha_ugh_registro r')
                    ->join('ficha_pacientes p','p.id=r.paciente','left')
                    ->join('ficha_comunas c','p.comuna=c.id','left')
                     ->join('regimenes e','e.regId=r.regimen','left')
                    ->join('ficha_isapres i','r.isapre=i.id','left')
                    ->join('ficha_ugh_solicitudhospitalizacion s','r.id=s.registro','left')
                    ->join('ficha_ugh_profesionales m','m.id=r.medicoAsignado','left')
                    ->where('r.id',$id)
                    ->get()
                    ->row();
    }
    public function dameUltimo()
    {
       // $db = $this->load->database('ugh', TRUE);
        return $this->db->select('c.ctaId, r.id, r.ficha, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.rut, r.dateIn')
                        ->from('ficha_ugh_registro r')
                        ->join('ficha_pacientes p','p.id=r.paciente','left')
                        ->join('cuentas_pacientes c','c.ctaRegistro=r.id','left')
                        ->where('ficha >',0)
                        ->order_by('id','desc')
                        ->get()
                        ->row();
    }
    public function dameUnoPorRut($rut)
    {
       // $db = $this->load->database('ugh', TRUE);
        return $this->db->select('l.licNumero, l.licDesde,l.licDias, s.esGes, r.ges, r.emergenciaDerivar, r.fechaDerivacion, r.fechaIngreso, r.horaIngreso, r.fechaSalidaReal, r.horaSalidaReal, r.fechaAltaEpicrisis, r.fechaAltaInformada, r.id, r.ficha, r.paciente, r.regimen, r.dateIn, r.isapre, r.rutTitular, r.diagnosticoDerivacion, r.diagnostico, r.comentario, r.medicoAsignado,m.nombres nombresmedicoAsignado,m.apellidoPaterno apellidomedicoAsignado,m.apellidoMaterno apellidoMmedicoAsignado,m.rut rutmedico,m.email emailmedico, r.nombresMedicoSolicitante, r.apellidoPaternoMedicoSolicitante, r.apellidoMaternoMedicoSolicitante, r.edadPaciente, r.piso, r.emergenciaDerivar, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.rut, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion, p.nacionalidad, p.alergia, c.id comId, c.comuna, i.isapre isapreNombre')
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
    public function dameTodo($paciente)
    {
        //$db = $this->load->database('ugh', TRUE);
        return $this->db->select('p.nacionalidad,s.esGes, r.ges, r.emergenciaDerivar, r.fechaDerivacion, r.fechaIngreso, r.horaIngreso, r.fechaSalidaReal, r.horaSalidaReal, r.fechaAltaEpicrisis, r.fechaAltaInformada, r.id, r.ficha, r.paciente, r.regimen, r.dateIn, r.isapre, r.rutTitular, r.diagnosticoDerivacion, r.diagnostico, r.comentario, r.medicoAsignado,m.nombres nombresmedicoAsignado,m.apellidoPaterno apellidomedicoAsignado,m.apellidoMaterno apellidoMmedicoAsignado,m.rut rutmedico,m.email emailmedico, r.nombresMedicoSolicitante, r.apellidoPaternoMedicoSolicitante, r.apellidoMaternoMedicoSolicitante, r.edadPaciente, r.piso, r.emergenciaDerivar, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.rut, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion, p.nacionalidad, p.alergia, c.id comId, c.comuna, i.isapre isapreNombre')
                    ->from('ficha_ugh_registro r')
                    ->join('ficha_pacientes p','p.id=r.paciente','left')
                    ->join('ficha_comunas c','p.comuna=c.id','left')
                    ->join('ficha_isapres i','r.isapre=i.id','left')
                    ->join('ficha_ugh_solicitudhospitalizacion s','r.id=s.registro','left')
                    ->join('ficha_ugh_profesionales m','m.id=r.medicoAsignado','left')
                    ->where('r.paciente',$paciente)
                    ->where('r.ficha >=','1')
                    ->get()
                    ->result();
    }
    public function dameIdFicha($paciente)
    {
        //$db = $this->load->database('ugh', TRUE);
        return $this->db->select('id')
                    ->from('ficha_ugh_registro')
                    ->where('paciente',$paciente)
                    ->order_by('id','desc')
                    ->get()
                    ->row();
    } 
    public function dameIdFichaHoy($paciente)
    {
        $hoy = date('Y-m-d').' 00:00:00';
        //$db = $this->load->database('ugh', TRUE);
        $return= $this->db->select('id')
                    ->from('ficha_ugh_registro')
                    ->where('paciente',$paciente)
                    ->where('dateIn >=',"$hoy")
                    ->get()
                    ->row();
        return $return;
        //die(var_dump($return));
    }
    public function dameFicha($paciente)
    {
        //$db = $this->load->database('ugh', TRUE);
        $ficha = $this->db->select('id, ficha')
                    ->from('ficha_ugh_registro')
                    ->where('paciente',$paciente)
                    ->where('ficha >=',0)
                    ->order_by('ficha','desc')
                    ->get()
                    ->row();
        IF (empty($ficha->id)){
            $nvaFicha = $this->db->select('id, ficha')
                                ->from('ficha_ugh_registro')
                                ->order_by('ficha','desc')
                                ->limit(1)
                                ->get()
                                ->row();
            
            $n = $nvaFicha->ficha;
            $nn= $nvaFicha->ficha-10;
            
            FOR($i = $nn;$i <= $n; $i++){
              
                $checkFicha = $this->db->select('id, ficha')
                                       ->from('ficha_ugh_registro')
                                       ->where('ficha',$i)
                                       ->get()
                                       ->row();
                IF(empty($checkFicha)){$ficha = $i;}
            }
            IF(empty($ficha)){$ficha = $nvaFicha->ficha+1;}
            
        }
        ELSE {
            $ficha = $ficha->ficha;
        }
        return $ficha;
    }
    public function dameFichaHD($paciente)
    {
        //$db = $this->load->database('ugh', TRUE);
        $ficha = $this->db->select('id, ficha')
                    ->from('ficha_hd_registro')
                    ->where('paciente',$paciente)
                    ->where('ficha >=',0)
                    ->order_by('ficha','desc')
                    ->get()
                    ->row();
        IF (empty($ficha->id)){
            $nvaFicha = $this->db->select('id, ficha')
                                ->from('ficha_hd_registro')
                                ->order_by('ficha','desc')
                                ->limit(1)
                                ->get()
                                ->row();
            
            $n = $nvaFicha->ficha;
            $nn= $nvaFicha->ficha-10;
            
            FOR($i = $nn;$i <= $n; $i++){
              
                $checkFicha = $this->db->select('id, ficha')
                                       ->from('ficha_hd_registro')
                                       ->where('ficha',$i)
                                       ->get()
                                       ->row();
                IF(empty($checkFicha)){$ficha = $i;}
            }
            IF(empty($ficha)){$ficha = $nvaFicha->ficha+1;}
            
        }
        ELSE {
            $ficha = $ficha->ficha;
        }
        return $ficha;
    }
    public function guardar()
    {
        
        //$db = $this->load->database('ugh', TRUE);
        if(isset($this->id)){
        $this->db->update('ficha_ugh_registro', $this, array('id' => $this->id));}
        else{
        $this->db->insert('ficha_ugh_registro', $this);}
        
        
    }
    
}