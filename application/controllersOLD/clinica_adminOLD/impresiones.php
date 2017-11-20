<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Impresiones extends CI_Controller {
    
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
        $this->load->model("isapres_model");
        $this->load->model("bancos_model");
        $this->load->model("ingreso_model");
        $this->load->model("licencias_model");
        $this->load->model("parametros_model");
        $this->load->model("enfermeria_model");
        //$tiempo = $this->parametros_model->dameValor('TIEMPO_SESSION');
	//Session_Helper::session($tiempo);	
    }
    public function cargarImprimir($id)
    {
        $data['datos']      = $this->ingreso_model->dameUno($id);
        IF($data['datos']->fechaNacimiento !== '0000-00-00')$edad = $this->calculaedad($data['datos']->fechaNacimiento);
        ELSE $edad = '-';
        $data['edad']       = $edad;
        $data['breadcumb']  = "Registros";
        $data['title']      = "Imprimir Formularios";
        Layout_Helper::cargaVista($this,'imprimirTodo',$data,'ingresos');   
        
    }
    public function imprimirImprimir()
    {
        IF(empty($id)){
            $id = $this->input->post('fichaElectro');
            $opciones[10]= $this->input->post('formTec');
        }
        ELSE $opciones[10]= 'on';
        
        $id = $this->input->post('fichaElectro');
        
        ////INICIO FORMULARIO PACIENTE APODERADO
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
        
        
        ////FIN FORMULARIO PACIENTE APODERADO
        
            $dep = $this->bancos_model->dameTodosDeposito($id);
            IF(!empty($dep)){
            $data['depositos']   = $dep;
            $opciones[2]= $this->input->post('formDeposito');
            }
            ELSE $opciones[2]= 'off';
              
        
        
///TENGO QUE BUSCAR EL ULTIMO DEPOSITO        
        $data['deposito']   = $this->bancos_model->dameUltimoDeposito($id);
        
        
        $opciones[0]= $this->input->post('formUrgencias');
        $opciones[1]= $this->input->post('formPacApo');
        $opciones[3]= $this->input->post('formAutorizacionCetep');
        $opciones[4]= $this->input->post('formAutorizacionCetepUsuarioBeneficiario');
        $opciones[5]= $this->input->post('formCuidador');
        $opciones[6]= $this->input->post('formConsentimiento');
        IF($this->input->post('formEnfermeria') === 'on'){
            $data['enfermeria'] = $this->enfermeria_model->dameUno($id);
        }
        $opciones[7]= $this->input->post('formEnfermeria');
        $opciones[8]= $this->input->post('formEstadistico');
        $opciones[9]= $this->input->post('formVisita');
        $opciones[13]= $this->input->post('formExamenes');
        $data['opciones']   = $opciones;
        $data['regimen']    = $this->pacientes_model->dameRegimen();
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Ficha de Ingreso";
        Layout_Helper::cargaVista($this,'imprimirImprimir',$data,'ingresos');   
        
        
    }
    
    public function imprimirImprimirTEC($id='')
    {
        $this->load->model("tecs_model");
        IF(empty($id)){
            $id = $this->input->post('fichaElectro');
            $opciones[10]= $this->input->post('formTec');
        }
        ELSE $opciones[10]= 'on';
            
        
        ////INICIO FORMULARIO PACIENTE APODERADO
        $datos              = $this->tecs_model->dameUno($id);
        $data['datos']      = $datos;
        $data['datosApo']   = $this->apoderados_model->dameUnoPorFichaTEC($id);
        $data['edad']       = $this->calculaedad($datos->fechaNacimiento);
        $fechaIng           = $datos->tecFechaIngreso.' 00:00:00';
        
        IF(!empty($fechaIng)){
            $fechaIng         = strtotime ( $fechaIng ) ;
            $mes = date ( 'm' , $fechaIng );if($mes==='10')$mes='Octubre';elseif($mes==='11')$mes='Noviembre';elseif($mes==='12')$mes='Diciembre';elseif($mes==='01')$mes='Enero';elseif($mes==='02')$mes='Febrero';elseif($mes==='03')$mes='Marzo';elseif($mes==='04')$mes='Abril';elseif($mes==='05')$mes='Mayo';elseif($mes==='06')$mes='Junio';elseif($mes==='07')$mes='Julio';elseif($mes==='08')$mes='Agosto';elseif($mes==='09')$mes='Septiembre';
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
        
        $opciones[2]= '';
        $opciones[0]= '';
        $opciones[1]= '';
        $opciones[3]= '';
        $opciones[4]= '';
        $opciones[5]= '';
        $opciones[6]= '';
        $opciones[7]= '';
        $opciones[8]= '';
        $opciones[9]= '';
        
        $data['opciones']   = $opciones;
        
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "T.E.C";
        Layout_Helper::cargaVista($this,'imprimirImprimir',$data,'ingresos');   
        
        
    }
    function calculaedad($fecha){
        $date2  = date('Y-m-d');//
        $diff   = abs(strtotime($date2) - strtotime($fecha));
        $years  = floor($diff / (365*60*60*24));
        //$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        //$days   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        return $years;
    }
    public function imprimirRendicion($renId)
    {
        
        $data['fechaDesde'] = date('Y-m-d');
        $data['fechaHasta'] = date('Y-m-d');
        $data['fechaRendicion'] = date('Y-m-d');
        
        $data['title']      = "Rendición";
        $data['datos']      = $this->bancos_model->dameDatosRenId($renId);
        Layout_Helper::cargaVista($this,'imprimirRendicion',$data,'ingresos');   
    }
    public function exportarRendicion($renId)
    {
        
        $data['fechaDesde'] = date('Y-m-d');
        $data['fechaHasta'] = date('Y-m-d');
        $data['fechaRendicion'] = date('Y-m-d');
        
        $data['title']      = "Rendición";
        $data['datos']      = $this->bancos_model->dameDatosRenId($renId);
        Layout_Helper::cargaVista($this,'exportarRendicion',$data,'ingresos');   
    }
    public function imprimirImprimirEnfermeria()
    {
        $opciones[10]= '';
        $opciones[9]= '';
        $id = $this->input->post('fichaElectro');
        
        ////INICIO FORMULARIO PACIENTE APODERADO
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
        
        
        ////FIN FORMULARIO PACIENTE APODERADO
        
///TENGO QUE BUSCAR EL ULTIMO DEPOSITO       
        
            $dep = $this->bancos_model->dameTodosDeposito($id);
            IF(!empty($dep)){
            $data['depositos']   = $dep;
            //$opciones[2]= $this->input->post('formDeposito');
            }
            //ELSE $opciones[2]= 'off';
        
        $opciones[2]= $this->input->post('formDeposito');
        $opciones[0]= $this->input->post('formUrgencias');
        $opciones[1]= $this->input->post('formPacApo');
        $opciones[3]= $this->input->post('formAutorizacionCetep');
        $opciones[4]= $this->input->post('formAutorizacionCetepUsuarioBeneficiario');
        $opciones[5]= $this->input->post('formCuidador');
        $opciones[6]= $this->input->post('formConsentimiento');
        IF($this->input->post('formEnfermeria') === 'on'){
            $data['enfermeria'] = $this->enfermeria_model->dameUno($id);
        }
        IF($this->input->post('formInsumos') === 'on'){
            $data['insumosAsignados'] = $this->enfermeria_model->dameInsumosAsignados($id);
        }
        $opciones[11]= $this->input->post('formInsumos');
        $opciones[7]= $this->input->post('formEnfermeria');
        $opciones[8]= $this->input->post('formEstadistico');
        $data['opciones']   = $opciones;
        $data['imprimir']   = 'imprimir';
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Ficha de Ingreso";
        $data['regimen']    = $this->pacientes_model->dameRegimen();
        Layout_Helper::cargaVista($this,'imprimirImprimir',$data,'ingresos');   
        
        
    }
}
