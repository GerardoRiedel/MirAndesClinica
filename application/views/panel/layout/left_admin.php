<?php $color = '#e9c899';
IF(empty($menu)){
    $menu ='';
 //   $color = '#f4f4f2';
}
IF(empty($submenu)){$submenu='';}?>

<div id="sidebar" style="background-color: <?php echo $color;?>">
    <!-- div id="search">
    <input type="text" placeholder="Buscar..."/><button type="submit" class="tip-right" title="Search"><i class="fa fa-search icon-white"></i></button>
    </div -->
    <ul class="menu-left" style="">
   
       
    
<!-- GESTION DE INICIO -->
		 <li class="<?php if($this->uri->segment(2) == 'principal') echo "active open" ?>"><a href="<?php echo base_url("clinica_admin/charts/"); ?>"><i class="fa fa-home" aria-hidden="true" style=" width: 20px; text-align: center"></i> <span>Inicio</span></a></li>
<!-- GESTION DE INGRESO 
<li class="submenu <?php if($this->uri->segment(2) == 'ingreso' )echo "active open" ?>">
        <a href=" <?php echo base_url("admision/ingresos"); ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> <span>Ingreso</span> <i class="arrow fa fa-chevron-right"></i></a>
</li>
-->
<li class="submenu <?php if($menu === 'ingreso')echo "active open" ?>">
        <a href=""><i class="far fa-list-alt" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Ingresos</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($submenu === 'ningreso') echo "class='active'" ?>><a href="<?php echo base_url("clinica_admin/ingresos"); ?>">Nuevo Ingreso</a></li>
            <li <?php if($submenu === 'lingreso')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admin/ingresos/listarIngreso"); ?>">Listar Ingresos</a></li>            
        </ul> 
</li>
<!--FICHA-->
<li class="<?php if($menu === 'fichas')echo "active open" ?>">
    <a href="<?php echo base_url("clinica_admin/fichas/listar_paciente"); ?>"><i class="far fa-newspaper" aria-hidden="true" style=" width: 20px;text-align: center"></i>&nbsp;Fichas<i class="arrow fa fa-chevron-right"></i></a>
</li>
<!--DEPOSITOS-->
<li class="submenu <?php if($menu === 'depositos')echo "active open" ?>">
    <a href=""><i class="fas fa-dollar-sign" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span> Depositos</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            
            <li <?php if($submenu === 'ndeposito') echo "class='active'" ?>><a href="<?php echo base_url("clinica_admin/devoluciones/listarIngreso"); ?>">Nuevo Deposito</a></li>
            <li <?php if($submenu === 'ldeposito')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admin/devoluciones/listarDevolucion"); ?>">Listar Depositos Sin Rendir</a></li> 
            <li <?php if($submenu === 'rdeposito')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admin/devoluciones/listarRendicion"); ?>">Listado de Rendiciones</a></li>    
        </ul> 
</li>
<!--TEC-->
<li class="submenu <?php if($menu == 'tecs')echo "active open" ?>">
        <a href=""><i class="fa fa-heartbeat" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>T.E.C</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($submenu === 'itecs') echo "class='active'" ?>><a href="<?php echo base_url("clinica_admin/tecs/nuevoIngreso"); ?>">Nuevo Ingreso T.E.C</a></li>
            <li <?php if($submenu === 'ltecs')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admin/tecs/listarIngreso"); ?>">Listar Ingresos T.E.C</a></li>            
            <li <?php if($submenu === 'dtecs')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admin/tecs/listarDepositosTEC"); ?>">Depositos T.E.C</a></li>            
        </ul> 
</li>
<!--LICENCIAS-->
<li class="<?php if($menu === 'licencias')echo "active open" ?>">
    <a href="<?php echo base_url("clinica_admin/ingresos/licencias"); ?>"><i class="fa fa-file-text-o" aria-hidden="true" style=" width: 20px;text-align: center"></i>&nbsp;Licencias<i class="arrow fa fa-chevron-right"></i></a>
    <!--    
        <ul>
            
            <li <?php if($this->uri->segment(2) == 'ingreso' && $this->uri->segment(3) == 'agregar') echo "class='active'" ?>><a href="<?php echo base_url("clinica_admin/ingresos/licencias"); ?>">Nuevo Deposito</a></li>
            <li <?php if($this->uri->segment(2) == 'ingreso' && $this->uri->segment(3) == 'listar')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admin/devoluciones/listarDevolucion"); ?>">Listar Depositos</a></li>            
        </ul> 
    -->
