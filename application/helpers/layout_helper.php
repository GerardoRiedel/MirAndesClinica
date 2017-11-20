<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 3/10/16
 * Time: 11:41
 */
class Layout_Helper
{
    static function breadcrumb($obj)
    {
        $breadcrumb = "<div id=\"breadcrumb\">";

        if($obj->uri->total_segments() == 1)
        {
            $breadcrumb .= "<a href='" . base_url($obj->uri->segment(1) . '/principal') . "' title='Ir a la pantalla principal' class='tip-bottom'><i class='fa fa-home'></i>Inicio</a>";
        }
        elseif($obj->uri->total_segments() == 2)
        {
            $breadcrumb .= "<a href='" . base_url($obj->uri->segment(1) . '/principal') . "' title='Ir a la pantalla principal' class='tip-bottom'><i class='fa fa-home'></i>Inicio</a>";
            $breadcrumb .= "<a href='#' class='current'>" . ucfirst(str_replace('-',' ',str_replace('_',' ',$obj->uri->segment(2)))) . "</a>";
        }
        elseif($obj->uri->total_segments() >= 3)
        {
            $breadcrumb .= "<a href='" . base_url($obj->uri->segment(1) . '/principal') . "' title='Ir a la pantalla principal' class='tip-bottom'><i class='fa fa-home'></i>Inicio</a>";
            $breadcrumb .= "<a href='" . base_url($obj->uri->segment(1) . "/" . $obj->uri->segment(2)) . "'>" . ucfirst(str_replace('-',' ',str_replace('_',' ',$obj->uri->segment(2)))) . "</a>";
            $breadcrumb .= "<a href='#' class='current'>" . ucfirst(str_replace('-',' ',str_replace('_',' ',$obj->uri->segment(3)))) . "</a>";
        }

        $breadcrumb .= "</div>";

        return $breadcrumb;
    }

