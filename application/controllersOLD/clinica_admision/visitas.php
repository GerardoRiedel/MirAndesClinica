<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Visitas extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();


        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
        $this->load->helper('layout');
        
        $this->load->database('default');
        $this->folder = 'uploads/';
        
        $this->load->model("ingreso_model");
        $this->load->model("visitas_model");
    }
    public function inicio()
    {
        $data['datos']      = $this->ingreso_model->dameIngresos();
        $data['ultimo']     = $this->ingreso_model->dameUltimo();
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Inicio";
        
        $data['menu']       = "visitas";
        $data['submenu']    = "nvisitas";
        Layout_Helper::cargaVista($this,'listar_ingreso',$data,'ingresos');   
    }
    public function cargarVisita($id)
    {
        $data['datos']      = $this->ingreso_model->dameUno($id);
        IF($data['datos']->fechaNacimiento !== '0000-00-00')$edad = $this->calculaedad($data['datos']->fechaNacimiento);
        ELSE $edad = '-';
        $data['edad']       = $edad;
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Datos de Visitas";
        
        $data['menu']       = "visitas";
        $data['submenu']    = "nvisitas";
        Layout_Helper::cargaVista($this,'cargarVisita',$data,'ingresos');   
    }
    public function guardarVisita()
    {
        $rut        = str_replace(array(".","-"), "", $this->input->post('visRut'));
        $letra      = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
        
        $this->visitas_model->visRegistro       = $this->input->post('fichaElectro');
        $this->visitas_model->visFechaRegistro  = date('Y-m-d H:i:s');
        $this->visitas_model->visRut            = $rut;
        $this->visitas_model->visNombre         = $this->input->post('visNombre');
        $this->visitas_model->visHora           = $this->input->post('visHora');
        $this->visitas_model->guardar();
        
        $id                 = $this->input->post('fichaElectro');
        $data['datos']      = $this->ingreso_model->dameUno($id);
        $data['visita']     = $this->visitas_model->dameUltimo();
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Ficha de Ingreso";
        $data['menu']       = "visitas";
        $data['submenu']    = "nvisitas";
        Layout_Helper::cargaVista($this,'imprimirImprimir',$data,'ingresos'); 
    }
    function calculaedad($fecha){
        $date2  = date('Y-m-d');//
        $diff   = abs(strtotime($date2) - strtotime($fecha));
        $years  = floor($diff / (365*60*60*24));
        //$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        //$days   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        return $years;
    }
}
