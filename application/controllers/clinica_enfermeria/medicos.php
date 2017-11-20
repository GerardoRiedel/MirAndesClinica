<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Medicos extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
        $this->load->helper('layout');
        
        $this->load->database('default');
        $this->folder = 'uploads/';
        
        $this->load->model("comunas_model");
        $this->load->model("pacientes_model");
        $this->load->model("isapres_model");
        $this->load->model("ingreso_model");
        $this->load->model("profesionales_model");
        $this->load->model("licencias_model");
        $this->load->model("bancos_model");
        $this->load->model("parametros_model");
        $this->load->model("evoluciones_model");
        $this->load->model("enfermeria_model");
		
    }
    public function cargarNuevoControl($idPaciente)
    {
        $var = explode('_',$idPaciente);
        $idPaciente = $var[0];
            IF(!empty($var[1]))$data['control']=$this->profesionales_model->dameUnoControl($var[1]);
            //die(var_dump($data['control']));
        $data['vias']       = $this->evoluciones_model->dameVias();
        $data['farmacos']   = $this->evoluciones_model->dameFarmacos();
        
        $data['datos']      = $this->ingreso_model->dameTodo($idPaciente);
        $data['regimen']    = $this->pacientes_model->dameRegimen();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['medico']     = $this->profesionales_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Nuevo Control Médico";
        
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarNuevoControl',$data,'clinica');   
    }
    public function guardarNuevoControl()
    {
        $registro       = $this->input->post('registro');
        $rut                = $this->input->post('rut');
        $id                 = $this->input->post('id');
        IF(!empty($id)){
            $this->profesionales_model->id = $id;
            $this->profesionales_model->fechaEdicion = date('Y-m-d H:i:s');
        } ELSE {
            $this->profesionales_model->fechaEdicion = date('Y-m-d H:i:s');
            $this->profesionales_model->fechaCreacion = date('Y-m-d H:i:s');
        }
        
        $profesional = $this->profesionales_model->dameIdProfesional($this->session->userdata('rut'));
        IF(!empty($profesional)){
            $this->profesionales_model->profesionalId = $profesional->id;
            $this->profesionales_model->profesionalNombre = $profesional->nombres.'  '. $profesional->apellidoPaterno.'  '. $profesional->apellidoMaterno;
            $this->profesionales_model->profesionalRut = $profesional->rut;
        }
        $this->profesionales_model->registro = $registro;
        $this->profesionales_model->evaluacion  = $this->input->post('evaluacion');
        $this->profesionales_model->tipoReposo  = $this->input->post('tipoReposo');
        $this->profesionales_model->usuario = $this->session->userdata('id_usuario');
        $this->profesionales_model->medicamentos  = $this->input->post('medicamentos');
        $this->profesionales_model->indicacionesOtro  = $this->input->post('indicacionesOtro');
        $this->profesionales_model->autorizacionVisitas  = $this->input->post('autorizacionVisitas');
        $this->profesionales_model->regimenAlimentario  = $this->input->post('regimenAlimentario');
        $this->profesionales_model->medicamentosSOS  = $this->input->post('medicamentosSOS');
        $this->profesionales_model->controlSignosVitales  = $this->input->post('controlSignosVitales');
        $this->profesionales_model->autorizacionVisitasSi  = $this->input->post('autorizacionVisitasSi');
        $this->profesionales_model->solicitudInterconsulta  = $this->input->post('solicitudInterconsulta');
        $this->profesionales_model->autorizacionLlamadas  = $this->input->post('autorizacionLlamadas');
        $this->profesionales_model->solicitudInterconsultaSi  = $this->input->post('solicitudInterconsultaSi');
        $this->profesionales_model->regimenAlimentarioOtro  = $this->input->post('regimenAlimentarioOtro');
        $this->profesionales_model->autorizacionLlamadasSi  = $this->input->post('autorizacionLlamadasSi');
        $this->profesionales_model->controlSignosVitalesOtro  = $this->input->post('controlSignosVitalesOtro');
        $this->profesionales_model->guardarControl();
        
        $controles = $this->profesionales_model->dameTodosControles($registro);
        $data['vias']       = $this->evoluciones_model->dameVias();
        $data['farmacos']   = $this->evoluciones_model->dameFarmacos();
        $data['datos']      = $this->ingreso_model->dameUno($registro);

       //$controlesUGH = $this->profesionales_model->dameTodosControlesUGH($data['datos']->rut);
       //F(!empty($controlesUGH))$controles = array_merge($controles,$controlesUGH);
        
        $data['controles'] = $controles;
        $data['regimen']    = $this->pacientes_model->dameRegimen();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['medico']     = $this->profesionales_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        $data['breadcumb']  = "Ficha";
        $data['title']      = "Controles Médicos";
        
        $data['menu']       = "ficha";
        $data['submenu']    = "ficha";
        Layout_Helper::cargaVista($this,'listarControles',$data,'clinica');   
        
    }
    
    public function listarControles($registro)
    {
        $datos =  $this->ingreso_model->dameUno($registro);
        $controles = $this->profesionales_model->dameTodosControles($registro);
        //die($datos->rutTitular);
        //$controlesUGH = $this->profesionales_model->dameTodosControlesUGH($datos->rutTitular);
        $data['vias']       = $this->evoluciones_model->dameVias();
        $data['farmacos']   = $this->evoluciones_model->dameFarmacos();
        $data['datos']      = $datos;

       $controlesUGH = $this->profesionales_model->dameTodosControlesUGH($data['datos']->rut);
       IF(!empty($controlesUGH))$controles = array_merge($controles,$controlesUGH);
       //die(var_dump($controlesUGH));
        //die(var_dump($controles));
        $data['controles'] = $controles;
        $data['regimen']    = $this->pacientes_model->dameRegimen();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['medico']     = $this->profesionales_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        $data['breadcumb']  = "Ficha";
        $data['title']      = "Controles Médicos";
        
        $data['menu']       = "fichas";
        $data['submenu']    = "fichas";
        Layout_Helper::cargaVista($this,'listarControles',$data,'clinica');   
    }
    public function listarEvoluciones($registro)
    {
        $controles = $this->profesionales_model->dameTodosEvoluciones($registro);
        $data['vias']       = $this->evoluciones_model->dameVias();
        $data['farmacos']   = $this->evoluciones_model->dameFarmacos();
        $data['datos']      = $this->ingreso_model->dameUno($registro);

       //$controlesUGH = $this->profesionales_model->dameTodosControlesUGH($data['datos']->rut);
       //F(!empty($controlesUGH))$controles = array_merge($controles,$controlesUGH);
        
        $data['controles'] = $controles;
        $data['regimen']    = $this->pacientes_model->dameRegimen();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['medico']     = $this->profesionales_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        $data['breadcumb']  = "Ficha";
        $data['title']      = "Evoluciones Diarias";
        
        $data['menu']       = "fichas";
        $data['submenu']    = "fichas";
        Layout_Helper::cargaVista($this,'listarEvoluciones',$data,'clinica');   
    }
    public function listarEvaluacion($registro)
    {
        $controles = $this->profesionales_model->dameTodosEvaluacion($registro);
        $data['vias']       = $this->evoluciones_model->dameVias();
        $data['farmacos']   = $this->evoluciones_model->dameFarmacos();
        $data['datos']      = $this->ingreso_model->dameUno($registro);

        $controlesEnfermeria = $this->profesionales_model->dameTodosEvolucionEnfermeria($registro);
        IF(!empty($controlesEnfermeria))$controles = array_merge($controles,$controlesEnfermeria);
        //die(var_dump($controles));
        $data['controles'] = $controles;
        $data['regimen']    = $this->pacientes_model->dameRegimen();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['medico']     = $this->profesionales_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        $data['breadcumb']  = "Ficha";
        $data['title']      = "Evaluación de Ingreso";
        
        $data['menu']       = "fichas";
        $data['submenu']    = "fichas";
        Layout_Helper::cargaVista($this,'listarEvaluacion',$data,'clinica');   
    }
    public function listarControlesUGH($registro)
    {
        //$controles = $this->profesionales_model->dameTodosControles($registro);
        $data['vias']       = $this->evoluciones_model->dameVias();
        $data['farmacos']   = $this->evoluciones_model->dameFarmacos();
        $data['datos']      = $this->ingreso_model->dameUno($registro);

        $controles = $this->profesionales_model->dameTodosControlesUGH($data['datos']->rut);
        //IF(!empty($controlesUGH))$controles = array_merge($controles,$controlesUGH);
        
        $data['controles'] = $controles;
        $data['regimen']    = $this->pacientes_model->dameRegimen();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['medico']     = $this->profesionales_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        $data['breadcumb']  = "Ficha";
        $data['title']      = "Evaluaciones Diarias UGH";
        
        $data['menu']       = "ficha";
        $data['submenu']    = "ficha";
        Layout_Helper::cargaVista($this,'listarControlesUGH',$data,'clinica');   
    }
}