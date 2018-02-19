<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 27/02/17
 * Time: 09:22
 */
class Hd_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
    }

    public function dameIngresosHd($filtro='',$inicio='',$termino='',$altaDesde='',$altaHasta='',$alta='',$administrador='')
    {
        IF(empty($administrador))$this->db->where('alta','no');
        //$alta = Es para filtrar los pacientes que se encuentren con o sin alta registrada
        if(empty($filtro) && empty($inicio) && empty($termino)&& empty($altaDesde) && empty($altaHasta) && empty($alta)){
            return $this->db->select('r.id, r.ficha,r.fichaRH,r.isapre,r.diagnostico, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.rut, r.dateIn,r.fechaSalidaReal,r.piso,r.paciente,r.ingresoMirAndes tipoIngreso')
                        ->from('ficha_hd_registro r')
                        ->join('ficha_pacientes p','p.id=r.paciente','left')
                        //->join('cuentas_pacientes c','c.ctaRegistro=r.id','left')
                        ->where('r.ingresoMirAndes > "0" AND (r.ficha > "0" OR r.fichaRH > "0")')
                        ->where('alta','no')
                        ->order_by('r.dateIn','desc')
                        ->limit('1000')
                        ->get()
                        ->result();
            //die(var_dump($return));
        }
        else{
            IF (!empty($filtro)){
                
            return $this->db->select('c.ctaId, r.id, r.ficha,r.fichaRH, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.rut, r.dateIn,r.fechaSalidaReal,r.piso,r.paciente,r.ingresoMirAndes tipoIngreso')
                        ->from('ficha_hd_registro r')
                        ->join('ficha_pacientes p','p.id=r.paciente','left')
                        ->join('cuentas_pacientes c','c.ctaRegistro=r.id','left')
                        ->where('ingresoMirAndes > "0" AND (r.ficha > "0" OR r.fichaRH > "0")')
                        ->like('p.rut',$filtro)
                        ->or_like('r.ficha',$filtro)
                        ->order_by('dateIn','desc')
                        ->get()
                        ->result();
            }
            ELSEIF (!empty ($inicio) && empty ($altaDesde)){
                IF(empty($termino))$termino = date('Y-m-d H:i:s');
                return $this->db->select('c.ctaId, r.id, r.ficha,r.fichaRH, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.rut, r.dateIn,r.fechaSalidaReal,r.piso,r.paciente,r.ingresoMirAndes tipoIngreso')
                        ->from('ficha_hd_registro r')
                        ->join('ficha_pacientes p','p.id=r.paciente','left')
                        ->join('cuentas_pacientes c','c.ctaRegistro=r.id','left')
                        ->where('r.dateIn >=',$inicio)
                        ->where('r.dateIn <=',$termino)
                        ->where('ingresoMirAndes > "0" AND (r.ficha > "0" OR r.fichaRH > "0")')
                        ->order_by('r.dateIn','desc')
                        ->get()
                        ->result();
            }
            ELSEIF (!empty ($altaDesde) && empty ($inicio)){
                IF(empty($altaHasta))$altaHasta = date('Y-m-d H:i:s');
                return $this->db->select('c.ctaId, r.id, r.ficha,r.fichaRH, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.rut, r.dateIn,r.fechaSalidaReal,r.piso,r.paciente,r.ingresoMirAndes tipoIngreso')
                        ->from('ficha_hd_registro r')
                        ->join('ficha_pacientes p','p.id=r.paciente','left')
                        ->join('cuentas_pacientes c','c.ctaRegistro=r.id','left')
                        ->where('r.fechaSalidaReal >=',$altaDesde)
                        ->where('r.fechaSalidaReal <=',$altaHasta)
                        ->where('ingresoMirAndes > "0" AND (r.ficha > "0" OR r.fichaRH > "0")')
                        ->order_by('r.dateIn','desc')
                        ->get()
                        ->result();
            }
            ELSE {
                IF(empty($altaHasta))$altaHasta = date('Y-m-d H:i:s');
                IF(empty($termino))$termino = date('Y-m-d H:i:s');
                return $this->db->select('c.ctaId, r.id, r.ficha,r.fichaRH, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.rut, r.dateIn,r.fechaSalidaReal,r.piso,r.paciente,r.ingresoMirAndes tipoIngreso')
                        ->from('ficha_hd_registro r')
                        ->join('ficha_pacientes p','p.id=r.paciente','left')
                        ->join('cuentas_pacientes c','c.ctaRegistro=r.id','left')
                        ->where('r.fechaSalidaReal >=',$altaDesde)
                        ->where('r.fechaSalidaReal <=',$altaHasta)
                        ->where('r.dateIn >=',$inicio)
                        ->where('r.dateIn <=',$termino)
                        ->where('ingresoMirAndes > "0" AND (r.ficha > "0" OR r.fichaRH > "0")')
                        ->order_by('r.dateIn','desc')
                        ->get()
                        ->result();
            }
        }
    }
    public function dameTodoHD($paciente)
    {
        //$db = $this->load->database('ugh', TRUE);
        return $this->db->select('s.esGes, r.ges, r.emergenciaDerivar, r.fechaDerivacion, r.fechaIngreso, r.horaIngreso, r.fechaSalidaReal, r.horaSalidaReal, r.fechaAltaEpicrisis, r.fechaAltaInformada, r.id, r.ficha, r.paciente, r.regimen, r.dateIn, r.isapre, r.rutTitular, r.diagnosticoDerivacion, r.diagnostico, r.comentario, r.medicoAsignado,m.nombres nombresmedicoAsignado,m.apellidoPaterno apellidomedicoAsignado,m.apellidoMaterno apellidoMmedicoAsignado,m.rut rutmedico,m.email emailmedico, r.nombresMedicoSolicitante, r.apellidoPaternoMedicoSolicitante, r.apellidoMaternoMedicoSolicitante, r.edadPaciente, r.piso, r.emergenciaDerivar, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.rut, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion, p.nacionalidad, p.alergia, c.id comId, c.comuna, i.isapre isapreNombre,r.ingresoMirAndes tipoIngreso')
                    ->from('ficha_hd_registro r')
                    ->join('ficha_pacientes p','p.id=r.paciente','left')
                    ->join('ficha_comunas c','p.comuna=c.id','left')
                    ->join('ficha_isapres i','r.isapre=i.id','left')
                    ->join('ficha_ugh_solicitudhospitalizacion s','r.id=s.registro','left')
                    ->join('ficha_ugh_profesionales m','m.id=r.medicoAsignado','left')
                    ->where('r.paciente',$paciente)
                    ->where('r.ficha >=','0')
                    ->get()
                    ->result();
    }
    public function dameTodo()
    {
        return $this->db->select('*')
                        ->from('ficha_hd_registro r')
                        ->join('ficha_pacientes p','p.id=r.paciente','left')
                        ->where('ficha >',0)
                        ->get()
                        ->result();
    }
   public function dameUno($id)
    {
       // $db = $this->load->database('ugh', TRUE);
        return  $this->db->select('o.derNombre,r.nombresMedicoSolicitante, r.origenDerivacion, r.id, r.usuarioIn, r.dateIn, r.fechaIngreso, r.horaIngreso, r.isapre, r.comentario,r.diagnostico, r.ficha, r.fichaRH, r.ges, r.paciente, r.emergenciaDerivar, r.rutTitular,r.nombreTitular,r.apePatTitular,r.apeMatTitular, r.medicoAsignado,m.nombres nombresmedicoAsignado,m.apellidoPaterno apellidomedicoAsignado,m.apellidoMaterno apellidoMmedicoAsignado,m.rut rutmedico,m.email emailmedico, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.rut, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion, p.nacionalidad, p.alergia, c.id comId, c.comuna, i.isapre isapreNombre,r.ingresoMirAndes tipoIngreso,TOAsignado,PSAsignado,t.nombre TOnombre,t.apePat TOapePat,t.apeMat TOapeMat,s.nombre PSnombre,s.apePat PSapePat,s.apeMat PSapeMat,r.alta')
                    ->from('ficha_hd_registro r')
                    ->join('ficha_pacientes p','p.id=r.paciente','left')
                    ->join('ficha_comunas c','p.comuna=c.id','left')
                    ->join('ficha_isapres i','r.isapre=i.id','left')
                    ->join('ficha_ugh_profesionales m','m.id=r.medicoAsignado','left')
                    ->join('apoderados a','a.apoFichaElectronica=r.id','left')
                    ->join('derivaciones o','r.origenDerivacion=o.derId','left')
                    ->join('ficha_hd_toyps s','s.id=r.PSAsignado','left')
                    ->join('ficha_hd_toyps t','t.id=r.TOAsignado','left')
                    ->where('r.id',$id)
                    ->order_by('r.id','desc')
                    ->get()
                    ->row();
        
    }
    public function dameIngresoHoy($id,$paciente)
    {
       $hoy = date('Y-m-d').' 00:00:00';
        return  $this->db->select('ingId')
                    ->from('ficha_hd_ingresosto')
                    ->where('ingRegistro',$id)
                    ->where('ingPaciente',$paciente)
                    ->where('ingFechaRegistro >=',"$hoy")
                    ->order_by('ingId','desc')
                    ->get()
                    ->row();
    }
    public function dameHdFicha($paciente)
    {
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
                                ->where('ficha >=',0)
                                ->limit(1)
                                ->get()
                                ->row();
            
            $n = $nvaFicha->ficha;
            $nn= $nvaFicha->ficha-10;
            
            FOR($i = $nn;$i <= $n; $i++){
              
                $checkFicha = $this->db->select('id, ficha')
                                       ->from('ficha_hd_registro')
                                       ->where('ficha',$i)
                                       ->where('ficha >',0)
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
    public function dameRHFicha($paciente)
    {
        $ficha = $this->db->select('id, fichaRH')
                    ->from('ficha_hd_registro')
                    ->where('paciente',$paciente)
                    ->where('fichaRH >=',0)
                    ->order_by('fichaRH','desc')
                    ->get()
                    ->row();
        IF (empty($ficha->id)){
            $nvaFicha = $this->db->select('id, fichaRH')
                                ->from('ficha_hd_registro')
                                ->where('fichaRH >',0)
                                ->order_by('fichaRH','desc')
                                ->limit(1)
                                ->get()
                                ->row();
            
            $n = $nvaFicha->fichaRH;
            $nn= $nvaFicha->fichaRH-10;
            
            FOR($i = $nn;$i <= $n; $i++){
              
                $checkFicha = $this->db->select('id, fichaRH')
                                       ->from('ficha_hd_registro')
                                       ->where('fichaRH',$i)
                                       ->where('fichaRH >',0)
                                       ->get()
                                       ->row();
                IF(empty($checkFicha)){$ficha = $i;}
            }
            IF(empty($ficha)){$ficha = $nvaFicha->fichaRH+1;}
            
        }
        ELSE {
            $ficha = $ficha->fichaRH;
        }
        return $ficha;
    }
    public function dameUnoPorRut($rut)
    {
        return $this->db->select('r.id, r.usuarioIn, r.dateIn, r.fechaIngreso, r.horaIngreso, r.isapre, r.comentario,r.diagnostico, r.ficha, r.ges, r.paciente, r.emergenciaDerivar, r.rutTitular, r.nombreTitular, r.apePatTitular, r.apeMatTitular, r.medicoAsignado,m.nombres nombresmedicoAsignado,m.apellidoPaterno apellidomedicoAsignado,m.apellidoMaterno apellidoMmedicoAsignado,m.rut rutmedico,m.email emailmedico, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.rut, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion, p.nacionalidad, p.alergia, c.id comId, c.comuna, i.isapre isapreNombre')
                    ->from('ficha_hd_registro r')
                    ->join('ficha_pacientes p','p.id=r.paciente','left')
                    ->join('ficha_comunas c','p.comuna=c.id','left')
                    ->join('ficha_isapres i','r.isapre=i.id','left')
                    ->join('ficha_ugh_profesionales m','m.id=r.medicoAsignado','left')
                    ->where('p.rut',$rut)
                    ->order_by('r.id','desc')
                    ->get()
                    ->row();
    }
    
    public function dameIdFicha($paciente)
    {
        //$db = $this->load->database('ugh', TRUE);
        return $this->db->select('id,ficha')
                    ->from('ficha_hd_registro')
                    ->where('paciente',$paciente)
                    ->order_by('id','desc')
                    ->get()
                    ->row();
    }
    public function dameIdFichaHoy($paciente)
    {
        $hoy = date('Y-m-d').' 00:00:00';
        return $this->db->select('id')
                    ->from('ficha_hd_registro')
                    ->where('paciente',$paciente)
                    ->where('dateIn >=',$hoy)
                    ->get()
                    ->row();
        
    }
    public function dameIdFichaRH($paciente)
    {
        //$db = $this->load->database('ugh', TRUE);
        return $this->db->select('id')
                    ->from('ficha_hd_registro')
                    ->where('paciente',$paciente)
                    ->where('fichaRH != "null"')
                    ->order_by('id','desc')
                    ->get()
                    ->row();
    }
    public function dameIdFichaRHHoy($paciente)
    {
        $hoy = date('Y-m-d').' 00:00:00';
        return $this->db->select('id')
                    ->from('ficha_hd_registro')
                    ->where('fichaRH != "null"')
                    ->where('paciente',$paciente)
                    ->where('dateIn >=',$hoy)
                    ->get()
                    ->row();
    }
    public function guardarRH()
    {
        if(isset($this->id)){
        $this->db->update('ficha_rh_registro', $this, array('id' => $this->id));}
        else{
        $this->db->insert('ficha_rh_registro', $this);}
    }
    public function guardar()
    {
        if(isset($this->id)){
        $this->db->update('ficha_hd_registro', $this, array('id' => $this->id));}
        else{
        $this->db->insert('ficha_hd_registro', $this);}
    }
    
    public function guardarSignos()
    {
        if(isset($this->sigId)){
        $this->db->update('ficha_hd_signos', $this, array('sigId' => $this->sigId));}
        else{
        $this->db->insert('ficha_hd_signos', $this);}
    }
    public function dameSignosId($id)
    {
        return $this->db->select('*')
                        ->from('ficha_hd_signos')
                        ->join('usuarios_panel','uspId=sigEu')
                        ->where('sigRegistro',$id)
                        ->get()
                        ->result();
    }
    public function dameSignosFila($id)
    {
        return $this->db->select('*')
                        ->from('ficha_hd_signos')
                        ->where('sigId',$id)
                        ->get()
                        ->row();
    }
    public function dameSignosFilaCero($id)
    {
        return $this->db->select('*')
                        ->from('ficha_hd_signos')
                        ->join('regimenes','regId=sigRegimen','left')
                        ->where('sigRegistro',$id)
                        ->where('sigFila',0)
                        ->order_by('sigId','desc')
                        ->get()
                        ->row();
    }
    public function dameSignosIdOrden($id)
    {
        return $this->db->select('*')
                        ->from('ficha_hd_signos')
                        ->join('usuarios_panel','uspId=sigEu')
                        ->where('sigRegistro',$id)
                        ->order_by('sigFila','desc')
                        ->get()
                        ->result();
    }
    public function guardarSolicitudes()
    {
        if(isset($this->solId)){
        $this->db->update('ficha_hd_solicitudes', $this, array('solId' => $this->solId));}
        else{
        $this->db->insert('ficha_hd_solicitudes', $this);}
    }
    public function dameSolicitudesId($id)
    {
        return $this->db->select('*')
                        ->from('ficha_hd_solicitudes')
                        ->join('usuarios_panel u','solUsuario=u.uspId','left')
                        ->where('solRegistro',$id)
                        ->get()
                        ->result();
    }
    public function dameUnaSolicitud($id)
    {
        return $this->db->select('r.id,u.uspNombre,u.uspApellidoP,p.nombres,p.apellidoPaterno,p.apellidoMaterno,solId,solRegistro,solFechaRegistro,solUsuario,solTipo,solFecha,solHora,solMotivo,solProfesional')
                        ->from('ficha_hd_solicitudes')
                        ->join('usuarios_panel u','solUsuario=u.uspId','left')
                        ->join('ficha_hd_registro r','solRegistro=r.id')
                        ->join('ficha_pacientes p','r.paciente=p.id','left')
                        ->where('solId',$id)
                        ->get()
                        ->row();
    }
    
    
    
    public function guardarEvaluaciones()
    {
        if(isset($this->evaId)){
        $this->db->update('ficha_hd_evaluaciones', $this, array('evaId' => $this->evaId));}
        else{
        $this->db->insert('ficha_hd_evaluaciones', $this);}
    }
    public function dameEvaluacionesId($id)
    {
        return $this->db->select('*')
                        ->from('ficha_hd_evaluaciones')
                        ->join('usuarios_panel u','evaUsuario=u.uspId','left')
                        ->where('evaRegistro',$id)
                        ->where('evaEstado',1)
                        ->get()
                        ->result();
    }
    public function dameUnaEvaluacion($id)
    {
        return $this->db->select('*')
                        ->from('ficha_hd_evaluaciones')
                        ->join('usuarios_panel u','evaUsuario=u.uspId','left')
                        ->where('evaId',$id)
                        ->where('evaEstado',1)
                        ->get()
                        ->row();
    }
    public function guardarContacto()
    {
        if(isset($this->conId)){
        $this->db->update('ficha_hd_contactos', $this, array('conId' => $this->conId));}
        else{
        $this->db->insert('ficha_hd_contactos', $this);}
    }
    public function dameContacto()
    {
        return $this->db->select('*')
                        ->from('ficha_hd_contactos')
                        ->get()
                        ->result();
    }
    public function dameUnoContacto($rut)
    {
        return $this->db->select('*')
                        ->from('ficha_hd_contactos')
                        ->where('conRut',$rut)
                        ->get()
                        ->result();
    }
    
    
    
    
    
    
    
    public function dameAsistencia($rut,$desde,$hasta)
    {
        //die($rut.' desde'.$desde.' Hasta'.$hasta);
        $db = $this->load->database('ugh', TRUE);
        $mirandes = $db ->select('count(a.id)cuenta,r.id')
                            ->from('ficha_ugh_asistencia_pacientes a')
                            ->join('ficha_ugh_registro r','a.registro=r.id')
                            ->join('ficha_pacientes p','p.id=r.paciente')
                            ->where('p.rut',$rut)
                            ->where('a.asistencia','mirandes')
                            ->where('a.fecha >= ',$desde)
                            ->where('a.fecha <= ',$hasta.' 23:59:59')
                            ->order_by('r.id','desc')
                            ->get()
                            ->row();
        $nexos = $db ->select('count(a.id)cuenta,r.id')
                            ->from('ficha_ugh_asistencia_pacientes a')
                            ->join('ficha_ugh_registro r','a.registro=r.id')
                            ->join('ficha_pacientes p','p.id=r.paciente')
                            ->where('p.rut',$rut)
                            ->where('a.asistencia','nexos')
                            ->where('a.fecha >= ',$desde)
                            ->where('a.fecha <= ',$hasta.' 23:59:59')
                            ->order_by('r.id','desc')
                            ->get()
                            ->row();
        $arr[] = $mirandes;
        $arr[] = $nexos;
        
        return $arr;
        
        $db = $this->load->database('default', TRUE);
        
    }
    public function dameUnoIngreso($registro)
    {
        return $this->db->select('*')
                                    ->from('ficha_hd_ingresosto')
                                    ->where('ingRegistro',$registro)
                                    ->order_by('ingId','desc')
                                    ->get()
                                    ->row();
    }
    public function guardarIngresoTO()
    {
        if(isset($this->ingId)){
        $this->db->update('ficha_hd_ingresosto', $this, array('ingId' => $this->ingId));}
        else{
        $this->db->insert('ficha_hd_ingresosto', $this);}
    }
    
    
    public function dameProfesionalesHD()
    {
        $query1 = $this->db->select('id,nombre,apePat')
                                    ->from('ficha_hd_toyps')
                                    ->order_by('apePat','asc')
                                    ->get()
                                    ->result();
         $query2 = $this->db->select('uspId id,uspNombre nombre,uspApellidoP apePat')
                                    ->from('usuarios_panel')
                                    ->where('uspEstado',1)
                                    ->where('uspPerfil >=13')
                                    ->where('uspPerfil !=16')
                                    ->order_by('apePat','asc')
                                    ->get()
                                    ->result();
        $query = array_merge($query1, $query2);
        //asort($query);
        return  $query;
    }
    public function dameUltimaSolicitud($registro)
    {
        return $this->db->select('r.id,u.uspNombre,u.uspApellidoP,p.nombres,p.apellidoPaterno,p.apellidoMaterno,solId,solRegistro,solFechaRegistro,solUsuario,solTipo,solFecha,solHora,solMotivo,solProfesional')
                                   ->from('ficha_hd_solicitudes')
                                   ->join('usuarios_panel u','solUsuario=u.uspId','left')
                                   ->join('ficha_hd_registro r','solRegistro=r.id')
                                   ->join('ficha_pacientes p','r.paciente=p.id','left')
                                     ->where('solRegistro',$registro)
                                    ->order_by('solId','desc')
                                    ->get()
                                    ->row();
        
        
    }
    
    
}