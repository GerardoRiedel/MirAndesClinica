<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Fichas extends CI_Controller {
    
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
    
    public function listar_paciente()
    {
        $data['datos']      = $this->pacientes_model->dameTodoHD();
        $data['breadcumb']  = "paciente";
        $data['title']      = "Lista de Pacientes";
        $data['menu']       = 'fichas';
        Layout_Helper::cargaVista($this,'listar_paciente',$data,'hd');   
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
}