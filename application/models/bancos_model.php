<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 20/09/16
 * Time: 09:22
 */
class Bancos_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
    }

    public function dameTodo()
    {
        return $this->db->select('banId,banNombre')
                        ->from('bancos')
                        ->get()
                        ->result();
    }
    public function dameDeposito($id)
    {
        return $this->db->select('d.depId,b.banNombre,d.depCuenta,d.depSerie,d.depSuma,d.depTipo')
                        ->from('depositos d')
                        ->join('bancos b','b.banId=d.depBanco','left')
                        //->where('d.depFichaElectro',$ficha)
                        ->where('d.depId',$id)
                        ->get()
                        ->row();
    }
    public function dameDepositoUsuario($id)
    {
        $fecha = date('Y-m-d',strtotime ( '-90 day' ));
        return $this->db->select('d.depFechaRegistro,d.depId,b.banNombre,d.depCuenta,d.depSerie,d.depSuma,d.depTipo,d.depFichaElectro,d.depFichaElectroOld')
                        ->from('depositos d')
                        ->join('bancos b','b.banId=d.depBanco','left')
                        //->where('d.depFichaElectro',$ficha)
                        ->where('d.depPaciente',$id)
                        ->where('d.depFechaRegistro >=',$fecha)
                         ->where('d.depEstado != "5"')
                        //->order_by('d.depId','desc')
                        ->get()
                        ->row();
    }
    public function dameUltimoDeposito($ficha)
    {
        return $this->db->select('d.depId,b.banNombre,d.depCuenta,d.depSerie,d.depSuma,d.depTipo')
                        ->from('depositos d')
                        ->join('bancos b','b.banId=d.depBanco','left')
                        ->where('d.depFichaElectro',$ficha)
                        ->order_by('d.depId','desc')
                        ->get()
                        ->row();
    }
    public function dameDepositoUsuarioHD($id)
    {
        $fecha = date('Y-m-d',strtotime ( '-90 day' ));
        return $this->db->select('d.depFechaRegistro,d.depId,b.banNombre,d.depCuenta,d.depSerie,d.depSuma,d.depTipo,d.depFichaElectro,d.depFichaElectroOld')
                        ->from('ficha_hd_depositos d')
                        ->join('bancos b','b.banId=d.depBanco','left')
                        //->where('d.depFichaElectro',$ficha)
                        ->where('d.depPaciente',$id)
                        ->where('d.depFechaRegistro >=',$fecha)
                         ->where('d.depEstado != "5"')
                        //->order_by('d.depId','desc')
                        ->get()
                        ->row();
    }
    public function dameTodosDeposito($ficha)
    {
        return $this->db->select('c.ctaId,c.ctaBanco,v.banNombre banCtaNombre,d.depId,b.banNombre,d.depCuenta,d.depSerie,d.depSuma,d.depTipo,d.depConcepto,d.depFechaRegistro,d.depFechaPrimer,d.depFechaSegundo,d.depFechaTercer,depConNombre')
                        ->from('depositos d')
                        ->join('bancos b','b.banId=d.depBanco','left')
                        ->join('cuentas_pacientes c','c.ctaRegistro=d.depFichaElectro','left')
                        ->join('bancos v','v.banId=c.ctaBanco','left')
                        ->join('depositos_conceptos o','o.depConId=d.depConcepto','left')
                        ->where('d.depFichaElectro',$ficha)
                        ->where('d.depEstado != "5"')
                        ->order_by('d.depId','asc')
                        ->get()
                        ->result();
    }
    public function dameTodosDepositoHD($ficha)
    {
        return $this->db->select('d.depId,b.banNombre,d.depCuenta,d.depSerie,d.depSuma,d.depTipo,d.depConcepto')
                        ->from('ficha_hd_depositos d')
                        ->join('bancos b','b.banId=d.depBanco','left')
                        ->where('d.depFichaElectro',$ficha)
                        ->where('d.depEstado != "5"')
                        ->order_by('d.depId','desc')
                        ->get()
                        ->result();
    }
    public function dameUnoHD($id)
    {
        return $this->db->select('ctaFicha,ctaGes,ctaPaciente,ctaRutPaciente,ctaNomPaciente,ctaId,ctaBanco,ctaTipo,ctaNumero,ctaEmail,ctaRut,ctaNombre,ctaApellido,ctaApellidoM,b.banNombre,t.tipNombre')
                        ->from('ficha_hd_cuentas')
                        ->join('bancos b','b.banId=ctaBanco','left')
                        ->join('tipos_cuenta t','t.tipId=ctaTipo','left')
                        ->where('ctaRegistro',$id)
                        ->get()
                        ->row();
    }
    public function guardarCtaHD()
    {
        if(isset($this->ctaId)){
        $this->db->update('ficha_hd_cuentas', $this, array('ctaId' => $this->ctaId));}
        else{
        $this->db->insert('ficha_hd_cuentas', $this);}
    }
    public function guardarDepositoHD()
    {
        if(isset($this->depId)){
        $this->db->update('ficha_hd_depositos', $this, array('depId' => $this->depId));}
        else{
        $this->db->insert('ficha_hd_depositos', $this);}
    }
    public function dameDepositosTec()
    {
        return $this->db->select('d.depId,b.banNombre,d.depCuenta,d.depSerie,d.depSuma,d.depTipo,d.depConcepto,d.depFicha,d.depFechaRegistro,d.depEstado,c.depConTecNombre depConNombre,p.rut rutPaciente,p.nombres,p.apellidoPaterno,p.apellidoMaterno,p.fechaNacimiento,t.tecDiagnostico,t.tecModalidad,t.tecGes')
                        ->from('depositos_tec d')
                        ->join('bancos b','b.banId=d.depBanco','left')
                        ->join('depositos_conceptos_tec c','c.depConTecId=d.depConcepto','left')
                        ->join('ficha_pacientes p','p.id=d.depPaciente')
                        ->join('tecs t','t.tecId=d.depFichaElectro')
                        //->where('d.depFichaElectro',$ficha)
                        ->where('d.depEstado != "5"')
                        ->order_by('d.depId','desc')
                        ->get()
                        ->result();
    }
    public function dameConceptos()
    {
        return $this->db->select('depConId,depConNombre')
                        ->from('depositos_conceptos')
                        ->get()
                        ->result();
    }
    public function dameConceptosTec()
    {
        return $this->db->select('depConId,depConNombre')
                        ->from('depositos_conceptos_tec')
                        ->get()
                        ->result();
    }
    
    public function dameTodoTipo()
    {
        return $this->db->select('tipId,tipNombre')
                        ->from('tipos_cuenta')
                        ->get()
                        ->result();
    }
    
    public function dameUno($id)
    {
        return $this->db->select('ctaFicha,ctaGes,ctaPaciente,ctaRutPaciente,ctaNomPaciente,ctaId,ctaBanco,ctaTipo,ctaNumero,ctaEmail,ctaRut,ctaNombre,ctaApellido,ctaApellidoM,b.banNombre,t.tipNombre')
                        ->from('cuentas_pacientes')
                        ->join('bancos b','b.banId=ctaBanco','left')
                        ->join('tipos_cuenta t','t.tipId=ctaTipo','left')
                        ->where('ctaRegistro',$id)
                        ->get()
                        ->row();
    }
    public function dameCuentaHD($id)
    {
        return $this->db->select('ctaFicha,ctaGes,ctaPaciente,ctaRutPaciente,ctaNomPaciente,ctaId,ctaBanco,ctaTipo,ctaNumero,ctaEmail,ctaRut,ctaNombre,ctaApellido,ctaApellidoM,b.banNombre,t.tipNombre')
                        ->from('ficha_hd_cuentas')
                        ->join('bancos b','b.banId=ctaBanco','left')
                        ->join('tipos_cuenta t','t.tipId=ctaTipo','left')
                        ->where('ctaPaciente',$id)
                        ->order_by('ctaId','desc')
                        ->get()
                        ->row();
    }

    
    
    public function guardarCta()
    {
        if(isset($this->ctaId)){
        $this->db->update('cuentas_pacientes', $this, array('ctaId' => $this->ctaId));}
        else{
        $this->db->insert('cuentas_pacientes', $this);}
    }
    public function dameCtasLimpiar()
    {
        return $this->db->select('depId')
                ->from('depositos')
                ->join('rendiciones r','depRendicion=r.renNumero','left')
                ->where('r.renEnviada',1)
                ->get()
                ->result();
    }
    public function dameCtasLimpiarHD()
    {
        return $this->db->select('depId')
                ->from('ficha_hd_depositos')
                ->join('ficha_hd_rendiciones r','depRendicion=r.renNumero','left')
                ->where('r.renEnviada',1)
                ->get()
                ->result();
    }
    public function dameCtas($filtro='',$inicio='',$termino='')
    {
        
        if(empty($filtro) && empty($inicio) && empty($termino)){
        $return= $this->db->distinct()
                        ->select('depBoleta,depRendicion,ctaId,ctaNombre,ctaApellido,ctaApellidoM,ctaFicha,ctaRegistro,b.banNombre,ctaNumero,ctaRut,ctaRutPaciente,ctaNomPaciente,ctaEmail,depId,depFicha,depTipo,depFechaRegistro,tipNombre,depConNombre,depSuma,depSerie,d.banNombre depBanNombre,lisDepDeposito,depEstado,depBoleta')
                        ->from('cuentas_pacientes')
                        ->join('bancos b','banId=ctaBanco','left')
                        ->join('tipos_cuenta','tipId=ctaTipo','left')
                        ->join('depositos','ctaRegistro=depFichaElectro','left')
                        ->join('depositos_conceptos','depConcepto=depConId','left')
                        ->join('bancos d','d.banId=depBanco','left')
                        ->join('rendiciones r','depRendicion=r.renNumero','left')
                        ->join('lista_depositos l','depId=l.lisDepDeposito','left')
                        ->where('depRendicion = "0" AND depEstado != "5"')
                        ->or_where('r.renEnviada = "1" AND depEstado !="5"')
                        ->order_by('depId','desc')
                        ->get()
                        ->result();
       // die(var_dump($return));
        return $return;
        
        }
        else {
            
            IF (!empty($inicio)){
                $inicio = $inicio.' 00:00:00';
                IF(empty($termino)){$termino = date('Y-m-d H:i:s');}
                ELSE {$termino = $termino.' 23:59:59';}
                //$this->db->where('depFechaRegistro BETWEEN "2016-11-17 00:00:00" AND "'.$termino.'" ');
                        $this->db->where('depFechaRegistro >=',$inicio);
                        $this->db->where('depFechaRegistro <=',$termino);
                        $this->db->where('depRendicion = 0');
                        $this->db->where('depEstado != 5');
                        $this->db->or_where('depRendicion != 0 AND r.renEnviada = 1 AND depFechaRegistro >="'.$inicio.'" AND depFechaRegistro <="'.$termino.'" AND depEstado !=5');
                         
            }
            ELSE {
                $this->db->where('depRendicion = 0 OR r.renEnviada =1')
                        ->where('depEstado != 5')
                        ->like('ctaFicha',$filtro)
                        ->or_like('ctaRutPaciente',$filtro)
                        ->or_like('ctaRut',$filtro);
            }
            return $this->db->select('depRendicion,ctaId,ctaNombre,ctaApellido,ctaApellidoM,ctaFicha,ctaRegistro,b.banNombre,ctaNumero,ctaRut,ctaRutPaciente,ctaNomPaciente,ctaEmail,depId,depFicha,depTipo,depFechaRegistro,tipNombre,depConNombre,depSuma,depSerie,d.banNombre depBanNombre,lisDepDeposito,depEstado,depBoleta')
                        ->from('cuentas_pacientes')
                        ->join('bancos b','banId=ctaBanco','left')
                        ->join('tipos_cuenta','tipId=ctaTipo','left')
                        ->join('depositos','ctaRegistro=depFichaElectro','left')
                        ->join('depositos_conceptos','depConcepto=depConId','left')
                        ->join('bancos d','d.banId=depBanco','left')
                        ->join('rendiciones r','depRendicion=r.renNumero','left')
                        ->join('lista_depositos l','depId=l.lisDepDeposito','left')
                        ->order_by('depId','asc')
                        ->get()
                        ->result();
        }
    }
    public function dameRendiciones($filtro='',$inicio='',$termino='')
    {
        if(empty($filtro) && empty($inicio) && empty($termino)){
        return $this->db->select('depRendicion,r.renFecha,sum(depSuma)monto,r.renId,ctaId,ctaNombre,ctaApellido,ctaApellidoM,ctaFicha,ctaRegistro,b.banNombre,ctaNumero,ctaRut,ctaRutPaciente,ctaNomPaciente,ctaEmail,depId,depFicha,depTipo,depFechaRegistro,tipNombre,depConNombre,depSuma,depSerie,d.banNombre depBanNombre')
                        ->from('cuentas_pacientes')
                        ->join('bancos b','banId=ctaBanco','left')
                        ->join('tipos_cuenta','tipId=ctaTipo','left')
                        ->join('depositos','ctaRegistro=depFichaElectro','left')
                        ->join('depositos_conceptos','depConcepto=depConId','left')
                        ->join('bancos d','d.banId=depBanco','left')
                        ->join('rendiciones r','depRendicion=r.renNumero','left')
                        ->where('r.renEnviada',2)
                        ->where('depEstado != 5')
                        ->group_by('r.renId')
                        ->get()
                        ->result();
        }
        else {
            IF (!empty($inicio)){
                $inicio = $inicio.' 00:00:00';
                IF(empty($termino)){$termino = date('Y-m-d H:i:s');}
                ELSE {$termino = $termino.' 23:59:59';}
                //$this->db->where('depFechaRegistro BETWEEN "2016-11-17 00:00:00" AND "'.$termino.'" ');
                        $this->db->where('depFechaRegistro >=',$inicio);
                        $this->db->where('depFechaRegistro <=',$termino);
                        $this->db->where('depEstado != 5');
                        $this->db->where('depRendicion = 0');
                        $this->db->or_where('depRendicion != 0 AND r.renEnviada = 1 AND depFechaRegistro >="'.$inicio.'" AND depFechaRegistro <="'.$termino.'" AND depEstado !=5');
                
            }
            ELSE{
                $this->db->where('depRendicion = 0 OR r.renEnviada = 1')
                        ->where('depEstado != 5')
                        ->like('ctaFicha',$filtro)
                        ->or_like('ctaRutPaciente',$filtro)
                        ->or_like('ctaRut',$filtro);
            }
            return $this->db->select('depRendicion,r.renFecha,sum(depSuma)monto,r.renId,ctaId,ctaNombre,ctaApellido,ctaApellidoM,ctaFicha,ctaRegistro,b.banNombre,ctaNumero,ctaRut,ctaRutPaciente,ctaNomPaciente,ctaEmail,depId,depFicha,depTipo,depFechaRegistro,tipNombre,depConNombre,depSuma,depSerie,d.banNombre depBanNombre')
                        ->from('cuentas_pacientes')
                        ->join('bancos b','banId=ctaBanco','left')
                        ->join('tipos_cuenta','tipId=ctaTipo','left')
                        ->join('depositos','ctaRegistro=depFichaElectro','left')
                        ->join('depositos_conceptos','depConcepto=depConId','left')
                        ->join('bancos d','d.banId=depBanco','left')
                        ->join('rendiciones r','depRendicion=r.renNumero','left')
                        ->where('r.renEnviada',2)
                        ->group_by('r.renId')
                        ->get()
                        ->result();
        }
    }
    public function dameRendicionesImprimir($filtro='',$inicio='',$termino='')
    {
        //$inicio = '2017-06-01 00:00:00';$termino= '2017-12-31 00:00:00';
        //$inicio = '2016-01-01 00:00:00';$termino= '2016-12-31 00:00:00';
        //$inicio = '2017-01-01 00:00:00';$termino= '2017-12-31 00:00:00';
      //   $inicio = '2018-01-01 00:00:00';$termino= '2018-12-31 00:00:00';
        if(empty($filtro) && empty($inicio) && empty($termino)){
        return $this->db->select('depRendicion,ctaId,ctaNombre,ctaApellido,ctaApellidoM,ctaFicha,ctaRegistro,b.banNombre,ctaNumero,ctaRut,ctaRutPaciente,ctaNomPaciente,ctaEmail,depId,depFicha,depTipo,depFechaRegistro,tipNombre,depConNombre,depSuma,depSerie,d.banNombre depBanNombre')
                        ->from('cuentas_pacientes')
                        ->join('bancos b','banId=ctaBanco','left')
                        ->join('tipos_cuenta','tipId=ctaTipo','left')
                        ->join('depositos','ctaRegistro=depFichaElectro','left')
                        ->join('depositos_conceptos','depConcepto=depConId','left')
                        ->join('bancos d','d.banId=depBanco','left')
                        ->join('rendiciones r','depRendicion=r.renNumero','left')
                        ->where('r.renEnviada',2)
                        ->get()
                        ->result();
        }
        else {
            IF (!empty($inicio)){
                $inicio = $inicio.' 00:00:00';
                IF(empty($termino)){$termino = date('Y-m-d H:i:s');}
                ELSE {$termino = $termino.' 23:59:59';}
                $this->db->where('depFechaRegistro BETWEEN "'.$inicio.'" AND "'.$termino.'" ');
            }
            ELSE{
                $this->db->like('ctaFicha',$filtro)
                        ->or_like('ctaRutPaciente',$filtro)
                        ->or_like('ctaRut',$filtro);
            }
            return $this->db->select('depRendicion,ctaId,ctaNombre,ctaApellido,ctaApellidoM,ctaFicha,ctaRegistro,b.banNombre,ctaNumero,ctaRut,ctaRutPaciente,ctaNomPaciente,ctaEmail,depId,depFicha,depTipo,depFechaRegistro,tipNombre,depConNombre,depSuma,depSerie,d.banNombre depBanNombre')
                        ->from('cuentas_pacientes')
                        ->join('bancos b','banId=ctaBanco','left')
                        ->join('tipos_cuenta','tipId=ctaTipo','left')
                        ->join('depositos','ctaRegistro=depFichaElectro','left')
                        ->join('depositos_conceptos','depConcepto=depConId','left')
                        ->join('bancos d','d.banId=depBanco','left')
                        ->join('rendiciones r','depRendicion=r.renNumero','left')
                        ->where('r.renEnviada',2)
                        ->get()
                        ->result();
        }
    }
    public function dameRendicionesHD($filtro='',$inicio='',$termino='')
    {
        if(empty($filtro) && empty($inicio) && empty($termino)){
        return $this->db->select('depRendicion,r.renFecha,sum(depSuma)monto,r.renId,ctaId,ctaNombre,ctaApellido,ctaApellidoM,ctaFicha,ctaRegistro,b.banNombre,ctaNumero,ctaRut,ctaRutPaciente,ctaNomPaciente,ctaEmail,depId,depFicha,depTipo,depFechaRegistro,tipNombre,depConNombre,depSuma,depSerie,d.banNombre depBanNombre')
                        ->from('ficha_hd_cuentas')
                        ->join('bancos b','banId=ctaBanco','left')
                        ->join('tipos_cuenta','tipId=ctaTipo','left')
                        ->join('ficha_hd_depositos','ctaRegistro=depFichaElectro','left')
                        ->join('depositos_conceptos','depConcepto=depConId','left')
                        ->join('bancos d','d.banId=depBanco','left')
                        ->join('ficha_hd_rendiciones r','depRendicion=r.renNumero','left')
                        ->where('r.renEnviada',2)
                        ->where('depEstado != 5')
                        ->group_by('r.renId')
                        ->get()
                        ->result();
        }
        else {
            IF (!empty($inicio)){
                $inicio = $inicio.' 00:00:00';
                IF(empty($termino)){$termino = date('Y-m-d H:i:s');}
                ELSE {$termino = $termino.' 23:59:59';}
                //$this->db->where('depFechaRegistro BETWEEN "2016-11-17 00:00:00" AND "'.$termino.'" ');
                        $this->db->where('depFechaRegistro >=',$inicio);
                        $this->db->where('depFechaRegistro <=',$termino);
                        $this->db->where('depEstado != 5');
                        $this->db->where('depRendicion = 0');
                        $this->db->or_where('depRendicion != 0 AND r.renEnviada = 1 AND depFechaRegistro >="'.$inicio.'" AND depFechaRegistro <="'.$termino.'" AND depEstado !=5');
                
            }
            ELSE{
                $this->db->where('depRendicion = 0 OR r.renEnviada = 1')
                        ->where('depEstado != 5')
                        ->like('ctaFicha',$filtro)
                        ->or_like('ctaRutPaciente',$filtro)
                        ->or_like('ctaRut',$filtro);
            }
            return $this->db->select('depRendicion,r.renFecha,sum(depSuma)monto,r.renId,ctaId,ctaNombre,ctaApellido,ctaApellidoM,ctaFicha,ctaRegistro,b.banNombre,ctaNumero,ctaRut,ctaRutPaciente,ctaNomPaciente,ctaEmail,depId,depFicha,depTipo,depFechaRegistro,tipNombre,depConNombre,depSuma,depSerie,d.banNombre depBanNombre')
                        ->from('ficha_hd_cuentas')
                        ->join('bancos b','banId=ctaBanco','left')
                        ->join('tipos_cuenta','tipId=ctaTipo','left')
                        ->join('ficha_hd_depositos','ctaRegistro=depFichaElectro','left')
                        ->join('depositos_conceptos','depConcepto=depConId','left')
                        ->join('bancos d','d.banId=depBanco','left')
                        ->join('ficha_hd_rendiciones r','depRendicion=r.renNumero','left')
                        ->where('r.renEnviada',2)
                        ->group_by('r.renId')
                        ->get()
                        ->result();
        }
    }
    public function dameRendicionesImprimirHD()
    {
        if(empty($filtro) && empty($inicio) && empty($termino)){
        return $this->db->select('depRendicion,ctaId,ctaNombre,ctaApellido,ctaApellidoM,ctaFicha,ctaRegistro,b.banNombre,ctaNumero,ctaRut,ctaRutPaciente,ctaNomPaciente,ctaEmail,depId,depFicha,depTipo,depFechaRegistro,tipNombre,depConNombre,depSuma,depSerie,d.banNombre depBanNombre')
                        ->from('ficha_hd_cuentas')
                        ->join('bancos b','banId=ctaBanco','left')
                        ->join('tipos_cuenta','tipId=ctaTipo','left')
                        ->join('ficha_hd_depositos','ctaRegistro=depFichaElectro','left')
                        ->join('depositos_conceptos','depConcepto=depConId','left')
                        ->join('bancos d','d.banId=depBanco','left')
                        ->join('ficha_hd_rendiciones r','depRendicion=r.renNumero','left')
                        ->where('r.renEnviada',2)
                        ->get()
                        ->result();
        }
        else {
            IF (!empty($inicio)){
                $inicio = $inicio.' 00:00:00';
                IF(empty($termino)){$termino = date('Y-m-d H:i:s');}
                ELSE {$termino = $termino.' 23:59:59';}
                $this->db->where('depFechaRegistro BETWEEN "'.$inicio.'" AND "'.$termino.'" ');
            }
            ELSE{
                $this->db->like('ctaFicha',$filtro)
                        ->or_like('ctaRutPaciente',$filtro)
                        ->or_like('ctaRut',$filtro);
            }
            return $this->db->select('depRendicion,ctaId,ctaNombre,ctaApellido,ctaApellidoM,ctaFicha,ctaRegistro,b.banNombre,ctaNumero,ctaRut,ctaRutPaciente,ctaNomPaciente,ctaEmail,depId,depFicha,depTipo,depFechaRegistro,tipNombre,depConNombre,depSuma,depSerie,d.banNombre depBanNombre')
                        ->from('ficha_hd_cuentas')
                        ->join('bancos b','banId=ctaBanco','left')
                        ->join('tipos_cuenta','tipId=ctaTipo','left')
                        ->join('ficha_hd_depositos','ctaRegistro=depFichaElectro','left')
                        ->join('depositos_conceptos','depConcepto=depConId','left')
                        ->join('bancos d','d.banId=depBanco','left')
                        ->join('ficha_hd_rendiciones r','depRendicion=r.renNumero','left')
                        ->where('r.renEnviada',2)
                        ->get()
                        ->result();
        }
    }
    
    public function dameDatosRenId($renId)
    {
        return $this->db->select('depBoleta, depRendicion,ctaId,ctaNombre,ctaApellido,ctaApellidoM,ctaFicha,ctaRegistro,b.banNombre,ctaNumero,ctaRut,ctaRutPaciente,ctaNomPaciente,ctaEmail,depId,depFicha,depTipo,depFechaRegistro,tipNombre,depConNombre,depSuma,depSerie,d.banNombre depBanNombre')
                        ->from('cuentas_pacientes')
                        ->join('bancos b','banId=ctaBanco','left')
                        ->join('tipos_cuenta','tipId=ctaTipo','left')
                        ->join('depositos','ctaRegistro=depFichaElectro','left')
                        ->join('depositos_conceptos','depConcepto=depConId','left')
                        ->join('bancos d','d.banId=depBanco','left')
                        ->join('rendiciones r','depRendicion=r.renNumero','left')
                        ->where('r.renId',$renId)
                        ->get()
                        ->result();
       
    }
     public function dameDatosRenIdHD($renId)
    {
        return $this->db->select('depBoleta, depRendicion,ctaId,ctaNombre,ctaApellido,ctaApellidoM,ctaFicha,ctaRegistro,b.banNombre,ctaNumero,ctaRut,ctaRutPaciente,ctaNomPaciente,ctaEmail,depId,depFicha,depTipo,depFechaRegistro,tipNombre,depConNombre,depSuma,depSerie,d.banNombre depBanNombre')
                        ->from('ficha_hd_cuentas')
                        ->join('bancos b','banId=ctaBanco','left')
                        ->join('tipos_cuenta','tipId=ctaTipo','left')
                        ->join('ficha_hd_depositos','ctaRegistro=depFichaElectro','left')
                        ->join('depositos_conceptos','depConcepto=depConId','left')
                        ->join('bancos d','d.banId=depBanco','left')
                        ->join('ficha_hd_rendiciones r','depRendicion=r.renNumero','left')
                        ->where('r.renId',$renId)
                        ->get()
                        ->result();
       
    }
    public function dameCtasPorVencer($registro='')
    {
        IF(!empty($registro)) {$this->db->where('depFichaElectro',$registro);}
        $min = date('Y-m-d',strtotime ( '-3 day' ));
        $max = date('Y-m-d',strtotime ( '-2 day' ));
        return $this->db->select('ctaGes')
                        ->select('ctaId,ctaNombre,ctaApellido,ctaApellidoM,ctaFicha,ctaRegistro,ctaNumero,ctaRut,ctaRutPaciente,ctaNomPaciente,ctaEmail,depId,depFicha,depTipo,depFechaRegistro,depConNombre,depSuma,depEstado')
                        ->from('depositos')
                        ->join('cuentas_pacientes','ctaRegistro=depFichaElectro','left')
                        ->join('depositos_conceptos','depConcepto=depConId','left')
                        ->join('ficha_ugh_registro','depFichaElectro=id','left')
                        ->where('alta','no')
                        ->where('ctaGes',2)
                        ->where('depEstado',1)
                        ->where('depFechaRegistro >= "'.$min.'"')
                        ->where('depFechaRegistro <= "'.$max.'"')
                        ->get()
                        ->result();
    }
    
    public function guardarDeposito()
    {
        if(isset($this->depId)){
        $this->db->update('depositos', $this, array('depId' => $this->depId));}
        else{
        $this->db->insert('depositos', $this);}
    }
    public function guardarDepositoTec()
    {
        if(isset($this->depId)){
        $this->db->update('depositos_tec', $this, array('depId' => $this->depId));}
        else{
        $this->db->insert('depositos_tec', $this);}
    }
    public function guardarRendicion()
    {
        $this->load->database('default');
        if(isset($this->renId)){
        $this->db->update('rendiciones', $this, array('renId' => $this->renId));}
        else{
        $this->db->insert('rendiciones', $this);}
    }
    public function guardarRendicionHD()
    {
        $this->load->database('default');
        if(isset($this->renId)){
        $this->db->update('ficha_hd_rendiciones', $this, array('renId' => $this->renId));}
        else{
        $this->db->insert('ficha_hd_rendiciones', $this);}
    }
    public function dameUltimaRendicion()
    {
        
        $this->load->database('default');
        $ultimo = $this->db->select('renId,renNumero')
                    ->from('rendiciones')
                    ->where('renEnviada != 2')
                    ->order_by('renNumero','desc')
                    ->get()
                    ->row();
        //$numero = $ultimo->renNumero;
        IF(empty($ultimo->renNumero)){
                $ultimo = $this->db->select('renId,renNumero')
                    ->from('rendiciones')
                    ->where('renEnviada',2)
                    ->order_by('renNumero','desc')
                    ->get()
                    ->row();
                $numero = $ultimo->renNumero;
                $numero += 1;
                
                $this->bancos_model->renNumero = $numero;
                $this->db->insert('rendiciones', $this);
                unset($this->bancos_model->renNumero);  
                
        }
        ELSE $numero = $ultimo->renNumero;
        
        
        
        return $numero;
    }
    public function dameIdRendicion($renNumero)
    {
        $this->load->database('default');
        return $this->db->select('renId')
                    ->from('rendiciones')
                    ->where('renNumero',$renNumero)
                    ->order_by('renId','desc')
                    ->get()
                    ->row();
    }
    public function dameIdRendicionHD($renNumero)
    {
        $this->load->database('default');
        $return= $this->db->select('renId')
                    ->from('ficha_hd_rendiciones')
                    ->where('renNumero',$renNumero)
                    ->order_by('renId','desc')
                    ->get()
                    ->row();
        //die(var_dump($return));
        return $return;
    }
    
    
    
    
    public function dameCtasHD($filtro='',$inicio='',$termino='')
    {
        
        if(empty($filtro) && empty($inicio) && empty($termino)){
        $return= $this->db->distinct()
                        ->select('depBoleta,depRendicion,ctaId,ctaNombre,ctaApellido,ctaApellidoM,ctaFicha,ctaRegistro,b.banNombre,ctaNumero,ctaRut,ctaRutPaciente,ctaNomPaciente,ctaEmail,depId,depFicha,depTipo,depFechaRegistro,tipNombre,depConNombre,depSuma,depSerie,d.banNombre depBanNombre,lisDepDeposito,depEstado,depBoleta')
                        ->from('ficha_hd_cuentas')
                        ->join('bancos b','banId=ctaBanco','left')
                        ->join('tipos_cuenta','tipId=ctaTipo','left')
                        ->join('ficha_hd_depositos','ctaRegistro=depFichaElectro','left')
                        ->join('depositos_conceptos','depConcepto=depConId','left')
                        ->join('bancos d','d.banId=depBanco','left')
                        ->join('ficha_hd_rendiciones r','depRendicion=r.renNumero','left')
                        ->join('lista_depositos l','depId=l.lisDepDeposito','left')
                        ->where('depRendicion = "0" AND depEstado != "5"')
                        ->or_where('r.renEnviada = "1" AND depEstado !="5"')
                        ->order_by('depId','desc')
                        ->get()
                        ->result();
        
        //die(var_dump($return));
        return $return;
        }
        else {
            
            IF (!empty($inicio)){
                $inicio = $inicio.' 00:00:00';
                IF(empty($termino)){$termino = date('Y-m-d H:i:s');}
                ELSE {$termino = $termino.' 23:59:59';}
                //$this->db->where('depFechaRegistro BETWEEN "2016-11-17 00:00:00" AND "'.$termino.'" ');
                        $this->db->where('depFechaRegistro >=',$inicio);
                        $this->db->where('depFechaRegistro <=',$termino);
                        $this->db->where('depRendicion = 0');
                        $this->db->where('depEstado != 5');
                        $this->db->or_where('depRendicion != 0 AND r.renEnviada = 1 AND depFechaRegistro >="'.$inicio.'" AND depFechaRegistro <="'.$termino.'" AND depEstado !=5');
                         
            }
            ELSE {
                $this->db->where('depRendicion = 0 OR r.renEnviada =1')
                        ->where('depEstado != 5')
                        ->like('ctaFicha',$filtro)
                        ->or_like('ctaRutPaciente',$filtro)
                        ->or_like('ctaRut',$filtro);
            }
            return $this->db->select('depRendicion,ctaId,ctaNombre,ctaApellido,ctaApellidoM,ctaFicha,ctaRegistro,b.banNombre,ctaNumero,ctaRut,ctaRutPaciente,ctaNomPaciente,ctaEmail,depId,depFicha,depTipo,depFechaRegistro,tipNombre,depConNombre,depSuma,depSerie,d.banNombre depBanNombre,lisDepDeposito,depEstado,depBoleta')
                        ->from('ficha_hd_cuentas')
                        ->join('bancos b','banId=ctaBanco','left')
                        ->join('tipos_cuenta','tipId=ctaTipo','left')
                        ->join('ficah_hd_depositos','ctaRegistro=depFichaElectro','left')
                        ->join('depositos_conceptos','depConcepto=depConId','left')
                        ->join('bancos d','d.banId=depBanco','left')
                        ->join('ficha_hd_rendiciones r','depRendicion=r.renNumero','left')
                        ->join('lista_depositos l','depId=l.lisDepDeposito','left')
                        ->order_by('depId','asc')
                        ->get()
                        ->result();
        }
    }
    
    public function dameUltimaRendicionHD()
    {
        
        $this->load->database('default');
        $ultimo = $this->db->select('renId,renNumero')
                    ->from('ficha_hd_rendiciones')
                    ->where('renEnviada != 2')
                    ->order_by('renNumero','desc')
                    ->get()
                    ->row();
        //$numero = $ultimo->renNumero;
        IF(empty($ultimo->renNumero)){
                $ultimo = $this->db->select('renId,renNumero')
                    ->from('ficha_hd_rendiciones')
                    ->where('renEnviada',2)
                    ->order_by('renNumero','desc')
                    ->get()
                    ->row();
                $numero = $ultimo->renNumero;
                $numero += 1;
                
                $this->bancos_model->renNumero = $numero;
                $this->db->insert('ficha_hd_rendiciones', $this);
                unset($this->bancos_model->renNumero);  
                
        }
        ELSE $numero = $ultimo->renNumero;
        
        
        
        return $numero;
    }
   
}