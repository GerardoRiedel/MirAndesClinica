<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Prefacturas extends CI_Controller {
    
     public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
        $this->load->helper('layout');
        
        $this->load->database('default');
        $this->folder = 'uploads/';
        $this->load->model("hd_model");
        $this->load->model("prefacturas_model");
        
    }
    public function listarPrefacturas()
    {
        $data['datos']      = $this->hd_model->dameIngresosHd();
        $data['breadcumb']  = "Prefacturas";
        $data['title']      = "Lista de Prefacturas";
        
        $data['menu']       = "prefacturas";
        $data['submenu']    = "lprefacturas";
        Layout_Helper::cargaVista($this,'listar_ingreso',$data,'hd');   
    }
    public function cargarPrefactura($id)
    {
        $data['datos']      = $this->hd_model->dameUno($id);
        $data['prefacturas']= $this->prefacturas_model->dameUno($id);
        $data['breadcumb']  = "Prefacturas";
        $data['title']      = "Prefacturas";
        
        $data['menu']       = "prefacturas";
        $data['submenu']    = "lprefacturas";
        Layout_Helper::cargaVista($this,'cargarPrefactura',$data,'hd');   
    }
    public function guardarPrefactura()
    {
        $registro       = $this->input->post('fichaElectro');
        
        $fechaIngresoP   = new DateTime($this->input->post('fechaDesde'));
        $fechaIngreso   = $fechaIngresoP->format('Y-m-d');
        $fechaSalida    = new DateTime($this->input->post('fechaHasta'));
        $fechaSalida    = $fechaSalida->format('Y-m-d');
        $programa = $this->input->post('programa');
        
        IF($programa !== '1'){
            $datos              = $this->hd_model->dameUno($registro);
            $asistencia         = $this->hd_model->dameAsistencia($datos->rut,$fechaIngreso,$fechaSalida);
            $nexos      = $asistencia[1]->cuenta;
            $mirandes   = $asistencia[0]->cuenta;
            
            $this->prefacturas_model->preNexosValor     = 29529;
            $this->prefacturas_model->preNexosDias      = $nexos;
            $this->prefacturas_model->preMirandesDias   = $mirandes;
        }
        $fechaRegistroP  = new DateTime($this->input->post('fechaIngreso'));
        $fechaRegistro  = $fechaRegistroP->format('Y-m-d');
        
        IF($fechaRegistroP > $fechaIngresoP)$fechaIngreso = $fechaRegistro;
              
        
        
        IF($programa === '1')$valor=34861;
        ELSEIF($programa === '2')$valor=28013;
        ELSEIF($programa === '3')$valor=31126;
        
        
        $this->prefacturas_model->preDesde      = $fechaIngreso;
        $this->prefacturas_model->preHasta      = $fechaSalida;
        $this->prefacturas_model->preRegistro   = $registro;
        $this->prefacturas_model->preFechaRegistro  = date('Y-m-d H:i:s');
        $this->prefacturas_model->preValor          = $valor;
        $this->prefacturas_model->preNPrefactura    = $this->input->post('prefactura');
        
        //$this->prefacturas_model->prePrefactura     = $pref;
        
        $this->prefacturas_model->prePrograma       = $this->input->post('programa');
        $this->prefacturas_model->preFolio          = $this->input->post('folio');
        $this->prefacturas_model->guardar();
        
        redirect(base_url().'hd_admision/prefacturas/cargarPrefactura/'.$registro);
    }
    public function eliminarPrefactura($id)
    {
        $registro       = $this->prefacturas_model->dameUnaPref($id);
        $this->prefacturas_model->preId             = $id;
        $this->prefacturas_model->preFechaRegistro  = date('Y-m-d H:i:s');
        $this->prefacturas_model->preUsuario        = $this->session->userdata('id_usuario');
        $this->prefacturas_model->preEstado         = '2';
        $this->prefacturas_model->guardar();
        
        redirect(base_url().'hd_admision/prefacturas/cargarPrefactura/'.$registro[0]->preRegistro);
    }
}