   static function cargaVista(&$obj,$view,$data,$restriccion = null)
    {
		
		//$uspId = $obj->session->userdata('id_usuario');
		//$totalMensajes = count($this->usuarios_model->dameTotalNoLeidos($uspId));
       
        if($obj->session->userdata('perfil') == '1'){
        	// accesos de admin = cesfam,enfermedades,envios,plataforma,prestacion,accesos,reportes,sectores,sms,billing,principal,canales
        	 
			$no_vistas_perfil1 = array("ingresos");
			if (in_array($restriccion, $no_vistas_perfil1)) {
		        $obj->load->view('panel/layout/head', $data);
		        $obj->load->view('panel/layout/user_nav',$data);
                        $obj->load->view('panel/layout/left_admision');
                        $obj->load->view('panel/MirAndesClinica/admision/' . str_replace('-','_',$obj->uri->segment(2)) . '/' . $view,$data);
                        $obj->load->view('panel/layout/footer');
			}else{
        		Layout_Helper::restringido($obj,$data);
			}
			
        }

        else if($obj->session->userdata('perfil') == '2'  || $obj->session->userdata('perfil') == '6'){
        	// accesos de some = canalesSome,cesfamSome,enfermedadesSome,especialidadesSome,horasSome,mensajesSome,plataformaSome,principalSome,profesionalesSome,reportesSome,usuariosSome
			
			$no_vistas_perfil1 = array("ingresos");
			if (in_array($restriccion, $no_vistas_perfil1)) {
		        $obj->load->view('panel/layout/head', $data);
		        $obj->load->view('panel/layout/user_nav',$data);
                        $obj->load->view('panel/layout/left_admision');
                        $obj->load->view('panel/MirAndesClinica/admision/' . str_replace('-','_',$obj->uri->segment(2)) . '/' . $view,$data);
                        $obj->load->view('panel/layout/footer');
			}else{
        		Layout_Helper::restringido($obj,$data);
			}
        }
        else if($obj->session->userdata('perfil') == '3' || $obj->session->userdata('perfil') == '4' || $obj->session->userdata('perfil') == '5'){
        	// accesos de some = canalesSome,cesfamSome,enfermedadesSome,especialidadesSome,horasSome,mensajesSome,plataformaSome,principalSome,profesionalesSome,reportesSome,usuariosSome
			
			$no_vistas_perfil2 = array("clinica");
			if (in_array($restriccion, $no_vistas_perfil2)) {
				        	
	            $obj->load->view('panel/layout/head', $data);
	            $obj->load->view('panel/layout/user_nav',$data);
	            $obj->load->view('panel/layout/left_clinica');
                    $obj->load->view('panel/MirAndesClinica/clinica/' . str_replace('-','_',$obj->uri->segment(2)) . '/' . $view,$data);
                    $obj->load->view('panel/layout/footer');				
				
			}else{
				Layout_Helper::restringido($obj,$data);
			}
        }
        
        
        
        
        
        //////BORRAR
        else if($obj->session->userdata('perfil') == '9'){
        	// accesos de admin = cesfam,enfermedades,envios,plataforma,prestacion,accesos,reportes,sectores,sms,billing,principal,canales
        	 
			$no_vistas_perfil1 = array("ingresos");
			if (in_array($restriccion, $no_vistas_perfil1)) {
		        $obj->load->view('panel/layout/head', $data);
		        $obj->load->view('panel/layout/user_nav',$data);
                        $obj->load->view('panel/layout/left_qa');
                        $obj->load->view('panel/MirAndesClinica/qa/' . str_replace('-','_',$obj->uri->segment(2)) . '/' . $view,$data);
                        $obj->load->view('panel/layout/footer');
			}else{
        		Layout_Helper::restringido($obj,$data);
			}
			
        }
        
        
        
        
        
        
        else if($obj->session->userdata('perfil') == '11'){
        	// accesos de some = canalesSome,cesfamSome,enfermedadesSome,especialidadesSome,horasSome,mensajesSome,plataformaSome,principalSome,profesionalesSome,reportesSome,usuariosSome
			
			$no_vistas_perfil1 = array("hd");
			if (in_array($restriccion, $no_vistas_perfil1)) {
		        $obj->load->view('panel/layout/head', $data);
		        $obj->load->view('panel/layout/user_nav',$data);
                        $obj->load->view('panel/layout/left_admision_HD');
                        $obj->load->view('panel/HD/admision/' . str_replace('-','_',$obj->uri->segment(2)) . '/' . $view,$data);
                        $obj->load->view('panel/layout/footer');
			}else{
        		Layout_Helper::restringido($obj,$data);
			}
        }
        else if($obj->session->userdata('perfil') == '12'){
        	// accesos de some = canalesSome,cesfamSome,enfermedadesSome,especialidadesSome,horasSome,mensajesSome,plataformaSome,principalSome,profesionalesSome,reportesSome,usuariosSome
			
			$no_vistas_perfil1 = array("hd");
			if (in_array($restriccion, $no_vistas_perfil1)) {
		        $obj->load->view('panel/layout/head', $data);
		        $obj->load->view('panel/layout/user_nav',$data);
                        $obj->load->view('panel/layout/left_admision_HD');
                        $obj->load->view('panel/HD/admision/' . str_replace('-','_',$obj->uri->segment(2)) . '/' . $view,$data);
                        $obj->load->view('panel/layout/footer');
			}else{
        		Layout_Helper::restringido($obj,$data);
			}
        }
        else if($obj->session->userdata('perfil') == '13'){
        	// accesos de some = canalesSome,cesfamSome,enfermedadesSome,especialidadesSome,horasSome,mensajesSome,plataformaSome,principalSome,profesionalesSome,reportesSome,usuariosSome
			
			$no_vistas_perfil1 = array("hd");
			if (in_array($restriccion, $no_vistas_perfil1)) {
		        $obj->load->view('panel/layout/head', $data);
		        $obj->load->view('panel/layout/user_nav',$data);
                        $obj->load->view('panel/layout/left_admision_HD');
                        $obj->load->view('panel/HD/admision/' . str_replace('-','_',$obj->uri->segment(2)) . '/' . $view,$data);
                        $obj->load->view('panel/layout/footer');
			}else{
        		Layout_Helper::restringido($obj,$data);
			}
        }
        else if($obj->session->userdata('perfil') == '14'){
        	// accesos de some = canalesSome,cesfamSome,enfermedadesSome,especialidadesSome,horasSome,mensajesSome,plataformaSome,principalSome,profesionalesSome,reportesSome,usuariosSome
			
			$no_vistas_perfil1 = array("hd");
			if (in_array($restriccion, $no_vistas_perfil1)) {
		        $obj->load->view('panel/layout/head', $data);
		        $obj->load->view('panel/layout/user_nav',$data);
                        $obj->load->view('panel/layout/left_admision_HD');
                        $obj->load->view('panel/HD/admision/' . str_replace('-','_',$obj->uri->segment(2)) . '/' . $view,$data);
                        $obj->load->view('panel/layout/footer');
			}else{
        		Layout_Helper::restringido($obj,$data);
			}
        }
        
		
		
        else if($obj->session->userdata('perfil') == 'asd'){
        	// accesos de call = alertasCall,callcenterCall,cesfamCall,enfermedadesCall,horasCall,mensajesCall,principalCall,reportesCall,usuariosDatosCall,usuariosUpdateCall,usuariosCall,visitasCall
				
			$no_vistas_perfil3 = array("alertasCall","callcenterCall","cesfamCall","enfermedadesCall","horasCall","mensajesCall","principalCall","reportesCall","usuariosDatosCall","usuariosUpdateCall","usuariosCall","visitasCall");
			if (in_array($restriccion, $no_vistas_perfil3)) {
	            $obj->load->view('panel/layout/head_callcenter', $data);
	            $obj->load->view('panel/layout/user_nav_callcenter',$data);
	            $obj->load->view('panel/layout/left_callcenter');
            	$obj->load->view('panel/callcenter/' . str_replace('-','_',$obj->uri->segment(2)) . '/' . $view,$data);
                $obj->load->view('panel/layout/footer_callcenter');				
			}else{
				Layout_Helper::restringido($obj,$data);
			}
        }
		else if($obj->session->userdata('perfil') == '4'){
			// accesos de jefe some = canalesSome,cesfamSome,enfermedadesSome,especialidadesSome,horasSome,mensajesSome,plataformaSome,principalSome,profesionalesSome,reportesSome,usuariosSome
			
			$no_vistas_perfil4 = array("enfermedadesSome","especialidadesSome","horasSome","mensajesSome","plataformaSome","principalSome","profesionalesSome","reportesSome","usuariosSome");
			if (in_array($restriccion, $no_vistas_perfil4)) {
				        	
	            $obj->load->view('panel/layout/head_some', $data);
	            $obj->load->view('panel/layout/user_nav_some',$data);
	            $obj->load->view('panel/layout/left_jefeSome');
            	$obj->load->view('panel/some/' . str_replace('-','_',$obj->uri->segment(2)) . '/' . $view,$data);
                $obj->load->view('panel/layout/footer');				
				
			}else{
				Layout_Helper::restringido($obj,$data);
			}
        }
		
		else if($obj->session->userdata('perfil') == '5'){
			// accesos de funcionario some = cesfamSome,enfermedadesSome,especialidadesSome,horasSome,mensajesSome,principalSome,usuariosSome
			
			$no_vistas_perfil5 = array("canalesSome","enfermedadesSome","especialidadesSome","horasSome","mensajesSome","principalSome","usuariosSome");
			if (in_array($restriccion, $no_vistas_perfil5)) {
				        	
	            $obj->load->view('panel/layout/head_some', $data);
	            $obj->load->view('panel/layout/user_nav_some',$data);
	            $obj->load->view('panel/layout/left_funcionario');
            	$obj->load->view('panel/some/' . str_replace('-','_',$obj->uri->segment(2)) . '/' . $view,$data);
                $obj->load->view('panel/layout/footer');				
				
			}else{
				Layout_Helper::restringido($obj,$data);
			}
        }
		
		else if($obj->session->userdata('perfil') == '6'){
			$no_vistas_perfil6 = array("alertasCall","callcenterCall","cesfamCall","enfermedadesCall","horasCall","mensajesCall","principalCall","reportesCall","usuariosDatosCall","usuariosUpdateCall","usuariosCall","visitasCall");
			if (in_array($restriccion, $no_vistas_perfil6)) {
				        	
	            $obj->load->view('panel/layout/head_callcenter', $data);
	            $obj->load->view('panel/layout/user_nav_callcenter',$data);
	            $obj->load->view('panel/layout/left_callcenter');
            	$obj->load->view('panel/callcenter/' . str_replace('-','_',$obj->uri->segment(2)) . '/' . $view,$data);
                $obj->load->view('panel/layout/footer');				
				
			}else{
				Layout_Helper::restringido($obj,$data);
			}
        }
		
		else if($obj->session->userdata('perfil') == '7'){
			$no_vistas_perfil7 = array("alertasCall","callcenterCall","cesfamCall","enfermedadesCall","horasCall","mensajesCall","principalCall","reportesCall","usuariosDatosCall","usuariosUpdateCall","usuariosCall","visitasCall");
			if (in_array($restriccion, $no_vistas_perfil7)) {
				        	
	            $obj->load->view('panel/layout/head_callcenter', $data);
	            $obj->load->view('panel/layout/user_nav_callcenter',$data);
	            $obj->load->view('panel/layout/left_callcenter');
            	$obj->load->view('panel/callcenter/' . str_replace('-','_',$obj->uri->segment(2)) . '/' . $view,$data);
                $obj->load->view('panel/layout/footer');				
				
			}else{
				Layout_Helper::restringido($obj,$data);
			}
        }

		else if($obj->session->userdata('perfil') == '8'){
			$no_vistas_perfil8 = array("usuarios","horas","cesfam","enfermedades","envios","plataforma","prestacion","accesos","reportes","sectores","sms","billing","principal","canales");
			if (in_array($restriccion, $no_vistas_perfil8)) {
				        	
	            $obj->load->view('panel/layout/head_intranet', $data);
	            $obj->load->view('panel/layout/user_nav_intranet',$data);
	            $obj->load->view('panel/layout/left_intranet');
            	$obj->load->view('panel/intranet/' . str_replace('-','_',$obj->uri->segment(2)) . '/' . $view,$data);
                $obj->load->view('panel/layout/footer_intranet');				
				
			}else{
				Layout_Helper::restringido($obj,$data);
			}
        }
        else {
        		Layout_Helper::restringido($obj,$data);
        }

        //$obj->load->view('panel/layout/footer'); ahora cargo footers por separado, el de callcenter tiene otros codigos

    }

