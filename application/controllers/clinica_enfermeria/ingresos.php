<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Ingresos extends CI_Controller {
    
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
	//Session_Helper::session($tiempo);	
		
    }
    public function inicio()
    {
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Inicio";
        Layout_Helper::cargaVista($this,'inicio',$data,'clinica');   
    }
    function calculaedad($fecha){
        $date2  = date('Y-m-d');//
        $diff   = abs(strtotime($date2) - strtotime($fecha));
        $years  = floor($diff / (365*60*60*24));
        return $years;
    }
    public function listarIngreso()
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
        $data['datos']      = $this->ingreso_model->dameIngresos();
       // $data['ingEnfermeria']      = $this->enfermeria_model->dameIngresosEnfermeria();
        $data['breadcumb']  = "Registros";
        $data['title']      = "Lista de Registros";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'listar_ingreso',$data,'clinica');   
    }
    public function filtrolistarIngreso()
    {
        $filtro     = $this->input->post('filtro');
        $filtro        = str_replace(array(".","-"), "", $filtro);
        $letra      = substr($filtro,0,1);if ($letra === "1" || $letra === "2"){$filtro = substr($filtro, 0, 8);}else {$filtro = substr($filtro, 0, 7);}
        
        $data['datos']      = $this->ingreso_model->dameIngresos($filtro);
        $data['breadcumb']  = "Registros";
        $data['title']      = "Lista de Registros";
        
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'listar_ingreso',$data,'clinica');   
    }
    public function cargarNuevoRegistro($id)
    {//EVOLUCION
    
        $evoId = $this->evoluciones_model->dameUno($id);
        IF(!empty($evoId)){
        $data['evo'] = $evoId;
        $fecha = date('Y-m-d H:i:s');
        $hora = strtotime('-1 hour',strtotime($fecha));
       
        $horaRegistro = strtotime($data['evo']->evoFechaRegistro);
        
        $data['evoEnfermeria']      = $this->evoluciones_model->dameUnoEnfermeria($data['evo']->evoFechaRegistro);
                //die($hora.'d'.$horaRegistro);
                IF($horaRegistro > $hora && $this->session->userdata('id_usuario') === $data['evo']->evoUsuario){
                    $data['evoId']    =  $data['evo'];
                }
                ELSE {
                    $this->evoluciones_model->evoUsuario        = $this->session->userdata('id_usuario');
                    $this->evoluciones_model->evoRegistro       = $id;
                    $this->evoluciones_model->evoFechaRegistro  = date('Y-m-d H:i:s');
                    $this->evoluciones_model->guardar();
                    $evoId                 = $this->evoluciones_model->dameUno($id);
                    $data['evoId']     = $evoId;
                }
        }ELSE {
            $this->evoluciones_model->evoUsuario        = $this->session->userdata('id_usuario');
            $this->evoluciones_model->evoRegistro       = $id;
            $this->evoluciones_model->evoFechaRegistro  = date('Y-m-d H:i:s');
            $this->evoluciones_model->guardar();
            $evoId                 = $this->evoluciones_model->dameUno($id);
            $data['evoId']     = $evoId;
        }
         
        redirect(base_url().'clinica_enfermeria/fichas/cargarEvolucion/'.$evoId->evoId);
    }
    
    public function guardarNuevoRegistro()
    {
        $rut        = str_replace(array(".","-"), "", $this->input->post('rut'));
        $letra      = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
        $paciente   = $this->pacientes_model->dameUno($rut);
        $ficha      = $this->ingreso_model->dameFicha($paciente->id);
        $alergia    = $this->input->post('alergias');
    ////GUARDAR PACIENTE  
        if(!empty($alergia)){
            $this->pacientes_model->id          = $paciente->id;
            $this->pacientes_model->alergia     = $alergia;
            $this->pacientes_model->guardar();
            unset($this->pacientes_model->id,$this->pacientes_model->alergia);
        }
    ////CREA FICHA
        $regimen = $this->input->post('regimen');
        $regimen = $this->pacientes_model->dameRegimenId($regimen);
        $this->ingreso_model->id            = $this->input->post('fichaElectro');
        
        $this->ingreso_model->diagnostico   = $this->input->post('diagnostico');
        $this->ingreso_model->diagnosticoDerivacion     = $this->input->post('diagnosticoDerivacion');
        $this->ingreso_model->nombresMedicoSolicitante  = $this->input->post('medicoSolicitante');
        $this->ingreso_model->medicoAsignado= $this->input->post('medicoAsignado');
        $this->ingreso_model->regimen       = $regimen->regNombre;
        $this->ingreso_model->guardar();
        
        
        
        $evoId = $this->input->post('evoId');
        
        IF(!empty($evoId)){
            $this->evoluciones_model->evoEnfEvoId        = $evoId;
            $this->evoluciones_model->evoEnfDescripcion  = $this->input->post('evoEnfDescripcion');
            $this->evoluciones_model->evoEnfFecha  = date('Y-m-d H:i:s');
            $this->evoluciones_model->evoEnfUsuario        = $this->session->userdata('id_usuario');
            $this->evoluciones_model->evoEnfRegistro = $this->input->post('fichaElectro');
            $this->evoluciones_model->guardarEvoEnfermeria();
            unset($this->evoluciones_model->evoEnfEvoId,$this->evoluciones_model->evoEnfDescripcion,$this->evoluciones_model->evoEnfFecha, $this->evoluciones_model->evoEnfUsuario,$this->evoluciones_model->evoEnfRegistro);
        }
        
        IF(!empty($evoId))$this->evoluciones_model->evoId        = $evoId;
        $this->evoluciones_model->evoPaciente       = $paciente->id;
        $this->evoluciones_model->evoUsuario        = $this->session->userdata('id_usuario');
        $this->evoluciones_model->evoRegistro       = $this->input->post('fichaElectro');
        $this->evoluciones_model->evoFechaRegistro  = date('Y-m-d H:i:s');
        $this->evoluciones_model->evoEstadia        = $this->input->post('evoEstadia');
        $this->evoluciones_model->evoHabitacion     = $this->input->post('evoHabitacion');
        $this->evoluciones_model->evoPeso           = $this->input->post('evoPeso');
        $this->evoluciones_model->evoTalla          = $this->input->post('evoTalla');
        $this->evoluciones_model->evoRiesgo         = $this->input->post('evoRiesgo');
        $this->evoluciones_model->evoDowton         = $this->input->post('evoDowton');
        $this->evoluciones_model->evoDiagMedico     = $this->input->post('evoDiagMedico');
        $this->evoluciones_model->evoDiagPsiquiatra = $this->input->post('evoDiagPsiquiatra');
        
        $this->evoluciones_model->evoCSV0           = $this->input->post('evoCSV00').'_'.$this->input->post('evoCSV01').'_'.$this->input->post('evoCSV02').'_'.$this->input->post('evoCSV03').'_'.$this->input->post('evoCSV04').'_'.$this->input->post('evoCSV05').'_'.$this->input->post('evoCSV06').'_'.$this->input->post('evoCSV07').'_'.$this->input->post('evoCSV08').'_'.$this->input->post('evoCSV09');
        $this->evoluciones_model->evoCSV1           = $this->input->post('evoCSV10').'_'.$this->input->post('evoCSV11').'_'.$this->input->post('evoCSV12').'_'.$this->input->post('evoCSV13').'_'.$this->input->post('evoCSV14').'_'.$this->input->post('evoCSV15').'_'.$this->input->post('evoCSV16').'_'.$this->input->post('evoCSV17').'_'.$this->input->post('evoCSV18').'_'.$this->input->post('evoCSV19');
        $this->evoluciones_model->evoCSV2           = $this->input->post('evoCSV20').'_'.$this->input->post('evoCSV21').'_'.$this->input->post('evoCSV22').'_'.$this->input->post('evoCSV23').'_'.$this->input->post('evoCSV24').'_'.$this->input->post('evoCSV25').'_'.$this->input->post('evoCSV26').'_'.$this->input->post('evoCSV27').'_'.$this->input->post('evoCSV28').'_'.$this->input->post('evoCSV29');
        $this->evoluciones_model->evoCSV3           = $this->input->post('evoCSV30').'_'.$this->input->post('evoCSV31').'_'.$this->input->post('evoCSV32').'_'.$this->input->post('evoCSV33').'_'.$this->input->post('evoCSV34').'_'.$this->input->post('evoCSV35').'_'.$this->input->post('evoCSV36').'_'.$this->input->post('evoCSV37').'_'.$this->input->post('evoCSV38').'_'.$this->input->post('evoCSV39');
        $this->evoluciones_model->evoCSV4           = $this->input->post('evoCSV40').'_'.$this->input->post('evoCSV41').'_'.$this->input->post('evoCSV42').'_'.$this->input->post('evoCSV43').'_'.$this->input->post('evoCSV44').'_'.$this->input->post('evoCSV45').'_'.$this->input->post('evoCSV46').'_'.$this->input->post('evoCSV47').'_'.$this->input->post('evoCSV48').'_'.$this->input->post('evoCSV49');
        $this->evoluciones_model->evoCSV5           = $this->input->post('evoCSV50').'_'.$this->input->post('evoCSV51').'_'.$this->input->post('evoCSV52').'_'.$this->input->post('evoCSV53').'_'.$this->input->post('evoCSV54').'_'.$this->input->post('evoCSV55').'_'.$this->input->post('evoCSV56').'_'.$this->input->post('evoCSV57').'_'.$this->input->post('evoCSV58').'_'.$this->input->post('evoCSV59');
        $this->evoluciones_model->evoCSV6           = $this->input->post('evoCSV60').'_'.$this->input->post('evoCSV61').'_'.$this->input->post('evoCSV62').'_'.$this->input->post('evoCSV63').'_'.$this->input->post('evoCSV64').'_'.$this->input->post('evoCSV65').'_'.$this->input->post('evoCSV66').'_'.$this->input->post('evoCSV67').'_'.$this->input->post('evoCSV68').'_'.$this->input->post('evoCSV69');
        $this->evoluciones_model->evoCSV7           = $this->input->post('evoCSV70').'_'.$this->input->post('evoCSV71').'_'.$this->input->post('evoCSV72').'_'.$this->input->post('evoCSV73').'_'.$this->input->post('evoCSV74').'_'.$this->input->post('evoCSV75').'_'.$this->input->post('evoCSV76').'_'.$this->input->post('evoCSV77').'_'.$this->input->post('evoCSV78').'_'.$this->input->post('evoCSV79');
        $this->evoluciones_model->evoCSV8           = $this->input->post('evoCSV80').'_'.$this->input->post('evoCSV81').'_'.$this->input->post('evoCSV82').'_'.$this->input->post('evoCSV83').'_'.$this->input->post('evoCSV84').'_'.$this->input->post('evoCSV85').'_'.$this->input->post('evoCSV86').'_'.$this->input->post('evoCSV87').'_'.$this->input->post('evoCSV88').'_'.$this->input->post('evoCSV89');
        $this->evoluciones_model->evoCSV9           = $this->input->post('evoCSV90').'_'.$this->input->post('evoCSV91').'_'.$this->input->post('evoCSV92').'_'.$this->input->post('evoCSV93').'_'.$this->input->post('evoCSV94').'_'.$this->input->post('evoCSV95').'_'.$this->input->post('evoCSV96').'_'.$this->input->post('evoCSV97').'_'.$this->input->post('evoCSV98').'_'.$this->input->post('evoCSV99');
        
        
        $this->evoluciones_model->evoAli0           = $this->input->post('evoAli01').'_'.$this->input->post('evoAli02').'_'.$this->input->post('evoAli03').'_'.$this->input->post('evoAli04').'_'.$this->input->post('evoAli05').'_'.$this->input->post('evoAli06').'_'.$this->input->post('evoAli07');
        $this->evoluciones_model->evoAli1           = $this->input->post('evoAli11').'_'.$this->input->post('evoAli12').'_'.$this->input->post('evoAli13').'_'.$this->input->post('evoAli14').'_'.$this->input->post('evoAli15').'_'.$this->input->post('evoAli16').'_'.$this->input->post('evoAli17');
        $this->evoluciones_model->evoAli2           = $this->input->post('evoAli21').'_'.$this->input->post('evoAli22').'_'.$this->input->post('evoAli23').'_'.$this->input->post('evoAli24').'_'.$this->input->post('evoAli25').'_'.$this->input->post('evoAli26').'_'.$this->input->post('evoAli27');
        $this->evoluciones_model->evoAli3           = $this->input->post('evoAli31').'_'.$this->input->post('evoAli32').'_'.$this->input->post('evoAli33').'_'.$this->input->post('evoAli34').'_'.$this->input->post('evoAli35').'_'.$this->input->post('evoAli36').'_'.$this->input->post('evoAli37');
       //echo $this->input->post('evoAli01').'_'.$this->input->post('evoAli02').'_'.$this->input->post('evoAli03').'_'.$this->input->post('evoAli04').'_'.$this->input->post('evoAli05').'_'.$this->input->post('evoAli06').'_'.$this->input->post('evoAli07');
        $this->evoluciones_model->evoAseo       = $this->input->post('evoAseoDia').'_'.$this->input->post('evoAseoNoche');
        $this->evoluciones_model->evoSueDia         = $this->input->post('evoSueDia');
        $this->evoluciones_model->evoSueNoche       = $this->input->post('evoSueNoche');
        $this->evoluciones_model->evoHidraDia       = $this->input->post('evoHidraDia');
        $this->evoluciones_model->evoHidraNoche     = $this->input->post('evoHidraNoche');
       
        $this->evoluciones_model->evoAlimentacion   = $this->input->post('alim1').'_'.$this->input->post('alim2').'_'.$this->input->post('alim3').'_'.$this->input->post('alim4').'_'.$this->input->post('alim5').'_'.$this->input->post('alim6');
        $this->evoluciones_model->evoVisitas        = $this->input->post('evoVisitas');
        $this->evoluciones_model->evoTelefono       = $this->input->post('evoTelefono');
        $this->evoluciones_model->evoSalidas        = $this->input->post('evoSalidas');
        $this->evoluciones_model->evoCuidador       = $this->input->post('evoCuidador');
        
        $this->evoluciones_model->evoTO             = $this->input->post('evoTO1').'_'.$this->input->post('evoTO2').'_'.$this->input->post('evoTOOtro');
        $this->evoluciones_model->evoMed0           = $this->input->post('evoMed00').'_'.$this->input->post('evoMed01').'_'.$this->input->post('evoMed02').'_'.$this->input->post('evoMed03').'_'.$this->input->post('evoMed04').'_'.$this->input->post('evoMed05').'_'.$this->input->post('evoMed06').'_'.$this->input->post('evoMed07').'_'.$this->input->post('evoMed08').'_'.$this->input->post('evoMed09').'_'.$this->input->post('evoMed010').'_'.$this->input->post('evoMed011').'_'.$this->input->post('evoMed012').'_'.$this->input->post('evoMed013').'_'.$this->input->post('evoMed014').'_'.$this->input->post('evoMed015').'_'.$this->input->post('evoMed016');
        $this->evoluciones_model->evoMed1           = $this->input->post('evoMed10').'_'.$this->input->post('evoMed11').'_'.$this->input->post('evoMed12').'_'.$this->input->post('evoMed13').'_'.$this->input->post('evoMed14').'_'.$this->input->post('evoMed15').'_'.$this->input->post('evoMed16').'_'.$this->input->post('evoMed17').'_'.$this->input->post('evoMed18').'_'.$this->input->post('evoMed19').'_'.$this->input->post('evoMed110').'_'.$this->input->post('evoMed111').'_'.$this->input->post('evoMed112').'_'.$this->input->post('evoMed113').'_'.$this->input->post('evoMed114').'_'.$this->input->post('evoMed115').'_'.$this->input->post('evoMed116');
        $this->evoluciones_model->evoMed2           = $this->input->post('evoMed20').'_'.$this->input->post('evoMed21').'_'.$this->input->post('evoMed22').'_'.$this->input->post('evoMed23').'_'.$this->input->post('evoMed24').'_'.$this->input->post('evoMed25').'_'.$this->input->post('evoMed26').'_'.$this->input->post('evoMed27').'_'.$this->input->post('evoMed28').'_'.$this->input->post('evoMed29').'_'.$this->input->post('evoMed210').'_'.$this->input->post('evoMed211').'_'.$this->input->post('evoMed212').'_'.$this->input->post('evoMed213').'_'.$this->input->post('evoMed214').'_'.$this->input->post('evoMed215').'_'.$this->input->post('evoMed216');
        $this->evoluciones_model->evoMed3           = $this->input->post('evoMed30').'_'.$this->input->post('evoMed31').'_'.$this->input->post('evoMed32').'_'.$this->input->post('evoMed33').'_'.$this->input->post('evoMed34').'_'.$this->input->post('evoMed35').'_'.$this->input->post('evoMed36').'_'.$this->input->post('evoMed37').'_'.$this->input->post('evoMed38').'_'.$this->input->post('evoMed39').'_'.$this->input->post('evoMed310').'_'.$this->input->post('evoMed311').'_'.$this->input->post('evoMed312').'_'.$this->input->post('evoMed313').'_'.$this->input->post('evoMed314').'_'.$this->input->post('evoMed315').'_'.$this->input->post('evoMed316');
        $this->evoluciones_model->evoMed4           = $this->input->post('evoMed40').'_'.$this->input->post('evoMed41').'_'.$this->input->post('evoMed42').'_'.$this->input->post('evoMed43').'_'.$this->input->post('evoMed44').'_'.$this->input->post('evoMed45').'_'.$this->input->post('evoMed46').'_'.$this->input->post('evoMed47').'_'.$this->input->post('evoMed48').'_'.$this->input->post('evoMed49').'_'.$this->input->post('evoMed410').'_'.$this->input->post('evoMed411').'_'.$this->input->post('evoMed412').'_'.$this->input->post('evoMed413').'_'.$this->input->post('evoMed414').'_'.$this->input->post('evoMed415').'_'.$this->input->post('evoMed416');
        $this->evoluciones_model->evoMed5           = $this->input->post('evoMed50').'_'.$this->input->post('evoMed51').'_'.$this->input->post('evoMed52').'_'.$this->input->post('evoMed53').'_'.$this->input->post('evoMed54').'_'.$this->input->post('evoMed55').'_'.$this->input->post('evoMed56').'_'.$this->input->post('evoMed57').'_'.$this->input->post('evoMed58').'_'.$this->input->post('evoMed59').'_'.$this->input->post('evoMed510').'_'.$this->input->post('evoMed511').'_'.$this->input->post('evoMed512').'_'.$this->input->post('evoMed513').'_'.$this->input->post('evoMed514').'_'.$this->input->post('evoMed515').'_'.$this->input->post('evoMed516');
        $this->evoluciones_model->evoMed6           = $this->input->post('evoMed60').'_'.$this->input->post('evoMed61').'_'.$this->input->post('evoMed62').'_'.$this->input->post('evoMed63').'_'.$this->input->post('evoMed64').'_'.$this->input->post('evoMed65').'_'.$this->input->post('evoMed66').'_'.$this->input->post('evoMed67').'_'.$this->input->post('evoMed68').'_'.$this->input->post('evoMed69').'_'.$this->input->post('evoMed610').'_'.$this->input->post('evoMed611').'_'.$this->input->post('evoMed612').'_'.$this->input->post('evoMed613').'_'.$this->input->post('evoMed614').'_'.$this->input->post('evoMed615').'_'.$this->input->post('evoMed616');
        $this->evoluciones_model->evoMed7           = $this->input->post('evoMed70').'_'.$this->input->post('evoMed71').'_'.$this->input->post('evoMed72').'_'.$this->input->post('evoMed73').'_'.$this->input->post('evoMed74').'_'.$this->input->post('evoMed75').'_'.$this->input->post('evoMed76').'_'.$this->input->post('evoMed77').'_'.$this->input->post('evoMed78').'_'.$this->input->post('evoMed79').'_'.$this->input->post('evoMed710').'_'.$this->input->post('evoMed711').'_'.$this->input->post('evoMed712').'_'.$this->input->post('evoMed713').'_'.$this->input->post('evoMed714').'_'.$this->input->post('evoMed715').'_'.$this->input->post('evoMed716');
        $this->evoluciones_model->evoMed8           = $this->input->post('evoMed80').'_'.$this->input->post('evoMed81').'_'.$this->input->post('evoMed82').'_'.$this->input->post('evoMed83').'_'.$this->input->post('evoMed84').'_'.$this->input->post('evoMed85').'_'.$this->input->post('evoMed86').'_'.$this->input->post('evoMed87').'_'.$this->input->post('evoMed88').'_'.$this->input->post('evoMed89').'_'.$this->input->post('evoMed810').'_'.$this->input->post('evoMed811').'_'.$this->input->post('evoMed812').'_'.$this->input->post('evoMed813').'_'.$this->input->post('evoMed814').'_'.$this->input->post('evoMed815').'_'.$this->input->post('evoMed816');
        $this->evoluciones_model->evoMed9           = $this->input->post('evoMed90').'_'.$this->input->post('evoMed91').'_'.$this->input->post('evoMed92').'_'.$this->input->post('evoMed93').'_'.$this->input->post('evoMed94').'_'.$this->input->post('evoMed95').'_'.$this->input->post('evoMed96').'_'.$this->input->post('evoMed97').'_'.$this->input->post('evoMed98').'_'.$this->input->post('evoMed99').'_'.$this->input->post('evoMed910').'_'.$this->input->post('evoMed911').'_'.$this->input->post('evoMed912').'_'.$this->input->post('evoMed913').'_'.$this->input->post('evoMed914').'_'.$this->input->post('evoMed915').'_'.$this->input->post('evoMed916');
        
        $this->evoluciones_model->evoPlan            = $this->input->post('evoPlan');
        $this->evoluciones_model->evoExamenes = $this->input->post('evoExamenes');
        $this->evoluciones_model->evoAvisar          = $this->input->post('evoAvisar');
        $this->evoluciones_model->evoPendientes= $this->input->post('evoPendientes');
        
        
        $this->evoluciones_model->evoDia                = $this->input->post('evoDia');
        $this->evoluciones_model->evoNoche          = $this->input->post('evoNoche');
        
        $this->evoluciones_model->evoHoras          = $this->input->post('evoHor0').'_'.$this->input->post('evoHor1').'_'.$this->input->post('evoHor2').'_'.$this->input->post('evoHor3').'_'.$this->input->post('evoHor4').'_'.$this->input->post('evoHor5').'_'.$this->input->post('evoHor6').'_'.$this->input->post('evoHor7').'_'.$this->input->post('evoHor10').'_'.$this->input->post('evoHor11').'_'.$this->input->post('evoHor12').'_'.$this->input->post('evoHor13').'_'.$this->input->post('evoHor14').'_'.$this->input->post('evoHor15').'_'.$this->input->post('evoHor16').'_'.$this->input->post('evoHor17');
        
        $this->evoluciones_model->evoVia               = $this->input->post('evoVia0').'_'.$this->input->post('evoVia1').'_'.$this->input->post('evoVia2').'_'.$this->input->post('evoVia3').'_'.$this->input->post('evoVia4').'_'.$this->input->post('evoVia5').'_'.$this->input->post('evoHor6').'_'.$this->input->post('evoVia7').'_'.$this->input->post('evoVia8').'_'.$this->input->post('evoVia9').'_'.$this->input->post('evoVia10').'_'.$this->input->post('evoVia11').'_'.$this->input->post('evoVia12').'_'.$this->input->post('evoVia13');
        
        $this->evoluciones_model->guardar();
        
        IF(!empty($evoId)) 
            redirect(base_url().'clinica_enfermeria/fichas/cargarEvolucion/'.$evoId);
        ELSE
            redirect(base_url().'clinica_enfermeria/fichas/listarEvoluciones/'.$this->input->post('fichaElectro'));
        
    }
    
    public function licencias($filtro='')
    {
        IF($filtro != '')$data['datos'] = $this->licencias_model->dameLicenciasPorVencer();
        ELSE $data['datos'] = $this->licencias_model->dameTodo();
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Licencias Emitidas";
        Layout_Helper::cargaVista($this,'licencias',$data,'clinica');   
    }
    public function cargarLicencia($rut)
    {
        $data['medicos']    = $this->profesionales_model->dameTodo();
        $licencias          = $this->licencias_model->dameDatosPorRut($rut);
        $data['licencia']   = $licencias;
        $data['datos']      = $this->ingreso_model->dameUnoPorRut($rut);
        IF($data['datos']->fechaNacimiento !== '0000-00-00')$edad = $this->calculaedad($data['datos']->fechaNacimiento);
        ELSE $edad = 0;
        $data['edad']       = $edad;
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Guardar Licencia";
        Layout_Helper::cargaVista($this,'cargarLicencias',$data,'clinica');   
    }
    public function guardarLicencia()
    {
        $rut        = str_replace(array(".","-"), "", $this->input->post('rut'));
        $letra      = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
        
        $licNumero  = $this->input->post('licNumero');
        
        $licDesde   = new DateTime($this->input->post('licDesde'));
        $licDesde   = $licDesde->format('Y-m-d');
        
        $licDias    = $this->input->post('licDias')-1;
        $licHasta   = date("Y-m-d", strtotime("$licDesde + $licDias days"));
        $licDias    = $this->input->post('licDias');

        $ultima = $this->licencias_model->dameUltimo($this->input->post('fichaElectro'));
        
        $this->licencias_model->licId       = $ultima->licId;
        $this->licencias_model->licEstado   = 2;
        $this->licencias_model->guardar();
        unset($this->licencias_model->licEstado,$this->licencias_model->licId);
        
        ////TRAE DATOS DEL MEDICO
        $medico     = $this->input->post('medico');
        $medico     = explode('_', $medico);
        $medId      = $medico[0];
        $medApePat  = $medico[1];
        $medApeMat  = $medico[2];
        $medNombre  = $medico[3];
        $this->licencias_model->licMedId        = $medId;
        $this->licencias_model->licMedApePat    = $medApePat;
        $this->licencias_model->licMedApeMat    = $medApeMat;
        $this->licencias_model->licMedNombre    = $medNombre;
        
        $this->licencias_model->licNombre   = $this->input->post('nombres');
        $this->licencias_model->licApePat   = $this->input->post('apellidoPaterno');
        $this->licencias_model->licApeMat   = $this->input->post('apellidoMaterno');
        $this->licencias_model->licRut      = $rut;
        $this->licencias_model->licUsuario  = $this->session->userdata('id_usuario');
            
        $this->licencias_model->licNumero   = $licNumero;
        $this->licencias_model->licDesde    = $licDesde;
        $this->licencias_model->licHasta    = $licHasta;
        $this->licencias_model->licDias     = $licDias;
        $this->licencias_model->licPaciente = $this->input->post('pacId');
        $this->licencias_model->licRegistro = $this->input->post('fichaElectro');
        $this->licencias_model->licFechaRegistro = date('Y-m-d H:i:s');
        $this->licencias_model->guardar();
        
    ////REFRESCAR DATOS DE SESSION    
        $lic = $this->licencias_model->dameLicenciasPorVencer();
        $cta = $this->bancos_model->dameCtasPorVencer();
        $contar = 0;$contarCtas = 0;
        foreach ($lic as $li)$contar += 1;
        foreach ($cta as $ct)$contarCtas += 1;
        $data = array(
                    'contarLicencias'   =>  $contar,
                    'contarCtas'        =>  $contarCtas,);	
        $this->session->set_userdata($data);	
            
        $data['datos'] = $this->licencias_model->dameTodo();
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Licencias";
        Layout_Helper::cargaVista($this,'licencias',$data,'clinica');   
    }
    
    public function cargarNuevoIngresoEnfermeria($id)
    {
        $data['datos']      = $this->ingreso_model->dameUno($id);
        $data['enfermeria'] = $this->enfermeria_model->dameUno($id);
        $data['suicidio']   = $this->evoluciones_model->dameUnoSuicidio($id);
        $caida              = $this->evoluciones_model->dameUnoCaida($id);
        IF(!empty($caida)){
            $data['caida']  = $caida->caiPrevias+$caida->caiMedSedantes+$caida->caiMedDiureticos+$caida->caiMedHipo+$caida->caiMedParkinson+$caida->caiMedDepresivos+$caida->caiMedOtro+$caida->caiDefVisual+$caida->caiDefAuditiva+$caida->caiDefExtremidades+$caida->caiEstado+$caida->caiDeaSegura+$caida->caiDeaInsegura+$caida->caiDeaImposible;
        }
        //die(var_dump($caida));
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Cargar nuevo registro";
        $data['regimen']    = $this->pacientes_model->dameRegimen();
        
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarNuevoIngresoEnfermeria',$data,'clinica');   
    }
    
    public function guardarNuevoIngresoEnfermeria()
    {
        $id     = $this->input->post('fichaElectro');
        $rut    = $this->input->post('rut');
        $data['datos']      = $this->ingreso_model->dameUno($id);
        //die($data['datos']->paciente);
        //die(var_dump($data['datos']));
        $enfId  = $this->enfermeria_model->dameUno($id);
        IF(!empty($enfId))$this->enfermeria_model->enfId = $enfId->enfId;
        
        $cog   = $this->input->post('enfCog0').'_'.$this->input->post('enfCog1').'_'.$this->input->post('enfCog2').'_'.$this->input->post('enfCog3').'_'.$this->input->post('enfCog4').'_'.$this->input->post('enfCog5').'_'.$this->input->post('enfCog6').'_'.$this->input->post('enfCog7');
        $est   = $this->input->post('enfEst0').'_'.$this->input->post('enfEst1').'_'.$this->input->post('enfEst2').'_'.$this->input->post('enfEst3').'_'.$this->input->post('enfEst4').'_'.$this->input->post('enfEst5').'_'.$this->input->post('enfEst6').'_'.$this->input->post('enfEst7').'_'.$this->input->post('enfEst8');
        $con='';
        $cuidados   = $this->input->post('vigilancia').'_'.$this->input->post('alteraciones').'_'.$this->input->post('ansiedad').'_'.$this->input->post('conciencia').'_'.$this->input->post('contencion').'_'.$this->input->post('farmacologica').'_'.$this->input->post('protocolo').'_'.$this->input->post('tec').'_'.$this->input->post('bano');
        $comentario = $this->input->post('comentario');
        
        $vitales    = $this->input->post('hora').'_'.$this->input->post('pa').'_'.$this->input->post('fc').'_'.$this->input->post('temp').'_'.$this->input->post('sat').'_'.$this->input->post('talla').'_'.$this->input->post('peso').'_'.$this->input->post('imc');
        $fisico     = $this->input->post('examenFisico');
        $tabaco     = $this->input->post('tabacoR');
        $alcohol    = $this->input->post('alcoholR');
        $drogas     = $this->input->post('drogasR');
        $habitos    = $this->input->post('tabaco').'_'.$this->input->post('alcohol').'_'.$this->input->post('drogas');
       
        $morbidos   = $this->input->post('morbidos');
        $eliminacion= $this->input->post('intestinal').'_'.$this->input->post('vesical');
        $regimen    = $this->input->post('regimen');
        $psiquiatric= $this->input->post('previas').'_'.$this->input->post('diagnostico');
        $farmacos   = $this->input->post('farmacos');
        
        $ingreso    = $this->input->post('tipoIngreso').'_'.$this->input->post('procedencia');
        $motivo     = $this->input->post('motivo');
        
        
        
        //$conciencia = $this->input->post('somnoliencia').'_'.$this->input->post('confusion').'_'.$this->input->post('hipervigilancia').'_'.$this->input->post('delirium').'_'.$this->input->post('crepuscular').'_'.$this->input->post('despersonalizacion').'_'.$this->input->post('desrealizacion');
        //$orientacion= $this->input->post('espacio').'_'.$this->input->post('tiempo');
        //$memoria    = $this->input->post('atencion').'_'.$this->input->post('memoria');
        //$percepcion = $this->input->post('alucinaciones').'_'.$this->input->post('ilusiones').'_'.$this->input->post('tipo1').'_'.$this->input->post('tipo2').'_'.$this->input->post('tipo3').'_'.$this->input->post('tipo4').'_'.$this->input->post('tipo5');
        //$juicio     = $this->input->post('juicio').'_'.$this->input->post('obs');
        //$lenguaje   = $this->input->post('cursonormal').'_'.$this->input->post('coherente').'_'.$this->input->post('lenguanormal').'_'.$this->input->post('acelerado').'_'.$this->input->post('organizado').'_'.$this->input->post('bradilalia').'_'.$this->input->post('enlentecido').'_'.$this->input->post('incoherente').'_'.$this->input->post('mutismo').'_'.$this->input->post('prolijo').'_'.$this->input->post('delirante').'_'.$this->input->post('taquilalia').'_'.$this->input->post('estereotipado').'_'.$this->input->post('obsesivo').'_'.$this->input->post('ecolalia').'_'.$this->input->post('perseverante').'_'.$this->input->post('sobrevalorado').'_'.$this->input->post('palilalia').'_'.$this->input->post('disgregado').'_'.$this->input->post('fobico').'_'.$this->input->post('disartria').'_'.$this->input->post('verbigeracion').'_'.$this->input->post('impulsivo').'_'.$this->input->post('coprolalia').'_'.$this->input->post('lenguaobservacion');
        //$afectividad= $this->input->post('desanimo').'_'.$this->input->post('cuantnormal').'_'.$this->input->post('labilidad').'_'.$this->input->post('hipertimia').'_'.$this->input->post('aplanamiento').'_'.$this->input->post('hipotimia').'_'.$this->input->post('disforia').'_'.$this->input->post('ansiedad').'_'.$this->input->post('irritabilidad').'_'.$this->input->post('incontinencia').'_'.$this->input->post('indiferencia').'_'.$this->input->post('cuantOtro');
        //$conducta   = $this->input->post('conductanormal').'_'.$this->input->post('bradicinesia').'_'.$this->input->post('acinesia').'_'.$this->input->post('inhibicion').'_'.$this->input->post('inquietud').'_'.$this->input->post('agitacion').'_'.$this->input->post('flexibilidad').'_'.$this->input->post('tics').'_'.$this->input->post('manierismos').'_'.$this->input->post('conductaindiferencia').'_'.$this->input->post('negativismo').'_'.$this->input->post('colabora');
        //$sueno      = $this->input->post('insomnio').'_'.$this->input->post('conciliacion').'_'.$this->input->post('precoz').'_'.$this->input->post('global').'_'.$this->input->post('interrupciones').'_'.$this->input->post('hipersomnia').'_'.$this->input->post('pesadillas').'_'.$this->input->post('terrores').'_'.$this->input->post('sonambulismo').'_'.$this->input->post('nocturno').'_'.$this->input->post('dia').'_'.$this->input->post('suenoOtros');
        //$riesgos    = $this->input->post('ideacion').'_'.$this->input->post('impulso').'_'.$this->input->post('fuga').'_'.$this->input->post('autoagresion').'_'.$this->input->post('heteroagresion').'_'.$this->input->post('caidas').'_'.$this->input->post('sindrome').'_'.$this->input->post('nutricional').'_'.$this->input->post('conciencia').'_'.$this->input->post('adherencia').'_'.$this->input->post('riesgosotro');
        //$cuidados   = $this->input->post('vigilancia').'_'.$this->input->post('alteraciones').'_'.$this->input->post('ansiedad').'_'.$this->input->post('conciencia').'_'.$this->input->post('contencion').'_'.$this->input->post('farmacologica').'_'.$this->input->post('protocolo').'_'.$this->input->post('tec').'_'.$this->input->post('bano');
        //$comentario = $this->input->post('comentario');
        //
        //$vitales    = $this->input->post('hora').'_'.$this->input->post('pa').'_'.$this->input->post('fc').'_'.$this->input->post('temp').'_'.$this->input->post('sat').'_'.$this->input->post('talla').'_'.$this->input->post('peso').'_'.$this->input->post('imc');
        //$fisico     = $this->input->post('examenFisico');
        //$habitos    = $this->input->post('tabaco').'_'.$this->input->post('alcohol').'_'.$this->input->post('drogas');
        //$morbidos   = $this->input->post('morbidos');
        //$eliminacion= $this->input->post('intestinal').'_'.$this->input->post('vesical');
        //$regimen    = $this->input->post('regimen');
        //$psiquiatric= $this->input->post('previas').'_'.$this->input->post('diagnostico');
        //$farmacos   = $this->input->post('farmacos');
        //
        //$ingreso    = $this->input->post('tipoIngreso').'_'.$this->input->post('procedencia');
        //$motivo     = $this->input->post('motivo');
        
        $this->enfermeria_model->enfRegistro    = $id;
        $this->enfermeria_model->enfPaciente    = $data['datos']->paciente;
        
       //$this->enfermeria_model->enfConciencia  = $conciencia;
       //$this->enfermeria_model->enfOrientacion = $orientacion;
       //$this->enfermeria_model->enfMemoria     = $memoria;
       //$this->enfermeria_model->enfPercepcion  = $percepcion;
       //$this->enfermeria_model->enfJuicio      = $juicio;
       //$this->enfermeria_model->enfLenguaje    = $lenguaje;
       //$this->enfermeria_model->enfAfectividad = $afectividad;
       //$this->enfermeria_model->enfConducta    = $conducta;
       //$this->enfermeria_model->enfSueno       = $sueno;
       //$this->enfermeria_model->enfRiesgos     = $riesgos;
        
        
        $this->enfermeria_model->enfApariencia  = $this->input->post('enfApariencia');
        $this->enfermeria_model->enfConciencia  = $this->input->post('enfConciencia');
        $this->enfermeria_model->enfActitud     = $this->input->post('enfActitud');
        $this->enfermeria_model->enfConducta    = $this->input->post('enfConducta');
        
        $this->enfermeria_model->enfAfectividad = $this->input->post('enfAfectividad');
        $this->enfermeria_model->enfAnimo       = $this->input->post('enfAnimo');
        $this->enfermeria_model->enfLenguaje    = $this->input->post('enfLenguaje');
        $this->enfermeria_model->enfJuicio      = $this->input->post('enfJuicio');
        $this->enfermeria_model->enfCognitiva   = $cog;
        $this->enfermeria_model->enfEstPensamiento = $est;
        $this->enfermeria_model->enfConPensamiento = $con;
        
        
        
        $this->enfermeria_model->enfcuidados    = $cuidados;
        $this->enfermeria_model->enfComentario  = $comentario;
        $this->enfermeria_model->enfVitales     = $vitales;
        $this->enfermeria_model->enfExamenFisico= $fisico;
        $this->enfermeria_model->enfHabitos     = $habitos;
        $this->enfermeria_model->enfTabaco      = $tabaco;
        $this->enfermeria_model->enfAlcohol     = $alcohol;
        $this->enfermeria_model->enfDrogas      = $drogas;
        
        $this->enfermeria_model->enfMorbidos    = $morbidos;
        $this->enfermeria_model->enfEliminacion = $eliminacion;
        $this->enfermeria_model->enfPsiquiatrico= $psiquiatric;
        $this->enfermeria_model->enfRegimen     = $regimen;
        $this->enfermeria_model->enfIngreso     = $ingreso;
        $this->enfermeria_model->enfMotivo      = $motivo;
        $this->enfermeria_model->enfFarmacos    = $farmacos;
        $this->enfermeria_model->enfUsuario     = $this->session->userdata('id_usuario');
        $this->enfermeria_model->enfFechaRegistro = date('Y-m-d H:i:s');
        $this->enfermeria_model->guardar();
        
        $paciente   = $this->pacientes_model->dameUno($rut);
        $this->pacientes_model->id      =   $paciente->id;
        $this->pacientes_model->alergia =   $this->input->post('alergia');
        $this->pacientes_model->guardar();
                
        $regimen    = $this->pacientes_model->dameRegimenId($regimen);
        $this->ingreso_model->id            = $id;
        $this->ingreso_model->regimen       = $regimen->regNombre;
        $this->ingreso_model->guardar(); 
        
        
        
        
        
        $data['enfermeria'] = $this->enfermeria_model->dameUno($id);
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Cargar nuevo registro";
        $data['regimen']    = $this->pacientes_model->dameRegimen();
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarNuevoIngresoEnfermeria',$data,'clinica');   
    }
    public function cargarComentario($id)
    {
        $this->load->model("observaciones_model");
        $data['datos']          = $this->ingreso_model->dameUno($id);
        $data['observaciones']  = $this->observaciones_model->dameTodos($id);
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Cargar nuevo registro";
        
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarComentario',$data,'clinica');   
    }
    public function guardarComentario()
    {
        $this->load->model("observaciones_model");
        $this->observaciones_model->comRegistro         = $this->input->post('fichaElectro');
        $this->observaciones_model->comFechaRegistro    = date('Y-m-d H:i:s');
        $this->observaciones_model->comComentario       = $this->input->post('comentario');
        $this->observaciones_model->comUsuario          = $this->session->userdata('id_usuario');
        $this->observaciones_model->guardar();
        
        $data['datos']          = $this->ingreso_model->dameUno($this->input->post('fichaElectro'));
        $data['observaciones']  = $this->observaciones_model->dameTodos($this->input->post('fichaElectro'));
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Cargar nuevo registro";
        
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarComentario',$data,'clinica');   
    }
    
    
    
    public function cargarEscalaSuicidio($id)
    {
        $ids = explode('_',$id);
        $id         = $ids[1];
        $this->load->model("evoluciones_model");
        $data['datos']      = $this->ingreso_model->dameUno($id);
        $data['suicidio']   = $this->evoluciones_model->dameUnoSuicidio($id);
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Escala de Riesgo Suicida";
        $data['evoId']      = $ids[0];
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarEscalaSuicidio',$data,'clinica');   
    }
    public function guardarEscalaSuicidio()
    {    
        $this->load->model("evoluciones_model");
        $this->evoluciones_model->suiRegistro         = $this->input->post('fichaElectro');
        $this->evoluciones_model->suiFechaRegistro    = date('Y-m-d H:i:s');
        $this->evoluciones_model->suiDatos            = $this->input->post('0').'_'.$this->input->post('1').'_'.$this->input->post('2').'_'.$this->input->post('3').'_'.$this->input->post('4').'_'.$this->input->post('5').'_'.$this->input->post('6').'_'.$this->input->post('7').'_'.$this->input->post('8').'_'.$this->input->post('9').'_'.$this->input->post('10').'_'.$this->input->post('11').'_'.$this->input->post('12').'_'.$this->input->post('13').'_'.$this->input->post('14');
        $this->evoluciones_model->suiUsuario          = $this->session->userdata('id_usuario');
        $this->evoluciones_model->guardarSuicidio();
        //die($this->input->post('evoId').'dhjsdjdj');
        $evoId = $this->input->post('evoId');
        redirect(base_url().'clinica_enfermeria/ingresos/cargarEscalaSuicidio/_'.$this->input->post('fichaElectro'));
        // IF(!empty($evoId))
        //    redirect(base_url().'clinica_enfermeria/fichas/cargarEvolucion/'.$this->input->post('evoId'));
        //ELSE 
        //    redirect(base_url().'clinica_enfermeria/ingresos/cargarNuevoRegistro/'.$this->input->post('fichaElectro'));
    }
    public function cargarEscalaCaida($id)
    {//die(var_dump());
        $ids = explode('_',$id);
        $id         = $ids[1];
        $this->load->model("evoluciones_model");
        $data['datos']      = $this->ingreso_model->dameUno($id);
        $data['cai']        = $this->evoluciones_model->dameUnoCaida($id);
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Escala de Riesgo de Caídas Según Downton";
        $data['evoId']      = $ids[0];
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarEscalaCaida',$data,'clinica');   
    }
    public function guardarEscalaCaida()
    {    
        $this->load->model("evoluciones_model");
        $this->evoluciones_model->caiRegistro       = $this->input->post('fichaElectro');
        $this->evoluciones_model->caiFechaRegistro  = date('Y-m-d H:i:s');
        $this->evoluciones_model->caiUsuario        = $this->session->userdata('id_usuario');
        $this->evoluciones_model->caiPrevias        = $this->input->post('caiPrevias');  
        
        //die($this->input->post('caiPrevias'));
        $this->evoluciones_model->caiMedNinguno     = $this->input->post('caiMedNinguno');  
        $this->evoluciones_model->caiMedSedantes    = $this->input->post('caiMedSedantes');  
        $this->evoluciones_model->caiMedDiureticos  = $this->input->post('caiMedDiureticos');  
        $this->evoluciones_model->caiMedHipo        = $this->input->post('caiMedHipo');  
        $this->evoluciones_model->caiMedParkinson   = $this->input->post('caiMedParkinson');  
        $this->evoluciones_model->caiMedDepresivos  = $this->input->post('caiMedDepresivos');  
        $this->evoluciones_model->caiMedOtro        = $this->input->post('caiMedOtro');  
        
        $this->evoluciones_model->caiDefNinguno     = $this->input->post('caiDefNinguno');  
        $this->evoluciones_model->caiDefVisual      = $this->input->post('caiDefVisual');  
        $this->evoluciones_model->caiDefAuditiva    = $this->input->post('caiDefAuditiva');  
        $this->evoluciones_model->caiDefExtremidades= $this->input->post('caiDefExtremidades');  
        
        $this->evoluciones_model->caiEstado         = $this->input->post('caiEstado');  
        
        $this->evoluciones_model->caiDeaNormal      = $this->input->post('caiDeaNormal');  
        $this->evoluciones_model->caiDeaSegura      = $this->input->post('caiDeaSegura');  
        $this->evoluciones_model->caiDeaInsegura    = $this->input->post('caiDeaInsegura');  
        $this->evoluciones_model->caiDeaImposible   = $this->input->post('caiDeaImposible');  
        
        $this->evoluciones_model->guardarCaida();
        //die($this->input->post('evoId').'dhjsdjdj');
        $evoId = $this->input->post('evoId');
        redirect(base_url().'clinica_enfermeria/ingresos/cargarEscalaCaida/_'.$this->input->post('fichaElectro'));
        
        //F(!empty($evoId))
        //  redirect(base_url().'clinica_enfermeria/fichas/cargarEvolucion/'.$this->input->post('evoId'));
        //ELSE 
        //  redirect(base_url().'clinica_enfermeria/ingresos/cargarNuevoRegistro/'.$this->input->post('fichaElectro'));
    }
    
    
    
    
    
    
    
    ////////ENFERMERIA//////////////
    public function cargarEvolucionEnfermeria($id)
    {//EVOLUCION
    
        $evoId = $this->enfermeria_model->dameUnoEvaluacion($id);
        IF(!empty($evoId)){
        //$data['evo'] = $evoId;
        $fecha = date('Y-m-d H:i:s');
        $hora = strtotime('-1 hour',strtotime($fecha));
        $horaRegistro = strtotime($evoId->evoFechaRegistro);
        
                
                IF($horaRegistro > $hora && $this->session->userdata('id_usuario') === $evoId->evoUsuario){
                    $data['evoId']    =  $evoId;
                }
                ELSE {
                    $this->enfermeria_model->evoUsuario        = $this->session->userdata('id_usuario');
                    $this->enfermeria_model->evoRegistro       = $id;
                    $this->enfermeria_model->evoFechaRegistro  = date('Y-m-d H:i:s');
                    $this->enfermeria_model->guardarEvolucion();
                    $evoId                 = $this->enfermeria_model->dameUnoEvaluacion($id);
                    $data['evoId']     = $evoId;
                }
        }ELSE {
            $this->enfermeria_model->evoUsuario        = $this->session->userdata('id_usuario');
            $this->enfermeria_model->evoRegistro       = $id;
            $this->enfermeria_model->evoFechaRegistro  = date('Y-m-d H:i:s');
            $this->enfermeria_model->guardarEvolucion();
            $evoId                 = $this->enfermeria_model->dameUnoEvaluacion($id);
            $data['evoId']     = $evoId;
        }
         
        //var_dump($evoId);
        $data['vias']       = $this->evoluciones_model->dameVias();
        $data['farmacos']   = $this->evoluciones_model->dameFarmacos();
        //$evolucion          = $this->enfermeria_model->dameUnoId($id);
        //$data['evo']        = $evolucion;
        $data['datos']      = $this->ingreso_model->dameUno($evoId->evoRegistro);
        $data['edad']       = $this->calculaedad($data['datos']->fechaNacimiento);
        
        $data['medicamento']= $this->enfermeria_model->dameUnoMedicamento($evoId->evoId);
        
        $data['suicidio']   = $this->evoluciones_model->dameUnoSuicidio($evoId->evoRegistro);
        $caida              = $this->evoluciones_model->dameUnoCaida($evoId->evoRegistro);
        IF(!empty($caida)){
            $data['caida']  = $caida->caiPrevias+$caida->caiMedSedantes+$caida->caiMedDiureticos+$caida->caiMedHipo+$caida->caiMedParkinson+$caida->caiMedDepresivos+$caida->caiMedOtro+$caida->caiDefVisual+$caida->caiDefAuditiva+$caida->caiDefExtremidades+$caida->caiEstado+$caida->caiDeaSegura+$caida->caiDeaInsegura+$caida->caiDeaImposible;
        }//die(var_dump($evoId));
        //$data['evoId']  = $evoId->evoId;
        $data['regimen']    = $this->pacientes_model->dameRegimen();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['medico']     = $this->profesionales_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        $data['breadcumb']  = "Evolucion";
        $data['title']      = "Listar Evoluciones";
        $data['menu']       = 'fichas';
        Layout_Helper::cargaVista($this,'cargarEvolucionEnfermeria',$data,'clinica');   
        
        
        
        //redirect(base_url().'clinica_enfermeria/fichas/cargarEvolucionEnfermeria/'.$evoId->evoId);
    }
    
    public function guardarEvolucionEnfermeria()
    {
        $rut        = str_replace(array(".","-"), "", $this->input->post('rut'));
        $letra      = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
        $paciente   = $this->pacientes_model->dameUno($rut);
        $ficha      = $this->ingreso_model->dameFicha($paciente->id);
        $alergia    = $this->input->post('alergias');
    ////GUARDAR PACIENTE  
        if(!empty($alergia)){
            $this->pacientes_model->id          = $paciente->id;
            $this->pacientes_model->alergia     = $alergia;
            $this->pacientes_model->guardar();
            unset($this->pacientes_model->id,$this->pacientes_model->alergia);
        }
    ////CREA FICHA
        $regimen = $this->input->post('regimen');
        $regimen = $this->pacientes_model->dameRegimenId($regimen);
        $this->ingreso_model->id            = $this->input->post('fichaElectro');
        $this->ingreso_model->diagnostico   = $this->input->post('diagnostico');
        $this->ingreso_model->diagnosticoDerivacion     = $this->input->post('diagnosticoDerivacion');
        $this->ingreso_model->nombresMedicoSolicitante  = $this->input->post('medicoSolicitante');
        $this->ingreso_model->medicoAsignado= $this->input->post('medicoAsignado');
        $this->ingreso_model->regimen       = $regimen->regNombre;
        $this->ingreso_model->guardar();
        
        $evoId = $this->input->post('evoId');
        IF(!empty($evoId))$this->evoluciones_model->evoId        = $evoId;
        $this->enfermeria_model->evoUsuario        = $this->session->userdata('id_usuario');
        $this->enfermeria_model->evoRegistro       = $this->input->post('fichaElectro');
        $this->enfermeria_model->evoFechaRegistro  = date('Y-m-d H:i:s');
        $this->enfermeria_model->evoEstadia        = $this->input->post('evoEstadia');
        $this->enfermeria_model->evoHabitacion     = $this->input->post('evoHabitacion');
        $this->enfermeria_model->evoPeso           = $this->input->post('evoPeso');
        $this->enfermeria_model->evoTalla            = $this->input->post('evoTalla');
        $this->enfermeria_model->evoRiesgo         = $this->input->post('evoRiesgo');
        $this->enfermeria_model->evoDowton         = $this->input->post('evoDowton');
        $this->enfermeria_model->evoDiagMedico     = $this->input->post('evoDiagMedico');
        $this->enfermeria_model->evoDiagPsiquiatra = $this->input->post('evoDiagPsiquiatra');
        
        $this->enfermeria_model->evoVisitasText       = $this->input->post('evoVisitasText');
        $this->enfermeria_model->evoTelefonoText       = $this->input->post('evoTelefonoText');
        $this->enfermeria_model->evoSalidasText       = $this->input->post('evoSalidasText');
        $this->enfermeria_model->evoCuidadorText       = $this->input->post('evoCuidadorText');
      
        $this->enfermeria_model->evoCSV0           = $this->input->post('evoCSV00').'_'.$this->input->post('evoCSV01').'_'.$this->input->post('evoCSV02').'_'.$this->input->post('evoCSV03').'_'.$this->input->post('evoCSV04').'_'.$this->input->post('evoCSV05').'_'.$this->input->post('evoCSV06').'_'.$this->input->post('evoCSV07').'_'.$this->input->post('evoCSV08').'_'.$this->input->post('evoCSV09');
        $this->enfermeria_model->evoCSV1           = $this->input->post('evoCSV10').'_'.$this->input->post('evoCSV11').'_'.$this->input->post('evoCSV12').'_'.$this->input->post('evoCSV13').'_'.$this->input->post('evoCSV14').'_'.$this->input->post('evoCSV15').'_'.$this->input->post('evoCSV16').'_'.$this->input->post('evoCSV17').'_'.$this->input->post('evoCSV18').'_'.$this->input->post('evoCSV19');
        $this->enfermeria_model->evoCSV2           = $this->input->post('evoCSV20').'_'.$this->input->post('evoCSV21').'_'.$this->input->post('evoCSV22').'_'.$this->input->post('evoCSV23').'_'.$this->input->post('evoCSV24').'_'.$this->input->post('evoCSV25').'_'.$this->input->post('evoCSV26').'_'.$this->input->post('evoCSV27').'_'.$this->input->post('evoCSV28').'_'.$this->input->post('evoCSV29');
        $this->enfermeria_model->evoCSV3           = $this->input->post('evoCSV30').'_'.$this->input->post('evoCSV31').'_'.$this->input->post('evoCSV32').'_'.$this->input->post('evoCSV33').'_'.$this->input->post('evoCSV34').'_'.$this->input->post('evoCSV35').'_'.$this->input->post('evoCSV36').'_'.$this->input->post('evoCSV37').'_'.$this->input->post('evoCSV38').'_'.$this->input->post('evoCSV39');
        $this->enfermeria_model->evoCSV4           = $this->input->post('evoCSV40').'_'.$this->input->post('evoCSV41').'_'.$this->input->post('evoCSV42').'_'.$this->input->post('evoCSV43').'_'.$this->input->post('evoCSV44').'_'.$this->input->post('evoCSV45').'_'.$this->input->post('evoCSV46').'_'.$this->input->post('evoCSV47').'_'.$this->input->post('evoCSV48').'_'.$this->input->post('evoCSV49');
        $this->enfermeria_model->evoCSV5           = $this->input->post('evoCSV50').'_'.$this->input->post('evoCSV51').'_'.$this->input->post('evoCSV52').'_'.$this->input->post('evoCSV53').'_'.$this->input->post('evoCSV54').'_'.$this->input->post('evoCSV55').'_'.$this->input->post('evoCSV56').'_'.$this->input->post('evoCSV57').'_'.$this->input->post('evoCSV58').'_'.$this->input->post('evoCSV59');
        $this->enfermeria_model->evoCSV6           = $this->input->post('evoCSV60').'_'.$this->input->post('evoCSV61').'_'.$this->input->post('evoCSV62').'_'.$this->input->post('evoCSV63').'_'.$this->input->post('evoCSV64').'_'.$this->input->post('evoCSV65').'_'.$this->input->post('evoCSV66').'_'.$this->input->post('evoCSV67').'_'.$this->input->post('evoCSV68').'_'.$this->input->post('evoCSV69');
        $this->enfermeria_model->evoCSV7           = $this->input->post('evoCSV70').'_'.$this->input->post('evoCSV71').'_'.$this->input->post('evoCSV72').'_'.$this->input->post('evoCSV73').'_'.$this->input->post('evoCSV74').'_'.$this->input->post('evoCSV75').'_'.$this->input->post('evoCSV76').'_'.$this->input->post('evoCSV77').'_'.$this->input->post('evoCSV78').'_'.$this->input->post('evoCSV79');
        $this->enfermeria_model->evoCSV8           = $this->input->post('evoCSV80').'_'.$this->input->post('evoCSV81').'_'.$this->input->post('evoCSV82').'_'.$this->input->post('evoCSV83').'_'.$this->input->post('evoCSV84').'_'.$this->input->post('evoCSV85').'_'.$this->input->post('evoCSV86').'_'.$this->input->post('evoCSV87').'_'.$this->input->post('evoCSV88').'_'.$this->input->post('evoCSV89');
        $this->enfermeria_model->evoCSV9           = $this->input->post('evoCSV90').'_'.$this->input->post('evoCSV91').'_'.$this->input->post('evoCSV92').'_'.$this->input->post('evoCSV93').'_'.$this->input->post('evoCSV94').'_'.$this->input->post('evoCSV95').'_'.$this->input->post('evoCSV96').'_'.$this->input->post('evoCSV97').'_'.$this->input->post('evoCSV98').'_'.$this->input->post('evoCSV99');
       
        $this->enfermeria_model->evoSueDia         = $this->input->post('evoSueDia');
        $this->enfermeria_model->evoSueNoche       = $this->input->post('evoSueNoche');
        $this->enfermeria_model->evoHidraDia       = $this->input->post('evoHidraDia');
        $this->enfermeria_model->evoHidraNoche     = $this->input->post('evoHidraNoche');
       
        $this->enfermeria_model->evoAlimentacion   = $this->input->post('alim1').'_'.$this->input->post('alim2').'_'.$this->input->post('alim3').'_'.$this->input->post('alim4').'_'.$this->input->post('alim5').'_'.$this->input->post('alim6');
        $this->enfermeria_model->evoVisitas        = $this->input->post('evoVisitas');
        $this->enfermeria_model->evoTelefono       = $this->input->post('evoTelefono');
        $this->enfermeria_model->evoSalidas        = $this->input->post('evoSalidas');
        $this->enfermeria_model->evoCuidador       = $this->input->post('evoCuidador');
        
        $this->enfermeria_model->evoTO             = $this->input->post('evoTO1').'_'.$this->input->post('evoTO2').'_'.$this->input->post('evoTOOtro');
        $this->enfermeria_model->evoMed0           = $this->input->post('evoMed00').'_'.$this->input->post('evoMed01').'_'.$this->input->post('evoMed02').'_'.$this->input->post('evoMed03').'_'.$this->input->post('evoMed04').'_'.$this->input->post('evoMed05').'_'.$this->input->post('evoMed06').'_'.$this->input->post('evoMed07').'_'.$this->input->post('evoMed08').'_'.$this->input->post('evoMed09').'_'.$this->input->post('evoMed010').'_'.$this->input->post('evoMed011').'_'.$this->input->post('evoMed012').'_'.$this->input->post('evoMed013').'_'.$this->input->post('evoMed014').'_'.$this->input->post('evoMed015').'_'.$this->input->post('evoMed016');
        $this->enfermeria_model->evoMed1           = $this->input->post('evoMed10').'_'.$this->input->post('evoMed11').'_'.$this->input->post('evoMed12').'_'.$this->input->post('evoMed13').'_'.$this->input->post('evoMed14').'_'.$this->input->post('evoMed15').'_'.$this->input->post('evoMed16').'_'.$this->input->post('evoMed17').'_'.$this->input->post('evoMed18').'_'.$this->input->post('evoMed19').'_'.$this->input->post('evoMed110').'_'.$this->input->post('evoMed111').'_'.$this->input->post('evoMed112').'_'.$this->input->post('evoMed113').'_'.$this->input->post('evoMed114').'_'.$this->input->post('evoMed115').'_'.$this->input->post('evoMed116');
        $this->enfermeria_model->evoMed2           = $this->input->post('evoMed20').'_'.$this->input->post('evoMed21').'_'.$this->input->post('evoMed22').'_'.$this->input->post('evoMed23').'_'.$this->input->post('evoMed24').'_'.$this->input->post('evoMed25').'_'.$this->input->post('evoMed26').'_'.$this->input->post('evoMed27').'_'.$this->input->post('evoMed28').'_'.$this->input->post('evoMed29').'_'.$this->input->post('evoMed210').'_'.$this->input->post('evoMed211').'_'.$this->input->post('evoMed212').'_'.$this->input->post('evoMed213').'_'.$this->input->post('evoMed214').'_'.$this->input->post('evoMed215').'_'.$this->input->post('evoMed216');
        $this->enfermeria_model->evoMed3           = $this->input->post('evoMed30').'_'.$this->input->post('evoMed31').'_'.$this->input->post('evoMed32').'_'.$this->input->post('evoMed33').'_'.$this->input->post('evoMed34').'_'.$this->input->post('evoMed35').'_'.$this->input->post('evoMed36').'_'.$this->input->post('evoMed37').'_'.$this->input->post('evoMed38').'_'.$this->input->post('evoMed39').'_'.$this->input->post('evoMed310').'_'.$this->input->post('evoMed311').'_'.$this->input->post('evoMed312').'_'.$this->input->post('evoMed313').'_'.$this->input->post('evoMed314').'_'.$this->input->post('evoMed315').'_'.$this->input->post('evoMed316');
        $this->enfermeria_model->evoMed4           = $this->input->post('evoMed40').'_'.$this->input->post('evoMed41').'_'.$this->input->post('evoMed42').'_'.$this->input->post('evoMed43').'_'.$this->input->post('evoMed44').'_'.$this->input->post('evoMed45').'_'.$this->input->post('evoMed46').'_'.$this->input->post('evoMed47').'_'.$this->input->post('evoMed48').'_'.$this->input->post('evoMed49').'_'.$this->input->post('evoMed410').'_'.$this->input->post('evoMed411').'_'.$this->input->post('evoMed412').'_'.$this->input->post('evoMed413').'_'.$this->input->post('evoMed414').'_'.$this->input->post('evoMed415').'_'.$this->input->post('evoMed416');
        $this->enfermeria_model->evoMed5           = $this->input->post('evoMed50').'_'.$this->input->post('evoMed51').'_'.$this->input->post('evoMed52').'_'.$this->input->post('evoMed53').'_'.$this->input->post('evoMed54').'_'.$this->input->post('evoMed55').'_'.$this->input->post('evoMed56').'_'.$this->input->post('evoMed57').'_'.$this->input->post('evoMed58').'_'.$this->input->post('evoMed59').'_'.$this->input->post('evoMed510').'_'.$this->input->post('evoMed511').'_'.$this->input->post('evoMed512').'_'.$this->input->post('evoMed513').'_'.$this->input->post('evoMed514').'_'.$this->input->post('evoMed515').'_'.$this->input->post('evoMed516');
        $this->enfermeria_model->evoMed6           = $this->input->post('evoMed60').'_'.$this->input->post('evoMed61').'_'.$this->input->post('evoMed62').'_'.$this->input->post('evoMed63').'_'.$this->input->post('evoMed64').'_'.$this->input->post('evoMed65').'_'.$this->input->post('evoMed66').'_'.$this->input->post('evoMed67').'_'.$this->input->post('evoMed68').'_'.$this->input->post('evoMed69').'_'.$this->input->post('evoMed610').'_'.$this->input->post('evoMed611').'_'.$this->input->post('evoMed612').'_'.$this->input->post('evoMed613').'_'.$this->input->post('evoMed614').'_'.$this->input->post('evoMed615').'_'.$this->input->post('evoMed616');
        $this->enfermeria_model->evoMed7           = $this->input->post('evoMed70').'_'.$this->input->post('evoMed71').'_'.$this->input->post('evoMed72').'_'.$this->input->post('evoMed73').'_'.$this->input->post('evoMed74').'_'.$this->input->post('evoMed75').'_'.$this->input->post('evoMed76').'_'.$this->input->post('evoMed77').'_'.$this->input->post('evoMed78').'_'.$this->input->post('evoMed79').'_'.$this->input->post('evoMed710').'_'.$this->input->post('evoMed711').'_'.$this->input->post('evoMed712').'_'.$this->input->post('evoMed713').'_'.$this->input->post('evoMed714').'_'.$this->input->post('evoMed715').'_'.$this->input->post('evoMed716');
        $this->enfermeria_model->evoMed8           = $this->input->post('evoMed80').'_'.$this->input->post('evoMed81').'_'.$this->input->post('evoMed82').'_'.$this->input->post('evoMed83').'_'.$this->input->post('evoMed84').'_'.$this->input->post('evoMed85').'_'.$this->input->post('evoMed86').'_'.$this->input->post('evoMed87').'_'.$this->input->post('evoMed88').'_'.$this->input->post('evoMed89').'_'.$this->input->post('evoMed810').'_'.$this->input->post('evoMed811').'_'.$this->input->post('evoMed812').'_'.$this->input->post('evoMed813').'_'.$this->input->post('evoMed814').'_'.$this->input->post('evoMed815').'_'.$this->input->post('evoMed816');
        $this->enfermeria_model->evoMed9           = $this->input->post('evoMed90').'_'.$this->input->post('evoMed91').'_'.$this->input->post('evoMed92').'_'.$this->input->post('evoMed93').'_'.$this->input->post('evoMed94').'_'.$this->input->post('evoMed95').'_'.$this->input->post('evoMed96').'_'.$this->input->post('evoMed97').'_'.$this->input->post('evoMed98').'_'.$this->input->post('evoMed99').'_'.$this->input->post('evoMed910').'_'.$this->input->post('evoMed911').'_'.$this->input->post('evoMed912').'_'.$this->input->post('evoMed913').'_'.$this->input->post('evoMed914').'_'.$this->input->post('evoMed915').'_'.$this->input->post('evoMed916');
        
        $this->enfermeria_model->evoPlan           = $this->input->post('evoPlan');
        $this->enfermeria_model->evoExamenes       = $this->input->post('evoExamenes');
        $this->enfermeria_model->evoAvisar         = $this->input->post('evoAvisar');
        
        $this->enfermeria_model->evoDia            = $this->input->post('evoDia');
        $this->enfermeria_model->evoNoche          = $this->input->post('evoNoche');
        
        $this->enfermeria_model->evoHoras          = $this->input->post('evoHor0').'_'.$this->input->post('evoHor1').'_'.$this->input->post('evoHor2').'_'.$this->input->post('evoHor3').'_'.$this->input->post('evoHor4').'_'.$this->input->post('evoHor5').'_'.$this->input->post('evoHor6').'_'.$this->input->post('evoHor7').'_'.$this->input->post('evoHor10').'_'.$this->input->post('evoHor11').'_'.$this->input->post('evoHor12').'_'.$this->input->post('evoHor13').'_'.$this->input->post('evoHor14').'_'.$this->input->post('evoHor15').'_'.$this->input->post('evoHor16').'_'.$this->input->post('evoHor17');
        
        $this->enfermeria_model->evoVia            = $this->input->post('evoVia0').'_'.$this->input->post('evoVia1').'_'.$this->input->post('evoVia2').'_'.$this->input->post('evoVia3').'_'.$this->input->post('evoVia4').'_'.$this->input->post('evoVia5').'_'.$this->input->post('evoHor6').'_'.$this->input->post('evoVia7').'_'.$this->input->post('evoVia8').'_'.$this->input->post('evoVia9').'_'.$this->input->post('evoVia10').'_'.$this->input->post('evoVia11').'_'.$this->input->post('evoVia12').'_'.$this->input->post('evoVia13');
        
        $this->enfermeria_model->guardarEvolucion();
        
        redirect(base_url().'clinica_enfermeria/ingresos/listarIngreso/');
        // redirect(base_url().'clinica_enfermeria/ingresos/listarIngreso/');
       //F(!empty($evoId)) 
       //   redirect(base_url().'clinica_enfermeria/fichas/cargarEvolucion/'.$evoId);
       //ELSE
       //   redirect(base_url().'clinica_enfermeria/fichas/listarEvoluciones/'.$this->input->post('fichaElectro'));
        
    }
    
    
    public function cargarPlanDeAtencion($id)
    {
        $ids = explode('_',$id);
        $id         = $ids[1];
        //$this->load->model("evoluciones_model");
        $data['datos']      = $this->ingreso_model->dameUno($id);
        $data['plan']   = $this->enfermeria_model->dameUnoPlanDeAtencion($id);
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Plan de Atención de Enfermería y Evolución Clínica";
        $data['evoId']      = $ids[0];
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarPlanDeAtencion',$data,'clinica');   
    }
    public function guardarPlanDeAtencion()
    {
        
        $this->enfermeria_model->plaRiesgos           = $this->input->post('rie0').'_'.$this->input->post('rie1').'_'.$this->input->post('rie2').'_'.$this->input->post('rie3').'_'.$this->input->post('rie4').'_'.$this->input->post('rie5').'_'.$this->input->post('rie6');
        $this->enfermeria_model->plaCuidados         = $this->input->post('cui0').'_'.$this->input->post('cui1').'_'.$this->input->post('cui2').'_'.$this->input->post('cui3').'_'.$this->input->post('cui4').'_'.$this->input->post('cui5').'_'.$this->input->post('cui6').'_'.$this->input->post('cui7').'_'.$this->input->post('cui8').'_'.$this->input->post('cui9').'_'.$this->input->post('cui10').'_'.$this->input->post('cui11').'_'.$this->input->post('cui12').'_'.$this->input->post('cui13').'_'.$this->input->post('cui14').'_'.$this->input->post('cui15').'_'.$this->input->post('cui16').'_'.$this->input->post('cui17').'_'.$this->input->post('cui18').'_'.$this->input->post('cui19').'_'.$this->input->post('cui20');
        //die($this->input->post('cui0').'_'.$this->input->post('cui1').'_'.$this->input->post('cui2').'_'.$this->input->post('cui3').'_'.$this->input->post('cui4').'_'.$this->input->post('cui5').'_'.$this->input->post('cui6').'_'.$this->input->post('cui7').'_'.$this->input->post('cui8').'_'.$this->input->post('cui9').'_'.$this->input->post('cui10').'_'.$this->input->post('cui11').'_'.$this->input->post('cui12').'_'.$this->input->post('cui13').'_'.$this->input->post('cui14').'_'.$this->input->post('cui15').'_'.$this->input->post('cui16').'_'.$this->input->post('cui17').'_'.$this->input->post('cui18').'_'.$this->input->post('cui19').'_'.$this->input->post('cui20'));
        $this->enfermeria_model->plaRegistro           = $this->input->post('registro');
        $this->enfermeria_model->plaOtros                 = $this->input->post('plaOtros');
        $this->enfermeria_model->plaFecha               = date('Y-m-d H:i:s');
        $this->enfermeria_model->guardarPlanDeAtencion();
        
        $this->cargarPlanDeAtencion('_'.$this->input->post('registro'));
        
    }
    
    
}