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
        $this->load->model("profesionales_model");
        $this->load->model("hd_model");
        $this->load->model("parametros_model");
		
    }
    public function cargarNuevoControl($id)
    {
        
         //   IF(!empty($var[1]))$data['control']=$this->profesionales_model->dameUnoControl($var[1]);
            //die(var_dump($data['control']));
      //  $data['vias']       = $this->evoluciones_model->dameVias();
      //  $data['farmacos']   = $this->evoluciones_model->dameFarmacos();
        
        $data['datos']      = $this->hd_model->dameUno($id);
        $data['regimen']    = $this->pacientes_model->dameRegimen();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['medico']     = $this->profesionales_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Nuevo Control Médico";
        
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarNuevoControl',$data,'hd');   
    }
    public function guardarNuevoControl()
    {
        $registro           = $this->input->post('registro');
        $id                 = $this->input->post('id');
        IF(!empty($id)){
            $this->hd_model->id = $id;
        } ELSE {
            $this->hd_model->fechaCreacion = date('Y-m-d H:i:s');
        }
        
        $this->hd_model->profesionalId = $this->session->userdata('id_usuario');
        $this->hd_model->profesionalNombre = $this->session->userdata('nombre_completo');
        $this->hd_model->profesionalRut = $this->session->userdata('rut');
        $this->hd_model->fechaEdicion = date('Y-m-d H:i:s');
        $this->hd_model->registro = $registro;
        $this->hd_model->paciente  = $this->input->post('paciente');
        $this->hd_model->evaluacion  = $this->input->post('evaluacion');
        $this->hd_model->tipoReposo  = $this->input->post('tipoReposo');
        $this->hd_model->usuario = $this->session->userdata('id_usuario');
        $this->hd_model->medicamentos  = $this->input->post('medicamentos');
        $this->hd_model->indicacionesOtro  = $this->input->post('indicacionesOtro');
        $this->hd_model->autorizacionVisitas  = $this->input->post('autorizacionVisitas');
        $this->hd_model->regimenAlimentario  = $this->input->post('regimenAlimentario');
        $this->hd_model->medicamentosSOS  = $this->input->post('medicamentosSOS');
        $this->hd_model->controlSignosVitales  = $this->input->post('controlSignosVitales');
        $this->hd_model->autorizacionVisitasSi  = $this->input->post('autorizacionVisitasSi');
        $this->hd_model->solicitudInterconsulta  = $this->input->post('solicitudInterconsulta');
        $this->hd_model->autorizacionLlamadas  = $this->input->post('autorizacionLlamadas');
        $this->hd_model->solicitudInterconsultaSi  = $this->input->post('solicitudInterconsultaSi');
        $this->hd_model->regimenAlimentarioOtro  = $this->input->post('regimenAlimentarioOtro');
        $this->hd_model->autorizacionLlamadasSi  = $this->input->post('autorizacionLlamadasSi');
        $this->hd_model->controlSignosVitalesOtro  = $this->input->post('controlSignosVitalesOtro');
        $this->hd_model->guardarControlMedico();
        
        redirect(base_url().'hd_admision/ingresos/listarIngreso');
        
        
        /*
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
        */
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