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
        $this->load->model("apoderados_model");
        $this->load->model("profesionales_model");
        $this->load->model("isapres_model");
        $this->load->model("bancos_model");
        $this->load->model("hd_model");
        $this->load->model("licencias_model");
        $this->load->model("enfermeria_model");
        
        $this->load->model("parametros_model");	
    }
    public function inicio()
    {
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Inicio";
        Layout_Helper::cargaVista($this,'inicio',$data,'hd');   
    }
    public function index()
    {
        $data['derivacion'] = $this->parametros_model->dameDerivacion();
        $data['medico']     = $this->profesionales_model->dameTodoHD();
        $data['banco']      = $this->bancos_model->dameTodo();
        $data['tipoCta']    = $this->bancos_model->dameTodoTipo();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        $data['PS']         = $this->profesionales_model->damePS();
        $data['TO']         = $this->profesionales_model->dameTO();
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Ficha de Ingreso Hospital de Día";
        
        $data['menu']       = "ingreso";
        $data['submenu']    = "ningreso";
        Layout_Helper::cargaVista($this,'nuevo_ingreso',$data,'hd');   
    }
    public function ingresoRH()
    {
        $data['derivacion'] = $this->parametros_model->dameDerivacion();
        $data['medico']     = $this->profesionales_model->dameTodoHD();
        $data['banco']      = $this->bancos_model->dameTodo();
        $data['tipoCta']    = $this->bancos_model->dameTodoTipo();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        $data['PS']         = $this->profesionales_model->damePS();
        $data['TO']         = $this->profesionales_model->dameTO();
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Ficha de Ingreso Rehabilitación";
        
        $data['menu']       = "ingreso";
        $data['submenu']    = "ringreso";
        Layout_Helper::cargaVista($this,'nuevo_ingreso_RH',$data,'hd');   
    }
    
    
    public function guardarficha()
    {
        
        IF($this->input->post('tipoIngreso')==='3')$RH = 'SI';ELSE $RH = '';
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
            IF(!empty($region->padre))$this->pacientes_model->region = $region->padre;
            $this->pacientes_model->rut             = $rut;
            $this->pacientes_model->guardar($rut);
            unset($this->pacientes_model->id,$this->pacientes_model->rut,$this->pacientes_model->ocupacion,$this->pacientes_model->direccion,$this->pacientes_model->sexo,$this->pacientes_model->email,$this->pacientes_model->nombres,$this->pacientes_model->apellidoPaterno,$this->pacientes_model->apellidoMaterno,$this->pacientes_model->fechaNacimiento,$this->pacientes_model->telefono,$this->pacientes_model->celular);
        
        $paciente   = $this->pacientes_model->dameUno($rut);
        $ficha      = $this->input->post('ficha');
        IF(empty($ficha) || $ficha === '0' || $ficha === 'Sin ficha, se creará al ingreso' || $ficha === '-1'){
            IF(empty($RH)){$ficha = $this->hd_model->dameHdFicha($paciente->id);}
            ELSE {$ficha = $this->hd_model->dameRHFicha($paciente->id);}
        }
        ELSE {
        $ficha =$this->input->post('ficha');
        }
        $fechaIngreso = $this->input->post('fechaIngreso');
        $fechaIngreso = str_replace("/", "-", $fechaIngreso);
        $fechaIngreso = new DateTime($fechaIngreso);
        $fechaIngreso = $fechaIngreso->format('Y-m-d');
        
        $registro = $this->input->post('registro');
        IF($registro==='0'){
            IF(empty($RH)){$idFichaHoy = $this->hd_model->dameIdFichaHoy($paciente->id);}
            ELSE {$idFichaHoy = $this->hd_model->dameIdFichaRHHoy($paciente->id);}
            
            IF(!empty($idFichaHoy))$this->hd_model->id = $idFichaHoy->id;
        }
        ELSE {
            $this->hd_model->id = $registro;
        }
        ////CREA FICHA
            $this->hd_model->dateIn            = date('Y-m-d H:i:s');
            $this->hd_model->fechaIngresoReal  = date('Y-m-d');
            $this->hd_model->horaIngresoReal   = date('H:i:s');
            $this->hd_model->fechaIngreso      = $fechaIngreso;
            $this->hd_model->horaIngreso       = date('H:i:s');
            
            $this->hd_model->TOAsignado          = $this->input->post('TOAsignado');
            $this->hd_model->PSAsignado          = $this->input->post('PSAsignado');
            $this->hd_model->origenDerivacion          = $this->input->post('origenDerivacion');
            $this->hd_model->nombresMedicoSolicitante  = $this->input->post('medicoDerivador');
//INSTITUCION            
            $this->hd_model->institucion       = 'CETEP';
            $this->hd_model->fechaDerivacion   = date('Y-m-d');
            
            $this->hd_model->comentario    = $this->input->post('comentario');
            $diagnostico = $this->input->post('diagnostico');
            $this->hd_model->diagnostico   = $diagnostico;
            $medico = $this->input->post('medicoAsignado');
            IF($medico === '0')$medico ='';
            $this->hd_model->medicoAsignado  = $medico;
            //$this->hd_model->regimen         = $this->input->post('regimen');
            //$this->hd_model->regimen       = $regimen->regNombre;
            //die($this->input->post('tipoIngreso'));
            $this->hd_model->ingresoMirAndes = $this->input->post('tipoIngreso');
            $this->hd_model->ges           = $this->input->post('ges');
            $this->hd_model->paciente      = $paciente->id;
            $this->hd_model->isapre        = $this->input->post('isapre');
            IF(empty($RH)){$this->hd_model->ficha   = $ficha;}
            ELSE {$this->hd_model->fichaRH          = $ficha;}
            $this->hd_model->edadPaciente  = $this->calculaedad($fecha);
            $this->hd_model->comuna        = $this->input->post('comuna');
            $this->hd_model->usuarioIn     = $this->session->userdata('id_usuario');
            $this->hd_model->rutTitular    = $rutTitular;
            $this->hd_model->nombreTitular = $this->input->post('nombreTitular');
            $this->hd_model->apePatTitular = $this->input->post('apePatTitular');
            $this->hd_model->apeMatTitular = $this->input->post('apeMatTitular');
            $this->hd_model->emergenciaDerivar = $this->input->post('emergenciaDerivar');
            $this->hd_model->guardar();
            
            
            IF(empty($RH)){$idFicha = $this->hd_model->dameIdFicha($paciente->id);}
            ELSE {$idFicha = $this->hd_model->dameIdFichaRH($paciente->id);}
    ////GUARDAR APODERADO    
        $apoderado   = $this->apoderados_model->damePorDatos($rutApo,$idFicha->id,111);
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
            $this->apoderados_model->apoTipo        = 111;
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
                IF(!empty($apoderado))$this->apoderados_model->apoId = $apoderado->apoId;
                $this->apoderados_model->apoTipo            = 113;
                $this->apoderados_model->apoFechaRegistro   = date('Y-m-d H:i:s');
                $this->apoderados_model->apoFichaElectronica = $idFicha->id;
                $this->apoderados_model->guardar();
            }
            unset($this->apoderados_model->id,$this->apoderados_model->rut,$this->apoderados_model->ocupacion,$this->apoderados_model->direccion,$this->apoderados_model->sexo,$this->apoderados_model->email,$this->apoderados_model->nombres,$this->apoderados_model->apellidoPaterno,$this->apoderados_model->apellidoMaterno,$this->apoderados_model->fechaNacimiento,$this->apoderados_model->telefono,$this->apoderados_model->celular);
          
    ////GUARDAR LICENCIA     
            $licNumero  = $this->input->post('licNumero');
            IF(!empty($licNumero)){
                $licDesde   = new DateTime($this->input->post('licDesde'));
                $licDesde   = $licDesde->format('Y-m-d');

                $licDias    = $this->input->post('licDias')-1;
                $licHasta   = date("Y-m-d", strtotime("$licDesde + $licDias days"));
                $licDias    = $this->input->post('licDias');

                $this->licencias_model->licNombre   = $this->input->post('nombres');
                $this->licencias_model->licApePat   = $this->input->post('apePat');
                $this->licencias_model->licApeMat   = $this->input->post('apeMat');
                $this->licencias_model->licCentro   = $this->input->post('licCentro');
                $this->licencias_model->licMedNombre= $this->input->post('licMedNombre');
                $this->licencias_model->licRut      = $rut;
                $this->licencias_model->licUsuario  = $this->session->userdata('id_usuario');
                $this->licencias_model->licNumero   = $licNumero;
                $this->licencias_model->licDesde    = $licDesde;
                $this->licencias_model->licHasta    = $licHasta;
                $this->licencias_model->licDias     = $licDias;
                $this->licencias_model->licHD       = 1;
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
        
        
               

        
        
        $data['datos']      = $this->hd_model->dameIngresosHd();
        $data['deposito']   = $this->bancos_model->dameDepositoUsuarioHD($paciente->id);
        $data['cuenta']     = $this->bancos_model->dameCuentaHD($paciente->id);
        $data['breadcumb']  = "Registros";
        $data['title']      = "Lista de Registros";
        $data['menu']       = "ingreso";
        $data['submenu']    = "ningreso";
        
        
        
        
        $isapre = $this->input->post('isapre');
        
        IF($isapre === '4' || $diagnostico === '75 TAB'){
            
    ////GUARDAR PACIENTE    
        $paciente   = $this->pacientes_model->dameUno($rut);
        $idFicha    = $idFicha->id;
        $ficha      = $this->ingreso_model->dameFicha($paciente->id);
        
    ////GUARDAR DATOS DE DEVOLUCION
        
        $bancos = $this->bancos_model->dameUnoHD($idFicha);
        //$ctaId  = $this->input->post('cuentaId');
        //IF(!empty($ctaId))$this->bancos_model
            IF(!empty($bancos))
            $this->bancos_model->ctaId           = $this->bancos_model->dameUnoHD($idFicha)->ctaId;
            $this->bancos_model->ctaPaciente     = $paciente->id;
            $b = $this->input->post('banco');
            IF(!empty($b))
            $this->bancos_model->ctaBanco        = $this->input->post('banco');
            $t = $this->input->post('tipoCta');
            IF(!empty($t))
            $this->bancos_model->ctaTipo         = $this->input->post('tipoCta');
            $c = $this->input->post('NCta');
            IF(!empty($c))
            $this->bancos_model->ctaNumero       = $this->input->post('NCta');
            IF(empty($rutDev)) $rutDev = $rut;
            $this->bancos_model->ctaRut          = $rutDev;
            $this->bancos_model->ctaRutPaciente  = $rut;
            $this->bancos_model->ctaNomPaciente  = $paciente->apellidoPaterno.' '.$paciente->nombres;
            $this->bancos_model->ctaEmail        = $this->input->post('emailDev');
            $this->bancos_model->ctaNombre    = $this->input->post('nombresDev');
            $this->bancos_model->ctaApellido     = $this->input->post('apePatDev');
            $this->bancos_model->ctaApellidoM    = $this->input->post('apeMatDev');
            $this->bancos_model->ctaGes          = $this->input->post('ctaGes');
            $this->bancos_model->ctaRegistro     = $idFicha;
            $this->bancos_model->ctaFicha        = $ficha;
            $this->bancos_model->guardarCtaHD();
            unset($this->bancos_model->ctaGes,$this->bancos_model->ctaNomPaciente,$this->bancos_model->ctaFicha,$this->bancos_model->ctaRutPaciente,$this->bancos_model->ctaBanco,$this->bancos_model->ctaFicha,$this->bancos_model->ctaRegistro,$this->bancos_model->ctaApellidoM,$this->bancos_model->ctaApellido,$this->bancos_model->ctaNombre,$this->bancos_model->ctaEmail,$this->bancos_model->ctaRut,$this->bancos_model->ctaPaciente,$this->bancos_model->ctaId,$this->bancos_model->ctaTipo,$this->bancos_model->ctaNumero);
    
        redirect(base_url().'hd_admision/impresiones/cargarImprimir/'.$idFicha);
        }
        
        
        
        IF(empty($registro)){Layout_Helper::cargaVista($this,'cargarDevolucion',$data,'hd'); }
        ELSE redirect(base_url().'hd_admision/impresiones/cargarImprimir/'.$registro);
        
    }
    function calculaedad($fecha){
        $date2  = date('Y-m-d');//
        $diff   = abs(strtotime($date2) - strtotime($fecha));
        $years  = floor($diff / (365*60*60*24));
        //$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        //$days   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        return $years;
    }
    public function cargarSolicitudes($id)
    {   
        $data['solicitud']  = $this->hd_model->dameSolicitudesId($id);
        $data['profesionales']  = $this->hd_model->dameProfesionalesHD();
         //die(var_dump($data['profesionales']));
        $data['datos']      = $this->hd_model->dameUno($id);//die(var_dump($data['datos']));
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Solicitudes";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarSolicitudes',$data,'hd');   
    }
    public function guardarSolicitudes()
    { 
        $registro                           = $this->input->post('fichaElectro');
        $this->hd_model->solRegistro        = $registro;
        $this->hd_model->solFechaRegistro   = date('Y-m-d H:i:s');
        $this->hd_model->solUsuario         = $this->session->userdata('id_usuario');
        $date = new DateTime($this->input->post('fecha'));$date = $date->format('Y-m-d');
        $this->hd_model->solFecha           = $date;
        $this->hd_model->solHora            = $this->input->post('hora');
        $this->hd_model->solTipo            = $this->input->post('motivoSolicitud');
        $this->hd_model->solMotivo          = $this->input->post('motivo');
        //$this->hd_model->solProfesional          = $this->input->post('profesional');
        $this->hd_model->guardarSolicitudes();
        
        $ultimo = $this->hd_model->dameUltimaSolicitud($registro);
        
        
        $this->enviarCorreoEnfermeria($ultimo);
        $this->cargarSolicitudes($registro);
        
     // $data['solicitud']  = $this->hd_model->dameSolicitudesId($registro);
     // $data['datos']      = $this->hd_model->dameUno($registro);
     // $data['profesionales']  = $this->hd_model->dameProfesionalesHD();
     // $data['breadcumb']  = "Ingreso";
     // $data['title']      = "Solicitudes";
     // $data['menu']       = "ingreso";
     // $data['submenu']    = "lingreso";
     // Layout_Helper::cargaVista($this,'cargarSolicitudes',$data,'hd');   
    }
    public function enviarCorreoEnfermeria($ultimo)
    {//die(var_dump($ultimo));
        $id=$ultimo->solId;
        $nombre=$ultimo->nombres.' '.$ultimo->apellidoPaterno;
        $asunto = 'Solicitud de Permiso';
        $destinatario='enfermeriahd@mirandes.cl';
        //$destinatario= 'gerardo.riedel.c@gmail.com';
                $resumen = 'Estimados,<br><br>'
                        . 'Se ha autorizado la solicitud de Permiso N°'.$id.' de '.$nombre.'. Si se encuentra dentro de la ficha seguir el siguiente link para imprimir <a href="'.base_url().'hd_admision/impresiones/imprimirImprimir/'.$id.' ">imprimir</a>.<br><br>'
                        
                         .'<br><br>'
                        .'Atentamente,<br><br>';
                $resumen .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style='width: 100px; ' src='".base_url()."../assets/img/logo_vertical_cetep.png' >";
                        // . 'LINK: <a href="http://www.cetep.cl/calidad'.$reclamo->recId.'"><b>Responder</b></a>';
                $headers = "MIME-Version: 1.0\r\n"; 
                $headers .= "Content-type: text/html; charset=utf-8\r\n"; 
                $headers .= "From: MirAndes <intranet@cetep.cl>\r\n"; //dirección del remitente 
                $headers .= "bcc: griedel@cetep.cl";
                //echo ('7');
                //echo $resumen;die;
                mail($destinatario,$asunto,$resumen,$headers) ;
    }
     public function cargarEvaluacion($id)
    {   
        $data['evaluacion']  = $this->hd_model->dameEvaluacionesId($id);
        
        $data['datos']      = $this->hd_model->dameUno($id);//die(var_dump($data['datos']));
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Evaluación Clínica";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarEvaluacion',$data,'hd');   
    }
    public function modificarEvaluacion($id)
    {   
        $id                 = $this->hd_model->dameUnaEvaluacion($id);  
        $data['eval']       = $id;
        
        $data['evaluacion'] = $this->hd_model->dameEvaluacionesId($id->evaRegistro);
        
        $data['datos']      = $this->hd_model->dameUno($id->evaRegistro);//die(var_dump($data['datos']));
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Evaluación Clínica";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarEvaluacion',$data,'hd');   
    }
    public function guardarEvaluaciones()
    { 
        $evaluacion = $this->input->post('evaluacion');
        IF(!empty($evaluacion)) $this->hd_model->evaId = $evaluacion;
        $registro = $this->input->post('fichaElectro');
        $this->hd_model->evaRegistro        = $registro;
        $this->hd_model->evaFechaRegistro   = date('Y-m-d H:i:s');
        //$fechaIntervencion = $this->input->post('fecha');
        $date = new DateTime($this->input->post('fecha'));$date = $date->format('Y-m-d');
        $this->hd_model->evaFechaIntervencion   = $date;
        $this->hd_model->evaUsuario         = $this->session->userdata('id_usuario');
        $mensaje = $this->input->post('observacion');
        $mensaje = str_replace("\r\n","<br>", $mensaje);
        $mensaje = str_replace("\n","<br>", $mensaje);
        
        $this->hd_model->evaObservacion     = $mensaje;
        $this->hd_model->evaPaciente     = $this->input->post('paciente');
        $this->hd_model->guardarEvaluaciones();
        
        $data['evaluacion'] = $this->hd_model->dameEvaluacionesId($registro);
        $data['datos']      = $this->hd_model->dameUno($registro);
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Evaluación Clínica";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarEvaluacion',$data,'hd');   
    }
    public function eliminarEvaluaciones($id)
    { 
        $registro = $this->hd_model->dameUnaEvaluacion($id);
        IF(empty($registro))redirect(base_url().'hd_admision/ingresos/inicio/');
        
        $this->hd_model->evaId              = $id;
        $this->hd_model->evaEstado          = 2;
        $this->hd_model->evaFechaRegistro   = date('Y-m-d H:i:s');
        $this->hd_model->evaUsuario         = $this->session->userdata('id_usuario');
        $this->hd_model->guardarEvaluaciones();
        
        $data['evaluacion'] = $this->hd_model->dameEvaluacionesId($registro->evaRegistro);
        $data['datos']      = $this->hd_model->dameUno($registro->evaRegistro);
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Evaluación Clínica";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarEvaluacion',$data,'hd');   
    }
    public function cargarSignos($id)
    {   $data['signos']     = $this->hd_model->dameSignosId($id);
        $datos              = $this->hd_model->dameUno($id);
        $data['datos']      = $datos;
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Signos Vitales y Nutricionales";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarSignos',$data,'hd');   
    }
    public function guardarSignos($id='')
    {
        $IMC = $this->input->post('peso')/($this->input->post('talla')*$this->input->post('talla'))*10000;
        $IMC = round($IMC, 2);
        
        $registro                           = $this->input->post('fichaElectro');
        
        $signos = $this->hd_model->dameSignosIdOrden($registro);
        IF(!empty($signos))$this->hd_model->sigFila = ($signos[0]->sigFila + 1);
        ELSE $this->hd_model->sigFila = 0;
        
        $this->hd_model->sigRegistro        = $registro;
        $this->hd_model->sigUsuario         = $this->session->userdata('id_usuario');
        $this->hd_model->sigFechaIngreso    = $this->input->post('fechaIngreso');
        $this->hd_model->sigHoraIngreso     = $this->input->post('horaIngreso');
        $this->hd_model->sigPeso            = $this->input->post('peso');
        $this->hd_model->sigCA              = $this->input->post('circunferencia');
        $this->hd_model->sigTalla           = $this->input->post('talla');
        $this->hd_model->sigTem             = $this->input->post('temperatura');
        $this->hd_model->sigPresion         = $this->input->post('presion');
        $this->hd_model->sigFC              = $this->input->post('frecuenciaC');
        $this->hd_model->sigFR              = $this->input->post('frecuenciaR');
        $this->hd_model->sigEu              = $this->session->userdata('id_usuario');
        $this->hd_model->sigIMC             = $IMC;;
        $this->hd_model->guardarSignos();
        
        $id = $registro;
        $data['signos']     = $this->hd_model->dameSignosId($id);
        $datos              = $this->hd_model->dameUno($id);
        $data['datos']      = $datos;
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Signos Vitales y Nutricionales";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarSignos',$data,'hd');   
    }
    public function listarIngreso()
    {
        $data['datos']      = $this->hd_model->dameIngresosHd();
        $data['breadcumb']  = "Registros";
        $data['title']      = "Lista de Registros";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'listar_ingreso',$data,'hd');   
    }
    public function filtrolistarIngreso()
    {
        $fechaDesde = $this->input->post('fechaDesde');
        $fechaHasta = $this->input->post('fechaHasta');
        $data['fechaDesde'] = $fechaDesde;
        IF(!empty($fechaHasta)) $data['fechaHasta'] = $fechaHasta;
        ELSE $data['fechaHasta'] = date('Y-m-d');
        
        $filtro     = $this->input->post('filtro');
        $data['filtro']     = $filtro;
        $filtro     = str_replace(array(".","-"), "", $filtro);
        $letra      = substr($filtro,0,1);if ($letra === "1" || $letra === "2"){$filtro = substr($filtro, 0, 8);}else {$filtro = substr($filtro, 0, 7);}
        //$data['ultimo']     = $this->hd_model->dameUltimo();
        
        $data['datos']      = $this->hd_model->dameIngresosHd($filtro,$fechaDesde,$fechaHasta);
        $data['breadcumb']  = "Registros";
        $data['title']      = "Lista de Registros";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'listar_ingreso',$data,'hd');   
    }
    public function modificarRegistro($id)
    {
        $data['datos']      = $this->hd_model->dameUno($id);
        $data['derivacion'] = $this->parametros_model->dameDerivacion();
        $data['datosApo']   = $this->apoderados_model->dameUnoPorFichaHd($id);
        $data['medico']     = $this->profesionales_model->dameTodoHD();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        $data['licencia']   = $this->licencias_model->dameUltimo($id);
        $data['PS']         = $this->profesionales_model->damePS();
        $data['TO']         = $this->profesionales_model->dameTO();
        $data['modificar']  = 'si';
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Modificar Ficha de Ingreso";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'nuevo_ingreso',$data,'hd');   
    }
    
    
    
    public function imprimir($id)
    {
        $datos              = $this->hd_model->dameUno($id);
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
    
    public function eliminar($id)
    {
        $this->hd_model->id = $id;
        $this->hd_model->ficha = -1;
        $this->hd_model->fichaRH = -1;
        $this->hd_model->dateIn  = date('Y-m-d H:i:s');
        $this->hd_model->usuarioIn  = $this->session->userdata('id_usuario');
        $this->hd_model->guardar();
        
        
        $data['datos']      = $this->hd_model->dameIngresosHd();
        $data['breadcumb']  = "Registros";
        $data['title']      = "Lista de Registros";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'listar_ingreso',$data,'hd');  
    }
    public function cargarLicencias($id)
    {   
        $data['medicos']    = $this->profesionales_model->dameTodoHD();
        $datos              = $this->hd_model->dameTodoHD($id);
        $data['licencias']  = $this->licencias_model->dameLicenciasHD($id);
        $data['datos']      = $datos;
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Licencias Médicas";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarLicencias',$data,'hd');   
    }
    public function guardarLicencias()
    {
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
        $this->licencias_model->licCentro   = $this->input->post('licCentro');
        $this->licencias_model->licRut      = $this->input->post('rut');;
        $this->licencias_model->licUsuario  = $this->session->userdata('id_usuario');
            
        $this->licencias_model->licNumero   = $licNumero;
        $this->licencias_model->licDesde    = $licDesde;
        $this->licencias_model->licHasta    = $licHasta;
        $this->licencias_model->licDias     = $licDias;
        $this->licencias_model->licHD       = 1;
        $this->licencias_model->licPaciente = $this->input->post('pacId');
        $this->licencias_model->licRegistro = $this->input->post('fichaElectro');
        $this->licencias_model->licFechaRegistro = date('Y-m-d H:i:s');
        $this->licencias_model->guardar();
        
        
        redirect(base_url().'hd_admision/impresiones/cargarImprimir/'.$this->input->post('fichaElectro'));
    }
    public function cargarIngresoEnfermeria($id)
    {
        $data['datos']      = $this->hd_model->dameUno($id);
        $data['enfermeria'] = $this->enfermeria_model->dameUnoHD($id);
        
        $data['registro']   = $this->hd_model->dameSignosFilaCero($id);
        //die(var_dump($data['enfermeria']));
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Cargar nuevo registro";
        $data['regimen']    = $this->pacientes_model->dameRegimen();
        
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarIngresoEnfermeria',$data,'hd');   
    }
    public function guardarIngresoEnfermeria()
    {
        $IMC = $this->input->post('peso')/($this->input->post('talla')*$this->input->post('talla'))*10000;
        $IMC = round($IMC, 2);
        
        $registro                           = $this->input->post('fichaElectro');
        
        $rut = $this->input->post('rut');
        $alergia = $this->input->post('alergias');
        $id = $this->pacientes_model->dameUno($rut);
         IF(!empty($rut) && !empty($alergia)){
            $this->pacientes_model->id = $id->id;
            $this->pacientes_model->alergia = $alergia;
            $this->pacientes_model->guardar($rut,$alergia);
            unset($this->pacientes_model->alergia,$this->pacientes_model->id);
         }
        //$signos = $this->hd_model->dameSignosIdOrden($registro);
        //IF(!empty($signos))$this->hd_model->sigFila = ($signos[0]->sigFila + 1);
        //ELSE $this->hd_model->sigFila = 0;
        $this->hd_model->sigFila = 0;
        
        $this->hd_model->sigRegistro        = $registro;
        $this->hd_model->sigUsuario         = $this->session->userdata('id_usuario');
        $this->hd_model->sigFechaIngreso    = $this->input->post('fechaIngreso');
        $this->hd_model->sigHoraIngreso     = $this->input->post('horaIngreso');
        $this->hd_model->sigPeso            = $this->input->post('peso');
        $this->hd_model->sigCA              = $this->input->post('circunferencia');
        $this->hd_model->sigTalla           = $this->input->post('talla');
        $this->hd_model->sigTem             = $this->input->post('temperatura');
        $this->hd_model->sigPresion         = $this->input->post('presion');
        $this->hd_model->sigFC              = $this->input->post('frecuenciaC');
        $this->hd_model->sigFR              = $this->input->post('frecuenciaR');
        $this->hd_model->sigEu              = $this->session->userdata('id_usuario');
        IF($this->input->post('regimen') !== '0')
        $this->hd_model->sigRegimen         = $this->input->post('regimen');
        $this->hd_model->sigIMC             = $IMC;;
        $this->hd_model->guardarSignos();
        
        unset($this->hd_model->sigIMC,$this->hd_model->sigEu,$this->hd_model->sigFR,$this->hd_model->sigFC,$this->hd_model->sigPresion,$this->hd_model->sigTem,$this->hd_model->sigTalla,$this->hd_model->sigCA,$this->hd_model->sigPeso,$this->hd_model->sigHoraIngreso,$this->hd_model->sigFila,$this->hd_model->sigRegistro,$this->hd_model->sigUsuario,$this->hd_model->sigFechaIngreso);
        $id = $this->input->post('enfId');
        IF(!empty($id))$this->enfermeria_model->enfId  = $id;
        $this->enfermeria_model->enfUsuario         = $this->session->userdata('id_usuario');
        $this->enfermeria_model->enfFechaRegistro   = date('Y-m-d H:i:s');
        $this->enfermeria_model->enfRegistro        = $registro;
        $this->enfermeria_model->enfPaciente        = $id->id;
        
        $var = $this->input->post('tabacoR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfTabaco          = $this->input->post('tabacoR');
        $this->enfermeria_model->enfTabacoCantidad  = $this->input->post('enfTabacoCantidad');
        $this->enfermeria_model->enfTabacoEdad      = $this->input->post('enfTabacoEdad');
        $var = $this->input->post('alcoholR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfAlcohol         = $this->input->post('alcoholR');
        $this->enfermeria_model->enfAlcoholCantidad = $this->input->post('enfAlcoholCantidad');
        $this->enfermeria_model->enfAlcoholEdad     = $this->input->post('enfAlcoholEdad');
        $var = $this->input->post('drogasR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfDrogas          = $this->input->post('drogasR');
        $this->enfermeria_model->enfDrogasCantidad  = $this->input->post('enfDrogasCantidad');
        $this->enfermeria_model->enfDrogasEdad      = $this->input->post('enfDrogasEdad');
        
        $var = $this->input->post('hipertensionR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfHipertension    = $this->input->post('hipertensionR');
        $var = $this->input->post('arritmiasR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfArritmias       = $this->input->post('arritmiasR');
        $var = $this->input->post('diabetes1R');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfDiabetes1       = $this->input->post('diabetes1R');
        $var = $this->input->post('diabetes2R');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfDiabetes2       = $this->input->post('diabetes2R');
        $var = $this->input->post('renalR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfRenal           = $this->input->post('renalR');
        $var = $this->input->post('hipotiroidismoR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfHipotiroidismo  = $this->input->post('hipotiroidismoR');
        $var = $this->input->post('dislipidemiaR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfDislipidemia    = $this->input->post('dislipidemiaR');
        $var = $this->input->post('higadoR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfHigado          = $this->input->post('higadoR');
        $var = $this->input->post('epilepsiaR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfEpilepsia       = $this->input->post('epilepsiaR');
        $var = $this->input->post('hepatitisR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfHepatitis       = $this->input->post('hepatitisR');
        $var = $this->input->post('asmaR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfAsma            = $this->input->post('asmaR');
        $var = $this->input->post('glaucomaR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfGlaucoma        = $this->input->post('glaucomaR');
        $var = $this->input->post('artritisR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfArtritis        = $this->input->post('artritisR');
        $var = $this->input->post('artrosisR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfArtrosis        = $this->input->post('artrosisR');
        $var = $this->input->post('enfOtros');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfOtros           = $this->input->post('enfOtros');
        
        $var = $this->input->post('fechaQuirurgico1');IF(!empty($var)&& $var !== '0000-00-00'){
            $fechaQuirurgico1                           = new DateTime($this->input->post('fechaQuirurgico1'));
            $this->enfermeria_model->enfFecha1          = $fechaQuirurgico1->format('Y-m-d');
        }
        $this->enfermeria_model->enfQuirurgico1     = $this->input->post('enfQuirurgico1');
        
        $var = $this->input->post('fechaQuirurgico2');IF(!empty($var)&& $var !== '0000-00-00'){
            $fechaQuirurgico2                           = new DateTime($this->input->post('fechaQuirurgico2'));
            $this->enfermeria_model->enfFecha2          = $fechaQuirurgico2->format('Y-m-d');
        }
        $this->enfermeria_model->enfQuirurgico2     = $this->input->post('enfQuirurgico2');
        
        $var = $this->input->post('fechaQuirurgico3');IF(!empty($var)&& $var !== '0000-00-00'){
            $fechaQuirurgico3                           = new DateTime($this->input->post('fechaQuirurgico3'));
            $this->enfermeria_model->enfFecha3          = $fechaQuirurgico3->format('Y-m-d');
        }
        $this->enfermeria_model->enfQuirurgico3     = $this->input->post('enfQuirurgico3');
        
        $var = $this->input->post('fechaQuirurgico4');IF(!empty($var)&& $var !== '0000-00-00'){
            $fechaQuirurgico4                           = new DateTime($this->input->post('fechaQuirurgico4'));
            $this->enfermeria_model->enfFecha4          = $fechaQuirurgico4->format('Y-m-d');
        }
        $this->enfermeria_model->enfQuirurgico4     = $this->input->post('enfQuirurgico4');
        
        $this->enfermeria_model->enfMed1            = $this->input->post('enfMed1');
        $this->enfermeria_model->enfHor1            = $this->input->post('enfHor1');
        $this->enfermeria_model->enfMed2            = $this->input->post('enfMed2');
        $this->enfermeria_model->enfHor2            = $this->input->post('enfHor2');
        $this->enfermeria_model->enfMed3            = $this->input->post('enfMed3');
        $this->enfermeria_model->enfHor3            = $this->input->post('enfHor3');
        $this->enfermeria_model->enfMed4            = $this->input->post('enfMed4');
        $this->enfermeria_model->enfHor4            = $this->input->post('enfHor4');
        $this->enfermeria_model->enfMed5            = $this->input->post('enfMed5');
        $this->enfermeria_model->enfHor5            = $this->input->post('enfHor5');
        $this->enfermeria_model->enfMed6            = $this->input->post('enfMed6');
        $this->enfermeria_model->enfHor6            = $this->input->post('enfHor6');
        
        $var = $this->input->post('protesisR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfProtesis        = $this->input->post('protesisR');
        $this->enfermeria_model->enfProtesisInf     = $this->input->post('enfProtesisInf');
        $this->enfermeria_model->enfProtesisSup     = $this->input->post('enfProtesisSup');
        $this->enfermeria_model->enfProtesisCom     = $this->input->post('enfProtesisCom');
        $var = $this->input->post('audifonoR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfAudifono        = $this->input->post('audifonoR');
        $this->enfermeria_model->enfAudifonoIzq     = $this->input->post('enfAudifonoIzq');
        $this->enfermeria_model->enfAudifonoDer     = $this->input->post('enfAudifonoDer');
        $this->enfermeria_model->enfAudifonoAmb     = $this->input->post('enfAudifonoAmb');
        $this->enfermeria_model->enfOtro            = $this->input->post('enfOtro');
        
        $this->enfermeria_model->enfSueno            = $this->input->post('enfSueno');
        $var = $this->input->post('retencionR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfRetencion        = $this->input->post('retencionR');
        $var = $this->input->post('incontinenciaR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfIncontinencia    = $this->input->post('incontinenciaR');
        $var = $this->input->post('constipacionR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfConstipacion     = $this->input->post('constipacionR');
        $var = $this->input->post('diarreaR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfDiarrea          = $this->input->post('diarreaR');
        $var = $this->input->post('interrupcionR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfInterrupcion     = $this->input->post('interrupcionR');
        $var = $this->input->post('conciliarR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfConciliar        = $this->input->post('conciliarR');
        $var = $this->input->post('despertarR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfDespertar        = $this->input->post('despertarR');
        $var = $this->input->post('apetitoR');IF(!empty($var)||$var === '0')
        $this->enfermeria_model->enfApetito          = $this->input->post('apetitoR');
        $this->enfermeria_model->enfFarmacoCritico      = $this->input->post('farmacoCritico');
        $this->enfermeria_model->enfObservaciones      = $this->input->post('observaciones');
        $this->enfermeria_model->guardarHD(); 
        
        redirect(base_url().'hd_admision/ingresos/listarIngreso/');
    
    }
    public function cargarContacto()
    {
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Registro de Contacto Derivaciones Usuarios HD RH";
        $data['contactos']  = $this->hd_model->dameContacto();
        $data['menu']       = "ingreso";
        $data['submenu']    = "cingreso";
        $data['destinatarios']= 'griedel@cetep.cl, hospitaldedia@mirandes.cl';
        Layout_Helper::cargaVista($this,'cargarContacto',$data,'hd');   
    }
    public function guardarContacto()
    {
        $rut        = str_replace(array(".","-"), "", $this->input->post('rut'));
        $letra      = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
        
        $date       = new DateTime($this->input->post('fechaDerivacion'));
        $fecha      = $date->format('Y-m-d');
        $this->hd_model->conFechaDerivacion = $fecha;
        $date       = new DateTime($this->input->post('fechaRecepcion'));
        $fechaR     = $date->format('Y-m-d');
        $this->hd_model->conFechaRecepcion  = $fechaR;
        $date       = new DateTime($this->input->post('fechaPrimer'));
        $fecha      = $date->format('Y-m-d');
        $this->hd_model->conFechaPrimer     = $fecha;
        $date       = new DateTime($this->input->post('fechaEntrevista'));
        $fechaE     = $date->format('Y-m-d');
        $this->hd_model->conFechaEntrevista = $fechaE;
        
        $this->hd_model->conHoraEntrevista  = $this->input->post('horaEntrevista');
        $this->hd_model->conComentario      = $this->input->post('comentario');
        $this->hd_model->conFechaRegistro   = date('Y-m-d H:i:s');
        $this->hd_model->conUsuario         = $this->session->userdata('id_usuario');
        
        $this->hd_model->conRut             = $rut;
        $this->hd_model->conNombres         = $this->input->post('nombres');
        $this->hd_model->conApePat          = $this->input->post('apePat');
        $this->hd_model->conApeMat          = $this->input->post('apeMat');
        $this->hd_model->guardarContacto();
        
        $dias = $this->getDiasHabiles($fechaR,$fechaE); 
        //die($CantidadDiasHabiles.'sddjvb'.$fechaE);
    //$dias =   $this->input->post('fechaEntrevista')- $this->input->post('fechaRecepcion');
        
    $mail = 'cetep@cetep.cl';//DESDE
    $header = 'From: ' . $mail . " \r\n";
    $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    $header .= "Mime-Version: 1.0 \r\n";
    $header .= "Content-Type: text/html";
    $resumen="
    <table border='1'>
        <tr>
            <td colspan='8' align='center'>REGISTRO CONTACTO DERIVACIONES USUARIO/AS HD RH</td>
        </tr>
        <tr>
            <td style='border-right:none' align='center'>Fecha<br>Derivación</td>
            <td style='border-left:none'>".$this->input->post('fechaDerivacion')."</td>
            <td style='border-right:none' align='center'>Fecha<br>Recepción</td>
            <td style='border-left:none'>".$this->input->post('fechaRecepcion')."</td>
            <td style='border-right:none' align='center'>Fecha<br>Entrevista</td>
            <td style='border-left:none'>".$this->input->post('fechaEntrevista')."</td>
            <td style='border-right:none'>Días Recep/Ent: </td>
            <td style='border-left:none'>".$dias."</td>
        </tr>
        <tr>
            <td colspan='2' align='center'>Primer Contacto</td>
            <td colspan='2' align='center'>".$this->input->post('fechaPrimer')."</td>
            <td colspan='2' align='center'>Información Hora Entrevista</td>
            <td colspan='2' align='center'>".$this->input->post('horaEntrevista')."</td>
        </tr>
        <tr>
            <td colspan='8'>Comentarios / Observaciones: ".$this->input->post('comentario')."</td>
        </tr>
    </table>
    <br><br><br>
    Atte.
    <br><br>
    <table style='border:none'>
    <tr>
        <td>
            <img style='width: 20%; margin-top: 250px' src='".base_url()."../assets/img/mirAndes.png' >
        </td>
        <td>
            &nbsp;Recepción<br>
            &nbsp;MirAndes HD
        </td>
    </tr>
    </table>
    ";

    $headers = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/html; charset=utf-8\r\n"; 
    $headers .= "From: Recepcion MirAndes <hospitaldedia@mirandes.cl>\r\n"; //dirección del remitente 
    $destinatario = $this->input->post('destinatarios'); //AL CARGAR!!!! este es el email al que envias se agregar al CARGAR
    $asunto = "Confirmación Contacto";
    mail($destinatario,$asunto,$resumen,$headers) ;
    $this->load->view('panel/modals/guardar_exitoso');
    
    
    }
    
    
    function getDiasHabiles($fechainicio, $fechafin, $diasferiados = array()) {
	// Convirtiendo en timestamp las fechas
        
	$fechainicio = strtotime($fechainicio);
	$fechafin = strtotime($fechafin);
	
	// Incremento en 1 dia
	$diainc = 24*60*60;
	$diasferiados = array(
       //FORMATO Y-m-d   
        '1-1', // Año Nuevo (irrenunciable) 
        '10-4', // Viernes Santo (feriado religioso) 
        '11-4', // Sábado Santo (feriado religioso) 
        '1-5', // Día Nacional del Trabajo (irrenunciable) 
        '21-5', // Día de las Glorias Navales 
        '29-6', // San Pedro y San Pablo (feriado religioso) 
        '16-7', // Virgen del Carmen (feriado religioso) 
        '15-8', // Asunción de la Virgen (feriado religioso) 
        '19-9', // Dia Festivo De Prueba EN EL EJEMPLO <-----
        '12-10', // Aniversario del Descubrimiento de América 
        '31-10', // Día Nacional de las Iglesias Evangélicas y Protestantes (feriado religioso) 
        '1-11', // Día de Todos los Santos (feriado religioso) 
        '8-12', // Inmaculada Concepción de la Virgen (feriado religioso) 
        '13-12', // elecciones presidencial y parlamentarias (puede que se traslade al domingo 13) 
        '25-12', // Natividad del Señor (feriado religioso) (irrenunciable) 
        );
	// Arreglo de dias habiles, inicianlizacion
	$diashabiles = array();
	$sumatoria=0;
	// Se recorre desde la fecha de inicio a la fecha fin, incrementando en 1 dia
	for ($midia = $fechainicio; $midia <= $fechafin; $midia += $diainc) {
		// Si el dia indicado, no es sabado o domingo es habil
		if (!in_array(date('N', $midia), array(6,7))) { 
			// Si no es un dia feriado entonces es habil
			if (!in_array(date('Y-m-d', $midia), $diasferiados)) {
                                //EL ARRAY MUESTRA EL DÍA
				array_push($diashabiles, date('Y-m-d', $midia));
                                $sumatoria += 1;
			}
		}
	}
	return $sumatoria;
    }
    
    
    public function cargarIngresoTO($id)
    {
        $data['evaluacion']  = $this->hd_model->dameEvaluacionesId($id);
        $data['datos']      = $this->hd_model->dameUno($id);//die(var_dump($data['datos']));
        $data['ingresos']      = $this->hd_model->dameUnoIngreso($id);//die(var_dump($data['datos']));
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Registro de Ingreso";
        $data['menu']       = "ingreso";
        $data['submenu']    = "cingreso";
        Layout_Helper::cargaVista($this,'cargarIngresoTO',$data,'hd');   
    }
    public function guardarIngresoTO()
    {
        $registro                           = $this->input->post('fichaElectro');
        
        $rut = $this->input->post('rut');
        $alergia = $this->input->post('alergias');
        $id = $this->pacientes_model->dameUno($rut);
         IF(!empty($rut) && !empty($alergia)){
            $this->pacientes_model->id = $id->id;
            $this->pacientes_model->alergia = $alergia;
            $this->pacientes_model->guardar($rut,$alergia);
            unset($this->pacientes_model->alergia,$this->pacientes_model->id);
         }
         $dameIngreso = $this->hd_model->dameIngresoHoy($registro,$id->paciente);
         IF(!empty($dameIngreso->ingId))$this->hd_model->ingId = $dameIngreso->ingId;
        $this->hd_model->ingPaciente = $id->paciente;
        $this->hd_model->ingRegistro = $registro;
        $this->hd_model->ingUsuario               = $this->session->userdata('id_usuario');
        $this->hd_model->ingFechaRegistro   = date('Y-m-d H:i:s');
        $ingAntGenerales = str_replace("\n", "<br>", $this->input->post('ingAntGenerales'));
        $ingAntSalud = str_replace("\n", "<br>", $this->input->post('ingAntSalud'));
        $ingInfFamiliar = str_replace("\n", "<br>", $this->input->post('ingInfFamiliar'));
        $ingConsideraciones = str_replace("\n", "<br>", $this->input->post('ingConsideraciones'));
        $this->hd_model->ingAntGenerales     = $ingAntGenerales;
        $this->hd_model->ingAntSalud              = $ingAntSalud;
        $this->hd_model->ingInfFamiliar           = $ingInfFamiliar;
        $this->hd_model->ingConsideraciones = $ingConsideraciones;
        $this->hd_model->guardarIngresoTO();
        
        redirect(base_url().'hd_admision/ingresos/cargarIngresoTO/'.$registro);
    }
}