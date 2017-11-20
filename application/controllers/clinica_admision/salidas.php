<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Salidas extends CI_Controller {
    
     public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
        $this->load->helper('layout');
        
        $this->load->database('default');
        $this->folder = 'uploads/';
        $this->load->model("ingreso_model");
        
    }
    public function cargarSalida($id)
    {
        $data['datos']      = $this->ingreso_model->dameUno($id);
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Datos de Salida";
        
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarSalida',$data,'ingresos');   
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
        $this->ingreso_model->id                = $registro;
        $this->ingreso_model->fechaIngreso      = $fechaIngreso;
        $alta = $this->input->post('alta');
        IF($alta === 'on')$this->ingreso_model->alta = 'si';
        ELSE $this->ingreso_model->alta = 'no';
        
        $this->ingreso_model->horaIngreso       = $this->input->post('horaIngreso');
        $this->ingreso_model->fechaSalidaReal   = $fechaSalida;
        $this->ingreso_model->horaSalidaReal    = $this->input->post('horaSalida');
        $this->ingreso_model->guardar($registro);
        
        redirect(base_url().'clinica_admision/ingresos/listarIngreso');
    }
}