	static function restringido($obj,$data){
		if($obj->session->userdata('perfil') == '1' ){

			$data['title'] = 'Acceso Restringido';
            $obj->load->view('panel/layout/head_admin', $data);
            $obj->load->view('panel/sinpermiso_view');

        }
		
		if($obj->session->userdata('perfil') == '2' || $obj->session->userdata('perfil') == '4' || $obj->session->userdata('perfil') == '5'){

			$data['title'] = 'Acceso Restringido';
            $obj->load->view('panel/layout/head', $data);
            $obj->load->view('panel/sinpermiso_view');

        }
        else if($obj->session->userdata('perfil') == '3' || $obj->session->userdata('perfil') == '6' || $obj->session->userdata('perfil') == '7'){
				
			$data['title'] = 'Acceso Restringido';
            $obj->load->view('panel/layout/head_callcenter', $data);
            $obj->load->view('panel/sinpermiso_view');
			
        }
	}

	static function menu($obj,$data){
		
		if($obj->session->userdata('perfil') == '2'){

			echo '';

        }

	}
	
	static function menuLateralAlertas(){
		$menu = "<div class=\"col-lg-2 col-md-2 col-sm-2 col-xs-2 \" style=\"\">
   
   <a href=\"".base_url()."callcenter/principal/\" >
   <div class=\"bhoechie-menu\"  >
 <div >      
               <center>  <h4 >Inicio</h4></center>    
 </div> 
   </div>
    </a>    
    
     <a  href=\"".base_url()."callcenter/horas/inicio\">
         <div class=\"bhoechie-menu\" >
 <div >          
               <center>  <h4 >Horas</h4></center> 
 </div> 
   </div>
    </a>
   
    <a style=\"color:#ffffff;\" href=\"".base_url()."callcenter/alertas/inicio\" >
   <div class=\"bhoechie-menu\" style=\" background-color: #6DA2BF;border-color:#6DA2BF; \" >
 <div >         
               <center>  <h4 style=\"color:#ffffff;\" >Alertas</h4></center>      
 </div> 
   </div>
   </a>
   
   

    
    
    <a href=\"".base_url()."callcenter/usuarios/index\" >
   <div class=\"bhoechie-menu\" >
 <div >
               <center>  <h4 >Usuarios</h4></center>             
 </div> 
   </div>
    </a>
    
</div>";
		
		return $menu;
	}

static function menuLateralCesfam(){
		$menu = "<div class=\"col-lg-2 col-md-2 col-sm-2 col-xs-2 \">
   
   <a href=\"".base_url()."callcenter/principal/\" >
   <div class=\"bhoechie-menu\"  >
 <div >      
               <center>  <h4 >Inicio</h4></center>    
 </div> 
   </div>
    </a>    
    
     <a  href=\"".base_url()."callcenter/horas/inicio\">
         <div class=\"bhoechie-menu\" >
 <div >          
               <center>  <h4 >Horas</h4></center> 
 </div> 
   </div>
    </a>
   
    <a  href=\"".base_url()."callcenter/alertas/inicio\" >
   <div class=\"bhoechie-menu\"  >
 <div >         
               <center>  <h4  >Alertas</h4></center>      
 </div> 
   </div>
   </a>
   
       
    
    <a href=\"".base_url()."callcenter/usuarios/index\" >
   <div class=\"bhoechie-menu\" >
 <div >
               <center>  <h4 >Usuarios</h4></center>             
 </div> 
   </div>
    </a>
    
</div>";
		
		return $menu;
	}

static function menuLateralHoras(){
		$menu = "<div class=\"col-lg-2 col-md-2 col-sm-2 col-xs-2 \">
   
   <a href=\"".base_url()."callcenter/principal/\" >
   <div class=\"bhoechie-menu\"  >
 <div >      
               <center>  <h4 >Inicio</h4></center>    
 </div> 
   </div>
    </a>    
    
     <a  style=\"color:#ffffff;\" href=\"".base_url()."callcenter/horas/inicio\">
         <div class=\"bhoechie-menu\" style=\" background-color: #6DA2BF; border-color:#6DA2BF;\" >
 <div >          
               <center>  <h4 style=\"color:#ffffff;\" >Horas</h4></center> 
 </div> 
   </div>
    </a>
   
    <a  href=\"".base_url()."callcenter/alertas/inicio\" >
   <div class=\"bhoechie-menu\"  >
 <div >         
               <center>  <h4  >Alertas</h4></center>      
 </div> 
   </div>
   </a>
   
      
    
    <a href=\"".base_url()."callcenter/usuarios/index\" >
   <div class=\"bhoechie-menu\" >
 <div >
               <center>  <h4 >Usuarios</h4></center>             
 </div> 
   </div>
    </a>
    
</div>";
		
		return $menu;
	}

static function menuLateralMensajes(){
		$menu = "<div class=\"col-lg-2 col-md-2 col-sm-2 col-xs-2 \">
   
   <a href=\"".base_url()."callcenter/principal/\" >
   <div class=\"bhoechie-menu\"  >
 <div >      
               <center>  <h4 >Inicio</h4></center>    
 </div> 
   </div>
    </a>    
    
     <a   href=\"".base_url()."callcenter/horas/inicio\">
         <div class=\"bhoechie-menu\"  >
 <div >          
               <center>  <h4  >Horas</h4></center> 
 </div> 
   </div>
    </a>
   
    <a  href=\"".base_url()."callcenter/alertas/inicio\" >
   <div class=\"bhoechie-menu\"  >
 <div >         
               <center>  <h4  >Alertas</h4></center>      
 </div> 
   </div>
   </a>
   
   
    
    <a href=\"".base_url()."callcenter/usuarios/index\" >
   <div class=\"bhoechie-menu\" >
 <div >
               <center>  <h4 >Usuarios</h4></center>             
 </div> 
   </div>
    </a>
    
</div>";
		
		return $menu;
	}

static function menuLateralPrincipal($color = null){
		$menu = "<div class=\"col-lg-2 col-md-2 col-sm-2 col-xs-2 \">
   
   <a style=\"color:#ffffff;\" href=\"".base_url()."callcenter/principal/\" >
   <div class=\"bhoechie-menu\" style=\" background-color: #6DA2BF; border-color:#6DA2BF;\" >
 <div >      
               <center>  <h4 style=\"color:#ffffff;\"  >Inicio</h4></center>    
 </div> 
   </div>
    </a>    
    
     <a   href=\"".base_url()."callcenter/horas/inicio\">
         <div class=\"bhoechie-menu\"  >
 <div >          
               <center>  <h4  >Horas</h4></center> 
 </div> 
   </div>
    </a>
   
    <a  href=\"".base_url()."callcenter/alertas/inicio\" >
   <div class=\"bhoechie-menu\"  >
 <div >         
               <center>  <h4  >Alertas</h4></center>      
 </div> 
   </div>
   </a>
   
 
    <a href=\"".base_url()."callcenter/usuarios/index\" >
   <div class=\"bhoechie-menu\" >
 <div >
               <center>  <h4 >Usuarios</h4></center>             
 </div> 
   </div>
    </a>
    
</div>";
		
		return $menu;
	}

static function menuLateralUsuarios(){
		$menu = "<div class=\"col-lg-2 col-md-2 col-sm-2 col-xs-4 \">
   
   <a  href=\"".base_url()."callcenter/principal/\" >
   <div class=\"bhoechie-menu\"  >
 <div >      
               <center>  <h4   >Inicio</h4></center>    
 </div> 
   </div>
    </a>    
    
     <a   href=\"".base_url()."callcenter/horas/inicio\">
         <div class=\"bhoechie-menu\"  >
 <div >          
               <center>  <h4  >Horas</h4></center> 
 </div> 
   </div>
    </a>
   
    <a  href=\"".base_url()."callcenter/alertas/inicio\" >
   <div class=\"bhoechie-menu\"  >
 <div >         
               <center>  <h4  >Alertas</h4></center>      
 </div> 
   </div>
   </a>
   
 
    <a style=\"color:#ffffff;\" href=\"".base_url()."callcenter/usuarios/index\" >
   <div class=\"bhoechie-menu\" style=\" background-color: #6DA2BF; border-color:#6DA2BF;\" >
 <div >
               <center>  <h4 style=\"color:#ffffff;\" >Usuarios</h4></center>             
 </div> 
   </div>
    </a>
    
</div>";
		
		return $menu;
	}

