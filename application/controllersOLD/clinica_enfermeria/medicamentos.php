<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Medicamentos extends CI_Controller {
    
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
    }
    public function cargarMedicamentoAsignar($id)
    {
        $data['farmacos']   = $this->evoluciones_model->dameFarmacos();
        $data['vias']       = $this->evoluciones_model->dameVias();
        $data['datos']      = $this->ingreso_model->dameUno($id);
        
        $data['medicamento']= $this->enfermeria_model->dameTodosAdmin($id);
        $data['breadcumb']  = "Registros";
        $data['title']      = "Lista de Medicamentos";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarMedicamento',$data,'clinica');   
    }
    public function administrar_medicamento($id)
    {
        $id        = explode('_', $id);
        $medAmdId    = $id[0];
        $medRegistro = $id[1];
        $estado = $this->enfermeria_model->dameUnoAdmin($medAmdId);
        $estado = $estado->medAdmEstado;
        //die(var_dump($estado));
        IF($estado === '0') {$this->enfermeria_model->medAdmEstado = 1;}
        ELSEIF ($estado === '1') {$this->enfermeria_model->medAdmEstado = 2;}
        ELSEIF ($estado === '2') {$this->enfermeria_model->medAdmEstado = 3;}
        ELSEIF ($estado === '3') {$this->enfermeria_model->medAdmEstado = 4;}
        ELSEIF ($estado === '4') {$this->enfermeria_model->medAdmEstado = 1;}
        
        $this->enfermeria_model->medAdmId = $medAmdId;
        $this->enfermeria_model->medAdmUsuario = $this->session->userdata('id_usuario');
        $this->enfermeria_model->medAdmFechaAdministracion = date('Y-m-d H:i:s');
        $this->enfermeria_model->guardarMedicamentoAdministrado();
        redirect(base_url().'clinica_enfermeria/medicamentos/cargarMedicamentoAsignar/'.$medRegistro);
    }
    public function suspender_medicamento($id)
    {
        $id             = explode('_', $id);
        $medRegistro    = $id[0];
        $medFarmaco     = $id[1];
        $datos = $this->enfermeria_model->dameTodosSuspender($medRegistro,$medFarmaco);
        FOREACH($datos as $dat){
            $this->enfermeria_model->medAdmEstado = 5;
            $this->enfermeria_model->medAdmId = $dat->medAdmId;
            $this->enfermeria_model->medAdmUsuarioSuspencion = $this->session->userdata('id_usuario');;
            $this->enfermeria_model->medAdmFechaSuspencion = date('Y-m-d H:i:s');
            $this->enfermeria_model->guardarMedicamentoAdministrado();
        }
        redirect(base_url().'clinica_enfermeria/medicamentos/cargarMedicamentoAsignar/'.$medRegistro);
    }
    
    public function guardarMedicamentoAsignar()
    {
        $registro   = $this->input->post('fichaElectro');
        $periodo    = $this->input->post('periodo');
        $via        = $this->input->post('via');
        $fechaDesde = date('Y-m-d H:i:s');
        $fechaHasta = new DateTime($this->input->post('fechaHasta'));
        $fechaHasta = $fechaHasta->format('Y-m-d');
        $fechaHasta = $fechaHasta.' '.date('H:i:s');
        $this->enfermeria_model->medRegistro    = $registro;
        $this->enfermeria_model->medUsuario     = $this->session->userdata('id_usuario');
        $this->enfermeria_model->medFarmaco     = $this->input->post('farmaco');
        $this->enfermeria_model->medDesde       = $fechaDesde;
        $this->enfermeria_model->medHasta       = $fechaHasta;
        $this->enfermeria_model->medHora        = $periodo;
        $this->enfermeria_model->guardarMedicamentoAsignar();
        
        unset($this->enfermeria_model->medRegistro,$this->enfermeria_model->medUsuario,$this->enfermeria_model->medFarmaco,$this->enfermeria_model->medDesde,$this->enfermeria_model->medHasta,$this->enfermeria_model->medHora);
        
        $resp = $this->enfermeria_model->dameUltimoMedicamento();
        $fecha = $fechaDesde;
        
        WHILE($fecha <= $fechaHasta){
            $this->enfermeria_model->medAdmMedicamento  = $resp->medId;
            $this->enfermeria_model->medAdmHora         = $fecha;
            $this->enfermeria_model->medAdmRegistro     = $registro;
            $this->enfermeria_model->medAdmVia          = $via;
            IF($fecha <= $fechaHasta)$this->enfermeria_model->guardarMedicamentoAdministrado();
            $fecha = strtotime ( '+'.$periodo.' hours' , strtotime ( $fecha ) ) ;
            $fecha = date ( 'Y-m-d H:00:00' , $fecha );
            
        }
        
       unset($this->enfermeria_model->medAdmMedicamento, $this->enfermeria_model->medAdmHora, $this->enfermeria_model->medAdmRegistro, $this->enfermeria_model->medAdmVia );
        $this->enfermeria_model->inaRegistro        = $registro;
        $this->enfermeria_model->inaFechaRegistro   = date('Y-m-d H:i:s');
        $this->enfermeria_model->inaUsuario         = $this->session->userdata('id_usuario');
        $this->enfermeria_model->inaCantidad = 1;
        $this->enfermeria_model->inaInsumo  = $this->input->post('farmaco');
        $this->enfermeria_model->inaTipo    = 2;
        $this->enfermeria_model->guardarInsumosAsignados();
            
            
            
        
        $data['farmacos']   = $this->evoluciones_model->dameFarmacos();
        $data['datos']      = $this->ingreso_model->dameUno($registro);
        $data['medicamento']= $this->enfermeria_model->dameTodosAdmin($registro);
        $data['breadcumb']  = "Registros";
        $data['title']      = "Lista de Medicamentos";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        $data['vias']       = $this->evoluciones_model->dameVias();
        Layout_Helper::cargaVista($this,'cargarMedicamento',$data,'clinica');   
    }
    
    public function administrar_medicamento_porVencer()
    {
        $data['medicamento']= $this->enfermeria_model->dame_medicamento_porVencer();
        
        $data['breadcumb']  = "Registros";
        $data['title']      = "Lista de Medicamentos";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'listarMedicamentoPorVencer',$data,'clinica');   
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
        
        $data['insumosAsignados'] = $this->enfermeria_model->dameInsumosAsignados($id);
        $data['breadcumb']  = "Registros";
        $data['title']      = "Lista de Insumos";
        $data['menu']       = "ingreso";
        $data['submenu']    = "lingreso";
        Layout_Helper::cargaVista($this,'cargarInsumos',$data,'clinica');   
    }
    public function guardarInsumos()
    {
        $id = $this->input->post('registro');
        $this->enfermeria_model->inaRegistro        = $id;
        $this->enfermeria_model->inaFechaRegistro   = date('Y-m-d H:i:s');
        $this->enfermeria_model->inaUsuario         = $this->session->userdata('id_usuario');
        
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
        
        
        $nombre = $this->input->post('otroNombre');
        $tipo   = $this->input->post('otroTipo');
        $cantidad = $this->input->post('otroCantidad');
        
        
        IF(!empty($nombre) && $tipo!=='0' && !empty($cantidad)){
            
            IF($tipo==='1'){
                $existe = $this->parametros_model->dameNombreFarmaco($nombre);
                IF(empty($existe)){
                $this->parametros_model->descripcion    = $nombre;
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
                $this->parametros_model->exaEstado  = 1;
                $this->parametros_model->exaUsuario = $this->session->userdata('id_usuario');
                $this->parametros_model->guardarExamen();
                
                $ultimo = $this->parametros_model->dameUltimoExamen();
                $this->enfermeria_model->inaInsumo   = $ultimo->exaId;
                }
            }
            
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
             
        redirect(base_url().'clinica_enfermeria/medicamentos/cargarInsumos/'.$id);
        
    }
    public function eliminarInsumo($id)
    {
        $id = explode('_', $id);
        $this->enfermeria_model->inaId              = $id[1];
        $this->enfermeria_model->inaFechaRegistro   = date('Y-m-d H:i:s');
        $this->enfermeria_model->inaUsuario         = $this->session->userdata('id_usuario');
        $this->enfermeria_model->inaEstado          = 2;
        $this->enfermeria_model->guardarInsumosAsignados();
        redirect(base_url().'clinica_enfermeria/medicamentos/cargarInsumos/'.$id[0].'_NO');
    }
    
   
}