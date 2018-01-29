<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charts_model extends CI_Model
{
     public function __construct()
    {
        $this->load->database('default');
    }

    public function pacientes2016()
    {
      //return  $this->db->select('count(id)cant,fechaIngreso,Year(fechaIngreso) as ano,MONTH(fechaIngreso) as mes')
      $r2016 =  $this->db->select('count(id)cant,fechaSalidaReal,Year(fechaSalidaReal) as ano,MONTH(fechaSalidaReal) as mes')
                ->from('ficha_ugh_registro')
                //->where('fechaIngreso >=','2017-02-01')
                ->where('ficha >',1)
               ->where('fechaSalidaReal != "0000-00-00"')
               ->where('fechaSalidaReal < "2017-01-01"')
                ->group_by('ano,mes')
                ->get()
                ->result();
      
      //die(var_dump($return));
      return $r2016;
    }
    
    public function pacientes()
    {
     
      $r2017 =  $this->db->select('count(id)cant,fechaSalidaReal,Year(fechaSalidaReal) as ano,MONTH(fechaSalidaReal) as mes')
                ->from('ficha_ugh_registro')
                //->where('fechaIngreso >=','2017-02-01')
                ->where('ficha >',1)
               ->where('fechaSalidaReal != "0000-00-00"')
                ->where('fechaSalidaReal >= "2018-01-01"')
                ->where('fechaSalidaReal < "2019-01-01"')
                ->group_by('ano,mes')
                ->get()
                ->result();
      
      //die(var_dump($return));
      return $r2017;
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
                ->where('d.depEstado != "5"')
               ->where('dateIn >= "2017-01-01"')
               ->where('fechaSalidaReal >= "2017-01-01"')
                ->group_by('ano,mes,depTipo')
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
    
    
    
    
   

}