<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Salidas extends CI_Controller {
    
     public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
        $this->load->helper('layout');
        
        $this->load->database('default');
        $this->folder = 'uploads/';
        $this->load->model("hd_model");
        
    }
    public function cargarSalida($id)
    {
        $data['datos']      = $this->hd_model->dameUno($id);
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Datos de Salida";
        
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarSalida',$data,'hd');   
    }
    public function guardarSalida()
    {
        $registro                               = $this->input->post('fichaElectro');
        $horaSalida                             = $this->input->post('horaSalida');
        $fechaIngreso                           = new DateTime($this->input->post('fechaIngreso'));
        $fechaIngreso                           = $fechaIngreso->format('Y-m-d');
        $fechaSalida                            = new DateTime($this->input->post('fechaSalida'));
        $fechaSalida                            = $fechaSalida->format('Y-m-d');
        
        IF ($fechaIngreso === '0000-00-00' || $fechaSalida === '0000-00-00')redirect(base_url().'clinica_admision/salidas/cargarSalida/'.$registro);
        IF ($horaSalida === '00:00:00')$horaSalida = date('H:i:s');
        IF ($this->input->post('alta') === 'on') $this->hd_model->alta='si'; ELSE $this->hd_model->alta='no';
        $this->hd_model->id                = $registro;
        $this->hd_model->fechaIngreso      = $fechaIngreso;
        $this->hd_model->horaIngreso       = $this->input->post('horaIngreso');
        $this->hd_model->fechaSalidaReal   = $fechaSalida;
        $this->hd_model->horaSalidaReal    = $this->input->post('horaSalida');
        $this->hd_model->guardar();
        
        redirect(base_url().'hd_admision/impresiones/cargarImprimir/'.$registro);
    }
}