</li>
<!-- MANTENEDOR -->
<li class="submenu <?php if($menu === 'mantenedores')echo "active open" ?>">
    <a href="#"><i class="fa fa-users" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Mantenedores</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            
            <li <?php if($submenu === 'pmantenedor') echo "class='active'" ?>><a href="<?php echo base_url("clinica_admin/modificar/listar_paciente"); ?>">Pacientes</a></li>
            <li <?php if($submenu === 'amantenedor')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admin/modificar/listar_apoderado"); ?>">Apoderados</a></li>      
            <li <?php if($submenu === 'umantenedor')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admin/modificar/listar_usuarios"); ?>">Usuarios</a></li>            
        </ul> 
</li>
<!-- HERRAMIENTAS -->
<li class="submenu <?php if($menu === 'herramientas')echo "active open" ?>">
    <a href="#"><i class="fa fa-cog" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Herramientas</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($submenu === 'eherramientas')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admin/herramientas/listar_examenes"); ?>">Exámenes</a></li> 
            <li <?php if($submenu === 'fherramientas')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admin/herramientas/listar_farmacos"); ?>">Fármacos</a></li>   
            <li <?php if($submenu === 'iherramientas')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admin/herramientas/listar_insumos"); ?>">Insumos</a></li>       
            <li <?php if($submenu === 'rherramientas')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admin/herramientas/listar_regimen"); ?>">Régimen Alimentario</a></li>
            <li <?php if($submenu === 'pherramientas')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admin/herramientas/listar_parametros"); ?>">Parámetros</a></li>      
        </ul> 
</li>
            
<!--
<!-- GESTION DE HORAS        
        <li class="submenu <?php if($this->uri->segment(2) == 'horas' )echo "active open" ?>">
        <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> <span>Horas</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'horas' && $this->uri->segment(3) == 'horario') echo "class='active'" ?>><a href="<?php echo base_url("admision/horas/horario"); ?>">Listado de horas</a></li>
            <li <?php if(($this->uri->segment(2) == 'horas' && $this->uri->segment(3) == 'agendar') || ($this->uri->segment(2) == 'cesfam' && $this->uri->segment(3) == 'modificar')) echo "class='active'" ?>><a href="<?php echo base_url("admision/horas/agendar"); ?>">Reservar hora</a></li>            
            <li <?php if(($this->uri->segment(2) == 'horas' && $this->uri->segment(3) == 'buscar-rut') || ($this->uri->segment(2) == 'cesfam' && $this->uri->segment(3) == 'contratar_canal') ||  ($this->uri->segment(2) == 'cesfam' && $this->uri->segment(3) == 'listar_profesional')) echo "class='active'" ?>><a href="<?php echo base_url("admision/horas/buscar-rut"); ?>">Confirmar o Anular</a></li>
            
       		<li <?php if(($this->uri->segment(2) == 'horas'  && $this->uri->segment(3) == 'historial')) echo "class='active'" ?>><a href="<?php echo base_url("admision/horas/historial"); ?>">Consultar historial usuario</a></li>
       		<!--
       		<li <?php if(($this->uri->segment(2) == 'horas' && $this->uri->segment(3) == 'agregarEnfermedadadmisionin')) echo "class='active'" ?>><a href="<?php echo base_url("admision/enfermedades/ver"); ?>">Consultar historial Hora</a></li>
       		<li <?php if(($this->uri->segment(2) == 'horas' && $this->uri->segment(3) == 'carga_masiva_recordatorios')) echo "class='active'" ?>><a href="<?php echo base_url("admision/cesfam/verRecordatorios"); ?>">Liberar hora latencia</a></li>
       
        </ul>
        </li>

