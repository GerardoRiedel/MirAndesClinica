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
        $this->load->model("hd_model");
        $this->load->model("hd_historico_model");
        $this->load->model("licencias_model");
        $this->load->model("parametros_model");
        $this->load->model("enfermeria_model");
        $this->load->model("prefacturas_model");
        //$tiempo = $this->parametros_model->dameValor('TIEMPO_SESSION');
	//Session_Helper::session($tiempo);	
    }
    public function cargarImprimir($id)
    {
        $data['datos']      = $this->hd_model->dameUno($id);
        IF($data['datos']->fechaNacimiento !== '0000-00-00')$edad = $this->calculaedad($data['datos']->fechaNacimiento);
        ELSE $edad = '-';
        $data['edad']       = $edad;
        $data['breadcumb']  = "Registros";
        $data['title']      = "Imprimir Formularios";
        Layout_Helper::cargaVista($this,'imprimirTodo',$data,'hd');   
        
    }
    
    public function imprimirImprimir($sol='')
    {
        IF(!empty($sol)){
            $opciones[4]='on';
            $dato   = $this->hd_model->dameUnaSolicitud($sol);
            $id     = $dato->solRegistro;
            $data['datosSol'] = $dato;
        }
        ELSE {
            $opciones[4]='off';
            $id = $this->input->post('fichaElectro');
        }
        
        ////INICIO FORMULARIO PACIENTE APODERADO
        $datos              = $this->hd_model->dameUno($id);
        
       //die(var_dump($datos)); 
        $data['datos']      = $datos;
        $data['datosApo']   = $this->apoderados_model->dameUnoPorFichaHd($id);
       // 
        $data['devolucion'] = $this->bancos_model->dameUnoHD($id);
  //
       // $fechaIng           = $datos->fechaIngreso.' '.$datos->horaIngreso;
       // 
       // 
       // IF(!empty($fechaIng)){
       //     $fechaIng         = strtotime ( $fechaIng ) ;
       //     $mes = date ( 'm' , $fechaIng );if($mes==='10')$mes='Octubre';elseif($mes==='11')$mes='Noviembre';elseif($mes==='12')$mes='Diciembre';elseif($mes==='01')$mes='Enero';elseif($mes==='02')$mes='Febrero';elseif($mes==='03')$mes='Marzo';elseif($mes==='04')$mes='Abril';elseif($mes==='05')$mes='Mayo';elseif($mes==='06')$mes='Junio';elseif($mes==='07')$mes='Julio';elseif($mes==='08')$mes='Agosto';elseif($mes==='09')$mes='Septiembre';
       //     $sem = date ( 'D' , $fechaIng );if($sem==='Mon')$sem='Lunes';elseif($sem==='Tue')$sem='Martes';elseif($sem==='Wed')$sem='Miercoles';elseif($sem==='Thu')$sem='Jueves';elseif($sem==='Fri')$sem='Viernes';elseif($sem==='Sat')$sem='Sabado';elseif($sem==='Sun')$sem='Domingo';
       //     $dia        = date ( 'd' , $fechaIng );
       //     $ano        = date ( 'Y' , $fechaIng );
       //     $hr         = date ( 'H:s' , $fechaIng );
       //     $fechaIng   = $sem.', '.$dia.' de '.$mes.' de '.$ano.', '.$hr.' hrs';
       // }
       // ELSE {
       //     $fechaIng='..............';
       // }
       // 
        $data['depositos']   = $this->bancos_model->dameTodosDepositoHD($id);
        $data['ingresos']   = $this->hd_model->dameUnoIngreso($id);
        
        IF($this->input->post('formLicencia')==='on'){
            $data['datoslic']   = $this->hd_model->dameTodoHD($datos->paciente);
        }
        $licencias = $this->licencias_model->dameLicenciasHD($datos->paciente);
        $data['licencias']  = $licencias;
       // 
        //$data['fecha']   = $fechaIng;
        //$data['licencia']   = $nuevafecha;
        //die($this->input->post('formIngresoHD'));
        $opciones[0]= $this->input->post('formIngresoHD');
        $opciones[1]= $this->input->post('formRecordatorio');
        $opciones[3]= $this->input->post('formLicencia');
        $opciones[5]= $this->input->post('formRecetas');
        $opciones[6]= $this->input->post('formMedicamentos');
        $opciones[7]= $this->input->post('formSolicitudesBlanco');
        $opciones[8]= $this->input->post('formDeposito');
        $opciones[10] = $this->input->post('formIngresoEnfermeria');
        $opciones[11] = $this->input->post('formPrefactura');
        $opciones[13] = $this->input->post('formIngresoTO');
        
        IF($this->input->post('formSignos')==='on')
        {
            $opciones[0] = $opciones[1] = $opciones[3] = $opciones[5] = $opciones[6] = $opciones[7] = $opciones[8] = $opciones[10] = $opciones[11] =$opciones[13] = 'off';
            $data['signos'] = $this->hd_model->dameSignosId($id);
        }
        $opciones[2] = $this->input->post('formSignos');
        IF($this->input->post('formPrefactura')==='on')
        {
            $opciones[0] = $opciones[1] = $opciones[2] = $opciones[3] = $opciones[5] = $opciones[6] = $opciones[7] = $opciones[8] = $opciones[10] =$opciones[13] = 'off';
        }
        
        $opciones[9] = $opciones[12] = $opciones[14] = 'off'; //IMPRIMIR FILA 
        $data['enfermeria'] = $this->enfermeria_model->dameUnoHD($id);
        $data['registro']   = $this->hd_model->dameSignosFilaCero($id);
        $data['opciones']   = $opciones;
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Ficha de Ingreso";
        Layout_Helper::cargaVista($this,'imprimirImprimir',$data,'hd');   
        
        
    }
    public function imprimirFila($sig)
    {
        
            $opciones[9]='on';
            $dato   = $this->hd_model->dameSignosFila($sig);
            $id     = $dato->sigRegistro;
            $data['fila'] = $dato;
        
            
            //$id = $this->input->post('fichaElectro');
        
        
        ////INICIO FORMULARIO PACIENTE APODERADO
        $datos              = $this->hd_model->dameUno($id);
       // 
        $data['datos']      = $datos;
        $data['datosApo']   = $this->apoderados_model->dameUnoPorFichaHd($id);
       
        $opciones[12] = $opciones[11] = $opciones[10] = $opciones[0] = $opciones[2] = $opciones[4] = $opciones[1] = $opciones[3] = $opciones[5] = $opciones[6] = $opciones[7] = $opciones[8] = 'off';
        $data['signos'] = $this->hd_model->dameSignosId($id);
        
        

        $data['opciones']   = $opciones;
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Ficha de Ingreso";
        Layout_Helper::cargaVista($this,'imprimirImprimir',$data,'hd');   
        
        
    }
    public function imprimirPrefactura($id)
    {
        
        $opciones[11]='on';
        $opciones[0] = $opciones[1] = $opciones[2] = $opciones[3 ]= $opciones[4] = $opciones[5] = $opciones[6] = $opciones[7] = $opciones[8] = $opciones[9] = $opciones[10] = $opciones[12] =$opciones[13] = 'off';
        
        $id                 = $this->prefacturas_model->dameUnaPref($id);
        $datos              = $this->hd_model->dameUno($id[0]->preRegistro);
        $data['pref']       = $id;
        $data['datos']      = $datos;
        $data['datosApo']   = $this->apoderados_model->dameUnoPorFichaHd($id[0]->preRegistro);

        $data['opciones']   = $opciones;
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Ficha de Ingreso";
        Layout_Helper::cargaVista($this,'imprimirImprimir',$data,'hd');   
        
        
    }
    public function imprimirEvaluacion($id)
    {
        
        $opciones[12]='on';
        $opciones[0] = $opciones[1] = $opciones[2] = $opciones[3 ]= $opciones[4] = $opciones[5] = $opciones[6] = $opciones[7] = $opciones[8] = $opciones[9] = $opciones[10] = $opciones[11] = $opciones[13] = $opciones[14] = 'off';
        
        $id                 = $this->hd_model->dameUnaEvaluacion($id);
        $datos              = $this->hd_model->dameUno($id->evaRegistro);
        $data['evaluacion'] = $id;
        $data['datos']      = $datos;
        $data['datosApo']   = $this->apoderados_model->dameUnoPorFichaHd($id->evaRegistro);

        $data['opciones']   = $opciones;
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Ficha de Ingreso";
        Layout_Helper::cargaVista($this,'imprimirImprimir',$data,'hd');   
        
        
    }
    
    function calculaedad($fecha){
        $date2  = date('Y-m-d');//
        $diff   = abs(strtotime($date2) - strtotime($fecha));
        $years  = floor($diff / (365*60*60*24));
        //$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        //$days   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        return $years;
    }
    
     public function imprimirHistorico($paciente)
    {
        $opciones[14]='on';
        $opciones[12]='off';
        $opciones[0] = $opciones[1] = $opciones[2] = $opciones[3 ]= $opciones[4] = $opciones[5] = $opciones[6] = $opciones[7] = $opciones[8] = $opciones[9] = $opciones[10] = $opciones[11] = $opciones[13] = 'off';
        
        $data['historico'] =   $this->hd_historico_model->dameHistorico($paciente);
        $id = $this->hd_model->dameIdFicha($paciente);
        $datos          = $this->hd_model->dameUno($id->id);
        
        $data['datos']      = $datos;
        //$data['datosApo']   = $this->apoderados_model->dameUnoPorFichaHd($id->evaRegistro);

        $data['opciones']   = $opciones;
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Ficha de Ingreso";
        Layout_Helper::cargaVista($this,'imprimirImprimir',$data,'hd');   
        
        
    }
    public function imprimirRendicion($renId)
    {
        
        $data['fechaDesde'] = date('Y-m-d');
        $data['fechaHasta'] = date('Y-m-d');
        $data['fechaRendicion'] = date('Y-m-d');
        
        $data['title']      = "Rendición";
        $data['datos']      = $this->bancos_model->dameDatosRenIdHD($renId);
        Layout_Helper::cargaVista($this,'imprimirRendicion',$data,'hd');   
    }
    public function exportarRendicion($renId)
    {
        
        $data['fechaDesde'] = date('Y-m-d');
        $data['fechaHasta'] = date('Y-m-d');
        $data['fechaRendicion'] = date('Y-m-d');
        
        $data['title']      = "Rendición";
        $data['datos']      = $this->bancos_model->dameDatosRenIdHD($renId);
        Layout_Helper::cargaVista($this,'exportarRendicion',$data,'hd');   
    }
    
    
}
