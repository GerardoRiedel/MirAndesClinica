<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 21/09/16
 * Time: 09:22
 */
class Pacientes_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
    }

    public function dameTodo($filtro='')
    {
        if(empty($filtro)){
        //$db = $this->load->database('ugh', TRUE);
        return  $this->db ->distinct('p.id')
                    ->select('t.tecFicha,r.diagnostico,r.regimen,r.comentario,r.fechaSalidaReal,r.dateIn,r.ficha, p.alergia, p.id, p.rut, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.sexo, p.nacionalidad, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion, c.id comId, c.comuna comNombre, m.nombres medNombre,m.apellidoPaterno medApePat,m.apellidoMaterno medApeMat,i.isapre isaNombre')//, i.id isaId, 
                    ->from('ficha_pacientes p')
                    ->join('ficha_ugh_registro r','r.paciente=p.id','left')
                    ->join('ficha_isapres i','r.isapre=i.id','left')
                    ->join('ficha_comunas c','p.comuna=c.id','inner')
                    ->join('ficha_ugh_profesionales m','r.medicoAsignado=m.id','left')
                    ->join('tecs t','t.tecPaciente = p.id','left')
                    ->where('ingresoMirAndes = "1" and r.ficha > "0"')
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
    public function dameTodoHD($filtro='')
    {
        if(empty($filtro)){
        //$db = $this->load->database('ugh', TRUE);
        return  $this->db->distinct('p.id')
                    ->select('r.diagnostico,r.regimen,r.comentario,r.fechaSalidaReal,r.dateIn,r.ficha, r.fichaRH,p.alergia, p.id, p.rut, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.sexo, p.nacionalidad, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion, c.id comId, c.comuna comNombre, m.nombres medNombre,m.apellidoPaterno medApePat,m.apellidoMaterno medApeMat,i.isapre isaNombre')//i.isapre isaNombre, i.id isaId, 
                    ->from('ficha_pacientes p')
                    ->join('ficha_hd_registro r','r.paciente=p.id','inner')
                    ->join('ficha_isapres i','r.isapre=i.id','left')
                    ->join('ficha_comunas c','p.comuna=c.id','inner')
                    ->join('ficha_ugh_profesionales m','r.medicoAsignado=m.id','left')
                    ->where('r.ingresoMirAndes > "0" AND (r.ficha > "0" OR r.fichaRH > "0")')
                    ->group_by('p.id')
                    ->get()
                    ->result();
        }
        else{
        //$db = $this->load->database('ugh', TRUE);
        return  $this->db ->distinct('p.id')
                    ->select('r.diagnostico,r.regimen,r.comentario,r.fechaSalidaReal,r.dateIn,r.ficha, r.fichaRH, p.alergia, p.id, p.rut, p.nombres, p.apellidoPaterno, p.apellidoMaterno, p.sexo, p.nacionalidad, p.fechaNacimiento, p.direccion, p.telefono, p.celular, p.email, p.sexo, p.ocupacion, c.id comId, c.comuna comNombre, m.nombres medNombre,m.apellidoPaterno medApePat,m.apellidoMaterno medApeMat,i.isapre isaNombre')//i.isapre isaNombre, i.id isaId, 
                    ->from('ficha_pacientes p')
                    ->join('ficha_hd_registro r','r.paciente=p.id','left')
                    ->join('ficha_isapres i','r.isapre=i.id','left')
                    ->join('ficha_comunas c','p.comuna=c.id','inner')
                    ->join('ficha_ugh_profesionales m','r.medicoAsignado=m.id','left')
                    ->where('r.ingresoMirAndes > "0" AND (r.ficha > "0" OR r.fichaRH > "0")')
                    ->group_by('p.id')
                    ->like('p.rut',$filtro)
                    ->or_like('r.ficha',$filtro)
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
    
    public function guardar($rut='')
    {
        //$db = $this->load->database('ugh', TRUE);
        if(isset($this->id)){
        $this->db->update('ficha_pacientes', $this, array('id' => $this->id));}
        else{
        $this->db->insert('ficha_pacientes', $this);}
        
        
        
    }
    

    
}