<!-- GESTION DE Profesionales
        <li class="submenu <?php if($this->uri->segment(2) == 'cesfam' && $this->uri->segment(3) == 'verHorario' || $this->uri->segment(2) == 'cesfam' && $this->uri->segment(3) == 'listar_profesional') echo "active open" ?>">
        <a href="#"><i class="fa fa-user-md" aria-hidden="true"></i> <span>Profesionales</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'cesfam' && ($this->uri->segment(3) == 'listar_profesional')) echo "class='active'" ?>><a href="<?php echo base_url("admision/cesfam/listar_profesional"); ?>">Listar profesionales</a></li>

            <li <?php if($this->uri->segment(2) == 'cesfam' && ($this->uri->segment(3) == 'verHorario' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/cesfam/verHorario"); ?>">Horario del profesional</a></li>            

        </ul>
        </li>

<!-- GESTION DE PLATAFORMA 
        <li class="submenu <?php if($this->uri->segment(2) == 'usuarios' || ($this->uri->segment(2) == 'cesfam' && $this->uri->segment(3) == 'listar_cesfam')) echo "active open" ?>">
        <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span>Usuarios</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'usuarios' && ($this->uri->segment(3) == 'index' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/usuarios/index"); ?>">Buscar usuario</a></li>
            <li <?php if($this->uri->segment(2) == 'cesfam' && ($this->uri->segment(3) == 'listar_cesfam' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/cesfam/listar_cesfam"); ?>">Agregar usuario</a></li>            
        	<!--
        	<li <?php if($this->uri->segment(2) == 'cesfam' && ($this->uri->segment(3) == 'listar_cesfam' || $this->uri->segment(3) == 'parametros_agregar' || $this->uri->segment(3) == 'parametros_modificar' || $this->uri->segment(3) == 'parametros_listar')) echo "class='active'" ?>><a href="<?php echo base_url("admision/cesfam/carga_masiva_usuarios"); ?>">Carga masiva usuarios</a></li>            
        	
        </ul>
        </li>

<!-- GESTION DE canales 
        <li class="submenu <?php if($this->uri->segment(2) == 'canales' || ($this->uri->segment(2) == 'cesfam' && $this->uri->segment(3) == 'contratar_canal')) echo "active open" ?>">
        <a href="#"><i class="fa fa-tasks" aria-hidden="true"></i> <span>Canales</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'canales' && ($this->uri->segment(3) == 'listar' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/canales/listar"); ?>">Listar canales</a></li>
            <li <?php if($this->uri->segment(2) == 'canales' && ($this->uri->segment(3) == 'agregar' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/canales/agregar"); ?>">Agregar canal</a></li>            
        	<li <?php if($this->uri->segment(2) == 'cesfam' && ($this->uri->segment(3) == 'contratar_canal' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/cesfam/contratar_canal"); ?>">Contratar canales</a></li>            
        	
        </ul>
        </li>

<!-- GESTION DE Prestaciones 
		<li class="submenu <?php if($this->uri->segment(2) == 'prestaciones' ) echo "active open" ?>">
        <a href="#"><i class="fa fa-medkit" aria-hidden="true"></i> <span>Prestaciones</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'prestaciones' && ($this->uri->segment(3) == 'ver' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/prestaciones/ver"); ?>">Listar prestaciones</a></li>
            <li <?php if($this->uri->segment(2) == 'prestaciones' && ($this->uri->segment(3) == 'agregar' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/prestaciones/agregar"); ?>">Agregar prestaciones</a></li>            

        </ul>
        </li>
        
<!-- GESTION DE cesfam 
		<li class="submenu <?php if($this->uri->segment(2) == 'cesfam' && ($this->uri->segment(3) == 'listar' || $this->uri->segment(3) == 'agregar') ) echo "active open" ?>">
        <a href="#"><i class="far fa-list-alt" aria-hidden="true"></i> <span>Cesfam</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'cesfam' && ($this->uri->segment(3) == 'listar' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/cesfam/listar"); ?>">Listar Cesfam</a></li>
            <li <?php if($this->uri->segment(2) == 'cesfam' && ($this->uri->segment(3) == 'agregar' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/cesfam/agregar"); ?>">Agregar cesfam</a></li>            

        </ul>
        </li>
		
<!-- GESTION DE Sectores 
		<li class="submenu <?php if($this->uri->segment(2) == 'sectores' ) echo "active open" ?>">
        <a href="#"><i class="fa fa-map-signs" aria-hidden="true"></i> <span>Sectores</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'sectores' && ($this->uri->segment(3) == 'ver'  )) echo "class='active'" ?>><a href="<?php echo base_url("admision/sectores/ver"); ?>">Listar sectores</a></li>
            <li <?php if($this->uri->segment(2) == 'sectores' && ($this->uri->segment(3) == 'agregar' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/sectores/agregar"); ?>">Agregar sector</a></li>            

        </ul>
        </li>
        
<!-- GESTION DE Enfermedades 
		<li class="submenu <?php if($this->uri->segment(2) == 'enfermedades' ) echo "active open" ?>">
        <a href="#"><i class="fa fa-heartbeat" aria-hidden="true"></i> <span>Enfermedades</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'enfermedades' && ($this->uri->segment(3) == 'verEnfermedad' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/enfermedades/verEnfermedad"); ?>">Listar enfermedades</a></li>
            <li <?php if($this->uri->segment(2) == 'enfermedades' && ($this->uri->segment(3) == 'agregarEnfermedadAdmin' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/enfermedades/agregarEnfermedadAdmin"); ?>">Agregar enfermedad</a></li>            
			<li <?php if($this->uri->segment(2) == 'enfermedades' && ($this->uri->segment(3) == 'verTipoEnfermedad' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/enfermedades/verTipoEnfermedad"); ?>">Listar tipos de enfermedades</a></li>
            <li <?php if($this->uri->segment(2) == 'enfermedades' && ($this->uri->segment(3) == 'agregarTipoEnfermedad' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/enfermedades/agregarTipoEnfermedad"); ?>">Agregar tipo de enfermedad</a></li>            

        </ul>
        </li>
        
	<!-- GESTION DE recordatorios 
			<li class="submenu <?php if($this->uri->segment(2) == 'cesfam' && ($this->uri->segment(3) == 'recordatorios' || $this->uri->segment(3) == 'agregarRecordatorio' || $this->uri->segment(3) == 'carga_masiva_recordatorios') ) echo "active open" ?>">
	        <a href="#"><i class="fa fa-phone-square" aria-hidden="true"></i> <span>Recordatorios</span> <i class="arrow fa fa-chevron-right"></i></a>
	        <ul>
	            <li <?php if($this->uri->segment(2) == 'cesfam' && ($this->uri->segment(3) == 'listarDifusion'  )) echo "class='active'" ?>><a href="<?php echo base_url("admision/cesfam/listarDifusion"); ?>">Listar difusiones de información</a></li>
	            <li <?php if($this->uri->segment(2) == 'cesfam' && ($this->uri->segment(3) == 'agregarDifusion' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/cesfam/agregarDifusion"); ?>">Agregar Difusion</a></li>            
		
                    <li <?php if($this->uri->segment(2) == 'cesfam' && ($this->uri->segment(3) == 'recordatorios'  )) echo "class='active'" ?>><a href="<?php echo base_url("admision/cesfam/recordatorios"); ?>">Listar recordatorios</a></li>
	            <li <?php if($this->uri->segment(2) == 'cesfam' && ($this->uri->segment(3) == 'agregarRecordatorio' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/cesfam/agregarRecordatorio"); ?>">Agregar Recordatorio</a></li>            
			    <li <?php if($this->uri->segment(2) == 'cesfam' && ($this->uri->segment(3) == 'carga_masiva_recordatorios')) echo "class='active'" ?>><a href="<?php echo base_url("admision/cesfam/carga_masiva_recordatorios"); ?>">Carga masiva recordatorios</a></li>            
	
	        </ul>
	        </li> 
 

<!-- GESTION DE Plataforma 
		<li class="submenu <?php if($this->uri->segment(2) == 'plataforma'  && ($this->uri->segment(3) == 'usuarios_listar' || $this->uri->segment(3) == 'usuarios_agregar'  )) echo "active open" ?>">
        <a href="#"><i class="fa fa-users" aria-hidden="true"></i> <span>Plataforma</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'plataforma' && ($this->uri->segment(3) == 'usuarios_listar' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/plataforma/usuarios_listar"); ?>">Listar usuarios panel</a></li>
            <li <?php if($this->uri->segment(2) == 'plataforma' && ($this->uri->segment(3) == 'usuarios_agregar' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/plataforma/usuarios_agregar"); ?>">Agregar usuario panel</a></li>            
			
        </ul>
        </li>  
        
<!-- GESTION DE Parametros 
		<li class="submenu <?php if($this->uri->segment(2) == 'plataforma' && ($this->uri->segment(3) == 'parametros_listar' || $this->uri->segment(3) == 'parametros_agregar'  )) echo "active open" ?>">
        <a href="#"><i class="fa fa-cogs" aria-hidden="true"></i> <span>Parametros</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
           <li <?php if($this->uri->segment(2) == 'plataforma' && ($this->uri->segment(3) == 'parametros_listar' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/plataforma/parametros_listar"); ?>">Listar parametros</a></li>
            <li <?php if($this->uri->segment(2) == 'plataforma' && ($this->uri->segment(3) == 'parametros_agregar' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/plataforma/parametros_agregar"); ?>">Agregar parametro</a></li>            

        </ul>
        </li>  
 

        
<!-- graficos  
        <li class="submenu <?php if(($this->uri->segment(2) == 'canales') || ($this->uri->segment(2) == 'cesfam' && $this->uri->segment(3) == 'resumen')) echo "active open" ?>">
            <a href="#"><i class="fa fa-bar-chart"></i> <span>Graficos</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                
                <li <?php if($this->uri->segment(2) == 'canales' && $this->uri->segment(3) == 'tendencias') echo "class='active'" ?>><a href="<?php echo base_url("admision/canales/tendencias"); ?>">Estadísticas Generales</a></li>
       			<li <?php if($this->uri->segment(2) == 'cesfam' && $this->uri->segment(3) == 'resumen') echo "class='active'" ?>><a href="<?php echo base_url("admision/cesfam/resumen"); ?>">Estadísticas por Cesfam</a></li>
            </ul>
        </li>
        <!-- DETALLE BILLING 
        <li class="<?php if($this->uri->segment(2) == 'billing') echo "active open" ?>"><a href="<?php echo base_url("admision/billing/"); ?>"><i class="money-bill-alt"></i> <span>Billing</span></a></li>

<!-- SMS 
		<li class="submenu <?php if($this->uri->segment(2) == 'sms' && ($this->uri->segment(3) == 'mensajes' || $this->uri->segment(3) == 'simulador') ) echo "active open" ?>">
        <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>SMS</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'sms' && ($this->uri->segment(3) == 'mensajes' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/sms/mensajes"); ?>">Mensajes</a></li>
            <li <?php if($this->uri->segment(2) == 'sms' && ($this->uri->segment(3) == 'simulador' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/sms/simulador"); ?>">Simulador SMS</a></li>            

        </ul>
        </li> 
        
<!-- Envios programados 
		<li class="submenu <?php if($this->uri->segment(2) == 'envios_programados' ) echo "active open" ?>">
        <a href="#"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> <span>Envíos programados</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'envios_programados' && ($this->uri->segment(3) == 'ver' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/envios_programados/ver"); ?>">Listar envíos</a></li>
            <li <?php if($this->uri->segment(2) == 'envios_programados' && ($this->uri->segment(3) == 'agregar' )) echo "class='active'" ?>><a href="<?php echo base_url("admision/envios_programados/agregar"); ?>">Agregar envío</a></li>            

        </ul>
        </li> 


-->
    </ul>
</div><!-- sidebar -->
