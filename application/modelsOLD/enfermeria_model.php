<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 17/02/17
 * Time: 13:32
 */
class Enfermeria_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
    }
    
    public function dameUno($id)
    {
        return $this->db->select('*')
                ->from('enfermeria')
                ->where('enfRegistro',$id)
                ->get()
                ->row();
    }
    public function dameUnoHD($id)
    {
        return $this->db->select('*')
                ->from('ficha_hd_enfermeria')
                ->where('enfRegistro',$id)
                ->order_by('enfId','desc')
                
                ->get()
                ->row();
    }
    public function guardarHD()
    {
        if(isset($this->enfId)){
        $this->db->update('ficha_hd_enfermeria', $this, array('enfId' => $this->enfId));}
        else{
        $this->db->insert('ficha_hd_enfermeria', $this);}
    }
    public function dameVias()
    {
        return $this->db->select('*')
                ->from('farmacos_vias')
                ->get()
                ->result();
    }
    public function guardar()
    {
        if(isset($this->enfId)){
        $this->db->update('enfermeria', $this, array('enfId' => $this->enfId));}
        else{
        $this->db->insert('enfermeria', $this);}
    }
    public function dameUnoMedicamento($id)
    {
        return $this->db->select('*')
                ->from('medicamentos_asignados')
                ->join('farmacos','idfarmaco=medFarmaco')
                ->where('medRegistro',$id)
                ->get()
                ->result();
    }
    
    public function dameUltimoMedicamento()
    {
        return $this->db->select('medId')
                ->from('medicamentos_asignados')
                ->join('farmacos','idfarmaco=medFarmaco')
                ->order_by('medId','desc')
                ->get()
                ->row();
    }
    public function guardarMedicamentoAsignar()
    {
        if(isset($this->medId)){
        $this->db->update('medicamentos_asignados', $this, array('medId' => $this->medId));}
        else{
        $this->db->insert('medicamentos_asignados', $this);}
    }
    public function guardarMedicamentoAdministrado()
    {
        if(isset($this->medAdmId)){
        $this->db->update('medicamentos_administrado', $this, array('medAdmId' => $this->medAdmId));}
        else{
        $this->db->insert('medicamentos_administrado', $this);}
    }
    public function dameUnoAdmin($id)
    {
        return $this->db->select('*')
                ->from('medicamentos_administrado')
                ->join('medicamentos_asignados','medId=medAdmMedicamento','left')
                ->join('farmacos','idfarmaco=medFarmaco')
                ->join('estados','medAdmEstado=estId')
                ->join('farmacos_vias','medAdmVia=viaId')
                ->where('medAdmId',$id)
                ->get()
                ->row();
    }
    public function dameTodosAdmin($id)
    {
        return $this->db->select('*')
                ->from('medicamentos_administrado')
                ->join('medicamentos_asignados','medId=medAdmMedicamento','left')
                ->join('farmacos','idfarmaco=medFarmaco')
                ->join('estados','medAdmEstado=estId')
                ->join('farmacos_vias','medAdmVia=viaId')
                ->where('medAdmRegistro',$id)
                ->where('medAdmEstado != 5')
                //->group_by('idfarmaco')
                ->order_by('medAdmId','asc')
                ->get()
                ->result();
    }
    public function dameTodosSuspender($id,$farmaco)
    {
        return $this->db->select('*')
                ->from('medicamentos_administrado')
                ->join('medicamentos_asignados','medId=medAdmMedicamento','left')
                ->join('farmacos','idfarmaco=medFarmaco')
                ->join('estados','medAdmEstado=estId')
                ->join('farmacos_vias','medAdmVia=viaId')
                ->where('medAdmRegistro',$id)
                ->where('medAdmMedicamento',$farmaco)
                //->group_by('idfarmaco')
                ->order_by('medAdmId','asc')
                ->get()
                ->result();
    }
    public function dameTodosAdminEvolucion($id)
    {
        return $this->db->select('medAdmId,medAdmRegistro,medAdmHora,descripcion,idfarmaco,medAdmEstado,viaNombre')
                ->from('medicamentos_administrado')
                ->join('medicamentos_asignados','medId=medAdmMedicamento','left')
                ->join('farmacos','idfarmaco=medFarmaco')
                ->join('estados','medAdmEstado=estId')
                ->join('farmacos_vias','medAdmVia=viaId')
                ->where('medAdmRegistro',$id)
                ->where('medAdmEstado != 5')
                //->group_by('idfarmaco')
                ->order_by('medAdmMedicamento','asc')
                ->order_by('medAdmHora','asc')
                //->group_by('idfarmaco')
                //->order_by('medAdmId','asc')
                ->get()
                ->result();
        //die(var_dump($return));
    }
    public function dameTodosAdminHoras($id)
    {
        $primera = $this->db->select('medAdmHora')
                ->from('medicamentos_administrado')
                ->join('medicamentos_asignados','medId=medAdmMedicamento','left')
                ->where('medAdmRegistro',$id)
                 ->where('medAdmEstado != 5')
                ->order_by('medAdmHora','asc')
                ->limit(1)
                ->get()
                ->row();
        $ultima = $this->db->select('medAdmHora')
                ->from('medicamentos_administrado')
                ->join('medicamentos_asignados','medId=medAdmMedicamento','left')
                ->where('medAdmRegistro',$id)
                ->where('medAdmEstado != 5')
                ->order_by('medAdmHora','desc')
                ->limit(1)
                ->get()
                ->row();
        $arr[] = $primera;
        $arr[] = $ultima;
        return $arr;
    }
    public function dameTodosAdminFarmacos($id)
    {
        return $this->db->select('medAdmMedicamento,descripcion')
                ->from('medicamentos_administrado')
                ->join('medicamentos_asignados','medId=medAdmMedicamento','left')
                ->join('farmacos','idfarmaco=medFarmaco')
                ->where('medAdmRegistro',$id)
                ->group_by('medAdmMedicamento')
                ->order_by('medAdmMedicamento','asc')
                ->get()
                ->result();
    }
    public function dame_medicamento_porVencer()
    {
        $fecha = date('Y-m-d H:i:s');
        $fecha = strtotime ('+1 hours',strtotime($fecha));
        $fecha = date('Y-m-d H:i:s',$fecha);//die($fecha);
        return $this->db->select('p.nombres,p.apellidoPaterno,p.apellidoMaterno,p.rut,r.ficha,medAdmHora,viaId,viaNombre,idfarmaco,descripcion,medAdmEstado,medAdmRegistro,medAdmVia,medAdmId,medFechaRegistro,medHora')
                ->from('medicamentos_administrado')
                ->join('medicamentos_asignados','medId=medAdmMedicamento')
                ->join('farmacos','idfarmaco=medFarmaco')
                ->join('estados','medAdmEstado=estId')
                ->join('farmacos_vias','medAdmVia=viaId')
                ->join('ficha_ugh_registro r','medAdmRegistro=id')
                ->join('ficha_pacientes p','r.paciente=p.id')
                ->where('medAdmEstado',0)
                ->where('medAdmHora <= "'.$fecha.'"')
                //->group_by('idfarmaco')
                ->order_by('medAdmId','asc')
                ->get()
                ->result();
    }
    
    public function dameInsumos()
    {
        return $this->db->select('*')
                    ->from('insumos')
                    ->order_by('insNombre','asc')
                    ->get()
                    ->result();
    }
    public function dameExamenes()
    {
        return $this->db->select('*')
                    ->from('examenes')
                    ->order_by('exaNombre','asc')
                    ->get()
                    ->result();
    }
    public function dameInsumosAsignados($id)
    {
        return $this->db->select('*')
                    ->from('insumos_asignados')
                    ->join('insumos','insId=inaInsumo','left')
                    ->join('farmacos','idfarmaco=inaInsumo','left')
                    ->join('examenes','exaId=inaInsumo','left')
                    ->join('usuarios_panel','uspId=inaUsuario')
                    ->where('inaRegistro',$id)
                    ->where('inaEstado',1)
                    ->get()
                    ->result();
    }
    
    public function guardarInsumosAsignados()
    {
        if(isset($this->inaId)){
        $this->db->update('insumos_asignados', $this, array('inaId' => $this->inaId));}
        else{
        $this->db->insert('insumos_asignados', $this);}
    }
    
    public function dameUnoInsumoAsignado($id)
    {
        return $this->db->select('*')
                    ->from('insumos_asignados')
                    ->join('insumos','insId=inaInsumo','left')
                    ->join('farmacos','idfarmaco=inaInsumo','left')
                    ->join('examenes','exaId=inaInsumo','left')
                    ->join('usuarios_panel','uspId=inaUsuario')
                    ->where('inaId',$id)
                    ->get()
                    ->row();
    }
}