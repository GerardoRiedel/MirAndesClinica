<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charts_model extends CI_Model
{
     public function __construct()
    {
        $this->load->database('default');
    }

    public function pacientes()
    {
      return  $this->db->select('count(id)cant,fechaIngreso,Year(fechaIngreso) as ano,MONTH(fechaIngreso) as mes')
                ->from('ficha_ugh_registro')
                //->where('fechaIngreso >=','2017-02-01')
                ->where('ficha >',1)
                ->group_by('ano,mes')
                ->get()
                ->result();
    }
    public function pieSexo()
    {
      return  $this->db->select('count(r.id)cant,p.sexo')
                ->from('ficha_ugh_registro r')
                ->join('ficha_pacientes p','r.paciente = p.id')
                ->where('r.ficha >',1)
                ->group_by('p.sexo')
                ->get()
                ->result();
    }
    public function piePiso()
    {
      return  $this->db->select('count(id)cant,piso')
                ->from('ficha_ugh_registro')
                ->where('ficha >',1)        
                ->group_by('piso')
                ->get()
                ->result();
    }
    public function depositos()
    {
      return $this->db->select('depTipo,sum(depSuma)monto,count(r.id)cant,Year(d.depFechaRegistro) as ano,MONTH(d.depFechaRegistro) as mes')
                ->from('ficha_ugh_registro r')
                ->join('depositos d','r.id = d.depFichaElectro')
                //->where('r.ficha >',1)
                ->where('d.depEstado <',5)
                ->group_by('mes,depTipo')
                ->get()
                ->result();
      //die(var_dump($return));
    }
    
    public function piePisoEnfermeria()
    {
      return  $this->db->select('count(id)cant,piso')
                ->from('ficha_ugh_registro')
                ->where('ficha >',1)   
                ->where('alta','no')
                ->group_by('piso')
                ->get()
                ->result();
    }
    
    public function tec()
    {
      return  $this->db->select('count(tecSesId)cant,tecSesFechaRegistro,Year(tecSesFechaRegistro) as ano,MONTH(tecSesFechaRegistro) as mes')
                ->from('tecs_sessiones')
                //->where('fechaIngreso >=','2017-02-01')
                //->where('tecFicha >',0)
                ->group_by('ano,mes')
                ->get()
                ->result();
    }
    
    
    
    
    
    public function cajaNO()
    {
      return  $this->db->select('count(logId)cant,logData,YEAR(logFecha) as ano,MONTH(logFecha) as mes,DAY(logFecha) as dia')
                ->from('cajalogin')
                ->where('logData',2)
                ->group_by('ano,mes,dia')
                ->get()
                ->result();
    }
     public function cajaOK()
    {
      return  $this->db->select('count(logId)cant,logData,YEAR(logFecha) as ano,MONTH(logFecha) as mes,DAY(logFecha) as dia')
                ->from('cajalogin')
                ->where('logData',1)
                ->group_by('ano,mes,dia')
                ->get()
                ->result();
    }
    public function cajaBLOQUEO()
    {
      return  $this->db->select('count(logId)cant,logData,YEAR(logFecha) as ano,MONTH(logFecha) as mes,DAY(logFecha) as dia')
                ->from('cajalogin')
                ->where('logData',3)
                ->group_by('ano,mes,dia')
                ->get()
                ->result();
    }
     public function cajaTodo()
    {
      return  $this->db->select('*')
                ->from('cajalogin')
                ->order_by('logFecha','desc')
                ->get()
                ->result();
    }
     public function cajaClave()
    {
      return  $this->db->select('*')
                ->from('cajapassword')
                ->order_by('pasId','desc')
                ->get()
                ->row();
    }
    public function cajaPlataforma()
    {
      return  $this->db->select('*')
                ->from('usuarios_panel')
                ->where('uspId',9010)
                ->get()
                ->row();
    }
     public function cajaGuardarPlataforma()
    {
        if(isset($this->uspId)){
        $this->db->update('usuarios_panel', $this, array('uspId' => $this->uspId));}
    }
    public function cajaGuardar()
    {
        if(isset($this->pasId)){
        $this->db->update('cajapassword', $this, array('pasId' => $this->pasId));}
        else{
        $this->db->insert('cajapassword', $this);}
    }

}