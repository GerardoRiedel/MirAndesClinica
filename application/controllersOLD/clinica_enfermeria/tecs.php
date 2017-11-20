<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Tecs extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();


        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
        $this->load->helper('layout');
        
        $this->load->database('default');
        $this->folder = 'uploads/';
        
        $this->load->model("ingreso_model");
        $this->load->model("profesionales_model");
        $this->load->model("pacientes_model");
        $this->load->model("apoderados_model");
        $this->load->model("isapres_model");
        $this->load->model("comunas_model");
        $this->load->model("bancos_model");
        $this->load->model("tecs_model");
        $this->load->model("parametros_model");
        $this->load->model("evoluciones_model");
        $this->load->model("enfermeria_model");
    }
    public function nuevoIngreso()
    {
        $data['medico']     = $this->profesionales_model->dameTodo();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        $data['breadcumb']  = "Ingreso";
        $data['menu']       = "tecs";
        $data['submenu']    = "itecs";
        $data['title']      = "T.E.C";
        Layout_Helper::cargaVista($this,'nuevo_ingreso',$data,'clinica');  
    }
    public function listarIngreso()
    {
        $data['datos']      = $this->tecs_model->dameTodo();
        $data['breadcumb']  = "Ingreso";
        $data['menu']       = "tecs";
        $data['submenu']    = "ltecs";
        $data['title']      = "T.E.C";
        Layout_Helper::cargaVista($this,'listar_ingreso',$data,'clinica');  
    }
    public function guardarTEC()
    {
        $rut        = str_replace(array(".","-"), "", $this->input->post('rut'));
        $letra      = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
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
        
        $paciente   = $this->pacientes_model->dameUno($rut);
        $ficha      = $this->input->post('ficha');
        IF(empty($ficha) || $ficha === '0' || $ficha === 'Sin ficha, se creará al ingreso' || $ficha = '-1'){
            $ficha = $this->tecs_model->dameTecFicha($paciente->id);
        }
        ELSE {
        $ficha =$this->input->post('ficha');
        }
        
        $fechaIngreso = $this->input->post('fechaIngreso');
        $fechaIngreso = str_replace("/", "-", $fechaIngreso);
        $fechaIngreso = new DateTime($fechaIngreso);
        $fechaIngreso = $fechaIngreso->format('Y-m-d');
        
        $idFichaHoy = $this->tecs_model->dameIdFichaHoy($paciente->id);
        IF(!empty($idFichaHoy))$this->tecs_model->tecId = $idFichaHoy->tecId;
        ////CREA FICHA
            $this->tecs_model->tecFechaRegistro     = date('Y-m-d H:i:s');
            $this->tecs_model->tecFechaIngreso      = $fechaIngreso;
            
            $this->tecs_model->tecComentario        = $this->input->post('comentario');
            $this->tecs_model->tecDiagnostico       = $this->input->post('diagnostico');
            $medico = $this->input->post('medicoAsignado');
            IF($medico === '0' || empty($medico))$medico ='';
            $this->tecs_model->tecMedicoAsignado    = $medico;
            $this->tecs_model->tecGes               = $this->input->post('ges');
            $this->tecs_model->tecModalidad         = $this->input->post('modalidad');
            $this->tecs_model->tecPaciente          = $paciente->id;
            $this->tecs_model->tecIsapre            = $this->input->post('isapre');
            $this->tecs_model->tecFicha             = $ficha;
            $this->tecs_model->tecSessiones         = $this->input->post('cantidad');
            $this->tecs_model->tecComuna            = $this->input->post('comuna');
            $this->tecs_model->tecUsuario           = $this->session->userdata('id_usuario');
            $this->tecs_model->tecRutTitular        = $rutTitular;
            $this->tecs_model->tecEmergenciaDerivar = $this->input->post('emergenciaDerivar');
            $this->tecs_model->guardar();
            
            
        $idFicha = $this->tecs_model->dameIdFicha($paciente->id);
    ////GUARDAR APODERADO    
        $apoderado   = $this->apoderados_model->damePorDatos($rutApo,$idFicha->tecId,1);
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
            $this->apoderados_model->apoTipo        = 11;
            $this->apoderados_model->apoFichaElectronica = $idFicha->tecId;
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
                $apoderado = $this->apoderados_model->dameUnoContacto($idFicha->tecId);
                IF(!empty($apoderado))$this->apoderados_model->apoId = $apoderado->apoId;
                $this->apoderados_model->apoTipo            = 13;
                $this->apoderados_model->apoFechaRegistro   = date('Y-m-d H:i:s');
                $this->apoderados_model->apoFichaElectronica = $idFicha->tecId;
                $this->apoderados_model->guardar();
            }
            unset($this->apoderados_model->id,$this->apoderados_model->rut,$this->apoderados_model->ocupacion,$this->apoderados_model->direccion,$this->apoderados_model->sexo,$this->apoderados_model->email,$this->apoderados_model->nombres,$this->apoderados_model->apellidoPaterno,$this->apoderados_model->apellidoMaterno,$this->apoderados_model->fechaNacimiento,$this->apoderados_model->telefono,$this->apoderados_model->celular);
          
        $data['ctaGes']     = $this->input->post('ges');
        $data['registro']   = $idFicha->tecId;
        $data['pacApePat']  = $this->input->post('apePat');
        $data['pacApeMat']  = $this->input->post('apeMat');
        $data['pacRut']     = $rut;
        $data['pacNombre']  = $this->input->post('nombres');
        
        $data['banco']      = $this->bancos_model->dameTodo();
        $data['tipoCta']    = $this->bancos_model->dameTodoTipo();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        //$data['conceptos']  = $this->bancos_model->dameConceptos();
        unset($this->bancos_model->dameConceptos,$this->bancos_model->dameTodoTipo,$this->bancos_model->dameTodo);
        
               
