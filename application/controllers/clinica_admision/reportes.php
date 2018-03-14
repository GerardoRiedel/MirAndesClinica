<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Reportes extends CI_Controller {
    
     public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
        $this->load->helper('layout');
        
        $this->load->database('default');
        $this->folder = 'uploads/';
        $this->load->model("ingreso_model");
        $this->load->model("enfermeria_model");
        $this->load->model("bancos_model");
        $this->load->model("reportes_model");
        
    }
    public function cargarEgresos()
    {
        $insumosAsignados = $this->reportes_model->dameIngresosInsumos(); 
        
        $data['datos'] = $insumosAsignados;
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Ingresos y egresos de insumos y examenes";
        
        $data['menu']       = "reportes";
        $data['submenu']    = "ireportes";
        Layout_Helper::cargaVista($this,'cargarInsumos',$data,'ingresos');   
    }
    public function filtroCargarEgresos()
    {
        $fechaDesde = $this->input->post('fechaDesde');
        $fechaHasta = $this->input->post('fechaHasta');
        $data['fechaDesde'] = $fechaDesde;
        IF(!empty($fechaHasta)) $data['fechaHasta'] = $fechaHasta;
        ELSE $data['fechaHasta'] = date('Y-m-d');
        $fechaDesdeAlta = $this->input->post('fechaDesdeAlta');
        $fechaHastaAlta = $this->input->post('fechaHastaAlta');
        //die($fechaDesdeAlta.'---'.$fechaHastaAlta);
        $filtro     = $this->input->post('filtro');
        $filtro     = str_replace(array(".","-"), "", $filtro);
        $letra      = substr($filtro,0,1);if ($letra === "1" || $letra === "2"){$filtro = substr($filtro, 0, 8);}else {$filtro = substr($filtro, 0, 7);}
        $data['datos']      = $this->reportes_model->dameIngresosInsumos($filtro,$fechaDesde,$fechaHasta,$fechaDesdeAlta,$fechaHastaAlta,$alta='no',$administrador='si');
        IF(!empty($filtro) || !empty($fechaDesde) || !empty($fechaDesdeAlta))$data['filtro'] = 'si';    
        $data['breadcumb']  = "Registros";
        $data['title']      = "Ingresos y egresos de insumos y examenes";
        $data['menu']       = "reportes";
        $data['submenu']    = "ireportes";
        Layout_Helper::cargaVista($this,'cargarInsumos',$data,'ingresos');   
    }
    public function cargarStock()
    {
        $insumos = $this->enfermeria_model->dameInsumos(); 
        $stock = $this->reportes_model->dameInsumosStock(); 
        //die(var_dump($stock));
        $data['insumos'] = $insumos;
        $data['stock'] = $stock;
        
        $data['breadcumb']  = "Stock";
        $data['title']      = "Stock de Insumos";
        
        $data['menu']       = "reportes";
        $data['submenu']    = "sreportes";
        Layout_Helper::cargaVista($this,'cargarStock',$data,'ingresos');   
    }
    
}