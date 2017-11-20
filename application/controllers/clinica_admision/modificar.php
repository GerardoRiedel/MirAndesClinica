<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Modificar extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();


        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
        $this->load->helper('layout');
        
        $this->load->database('default');
        $this->folder = 'uploads/';
        
        $this->load->model("comunas_model");
        $this->load->model("usuarios_panel_log_model");
        $this->load->model("pacientes_model");
        $this->load->model("apoderados_model");
        $this->load->model("isapres_model");
        $this->load->model("ingreso_model");
        $this->load->model("parametros_model");
        $this->load->model("profesionales_model");
        //$tiempo = $this->parametros_model->dameValor('TIEMPO_SESSION');
	//Session_Helper::session($tiempo);	
		
    }
    public function listar_paciente()
    {
        $data['datos']      = $this->pacientes_model->dameTodo();
        $data['breadcumb']  = "paciente";
        $data['title']      = "Lista de Pacientes";
                
        
        $data['menu']       = "mantenedores";
        $data['submenu']    = "pmantenedores";
        Layout_Helper::cargaVista($this,'listar_paciente',$data,'ingresos');   
    }
    public function filtrar_paciente()
    {
        $filtro     = str_replace(array(".","-"), "", $this->input->post('filtro'));
        $letra      = substr($filtro,0,1);if ($letra === "1" || $letra === "2"){$filtro = substr($filtro, 0, 8);}else {$filtro = substr($filtro, 0, 7);}
        
        $data['datos']      = $this->pacientes_model->dameTodo($filtro);
        $data['breadcumb']  = "paciente";
        $data['title']      = "Lista de Pacientes";
        $data['menu']       = "mantenedores";
        $data['submenu']    = "pmantenedores";
        Layout_Helper::cargaVista($this,'listar_paciente',$data,'ingresos');   
    }
    public function cargar_paciente($id)
    {
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['datos']      = $this->pacientes_model->dameUnoId($id);
        $data['breadcumb']  = "paciente";
        $data['title']      = "Datos de Paciente";
        $data['menu']       = "mantenedores";
        $data['submenu']    = "pmantenedores";
        Layout_Helper::cargaVista($this,'modificar_paciente',$data,'ingresos');   
    }
    
    public function guardarModificarPaciente()
    {
        $rut        = str_replace(array(".","-"), "", $this->input->post('rut'));
        $letra      = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
        $rutTitular = str_replace(array(".","-"), "", $this->input->post('rutTitular'));
        $letra      = substr($rutTitular,0,1);if ($letra === '1' || $letra === '2'){$rutTitular = substr($rutTitular, 0, 8);}else {$rutTitular = substr($rutTitular, 0, 7);}
                
        $date       = new DateTime($this->input->post('fecha'));
        $fecha      = $date->format('Y-m-d');
        
    ////GUARDAR PACIENTE    
            $this->pacientes_model->id              = $this->input->post('id');
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
            $this->pacientes_model->comuna          = $this->input->post('comuna');
            $this->pacientes_model->nacionalidad    = $this->input->post('nac');
            $this->pacientes_model->rut             = $rut;
            $this->pacientes_model->guardar($rut);
            unset($this->pacientes_model->id,$this->pacientes_model->rut,$this->pacientes_model->ocupacion,$this->pacientes_model->direccion,$this->pacientes_model->sexo,$this->pacientes_model->email,$this->pacientes_model->nombres,$this->pacientes_model->apellidoPaterno,$this->pacientes_model->apellidoMaterno,$this->pacientes_model->fechaNacimiento,$this->pacientes_model->telefono,$this->pacientes_model->celular);
        
        $data['datos']      = $this->pacientes_model->dameTodo();
        $data['breadcumb']  = "paciente";
        $data['title']      = "Lista de Pacientes";
        $data['menu']       = "mantenedores";
        $data['submenu']    = "pmantenedores";
        Layout_Helper::cargaVista($this,'listar_paciente',$data,'ingresos');   
    }
    public function listar_apoderado()
    {
        $data['datos']      = $this->apoderados_model->dameTodo();
        $data['breadcumb']  = "paciente";
        $data['title']      = "Lista de Apoderados";
        $data['menu']       = "mantenedores";
        $data['submenu']    = "amantenedores";
        Layout_Helper::cargaVista($this,'listar_apoderado',$data,'ingresos');   
    }
    public function filtrar_apoderado()
    {
        $filtro     = str_replace(array(".","-"), "", $this->input->post('filtro'));
        $letra      = substr($filtro,0,1);if ($letra === "1" || $letra === "2"){$filtro = substr($filtro, 0, 8);}else {$filtro = substr($filtro, 0, 7);}
        
        $data['datos']      = $this->apoderados_model->dameTodo($filtro);
        $data['breadcumb']  = "paciente";
        $data['title']      = "Lista de Apoderados";
        $data['menu']       = "mantenedores";
        $data['submenu']    = "amantenedores";
        Layout_Helper::cargaVista($this,'listar_apoderado',$data,'ingresos');   
    }
    public function cargar_apoderado($id)
    {
        $data['comuna']     = $this->comunas_model->dameTodo();
        $data['datos']      = $this->apoderados_model->dameUnoId($id);
        $data['breadcumb']  = "paciente";
        $data['title']      = "Datos de Apoderado";
        $data['menu']       = "mantenedores";
        $data['submenu']    = "amantenedores";
        Layout_Helper::cargaVista($this,'modificar_apoderado',$data,'ingresos');   
    }
    public function listar_usuarios()
    {
        $data['datos']      = $this->usuarios_panel_log_model->dameTodo();
        $data['breadcumb']  = "usuarios";
        $data['title']      = "Lista de Usuarios";
        
        $data['menu']       = "mantenedores";
        $data['submenu']    = "umantenedor";
        Layout_Helper::cargaVista($this,'listar_usuario',$data,'ingresos');   
    }
    public function cargar_usuario($id='')
    {
        IF(!empty($id)){
            $data['datos']  = $this->usuarios_panel_log_model->dameUno($id);
        }
        $data['breadcumb']  = "usuarios";
        $data['title']      = "Datos de Usuario";
        Layout_Helper::cargaVista($this,'modificar_usuario',$data,'ingresos');   
    }
    public function guardarModificarUsuario()
    {
        $rut        = str_replace(array(".","-"), "", $this->input->post('uspRut'));
        $letra      = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
        $usuario    = $this->input->post('uspUsuario'); 
        $clave      = $this->input->post('clave');
        IF(!empty($clave))$clave = md5($clave);
        $uspId      = $this->input->post('uspId');
        $email      = $this->input->post('uspEmail');
        $nombre     = $this->input->post('uspNombre');
        $apePat     = $this->input->post('uspApellidoP');
    ////GUARDAR Usuario    
        IF(!empty($usuario))$this->usuarios_panel_log_model->uspUsuario = $usuario;
        IF(!empty($clave))$this->usuarios_panel_log_model->uspPassword  = $clave;
        //IF(!empty($uspId))$this->usuarios_panel_log_model->uspId        = $uspId;
        
        //$existe = $this->usuarios_panel_log_model->dameUnoExiste();
        IF(!empty($uspId)){
            $this->usuarios_panel_log_model->uspId          = $uspId;
            $this->usuarios_panel_log_model->uspPerfil      = $this->input->post('uspPerfil');
            $this->usuarios_panel_log_model->uspNombre      = $nombre;
            $this->usuarios_panel_log_model->uspApellidoP   = $apePat;
            $this->usuarios_panel_log_model->uspApellidoM   = $this->input->post('uspApellidoM');
            $this->usuarios_panel_log_model->uspEmail       = $email;
            $this->usuarios_panel_log_model->uspRut         = $rut;
            $this->usuarios_panel_log_model->guardar();
            IF(!empty($nombre) || !empty($apePat)){
                $data = array('nombre_completo'   =>  $nombre." ".$apePat);
                $this->session->set_userdata($data);
            }
            IF(!empty($clave)){redirect(base_url().'login/logout_ci');}
        }
        ELSE{
             $this->usuarios_panel_log_model->uspNombre      = $nombre;
             $this->usuarios_panel_log_model->uspPerfil      = $this->input->post('uspPerfil');
            $this->usuarios_panel_log_model->uspApellidoP   = $apePat;
            $this->usuarios_panel_log_model->uspApellidoM   = $this->input->post('uspApellidoM');
            $this->usuarios_panel_log_model->uspEmail       = $email;
            $this->usuarios_panel_log_model->uspRut         = $rut;
            $this->usuarios_panel_log_model->guardar();
            IF(!empty($nombre) || !empty($apePat)){
                $data = array('nombre_completo'   =>  $nombre." ".$apePat);
                $this->session->set_userdata($data);
            }
            //echo "<script>alert('Usuario ya existe')</script>";
        }
        
        redirect(base_url().'clinica_admision/modificar/listar_usuarios');
    }
    public function desactivar_usuario($id='')
    {
        IF(!empty($id)){
            $this->usuarios_panel_log_model->uspId = $id;
            $this->usuarios_panel_log_model->uspEstado = 2;
            $this->usuarios_panel_log_model->guardar();
        }
        
        $data['datos']      = $this->usuarios_panel_log_model->dameTodo();
        $data['breadcumb']  = "usuarios";
        $data['title']      = "Datos de Usuario";
        
        $data['menu']       = "mantenedores";
        $data['submenu']    = "umantenedor";
        Layout_Helper::cargaVista($this,'listar_usuario',$data,'ingresos');   
    }
    public function activar_usuario($id='')
    {
        IF(!empty($id)){
            $this->usuarios_panel_log_model->uspId = $id;
            $this->usuarios_panel_log_model->uspEstado = 1;
            $this->usuarios_panel_log_model->guardar();
        }
        
        $data['datos']      = $this->usuarios_panel_log_model->dameTodo();
        $data['breadcumb']  = "usuarios";
        $data['title']      = "Datos de Usuario";
        
        $data['menu']       = "mantenedores";
        $data['submenu']    = "umantenedor";
        Layout_Helper::cargaVista($this,'listar_usuario',$data,'ingresos');   
    }
    
    
    
    
    public function listar_profesional()
    {
        $data['datos']      = $this->profesionales_model->dameTodo();
        $data['breadcumb']  = "profesional";
        $data['title']      = "Lista de Profesionales";
        
        $data['menu']       = "herramientas";
        $data['submenu']    = "pherramientas";
        Layout_Helper::cargaVista($this,'listar_profesional',$data,'ingresos');   
    }
    public function cargar_profesional($id='')
    {
        IF(!empty($id)){
            $data['datos']  = $this->profesionales_model->dameUno($id);
        }
        //die(var_dump($data['datos']));
        $data['breadcumb']  = "profesional";
        $data['title']      = "Lista de Profesionales";
        $data['menu']       = "herramientas";
        $data['submenu']    = "pherramientas";
        Layout_Helper::cargaVista($this,'modificar_profesional',$data,'ingresos');   
    }
    public function guardarModificarProfesional()
    {
        $rut        = str_replace(array(".","-"), "", $this->input->post('rut'));
        $letra      = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
        $id      = $this->input->post('id');
        $email      = $this->input->post('email');
        $nombre     = $this->input->post('nombre');
        $apePat     = $this->input->post('apellidoP');

        IF(!empty($id))$this->profesionales_model->id          = $id;
            $this->profesionales_model->usuario      = $this->session->userdata('id_usuario');;
            $this->profesionales_model->nombres      = $nombre;
            $this->profesionales_model->apellidoPaterno   = $apePat;
            $this->profesionales_model->apellidoMaterno   = $this->input->post('apellidoM');
            $this->profesionales_model->email       = $email;
            $this->profesionales_model->rut         = $rut;
            $this->profesionales_model->activoMirAndes        = 1;
            $this->profesionales_model->activo         = 'si';
            $this->profesionales_model->guardar();
           
            
        $data['datos']      = $this->profesionales_model->dameTodo();
        $data['breadcumb']  = "profesional";
        $data['title']      = "Lista de Profesionales";
        $data['menu']       = "herramientas";
        $data['submenu']    = "pherramientas";
        Layout_Helper::cargaVista($this,'listar_profesional',$data,'ingresos');   
    }
}
?>