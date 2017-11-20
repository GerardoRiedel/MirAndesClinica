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
        $this->load->model("ingreso_model");
        $this->load->model("prefacturas_model");
        $this->load->model("parametros_model");
        $this->load->model("enfermeria_model");
    }
    
    public function cargarPrefactura($paciente)
    {
        $id = $paciente;
        $data['datos']      = $this->ingreso_model->dameTodo($id);
        //die(var_dump($data));
        $data['prefacturas']= $this->prefacturas_model->dameUnoClinica($id);
        //die(var_dump($data['prefacturas']));
        $data['breadcumb']  = "Prefacturas";
        $data['title']      = "Prefacturas";
        
        $data['menu']       = "fichas";
        $data['submenu']    = "lfichas";
        Layout_Helper::cargaVista($this,'cargarPrefactura',$data,'ingresos');   
    }
    public function guardarPrefactura()
    {
        $registro       = $this->input->post('fichaElectro');
        $paciente       = $this->input->post('pacId');
        $reg = $this->ingreso_model->dameUno($registro);
        $fechaIngresoP  = new DateTime($this->input->post('fechaDesde'));
        $fechaIngreso   = $fechaIngresoP->format('Y-m-d');
        $fechaSalida    = new DateTime($this->input->post('fechaHasta'));
        $fechaSalida    = $fechaSalida->format('Y-m-d');
        //die(var_dump($reg->alta));
        IF($reg->alta==='si'){
                            $fechaSalida    = new DateTime($reg->fechaSalidaReal.$reg->horaSalidaReal);
                            $horaSalida     = $fechaSalida->format('H');
                            $fechaSalida    = $fechaSalida->format('Y-m-d');
                            //die($horaSalida);
                            IF($horaSalida >= 11){
                                $mas = 1;
                            }
                            ELSE{$mas = 0;
                            }
        }
        //die($fechaSalida);
        $fechaRegistroP = new DateTime($this->input->post('fechaIngreso'));
        $fechaRegistro  = $fechaRegistroP->format('Y-m-d');
        
        IF($fechaRegistroP > $fechaIngresoP)$fechaIngreso = $fechaRegistro;
        
        //$datetime1 = new DateTime($this->input->post('fechaDesde'));
        //$datetime2 = new DateTime($this->input->post('fechaHasta'));
        $datetime1 = new DateTime($fechaIngreso);
        $datetime2 = new DateTime($fechaSalida);
        $interval  = $datetime1->diff($datetime2);
        $dias       = $interval->format('%a');
        $dias       = $dias+$mas;
        
        IF($this->input->post('fechaHasta') <= $this->input->post('fechaDesde')){
            $dias = 0;
            $fechaSalida = $fechaIngreso;
        }
        //$dias   = abs(strtotime($fechaSalida) - strtotime($fechaIngreso));
        
        $g      = $this->input->post('ges');
        IF($g === '1')      {
            $valores = $this->parametros_model->dameUno('5');
            $num = $this->prefacturas_model->dameNPref('1');
            $num = $num->preNPrefactura+1;
            //$num += 1;
        }
        ELSEIF($g === '2')  {
            $valores = $this->parametros_model->dameUno('4');
            $num = $this->prefacturas_model->dameNPref('2');
            $num = $num->preNPrefactura+1;
            //$num += 1;
        }
        $p = $this->input->post('prefactura');
        IF(!empty($p)) $num = $this->input->post('prefactura');
        $valor = $valores->parValor;

        $this->prefacturas_model->preDesde          = $fechaIngreso;
        $this->prefacturas_model->preHasta           = $fechaSalida;
        $this->prefacturas_model->preRegistro       = $registro;
        $this->prefacturas_model->prePaciente       = $paciente;
        $this->prefacturas_model->preGes                = $g;
        $this->prefacturas_model->preUsuario        = $this->session->userdata('id_usuario');
        $this->prefacturas_model->preFechaRegistro  = date('Y-m-d H:i:s');
        $this->prefacturas_model->preValor              = $valor;
        
        $this->prefacturas_model->preNPrefactura    = $num;
        $this->prefacturas_model->preHonorarios     = $this->input->post('preHonorarios');
        $this->prefacturas_model->preCuidados       = $this->input->post('preCuidados');
        
        //$this->prefacturas_model->prePrefactura     = $pref;
        
        $this->prefacturas_model->preMirandesDias   = $dias;
        $this->prefacturas_model->guardarClinica();
        
        redirect(base_url().'clinica_admision/prefacturas/cargarPrefactura/'.$paciente);
    }
    public function eliminarPrefactura($id)
    {
        $registro       = $this->prefacturas_model->dameUnaPrefClinica($id);
        $this->prefacturas_model->preId             = $id;
        $this->prefacturas_model->preFechaRegistro  = date('Y-m-d H:i:s');
        $this->prefacturas_model->preUsuario        = $this->session->userdata('id_usuario');
        $this->prefacturas_model->preEstado         = '2';
        $this->prefacturas_model->guardarClinica();
        
        redirect(base_url().'clinica_admision/prefacturas/cargarPrefactura/'.$registro[0]->prePaciente);
    }
}