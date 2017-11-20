<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Herramientas extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();


        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
        $this->load->helper('layout');
        
        $this->load->database('default');
        $this->folder = 'uploads/';
        
        //$this->load->model("herramietas_model");	
        $this->load->model("parametros_model");
		
    }
    public function listar_parametros()
    {
        $data['datos']     = $this->parametros_model->dameTodo();
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Lista de Parametros";
        Layout_Helper::cargaVista($this,'listar_parametros',$data,'ingresos');   
    }
    public function cargar_parametro($id)
    {
        $data['datos']     = $this->parametros_model->dameUno($id);
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Lista de Parametros";
        Layout_Helper::cargaVista($this,'modificar_parametro',$data,'ingresos');   
    }
    
    public function guardarModificarParametro()
    {
        $this->parametros_model->parId      = $this->input->post('parId');
        $this->parametros_model->parValor   = $this->input->post('parValor');
        $this->parametros_model->guardar();
        $data['datos']     = $this->parametros_model->dameTodo();
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Lista de Parametros";
        Layout_Helper::cargaVista($this,'listar_parametros',$data,'ingresos');   
    }
    
    
    
    
    public function listar_regimen()
    {
        $data['datos']     = $this->parametros_model->dameTodoRegimen();
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Listado de Regimen";
        Layout_Helper::cargaVista($this,'listar_regimen',$data,'ingresos');   
    }
    public function cargar_regimen($id='')
    {
        IF (!empty($id)){
        $data['datos']     = $this->parametros_model->dameUnoRegimen($id);
        }
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Listado de Regimen";
        Layout_Helper::cargaVista($this,'modificar_regimen',$data,'ingresos');   
    }
    
    public function guardarModificarRegimen()
    {
        $regId = $this->input->post('regId');
        IF(!empty($regId)){
        $this->parametros_model->regId          = $regId;
        }
        $this->parametros_model->regNombre      = $this->input->post('regNombre');
        $this->parametros_model->regDescripcion = $this->input->post('regDescripcion');
        $this->parametros_model->guardarRegimen();
        
        $data['datos']     = $this->parametros_model->dameTodoRegimen();
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Lista de Regimen";
        Layout_Helper::cargaVista($this,'listar_regimen',$data,'ingresos');   
    }
}