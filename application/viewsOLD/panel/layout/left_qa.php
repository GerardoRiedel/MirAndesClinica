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
<li class="<?php if($this->uri->segment(2) == 'principal') echo "active open" ?>"><a href="<?php echo base_url("qa/charts/"); ?>"><i class="fa fa-home" aria-hidden="true" style=" width: 20px; text-align: center"></i> <span>Inicio</span></a></li>

<!-- DETALLE -->
<li class="submenu <?php if($menu === 'detalle')echo "active open" ?>">
    <a href="#"><i class="fa fa-list" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Detalle</span> <i class="arrow fa fa-chevron-right"></i></a>
        <ul>
            
            <li <?php if($submenu === 'detalle') echo "class='active'" ?>><a href="<?php echo base_url("qa/detalle/index"); ?>">Listar</a></li>
        </ul> 
</li>

<!-- MANTENEDOR 
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
            <li <?php if($submenu === 'herramientas')  echo "class='active'" ?>><a href="<?php echo base_url("qa/detalle/clave"); ?>">Password Puerta</a></li>      
            <li <?php if($submenu === 'pherramientas')  echo "class='active'" ?>><a href="<?php echo base_url("qa/detalle/clavePlataforma"); ?>">Password Plataforma</a></li>      
        </ul> 
</li>
            


    </ul>
</div><!-- sidebar -->
