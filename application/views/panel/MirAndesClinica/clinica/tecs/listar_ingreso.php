

<div id="content" style="-webkit-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
-moz-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25; background-color: #db8918">
    <div id="content-header" style="background-color: #e9c899; max-height: 10px !important" >
        <h1 style="background-color: #a15ebe !important;border:none;color:#ffffff; margin-right: 30px;-webkit-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);" class="alert alert-info"><?php echo $title;?></h1>
    </div>
    
    
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12"></div>
                

	<!--		
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" style="border-color: #000000;"  >
            
                            
            
                <div class='widget-title'>
                    <br>
                    <div class="col-lg-12" style="margin-top: -10px;">
                    <label>Datos de Ficha</label>
                    </div>
                    <?php $attributes = array('id' => 'form');
                        echo form_open('clinica_enfermeria/ingresos/filtrolistarIngreso',$attributes);
                    ?>
                    <br>
                    <div class="col-lg-1">
                        <label>Filtrar</label>
                    </div>
                    <div class='col-lg-3'>
                        <input name="filtro" type="text" placeholder="Digite rut de paciente o N° de ficha" minlength="3">
                    </div>
                    
                </div>
               
                    <div class="col-lg-1">
                        <?php echo form_submit('','Buscar','class="btn btn-primary btn-sm btnCetep"');?>
                    </div>
            <!-- FIN DIV FICHA COMPLETA
                <div class="col-lg-12" ></div>
                <?php echo form_close();?>
                 
    </div> 
-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container"  >
                <br>
                <div  class="col-lg-12" style="padding-top: 30px; overflow: auto;">
                    
                <table class='table table-bordered table-hover table-striped data-table'>
                        <thead>
                            <tr>
                                <th>Fecha Registro</th>
                                <th>Run</th>
                                <th>N° Registro</th>
                                <th>Nombres</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <?php IF($this->session->userdata('perfil') <= '2'){ ?>
                                    <th>Consentimiento</th>
                                <?php } ?>
                                <th>Usar Sesion</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php foreach ($datos as $item) : ?>
                            <tr>
                                <td><?php echo $item->tecFechaIngreso; ?></td>
                                <td><?php if(!empty($item->rut)) echo formatearRut($item->rut); ?></td>
                                <td><?php echo $item->tecFicha; ?></td>
                                <td><?php echo strtoupper($item->nombres); ?></td>
                                <td><?php echo strtoupper($item->apellidoPaterno); ?></td>
                                <td><?php echo strtoupper($item->apellidoMaterno); ?></td>
                                <?php IF($this->session->userdata('perfil') <= '2'){ ?>
                                <td align="center">
                                    <a class="tip-bottom" title="Imprimir consentimiento T.E.C" href="<?php echo base_url("clinica_enfermeria/impresiones/imprimirImprimirTEC/" . $item->tecId )?>"><i class="fa fa-print" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                </td>
                                <?php } ?>
                                <td align="center">
                                    <a class="tip-bottom" style="color:green" title="Utilizar Session" href="<?php echo base_url("clinica_enfermeria/tecs/nuevaSession/" . $item->tecId )?>"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                </td>
                                <td align="center">
                                    <!--
                                    <a class="tip-bottom" title="Imprimir T.E.C" href="<?php echo base_url("clinica_enfermeria/impresiones/imprimirImprimirTEC/" . $item->tecId )?>"><i class="fa fa-print" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                    -->
                                    <a class="tip-bottom" title="Modificar registro" href="<?php echo base_url("clinica_enfermeria/tecs/cargarModificarTec/" . $item->tecId )?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                    
                                    
                                    <a class="tip-bottom" onclick="return confirm('¿Confirma que desea eliminar este registro?')" style="color:red" title="Desechar Registro" href="<?php echo base_url("clinica_enfermeria/tecs/eliminar/" . $item->tecId )?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    <!--
                                    <a class="tip-bottom" style="color:green" title="Nueva Session" href="<?php echo base_url("clinica_enfermeria/tecs/nuevaSession/" . $item->tecId )?>"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                                    -->
                                </td>
                            </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                
                <div class="col-lg-2">
                    <!--
                    <button onclick="goBack()" class="btn btn-default btn-sm">Cancelar</button><script>function goBack(){window.history.go(-1);}</script>
                -->
                </div>
        </div><!-- div class='widget-content'-->    
                    
                
                
            </div><!-- div class="col-xs-12" -->
        </div><!-- row -->
   </div>
</div><!-- content -->
</div>
<?php
function formatearRut( $rut ) {
     while($rut[0] == "0") {
            $rut = substr($rut, 1);
        }
        $factor = 2;
        $suma = 0;
        for($i = strlen($rut) - 1; $i >= 0; $i--) {
            $suma += $factor * $rut[$i];
            $factor = $factor % 7 == 0 ? 2 : $factor + 1;
        }
        $dv = 11 - $suma % 11;
        /* Por alguna razón me daba que 11 % 11 = 11. Esto lo resuelve. */
        $dv = $dv == 11 ? 0 : ($dv == 10 ? "K" : $dv);
        $rut=  $rut . $dv;
return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
}
?>
    
<script src="<?php echo base_url(); ?>../assets/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/hs.tables.js"></script>



