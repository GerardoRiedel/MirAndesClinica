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
    }

    
    public function index($rut){
        $this->load->model('pacientes_model');
        $rut    = str_replace(array(',','.','-'), '', $rut);
        $letra  = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
        
        $res = $this->pacientes_model->dameUnoApi($rut);
        if(empty($res)){
            $this->load->model('apoderados_model');
            $res = $this->apoderados_model->dameUno($rut);
            }
            echo json_encode($res);
    }
    
    function calculaedad($fecha){
        $date2  = date('Y-m-d');
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
        $array = str_replace('%C3%AD','í', $array);
        $array = str_replace('%C3%B3','ó', $array);$array = str_replace('%C3%93','Ó', $array);
        $array = str_replace('%C3%B1','ñ', $array);$array = str_replace('%C3%91','Ñ', $array);
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
    
    
    
    
     public function guardarEvolucion($array){
         //die(var_dump($array));
        $this->load->model('evoluciones_model');
        $array = str_replace('%C3%AD','í', $array);
        $array = str_replace('%C3%B3','ó', $array);$array = str_replace('%C3%93','Ó', $array);
        $array = str_replace('%C3%B1','ñ', $array);$array = str_replace('%C3%91','Ñ', $array);
        $array = str_replace('%20',' ', $array);
        $array = str_replace('~','@', $array);
        $array = explode('_', $array);
        
        $evoId      = $array[0];
        $habitacion      = $array[1];
        $diaEstadia      = $array[2];
        $evoDiagPsiquiatra       = $array[3];
        $evoDiagMedico     = $array[4];
        $peso     = $array[5];
        $talla     = $array[6];
        $evoPlan     = $array[7];
        $evoAvisar     = $array[8];
        $evoExamenes     = $array[9];
        $evoDia     = $array[10];
        $evoNoche     = $array[11];
        $evoSueDia     = $array[12];
        $evoSueNoche     = $array[13];
        $evoHidraDia     = $array[14];
        $evoHidraNoche     = $array[15];
        
        $this->evoluciones_model->evoId        = $evoId;
        $this->evoluciones_model->evoUsuario        = $this->session->userdata('id_usuario');
       // $this->evoluciones_model->evoRegistro       = $this->input->post('fichaElectro');
        $this->evoluciones_model->evoFechaRegistro  = date('Y-m-d H:i:s');
        $this->evoluciones_model->evoEstadia        = $diaEstadia;
        $this->evoluciones_model->evoHabitacion     = $habitacion;
        $this->evoluciones_model->evoPeso           = $peso;
        $this->evoluciones_model->evoTalla          = $talla;
        //$this->evoluciones_model->evoRiesgo         = $this->input->post('evoRiesgo');
        //$this->evoluciones_model->evoDowton         = $this->input->post('evoDowton');
        $this->evoluciones_model->evoDiagMedico     = $evoDiagMedico;
        $this->evoluciones_model->evoDiagPsiquiatra = $evoDiagPsiquiatra;
        
        //$this->evoluciones_model->evoCSV0           = $this->input->post('evoCSV00').'_'.$this->input->post('evoCSV01').'_'.$this->input->post('evoCSV02').'_'.$this->input->post('evoCSV03').'_'.$this->input->post('evoCSV04').'_'.$this->input->post('evoCSV05').'_'.$this->input->post('evoCSV06').'_'.$this->input->post('evoCSV07').'_'.$this->input->post('evoCSV08').'_'.$this->input->post('evoCSV09');
        //$this->evoluciones_model->evoCSV1           = $this->input->post('evoCSV10').'_'.$this->input->post('evoCSV11').'_'.$this->input->post('evoCSV12').'_'.$this->input->post('evoCSV13').'_'.$this->input->post('evoCSV14').'_'.$this->input->post('evoCSV15').'_'.$this->input->post('evoCSV16').'_'.$this->input->post('evoCSV17').'_'.$this->input->post('evoCSV18').'_'.$this->input->post('evoCSV19');
        //$this->evoluciones_model->evoCSV2           = $this->input->post('evoCSV20').'_'.$this->input->post('evoCSV21').'_'.$this->input->post('evoCSV22').'_'.$this->input->post('evoCSV23').'_'.$this->input->post('evoCSV24').'_'.$this->input->post('evoCSV25').'_'.$this->input->post('evoCSV26').'_'.$this->input->post('evoCSV27').'_'.$this->input->post('evoCSV28').'_'.$this->input->post('evoCSV29');
        //$this->evoluciones_model->evoCSV3           = $this->input->post('evoCSV30').'_'.$this->input->post('evoCSV31').'_'.$this->input->post('evoCSV32').'_'.$this->input->post('evoCSV33').'_'.$this->input->post('evoCSV34').'_'.$this->input->post('evoCSV35').'_'.$this->input->post('evoCSV36').'_'.$this->input->post('evoCSV37').'_'.$this->input->post('evoCSV38').'_'.$this->input->post('evoCSV39');
        //$this->evoluciones_model->evoCSV4           = $this->input->post('evoCSV40').'_'.$this->input->post('evoCSV41').'_'.$this->input->post('evoCSV42').'_'.$this->input->post('evoCSV43').'_'.$this->input->post('evoCSV44').'_'.$this->input->post('evoCSV45').'_'.$this->input->post('evoCSV46').'_'.$this->input->post('evoCSV47').'_'.$this->input->post('evoCSV48').'_'.$this->input->post('evoCSV49');
        //$this->evoluciones_model->evoCSV5           = $this->input->post('evoCSV50').'_'.$this->input->post('evoCSV51').'_'.$this->input->post('evoCSV52').'_'.$this->input->post('evoCSV53').'_'.$this->input->post('evoCSV54').'_'.$this->input->post('evoCSV55').'_'.$this->input->post('evoCSV56').'_'.$this->input->post('evoCSV57').'_'.$this->input->post('evoCSV58').'_'.$this->input->post('evoCSV59');
        //$this->evoluciones_model->evoCSV6           = $this->input->post('evoCSV60').'_'.$this->input->post('evoCSV61').'_'.$this->input->post('evoCSV62').'_'.$this->input->post('evoCSV63').'_'.$this->input->post('evoCSV64').'_'.$this->input->post('evoCSV65').'_'.$this->input->post('evoCSV66').'_'.$this->input->post('evoCSV67').'_'.$this->input->post('evoCSV68').'_'.$this->input->post('evoCSV69');
        //$this->evoluciones_model->evoCSV7           = $this->input->post('evoCSV70').'_'.$this->input->post('evoCSV71').'_'.$this->input->post('evoCSV72').'_'.$this->input->post('evoCSV73').'_'.$this->input->post('evoCSV74').'_'.$this->input->post('evoCSV75').'_'.$this->input->post('evoCSV76').'_'.$this->input->post('evoCSV77').'_'.$this->input->post('evoCSV78').'_'.$this->input->post('evoCSV79');
        //$this->evoluciones_model->evoCSV8           = $this->input->post('evoCSV80').'_'.$this->input->post('evoCSV81').'_'.$this->input->post('evoCSV82').'_'.$this->input->post('evoCSV83').'_'.$this->input->post('evoCSV84').'_'.$this->input->post('evoCSV85').'_'.$this->input->post('evoCSV86').'_'.$this->input->post('evoCSV87').'_'.$this->input->post('evoCSV88').'_'.$this->input->post('evoCSV89');
        //$this->evoluciones_model->evoCSV9           = $this->input->post('evoCSV90').'_'.$this->input->post('evoCSV91').'_'.$this->input->post('evoCSV92').'_'.$this->input->post('evoCSV93').'_'.$this->input->post('evoCSV94').'_'.$this->input->post('evoCSV95').'_'.$this->input->post('evoCSV96').'_'.$this->input->post('evoCSV97').'_'.$this->input->post('evoCSV98').'_'.$this->input->post('evoCSV99');
        //
        $this->evoluciones_model->evoSueDia         = $evoSueDia;
        $this->evoluciones_model->evoSueNoche       = $evoSueNoche;
        $this->evoluciones_model->evoHidraDia       = $evoHidraDia;
        $this->evoluciones_model->evoHidraNoche     = $evoHidraNoche;
       //
        //$this->evoluciones_model->evoAlimentacion   = $this->input->post('alim1').'_'.$this->input->post('alim2').'_'.$this->input->post('alim3').'_'.$this->input->post('alim4').'_'.$this->input->post('alim5').'_'.$this->input->post('alim6');
        //$this->evoluciones_model->evoVisitas        = $this->input->post('evoVisitas');
        //$this->evoluciones_model->evoTelefono       = $this->input->post('evoTelefono');
        //$this->evoluciones_model->evoSalidas        = $this->input->post('evoSalidas');
        //$this->evoluciones_model->evoCuidador       = $this->input->post('evoCuidador');
        //
        //$this->evoluciones_model->evoTO             = $this->input->post('evoTO1').'_'.$this->input->post('evoTO2').'_'.$this->input->post('evoTOOtro');
        //$this->evoluciones_model->evoMed0           = $this->input->post('evoMed00').'_'.$this->input->post('evoMed01').'_'.$this->input->post('evoMed02').'_'.$this->input->post('evoMed03').'_'.$this->input->post('evoMed04').'_'.$this->input->post('evoMed05').'_'.$this->input->post('evoMed06').'_'.$this->input->post('evoMed07').'_'.$this->input->post('evoMed08').'_'.$this->input->post('evoMed09').'_'.$this->input->post('evoMed010').'_'.$this->input->post('evoMed011').'_'.$this->input->post('evoMed012').'_'.$this->input->post('evoMed013').'_'.$this->input->post('evoMed014').'_'.$this->input->post('evoMed015').'_'.$this->input->post('evoMed016');
        //$this->evoluciones_model->evoMed1           = $this->input->post('evoMed10').'_'.$this->input->post('evoMed11').'_'.$this->input->post('evoMed12').'_'.$this->input->post('evoMed13').'_'.$this->input->post('evoMed14').'_'.$this->input->post('evoMed15').'_'.$this->input->post('evoMed16').'_'.$this->input->post('evoMed17').'_'.$this->input->post('evoMed18').'_'.$this->input->post('evoMed19').'_'.$this->input->post('evoMed110').'_'.$this->input->post('evoMed111').'_'.$this->input->post('evoMed112').'_'.$this->input->post('evoMed113').'_'.$this->input->post('evoMed114').'_'.$this->input->post('evoMed115').'_'.$this->input->post('evoMed116');
        //$this->evoluciones_model->evoMed2           = $this->input->post('evoMed20').'_'.$this->input->post('evoMed21').'_'.$this->input->post('evoMed22').'_'.$this->input->post('evoMed23').'_'.$this->input->post('evoMed24').'_'.$this->input->post('evoMed25').'_'.$this->input->post('evoMed26').'_'.$this->input->post('evoMed27').'_'.$this->input->post('evoMed28').'_'.$this->input->post('evoMed29').'_'.$this->input->post('evoMed210').'_'.$this->input->post('evoMed211').'_'.$this->input->post('evoMed212').'_'.$this->input->post('evoMed213').'_'.$this->input->post('evoMed214').'_'.$this->input->post('evoMed215').'_'.$this->input->post('evoMed216');
        //$this->evoluciones_model->evoMed3           = $this->input->post('evoMed30').'_'.$this->input->post('evoMed31').'_'.$this->input->post('evoMed32').'_'.$this->input->post('evoMed33').'_'.$this->input->post('evoMed34').'_'.$this->input->post('evoMed35').'_'.$this->input->post('evoMed36').'_'.$this->input->post('evoMed37').'_'.$this->input->post('evoMed38').'_'.$this->input->post('evoMed39').'_'.$this->input->post('evoMed310').'_'.$this->input->post('evoMed311').'_'.$this->input->post('evoMed312').'_'.$this->input->post('evoMed313').'_'.$this->input->post('evoMed314').'_'.$this->input->post('evoMed315').'_'.$this->input->post('evoMed316');
        //$this->evoluciones_model->evoMed4           = $this->input->post('evoMed40').'_'.$this->input->post('evoMed41').'_'.$this->input->post('evoMed42').'_'.$this->input->post('evoMed43').'_'.$this->input->post('evoMed44').'_'.$this->input->post('evoMed45').'_'.$this->input->post('evoMed46').'_'.$this->input->post('evoMed47').'_'.$this->input->post('evoMed48').'_'.$this->input->post('evoMed49').'_'.$this->input->post('evoMed410').'_'.$this->input->post('evoMed411').'_'.$this->input->post('evoMed412').'_'.$this->input->post('evoMed413').'_'.$this->input->post('evoMed414').'_'.$this->input->post('evoMed415').'_'.$this->input->post('evoMed416');
        //$this->evoluciones_model->evoMed5           = $this->input->post('evoMed50').'_'.$this->input->post('evoMed51').'_'.$this->input->post('evoMed52').'_'.$this->input->post('evoMed53').'_'.$this->input->post('evoMed54').'_'.$this->input->post('evoMed55').'_'.$this->input->post('evoMed56').'_'.$this->input->post('evoMed57').'_'.$this->input->post('evoMed58').'_'.$this->input->post('evoMed59').'_'.$this->input->post('evoMed510').'_'.$this->input->post('evoMed511').'_'.$this->input->post('evoMed512').'_'.$this->input->post('evoMed513').'_'.$this->input->post('evoMed514').'_'.$this->input->post('evoMed515').'_'.$this->input->post('evoMed516');
        //$this->evoluciones_model->evoMed6           = $this->input->post('evoMed60').'_'.$this->input->post('evoMed61').'_'.$this->input->post('evoMed62').'_'.$this->input->post('evoMed63').'_'.$this->input->post('evoMed64').'_'.$this->input->post('evoMed65').'_'.$this->input->post('evoMed66').'_'.$this->input->post('evoMed67').'_'.$this->input->post('evoMed68').'_'.$this->input->post('evoMed69').'_'.$this->input->post('evoMed610').'_'.$this->input->post('evoMed611').'_'.$this->input->post('evoMed612').'_'.$this->input->post('evoMed613').'_'.$this->input->post('evoMed614').'_'.$this->input->post('evoMed615').'_'.$this->input->post('evoMed616');
        //$this->evoluciones_model->evoMed7           = $this->input->post('evoMed70').'_'.$this->input->post('evoMed71').'_'.$this->input->post('evoMed72').'_'.$this->input->post('evoMed73').'_'.$this->input->post('evoMed74').'_'.$this->input->post('evoMed75').'_'.$this->input->post('evoMed76').'_'.$this->input->post('evoMed77').'_'.$this->input->post('evoMed78').'_'.$this->input->post('evoMed79').'_'.$this->input->post('evoMed710').'_'.$this->input->post('evoMed711').'_'.$this->input->post('evoMed712').'_'.$this->input->post('evoMed713').'_'.$this->input->post('evoMed714').'_'.$this->input->post('evoMed715').'_'.$this->input->post('evoMed716');
        //$this->evoluciones_model->evoMed8           = $this->input->post('evoMed80').'_'.$this->input->post('evoMed81').'_'.$this->input->post('evoMed82').'_'.$this->input->post('evoMed83').'_'.$this->input->post('evoMed84').'_'.$this->input->post('evoMed85').'_'.$this->input->post('evoMed86').'_'.$this->input->post('evoMed87').'_'.$this->input->post('evoMed88').'_'.$this->input->post('evoMed89').'_'.$this->input->post('evoMed810').'_'.$this->input->post('evoMed811').'_'.$this->input->post('evoMed812').'_'.$this->input->post('evoMed813').'_'.$this->input->post('evoMed814').'_'.$this->input->post('evoMed815').'_'.$this->input->post('evoMed816');
        //$this->evoluciones_model->evoMed9           = $this->input->post('evoMed90').'_'.$this->input->post('evoMed91').'_'.$this->input->post('evoMed92').'_'.$this->input->post('evoMed93').'_'.$this->input->post('evoMed94').'_'.$this->input->post('evoMed95').'_'.$this->input->post('evoMed96').'_'.$this->input->post('evoMed97').'_'.$this->input->post('evoMed98').'_'.$this->input->post('evoMed99').'_'.$this->input->post('evoMed910').'_'.$this->input->post('evoMed911').'_'.$this->input->post('evoMed912').'_'.$this->input->post('evoMed913').'_'.$this->input->post('evoMed914').'_'.$this->input->post('evoMed915').'_'.$this->input->post('evoMed916');
        //
        $this->evoluciones_model->evoPlan            = $evoPlan;
        $this->evoluciones_model->evoExamenes = $evoExamenes;
        $this->evoluciones_model->evoAvisar          = $evoAvisar;
        $this->evoluciones_model->evoDia               = $evoDia;
        $this->evoluciones_model->evoNoche         = $evoNoche;
        $this->evoluciones_model->guardar();
                 echo json_encode('OK');
    }


	


}