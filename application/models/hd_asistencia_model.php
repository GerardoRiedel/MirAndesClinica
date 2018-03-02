<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 21/09/16
 * Time: 09:22
 */
class hd_asistencia_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
    }
    
    public function damePacientes($mes='')
    {
        IF(!empty($mes)){
            $this->db->where('asiFecha >= "2018-'.$mes.'-01" AND asiFecha <= "2018-'.$mes.'-31" ');
            //$this->db->where('r.alta','no');
            
        }
        return  $this->db->select(' r.id,p.id pacId,p.rut, p.nombres, p.apellidoPaterno, p.apellidoMaterno, a.asiId,a.asiFecha,a.asiEstado')//i.isapre isaNombre, i.id isaId, 
                    ->from('ficha_hd_asistencia a')
                    ->join('ficha_hd_registro r','r.id=a.asiRegistro','left')
                    ->join('ficha_pacientes p','r.paciente=p.id','left')
                    ->where('r.ingresoMirAndes > "0" AND (r.ficha > "0" OR r.fichaRH > "0")')
                    ->where('asiFecha !=',"0000-00-00")
                    ->group_by('p.id')
                    ->order_by('apellidoPaterno')
                    ->get()
                    ->result();
    }
    
    public function dameListaAsistenciaPacientes($mes='')
    {
        return  $this->db->select('r.id,p.id pacId,p.rut, p.nombres, p.apellidoPaterno, p.apellidoMaterno')
                    ->from('ficha_hd_registro r')
                    ->join('ficha_pacientes p','r.paciente=p.id','inner')
                    //->where('r.ingresoMirAndes > "0" AND (r.ficha > "0" OR r.fichaRH > "0")')
                    ->group_by('p.id')
                    ->order_by('p.apellidoPaterno')
                    ->get()
                    ->result();
    }
    
    public function dameAsistenciaHD($mes='')
    {
        $return =  $this->db->select(' r.id,p.rut, p.nombres, p.apellidoPaterno, p.apellidoMaterno, a.asiId,a.asiFecha,a.asiEstado')//i.isapre isaNombre, i.id isaId, 
                    ->from('ficha_hd_registro r')
                    ->join('ficha_pacientes p','p.id=r.paciente','left')
                    ->join('ficha_hd_asistencia a','r.id=a.asiRegistro','left')
                    ->where('r.ingresoMirAndes > "0" AND (r.ficha > "0" OR r.fichaRH > "0")')
                    ->where('r.alta','no')
                    ->group_by('p.id')
                    ->get()
                    ->result();
         //die(var_dump($return));
            foreach ($return as $re){
              //  IF(empty($re->asiId) ){
                    $this->asiFecha=date('Y-m-d');
                    $this->asiRegistro=$re->id;
                    $this->db->insert('ficha_hd_asistencia', $this);
               // }
            }
        
        IF(!empty($mes)){
            $this->db->where('asiFecha >= "2018-'.$mes.'-01" AND asiFecha <= "2018-'.$mes.'-31" ');
        }
        
        return  $this->db->select(' r.id,p.rut, p.nombres, p.apellidoPaterno, p.apellidoMaterno, a.asiId,a.asiFecha,a.asiEstado')//i.isapre isaNombre, i.id isaId, 
                    ->from('ficha_hd_asistencia a')
                    ->join('ficha_hd_registro r','r.id=a.asiRegistro','left')
                    ->join('ficha_pacientes p','r.paciente=p.id','left')
                    ->where('r.ingresoMirAndes > "0" AND (r.ficha > "0" OR r.fichaRH > "0")')
                //    ->where('r.alta','no')
                    ->where('asiFecha !=',"0000-00-00")
                    ->order_by('p.apellidoPaterno')
                    ->get()
                    ->result();
    }
    public function dameAsistencia($registro,$dia)
    {
        return  $this->db->select('*')
                    ->from('ficha_hd_asistencia')
                    ->where('asiRegistro',$registro)
                    ->where('asiFecha',"$dia")
                    ->where('asiFecha !=',"0000-00-00")
                    ->get()
                    ->row();
                
    }
    public function guardarAsistencia()
    {
        if(isset($this->asiId)){
        $this->db->update('ficha_hd_asistencia', $this, array('asiId' => $this->asiId));}
        else{
        $this->db->insert('ficha_hd_asistencia', $this);}
        
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    

    public function dameTodo($filtro='')
    {
        if(empty($filtro)){
        //$db = $this->load->database('ugh', TRUE);
        return  $this->db ->distinct('p.id')
                    ->select('o.tipNombre,b.banNombre,u.ctaEmail,u.ctaNombre,u.ctaApellido,u.ctaApellidoM,u.ctaRut,u.ctaNumero,t.tecFicha,r.diagnostico,r.regimen,r.comentario,r.fechaSalidaReal,r.dateIn,r.ficha, p.alergia, p.id, p.rut, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.sexo, p.nacionalidad, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion, c.id comId, c.comuna comNombre, m.nombres medNombre,m.apellidoPaterno medApePat,m.apellidoMaterno medApeMat,i.isapre isaNombre')//, i.id isaId, 
                    ->from('ficha_pacientes p')
                    ->join('ficha_ugh_registro r','r.paciente=p.id','left')
                    ->join('ficha_isapres i','r.isapre=i.id','left')
                    ->join('ficha_comunas c','p.comuna=c.id','inner')
                    ->join('ficha_ugh_profesionales m','r.medicoAsignado=m.id','left')
                    ->join('tecs t','t.tecPaciente=p.id','left')
                    ->join('cuentas_pacientes u','u.ctaPaciente=r.paciente','left')
                    ->join('bancos b','b.banId=u.ctaBanco','left')
                    ->join('tipos_cuenta o','o.tipId=u.ctaTipo','left')
                     
                    ->where('r.ingresoMirAndes = "1" and r.ficha > "0"')
                    ->or_where('t.tecFicha > "0" ')
                    ->group_by('p.id')
                   // ->where('r.ficha >',0)
                    ->get()
                    ->result();
        }
        else{
        //$db = $this->load->database('ugh', TRUE);
        return  $this->db ->distinct('p.id')
                    ->select('t.tecFicha,r.diagnostico,r.regimen,r.comentario,r.fechaSalidaReal,r.dateIn,r.ficha, p.alergia, p.id, p.rut, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.sexo, p.nacionalidad, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion, c.id comId, c.comuna comNombre, m.nombres medNombre,m.apellidoPaterno medApePat,m.apellidoMaterno medApeMat,i.isapre isaNombre')//i.isapre isaNombre, i.id isaId, 
                    ->from('ficha_pacientes p')
                    ->join('ficha_ugh_registro r','r.paciente=p.id','left')
                    ->join('ficha_isapres i','r.isapre=i.id','left')
                    ->join('ficha_comunas c','p.comuna=c.id','inner')
                    ->join('ficha_ugh_profesionales m','r.medicoAsignado=m.id','left')
                    ->join('tecs t','t.tecPaciente=p.id','left')
                    ->where('ingresoMirAndes = "1" and r.ficha > "0"')
                    ->or_where('t.tecFicha > "0" ')
                    ->like('p.rut',$filtro)
                    ->or_like('r.ficha',$filtro)
                    ->group_by('p.id')
                    ->limit(100)
                    ->get()
                    ->result();
        }
    }
    
    public function dameUnoApi($rut)
    {
        //$db = $this->load->database('ugh', TRUE);
        $return = $this->db ->select('r.ficha, p.id, p.id paciente, p.rut, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.sexo, p.nacionalidad, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion,c.id comId,c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                    ->from('ficha_pacientes p')
                    ->join('ficha_ugh_registro r','r.paciente=p.id','left')
                    ->join('ficha_comunas c','p.comuna=c.id','left')
                    ->where('p.rut',$rut)
                    ->order_by('r.ficha','desc')
                    ->get()
                    ->row();
        //echo var_dump($return).'prim';
        IF(empty($return)){
            $db = $this->load->database('ugh', TRUE);
            $result = $db ->select('p.id, p.id paciente, p.rut, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.sexo, p.nacionalidad, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion,c.id comId,c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                            ->from('ficha_pacientes p')
                            ->join('ficha_comunas c','p.comuna=c.id','left')
                            ->where('p.rut',$rut)
                            ->get()
                            ->row();
            $return = $result;
            //echo var_dump($return).'seg';
            $db = $this->load->database('default', TRUE);
        }
        
        return $return;
    }
    public function dameUnoHdApiCabecera($rut)
    {
        return  $this->db ->select('r.fichaRH')//i.isapre isaNombre, i.id isaId, 
                    ->from('ficha_pacientes p')
                    ->join('ficha_hd_registro r','r.paciente=p.id','left')
                    ->where('p.rut',$rut)
                    ->where('r.fichaRH >',0)
                    ->order_by('r.fichaRH','desc')
                    ->get()
                    ->row();
    }
    public function dameUnoHdApi($rut)
    {
        //$db = $this->load->database('ugh', TRUE);
        $return = $this->db ->select('r.ficha, p.id, p.id paciente, p.rut, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.sexo, p.nacionalidad, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion,c.id comId,c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                    ->from('ficha_pacientes p')
                    ->join('ficha_hd_registro r','r.paciente=p.id','left')
                    ->join('ficha_comunas c','p.comuna=c.id','left')
                    ->where('p.rut',$rut)
                    ->order_by('r.ficha','desc')
                    ->get()
                    ->row();
        //echo var_dump($return).'prim';
        IF(empty($return)){
            $db = $this->load->database('ugh', TRUE);
            $result = $db ->select('p.id, p.id paciente, p.rut, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.sexo, p.nacionalidad, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion,c.id comId,c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                            ->from('ficha_pacientes p')
                            ->join('ficha_comunas c','p.comuna=c.id','left')
                            ->where('p.rut',$rut)
                            ->get()
                            ->row();
            $return = $result;
            //echo var_dump($return).'seg';
            $db = $this->load->database('default', TRUE);
        }
        
        return $return;
    }
    public function dameUnoTecApi($rut)
    {
        //$db = $this->load->database('ugh', TRUE);
        $return = $this->db ->select('t.tecFicha, p.id, p.id paciente, p.rut, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.sexo, p.nacionalidad, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion,c.id comId,c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                    ->from('ficha_pacientes p')
                    ->join('tecs t','t.tecPaciente=p.id','left')
                    ->join('ficha_comunas c','p.comuna=c.id','left')
                    ->where('p.rut',$rut)
                    ->order_by('t.tecFicha','desc')
                    ->get()
                    ->row();
        //echo var_dump($return).'prim';
        IF(empty($return)){
            $db = $this->load->database('ugh', TRUE);
            $result = $db ->select('p.id, p.id paciente, p.rut, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.sexo, p.nacionalidad, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion,c.id comId,c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                            ->from('ficha_pacientes p')
                            ->join('ficha_comunas c','p.comuna=c.id','left')
                            ->where('p.rut',$rut)
                            ->get()
                            ->row();
            $return = $result;
            //echo var_dump($return).'seg';
            $db = $this->load->database('default', TRUE);
        }
        
        return $return;
    }
    public function dameUno($rut)
    {
        return $this->db ->select('r.ficha, p.id, p.id paciente, p.rut, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.sexo, p.nacionalidad, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion,c.id comId,c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                    ->from('ficha_pacientes p')
                    ->join('ficha_ugh_registro r','r.paciente=p.id','left')
                    ->join('ficha_comunas c','p.comuna=c.id','left')
                    ->where('p.rut',$rut)
                    ->order_by('r.ficha','desc')
                    ->get()
                    ->row();
    }
    public function dameUnoId($id)
    {
        //$db = $this->load->database('ugh', TRUE);
        return  $this->db ->select('r.ficha, p.id, p.rut, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.sexo, p.nacionalidad, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                    ->from('ficha_pacientes p')
                    //->join('isapres i','p.isapre=i.id','left')
                    ->join('ficha_ugh_registro r','r.paciente=p.id','left')
                    ->join('ficha_comunas c','p.comuna=c.id','left')
                    ->where('p.id',$id)
                    ->get()
                    ->row();
    }
    public function dameRegimen()
    {
        return  $this->db ->select('regId,regNombre')
                    ->from('regimenes')
                    ->get()
                    ->result();
    }
    public function dameRegimenId($id)
    {
        return  $this->db ->select('regId,regNombre')
                    ->from('regimenes')
                    ->where('regId',$id)
                    ->get()
                    ->row();
    }
    
    public function guardar($rut='',$alergia='')
    {
       
        //$db = $this->load->database('ugh', TRUE);
        if(isset($this->id)){
        $this->db->update('ficha_pacientes', $this, array('id' => $this->id));}
        else{
        $this->db->insert('ficha_pacientes', $this);}
        
        
        
    }
    

    
}