<?php //error_reporting(E_ALL ^ E_NOTICE); ?>

<style>
    .titulo{
        color: #a15ebe;
    }
    
    .icon{
            width: 40%;
            padding-top: 5%;
            padding-left: 5%;
    }
    .hora{
        display: inline-block;
        padding: 5px 10px;
        font-size: 13px;
        line-height: 18px;
        color: #808080;
        border: 1px solid #ccc;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
    .iconCom{
            width: 35%;
            padding-top: 6%;
            margin-left: -69px;
    }
    
    select{
        max-width: 200px;
    }
    

    
</style>
<div id="content" style="-webkit-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
-moz-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25 ">
    <div id="content-header" style="background-color: #e9c899; max-height: 10px !important" >
        <h1 style="background-color: #a15ebe !important;border:none;color:#ffffff; margin-right: 30px;-webkit-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);" class="alert alert-info"><?php echo $title;?></h1>
    </div>
    
    
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                

			
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container"  >
            <?php $attributes = array('id' => 'form');
            //die(var_dump($datos));
                //echo form_open('hd_admision/ingresos/guardarEvaluaciones',$attributes);
            ?>
                            
            <div class='widget-content'>
                
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    <input type="hidden" value="<?php echo $datos->paciente;?>" name="paciente">     
                    <input type="hidden" value="<?php echo $datos->id;?>" name="fichaElectro">
                    <input type="hidden" value="<?php IF(!empty($eval->evaId))echo $eval->evaId;?>" name="evaluacion">
                    <div class="col-lg-12" ></div>
                    <!-- DATOS DE PERSONALES-->               
                    <div class="col-lg-12"><br>
                    <label class="titulo">Datos Personales</label>
                    </div>
                    <div class="col-lg-3">
                        <label>Rut Paciente: </label> <?php echo formatearRut($datos->rut);?>
                    </div>
                    <div class="col-lg-5">
                        <label>Nombre: </label> <?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno); ?>
                    </div>
                <div class="col-lg-12" ></div>    
                    <div class="col-lg-3">
                        <?php IF(!empty($datos->sexo))$sexo = $datos->sexo;ELSE $sexo = '-';?>
                        <label>Sexo: </label> <?php echo $sexo; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Fecha de Nacimiento: </label> <?php echo $datos->fechaNacimiento; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Edad: </label> <?php echo calculaedad($datos->fechaNacimiento); ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Nacionalidad: </label> <?php IF ($datos->nacionalidad === '1') echo 'CHILENA';ELSEIF ($datos->nacionalidad === '2') echo 'EXTRANJERA' ?>
                    </div>
                    <div class="col-lg-12" ></div>
                    <div class="col-lg-3">
                        <label>Dirección: </label> <?php IF(!empty($datos->direccion))echo strtoupper($datos->direccion); ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Comuna: </label> <?php echo strtoupper($datos->comuna);?>
                    </div>
                    <div class="col-lg-3">
                        <label>Teléfono Fijo: </label> <?php IF(!empty($datos->telefono))echo $datos->telefono; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Teléfono Movil: </label> <?php IF(!empty($datos->celular))echo $datos->celular; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Ocupación: </label> <?php IF(!empty($datos->ocupacion))echo strtoupper($datos->ocupacion); ?>
                    </div>
                    <div class="col-lg-4">
                        <label>Email: </label> <?php IF(!empty($datos->email))echo strtoupper($datos->email); ?>
                    </div>
               
                    <div class="col-lg-12">
                        <button style="width:10%" onclick="window.history.go(-1);" class="btn btn-default btn-sm btnVolver">Volver</button>
                    
                        <a class="tip-bottom" title="Imprimir Historico" href="<?php echo base_url("hd_admision/impresiones/imprimirHistorico/".$datos->paciente )?>"><i class="fa fa-print" aria-hidden="true"></i></a>&nbsp;&nbsp;
                        
                    </div>
                
                <div class="col-lg-12" style=" overflow-x: auto">
                    <table class='table table-bordered table-hover table-striped data-table'>
                <thead>
                    
                    <th style="display:none"></th>
                    <th>FECHA</th>
                    <th>ESPECIALIDAD</th>
                    <th>USUARIO</th>
                    <th>PROCESO</th>
                    <th>OBSERVACION</th>
                    <th>OPCIONES</th>
                </thead>
                <tbody>
            <?php FOREACH ($evaluaciones as $eva){;?>
                <tr>
                    
                    <td style="display:none"><?php echo $eva->evaFechaRegistro;?></td>
                    
                    <td style="width:88px;  " align="center"><?php $date = new DateTime($eva->evaFechaRegistro);echo $date->format('d-m-Y');?></td>
                    <td style="width:85px" ><?php IF($eva->perId >= '14' && $eva->perId <= '17' ) echo $eva->perNombreCorto; ELSEIF($eva->evaUsuario==='10003')echo 'Terapeuta';ELSE echo $eva->perNombre;?></td>
                    <td style="width:85px" ><?php echo strtoupper($eva->uspNombre).' '.strtoupper($eva->uspApellidoP);?></td>
                    <td style="width:85px" ><?php echo $eva->evaProceso;?></td>
                    <td align=" justify" style=" max-height: 50px"><?php 
                        IF(!empty($eva->evaObservacion))echo $eva->evaObservacion;
                        ELSEIF(!empty($eva->evaObservacion)||!empty($eva->ingAntGenerales)||!empty($eva->ingInfFamiliar)||!empty($eva->ingConsideraciones) ) {
                            echo '<div style="overflow: auto"> ';
                            echo '<u>Antecedentes Generales:</u><br>'.$eva->ingAntGenerales.'<br>';
                            echo '<u>Antecedentes de Salud:</u><br>'.$eva->ingAntGenerales.'<br>';
                            echo '<u>Información Familiar:</u><br>'.$eva->ingInfFamiliar.'<br>';
                            echo '<u>Consideraciones:</u><br>'.$eva->ingConsideraciones.'<br>';
                            echo '</div>';
                        }
                    ?>
                    </td>
                    <td style="width:85px"align="center">
                        <?php IF($eva->evaProceso==='Intervensión'){ //echo $eva->evaId;?>
                            <a class="tip-bottom" title="Imprimir Evaluación" href="<?php echo base_url("hd_admision/impresiones/imprimirEvaluacion/".$eva->evaId )?>"><i class="fa fa-print" aria-hidden="true"></i></a>&nbsp;&nbsp;
                        <?php } ?>
                        <!--
                        <a class="tip-bottom" title="Imprimir Evaluación" href="<?php echo base_url("hd_admision/impresiones/imprimirEvaluacion/".$eva->evaId )?>"><i class="fa fa-print" aria-hidden="true"></i></a>&nbsp;&nbsp;
                        
                        <a class="tip-bottom" title="Modificar Evaluación" href="<?php echo base_url("hd_admision/ingresos/modificarEvaluacion/" . $eva->evaId )?>"><i class="fas fa-edit" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="tip-bottom" onclick="return confirm('¿Confirma que desea eliminar este registro?')" style="color:red" title="Eliminar Evaluación" href="<?php echo base_url("hd_admision/ingresos/eliminarEvaluaciones/" . $eva->evaId )?>"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        -->
                    </td>
                </tr>
            <?php };?>
                </tbody>
            </table>
                </div>
</div><!-- FIN DIV FICHA COMPLETA-->
            
                
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
<script src="<?php echo base_url(); ?>../assets/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/hs.tables.js"></script>

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
function calculaedad($fecha){
            $date2  = date('Y-m-d');//
            $diff   = abs(strtotime($date2) - strtotime($fecha));
            $years  = floor($diff / (365*60*60*24));
            //$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            //$days   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            return $years;
    }
?>


