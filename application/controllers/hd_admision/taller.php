<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Taller extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();


        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
        $this->load->helper('layout');
        
        $this->load->database('default');
        $this->folder = 'uploads/';
        
        $this->load->model("comunas_model");
        $this->load->model("pacientes_model");
        $this->load->model("apoderados_model");
        $this->load->model("profesionales_model");
        $this->load->model("isapres_model");
        $this->load->model("bancos_model");
        $this->load->model("ingreso_model");
        $this->load->model("licencias_model");
        $this->load->model("evoluciones_model");
        $this->load->model("parametros_model");
        $this->load->model("hd_historico_model");
        $this->load->model("hd_asistencia_model");
        $this->load->model("hd_taller_model");
        $this->load->model("hd_model");
        //$tiempo = $this->parametros_model->dameValor('TIEMPO_SESSION');
	//Session_Helper::session($tiempo);	
    }
    
    function calculaedad($fecha){
        $date2  = date('Y-m-d');//
        $diff   = abs(strtotime($date2) - strtotime($fecha));
        $years  = floor($diff / (365*60*60*24));
        //$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        //$days   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        return $years;
    }
     public function listarTaller()
    {
       // $data['pacientesLista']      = $this->hd_model->dameIngresosHd();
        
       // $data['pacientes']      = $this->hd_asistencia_model->damePacientes();
        $data['talleres'] = $this->hd_taller_model->dameTalleres();
        $data['breadcumb']  = "";
        $data['title']      = "Lista de talleres";
        $data['menu']       = 'taller';
        $data['submenu']       = 'ltaller';
        Layout_Helper::cargaVista($this,'listarTaller',$data,'hd');   
    }
    public function crearTaller($id='')
    {
        //$data['pacientesLista']      = $this->hd_model->dameIngresosHd();
        
       // $data['pacientes']      = $this->hd_asistencia_model->damePacientes();
        IF(!empty($id))$data['taller'] = $this->hd_taller_model->dameTaller($id);
        $data['breadcumb']  = "";
        $data['title']      = "Creación de taller";
        $data['menu']       = 'taller';
        $data['submenu']       = 'ctaller';
        Layout_Helper::cargaVista($this,'crearTaller',$data,'hd');   
    }
    public function guardarTaller()
    {
        $talId = $this->input->post('talId');
        IF(!empty($talId))$this->hd_taller_model->talId = $talId;
        
        $this->hd_taller_model->talDescripcion = $this->input->post('descripcion');
        $this->hd_taller_model->talObservacion = $this->input->post('observacion');
        $this->hd_taller_model->talUsuario = $this->session->userdata('id_usuario');
        $this->hd_taller_model->talEstado = 1;
        $this->hd_taller_model->talFechaRegistro = date('Y-m-d H:i:s');
        $this->hd_taller_model->guardar();
        
       $this->listarTaller();
    }
    public function eliminarTaller($talId)
    {
        $this->hd_taller_model->talId = $talId;
        $this->hd_taller_model->talUsuario = $this->session->userdata('id_usuario');
        $this->hd_taller_model->talEstado = 5;
        $this->hd_taller_model->talFechaRegistro = date('Y-m-d H:i:s');
        $this->hd_taller_model->guardar();
        $this->listarTaller();
    }
    public function listarPacientes($dia='')
    {
        $fecha = $this->input->post('verFecha');
        IF(!empty($dia)&& empty($fecha)){$fecha=$dia;}
        
        IF(!empty($fecha)){
        
            $fecha = new datetime($fecha);
            $year=$fecha->format('Y');
            $month=$fecha->format('m');
            $day=$fecha->format('d');

            # Obtenemos el numero de la semana
            $semana=date("W",mktime(0,0,0,$month,$day,$year));
            # Obtenemos el día de la semana de la fecha dada
            $diaSemana=date("w",mktime(0,0,0,$month,$day,$year));
            # el 0 equivale al domingo...
            if($diaSemana==0)$diaSemana=7;
            # A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes
            $first=date("Y-m-d",mktime(0,0,0,$month,$day-$diaSemana+1,$year));
            # A la fecha recibida, le sumamos el dia de la semana menos siete y obtendremos el domingo
            $next=date("Y-m-d",mktime(0,0,0,$month,$day+(7-$diaSemana),$year));
 
        } ELSE {
            $first = new datetime('last Monday');
            $first = $first->format('Y-m-d');
            $next = new datetime('next sunday');
            $next = $next->format('Y-m-d');
        }
        $data['pacientesLista']      = $this->hd_asistencia_model->dameListaAsistenciaPacientes();
        $data['pacientes']      = $this->hd_taller_model->damePacientesActivos();
        $data['talleres'] = $this->hd_taller_model->dameTalleres();
        $data['asociaciones'] = $this->hd_taller_model->dameAsociaciones($first,$next);
        $data['asoPaciente'] = $this->hd_taller_model->dameAsociacionesPaciente();
        
        $data['dia'] = $first;
        $data['breadcumb']  = "";
        $data['title']      = "Lista de talleres";
        $data['menu']       = 'taller';
        $data['submenu']       = 'ptaller';
        Layout_Helper::cargaVista($this,'listarPacientes',$data,'hd');   
    }
    
    public function agregarPaciente()
    {
        $dia = $this->input->post('dia');
        $this->hd_taller_model->talUsuario = $this->session->userdata('id_usuario');
        $this->hd_taller_model->talEstado = 1;
        $this->hd_taller_model->talFechaRegistro = date('Y-m-d H:i:s');
        $this->hd_taller_model->talPaciente = $this->input->post('pacientes');
        $this->hd_taller_model->guardarPaciente();
        $this->listarPacientes($dia);
       
    }
    public function asociarTaller()
    {
        $dia = $this->input->post('dia');
        $this->hd_taller_model->asoUsuario = $this->session->userdata('id_usuario');
        $this->hd_taller_model->asoEstado = 1;
        $this->hd_taller_model->asoFechaRegistro = date('Y-m-d H:i:s');
        $this->hd_taller_model->asoTaller = $this->input->post('taller');
        $date       = $this->input->post('fecha');
        $date       = str_replace("/", "-", $date);
        $date       = new DateTime($date);
        $fecha     = $date->format('Y-m-d');
        $this->hd_taller_model->asoFecha = $fecha;
        $this->hd_taller_model->guardarAsociacion();
        $this->listarPacientes($dia);
       
    }
    
    
    
    
    
    
    
    
    
    
    
    public function asistencia()
    {
        $data['pacientesLista']      = $this->hd_asistencia_model->dameListaAsistenciaPacientes();
        $data['asistencia']      = $this->hd_taller_model->dameAsistencia();
        //$data['talleres'] = $this->hd_taller_model->dameTalleres();
        $data['breadcumb']  = "";
        $data['title']      = "Lista de talleres";
        $data['menu']       = 'taller';
        $data['submenu']       = 'ltaller';
        Layout_Helper::cargaVista($this,'asistencia',$data,'hd');   
    }
    
   
    
    
    
    
    
    
    
    
}