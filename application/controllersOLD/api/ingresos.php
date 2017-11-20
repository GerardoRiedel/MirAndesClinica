<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 21/09/2016
 * Time: 14:00
 */
class Ingresos extends CI_Controller
{

    function __construct(){
        parent::__construct();
        
        //$this->load->helper('validacion');
    }

    
    public function index($rut){
        $this->load->model('pacientes_model');
        $rut    = str_replace(array(',','.','-'), '', $rut);
        $letra  = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
        
        $res = $this->pacientes_model->dameUnoApi($rut);
        //echo var_dump($res).'API';
        if(empty($res)){
            $this->load->model('apoderados_model');
            $res = $this->apoderados_model->dameUno($rut);
            //echo var_dump($res).'API2222';
            }
            echo json_encode($res);
    }
    
    function calculaedad($fecha){
        $date2  = date('Y-m-d');//
        $diff   = abs(strtotime($date2) - strtotime($fecha));
        $years  = floor($diff / (365*60*60*24));
        return $years;
    }
    public function dameUnoExisteRut($rut =''){
        $this->load->model('usuarios_panel_log_model');
    	$rut = str_replace(array(',','.','-'), '', $rut);
        IF(!empty($rut))$this->usuarios_panel_log_model->uspRut = $rut;
        
        $res = $this->usuarios_panel_log_model->dameUnoExiste();
        echo json_encode($res);
    }
    public function dameUnoExisteEmail($email =''){
        
        $email = str_replace("~", "@", $email);
        $this->load->model('usuarios_panel_log_model');
        IF(!empty($email))$this->usuarios_panel_log_model->uspEmail = $email;
        
        $res = $this->usuarios_panel_log_model->dameUnoExiste();
        echo json_encode($res);
    }
    public function dameUnoExisteUsuario($usuario =''){
        $this->load->model('usuarios_panel_log_model');
        IF(!empty($usuario))$this->usuarios_panel_log_model->uspUsuario = $usuario;
        
        $res = $this->usuarios_panel_log_model->dameUnoExiste();
        echo json_encode($res);
    }
    
