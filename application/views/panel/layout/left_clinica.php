<?php $color = '#e9c899';
IF(empty($menu)){
    $menu ='';
   // $color = '#f4f4f2';
}
IF(empty($submenu)){$submenu='';}?>

<div id="sidebar" style="background-color: <?php echo $color;?>">
    <!-- div id="search">
    <input type="text" placeholder="Buscar..."/><button type="submit" class="tip-right" title="Search"><i class="fa fa-search icon-white"></i></button>
    </div -->
    <ul class="menu-left" style="">
   
       
    
<!-- GESTION DE INICIO -->
                 <li class="<?php if($this->uri->segment(2) == 'principal') echo "active open" ?>"><a href="<?php IF($this->session->userdata('perfil') == '4'){echo base_url("clinica_enfermeria/charts") ;} ELSE {echo base_url("clinica_enfermeria/ingresos/inicio");} ;?>"><i class="fa fa-home" aria-hidden="true"></i> <span>Inicio</span></a></li>
<!-- GESTION DE INGRESO 
<li class="submenu <?php if($this->uri->segment(2) == 'ingreso' )echo "active open" ?>">
        <a href=" <?php echo base_url("clinica_enfermeria/ingresos"); ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> <span>Ingreso</span> <i class="arrow fa fa-chevron-right"></i></a>
</li>
-->
<!-- INGRESO MEDICO-->
<?php IF($this->session->userdata('perfil') == '5'){?>

<li class="submenu <?php if($menu === 'ingreso')echo "active open" ?>">
    <a href="#"><i class="far fa-list-alt" aria-hidden="true"></i> <span>&nbsp;Control</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
                <li <?php if($submenu === 'lingreso')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_enfermeria/ingresos/listarIngreso"); ?>">Listar Pacientes Activos</a></li>            
        </ul> 
</li>
<!-- INGRESO NO MEDICO -->
<?php } ELSE { ?>
<li class="submenu <?php if($menu === 'ingreso')echo "active open" ?>">
    <a href="#"><i class="far fa-list-alt" aria-hidden="true"></i> <span>&nbsp;Ingresos</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
                <li <?php if($submenu === 'lingreso')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_enfermeria/ingresos/listarIngreso"); ?>">Listar Pacientes Activos</a></li>            
        </ul> 
</li>
<?php } ?>
<!--FICHA-->
<li class="submenu <?php if($menu === 'fichas')echo "active open" ?>">
        <a href="#"><i class="far fa-newspaper" aria-hidden="true"></i> <span>Fichas</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($menu === 'fichas')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_enfermeria/fichas/cargando"); ?>">Fichas Históricas</a></li>            
        <!--
            <li <?php if($menu === 'fichas')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_enfermeria/fichas/listar_paciente"); ?>">Fichas Históricas</a></li>            
        -->
        </ul> 

</li>
<!--TEC-->
<?php IF($this->session->userdata('perfil') == '4'){?>
<li class="submenu <?php if($menu == 'tecs')echo "active open" ?>">
        <a href=""><i class="fa fa-heartbeat" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>T.E.C</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($submenu === 'itecs') echo "class='active'" ?>><a href="<?php echo base_url("clinica_enfermeria/tecs/nuevoIngreso"); ?>">Nuevo Ingreso T.E.C</a></li>
            <li <?php if($submenu === 'ltecs')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_enfermeria/tecs/listarIngreso"); ?>">Listar Ingresos T.E.C</a></li>            
            <!--
            <li <?php if($submenu === 'dtecs')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_enfermeria/tecs/listarDepositosTEC"); ?>">Depositos T.E.C</a></li>            
            -->
        </ul> 
</li>
<?php } ?>
<!-- MANTENEDOR -->
<li class="submenu <?php if($menu === 'mantenedores')echo "active open" ?>">
    <a href="#"><i class="fa fa-users" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Mantenedores</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            
            <li <?php if($submenu === 'pmantenedor') echo "class='active'" ?>><a href="<?php echo base_url("clinica_enfermeria/modificar/listar_paciente"); ?>">Pacientes</a></li>
            <li <?php if($submenu === 'amantenedor')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_enfermeria/modificar/listar_apoderado"); ?>">Apoderados</a></li>      
            <?php IF($this->session->userdata('perfil') == '4'){?>
            <li <?php if($submenu === 'umantenedor')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_enfermeria/modificar/listar_usuarios"); ?>">Usuarios</a></li>            
            <?php }?>
        </ul> 
</li>
<!-- HERRAMIENTAS -->
<?php IF($this->session->userdata('perfil') == '4'){?>
<li class="submenu <?php if($menu === 'herramientas')echo "active open" ?>">
    <a href="#"><i class="fa fa-cog" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Herramientas</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($submenu === 'eherramientas')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_enfermeria/herramientas/listar_examenes"); ?>">Exámenes</a></li> 
            <li <?php if($submenu === 'fherramientas')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_enfermeria/herramientas/listar_farmacos"); ?>">Fármacos</a></li>   
            <li <?php if($submenu === 'iherramientas')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_enfermeria/herramientas/listar_insumos"); ?>">Insumos</a></li>       
            <li <?php if($submenu === 'rherramientas')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_enfermeria/herramientas/listar_regimen"); ?>">Régimen Alimentario</a></li>
        </ul> 
</li>
<?php } ?>

        
    </ul>
</div><!-- sidebar -->