	static function menuLateralSome($menuOpcion,$perfil){
	$menu = "<div class=\"col-lg-2 col-md-2 col-sm-2 col-xs-2 \">";
	
  if($menuOpcion == 'inicio'){
	   $menu .= "<a style=\"color:#ffffff;\" href=\"".base_url()."some/principal/\" >
	   <div class=\"bhoechie-menu colorGris\" style=\" background-color: #6DA2BF; border-color:#6DA2BF;\" >
	 <div  style=\"min-height:24px\">      
	               <center>  <h4 style=\"color:#ffffff;\"  ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-home hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\"> Inicio</span></h4></center>    
	 </div> 
	   </div>
	    </a> ";   
  }else{
  	$menu .= "<a   href=\"".base_url()."some/principal\">
         <div class=\"bhoechie-menu colorGrisSobre\"  >
 <div style=\"min-height:24px\" >          
               <center>  <h4 style=\"\" ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-home hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Inicio</span></h4></center> 
 </div> 
   </div>
    </a>";
  }
  
    if($menuOpcion == 'usuarios'){
	   $menu .= "<a style=\"color:#ffffff;\" href=\"".base_url()."some/usuarios/buscarusuario\" >
	   <div class=\"bhoechie-menu colorGris\" style=\" background-color: #6DA2BF; border-color:#6DA2BF;\" >
	 <div style=\"min-height:24px\" >      
	               <center>  <h4 style=\"color:#ffffff;\"  ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-user hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Usuarios</span></h4></center>    
	 </div> 
	   </div>
	    </a> ";   
  }else{
  	$menu .= "<a   href=\"".base_url()."some/usuarios/buscarusuario\">
         <div class=\"bhoechie-menu colorGrisSobre\"  >
 <div  style=\"min-height:24px\">          
               <center>  <h4 style=\"\" ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-user hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Usuarios</span></h4></center> 
 </div> 
   </div>
    </a>";
  }
  
   if($menuOpcion == 'horas'){
	   $menu .= "<a style=\"color:#ffffff;\" href=\"".base_url()."some/horas/inicio\" >
	   <div class=\"bhoechie-menu colorGris\" style=\" background-color: #6DA2BF; border-color:#6DA2BF;\" >
	 <div  style=\"min-height:24px\">      
	               <center>  <h4 style=\"color:#ffffff;\"  ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-clock-o hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Horas</span></h4></center>    
	 </div> 
	   </div>
	    </a> ";   
  }else{
  	$menu .= "<a   href=\"".base_url()."some/horas/inicio\">
         <div class=\"bhoechie-menu colorGrisSobre\"  >
 <div  style=\"min-height:24px\">          
               <center>  <h4 style=\"\" ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-clock-o hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Horas</span></h4></center> 
 </div> 
   </div>
    </a>";
  }
  
  if($perfil==2 || $perfil==4){
	  if($menuOpcion == 'profesionales'){
		   $menu .= "<a style=\"color:#ffffff;\" href=\"".base_url()."some/profesionales/inicio\" >
		   <div class=\"bhoechie-menu colorGris\" style=\" background-color: #6DA2BF; border-color:#6DA2BF;\" >
		 <div  style=\"min-height:24px\">      
		               <center>  <h4 style=\"color:#ffffff;\"  ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-user-md hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Profesionales</span></h4></center>    
		 </div> 
		   </div>
		    </a> ";   
	  }else{
	  	$menu .= "<a   href=\"".base_url()."some/profesionales/inicio\">
	         <div class=\"bhoechie-menu colorGrisSobre\"  >
	 <div style=\"min-height:24px\" >          
	               <center>  <h4 style=\"\" ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-user-md hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Profesionales</span></h4></center> 
	 </div> 
	   </div>
	    </a>";
	  }
  }

  if($menuOpcion == 'mensajes'){
	   $menu .= "<a style=\"color:#ffffff;\" href=\"".base_url()."some/mensajes/inicio\" >
	   <div class=\"bhoechie-menu colorGris\" style=\" background-color: #6DA2BF; border-color:#6DA2BF;\" >
	 <div  style=\"min-height:24px\">      
	               <center>  <h4 style=\"color:#ffffff;\"  ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-sticky-note-o hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Notas</span></h4></center>    
	 </div> 
	   </div>
	    </a> ";   
  }else{
  	$menu .= "<a   href=\"".base_url()."some/mensajes/inicio\">
         <div class=\"bhoechie-menu colorGrisSobre\"  >
 <div  style=\"min-height:24px\">          
               <center>  <h4 style=\"\" ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-sticky-note-o hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Notas</span></h4></center> 
 </div> 
   </div>
    </a>";
  }
  
  if($perfil==2 || $perfil==4){
	  if($menuOpcion == 'reportes'){
		   $menu .= "<a style=\"color:#ffffff;\" href=\"".base_url()."some/reportes_usuarios/inicio\" >
		   <div class=\"bhoechie-menu colorGris\" style=\" background-color: #6DA2BF; border-color:#6DA2BF;\" >
		 <div style=\"min-height:24px\" >      
		               <center>  <h4 style=\"color:#ffffff;\"  ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-file-text-o hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Reportes</span></h4></center>    
		 </div> 
		   </div>
		    </a> ";   
	  }else{
	  	$menu .= "<a   href=\"".base_url()."some/reportes_usuarios/inicio\">
	         <div class=\"bhoechie-menu colorGrisSobre\"  >
	 <div style=\"min-height:24px\" >          
	               <center>  <h4 style=\"\" ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-file-text-o hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Reportes</span></h4></center> 
	 </div> 
	   </div>
	    </a>";
	  }
  }
  
  if($perfil==2 || $perfil==4){
	  if($menuOpcion == 'gestion'){
		   $menu .= "<a style=\"color:#ffffff;\" href=\"".base_url()."some/plataforma/usuarios\" >
		   <div class=\"bhoechie-menu colorGris\" style=\" background-color: #6DA2BF; border-color:#6DA2BF;\" >
		 <div style=\"min-height:24px\" >      
		               <center>  <h4 style=\"color:#ffffff;\"  ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-cogs hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Gestón plataforma</span></h4></center>    
		 </div> 
		   </div>
		    </a>";   
	  }else{
	  	$menu .= "<a   href=\"".base_url()."some/plataforma/usuarios\">
	         <div class=\"bhoechie-menu colorGrisSobre\"  >
	 <div style=\"min-height:24px\">          
	               <center>  <h4  style=\"\" ><i style=\"float:left; margin-left: 10px\"  class=\"fa fa-cogs hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Gestón plataforma</span></h4></center> 
	 </div> 
	   </div>
	    </a>";
	  }
  }
	$menu .= "</div>";
		return $menu;
	}


