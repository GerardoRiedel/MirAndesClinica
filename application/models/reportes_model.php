<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 21/09/16
 * Time: 09:22
 */
class Reportes_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
        $this->load->model("ingreso_model");
    }
    public function dameIngresosInsumos($filtro='',$inicio='',$termino='',$altaDesde='',$altaHasta='',$alta='',$administrador=''){
            
        if(empty($filtro) && empty($inicio) && empty($termino)&& empty($altaDesde) && empty($altaHasta) && empty($alta)){
        
        $return= $this->db->select('*')
                    ->from('insumos_asignados')
                    ->join('insumos','insId=inaInsumo','left')
                    ->join('farmacos','idfarmaco=inaInsumo','left')
                    ->join('examenes','exaId=inaInsumo','left')
                    ->join('usuarios_panel','uspId=inaUsuario','left')
                    ->join('ficha_ugh_registro r','r.id=inaRegistro','left')
                    ->join('ficha_pacientes p','r.paciente=p.id','left')
                    ->where('inaEstado != ',2)
                    ->where('inaInsumo != 35 and inaInsumo != 36 and inaInsumo != 37 and inaInsumo != 38 and inaInsumo != 39')
                    ->get()
                    ->result();
        return $return;
        //die(var_dump($return));
        }
        else{
        IF (!empty($filtro)){
                
                return $this->db->select('*')
                    ->from('insumos_asignados')
                    ->join('insumos','insId=inaInsumo','left')
                    ->join('farmacos','idfarmaco=inaInsumo','left')
                    ->join('examenes','exaId=inaInsumo','left')
                    ->join('usuarios_panel','uspId=inaUsuario','left')
                    ->join('ficha_ugh_registro r','r.id=inaRegistro','left')
                    ->join('ficha_pacientes p','r.paciente=p.id','left')
                        ->where('ficha >',0)
                        ->where('inaEstado != ',2)
                    ->where('inaInsumo != 35 and inaInsumo != 36 and inaInsumo != 37 and inaInsumo != 38 and inaInsumo != 39')
                    
                        ->like('p.rut',$filtro)
                        ->or_like('r.ficha',$filtro)
                        ->order_by('dateIn','desc')
                        ->get()
                        ->result();
            }
            ELSEIF (!empty ($inicio) && empty ($altaDesde)){
                IF(empty($termino))$termino = date('Y-m-d H:i:s');
                return $this->db->select('*')
                   ->from('insumos_asignados')
                    ->join('insumos','insId=inaInsumo','left')
                    ->join('farmacos','idfarmaco=inaInsumo','left')
                    ->join('examenes','exaId=inaInsumo','left')
                    ->join('usuarios_panel','uspId=inaUsuario','left')
                    ->join('ficha_ugh_registro r','r.id=inaRegistro','left')
                    ->join('ficha_pacientes p','r.paciente=p.id','left')
                        ->where('r.fechaIngreso >=',$inicio)
                        ->where('r.fechaIngreso <=',$termino)
                        ->where('r.ficha >',0)
                        ->where('inaEstado != ',2)
                    ->where('inaInsumo != 35 and inaInsumo != 36 and inaInsumo != 37 and inaInsumo != 38 and inaInsumo != 39')
                    
                        ->order_by('r.dateIn','desc')
                        ->get()
                        ->result();
            }
            ELSEIF (!empty ($altaDesde) && empty ($inicio)){
                IF(empty($altaHasta))$altaHasta = date('Y-m-d H:i:s');
                return $this->db->select('*')
                    ->from('insumos_asignados')
                    ->join('insumos','insId=inaInsumo','left')
                    ->join('farmacos','idfarmaco=inaInsumo','left')
                    ->join('examenes','exaId=inaInsumo','left')
                    ->join('usuarios_panel','uspId=inaUsuario','left')
                    ->join('ficha_ugh_registro r','r.id=inaRegistro','left')
                    ->join('ficha_pacientes p','r.paciente=p.id','left')
                        ->where('r.fechaSalidaReal >=',$altaDesde)
                        ->where('r.fechaSalidaReal <=',$altaHasta)
                        ->where('r.ficha >',0)
                        ->where('inaEstado != ',2)
                    ->where('inaInsumo != 35 and inaInsumo != 36 and inaInsumo != 37 and inaInsumo != 38 and inaInsumo != 39')
                    
                        ->order_by('r.dateIn','desc')
                        ->get()
                        ->result();
            }
            ELSE {
                IF(empty($altaHasta))$altaHasta = date('Y-m-d H:i:s');
                IF(empty($termino))$termino = date('Y-m-d H:i:s');
                return $this->db->select('*')
                    ->from('insumos_asignados')
                    ->join('insumos','insId=inaInsumo','left')
                    ->join('farmacos','idfarmaco=inaInsumo','left')
                    ->join('examenes','exaId=inaInsumo','left')
                    ->join('usuarios_panel','uspId=inaUsuario','left')
                    ->join('ficha_ugh_registro r','r.id=inaRegistro','left')
                    ->join('ficha_pacientes p','r.paciente=p.id','left')
                    ->where('r.fechaSalidaReal >=',$altaDesde)
                    ->where('r.fechaSalidaReal <=',$altaHasta)
                    ->where('r.fechaIngreso >=',$inicio)
                    ->where('r.fechaIngreso <=',$termino)
                    ->where('r.ficha >',0)
                    ->where('inaEstado != ',2)
                    ->where('inaInsumo != 35 and inaInsumo != 36 and inaInsumo != 37 and inaInsumo != 38 and inaInsumo != 39')
                    
                        ->order_by('r.dateIn','desc')
                        ->get()
                        ->result();
            }
        }
    }
    
    public function dameInsumosStock()
    {
        return $this->db->select('count(inaId)contar,inaInsumo')
                    ->from('insumos_asignados')
                    ->join('insumos','inaInsumo=insId','inner')
                    ->where('inaEstado !=',2)
                    ->where('inaInsumo != 35 and inaInsumo != 36 and inaInsumo != 37 and inaInsumo != 38 and inaInsumo != 39')
                    ->group_by('inaInsumo')
                    ->get()
                    ->result();
    }
     

    
}