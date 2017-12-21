<?php $color = '#e9c899';
IF(empty($menu)){
    $menu ='';
    $color = '#f4f4f2';
}
IF(empty($submenu)){$submenu='';}?>

<div id="sidebar" style="background-color: <?php echo $color;?>">
    <!-- div id="search">
    <input type="text" placeholder="Buscar..."/><button type="submit" class="tip-right" title="Search"><i class="fa fa-search icon-white"></i></button>
    </div -->
    <ul class="menu-left" style="">
   
       
    
<!-- GESTION DE INICIO -->
<li class="<?php if($this->uri->segment(2) == 'principal') echo "active open" ?>"><a href="<?php echo base_url("hd_admision/ingresos/inicio"); ?>"><i class="fa fa-home" aria-hidden="true" style=" width: 20px; text-align: center"></i> <span>Inicio</span></a></li>

<!--INGRESO-->
<li class="submenu <?php if($menu === 'ingreso' )echo "active open" ?>">
        <a href=""><i class="fa fa-hospital-o" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Ingresos</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <?php IF($this->session->userdata('perfil') == '11' || $this->session->userdata('perfil') == '12'){?>
            <li <?php if($submenu === 'cingreso') echo "class='active'" ?>><a href="<?php echo base_url("hd_admision/ingresos/cargarContacto"); ?>">Registro de Contacto</a></li>
            <li <?php if($submenu === 'ningreso') echo "class='active'" ?>><a href="<?php echo base_url("hd_admision/ingresos"); ?>">Nuevo Ingreso HD</a></li>
            <li <?php if($submenu === 'ringreso') echo "class='active'" ?>><a href="<?php echo base_url("hd_admision/ingresos/ingresoRH"); ?>">Nuevo Ingreso RH</a></li>
            <?php };?>
            <li <?php if($submenu === 'lingreso')  echo "class='active'" ?>><a href="<?php echo base_url("hd_admision/ingresos/listarIngreso"); ?>">Listar Registros Activos</a></li>            
        </ul> 
</li>
<!--FICHA-->
<li class="submenu <?php if($menu === 'fichas')echo "active open" ?>">
    <a href=""><i class="fa fa-newspaper-o" aria-hidden="true" style=" width: 20px;text-align: center"></i>&nbsp;Fichas<i class="arrow fa fa-chevron-right"></i></a>
    <ul>
            <li <?php if($submenu === 'ringreso') echo "class='active'" ?>><a href="<?php echo base_url("hd_admision/fichas/listar_paciente"); ?>">Listar Fichas</a></li>
            <!--
            <li <?php if($submenu === 'lingreso')  echo "class='active'" ?>><a href="<?php echo base_url("hd_admision/fichas/historico"); ?>">Listar Historico</a></li>   
            -->
    </ul>
</li>
<!--TEC
<li class="submenu <?php if($menu === 'tecs')echo "active open" ?>">
        <a href=""><i class="fa fa-heartbeat" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>T.E.C</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($submenu === 'ntecs') echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/tecs/nuevoIngreso"); ?>">Nuevo Ingreso T.E.C</a></li>
            <li <?php if($submenu === 'ltecs')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/tecs/listarIngreso"); ?>">Listar Ingresos T.E.C</a></li>            
        </ul> 
</li>
<!-- VISITAS
<li class="submenu <?php if($menu === 'visitas')echo "active open" ?>">
    <a href="#"><i class="fa fa-street-view" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Visitas</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($submenu === 'nvisitas') echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/visitas/inicio"); ?>">Pacientes</a></li>
        </ul> 
</li>
<!--DEPOSITOS-->
<li class="submenu <?php if($menu === 'depositos')echo "active open" ?>">
    <a href=""><i class="fa fa-usd" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span> Depositos</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($submenu === 'ndeposito') echo "class='active'" ?>><a href="<?php echo base_url("hd_admision/devoluciones/listarIngreso"); ?>">Nuevo Deposito</a></li>
            <li <?php if($submenu === 'ldeposito') echo "class='active'" ?>><a href="<?php echo base_url("hd_admision/devoluciones/listarDevolucion"); ?>">Listar Depositos Sin Rendir</a></li>            
            <li <?php if($submenu === 'rdeposito') echo "class='active'" ?>><a href="<?php echo base_url("hd_admision/devoluciones/listarRendicion"); ?>">Listado de Rendiciones</a></li>            
        </ul> 
</li>
<!--
<li class="<?php if($this->uri->segment(2) == 'ingreso' )echo "active open" ?>">
    <a href="<?php echo base_url("clinica_admision/ingresos/licencias"); ?>"><i class="fa fa-file-text-o" aria-hidden="true" style=" width: 20px;text-align: center"></i>&nbsp;Licencias<i class="arrow fa fa-chevron-right"></i></a>
    <!--    
        <ul>
            
            <li <?php if($this->uri->segment(2) == 'ingreso' && $this->uri->segment(3) == 'agregar') echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/ingresos/licencias"); ?>">Nuevo Deposito</a></li>
            <li <?php if($this->uri->segment(2) == 'ingreso' && $this->uri->segment(3) == 'listar')  echo "class='active'" ?>><a href="<?php echo base_url("clinica_admision/devoluciones/listarDevolucion"); ?>">Listar Depositos</a></li>            
        </ul> 
    
</li>
-->
<!-- PREFACTURAS-->
<?php IF($this->session->userdata('perfil') == '11' || $this->session->userdata('perfil') == '12'){?>
<li class="submenu <?php if($menu === 'prefacturas')echo "active open" ?>">
    <a href="#"><i class="fa fa-money" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Prefacturas</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($submenu === 'lprefacturas')  echo "class='active'" ?>><a href="<?php echo base_url("hd_admision/prefacturas/listarPrefacturas"); ?>">Listar Prefacturas</a></li>            
        </ul> 
</li>
<?php }?>
<!-- MANTENEDORES-->
<?php IF($this->session->userdata('perfil') == '11'){?>
<li class="submenu <?php if($menu === 'mantenedores')echo "active open" ?>">
    <a href="#"><i class="fa fa-users" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Mantenedores</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            <li <?php if($submenu === 'umantenedor')  echo "class='active'" ?>><a href="<?php echo base_url("hd_admision/modificar/listar_usuarios"); ?>">Usuarios</a></li>            
        </ul> 
</li>

<?php } ?>

       
    </ul>
</div><!-- sidebar -->
