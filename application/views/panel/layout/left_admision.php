<?php $color = '#e9c899';
IF(empty($menu)){
    $menu ='';
    //$color = '#f4f4f2';
}
IF(empty($submenu)){$submenu='';}?>

<div id="sidebar" style="background-color: <?php echo $color;?>">
    
    <ul class="menu-left" style="">
    
<!-- GESTION DE INICIO -->
<li class="<?php if($this->uri->segment(2) == 'principal') echo "active open" ?>"><a href="<?php echo base_url("clinica_admision/ingresos/inicio"); ?>"><i class="fa fa-home" aria-hidden="true" style=" width: 20px; text-align: center"></i> <span>Inicio</span></a></li>

    
    <?php IF($this->session->userdata('perfil') !== '6') { ?>
<!--INGRESO-->
<li class="submenu <?php if($menu === 'ingreso' )echo "active open" ?>">
        <a href=""><i class="far fa-list-alt" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Ingresos</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($submenu === 'ningreso') echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/ingresos"); ?>">Nuevo Ingreso</a></li>
            <li <?php if($submenu === 'lingreso')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/ingresos/listarIngreso"); ?>">Listar Registros Activos</a></li>            
        </ul> 
</li>
<!--FICHA-->
<li class="submenu <?php if($menu === 'fichas')echo "active open" ?>">
    <a href=""><i class="far fa-newspaper" aria-hidden="true" style=" width: 20px;text-align: center"></i><span>Fichas</span><i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($submenu === 'lingreso')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/fichas/listar_paciente"); ?>">Listar Fichas</a></li>            
        </ul> 
</li>

    <?php } ?>
<!--TEC-->
<li class="submenu <?php if($menu === 'tecs')echo "active open" ?>">
        <a href=""><i class="fa fa-heartbeat" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>T.E.C</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <?php IF($this->session->userdata('perfil') !== '6') { ?>
            <li <?php if($submenu === 'ntecs') echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/tecs/nuevoIngreso"); ?>">Nuevo Ingreso T.E.C</a></li>
            <li <?php if($submenu === 'ltecs')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/tecs/listarIngreso"); ?>">Listar Ingresos T.E.C</a></li>            
            <?php } ?>
            <li <?php if($submenu === 'dtecs')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/tecs/listarDepositosTEC"); ?>">Informe de Sesiones T.E.C</a></li>            
        </ul> 
</li>
<!-- VISITAS >
<li class="submenu <?php if($menu === 'visitas')echo "active open" ?>">
    <a href="#"><i class="fa fa-street-view" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Visitas</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($submenu === 'nvisitas') echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/visitas/inicio"); ?>">Pacientes</a></li>
        </ul> 
</li>

 
<!--DEPOSITOS-->
<li class="submenu <?php if($menu === 'depositos')echo "active open" ?>">
    <a href=""><i class="fas fa-dollar-sign" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span> Depositos</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <?php IF($this->session->userdata('perfil') !== '6') { ?>
            <li <?php if($submenu === 'ndeposito') echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/devoluciones/listarIngreso"); ?>">Nuevo Deposito</a></li>
             <?php } ?>
            <li <?php if($submenu === 'ldeposito') echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/devoluciones/listarDevolucion"); ?>">Listar Depositos Sin Rendir</a></li>            
            <li <?php if($submenu === 'rdeposito') echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/devoluciones/listarRendicion"); ?>">Listado de Rendiciones</a></li>            
        </ul> 
</li>

<?php IF($this->session->userdata('perfil') !== '6') { ?>
<!-- MANTENEDORES -->
<li class="submenu <?php if($menu === 'mantenedores')echo "active open" ?>">
    <a href="#"><i class="fa fa-users" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Mantenedores</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            
            <li <?php if($submenu === 'pmantenedores') echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/modificar/listar_paciente"); ?>">Pacientes</a></li>
            <li <?php if($submenu === 'amantenedores')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/modificar/listar_apoderado"); ?>">Apoderados</a></li>            
            <?php IF($this->session->userdata('perfil') == '1'){?>
            <li <?php if($submenu === 'umantenedor')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/modificar/listar_usuarios"); ?>">Usuarios</a></li>            
            <?php } ?>
        </ul> 
</li>
<?php } ?>
<!--CHARTS-->
<li class="submenu <?php if($menu === 'charts' )echo "active open" ?>">
        <a href=""><i class="fas fa-chart-line" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Gráficos</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($submenu === 'pchart') echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/charts"); ?>">Distibución por Piso</a></li>
            <li <?php if($submenu === 'tchart') echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/charts/chartsTodo/"); ?>">Gráficos Estadísticos</a></li>
        </ul> 
</li>
<?php IF($this->session->userdata('perfil') !== '6') { ?>
<!-- HERRAMIENTAS -->
<li class="submenu <?php if($menu === 'herramientas')echo "active open" ?>">
    <a href="#"><i class="fa fa-cog" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Herramientas</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($submenu === 'eherramientas')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/herramientas/listar_examenes"); ?>">Exámenes</a></li> 
            <li <?php if($submenu === 'fherramientas')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/herramientas/listar_farmacos"); ?>">Fármacos</a></li>   
            <li <?php if($submenu === 'iherramientas')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/herramientas/listar_insumos"); ?>">Insumos</a></li>       
            <li <?php if($submenu === 'rherramientas')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/herramientas/listar_regimen"); ?>">Régimen Alimentario</a></li>
            <li <?php if($submenu === 'pherramientas')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/modificar/listar_profesional"); ?>">Profesionales</a></li>
            <li <?php if($submenu === 'paherramientas')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/herramientas/listar_parametros"); ?>">Parámetros</a></li>      
        </ul> 
</li>
  <?php } ?>          

    </ul>
</div><!-- sidebar -->
