<?php defined('BASEPATH') OR exit('No direct script access allowed');


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
    }
    
    function calculaedad($fecha){
        $date2  = date('Y-m-d');//
        $diff   = abs(strtotime($date2) - strtotime($fecha));
        $years  = floor($diff / (365*60*60*24));
        //$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        //$days   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        return $years;
    }
    public function cargando(){
        
        $data['breadcumb']  = "Registros";
        $data['menu']       = "depositos";
        $data['submenu']    = "ldeposito";
        $data['title']      = "Cargando...";
        Layout_Helper::cargaVista($this,'cargando',$data,'ingresos');   
    }
    
    public function listar_paciente()
    {
        $data['datos']      = $this->pacientes_model->dameTodo();
        $data['ingresos']   = $this->ingreso_model->dameIngresos($filtro='',$inicio='',$termino='',$altaDesde='',$altaHasta='',$alta='',$administrador=1);
        
        $data['breadcumb']  = "paciente";
        $data['title']      = "Lista de Pacientes";
        $data['menu']       = 'fichas';
        $data['vista']      = 'clinica_admision';
        Layout_Helper::cargaVista($this,'abrir_ficha',$data,'ingresos');   
    }
    public function filtrar_paciente()
    {
        $filtro     = str_replace(array(".","-"), "", $this->input->post('filtro'));
        $letra      = substr($filtro,0,1);if ($letra === "1" || $letra === "2"){$filtro = substr($filtro, 0, 8);}else {$filtro = substr($filtro, 0, 7);}
        $data['ingresos']   = $this->ingreso_model->dameIngresos($filtro='',$inicio='',$termino='',$altaDesde='',$altaHasta='',$alta='',$administrador=1);
        
        $data['datos']      = $this->pacientes_model->dameTodo($filtro);
        $data['breadcumb']  = "paciente";
        $data['title']      = "Lista de Pacientes";
        $data['menu']       = 'fichas';
        $data['vista']      = 'clinica_admision';
        Layout_Helper::cargaVista($this,'abrir_ficha',$data,'ingresos');   
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
    {//die($id);
        $this->load->model("bitacora_model");
        $data['vias']       = $this->evoluciones_model->dameVias();
        $data['farmacos']   = $this->evoluciones_model->dameFarmacos();
        //$evolucion          = $this->evoluciones_model->dameUnoId($id);
        //$data['evo']        = $evolucion;die(var_dump($evolucion));
        $dato = $this->ingreso_model->dameTodo($id);
        $data['datos']      = $dato[0];
        //die(var_dump($data['datos']));
        $data['edad']       = $this->calculaedad($data['datos']->fechaNacimiento);
        $data['evaluaciones']= $this->bitacora_model->dameHistorico($id);
        $data['regimen']    = $this->pacientes_model->dameRegimen();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['medico']     = $this->profesionales_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        
        $data['breadcumb']  = "Historico";
        $data['title']      = "Bitácora";
        $data['menu']       = 'ingreso';
        $data['submenu']       = 'lingreso';
        Layout_Helper::cargaVista($this,'cargarHistorico',$data,'ingresos');   
    }
}