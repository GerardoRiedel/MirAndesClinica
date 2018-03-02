<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Asistencia extends CI_Controller {
    
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
    
    public function listarHD()
    {//die($mes.'sad');
        $mes = $this->input->post('mes');//die($mes);
        IF(empty($mes)||$mes==='0'){$mes=date('m');}
        $data['pacientesLista']      = $this->hd_asistencia_model->dameListaAsistenciaPacientes();
        
        $data['asistencia']      = $this->hd_asistencia_model->dameAsistenciaHD($mes);
        $data['pacientes']      = $this->hd_asistencia_model->damePacientes($mes);
        //die(var_dump($data['pacientesLista']));
        $data['mes']=$mes;
        $data['breadcumb']  = "paciente";
        $data['title']      = "Asistencia de pacientes de Hospital de Día";
        $data['menu']       = 'asistencia';
        $data['submenu']       = 'hd';
        Layout_Helper::cargaVista($this,'listar_ingreso',$data,'hd');   
    }
    public function agregarPaciente()
    {//die($mes.'sad');
        $mes = $this->input->post('mes');
        IF(empty($mes)||$mes==='0'){$mes=date('m');}
        $paciente = $this->input->post('pacientes');
        IF(!empty($paciente)&&$paciente!='0'){
            $registro = $this->hd_model->dameTodoHD($paciente);
            $this->hd_asistencia_model->asiFecha=date('Y-'.$mes.'-d');
            $this->hd_asistencia_model->asiRegistro=$registro[0]->id;
            $this->hd_asistencia_model->guardarAsistencia();
        }
        $data['pacientes']      = $this->hd_asistencia_model->damePacientes($mes);
        $data['asistencia']      = $this->hd_asistencia_model->dameAsistenciaHD($mes);
        $data['pacientesLista']      = $this->hd_asistencia_model->dameListaAsistenciaPacientes();
        $data['mes']=$mes;
        $data['breadcumb']  = "paciente";
        $data['title']      = "Asistencia de pacientes de Hospital de Día";
        $data['menu']       = 'asistencia';
        $data['submenu']       = 'hd';
        Layout_Helper::cargaVista($this,'listar_ingreso',$data,'hd');   
    }
    
    
    
    
    
    
    
    
    
    
    
    public function filtrar_paciente()
    {
        $data['filtro']     = $this->input->post('filtro');
        $filtro     = str_replace(array(".","-"), "", $this->input->post('filtro'));
        $letra      = substr($filtro,0,1);if ($letra === "1" || $letra === "2"){$filtro = substr($filtro, 0, 8);}else {$filtro = substr($filtro, 0, 7);}
        
        $data['datos']      = $this->pacientes_model->dameTodoHD($filtro);
        $data['breadcumb']  = "paciente";
        $data['title']      = "Lista de Pacientes";
        $data['menu']       = 'fichas';
        Layout_Helper::cargaVista($this,'listar_paciente',$data,'hd');   
    }
    public function listarEvoluciones($id)
    {
        $data['evolucion']  = $this->evoluciones_model->dameTodas($id);
        $data['datos']      = $this->ingreso_model->dameUno($id);
        $data['edad']       = $this->calculaedad($data['datos']->fechaNacimiento);
        
        $data['breadcumb']  = "Evolucion";
        $data['title']      = "Listar Evoluciones";
        $data['menu']       = 'fichas';
        Layout_Helper::cargaVista($this,'listarEvoluciones',$data,'ingresos');   
    }
    public function cargarEvolucion($id)
    {
        $data['vias']       = $this->evoluciones_model->dameVias();
        $data['farmacos']   = $this->evoluciones_model->dameFarmacos();
        $evolucion          = $this->evoluciones_model->dameUnoId($id);
        $data['evo']        = $evolucion;
        $data['datos']      = $this->ingreso_model->dameUno($evolucion->evoRegistro);
        $data['edad']       = $this->calculaedad($data['datos']->fechaNacimiento);
        
        $data['regimen']    = $this->pacientes_model->dameRegimen();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['medico']     = $this->profesionales_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        
        $data['breadcumb']  = "Evolucion";
        $data['title']      = "Listar Evoluciones";
        $data['menu']       = 'fichas';
        Layout_Helper::cargaVista($this,'cargarEvolucion',$data,'ingresos');   
    }
    public function imprimirEvolucion($id)
    {
        $data['vias']       = $this->evoluciones_model->dameVias();
        $data['farmacos']   = $this->evoluciones_model->dameFarmacos();
        $evolucion          = $this->evoluciones_model->dameUnoId($id);
        $data['evo']        = $evolucion;
        $data['datos']      = $this->ingreso_model->dameUno($evolucion->evoRegistro);
        $data['edad']       = $this->calculaedad($data['datos']->fechaNacimiento);
        
        $data['regimen']    = $this->pacientes_model->dameRegimen();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['medico']     = $this->profesionales_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        
        $data['breadcumb']  = "Evolucion";
        $data['title']      = "Listar Evoluciones";
        $data['menu']       = 'fichas';
        Layout_Helper::cargaVista($this,'imprimirEvolucion',$data,'ingresos');   
    }
     public function cargarHistorico($id)
    {
        $data['vias']       = $this->evoluciones_model->dameVias();
        $data['farmacos']   = $this->evoluciones_model->dameFarmacos();
        //$evolucion          = $this->evoluciones_model->dameUnoId($id);
        //$data['evo']        = $evolucion;die(var_dump($evolucion));
        $data['datos']      = $this->hd_model->dameUno($id);
        //die(var_dump($data['datos']));
        $data['edad']       = $this->calculaedad($data['datos']->fechaNacimiento);
        $data['evaluaciones']   = $this->hd_historico_model->dameHistorico($data['datos']->paciente);
        $data['regimen']    = $this->pacientes_model->dameRegimen();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['medico']     = $this->profesionales_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        
        $data['breadcumb']  = "Historico";
        $data['title']      = "Bitácora";
        $data['menu']       = 'fichas';
        Layout_Helper::cargaVista($this,'cargarHistorico',$data,'hd');   
    }
}