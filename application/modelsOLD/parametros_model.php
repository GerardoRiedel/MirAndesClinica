<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 20/09/16
 * Time: 09:22
 */
class Parametros_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
    }

    public function dameTodo()
    {
        return $this->db->select('parId, parNombre, parValor, parDescripcion, parUnidad')
                        ->from('parametros')
                        ->where('parMostrar',1)
                        ->get()
                        ->result();
    }

    public function dameUno($id)
    {
        return $this->db->select('parId, parNombre, parValor')
                        ->from('parametros')
                        ->where('parId',$id)
                        ->get()
                        ->row();
    }

    public function dameValor($parametro)
    {
        $row = $this->db->select('parValor')
                        ->from('parametros')
                        ->where('parNombre',$parametro)
                        ->get()
                        ->row();

        return !empty($row->parValor) ? $row->parValor : 0;
    }

    public function guardar()
    {
        if(isset($this->parId))
            $this->db->update('parametros', $this, array('parId' => $this->parId));
        else
            $this->db->insert('parametros', $this);
    }

    public function eliminar()
    {
        $this->db->where('parId', $this->parId);
        $this->db->delete('parametros');
    }
    
    public function dameTodoRegimen()
    {
        return $this->db->select('regId, regNombre, regDescripcion')
                        ->from('regimenes')
                        ->get()
                        ->result();
    }
    public function dameUnoRegimen($id)
    {
        return $this->db->select('regId, regNombre, regDescripcion')
                        ->from('regimenes')
                        ->where('regId',$id)
                        ->get()
                        ->row();
    }
    public function guardarRegimen()
    {
        if(isset($this->regId))
            $this->db->update('regimenes', $this, array('regId' => $this->regId));
        else
            $this->db->insert('regimenes', $this);
    }
    public function dameDerivacion()
    {
        return $this->db->select('derId, derNombre')
                        ->from('derivaciones')
                        ->get()
                        ->result();
    }
    
    
    
    public function dameTodoFarmaco()
    {
        return $this->db->select('descripcion, idfarmaco, estado, farmValor')
                        ->from('farmacos')
                        ->order_by('descripcion','asc')
                        ->get()
                        ->result();
    }
    public function dameUnoFarmaco($id)
    {
        return $this->db->select('idfarmaco, descripcion, estado, farmValor')
                        ->from('farmacos')
                        ->where('idfarmaco',$id)
                        ->get()
                        ->row();
    }
     public function guardarFarmaco()
    {
        if(isset($this->idfarmaco))
            $this->db->update('farmacos', $this, array('idfarmaco' => $this->idfarmaco));
        else
            $this->db->insert('farmacos', $this);
    }
    
    public function guardarExamen()
    {
        if(isset($this->exaId))
            $this->db->update('examenes', $this, array('exaId' => $this->exaId));
        else
            $this->db->insert('examenes', $this);
    }
    public function dameTodoExamenes()
    {
        return $this->db->select('exaId, exaNombre, exaValor,exaEstado,exaCodigo')
                        ->from('examenes')
                        ->get()
                        ->result();
    }
    public function dameUnoExamenes($id)
    {
        return $this->db->select('exaId, exaNombre, exaValor,exaEstado')
                        ->from('examenes')
                        ->where('exaId',$id)
                        ->get()
                        ->row();
    }
   
    
    
    public function guardarInsumo()
    {
        if(isset($this->insId))
            $this->db->update('insumos', $this, array('insId' => $this->insId));
        else
            $this->db->insert('insumos', $this);
    }
    public function dameTodoInsumos()
    {
        return $this->db->select('insId, insNombre, insValor,insEstado')
                        ->from('insumos')
                        ->get()
                        ->result();
    }
    public function dameUnoInsumos($id)
    {
        return $this->db->select('insId, insNombre, insValor,insEstado')
                        ->from('insumos')
                        ->where('insId',$id)
                        ->get()
                        ->row();
    }
    
    
    ///ULTIMOS PARA CHEQUEAR
    public function dameUltimoInsumo()
    {
        return $this->db->select('insId')
                        ->from('insumos')
                        ->order_by('insId','desc')
                        ->get()
                        ->row();
    }
    public function dameUltimoExamen()
    {
        return $this->db->select('exaId')
                        ->from('examenes')
                        ->order_by('exaId','desc')
                        ->get()
                        ->row();
    }
    public function dameUltimoFarmaco()
    {
        return $this->db->select('idfarmaco')
                        ->from('farmacos')
                        ->order_by('idfarmaco','desc')
                        ->get()
                        ->row();
    }
    
    
    
    ///CHEQUEAR POR NOMBRE
    public function dameNombreInsumo($nombre)
    {
        return $this->db->select('insId')
                        ->from('insumos')
                        ->like('insNombre',$nombre,'after')
                        ->get()
                        ->row();
    }
    public function dameNombreExamen($nombre)
    {
        return $this->db->select('exaId')
                        ->from('examenes')
                        ->like('exaNombre',$nombre,'after')
                        ->get()
                        ->row();
    }
    public function dameNombreFarmaco($nombre)
    {
        return $this->db->select('idfarmaco,descripcion')
                        ->from('farmacos')
                        ->like('descripcion',$nombre,'after')
                        ->get()
                        ->row();
    }
}