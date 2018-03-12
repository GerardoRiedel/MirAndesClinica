<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Ingresos extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();


        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
        $this->load->helper('layout');
        
        //$this->load->database('default');
        //$this->folder = 'uploads/';
        
        $this->load->model("comunas_model");
        $this->load->model("pacientes_model");
        $this->load->model("apoderados_model");
        $this->load->model("profesionales_model");
        $this->load->model("isapres_model");
        $this->load->model("bancos_model");
        $this->load->model("ingreso_model");
        $this->load->model("licencias_model");
        
        $this->load->model("parametros_model");
        $this->load->model("evoluciones_model");
        $this->load->model("enfermeria_model");
    }
    public function inicio()
    {
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Inicio";
        Layout_Helper::cargaVista($this,'inicio',$data,'ingresos');   
    }
    public function index()
    {
        $data['regimen'] = $this->pacientes_model->dameRegimen();
        $data['medico']   = $this->profesionales_model->dameTodo();
        $data['banco']     = $this->bancos_model->dameTodo();
        $data['tipoCta']   = $this->bancos_model->dameTodoTipo();
        $data['comuna']  = $this->comunas_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Ficha de Ingreso";
        
        $data['menu']       = "ingreso";
        $data['submenu']    = "ningreso";
        Layout_Helper::cargaVista($this,'nuevo_ingreso',$data,'ingresos');   
    }
    
    public function guardarficha()
    {
        
        $rut        = str_replace(array(".","-"), "", $this->input->post('rut'));
        $nac = $this->input->post('nac');
        IF($nac === '1'){
            $letra      = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
        }
        $rutApo     = str_replace(array(".","-"), "", $this->input->post('rutApo'));
        $letra      = substr($rutApo,0,1);if ($letra === '1' || $letra === '2'){$rutApo = substr($rutApo, 0, 8);}else {$rutApo = substr($rutApo, 0, 7);}
        $rutTitular = str_replace(array(".","-"), "", $this->input->post('rutTitular'));
        $letra      = substr($rutTitular,0,1);if ($letra === '1' || $letra === '2'){$rutTitular = substr($rutTitular, 0, 8);}else {$rutTitular = substr($rutTitular, 0, 7);}
        $date       = $this->input->post('fecha');
        $date       = str_replace("/", "-", $date);
        $date       = new DateTime($date);
        
        $fecha      = $date->format('Y-m-d');
        $comuna     = $this->input->post('comuna');
        $region     = $this->comunas_model->dameUno($comuna);
        
    ////GUARDAR PACIENTE    
        $paciente   = $this->pacientes_model->dameUno($rut);
        if(!empty($paciente->id)){$this->pacientes_model->id = $paciente->id;}
        
        $alergia    = $this->input->post('alergias');
    ////GUARDAR PACIENTE  
        if(!empty($alergia)){
            $this->pacientes_model->alergia         = $alergia;
        }
            $this->pacientes_model->nombres         = $this->input->post('nombres');
            $this->pacientes_model->apellidoPaterno = $this->input->post('apePat');
            $this->pacientes_model->apellidoMaterno = $this->input->post('apeMat');
            $this->pacientes_model->fechaNacimiento = $fecha;
            $this->pacientes_model->nacionalidad    = $this->input->post('nac');
            $this->pacientes_model->telefono        = $this->input->post('telFijo');
            $this->pacientes_model->celular         = $this->input->post('telMovil');
            $this->pacientes_model->email           = $this->input->post('email');
            $this->pacientes_model->sexo            = $this->input->post('sexo');
            $this->pacientes_model->direccion       = $this->input->post('direccion');
            $this->pacientes_model->ocupacion       = $this->input->post('ocupacion');
            $this->pacientes_model->comuna          = $this->input->post('comuna');
            $this->pacientes_model->region          = $region->padre;
            $this->pacientes_model->rut             = $rut;
            $this->pacientes_model->guardar($rut);
            unset($this->pacientes_model->id,$this->pacientes_model->rut,$this->pacientes_model->ocupacion,$this->pacientes_model->direccion,$this->pacientes_model->sexo,$this->pacientes_model->email,$this->pacientes_model->nombres,$this->pacientes_model->apellidoPaterno,$this->pacientes_model->apellidoMaterno,$this->pacientes_model->fechaNacimiento,$this->pacientes_model->telefono,$this->pacientes_model->celular);
        
        $regimen    = $this->input->post('regimen');//die($regimen);
        //$regimen    = $this->pacientes_model->dameRegimenId($regimen);
        $paciente   = $this->pacientes_model->dameUno($rut);
        $ficha      = $this->input->post('ficha');
        IF(empty($ficha) || $ficha === '0' || $ficha === 'Sin ficha, se creará al ingreso' || $ficha = '-1'){
            $ficha = $this->ingreso_model->dameFicha($paciente->id);
        }
        ELSE {
        $ficha =$this->input->post('ficha');
        }
         
        $fechaIngreso = $this->input->post('fechaIngreso');
        $fechaIngreso = str_replace("/", "-", $fechaIngreso);
        $fechaIngreso = new DateTime($fechaIngreso);
        $fechaIngreso = $fechaIngreso->format('Y-m-d');
        
        $idFichaHoy = $this->ingreso_model->dameIdFichaHoy($paciente->id);
        IF(!empty($idFichaHoy))$this->ingreso_model->id = $idFichaHoy->id;
        ////CREA FICHA
            $this->ingreso_model->dateIn            = date('Y-m-d H:i:s');
            $this->ingreso_model->fechaIngresoReal  = date('Y-m-d');
            $this->ingreso_model->horaIngresoReal   = date('H:i:s');
            $this->ingreso_model->fechaIngreso      = $fechaIngreso;
            $this->ingreso_model->horaIngreso       = date('H:i:s');
            $this->ingreso_model->origenDerivacion  = 'UGH';
            $this->ingreso_model->institucion       = 'CETEP';
            $this->ingreso_model->fechaDerivacion   = date('Y-m-d');
            
            $this->ingreso_model->comentario    = $this->input->post('comentario');
            $this->ingreso_model->diagnostico   = $this->input->post('diagnostico');
            $medico = $this->input->post('medicoAsignado');
            IF($medico === '0')$medico ='';
            $this->ingreso_model->medicoAsignado= $medico;
            $this->ingreso_model->regimen          = $regimen;
            $this->ingreso_model->ingresoMirAndes = 1;
            $this->ingreso_model->ges                   = $this->input->post('ges');
            $this->ingreso_model->paciente           = $paciente->id;
            $this->ingreso_model->isapre               = $this->input->post('isapre');
            $this->ingreso_model->ficha                  = $ficha;
            $this->ingreso_model->edadPaciente  = $this->calculaedad($fecha);
            $this->ingreso_model->comuna            = $this->input->post('comuna');
            $this->ingreso_model->usuarioIn          = $this->session->userdata('id_usuario');
            $this->ingreso_model->rutTitular           = $rutTitular;
            $this->ingreso_model->piso                   = $this->input->post('piso');
            $this->ingreso_model->emergenciaDerivar = $this->input->post('emergenciaDerivar');
            $this->ingreso_model->ingresoAdministrativo = $this->input->post('ingresoAdministrativo');
            $this->ingreso_model->guardar();
            
            //die($regimen);
        $idFicha = $this->ingreso_model->dameIdFicha($paciente->id);
    ////GUARDAR APODERADO    
        $apoderado   = $this->apoderados_model->damePorDatos($rutApo,$idFicha->id,1);
        //$apoderado   = $this->apoderados_model->dameUno($this->input->post('rutApo'));
        if(!empty($apoderado->id)){$this->apoderados_model->apoId = $apoderado->id;}
            $this->apoderados_model->apoNombre      = $this->input->post('nombresApo');
            $this->apoderados_model->apoApePat      = $this->input->post('apePatApo');
            $this->apoderados_model->apoApeMat      = $this->input->post('apeMatApo');
            $this->apoderados_model->apoTelefono    = $this->input->post('telFijoApo');
            $this->apoderados_model->apoCelular     = $this->input->post('telMovilApo');
            $this->apoderados_model->apoEmail       = $this->input->post('emailApo');
            $this->apoderados_model->apoDireccion   = $this->input->post('direccionApo');
            $this->apoderados_model->apoParentesco  = $this->input->post('parentescoApo');
            $this->apoderados_model->apoComuna      = $this->input->post('comunaApo');
            $this->apoderados_model->apoFechaRegistro= date('Y-m-d H:i:s');
            $this->apoderados_model->apoRut         = $rutApo;
            $this->apoderados_model->apoTipo        = 1;
            $this->apoderados_model->apoFichaElectronica = $idFicha->id;
            $this->apoderados_model->guardar();
            unset($this->apoderados_model->apoFechaRegistro,$this->apoderados_model->apoId,$this->apoderados_model->apoApeMat,$this->apoderados_model->apoEmail,$this->apoderados_model->apoNombre,$this->apoderados_model->apoTipo,$this->apoderados_model->apoComuna,$this->apoderados_model->apoParentesco,$this->apoderados_model->apoDireccion,$this->apoderados_model->apoRut,$this->apoderados_model->apoApePat,$this->apoderados_model->id,$this->apoderados_model->rut,$this->apoderados_model->ocupacion,$this->apoderados_model->direccion,$this->apoderados_model->sexo,$this->apoderados_model->email,$this->apoderados_model->nombres,$this->apoderados_model->apellidoPaterno,$this->apoderados_model->apellidoMaterno,$this->apoderados_model->fechaNacimiento,$this->apoderados_model->telefono,$this->apoderados_model->celular,$this->apoderados_model->apoTelefono,$this->apoderados_model->apoCelular);
        
////GUARDAR CONTACTO     
            $nombreContacto = $this->input->post('nombreOtroContacto');
            $telUnoContacto = $this->input->post('telUnoOtroContacto');
            $telDosContacto = $this->input->post('telDosOtroContacto');
            $parentescoOtroContacto = $this->input->post('parentescoOtroContacto');
            
            IF(!empty($nombreContacto))
            {$this->apoderados_model->apoNombre      = $nombreContacto;}
            IF(!empty($telUnoContacto))
            {$this->apoderados_model->apoTelefono    = $telUnoContacto;}
            IF(!empty($telDosContacto))
            {$this->apoderados_model->apoCelular     = $telDosContacto;}
            IF(!empty($parentescoOtroContacto))
            {$this->apoderados_model->apoParentesco  = $parentescoOtroContacto;}
            
            IF(!empty($nombreContacto) && (!empty($telUnoContacto) || !empty($telDosContacto)))
            {
                
                $apoderado = $this->apoderados_model->dameUnoContacto($idFicha->id);
                //die($apoderado->apoId);
                IF(!empty($apoderado->apoId))$this->apoderados_model->apoId = $apoderado->apoId;
                $this->apoderados_model->apoTipo            = 3;
                $this->apoderados_model->apoFechaRegistro   = date('Y-m-d H:i:s');
                $this->apoderados_model->apoFichaElectronica = $idFicha->id;
                $this->apoderados_model->guardar();
            }
            
            unset($this->apoderados_model->id,$this->apoderados_model->rut,$this->apoderados_model->ocupacion,$this->apoderados_model->direccion,$this->apoderados_model->sexo,$this->apoderados_model->email,$this->apoderados_model->nombres,$this->apoderados_model->apellidoPaterno,$this->apoderados_model->apellidoMaterno,$this->apoderados_model->fechaNacimiento,$this->apoderados_model->telefono,$this->apoderados_model->celular);
          
    ////GUARDAR LICENCIA     
            $licNumero  = $this->input->post('licNumero');
            IF(!empty($licNumero) && $this->input->post('licDias')>='1'){
                $licDesde   = new DateTime($this->input->post('licDesde'));
                $licDesde   = $licDesde->format('Y-m-d');

                $licDias    = $this->input->post('licDias')-1;
                $licHasta   = date("Y-m-d", strtotime("$licDesde + $licDias days"));
                $licDias    = $this->input->post('licDias');

                $this->licencias_model->licNombre   = $this->input->post('nombres');
                $this->licencias_model->licApePat   = $this->input->post('apePat');
                $this->licencias_model->licApeMat   = $this->input->post('apeMat');
                $this->licencias_model->licRut      = $rut;
                $this->licencias_model->licUsuario  = $this->session->userdata('id_usuario');
                $this->licencias_model->licNumero   = $licNumero;
                $this->licencias_model->licDesde    = $licDesde;
                $this->licencias_model->licHasta    = $licHasta;
                $this->licencias_model->licDias     = $licDias;
                $this->licencias_model->licPaciente = $paciente->id;
                $this->licencias_model->licRegistro = $idFicha->id;
                $this->licencias_model->licFechaRegistro = date('Y-m-d H:i:s');

                $this->licencias_model->guardar();
            }
     
        $data['ctaGes']     = $this->input->post('ges');
        $data['registro']   = $idFicha->id;
        $data['pacApePat']  = $this->input->post('apePat');
        $data['pacApeMat']  = $this->input->post('apeMat');
        $data['pacRut']     = $rut;
        $data['pacNombre']  = $this->input->post('nombres');
        
        $data['banco']      = $this->bancos_model->dameTodo();
        $data['tipoCta']    = $this->bancos_model->dameTodoTipo();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        $data['conceptos']  = $this->bancos_model->dameConceptos();
        unset($this->bancos_model->dameConceptos,$this->bancos_model->dameTodoTipo,$this->bancos_model->dameTodo);
        
        $depositos          = $this->bancos_model->dameDepositoUsuario($paciente->id);
                
                IF(!empty($depositos)){
                    $data['deposito'] = $depositos;
                }ELSE $data['deposito'] = '';
               

        $data['ges']        = $this->input->post('ges');
        $data['breadcumb']  = "Registros";
        $data['title']      = "Apoderado Economico";
        $data['menu']       = "ingreso";
        $data['submenu']    = "ningreso";
        Layout_Helper::cargaVista($this,'devolucion_ingreso',$data,'ingresos');   
    }
    function calculaedad($fecha){
        $date2  = date('Y-m-d');//
        $diff   = abs(strtotime($date2) - strtotime($fecha));
        $years  = floor($diff / (365*60*60*24));
        //$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        //$days   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        return $years;
    }
    
    public function listarIngreso()
    {
        $data['datos']      = $this->ingreso_model->dameIngresos();
        //die(var_dump($data['datos']));
        $data['ultimo']     = $this->ingreso_model->dameUltimo();
        $data['breadcumb']  = "Registros";
        $data['title']      = "Lista de Registros";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'listar_ingreso',$data,'ingresos');   
    }
    public function filtrolistarIngreso()
    {
        $fechaDesde = $this->input->post('fechaDesde');
        $fechaHasta = $this->input->post('fechaHasta');
        $data['fechaDesde'] = $fechaDesde;
        IF(!empty($fechaHasta)) $data['fechaHasta'] = $fechaHasta;
        ELSE $data['fechaHasta'] = date('Y-m-d');
        $fechaDesdeAlta = $this->input->post('fechaDesdeAlta');
        $fechaHastaAlta = $this->input->post('fechaHastaAlta');
        //die($fechaDesdeAlta.'---'.$fechaHastaAlta);
        $filtro     = $this->input->post('filtro');
        $filtro     = str_replace(array(".","-"), "", $filtro);
        $letra      = substr($filtro,0,1);if ($letra === "1" || $letra === "2"){$filtro = substr($filtro, 0, 8);}else {$filtro = substr($filtro, 0, 7);}
        $data['ultimo']     = $this->ingreso_model->dameUltimo();
        $data['datos']      = $this->ingreso_model->dameIngresos($filtro,$fechaDesde,$fechaHasta,$fechaDesdeAlta,$fechaHastaAlta,$alta='no',$administrador='si');
        IF(!empty($filtro) || !empty($fechaDesde) || !empty($fechaDesdeAlta))$data['filtro'] = 'si';    
        $data['breadcumb']  = "Registros";
        $data['title']      = "Lista de Registros";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'listar_ingreso',$data,'ingresos');   
    }
    public function modificarRegistro($id)
    {
        $data['datos']      = $this->ingreso_model->dameUno($id);
        $data['datosApo']   = $this->apoderados_model->dameUnoPorFicha($id);
        $data['devolucion'] = $this->bancos_model->dameUno($id);
        $data['regimen']    = $this->pacientes_model->dameRegimen();
        $data['medico']     = $this->profesionales_model->dameTodo();
        $data['banco']      = $this->bancos_model->dameTodo();
        $data['tipoCta']    = $this->bancos_model->dameTodoTipo();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        //$data['isapres']    = $this->isapres_model->dameTodo();
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Modificar Ficha de Ingreso";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'modificar_registro',$data,'ingresos');   
    }
    
    public function guardarModificarRegistro()
    {

        $rut        = str_replace(array(".","-"), "", $this->input->post('rut'));
        $nac = $this->input->post('nac');
        IF($nac === '1'){
            $letra      = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
        }
        //$letra      = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
        $rutApo     = str_replace(array(".","-"), "", $this->input->post('rutApo'));
        $letra      = substr($rutApo,0,1);if ($letra === '1' || $letra === '2'){$rutApo = substr($rutApo, 0, 8);}else {$rutApo = substr($rutApo, 0, 7);}
        $rutEco     = str_replace(array(".","-"), "", $this->input->post('rutApoEco'));
        $letra      = substr($rutEco,0,1);if ($letra === '1' || $letra === '2'){$rutEco = substr($rutEco, 0, 8);}else {$rutEco = substr($rutEco, 0, 7);}
        $rutTitular = str_replace(array(".","-"), "", $this->input->post('rutTitular'));
        $letra      = substr($rutTitular,0,1);if ($letra === '1' || $letra === '2'){$rutTitular = substr($rutTitular, 0, 8);}else {$rutTitular = substr($rutTitular, 0, 7);}
        $rutDev     = str_replace(array(".","-"), "", $this->input->post('rutDev'));
        $letra      = substr($rutDev,0,1);if ($letra === '1' || $letra === '2'){$rutDev = substr($rutDev, 0, 8);}else {$rutDev = substr($rutDev, 0, 7);}
        
        
        $date       = new DateTime($this->input->post('fecha'));
        $fecha      = $date->format('Y-m-d');
        
        $alergia    = $this->input->post('alergias');
    ////GUARDAR PACIENTE  
        if(!empty($alergia)){
            $this->pacientes_model->alergia         = $alergia;
        }  
        $paciente   = $this->pacientes_model->dameUnoId($this->input->post('paciente'));
        if(!empty($paciente->id)){$this->pacientes_model->id = $paciente->id;}
            $this->pacientes_model->nombres         = $this->input->post('nombres');
            $this->pacientes_model->apellidoPaterno = $this->input->post('apePat');
            $this->pacientes_model->apellidoMaterno = $this->input->post('apeMat');
            $this->pacientes_model->fechaNacimiento = $fecha;
            $this->pacientes_model->telefono        = $this->input->post('telFijo');
            $this->pacientes_model->celular         = $this->input->post('telMovil');
            $this->pacientes_model->email           = $this->input->post('email');
            $this->pacientes_model->sexo            = $this->input->post('sexo');
            $this->pacientes_model->direccion       = $this->input->post('direccion');
            $this->pacientes_model->ocupacion       = $this->input->post('ocupacion');
            $this->pacientes_model->nacionalidad    = $this->input->post('nac');
            //$this->pacientes_model->rut             = $rut;
            $this->pacientes_model->guardar($rut);
            unset($this->pacientes_model->id,$this->pacientes_model->rut,$this->pacientes_model->ocupacion,$this->pacientes_model->direccion,$this->pacientes_model->sexo,$this->pacientes_model->email,$this->pacientes_model->nombres,$this->pacientes_model->apellidoPaterno,$this->pacientes_model->apellidoMaterno,$this->pacientes_model->fechaNacimiento,$this->pacientes_model->telefono,$this->pacientes_model->celular);
        
        
    ////GUARDAR APODERADO    
        $apoderado   = $this->apoderados_model->damePorDatos($rutApo,$this->input->post('fichaElectro'),1);
        if(!empty($apoderado->id)){$this->apoderados_model->apoId = $apoderado->id;}
            $this->apoderados_model->apoNombre      = $this->input->post('nombresApo');
            $this->apoderados_model->apoApePat      = $this->input->post('apePatApo');
            $this->apoderados_model->apoApeMat      = $this->input->post('apeMatApo');
            $this->apoderados_model->apoTelefono    = $this->input->post('telFijoApo');
            $this->apoderados_model->apoCelular     = $this->input->post('telMovilApo');
            $this->apoderados_model->apoEmail       = $this->input->post('emailApo');
            $this->apoderados_model->apoDireccion   = $this->input->post('direccionApo');
            $this->apoderados_model->apoParentesco  = $this->input->post('parentescoApo');
            $this->apoderados_model->apoComuna      = $this->input->post('comunaApo');
            $this->apoderados_model->apoRut         = $rutApo;
            $this->apoderados_model->apoTipo        = 1;
            $this->apoderados_model->apoFichaElectronica = $this->input->post('fichaElectro');
            $this->apoderados_model->guardar();
            unset($this->apoderados_model->apoApeMat,$this->apoderados_model->apoId,$this->apoderados_model->rut,$this->apoderados_model->ocupacion,$this->apoderados_model->direccion,$this->apoderados_model->sexo,$this->apoderados_model->email,$this->apoderados_model->nombres,$this->apoderados_model->apellidoPaterno,$this->apoderados_model->apellidoMaterno,$this->apoderados_model->fechaNacimiento,$this->apoderados_model->telefono,$this->apoderados_model->celular);
    
    ////GUARDAR APODERADO ECONOMICO SI ES DISTINTO AL NORMAL
        $apoderadoEco = $this->apoderados_model->damePorDatos($rutEco,$this->input->post('fichaElectro'),2);
        if(!empty($apoderadoEco->id)){$this->apoderados_model->apoId = $apoderadoEco->id;}
            $this->apoderados_model->apoNombre      = $this->input->post('nombresApoEco');
            $this->apoderados_model->apoApePat      = $this->input->post('apePatApoEco');
            $this->apoderados_model->apoApeMat      = $this->input->post('apeMatApoEco');
            $this->apoderados_model->apoTelefono    = $this->input->post('telFijoApoEco');
            $this->apoderados_model->apoCelular     = $this->input->post('telMovilApoEco');
            $this->apoderados_model->apoEmail       = $this->input->post('emailApoEco');
            $this->apoderados_model->apoDireccion   = $this->input->post('direccionApoEco');
            $this->apoderados_model->apoParentesco  = $this->input->post('parentescoEco');
            $this->apoderados_model->apoComuna      = $this->input->post('comunaApoEco');
            $this->apoderados_model->apoRut         = $rutEco;
            $this->apoderados_model->apoTipo        = 2;
            $this->apoderados_model->apoFichaElectronica = $this->input->post('fichaElectro');
            $this->apoderados_model->guardar();
            unset($this->apoderados_model->apoApeMat,$this->apoderados_model->apoId,$this->apoderados_model->rut,$this->apoderados_model->ocupacion,$this->apoderados_model->direccion,$this->apoderados_model->sexo,$this->apoderados_model->email,$this->apoderados_model->nombres,$this->apoderados_model->apellidoPaterno,$this->apoderados_model->apellidoMaterno,$this->apoderados_model->fechaNacimiento,$this->apoderados_model->telefono,$this->apoderados_model->celular);
            unset($this->apoderados_model->apoEmail,$this->apoderados_model->apoNombre,$this->apoderados_model->apoTipo,$this->apoderados_model->apoComuna,$this->apoderados_model->apoParentesco,$this->apoderados_model->apoDireccion,$this->apoderados_model->apoRut,$this->apoderados_model->apoApePat,$this->apoderados_model->id,$this->apoderados_model->rut,$this->apoderados_model->ocupacion,$this->apoderados_model->direccion,$this->apoderados_model->sexo,$this->apoderados_model->email,$this->apoderados_model->nombres,$this->apoderados_model->apellidoPaterno,$this->apoderados_model->apellidoMaterno,$this->apoderados_model->fechaNacimiento,$this->apoderados_model->telefono,$this->apoderados_model->celular,$this->apoderados_model->apoTelefono,$this->apoderados_model->apoCelular);
        
////GUARDAR DATOS DE DEVOLUCION
            $fichas = $this->bancos_model->dameUno($this->input->post('fichaElectro'));
            $ficha  = $this->input->post('ficha');
            IF(!empty($ficha))
                {
                $dep    = $this->bancos_model->dameUltimoDeposito($this->input->post('fichaElectro'));
                $ficha  = $this->input->post('ficha');
                    IF(!empty($dep)){
                        $this->bancos_model->depId      = $dep->depId;
                        $this->bancos_model->depFicha   = $ficha;
                        $this->bancos_model->guardarDeposito();
                        unset($this->bancos_model->depFicha,$this->bancos_model->depId);
                    }
                }
            ELSE 
                {$ficha = $this->ingreso_model->dameFicha($paciente->id);}
            
            $this->bancos_model->ctaId           = $fichas->ctaId;
            $this->bancos_model->ctaPaciente     = $paciente->id;
            
            $banco = $this->input->post('banco');
            IF(!empty($banco))$this->bancos_model->ctaBanco = $banco;
            $tipo = $this->input->post('tipoCta');
            IF(!empty($tipo))$this->bancos_model->ctaTipo   = $tipo;
            $cta = $this->input->post('NCta');
            IF(!empty($cta))$this->bancos_model->ctaNumero  = $cta;
            
            $this->bancos_model->ctaRut          = $rutDev;
            $this->bancos_model->ctaRutPaciente  = $rut;
            $this->bancos_model->ctaEmail        = $this->input->post('emailDev');
            $this->bancos_model->ctaNombre       = $this->input->post('nombresDev');
            $this->bancos_model->ctaApellido     = $this->input->post('apePatDev');
            $this->bancos_model->ctaApellidoM    = $this->input->post('apeMatDev');
            $this->bancos_model->ctaRegistro     = $this->input->post('fichaElectro');
            $this->bancos_model->ctaGes          = $this->input->post('ges');
            $this->bancos_model->ctaFicha        = $ficha;
            $this->bancos_model->guardarCta();
            
        
    ////CREA FICHA
            $registro                           = $this->input->post('fichaElectro');
            $this->ingreso_model->id            = $registro;
            
            $fechaIngreso   = new DateTime($this->input->post('fechaIngreso'));
            $fechaIngreso   = $fechaIngreso->format('Y-m-d');
            $regimen = $this->input->post('regimen');
            $regimen = $this->pacientes_model->dameRegimenId($regimen);
            $this->ingreso_model->comentario    = $this->input->post('comentario');
            $this->ingreso_model->diagnostico   = $this->input->post('diagnostico');
            $medico = $this->input->post('medicoAsignado');
            IF($medico === '0')$medico ='';
            $this->ingreso_model->medicoAsignado= $medico;
            //$this->ingreso_model->regimen       = $this->input->post('regimen');
            $this->ingreso_model->regimen       = $regimen->regNombre;
            $this->ingreso_model->fechaIngreso  = $fechaIngreso;
            $this->ingreso_model->horaIngreso   = $this->input->post('horaIngreso');
            $this->ingreso_model->usuarioIn     = $this->session->userdata('id_usuario');
            //$this->ingreso_model->paciente      = $paciente->id;
            $this->ingreso_model->isapre        = $this->input->post('isapre');
            $this->ingreso_model->ficha         = $ficha;
            $this->ingreso_model->edadPaciente  = $this->calculaedad($fecha);
            $this->ingreso_model->rutTitular    = $rutTitular;
            $this->ingreso_model->comuna        = $this->input->post('comuna');
            $this->ingreso_model->ges           = $this->input->post('ges');
            $this->ingreso_model->piso          = $this->input->post('piso');
            $this->ingreso_model->emergenciaDerivar = $this->input->post('emergenciaDerivar');
            $this->ingreso_model->ingresoAdministrativo = $this->input->post('ingresoAdministrativo');
            
            $this->ingreso_model->guardar($registro);
         
        ////GUARDAR CONTACTO     
            $nombreContacto = $this->input->post('nombreOtroContacto');
            $telUnoContacto = $this->input->post('telUnoOtroContacto');
            $telDosContacto = $this->input->post('telDosOtroContacto');
            $parentescoOtroContacto = $this->input->post('parentescoOtroContacto');
            
            IF(!empty($nombreContacto))
            {$this->apoderados_model->apoNombre      = $nombreContacto;}
            IF(!empty($telUnoContacto))
            {$this->apoderados_model->apoTelefono    = $telUnoContacto;}
            IF(!empty($telDosContacto))
            {$this->apoderados_model->apoCelular     = $telDosContacto;}
            IF(!empty($parentescoOtroContacto))
            {$this->apoderados_model->apoParentesco  = $parentescoOtroContacto;}
            $this->apoderados_model->apoTipo        = 3;
            $this->apoderados_model->apoFichaElectronica = $this->input->post('fichaElectro');
            IF(!empty($nombreContacto) && (!empty($telUnoContacto) || !empty($telDosContacto)))
            {$this->apoderados_model->guardar();}
            
            
        redirect(base_url().'clinica_admision/ingresos/listarIngreso');
    }
    
    public function imprimir($id)
    {
        $datos              = $this->ingreso_model->dameUno($id);
        $data['datos']      = $datos;
        $data['datosApo']   = $this->apoderados_model->dameUnoPorFicha($id);
        $data['devolucion'] = $this->bancos_model->dameUno($id);
        $licencia           = $this->licencias_model->dameUltimo($id);
        $fechaIng           = $datos->fechaIngreso.' '.$datos->horaIngreso;
        
        IF(!empty($licencia)){
            IF(!empty($licencia->licDesde) && !empty($licencia->licDias)){
                $licDesde           = $licencia->licDesde;
                $nuevafecha         = strtotime ( '+'.$licencia->licDias.' day' , strtotime ( $licDesde ) ) ;
                $mes                = date ( 'm' , $nuevafecha );if($mes==='10')$mes='Octubre';elseif($mes==='11')$mes='Noviembre';elseif($mes==='12')$mes='Diciembre';elseif($mes==='1')$mes='Enero';elseif($mes==='2')$mes='Febrero';elseif($mes==='3')$mes='Marzo';elseif($mes==='4')$mes='Abril';elseif($mes==='5')$mes='Mayo';elseif($mes==='6')$mes='Junio';elseif($mes==='7')$mes='Julio';elseif($mes==='8')$mes='Agosto';elseif($mes==='9')$mes='Septiembre';
                $dia                = date ( 'd' , $nuevafecha );
                $ano                = date ( 'Y' , $nuevafecha );
                $nuevafecha         = $dia.' de '.$mes.' de '.$ano;
            }
        }
        ELSE {
            $nuevafecha='..............';
        }
        
        IF(!empty($fechaIng)){
            $fechaIng         = strtotime ( $fechaIng ) ;
            $mes = date ( 'm' , $fechaIng );if($mes==='10')$mes='Octubre';elseif($mes==='11')$mes='Noviembre';elseif($mes==='12')$mes='Diciembre';elseif($mes==='1')$mes='Enero';elseif($mes==='2')$mes='Febrero';elseif($mes==='3')$mes='Marzo';elseif($mes==='4')$mes='Abril';elseif($mes==='5')$mes='Mayo';elseif($mes==='6')$mes='Junio';elseif($mes==='7')$mes='Julio';elseif($mes==='8')$mes='Agosto';elseif($mes==='9')$mes='Septiembre';
            $sem = date ( 'D' , $fechaIng );if($sem==='Mon')$sem='Lunes';elseif($sem==='Tue')$sem='Martes';elseif($sem==='Wed')$sem='Miercoles';elseif($sem==='Thu')$sem='Jueves';elseif($sem==='Fri')$sem='Viernes';elseif($sem==='Sat')$sem='Sabado';elseif($sem==='Sun')$sem='Domingo';
            $dia        = date ( 'd' , $fechaIng );
            $ano        = date ( 'Y' , $fechaIng );
            $hr         = date ( 'H:s' , $fechaIng );
            $fechaIng   = $sem.', '.$dia.' de '.$mes.' de '.$ano.', '.$hr.' hrs';
        }
        ELSE {
            $fechaIng='..............';
        }
        
        $data['fecha']   = $fechaIng;
        $data['licencia']   = $nuevafecha;
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Ficha de Ingreso";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'imprimir',$data,'ingresos');   
    }
    public function licencias($filtro='')
    {
        IF($filtro != '')$data['datos'] = $this->licencias_model->dameLicenciasPorVencer();
        ELSE $data['datos'] = $this->licencias_model->dameTodo();
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Licencias Emitidas";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'licencias',$data,'ingresos');   
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
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarLicencias',$data,'ingresos');   
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
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'licencias',$data,'ingresos');   
    }
    public function eliminar($id)
    {
        $this->ingreso_model->id = $id;
        $this->ingreso_model->ficha = -1;
        $this->ingreso_model->dateIn  = date('Y-m-d H:i:s');
        $this->ingreso_model->usuarioIn  = $this->session->userdata('id_usuario');
        $this->ingreso_model->guardar();
        
        $deposito = $this->bancos_model->dameTodosDeposito($id);
        //die(var_dump($deposito));
        IF(!empty($deposito)){
            FOREACH ($deposito as $dep){
                $this->bancos_model->depId      = $dep->depId;
                $this->bancos_model->depEstado  = 5;
                $this->bancos_model->guardarDeposito();
            }
        }
        $data['ultimo']     = $this->ingreso_model->dameUltimo();
        $data['datos']      = $this->ingreso_model->dameIngresos();
        $data['breadcumb']  = "Registros";
        $data['title']      = "Lista de Registros";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'listar_ingreso',$data,'ingresos');   
    }
    
    
    
    
    
    public function cargarInsumos($id)
    {
        //CHEQUEAR QUE EXISTE EL NOMBRE
        $exp = explode('_',$id);
        $id = $exp[0];
        $data['existe']     = $exp[1];
        $data['farmacos']   = $this->evoluciones_model->dameFarmacos();
        $data['insumos']    = $this->enfermeria_model->dameInsumos();
        $data['examenes']   = $this->enfermeria_model->dameExamenes();
        $data['datos']      = $this->ingreso_model->dameUno($id);
        
        $insumosAsignados = $this->enfermeria_model->dameInsumosAsignados($id);
        $depositos = $this->bancos_model->dameTodosDeposito($id);
        //die(var_dump($insumosAsignados));
        $data['depositos'] = $depositos;
        $data['insumosAsignados'] = $insumosAsignados;
        $data['breadcumb']  = "Registros";
        $data['title']      = "Lista de Insumos para Prefactura";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarInsumos',$data,'ingresos');   
    }
    public function guardarInsumos()
    {
        $id = $this->input->post('registro');
        $this->enfermeria_model->inaRegistro        = $id;
        $this->enfermeria_model->inaFechaRegistro   = date('Y-m-d H:i:s');
        $this->enfermeria_model->inaUsuario         = $this->session->userdata('id_usuario');
        $this->enfermeria_model->inaBoleta            = $this->input->post('insBoleta');
        $this->enfermeria_model->inaOrden            = $this->input->post('exaOrden');
        
        $cantidad = $this->input->post('cantidadFarmaco');
        $farm = explode('_', $this->input->post('farmaco'));
        IF(!empty($cantidad) && $farm[0]!=='0'){
            $this->enfermeria_model->inaCantidad = $cantidad;
            $this->enfermeria_model->inaValor   = $farm[1];
            $this->enfermeria_model->inaInsumo  = $farm[0];
            $this->enfermeria_model->inaTipo    = 2;
            $this->enfermeria_model->guardarInsumosAsignados();
            unset($this->enfermeria_model->inaTipo,$this->enfermeria_model->inaInsumo,$this->enfermeria_model->inaValor,$this->enfermeria_model->inaCantidad);
        }
        $cantidad = $this->input->post('cantidadInsumo');
        $insu = explode('_', $this->input->post('insumo'));
        IF(!empty($cantidad) && $insu[0]!=='0'){
            $this->enfermeria_model->inaCantidad = $cantidad;
            $this->enfermeria_model->inaValor   = $insu[1];
            $this->enfermeria_model->inaInsumo  = $insu[0];
            $this->enfermeria_model->inaTipo    = 1;
            $this->enfermeria_model->guardarInsumosAsignados();
            unset($this->enfermeria_model->inaTipo,$this->enfermeria_model->inaInsumo,$this->enfermeria_model->inaValor,$this->enfermeria_model->inaCantidad);
        
            ////////////REVISA SI ES PACK/////////////
            IF($insu[0]==='9'){
            $this->pack($insu[0],$insu[1],$id,3);
            }ELSE die();
            
            
        }
        $cantidad = $this->input->post('cantidadExamen');
        $exam = explode('_', $this->input->post('examen'));
        IF(!empty($cantidad) && $exam[0]!=='0'){
            $this->enfermeria_model->inaCantidad = $cantidad;
            $this->enfermeria_model->inaValor   = $exam[1];
            $this->enfermeria_model->inaInsumo  = $exam[0];
            $this->enfermeria_model->inaTipo    = 3;
            $this->enfermeria_model->guardarInsumosAsignados();
            unset($this->enfermeria_model->inaTipo,$this->enfermeria_model->inaInsumo,$this->enfermeria_model->inaValor,$this->enfermeria_model->inaCantidad);
        }
        
        
        $nombre     = $this->input->post('otroNombre');
        $tipo       = $this->input->post('otroTipo');
        $cantidad   = $this->input->post('otroCantidad');
        $valor      = $this->input->post('otroValor');
        
        IF(!empty($nombre) && $tipo!=='0' && !empty($cantidad)){
            
            IF($tipo==='1'){
                $existe = $this->parametros_model->dameNombreFarmaco($nombre);
                IF(empty($existe)){
                $this->parametros_model->descripcion    = $nombre;
                $this->parametros_model->farmValor       = $valor;
                $this->parametros_model->estado         = 1;
                $this->parametros_model->farmUsuario    = $this->session->userdata('id_usuario');
                $this->parametros_model->guardarFarmaco();
                
                $ultimo = $this->parametros_model->dameUltimoFarmaco();
                $this->enfermeria_model->inaInsumo   = $ultimo->idfarmaco;
                }
            }
            ELSEIF($tipo==='2'){
                $existe = $this->parametros_model->dameNombreInsumo($nombre);
                IF(empty($existe)){
                $this->parametros_model->insNombre  = $nombre;
                $this->parametros_model->insValor  = $valor;
                $this->parametros_model->insEstado  = 1;
                $this->parametros_model->insUsuario = $this->session->userdata('id_usuario');
                $this->parametros_model->guardarInsumo();
                
                $ultimo = $this->parametros_model->dameUltimoInsumo();
                $this->enfermeria_model->inaInsumo   = $ultimo->insId;
                }
            }
            ELSEIF($tipo==='3'){
                $existe = $this->parametros_model->dameNombreExamen($nombre);
                IF(empty($existe)){
                $this->parametros_model->exaNombre  = $nombre;
                $this->parametros_model->exaValor   = $valor;
                $this->parametros_model->exaEstado  = 1;
                $this->parametros_model->exaUsuario = $this->session->userdata('id_usuario');
                $this->parametros_model->exaCodigo  = $this->input->post('otroCodigo');
                $this->parametros_model->guardarExamen();
                
                $ultimo = $this->parametros_model->dameUltimoExamen();
                $this->enfermeria_model->inaInsumo   = $ultimo->exaId;
                }
            }
            $this->enfermeria_model->inaValor    = $valor;
            $this->enfermeria_model->inaCantidad = $cantidad;
            $this->enfermeria_model->inaTipo     = $tipo;
            IF(empty($existe)){
                $id = $id.'_NO';//CHECK EXISTE NOMBRE
                $this->enfermeria_model->guardarInsumosAsignados();
            }
            ELSE $id = $id.'_SI';
        }ELSE {
            //CHECK EXISTE NOMBRE
            $id = $id.'_NO';
        }
             
        redirect(base_url().'clinica_admision/ingresos/cargarInsumos/'.$id);
        
    }
    public function pack($insumo,$valor,$registro,$estado){
        $pack = $this->parametros_model->damePack($insumo);
        
        FOREACH($pack as $pak){
            IF($estado === 3){
                $this->enfermeria_model->inaCantidad = 1;
                $this->enfermeria_model->inaEstado  = $estado;
                $this->enfermeria_model->inaValor   = $valor;
                $this->enfermeria_model->inaInsumo  = $pak->pakInsumo;
                $this->enfermeria_model->inaTipo    = 3;
                $this->enfermeria_model->inaRegistro        = $registro;
            } ELSEIF($estado === 2){
                
                $this->enfermeria_model->inaId  = 2;   
                $this->enfermeria_model->inaEstado  = $estado;
                $this->enfermeria_model->inaFechaRegistro   = date('Y-m-d H:i:s');
                $this->enfermeria_model->inaUsuario         = $this->session->userdata('id_usuario');
            }
            //$this->enfermeria_model->inaBoleta            = $this->input->post('insBoleta');
            //$this->enfermeria_model->inaOrden            = $this->input->post('exaOrden');
            $this->enfermeria_model->guardarInsumosAsignados();
            
        }
    }
    public function eliminarInsumo($id)
    {
        $id = explode('_', $id);
        $this->enfermeria_model->inaId              = $id[1];
        $this->enfermeria_model->inaFechaRegistro   = date('Y-m-d H:i:s');
        $this->enfermeria_model->inaUsuario         = $this->session->userdata('id_usuario');
        $this->enfermeria_model->inaEstado          = 2;
        $this->enfermeria_model->guardarInsumosAsignados();
        $insumoAsignado = $this->enfermeria_model->dameUnoInsumoAsignado();
        IF($insumoAsignado->inaInsumo==='9'){
            
            $this->pack($insumoAsignado->inaRegistro,$valor=0,$insumoAsignado->inaRegistro,2);
            }ELSE die();
        redirect(base_url().'clinica_admision/ingresos/cargarInsumos/'.$id[0].'_NO');
    }
    
    
    
    
    
    public function modificarInsumoAsignado($id)
    {
        $data['datos']     = $this->enfermeria_model->dameUnoInsumoAsignado($id);
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Lista de Insumos";
        
        $data['menu']       = "ingresos";
        $data['submenu']    = "lingresos";
        Layout_Helper::cargaVista($this,'modificarInsumoAsignado',$data,'ingresos');   
    }
    
    public function guardarModificarInsumoAsignado()
    {
        $this->enfermeria_model->inaId      = $this->input->post('inaId');
        $this->enfermeria_model->inaValor   = $this->input->post('inaValor');
        //$this->enfermeria_model->inaNombre  = $this->input->post('insNombre');
        $this->enfermeria_model->inaEstado  = 1;
        $this->enfermeria_model->guardarInsumosAsignados();
        
        $id = $this->input->post('registro').'_NO';
        
             
        redirect(base_url().'clinica_admision/ingresos/cargarInsumos/'.$id);
    }
}