 static function menuLateralSomeMobile($menuOpcion,$perfil){
	$menu = "<div style=\"max-width:40px;float:left;margin-right:20px\" class=\" \">";
	
  if($menuOpcion == 'inicio'){
	   $menu .= "<a style=\"color:#ffffff;\" href=\"".base_url()."some/principal/\" >
	   <div class=\"bhoechie-menu colorGris\" style=\" background-color: #6DA2BF; border-color:#6DA2BF;\" >
	 <div class=\"colorGris\" style=\"min-height:24px\">      
	               <center>  <h4 style=\"color:#ffffff;\"  ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-home hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\"> Inicio</span></h4></center>    
	 </div> 
	   </div>
	    </a> ";   
  }else{
  	$menu .= "<a   href=\"".base_url()."some/principal\">
         <div class=\"bhoechie-menu colorGrisSobre\"  >
 <div style=\"min-height:24px\" >          
               <center>  <h4 style=\"\" ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-home hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Inicio</span></h4></center> 
 </div> 
   </div>
    </a>";
  }
  $menu .= "</div><div style=\"max-width:40px;float:left;margin-right:20px\" class=\"\">";
    if($menuOpcion == 'usuarios'){
	   $menu .= "<a style=\"color:#ffffff;\" href=\"".base_url()."some/usuarios/buscarusuario\" >
	   <div class=\"bhoechie-menu colorGris\" style=\" background-color: #6DA2BF; border-color:#6DA2BF;\" >
	 <div style=\"min-height:24px\" >      
	               <center>  <h4 style=\"color:#ffffff;\"  ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-user hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Usuarios</span></h4></center>    
	 </div> 
	   </div>
	    </a> ";   
  }else{
  	$menu .= "<a   href=\"".base_url()."some/usuarios/buscarusuario\">
         <div class=\"bhoechie-menu colorGrisSobre\"  >
 <div  style=\"min-height:24px\">          
               <center>  <h4 style=\"\" ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-user hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Usuarios</span></h4></center> 
 </div> 
   </div>
    </a>";
  }
    $menu .= "</div>";
    $menu .= "<div style=\"max-width:40px;float:left;margin-right:20px\"  class=\"\">";
	
   if($menuOpcion == 'horas'){
	   $menu .= "<a style=\"color:#ffffff;\" href=\"".base_url()."some/horas/inicio\" >
	   <div class=\"bhoechie-menu colorGris\" style=\" background-color: #6DA2BF; border-color:#6DA2BF;\" >
	 <div  style=\"min-height:24px\">      
	               <center>  <h4 style=\"color:#ffffff;\"  ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-clock-o hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Horas</span></h4></center>    
	 </div> 
	   </div>
	    </a> ";   
  }else{
  	$menu .= "<a   href=\"".base_url()."some/horas/inicio\">
         <div class=\"bhoechie-menu colorGrisSobre\"  >
 <div  style=\"min-height:24px\">          
               <center>  <h4 style=\"\" ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-clock-o hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Horas</span></h4></center> 
 </div> 
   </div>
    </a>";
  }
   
	

	$menu .= "</div>";
if($perfil==2 || $perfil==4){
    $menu .= "<div style=\"max-width:40px;float:left;margin-right:20px\"  class=\"\">";
	  if($menuOpcion == 'profesionales'){
		   $menu .= "<a style=\"color:#ffffff;\" href=\"".base_url()."some/profesionales/inicio\" >
		   <div class=\"bhoechie-menu colorGris\" style=\" background-color: #6DA2BF; border-color:#6DA2BF;\" >
		 <div  style=\"min-height:24px\">      
		               <center>  <h4 style=\"color:#ffffff;\"  ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-user-md hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Profesionales</span></h4></center>    
		 </div> 
		   </div>
		    </a> ";   
	  }else{
	  	$menu .= "<a   href=\"".base_url()."some/profesionales/inicio\">
	         <div class=\"bhoechie-menu colorGrisSobre\"  >
	 <div style=\"min-height:24px\" >          
	               <center>  <h4 style=\"\" ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-user-md hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Profesionales</span></h4></center> 
	 </div> 
	   </div>
	    </a>";
	  }
	  
    $menu .= "</div>";
 }
    $menu .= "<div style=\"max-width:40px;float:left;margin-right:20px\"  class=\"\">";
	
  if($menuOpcion == 'mensajes'){
	   $menu .= "<a style=\"color:#ffffff;\" href=\"".base_url()."some/mensajes/inicio\" >
	   <div class=\"bhoechie-menu colorGris\" style=\" background-color: #6DA2BF; border-color:#6DA2BF;\" >
	 <div  style=\"min-height:24px\">      
	               <center>  <h4 style=\"color:#ffffff;\"  ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-sticky-note-o hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Notas</span></h4></center>    
	 </div> 
	   </div>
	    </a> ";   
  }else{
  	$menu .= "<a   href=\"".base_url()."some/mensajes/inicio\">
         <div class=\"bhoechie-menu colorGrisSobre\"  >
 <div  style=\"min-height:24px\">          
               <center>  <h4 style=\"\" ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-sticky-note-o hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Notas</span></h4></center> 
 </div> 
   </div>
    </a>";
  }

	$menu .= "</div>";
	
if($perfil==2 || $perfil==4){
    $menu .= "<div style=\"max-width:40px;float:left;margin-right:20px\"  class=\"\">";
		  if($menuOpcion == 'reportes'){
			   $menu .= "<a style=\"color:#ffffff;\" href=\"".base_url()."some/reportes_usuarios/inicio\" >
			   <div class=\"bhoechie-menu colorGris\" style=\" background-color: #6DA2BF; border-color:#6DA2BF;\" >
			 <div style=\"min-height:24px\" >      
			               <center>  <h4 style=\"color:#ffffff;\"  ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-file-text-o hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Reportes</span></h4></center>    
			 </div> 
			   </div>
			    </a> ";   
		  }else{
		  	$menu .= "<a   href=\"".base_url()."some/reportes_usuarios/inicio\">
		         <div class=\"bhoechie-menu colorGrisSobre\"  >
		 <div style=\"min-height:24px\" >          
		               <center>  <h4 style=\"\" ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-file-text-o hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Reportes</span></h4></center> 
		 </div> 
		   </div>
		    </a>";
		  }

    $menu .= "</div>";
 }	
if($perfil==2 || $perfil==4){
    $menu .= "<div style=\"max-width:40px;float:left;margin-right:20px\"  class=\"\">";
		  if($menuOpcion == 'gestion'){
			   $menu .= "<a style=\"color:#ffffff;\" href=\"".base_url()."some/plataforma/usuarios\" >
			   <div class=\"bhoechie-menu colorGris\" style=\" background-color: #6DA2BF; border-color:#6DA2BF;\" >
			 <div style=\"min-height:24px\" >      
			               <center>  <h4 style=\"color:#ffffff;\"  ><i style=\"float:left; margin-left: 10px\" class=\"fa fa-cogs hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Gestón plataforma</span></h4></center>    
			 </div> 
			   </div>
			    </a> ";   
		  }else{
		  	$menu .= "<a   href=\"".base_url()."some/plataforma/usuarios\">
		         <div class=\"bhoechie-menu colorGrisSobre\"  >
		 <div style=\"min-height:24px\">          
		               <center>  <h4  style=\"\" ><i style=\"float:left; margin-left: 10px\"  class=\"fa fa-cogs hidden-md  hidden-sm\" aria-hidden=\"true\"></i><span class=\"  hidden-xs\">Gestón plataforma</span></h4></center> 
		 </div> 
		   </div>
		    </a>";
		  }

}
		$menu .= "</div>";
		return $menu;
	}

}