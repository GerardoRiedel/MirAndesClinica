<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devoluciones extends CI_Controller {
    
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
        $this->load->model("hd_model");
         
        $this->load->model("parametros_model");
        $this->load->model("listaDeposito_model");
        //$tiempo = $this->parametros_model->dameValor('TIEMPO_SESSION');
	//Session_Helper::session($tiempo);	
    }
    public function utilizarMismoDeposito($datos)
    {
        $datos = explode('_', $datos);
        $idDep      = $datos[1];
        $fichaNueva = $datos[0];
        $fichaVieja = $datos[2];
        
        $this->bancos_model->depFichaElectro = $fichaNueva;
        $this->bancos_model->depFichaElectroOld = $fichaVieja;
        $this->bancos_model->depId = $idDep;
        $this->bancos_model->guardarDeposito();
        unset($this->bancos_model->depId,$this->bancos_model->depFichaElectroOld,$this->bancos_model->depFichaElectro);
        
        $apoEco = $this->apoderados_model->dameUnoPorFichaEco($fichaVieja);
        $this->apoderados_model->apoNombre      = $apoEco->apoNombre;
        $this->apoderados_model->apoApePat      = $apoEco->apoApePat;
        $this->apoderados_model->apoApeMat      = $apoEco->apoApeMat;
        $this->apoderados_model->apoTelefono    = $apoEco->apoTelefono;
        $this->apoderados_model->apoCelular     = $apoEco->apoCelular;
        $this->apoderados_model->apoEmail       = $apoEco->apoEmail;
        $this->apoderados_model->apoDireccion   = $apoEco->apoDireccion;
        $this->apoderados_model->apoComuna      = $apoEco->apoComuna;
        $this->apoderados_model->apoRut         = $apoEco->apoRut;
        $this->apoderados_model->apoParentesco  = $apoEco->apoParentesco;
        $this->apoderados_model->apoTipo        = 2;
        $this->apoderados_model->apoFichaElectronica = $fichaNueva;
        $this->apoderados_model->guardar();


        $bancos = $this->bancos_model->dameUno($fichaVieja);
        
        $this->bancos_model->ctaPaciente     = $bancos->ctaPaciente;
        $this->bancos_model->ctaBanco        = $bancos->ctaBanco;
        $this->bancos_model->ctaTipo         = $bancos->ctaTipo;
        $this->bancos_model->ctaNumero       = $bancos->ctaNumero;
        $this->bancos_model->ctaRut          = $bancos->ctaRut;
        $this->bancos_model->ctaRutPaciente  = $bancos->ctaRutPaciente;
        $this->bancos_model->ctaNomPaciente  = $bancos->ctaNomPaciente;
        $this->bancos_model->ctaEmail        = $bancos->ctaEmail;
        $this->bancos_model->ctaNombre       = $bancos->ctaNombre;
        $this->bancos_model->ctaApellido     = $bancos->ctaApellido;
        $this->bancos_model->ctaApellidoM    = $bancos->ctaApellidoM;
        $this->bancos_model->ctaGes          = $bancos->ctaGes;
        $this->bancos_model->ctaRegistro     = $fichaNueva;
        $this->bancos_model->ctaFicha        = $bancos->ctaFicha;
        $this->bancos_model->guardarCta();
            
            
        redirect(base_url().'clinica_admision/ingresos/listarIngreso/');
        
    }
    public function listarDevolucion()
    {
        $this->load->model('listaDeposito_model');
        $this->listaDeposito_model->lisDepUsuario  = $this->session->userdata('id_usuario');
        $this->listaDeposito_model->eliminarUser();
        
        $limpiar = '';
        $limpiar = $this->bancos_model->dameCtasLimpiar();
        IF(!empty($limpiar)){
            foreach ($limpiar as $lim){
                $this->bancos_model->depRendicion   = 0;
                $this->bancos_model->depId          = $lim->depId;
                $this->bancos_model->guardarDeposito();
            }
            unset($this->bancos_model->depId,$this->bancos_model->depRendicion); 
        }
         
        $data['fechaDesde'] = '09-11-2016';
        $data['fechaHasta'] = date('Y-m-d');
        $data['fechaRendicion'] = date('Y-m-d');
        $datos              = $this->bancos_model->dameCtas();
        $rendicion          = $this->bancos_model->dameUltimaRendicion();
        IF(!empty($datos)){
            foreach ($datos as $dat){
                $this->bancos_model->depRendicion   = $rendicion;
                $this->bancos_model->depId          = $dat->depId;
                $this->bancos_model->guardarDeposito();
            }
            unset($this->bancos_model->depId,$this->bancos_model->depRendicion);
        }
        $data['porvencer'] = 'NO';
        $data['datos']      = $datos;
        $data['rendicion']  = $rendicion;
        $data['breadcumb']  = "Registros";
        $data['menu']       = "depositos";
        $data['submenu']    = "ldeposito";
        $data['title']      = "Listado de Depositos Registrados sin rendir";
        Layout_Helper::cargaVista($this,'listar_devoluciones',$data,'ingresos');   
    }
    public function FiltroListarDevolucion()
    {
        $limpiar = '';
        $limpiar = $this->bancos_model->dameCtasLimpiar();
        IF(!empty($limpiar)){
            foreach ($limpiar as $lim){
                $this->bancos_model->depRendicion   = 0;
                $this->bancos_model->depId          = $lim->depId;
                $this->bancos_model->guardarDeposito();
            }
            unset($this->bancos_model->depId,$this->bancos_model->depRendicion);  
        }
        $filtro     = $this->input->post('filtro');
        $filtro     = str_replace(array(".","-"), "", $filtro);
        $letra      = substr($filtro,0,1);if ($letra === "1" || $letra === "2"){$filtro = substr($filtro, 0, 8);}else {$filtro = substr($filtro, 0, 7);}
        $fechaDesde = $this->input->post('fechaDesde');
        $fechaHasta = $this->input->post('fechaHasta');
        
        $data['fechaDesde'] = $this->input->post('fechaDesde');
        IF(!empty($fechaHasta)) $data['fechaHasta'] = $fechaHasta;
        ELSE $data['fechaHasta'] = date('Y-m-d');
        $data['fechaRendicion'] = date('Y-m-d');
        
        $datos              = $this->bancos_model->dameCtas($filtro,$fechaDesde,$fechaHasta);
        $rendicion          = $this->bancos_model->dameUltimaRendicion();
        IF(!empty($datos)){
            foreach ($datos as $dat){
                $this->bancos_model->depRendicion   = $rendicion;
                $this->bancos_model->depId          = $dat->depId;
                $this->bancos_model->guardarDeposito();
            }
            unset($this->bancos_model->depId,$this->bancos_model->depRendicion);  
        }
        $data['porvencer'] = 'NO';
        $data['fechaDesdeP'] = $fechaDesde;
        $data['fechaHastaP'] = $fechaHasta;
        $data['datos']      = $datos;
        $data['rendicion']  = $rendicion;
        $data['breadcumb']  = "Registros";
        
        $data['menu']       = "depositos";
        $data['submenu']    = "ldeposito";
        $data['title']      = "Listado de Depositos Registrados sin rendir";
        Layout_Helper::cargaVista($this,'listar_devoluciones',$data,'ingresos');   
        //Layout_Helper::cargaVista($this,'../ingresos/listar_devoluciones',$data,'ingresos');   
    }
    public function CarroListarDevolucion()
    {
        $usuario = $this->session->userdata('id_usuario');
        $carro = $this->listaDeposito_model->dameUnoUsuario($usuario);
        
        
        $limpiar = '';
        $limpiar = $this->bancos_model->dameCtasLimpiar();
        IF(!empty($limpiar)){
            foreach ($limpiar as $lim){
                $this->bancos_model->depRendicion   = 0;
                $this->bancos_model->depId          = $lim->depId;
                $this->bancos_model->guardarDeposito();
            }
            unset($this->bancos_model->depId,$this->bancos_model->depRendicion);  
        }
        $filtro     = $this->input->post('filtro');
        $filtro     = str_replace(array(".","-"), "", $filtro);
        $letra      = substr($filtro,0,1);if ($letra === "1" || $letra === "2"){$filtro = substr($filtro, 0, 8);}else {$filtro = substr($filtro, 0, 7);}
        $fechaDesde = $this->input->post('fechaDesdeP');
        $fechaHasta = $this->input->post('fechaHastaP');
        
        $data['fechaDesde'] = $this->input->post('fechaDesde');
        IF(!empty($fechaHasta)) $data['fechaHasta'] = $fechaHasta;
        ELSE $data['fechaHasta'] = date('Y-m-d');
        $data['fechaRendicion'] = date('Y-m-d');
        
        $datos              = $this->bancos_model->dameCtas($filtro,$fechaDesde,$fechaHasta);
        $rendicion          = $this->bancos_model->dameUltimaRendicion();
        IF(!empty($carro)){
            foreach ($carro as $car){
                $this->bancos_model->depRendicion   = $rendicion;
                $this->bancos_model->depId          = $car->depId;
                $this->bancos_model->guardarDeposito();
            }
            unset($this->bancos_model->depId,$this->bancos_model->depRendicion);  
        }
        ELSEIF(!empty($datos)){
            foreach ($datos as $dat){
                $this->bancos_model->depRendicion   = $rendicion;
                $this->bancos_model->depId          = $dat->depId;
                $this->bancos_model->guardarDeposito();
            }
            unset($this->bancos_model->depId,$this->bancos_model->depRendicion);  
        }
        $data['porvencer'] = 'NO';
        $data['fechaDesdeP'] = $this->input->post('fechaDesdeP');
        $data['fechaHastaP'] = $this->input->post('fechaHastaP');
        $data['carroPrint'] = '1';
        $data['carro']      = $carro;
        $data['datos']      = $datos;
        $data['rendicion']  = $rendicion;
        $data['breadcumb']  = "Registros";
        $data['title']      = "Listado de Depositos Registrados sin rendir";
        
        $data['menu']       = "depositos";
        $data['submenu']    = "ldeposito";
        Layout_Helper::cargaVista($this,'listar_devoluciones',$data,'ingresos');   
        //Layout_Helper::cargaVista($this,'../ingresos/listar_devoluciones',$data,'ingresos');   
    }
    public function listarRendicion()
    {
        $data['fechaDesde'] = '09-11-2016';
        $data['fechaHasta'] = date('d-m-Y');
        $data['fechaRendicion'] = date('d-m-Y');
        
        $data['data']       = $this->bancos_model->dameRendiciones($filtro='',$fechaDesde='',$fechaHasta='');
        $data['datos']      = $this->bancos_model->dameRendicionesImprimir();
        $data['porvencer'] = 'NO';
        $data['breadcumb']  = "Registros";
        $data['title']      = "Listado de Rendiciones";
        
        $data['menu']       = "depositos";
        $data['submenu']    = "rdeposito";
        Layout_Helper::cargaVista($this,'listar_rendiciones',$data,'ingresos');   
    }
    public function FiltroListarRendicion()
    {
        $filtro     = $this->input->post('filtro');
        $filtro     = str_replace(array(".","-"), "", $filtro);
        $letra      = substr($filtro,0,1);if ($letra === "1" || $letra === "2"){$filtro = substr($filtro, 0, 8);}else {$filtro = substr($filtro, 0, 7);}
        $fechaDesde = $this->input->post('fechaDesde');
        $fechaHasta = $this->input->post('fechaHasta');
        
        $data['fechaDesde'] = $this->input->post('fechaDesde');
        IF(!empty($fechaHasta)) $data['fechaHasta'] = $fechaHasta;
        ELSE $data['fechaHasta'] = date('Y-m-d');
        $data['fechaRendicion'] = date('Y-m-d');
        
        $data['data']       = $this->bancos_model->dameRendiciones($filtro,$fechaDesde,$fechaHasta);
        $data['datos']      = $this->bancos_model->dameRendicionesImprimir();
        $data['porvencer'] = 'NO';
        $data['breadcumb']  = "Registros";
        $data['title']      = "Listado de Rendiciones";
        
        $data['menu']       = "depositos";
        $data['submenu']    = "rdeposito";
        Layout_Helper::cargaVista($this,'listar_rendiciones',$data,'ingresos');   
    }
    public function guardarDevolucion()
    { 
        
        $rut        = str_replace(array(".","-"), "", $this->input->post('rut'));
        $letra      = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
        //$rutEco     = str_replace(array(".","-"), "", $this->input->post('rutApoEco'));
        //$letra      = substr($rutEco,0,1);if ($letra === '1' || $letra === '2'){$rutEco = substr($rutEco, 0, 8);}else {$rutEco = substr($rutEco, 0, 7);}
        $rutDev     = str_replace(array(".","-"), "", $this->input->post('rutDev'));
        $letra      = substr($rutDev,0,1);if ($letra === '1' || $letra === '2'){$rutDev = substr($rutDev, 0, 8);}else {$rutDev = substr($rutDev, 0, 7);}
        
    ////GUARDAR PACIENTE    
        $paciente   = $this->pacientes_model->dameUno($rut);
        $idFicha    = $this->input->post('registro');
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
            $this->bancos_model->ctaRut          = $rutDev;
            $this->bancos_model->ctaRutPaciente  = $rut;
            $this->bancos_model->ctaNomPaciente  = $paciente->apellidoPaterno.' '.$paciente->nombres;
            $this->bancos_model->ctaEmail        = $this->input->post('emailDev');
            $this->bancos_model->ctaNombre       = $this->input->post('nombresDev');
            $this->bancos_model->ctaApellido     = $this->input->post('apePatDev');
            $this->bancos_model->ctaApellidoM    = $this->input->post('apeMatDev');
            $this->bancos_model->ctaGes          = $this->input->post('ctaGes');
            $this->bancos_model->ctaRegistro     = $idFicha;
            $this->bancos_model->ctaFicha        = $ficha;
            $this->bancos_model->guardarCtaHD();
            unset($this->bancos_model->ctaGes,$this->bancos_model->ctaNomPaciente,$this->bancos_model->ctaFicha,$this->bancos_model->ctaRutPaciente,$this->bancos_model->ctaBanco,$this->bancos_model->ctaFicha,$this->bancos_model->ctaRegistro,$this->bancos_model->ctaApellidoM,$this->bancos_model->ctaApellido,$this->bancos_model->ctaNombre,$this->bancos_model->ctaEmail,$this->bancos_model->ctaRut,$this->bancos_model->ctaPaciente,$this->bancos_model->ctaId,$this->bancos_model->ctaTipo,$this->bancos_model->ctaNumero);
    ////GUARDAR DATOS DE DEPOSITO SINO ESTA SELECCIONADA LA OPCION DE DEPOSITO ANTIGUO
            $antiguo = $this->input->post('depAntiguo');
            IF($antiguo != 'on'){
                $x = $this->input->post('bancoCheque');
                if(!empty($x))$this->bancos_model->depBanco     = $this->input->post('bancoCheque');
                $xx = $this->input->post('ctacteCheque');
                if(!empty($xx))$this->bancos_model->depCuenta   = $this->input->post('ctacteCheque');
                $xxx = $this->input->post('serieCheque');
                if(!empty($xxx))$this->bancos_model->depSerie   = $this->input->post('serieCheque');
                $this->bancos_model->depPaciente                = $paciente->id;
                $this->bancos_model->depSuma                    = $this->input->post('suma');
                $this->bancos_model->depTipo                    = $this->input->post('deposito');
                $this->bancos_model->depConcepto                = $this->input->post('concepto');
                $this->bancos_model->depFichaElectro            = $idFicha;
                $this->bancos_model->depFicha                   = $ficha;
                $this->bancos_model->depFechaRegistro           = date('Y-m-d H:i:s');
                $this->bancos_model->depUsuario                 = $this->session->userdata('id_usuario');
                $depId = $this->input->post('depositoId');
                IF(!empty($depId))$this->bancos_model->depId    = $depId;
                //$apoderadoEco = $this->apoderados_model->damePorDatos($rutEco,$idFicha,2);
                //$this->bancos_model->depApoderadoEconomico      = $apoderadoEco->id;
                $this->bancos_model->guardarDepositoHD();
            }
        redirect(base_url().'hd_admision/impresiones/cargarImprimir/'.$idFicha);
    }
    public function imprimir($string)
    {
        $string = explode('_', $string);
        $id     = $string[0];
        $idCta  = $string[1];
        $data['datos']      = $this->ingreso_model->dameUno($id);
        $data['datosApo']   = $this->apoderados_model->dameUnoPorFicha($id);
        $data['devolucion'] = $this->bancos_model->dameUno($id);
        $data['deposito']   = $this->bancos_model->dameDeposito($idCta);
        $data['porvencer'] = 'NO';
        //$data['banco']      = $this->bancos_model->dameArregloDropDown('Seleccione...');
        //$data['tipoCta']    = $this->bancos_model->dameArregloDropDownTipo('Seleccione...');
        //$data['comuna']     = $this->comunas_model->dameArregloDropDown('Seleccione...');
        //$data['isapre']     = $this->isapres_model->dameArregloDropDown('Seleccione...');
        $data['breadcumb']  = "Ingreso";
        $data['title']      = "Ficha de Devolució";
        
        $data['menu']       = "depositos";
        $data['submenu']    = "ldeposito";
        Layout_Helper::cargaVista($this,'imprimir',$data,'ingresos');   
    }
    public function listarIngreso()
    {
        $data['datos']      = $this->hd_model->dameIngresosHd();
        $data['breadcumb']  = "Registros";
        $data['title']      = "Listado de Registros de Pacientes";
        
        $data['menu']       = "depositos";
        $data['submenu']    = "ndeposito";
        Layout_Helper::cargaVista($this,'listar_ingreso',$data,'hd');   
    }
    public function filtrolistarIngreso()
    {
        $filtro     = $this->input->post('filtro');
        $filtro        = str_replace(array(".","-"), "", $filtro);
        $letra      = substr($filtro,0,1);if ($letra === "1" || $letra === "2"){$filtro = substr($filtro, 0, 8);}else {$filtro = substr($filtro, 0, 7);}
        
        $data['datos']      = $this->ingreso_model->dameIngresos($filtro);
        $data['breadcumb']  = "Registros";
        $data['title']      = "Listado de Registros de Pacientes";
        
        $data['menu']       = "depositos";
        $data['submenu']    = "ldeposito";
        Layout_Helper::cargaVista($this,'listar_ingreso',$data,'ingresos');   
    }
    public function agregarDeposito($id)
    {//CARGA DEPOSITO LUEGO DEL INGRESO
        
        $data['registro']   = $id;
        $registro           = $this->hd_model->dameUno($id);
        $paciente           = $this->pacientes_model->dameUnoId($registro->paciente);die($id);
        $apoderado          = $this->apoderados_model->dameUnoPorFichaEco($id,111);
        die(var_dump($apoderado));
        IF(empty($apoderado)){
            echo "<script>
                var c = window.confirm('Paciente sin datos. Desea completar el registro para continuar?'); 
                if (c === true){
                    window.location.href='".base_url()."clinica_admision/ingresos/modificarRegistro/".$id."';
                        }
                else {
                    window.location.href='".base_url()."clinica_admision/devoluciones/listarIngreso';
                }
                </script>";
        }
        $data['apoderado']  = $apoderado;
        $data['pacApePat']  = $paciente->apellidoPaterno;
        $data['pacApeMat']  = $paciente->apellidoMaterno;
        $data['pacRut']     = $paciente->rut;
        $data['pacNombre']  = $paciente->nombres;
        $data['conceptos']  = $this->bancos_model->dameConceptos();
        $data['ctaDevolucion'] = $this->bancos_model->dameUno($id);
      
        $data['banco']      = $this->bancos_model->dameTodo();
        $data['tipoCta']    = $this->bancos_model->dameTodoTipo();
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['isapre']     = $this->isapres_model->dameTodo();
        
        $data['breadcumb']  = "Registros";
        $data['title']      = "Nuevo Deposito";
        
        $data['menu']       = "depositos";
        $data['submenu']    = "ndeposito";
        Layout_Helper::cargaVista($this,'devolucion_ingreso',$data,'ingresos');   
    }
    public function guardarDeposito()
    {
        $rut        = str_replace(array(".","-"), "", $this->input->post('rut'));
        $letra      = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
        $rutEco     = str_replace(array(".","-"), "", $this->input->post('rutApoEco'));
        $letra      = substr($rutEco,0,1);if ($letra === '1' || $letra === '2'){$rutEco = substr($rutEco, 0, 8);}else {$rutEco = substr($rutEco, 0, 7);}
        
    ////GUARDAR PACIENTE    
        $paciente   = $this->pacientes_model->dameUno($rut);
        $idFicha    = $this->input->post('registro');
        $ficha      = $this->ingreso_model->dameFicha($paciente->id);
    
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
            $this->bancos_model->depFichaElectro = $idFicha;
            $this->bancos_model->depFicha        = $ficha;
            $this->bancos_model->depFechaRegistro= date('Y-m-d H:i:s');
            $this->bancos_model->depUsuario      = $this->session->userdata('id_usuario');
            $apoderadoEco = $this->apoderados_model->damePorDatos($rutEco,$idFicha,2);
            $this->bancos_model->depApoderadoEconomico = $apoderadoEco->id;
            $this->bancos_model->guardarDeposito();
            
        redirect(base_url().'clinica_admision/devoluciones/listarDevolucion');
    }
    public function cargarDepositosPorVencer($filtro='')
    {
        IF($filtro != ''){
            $data['porvencer'] = 'OK';
            $data['datos'] = $this->bancos_model->dameCtasPorVencer();
            $data['title']      = "Listado de Depositos Registrados";
            
        $data['menu']       = "depositos";
        $data['submenu']    = "ldeposito";
            Layout_Helper::cargaVista($this,'listar_devoluciones',$data,'ingresos');   
        }
        ELSE $this->listarDevolucion();
        
    }
    
}