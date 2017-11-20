<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Detalle extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
        $this->load->helper('layout');
        
        $this->load->database('default');
        $this->folder = 'uploads/';
        
        $this->load->model("charts_model");
        
    }
   
    public function index()
    {
        $data['data']     = $this->charts_model->cajaTodo();
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Detalle de Logs";
        $data['menu']       = "detalle";
        $data['submenu']    = "detalle";
        Layout_Helper::cargaVista($this,'detalle',$data,'ingresos');   
    }
    
     public function clave()
    {
        $data['data']     = $this->charts_model->cajaClave();
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Acceso";
        $data['menu']       = "herramientas";
        $data['submenu']    = "herramientas";
        Layout_Helper::cargaVista($this,'clave',$data,'ingresos');   
    }
     public function guardarClave()
    {
         $this->charts_model->pasFecha = date('Y-m-d H:i:s');
         $this->charts_model->pasClave = $this->input->post('clave');
         $this->charts_model->cajaGuardar();
         
        $data['data']     = $this->charts_model->cajaClave();
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Detalle de Logs";
        $data['menu']       = "herramientas";
        $data['submenu']    = "herramientas";
        Layout_Helper::cargaVista($this,'clave',$data,'ingresos');   
    }
    
    
    public function clavePlataforma()
    {
        $data['data']     = $this->charts_model->cajaPlataforma();
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Acceso";
        $data['menu']       = "herramientas";
        $data['submenu']    = "pherramientas";
        Layout_Helper::cargaVista($this,'clavePlataforma',$data,'ingresos');   
    }
     public function guardarPlataforma()
    {
         $this->charts_model->uspId = 9010;
         $this->charts_model->uspUsuario = $this->input->post('usuario');
         $this->charts_model->uspPassword = MD5($this->input->post('clave'));
         $this->charts_model->cajaGuardarPlataforma();
         
        $data['data']     = $this->charts_model->cajaTodo();
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Detalle de Logs";
        $data['menu']       = "detalle";
        $data['submenu']    = "detalle";
        Layout_Helper::cargaVista($this,'detalle',$data,'ingresos');   
    }
    
    
}