    public function registros($paciente){
        
        $this->load->model('ingreso_model');
        $res = $this->ingreso_model->dameTodo($paciente);
        echo json_encode($res);
    }
    public function licencias($paciente){
        
        $this->load->model('licencias_model');
        $res = $this->licencias_model->dameDatosPorPaciente($paciente);
        echo json_encode($res);
    }
    public function apoderado($ficha){
        
        $this->load->model('apoderados_model');
        $res = $this->apoderados_model->dameUnoPorFichaParaFicha($ficha);
        echo json_encode($res);
    }
    public function ficha($rut){
        $this->load->model('ingreso_model');
        $res = $this->ingreso_model->dameUnoPorRut($rut);
        $hoy = date('Y-m-d').' 00:00:00';
        IF($res->dateIn < $hoy)$res = '';
        echo json_encode($res);
    }
    public function contacto($ficha){
        $this->load->model('apoderados_model');
        $res = $this->apoderados_model->dameUnoContacto($ficha);
        echo json_encode($res);
    }
    public function dameObservaciones($paciente){
        $this->load->model('observaciones_model');
        $res = $this->observaciones_model->dameTodosPaciente($paciente);
        echo json_encode($res);
    }
    public function guardar($array){
        $array = str_replace('%C3%B1','Ñ', $array);
        $array = str_replace('%20',' ', $array);
        $array = str_replace('~','@', $array);
        $array = explode('_', $array);
        
        $this->load->model('pacientes_model');
        $this->load->model('apoderados_model');
        $this->load->model("comunas_model");
        $this->load->model("licencias_model");
        
        $rut        = str_replace(array(".","-"), "", $array[0]);
        $letra      = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
        $ficha      = $array[1];
        $piso       = $array[2];
        $nombre     = $array[3];
        $apePat     = $array[4];
        $apeMat     = $array[5];
        $fechaN     = $array[6];
            IF(!empty($fechaN)){
                $date       = str_replace("/", "-", $fechaN);
                $date       = new DateTime($date);
                $fechaN     = $date->format('Y-m-d');
            }
        $direccion  = $array[7];
        $comuna     = $array[8];
            IF($comuna != '0'){
                $region = $this->comunas_model->dameUno($comuna);
                $region = $region->padre;
            }
            ELSE $region = '';
        $telFijo    = $array[9];
        $telCelu    = $array[10];
        $ocupacion  = $array[11];
        $email      = $array[12];
        
        $paciente   = $this->pacientes_model->dameUno($rut);
        if(!empty($paciente->id)){$this->pacientes_model->id = $paciente->id;}
        
        $emergencias    = $array[13];
        $alergias       = $array[14];
        $medico         = $array[15];
        $regimen        = $array[16];
        $diagnostico    = $array[17];
        $comentario     = $array[18];
        $isapre         = $array[19];
        $rutTitular     = $array[20];
        IF(!empty($rutTitular)){
            $rutTitular = str_replace(array(".","-"), "", $rutTitular);
            $letra      = substr($rutTitular,0,1);if ($letra === '1' || $letra === '2'){$rutTitular = substr($rutTitular, 0, 8);}else {$rutTitular = substr($rutTitular, 0, 7);}
        }
        ELSE $rutTitular = '0';
        
                if(!empty($alergia)){
                    $this->pacientes_model->alergia         = $alergia;
                }
                    $this->pacientes_model->nombres         = $nombre;
                    $this->pacientes_model->apellidoPaterno = $apePat;
                    $this->pacientes_model->apellidoMaterno = $apeMat;
                    $this->pacientes_model->fechaNacimiento = $fechaN;
                    //$this->pacientes_model->nacionalidad    = $this->input->post('nac');
                    $this->pacientes_model->telefono        = $telFijo;
                    $this->pacientes_model->celular         = $telCelu;
                    $this->pacientes_model->email           = $email;
                    //$this->pacientes_model->sexo            = $this->input->post('sexo');
                    $this->pacientes_model->direccion       = $direccion;
                    $this->pacientes_model->ocupacion       = $ocupacion;
                    $this->pacientes_model->comuna          = $comuna;
                    $this->pacientes_model->region          = $region;
                    $this->pacientes_model->rut             = $rut;
                    $this->pacientes_model->guardar($rut);
                    unset($this->pacientes_model->id,$this->pacientes_model->rut,$this->pacientes_model->ocupacion,$this->pacientes_model->direccion,$this->pacientes_model->sexo,$this->pacientes_model->email,$this->pacientes_model->nombres,$this->pacientes_model->apellidoPaterno,$this->pacientes_model->apellidoMaterno,$this->pacientes_model->fechaNacimiento,$this->pacientes_model->telefono,$this->pacientes_model->celular);
        
                    IF(!empty($regimen)){
                        $regimen = $this->pacientes_model->dameRegimenId($regimen);
                        $regimen->regNombre;
                    }
                    ELSE $regimen = '';
                    
                    $paciente   = $this->pacientes_model->dameUno($rut);
                    
                    IF(empty($ficha) || $ficha === '0' || $ficha === 'Sin ficha, se creará al ingreso'){
                    $ficha = $this->ingreso_model->dameFicha($paciente->id);
                    }

                    $idFichaHoy = $this->ingreso_model->dameIdFichaHoy($paciente->id);
                    IF(!empty($idFichaHoy))$this->ingreso_model->id = $idFichaHoy->id;

                    ////CREA FICHA
                        $this->ingreso_model->dateIn            = date('Y-m-d H:i:s');
                        $this->ingreso_model->fechaIngresoReal  = date('Y-m-d');
                        $this->ingreso_model->horaIngresoReal   = date('H:i:s');
                        $this->ingreso_model->fechaIngreso      = date('Y-m-d');
                        $this->ingreso_model->horaIngreso       = date('H:i:s');
                        $this->ingreso_model->origenDerivacion  = 'UGH';
                        $this->ingreso_model->institucion       = 'CETEP';
                        $this->ingreso_model->fechaDerivacion   = date('Y-m-d');
                        $this->ingreso_model->comentario        = $comentario;
                        $this->ingreso_model->diagnostico       = $diagnostico;
                        IF($medico === '0')$medico = '';
                        $this->ingreso_model->medicoAsignado    = $medico;
                        $this->ingreso_model->regimen           = $regimen;
                        $this->ingreso_model->ingresoMirAndes   = 1;
                        //$this->ingreso_model->ges               = $ges;
                        $this->ingreso_model->paciente          = $paciente->id;
                        $this->ingreso_model->isapre            = $isapre;
                        $this->ingreso_model->ficha             = $ficha;
                        $this->ingreso_model->edadPaciente      = $this->calculaedad($fechaN);
                        $this->ingreso_model->comuna            = $comuna;
                        $this->ingreso_model->usuarioIn         = $this->session->userdata('id_usuario');
                        $this->ingreso_model->rutTitular        = $rutTitular;
                        $this->ingreso_model->piso              = $piso;
                        $this->ingreso_model->emergenciaDerivar = $emergencias;
                        $this->ingreso_model->guardar();


                    $idFicha = $this->ingreso_model->dameIdFicha($paciente->id);
                    
            
            ////GUARDAR CONTACTO  
            $nombreContacto     = $array[21];
            $telUnoContacto     = $array[22];
            $telDosContacto     = $array[23];
            $parentescoOtroContacto = $array[24];
                        
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
                            $this->apoderados_model->apoTipo            = 3;
                            $this->apoderados_model->apoFechaRegistro   = date('Y-m-d H:i:s');
                            $this->apoderados_model->apoFichaElectronica = $idFicha->id;
                            $this->apoderados_model->guardar();
                            
                        }
                        unset($this->apoderados_model->apoFechaRegistro,$this->apoderados_model->id,$this->apoderados_model->rut,$this->apoderados_model->ocupacion,$this->apoderados_model->direccion,$this->apoderados_model->sexo,$this->apoderados_model->email,$this->apoderados_model->nombres,$this->apoderados_model->apellidoPaterno,$this->apoderados_model->apellidoMaterno,$this->apoderados_model->fechaNacimiento,$this->apoderados_model->telefono,$this->apoderados_model->celular);

                        
                        
                ////GUARDAR LICENCIA 
                        $licNumero  = $array[25];
                        $licDesde   = $array[26];
                        $licDias    = $array[27];
                        
                        IF(!empty($licNumero)){
                            $licDesde   = new DateTime($licDesde);
                            $licDesde   = $licDesde->format('Y-m-d');

                            $licDias    = $licDias-1;
                            $licHasta   = date("Y-m-d", strtotime("$licDesde + $licDias days"));
                            $licDias    = $licDias;

                            $this->licencias_model->licNombre   = $nombre;
                            $this->licencias_model->licApePat   = $apePat;
                            $this->licencias_model->licApeMat   = $apeMat;
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
     
                    
                 echo var_dump($array); 
                 echo json_encode('OK');
    }
    


	


}