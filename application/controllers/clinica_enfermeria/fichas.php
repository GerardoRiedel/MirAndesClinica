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
        $this->load->model("enfermeria_model");
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
        $this->load->model("enfermeria_model");
        
        //MED POR VENCER ARREGLAR
            //$med = $this->enfermeria_model->dame_medicamento_porVencer();
        IF(!empty($med[0]->medAdmId)){
            $data = array('contarMedicamentos' =>  $med[0]->medAdmId);	
            }
        ELSE {
            $data = array('contarMedicamentos' =>  0);
        }
            $this->session->set_userdata($data);
        $data['datos']      = $this->pacientes_model->dameTodo();
        $data['breadcumb']  = "paciente";
        $data['title']      = "Lista de Pacientes";
        $data['menu']       = 'fichas';
        $data['vista']      = 'clinica_enfermeria';
        $data['ingresos']   = $this->ingreso_model->dameIngresos($filtro='',$inicio='',$termino='',$altaDesde='',$altaHasta='',$alta='',$administrador=1);
        
        Layout_Helper::cargaVista($this,'abrir_ficha',$data,'clinica');   
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
        $data['vista']      = 'clinica_enfermeria';
        Layout_Helper::cargaVista($this,'abrir_ficha',$data,'clinica');   
    }
    public function listarEvoluciones($id)
    {
        $data['evolucion']  = $this->evoluciones_model->dameTodas($id);
        $data['datos']      = $this->ingreso_model->dameUno($id);
        $data['edad']       = $this->calculaedad($data['datos']->fechaNacimiento);
        
        $data['breadcumb']  = "Evolucion";
        $data['title']      = "Listar Evoluciones";
        $data['menu']       = 'fichas';
        Layout_Helper::cargaVista($this,'listarEvoluciones',$data,'clinica');   
    }
    public function cargarEvolucion($id)
    {
        $data['vias']       = $this->evoluciones_model->dameVias();
        $data['farmacos']   = $this->evoluciones_model->dameFarmacos();
        $evolucion          = $this->evoluciones_model->dameUnoId($id);
        $data['evoAntigua']  = $this->evoluciones_model->dameUnoAntiguo($id,$evolucion->evoRegistro);//$evoAntiguo->evoDiagPsiquiatra
        //die(var_dump($data['evoAntigua']->evoDiagPsiquiatra));
        $data['evo']        = $evolucion;
        $data['datos']      = $this->ingreso_model->dameUno($evolucion->evoRegistro);
        $data['evoEnfermeria']      = $this->evoluciones_model->dameUnoEnfermeria($evolucion->evoRegistro);
        
        $data['enfermeriaIngreso']      = $this->enfermeria_model->dameUno($evolucion->evoRegistro);
        $data['edad']       = $this->calculaedad($data['datos']->fechaNacimiento);
        
        $data['medicamento']= $this->enfermeria_model->dameUnoMedicamento($evolucion->evoId);
        //$data['horasMed']   = $this->enfermeria_model->dameTodosAdminHoras($evolucion->evoRegistro);
        //$data['farmaMed']   = $this->enfermeria_model->dameTodosAdminFarmacos($evolucion->evoRegistro);
        
        $data['suicidio']   = $this->evoluciones_model->dameUnoSuicidio($evolucion->evoRegistro);
        $caida              = $this->evoluciones_model->dameUnoCaida($evolucion->evoRegistro);
        IF(!empty($caida)){
            $data['caida']  = $caida->caiPrevias+$caida->caiMedSedantes+$caida->caiMedDiureticos+$caida->caiMedHipo+$caida->caiMedParkinson+$caida->caiMedDepresivos+$caida->caiMedOtro+$caida->caiDefVisual+$caida->caiDefAuditiva+$caida->caiDefExtremidades+$caida->caiEstado+$caida->caiDeaSegura+$caida->caiDeaInsegura+$caida->caiDeaImposible;
        }
        $data['evoId']  = $evolucion->evoId;
        $data['regimen']    = $this->pacientes_model->dameRegimen();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['medico']     = $this->profesionales_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        $data['breadcumb']  = "Evolucion";
        $data['title']      = "Listar Evoluciones";
        $data['menu']       = 'fichas';
        Layout_Helper::cargaVista($this,'cargarEvolucion',$data,'clinica');   
    }
    public function imprimirEvolucion($id)
    {
        $data['vias']       = $this->evoluciones_model->dameVias();
        $data['farmacos']   = $this->evoluciones_model->dameFarmacos();
        $evolucion          = $this->evoluciones_model->dameUnoId($id);
        
        $data['evo']        = $evolucion;
        $data['datos']      = $this->ingreso_model->dameUno($evolucion->evoRegistro);
        $data['evoEnfermeria']      = $this->evoluciones_model->dameUnoEnfermeria($evolucion->evoRegistro);
        
        $data['edad']       = $this->calculaedad($data['datos']->fechaNacimiento);
        
        $data['medicamento']= $this->enfermeria_model->dameUnoMedicamento($evolucion->evoId);
        $data['ingEnfermeria']= $this->enfermeria_model->dameUno($evolucion->evoRegistro);
        //die(var_dump($data['ingEnfermeria']->enfMorbidos));
        //$data['horasMed']   = $this->enfermeria_model->dameTodosAdminHoras($evolucion->evoRegistro);
        //$data['farmaMed']   = $this->enfermeria_model->dameTodosAdminFarmacos($evolucion->evoRegistro);
        $data['suicidio']   = $this->evoluciones_model->dameUnoSuicidio($evolucion->evoRegistro);
        $caida              = $this->evoluciones_model->dameUnoCaida($evolucion->evoRegistro);
        IF(!empty($caida))$data['caida'] = $caida->caiPrevias+$caida->caiMedSedantes+$caida->caiMedDiureticos+$caida->caiMedHipo+$caida->caiMedParkinson+$caida->caiMedDepresivos+$caida->caiMedOtro+$caida->caiDefVisual+$caida->caiDefAuditiva+$caida->caiDefExtremidades+$caida->caiEstado+$caida->caiDeaSegura+$caida->caiDeaInsegura+$caida->caiDeaImposible;
        
        $data['regimen']    = $this->pacientes_model->dameRegimen();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['medico']     = $this->profesionales_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        
        $data['breadcumb']  = "Evolucion";
        $data['title']      = "Listar Evoluciones";
        $data['menu']       = 'fichas';
        Layout_Helper::cargaVista($this,'imprimirEvolucion',$data,'clinica');   
    }
}