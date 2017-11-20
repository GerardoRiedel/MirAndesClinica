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
    public function listar_farmacos()
    {
        $data['datos']     = $this->parametros_model->dameTodoFarmaco();
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Lista de Parametros";
        $data['menu']       = "herramientas";
        $data['submenu']    = "fherramientas";
        Layout_Helper::cargaVista($this,'listar_farmacos',$data,'ingresos');   
    }
    public function cargar_farmacos($id='')
    {
        IF(!empty($id)){
            $data['datos']     = $this->parametros_model->dameUnoFarmaco($id);
        }
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Lista de Parametros";
        
        $data['menu']       = "herramientas";
        $data['submenu']    = "fherramientas";
        Layout_Helper::cargaVista($this,'modificar_farmacos',$data,'ingresos');   
    }
    
    public function guardarModificarFarmaco()
    {
        $idfarmaco = $this->input->post('idfarmaco');
        IF(!empty($idfarmaco)){
        $this->parametros_model->idfarmaco      = $idfarmaco;
        }
        //$this->parametros_model->idfarmaco      = $this->input->post('idfarmaco');
        $this->parametros_model->descripcion    = $this->input->post('descripcion');
        $this->parametros_model->farmValor      = $this->input->post('valor');
        $this->parametros_model->estado         = 1;
        $this->parametros_model->guardarFarmaco();
        $data['datos']     = $this->parametros_model->dameTodoFarmaco();
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Lista de Parametros";
        
        $data['menu']       = "herramientas";
        $data['submenu']    = "fherramientas";
        Layout_Helper::cargaVista($this,'listar_farmacos',$data,'ingresos');   
    }
    
    
    
    
    public function listar_regimen()
    {
        $data['datos']     = $this->parametros_model->dameTodoRegimen();
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Listado de Regimen";
        $data['menu']       = "herramientas";
        $data['submenu']    = "rherramientas";
        Layout_Helper::cargaVista($this,'listar_regimen',$data,'ingresos');   
    }
    public function cargar_regimen($id='')
    {
        IF (!empty($id)){
        $data['datos']     = $this->parametros_model->dameUnoRegimen($id);
        }
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Listado de Regimen";
        $data['menu']       = "herramientas";
        $data['submenu']    = "rherramientas";
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
        $data['menu']       = "herramientas";
        $data['submenu']    = "rherramientas";
        Layout_Helper::cargaVista($this,'listar_regimen',$data,'ingresos');   
    }
    
    public function listar_examenes()
    {
        $data['datos']     = $this->parametros_model->dameTodoExamenes();
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Lista de Exámenes";
        $data['menu']       = "herramientas";
        $data['submenu']    = "eherramientas";
        Layout_Helper::cargaVista($this,'listar_examenes',$data,'ingresos');   
    }
    public function cargar_examenes($id='')
    {
        IF(!empty($id)){
            $data['datos']     = $this->parametros_model->dameUnoExamenes($id);
        }
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Lista de Exámenes";
        
        $data['menu']       = "herramientas";
        $data['submenu']    = "eherramientas";
        Layout_Helper::cargaVista($this,'modificar_examenes',$data,'ingresos');   
    }
    
    public function guardarModificarExamenes()
    {
        $exaId = $this->input->post('exaId');
        IF(!empty($exaId)){
        $this->parametros_model->exaId      = $exaId;
        }
        $this->parametros_model->exaCodigo  = $this->input->post('exaCodigo');
        
        $this->parametros_model->exaValor   = $this->input->post('exaValor');
        $this->parametros_model->exaNombre  = $this->input->post('exaNombre');
        $this->parametros_model->exaEstado  = 1;
        $this->parametros_model->guardarExamen();
        $data['datos']     = $this->parametros_model->dameTodoExamenes();
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Lista de Exámenes";
        
        $data['menu']       = "herramientas";
        $data['submenu']    = "eherramientas";
        Layout_Helper::cargaVista($this,'listar_examenes',$data,'ingresos');   
    }
    public function listar_insumos()
    {
        $data['datos']     = $this->parametros_model->dameTodoInsumos();
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Lista de Insumos";
        $data['menu']       = "herramientas";
        $data['submenu']    = "iherramientas";
        Layout_Helper::cargaVista($this,'listar_insumos',$data,'ingresos');   
    }
    public function cargar_insumos($id='')
    {
        IF(!empty($id)){
            $data['datos']     = $this->parametros_model->dameUnoInsumos($id);
        }
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Lista de Insumos";
        
        $data['menu']       = "herramientas";
        $data['submenu']    = "iherramientas";
        Layout_Helper::cargaVista($this,'modificar_insumos',$data,'ingresos');   
    }
    
    public function guardarModificarInsumos()
    {
        $insId = $this->input->post('insId');
        IF(!empty($insId)){
        $this->parametros_model->insId      = $insId;
        }
        $this->parametros_model->insValor   = $this->input->post('insValor');
        $this->parametros_model->insNombre  = $this->input->post('insNombre');
        $this->parametros_model->insEstado  = 1;
        $this->parametros_model->guardarInsumo();
        $data['datos']     = $this->parametros_model->dameTodoInsumos();
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Lista de Insumos";
        
        $data['menu']       = "herramientas";
        $data['submenu']    = "iherramientas";
        Layout_Helper::cargaVista($this,'listar_insumos',$data,'ingresos');   
    }
}