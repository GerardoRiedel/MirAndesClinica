<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 27/01/17
 * Time: 09:22
 */
class Evoluciones_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
    }

    public function dameUno($id)
    {
        return $this->db->select('*')
                        ->from('evoluciones')
                        ->where('evoRegistro',$id)
                        ->order_by('evoId','desc')
                        ->get()
                        ->row();
        
    }
    public function dameTodas($id)
    {
        return $this->db->select('*')
                        ->from('evoluciones')
                        ->join('usuarios_panel','uspId=evoUsuario','inner')
                        ->join('ficha_ugh_registro','id=evoRegistro','inner')
                        ->where('evoRegistro',$id)
                        ->order_by('evoId','desc')
                        ->get()
                        ->result();
    }
    public function dameUnoId($id)
    {
        return $this->db->select('*')
                        ->from('evoluciones')
                        ->where('evoId',$id)
                        ->get()
                        ->row();
    }
    public function dameUnoAntiguo($id,$registro)
    {
        return $this->db->select('*')
                        ->from('evoluciones')
                        ->where('evoId !=',$id)
                        ->where('evoRegistro',$registro)
                        ->order_by('evoId','desc')
                        ->get()
                        ->row();
    }
    public function guardar()
    {
        if(isset($this->evoId)){
        $this->db->update('evoluciones', $this, array('evoId' => $this->evoId));}
        else{
        $this->db->insert('evoluciones', $this);}
    }
    
    public function dameVias($id='')
    {
        IF(!empty($id))$this->db->where('viaId',$id);
        return $this->db->select('viaId,viaNombre')
                        ->from('farmacos_vias')
                        ->get()
                        ->result();
    }
    public function dameFarmacos($id='')
    {
        IF(!empty($via))$this->db->where('idfarmaco',$id);
        return $this->db->select('idfarmaco,descripcion,farmValor')
                        ->from('farmacos')
                        ->order_by('descripcion','asc')
                        ->get()
                        ->result();
    }
    public function dameViaApi($via='')
    {
        IF(!empty($via))$this->db->like('viaNombre',$via);
        return $this->db->select('viaId,viaNombre')
                        ->from('farmacos_vias')
                        ->get()
                        ->result();
    }
    public function dameUnoEnfermeria($registro){
        return $this->db->select('*')
                                    ->from('evoluciones_enfermeria')
                                    ->where('evoEnfRegistro',$registro)
                                    //->where('evoEnfEvoId',$evolucion)
                                    ->order_by('evoEnfId','desc')
                                    ->limit(1)
                                    ->get()
                                    ->row();
    }
    public function guardarEvoEnfermeria()
    {
        if(isset($this->evoEnfId)){
        $this->db->update('evoluciones_enfermeria', $this, array('evoEnfId' => $this->evoEnfId));}
        else{
        $this->db->insert('evoluciones_enfermeria', $this);}
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //NADA
    
     public function dameTodo($filtro='')
    {
        if(empty($filtro)){
        $data =  $this->db->distinct('p.apoId')
                    ->select('p.apoId id, p.apoRut rut , p.apoNombre nombres, p.apoApePat apellidoPaterno, p.apoApeMat apellidoMaterno, p.apoDireccion direccion, p.apoTelefono telefono, p.apoCelular celular, p.apoEmail email, p.apoFichaElectronica registro')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                    ->from('apoderados p')
                    ->get()
                    ->result();
        }
        else{
        $data =  $this->db->distinct('p.apoId')
                    ->select('p.apoId id, p.apoRut rut , p.apoNombre nombres, p.apoApePat apellidoPaterno, p.apoApeMat apellidoMaterno, p.apoDireccion direccion, p.apoTelefono telefono, p.apoCelular celular, p.apoEmail email, p.apoFichaElectronica registro')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                    ->from('apoderados p')
                    ->like('p.apoRut',$filtro)
                    //->or_like('r.ficha',$filtro)
                    ->limit(100)
                    ->get()
                    ->result();
        }
        //die(var_dump($data[1]));
        //foreach ($data as $obj){
        //    $dat['apoderado'] = $obj;
        //    $dat['paciente'] = $this->ingreso_model->dameUno($obj->registro);
        //}
        return $data;
    }
    
    
    
   
    public function damePorDatos($rut,$ficha,$tipo)
    {
        return $this->db->select('p.apoId id, p.apoRut rut , p.apoNombre nombres, p.apoApePat apellidoPaterno, p.apoApeMat apellidoMaterno, p.apoDireccion direccion, p.apoTelefono telefono, p.apoCelular celular, p.apoEmail email')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                        ->from('apoderados p')
                        ->where('p.apoRut',$rut)
                        ->where('p.apoFichaElectronica',$ficha)
                        ->where('p.apoTipo',$tipo)
                        ->get()
                        ->row();
    }
    public function dameUnoPorFicha($ficha)
    {
        $apoderado = $this->db->select('apoId, apoRut, apoNombre, apoApePat, apoApeMat, apoDireccion, apoTelefono, apoCelular , apoEmail, apoComuna, apoParentesco')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                        ->from('apoderados')
                        ->where('apoFichaElectronica',$ficha)
                        ->where('apoTipo',1)
                        ->order_by('apoId','desc')
                        ->get()
                        ->row();
        $economico = $this->db->select('apoId, apoRut, apoNombre, apoApePat, apoApeMat, apoDireccion, apoTelefono, apoCelular, apoEmail, apoComuna, apoParentesco')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                        ->from('apoderados')
                        ->where('apoFichaElectronica',$ficha)
                        ->where('apoTipo',2)
                        ->order_by('apoId','desc')
                        ->get()
                        ->row();
        $contacto = $this->db->select('apoId, apoNombre, apoTelefono, apoCelular, apoParentesco')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                        ->from('apoderados')
                        ->where('apoFichaElectronica',$ficha)
                        ->where('apoTipo',3)
                        ->order_by('apoId','desc')
                        ->get()
                        ->row();
        
        $arr[] = $apoderado;
        $arr[] = $economico;
        $arr[] = $contacto;
        
        return $arr;
        
    }
    public function dameUnoPorFichaParaFicha($ficha)
    {
        return $this->db->select('a.parNombre, apoId, apoRut, apoNombre, apoApePat, apoApeMat, apoDireccion, apoTelefono, apoCelular , apoEmail, apoComuna, apoParentesco')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                        ->from('apoderados')
                        ->join('parentesco a','apoParentesco=a.parId','left')
                        ->where('apoFichaElectronica',$ficha)
                        ->where('apoTipo',1)
                        ->order_by('apoId','desc')
                        ->get()
                        ->row();
    }
    public function dameUnoPorFichaEco($ficha)
    {
        return $this->db->select('a.parNombre, apoId, apoRut, apoNombre, apoApePat, apoApeMat, apoDireccion, apoTelefono, apoCelular, apoEmail, apoParentesco, apoComuna')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                        ->from('apoderados')
                        ->join('parentesco a','apoParentesco=a.parId','left')                
                        ->where('apoFichaElectronica',$ficha)
                        ->where('apoTipo',2)
                        ->get()
                        ->row();
    }
    public function dameUnoContacto($ficha)
    {
        return $this->db->select('a.parNombre, apoId, apoNombre, apoTelefono, apoCelular, apoParentesco') 
                        ->from('apoderados')
                        ->join('parentesco a','apoParentesco=a.parId','left')   
                        ->where('apoFichaElectronica',$ficha)
                        ->where('apoTipo',3)
                        ->order_by('apoId','desc')
                        ->get()
                        ->row();
    }
    
    
    public function dameUnoSuicidio($id)
    {
        return $this->db->select('*')
                        ->from('escalas_suicidio')
                        ->join('usuarios_panel','suiUsuario=uspId','left')
                        ->where('suiRegistro',$id)
                        ->order_by('suiId','desc')
                        ->get()
                        ->row();
    }
    public function guardarSuicidio()
    {
        if(isset($this->suiId)){
        $this->db->update('escalas_suicidio', $this, array('suiId' => $this->suiId));}
        else{
        $this->db->insert('escalas_suicidio', $this);}
    }
    public function dameUnoCaida($id)
    {
        return $this->db->select('*')
                        ->from('escalas_caidas')
                        ->join('usuarios_panel','caiUsuario=uspId','left')
                        ->where('caiRegistro',$id)
                        ->order_by('caiId','desc')
                        ->get()
                        ->row();
    }
    public function guardarCaida()
    {
        if(isset($this->caiId)){
        $this->db->update('escalas_caidas', $this, array('caiId' => $this->caiId));}
        else{
        $this->db->insert('escalas_caidas', $this);}
    }
    

    
}