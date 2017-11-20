<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 21/09/16
 * Time: 09:22
 */
class Apoderados_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
        $this->load->model("ingreso_model");
    }

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
    
    
    public function dameUno($rut)
    {
        return $this->db->select('a.parNombre, p.apoParentesco, p.apoId id, p.apoRut rut , p.apoNombre nombres, p.apoApePat apellidoPaterno, p.apoApeMat apellidoMaterno, p.apoDireccion direccion, p.apoTelefono telefono, p.apoCelular celular, p.apoEmail email, apoComuna comId, c.comuna comNombre')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                        ->from('apoderados p')
                        ->join('ficha_comunas c','p.apoComuna=c.id','left')
                        ->join('parentesco a','p.apoParentesco=a.parId','left')
                        ->where('p.apoRut',$rut)
                        ->get()
                        ->row();
    }
    
    public function dameUnoId($id)
    {
        return $this->db->select('p.apoId id, p.apoRut rut , p.apoNombre nombres, p.apoApePat apellidoPaterno, p.apoApePat apellidoMaterno, p.apoDireccion direccion, p.apoTelefono telefono, p.apoCelular celular, p.apoEmail email, apoComuna comId')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                        ->from('apoderados p')
                        ->where('p.apoId',$id)
                        ->get()
                        ->row();
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
        $apoderado = $this->db->select('apoId, apoRut, apoNombre, apoApePat, apoApeMat, apoDireccion, apoTelefono, apoCelular , apoEmail, apoComuna, apoParentesco, comuna')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                        ->from('apoderados')
                        ->join('ficha_comunas','apoComuna=id','left')
                        ->where('apoFichaElectronica',$ficha)
                        ->where('apoTipo',1)
                        ->order_by('apoId','desc')
                        ->get()
                        ->row();
        $economico = $this->db->select('apoId, apoRut, apoNombre, apoApePat, apoApeMat, apoDireccion, apoTelefono, apoCelular, apoEmail, apoComuna, apoParentesco, comuna')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                        ->from('apoderados')
                        ->join('ficha_comunas','apoComuna=id','left')
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
    public function dameUnoPorFichaHd($ficha)
    {
        $apoderado = $this->db->select('apoId, apoRut, apoNombre, apoApePat, apoApeMat, apoDireccion, apoTelefono, apoCelular , apoEmail, apoComuna, apoParentesco, comuna')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                        ->from('apoderados')
                        ->join('ficha_comunas','apoComuna=id','left')
                        ->where('apoFichaElectronica',$ficha)
                        ->where('apoTipo',111)
                        ->order_by('apoId','desc')
                        ->get()
                        ->row();
        $economico = $this->db->select('apoId, apoRut, apoNombre, apoApePat, apoApeMat, apoDireccion, apoTelefono, apoCelular, apoEmail, apoComuna, apoParentesco, comuna')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                        ->from('apoderados')
                        ->join('ficha_comunas','apoComuna=id','left')
                        ->where('apoFichaElectronica',$ficha)
                        ->where('apoTipo',112)
                        ->order_by('apoId','desc')
                        ->get()
                        ->row();
        $contacto = $this->db->select('apoId, apoNombre, apoTelefono, apoCelular, apoParentesco')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                        ->from('apoderados')
                        ->where('apoFichaElectronica',$ficha)
                        ->where('apoTipo',113)
                        ->order_by('apoId','desc')
                        ->get()
                        ->row();
        
        $arr[] = $apoderado;
        $arr[] = $economico;
        $arr[] = $contacto;
        
        return $arr;
        
    }
    public function dameUnoPorFichaTEC($ficha)
    {
        $apoderado = $this->db->select('apoId, apoRut, apoNombre, apoApePat, apoApeMat, apoDireccion, apoTelefono, apoCelular , apoEmail, apoComuna, apoParentesco, comuna')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                        ->from('apoderados')
                        ->join('ficha_comunas','apoComuna=id','left')
                        ->where('apoFichaElectronica',$ficha)
                        ->where('apoTipo',11)
                        ->order_by('apoId','desc')
                        ->get()
                        ->row();
        $economico = $this->db->select('apoId, apoRut, apoNombre, apoApePat, apoApeMat, apoDireccion, apoTelefono, apoCelular, apoEmail, apoComuna, apoParentesco, comuna')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                        ->from('apoderados')
                        ->join('ficha_comunas','apoComuna=id','left')
                        ->where('apoFichaElectronica',$ficha)
                        ->where('apoTipo',12)
                        ->order_by('apoId','desc')
                        ->get()
                        ->row();
        $contacto = $this->db->select('apoId, apoNombre, apoTelefono, apoCelular, apoParentesco')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                        ->from('apoderados')
                        ->where('apoFichaElectronica',$ficha)
                        ->where('apoTipo',13)
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
        return $this->db->select('a.parNombre, apoId, apoRut, apoNombre, apoApePat, apoApeMat, apoDireccion, apoTelefono, apoCelular , apoEmail, apoComuna, apoParentesco, comuna')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                        ->from('apoderados')
                        ->join('parentesco a','apoParentesco=a.parId','left')
                        ->join('ficha_comunas','apoComuna=id','left')
                        ->where('apoFichaElectronica',$ficha)
                        ->where('apoTipo',1)
                        ->order_by('apoId','desc')
                        ->get()
                        ->row();
    }
    public function dameUnoPorFichaParaFichaHD($ficha)
    {
        return $this->db->select('a.parNombre, apoId, apoRut, apoNombre, apoApePat, apoApeMat, apoDireccion, apoTelefono, apoCelular , apoEmail, apoComuna, apoParentesco, comuna')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                        ->from('apoderados')
                        ->join('parentesco a','apoParentesco=a.parId','left')
                        ->join('ficha_comunas','apoComuna=id','left')
                        ->where('apoFichaElectronica',$ficha)
                        ->where('apoTipo',111)
                        ->order_by('apoId','desc')
                        ->get()
                        ->row();
    }
    public function dameUnoPorFichaParaFichaTEC($ficha)
    {
        return $this->db->select('a.parNombre, apoId, apoRut, apoNombre, apoApePat, apoApeMat, apoDireccion, apoTelefono, apoCelular , apoEmail, apoComuna, apoParentesco, comuna')//, c.id comId, c.comuna comNombre')//i.isapre isaNombre, i.id isaId, 
                        ->from('apoderados')
                        ->join('parentesco a','apoParentesco=a.parId','left')
                        ->join('ficha_comunas','apoComuna=id','left')
                        ->where('apoFichaElectronica',$ficha)
                        ->where('apoTipo',11)
                        ->order_by('apoId','desc')
                        ->get()
                        ->row();
    }
    public function dameUnoContactoTEC($ficha)
    {
        $apo =  $this->db->select('a.parNombre, apoId, apoNombre, apoTelefono, apoCelular, apoParentesco') 
                        ->from('apoderados')
                        ->join('parentesco a','apoParentesco=a.parId','left')   
                        ->where('apoFichaElectronica',$ficha)
                        ->where('apoTipo',13)
                        ->order_by('apoId','desc')
                        ->get()
                        ->row();
        IF(empty($apo)){
            $apo =  $this->db->select('a.parNombre, apoId, apoNombre, apoTelefono, apoCelular, apoParentesco') 
                        ->from('apoderados')
                        ->join('parentesco a','apoParentesco=a.parId','left')   
                        ->where('apoFichaElectronica',$ficha)
                        ->where('apoTipo',3)
                        ->order_by('apoId','desc')
                        ->get()
                        ->row();
        }
        return $apo;
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
    
    public function guardar()
    {
        if(isset($this->apoId)){
        $this->db->update('apoderados', $this, array('apoId' => $this->apoId));}
        else{
        $this->db->insert('apoderados', $this);}
    }

    
}