$mensaje = 'Buenos dias,
Para su conocimiento, se ha generado un nuevo ingreso TEC con el identificador '.$idFicha->tecId.', ficha N '.$ficha.'. Para el paciente Id N '.$paciente->id.'.

Este correo se ha generado automaticamente. Por favor no lo conteste.

Atentamente
Cetep';
        
        $headers = "From: pruebas@cetep.cl";
        mail("griedel@cetep.cl","Ingreso",$mensaje,$headers);
        $data['ges']        = $this->input->post('ges');
        
        $data['conceptos']  = $this->tecs_model->depositos_conceptos_tec();
        $data['datos']      = $this->tecs_model->dameUno($idFicha->tecId);
        
        $data['menu']       = "tecs";
        $data['submenu']    = "itecs";
        $data['breadcumb']  = "tec";
        $data['title']      = "Deposito T.E.C";
        $ges = $this->input->post('ges');
        IF($ges === '1'){
            
            $this->bancos_model->depPaciente     = $paciente->id;
            $this->bancos_model->depSuma         = 0;
            $this->bancos_model->depTipo         = 1;
            $this->bancos_model->depConcepto     = 1;
            $this->bancos_model->depFichaElectro = $idFicha->tecId;
            $this->bancos_model->depFicha        = $ficha;
            $this->bancos_model->depFechaRegistro= date('Y-m-d H:i:s');
            $this->bancos_model->depUsuario      = $this->session->userdata('id_usuario');
            $this->bancos_model->guardarDepositoTec();
        
            redirect(base_url().'clinica_admin/tecs/listarIngreso/');
        }
        ELSE Layout_Helper::cargaVista($this,'deposito_tec',$data,'clinica');   
    
    }
    function depositoTEC(){
        
        $tecId = $this->input->post('tecId');
        $datos = $this->tecs_model->dameUno($tecId);
        
        $rut        = str_replace(array(".","-"), "", $this->input->post('rut'));
        $letra      = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
        
    ////GUARDAR PACIENTE    
        $paciente   = $this->pacientes_model->dameUno($rut);
        $ficha      = $datos->tecFicha;
    
    ////GUARDAR DATOS DE DEPOSITO  
            $x = $this->input->post('bancoCheque');
            if(!empty($x))$this->bancos_model->depBanco        = $this->input->post('bancoCheque');
            $xx = $this->input->post('ctacteCheque');
            if(!empty($xx))$this->bancos_model->depCuenta       = $this->input->post('ctacteCheque');
            $xxx = $this->input->post('serieCheque');
            if(!empty($xxx))$this->bancos_model->depSerie        = $this->input->post('serieCheque');
            $this->bancos_model->depPaciente     = $paciente->id;
            $this->bancos_model->depSuma         = $this->input->post('suma');
            $this->bancos_model->depTipo         = $this->input->post('deposito');
            $this->bancos_model->depConcepto     = $this->input->post('concepto');
            $this->bancos_model->depFichaElectro = $tecId;
            $this->bancos_model->depFicha        = $ficha;
            $this->bancos_model->depFechaRegistro= date('Y-m-d H:i:s');
            $this->bancos_model->depUsuario      = $this->session->userdata('id_usuario');
            $this->bancos_model->guardarDepositoTec();
            
            
        $data['datos']      = $datos;
        IF($data['datos']->fechaNacimiento !== '0000-00-00')$edad = $this->calculaedad($data['datos']->fechaNacimiento);
        ELSE $edad = '-';
        $data['edad']       = $edad;
        $data['menu']       = "tecs";
        $data['submenu']    = "itecs";
        $data['breadcumb']  = "Registros";
        $data['title']      = "Imprimir Formularios";
        Layout_Helper::cargaVista($this,'imprimirTec',$data,'clinica');   
    }
    function calculaedad($fecha){
        $date2  = date('Y-m-d');//
        $diff   = abs(strtotime($date2) - strtotime($fecha));
        $years  = floor($diff / (365*60*60*24));
        //$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        //$days   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        return $years;
    }
    public function eliminar($id)
    {
        $this->tecs_model->tecId = $id;
        $this->tecs_model->tecFicha = -1;
        $this->tecs_model->tecFechaRegistro  = date('Y-m-d H:i:s');
        $this->tecs_model->tecUsuario  = $this->session->userdata('id_usuario');
        $this->tecs_model->guardar();
        
        $data['datos']       = $this->tecs_model->dameTodo();
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "T.E.C";
        $data['menu']       = "tecs";
        $data['submenu']    = "ltecs";
        Layout_Helper::cargaVista($this,'listar_ingreso',$data,'clinica');  
    }
    
    public function cargarModificarTec($id)
    {
        $data['data']       = $this->tecs_model->dameUno($id);
        $data['medico']     = $this->profesionales_model->dameTodo();
        $data['contacto']   = $this->apoderados_model->dameUnoContactoTEC($id);
        $data['apoderado']  = $this->apoderados_model->dameUnoPorFichaParaFichaTEC($id);
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        $data['modificar']  = 1;
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "T.E.C";
        $data['menu']       = "tecs";
        $data['submenu']    = "ltecs";
        Layout_Helper::cargaVista($this,'nuevo_ingreso',$data,'clinica');  
    }
    public function modificarTEC()
    {
        $rut        = str_replace(array(".","-"), "", $this->input->post('rut'));
        $letra      = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
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
        
        $paciente   = $this->pacientes_model->dameUno($rut);
        $ficha      = $this->input->post('ficha');
        IF(empty($ficha) || $ficha === '0' || $ficha === 'Sin ficha, se creará al ingreso' || $ficha = '-1'){
            $ficha = $this->tecs_model->dameTecFicha($paciente->id);
        }
        ELSE {
        $ficha =$this->input->post('ficha');
        }
        
        $fechaIngreso = $this->input->post('fechaIngreso');
        $fechaIngreso = str_replace("/", "-", $fechaIngreso);
        $fechaIngreso = new DateTime($fechaIngreso);
        $fechaIngreso = $fechaIngreso->format('Y-m-d');
        $tecId        = $this->input->post('registro');
            $this->tecs_model->tecId                = $tecId;
        
            $this->tecs_model->tecFechaRegistro     = date('Y-m-d H:i:s');
            $this->tecs_model->tecFechaIngreso      = $fechaIngreso;
            
            $this->tecs_model->tecComentario        = $this->input->post('comentario');
            $this->tecs_model->tecDiagnostico       = $this->input->post('diagnostico');
            $medico = $this->input->post('medicoAsignado');
            IF($medico === '0' || empty($medico))$medico ='';
            $this->tecs_model->tecMedicoAsignado    = $medico;
            $this->tecs_model->tecGes               = $this->input->post('ges');
            $this->tecs_model->tecModalidad         = $this->input->post('modalidad');
            $this->tecs_model->tecPaciente          = $paciente->id;
            $this->tecs_model->tecIsapre            = $this->input->post('isapre');
            $this->tecs_model->tecFicha             = $ficha;
            $this->tecs_model->tecComuna            = $this->input->post('comuna');
            $this->tecs_model->tecSessiones         = $this->input->post('cantidad');
            $this->tecs_model->tecUsuario           = $this->session->userdata('id_usuario');
            $this->tecs_model->tecRutTitular        = $rutTitular;
            $this->tecs_model->tecEmergenciaDerivar = $this->input->post('emergenciaDerivar');
            $this->tecs_model->guardar();
            
            
        $idFicha = $this->tecs_model->dameIdFicha($paciente->id);
    ////GUARDAR APODERADO    
        $apoderado   = $this->apoderados_model->damePorDatos($rutApo,$tecId,11);
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
            $this->apoderados_model->apoTipo        = 11;
            $this->apoderados_model->apoFichaElectronica = $tecId;
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
                $apoderado = $this->apoderados_model->dameUnoContacto($tecId);
                IF(!empty($apoderado))$this->apoderados_model->apoId = $apoderado->apoId;
                $this->apoderados_model->apoTipo             = 13;
                $this->apoderados_model->apoFechaRegistro    = date('Y-m-d H:i:s');
                $this->apoderados_model->apoFichaElectronica = $tecId;
                $this->apoderados_model->guardar();
            }
            unset($this->apoderados_model->id,$this->apoderados_model->rut,$this->apoderados_model->ocupacion,$this->apoderados_model->direccion,$this->apoderados_model->sexo,$this->apoderados_model->email,$this->apoderados_model->nombres,$this->apoderados_model->apellidoPaterno,$this->apoderados_model->apellidoMaterno,$this->apoderados_model->fechaNacimiento,$this->apoderados_model->telefono,$this->apoderados_model->celular);
          
        $data['ctaGes']     = $this->input->post('ges');
        $data['registro']   = $tecId;
        $data['pacApePat']  = $this->input->post('apePat');
        $data['pacApeMat']  = $this->input->post('apeMat');
        $data['pacRut']     = $rut;
        $data['pacNombre']  = $this->input->post('nombres');
        
        //$data['banco']      = $this->bancos_model->dameTodo();
        //$data['tipoCta']    = $this->bancos_model->dameTodoTipo();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        //$data['conceptos']  = $this->bancos_model->dameConceptos();
        unset($this->bancos_model->dameConceptos,$this->bancos_model->dameTodoTipo,$this->bancos_model->dameTodo);
        
               
        $data['ges']        = $this->input->post('ges');
        
        $data['datos']      = $this->tecs_model->dameUno($tecId);
        IF($data['datos']->fechaNacimiento !== '0000-00-00')$edad = $this->calculaedad($data['datos']->fechaNacimiento);ELSE $edad = '-';
        $data['edad']       = $edad;
        $data['breadcumb']  = "Registros";
        $data['title']      = "Imprimir Formularios";
        $data['menu']       = "tecs";
        $data['submenu']    = "ltecs";
        $ges = $this->input->post('ges');
        IF($ges === '1')redirect(base_url().'clinica_admin/tecs/listarIngreso/');
        ELSE Layout_Helper::cargaVista($this,'imprimirTec',$data,'clinica');   
    
    }
    
    public function listarDepositosTEC()
    {
        $data['datos']      = $this->bancos_model->dameDepositosTec();
        $data['sessiones']  = $this->tecs_model->dameSessiones();
        $sessionesMES = $this->tecs_model->dameSessionesMes();
        $data['GESH']       = $sessionesMES[0];
        $data['GESA']       = $sessionesMES[1];
        $data['LEH']        = $sessionesMES[2];
        $data['LEA']        = $sessionesMES[3];
        $data['MESES']      = $sessionesMES[4];
        $data['valorGES']   = $this->parametros_model->dameUno('6');
        $data['valorLE']    = $this->parametros_model->dameUno('7');
        //die(var_dump($data['GESH']));
        $data['breadcumb']  = "Registros";
        $data['title']      = "T.E.C - Listar Depositos";
        $data['menu']       = "tecs";
        $data['submenu']    = "dtecs";
        Layout_Helper::cargaVista($this,'listar_depositos',$data,'clinica');  
    }
    
    public function nuevaSession($tecId)
    {
        $data['medico']     = $this->profesionales_model->dameTodo();
        $data['sessiones']  = $this->tecs_model->dameSessionesId($tecId);
        $data['sessionesLista'] = $this->tecs_model->dameListaSessiones($tecId);
        $data['datos']      = $this->tecs_model->dameUno($tecId);
        $data['datos']      = $this->tecs_model->dameUno($tecId);
        $data['breadcumb']  = "Registros";
        $data['title']      = "T.E.C - Listar Depositos";
        $data['menu']       = "tecs";
        $data['submenu']    = "ltecs";
        Layout_Helper::cargaVista($this,'nueva_session',$data,'clinica');  
    }
    public function guardarSession()
    {
        $this->tecs_model->tecSesCalculo        = $this->input->post('calculo')-1;
        $fecha = new DateTime($this->input->post('fechaSesion'));
        $this->tecs_model->tecSesFechaRegistro  = $fecha->format("Y-m-d").' '.date('H:i:s');
        $this->tecs_model->tecSesTecId          = $this->input->post('tecId');
        $this->tecs_model->tecSesMedico         = $this->input->post('medicoAsignado');
        $this->tecs_model->tecSesUsuario        = $this->session->userdata('id_usuario');
        $this->tecs_model->guardarSession();
        
        $tecId = $this->input->post('tecId');
        $data['medico']     = $this->profesionales_model->dameTodo();
        $data['sessiones']  = $this->tecs_model->dameSessionesId($tecId);
        $data['sessionesLista'] = $this->tecs_model->dameListaSessiones($tecId);
        $data['datos']      = $this->tecs_model->dameUno($tecId);
        $data['datos']      = $this->tecs_model->dameUno($tecId);
        $data['breadcumb']  = "Registros";
        $data['title']      = "T.E.C - Listar Depositos";
        $data['menu']       = "tecs";
        $data['submenu']    = "ltecs";
        Layout_Helper::cargaVista($this,'nueva_session',$data,'clinica');  
    }
    
    
    
    public function cargarInsumos($id)
    {
        //CHEQUEAR QUE EXISTE EL NOMBRE
        $exp = explode('_',$id);
        $tec = $exp[0];
        $ses = $exp[1];
        $data['farmacos']   = $this->tecs_model->dameFarmacos();
        $data['insumos']    = $this->tecs_model->dameInsumos();
        //$data['examenes']   = $this->enfermeria_model->dameExamenes();
        $data['datos']      = $this->tecs_model->dameUno($tec);
        $data['sesion']     = $ses;
        $data['insumosAsignados'] = $this->tecs_model->dameInsumosAsignados($ses);
        $data['breadcumb']  = "Registros";
        $data['title']      = "Lista de Insumos";
        $data['menu']       = "tecs";
        $data['submenu']    = "ltecs";
        Layout_Helper::cargaVista($this,'cargarInsumos',$data,'clinica');   
    }
    public function guardarInsumos()
    {
        $id = $this->input->post('sesId');
        $tecId = $this->input->post('tecId');
        $this->tecs_model->inaSes             = $id;
        $this->tecs_model->inaTec             = $tecId;
        $this->tecs_model->inaFechaRegistro   = date('Y-m-d H:i:s');
        $this->tecs_model->inaUsuario         = $this->session->userdata('id_usuario');
        
        $cantidad = $this->input->post('cantidadFarmaco');
        $farm = explode('_', $this->input->post('farmaco'));
        IF(!empty($cantidad) && $farm[0]!=='0'){
            $this->tecs_model->inaCantidad = $cantidad;
            $this->tecs_model->inaValor   = $farm[1];
            $this->tecs_model->inaInsumo  = $farm[0];
            $this->tecs_model->inaTipo    = 2;
            $this->tecs_model->guardarInsumosAsignados();
            unset($this->tecs_model->inaTipo,$this->tecs_model->inaInsumo,$this->tecs_model->inaValor,$this->tecs_model->inaCantidad);
        }
        $cantidad = $this->input->post('cantidadInsumo');
        $insu = explode('_', $this->input->post('insumo'));
        IF(!empty($cantidad) && $insu[0]!=='0'){
            $this->tecs_model->inaCantidad = $cantidad;
            $this->tecs_model->inaValor   = $insu[1];
            $this->tecs_model->inaInsumo  = $insu[0];
            $this->tecs_model->inaTipo    = 1;
            $this->tecs_model->guardarInsumosAsignados();
            unset($this->tecs_model->inaTipo,$this->tecs_model->inaInsumo,$this->tecs_model->inaValor,$this->tecs_model->inaCantidad);
        }
        $cantidad = $this->input->post('cantidadExamen');
        $exam = explode('_', $this->input->post('examen'));
        IF(!empty($cantidad) && $exam[0]!=='0'){
            $this->tecs_model->inaCantidad = $cantidad;
            $this->tecs_model->inaValor   = $exam[1];
            $this->tecs_model->inaInsumo  = $exam[0];
            $this->tecs_model->inaTipo    = 3;
            $this->tecs_model->guardarInsumosAsignados();
            unset($this->tecs_model->inaTipo,$this->tecs_model->inaInsumo,$this->tecs_model->inaValor,$this->tecs_model->inaCantidad);
        }
        
        
        //$nombre     = $this->input->post('otroNombre');
        //$tipo       = $this->input->post('otroTipo');
        //$cantidad   = $this->input->post('otroCantidad');
        //
        //
        //IF(!empty($nombre) && $tipo!=='0' && !empty($cantidad)){
        //    
        //    IF($tipo==='1'){
        //        $existe = $this->parametros_model->dameNombreFarmaco($nombre);
        //        IF(empty($existe)){
        //        $this->parametros_model->descripcion    = $nombre;
        //        $this->parametros_model->estado         = 1;
        //        $this->parametros_model->farmUsuario    = $this->session->userdata('id_usuario');
        //        $this->parametros_model->guardarFarmaco();
        //        
        //        $ultimo = $this->parametros_model->dameUltimoFarmaco();
        //        $this->tecs_model->inaInsumo   = $ultimo->idfarmaco;
        //        }
        //    }
        //    ELSEIF($tipo==='2'){
        //        $existe = $this->parametros_model->dameNombreInsumo($nombre);
        //        IF(empty($existe)){
        //        $this->parametros_model->insNombre  = $nombre;
        //        $this->parametros_model->insEstado  = 1;
        //        $this->parametros_model->insUsuario = $this->session->userdata('id_usuario');
        //        $this->parametros_model->guardarInsumo();
        //        
        //        $ultimo = $this->parametros_model->dameUltimoInsumo();
        //        $this->tecs_model->inaInsumo   = $ultimo->insId;
        //        }
        //    }
        //    ELSEIF($tipo==='3'){
        //        $existe = $this->parametros_model->dameNombreExamen($nombre);
        //        IF(empty($existe)){
        //        $this->parametros_model->exaNombre  = $nombre;
        //        $this->parametros_model->exaEstado  = 1;
        //        $this->parametros_model->exaUsuario = $this->session->userdata('id_usuario');
        //        $this->parametros_model->guardarExamen();
        //        
        //        $ultimo = $this->parametros_model->dameUltimoExamen();
        //        $this->tecs_model->inaInsumo   = $ultimo->exaId;
        //        }
        //    }
        //    
        //    $this->tecs_model->inaCantidad = $cantidad;
        //    $this->tecs_model->inaTipo     = $tipo;
        //    IF(empty($existe)){
        //        $id = $id.'_NO';//CHECK EXISTE NOMBRE
        //        $this->tecs_model->guardarInsumosAsignados();
        //    }
        //    ELSE $id = $id.'_SI';
        //}ELSE {
        //    //CHECK EXISTE NOMBRE
        //    
        //}
           $id = $tecId.'_'.$id;  
        redirect(base_url().'clinica_enfermeria/tecs/cargarInsumos/'.$id);
        
    }
    public function eliminarInsumo($id)
    {
        $id = explode('_', $id);
        $this->tecs_model->inaId              = $id[2];
        $this->tecs_model->inaFechaRegistro   = date('Y-m-d H:i:s');
        $this->tecs_model->inaUsuario         = $this->session->userdata('id_usuario');
        $this->tecs_model->inaEstado          = 2;
        $this->tecs_model->guardarInsumosAsignados();
        redirect(base_url().'clinica_enfermeria/tecs/cargarInsumos/'.$id[0].'_'.$id[1]);
    }
    
    
    
}