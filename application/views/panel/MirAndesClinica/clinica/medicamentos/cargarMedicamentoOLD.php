<?php error_reporting(E_ALL ^ E_NOTICE); ?>

<style>
    .titulo{
        color: #a15ebe;
    }
    
    .icon{
            width: 40%;
            padding-top: 5%;
            padding-left: 5%;
    }
    .iconCom{
            width: 35%;
            padding-top: 6%;
            margin-left: -69px;
    }
    
    .cuerpo{
        width: 70px;
    }
    .cuerpo2{
        width: 50px;
    }
    .cuerpocsv{
        width: 120px;
    }
    select{
        max-width: 200px;
    }
    textarea{
        width: 100%;
        height: 100px;
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
                

			
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" style="border-color: #000000;"  >
           
                            
            <div class='widget-content'>
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
                    
                    
                
                
                <!-- DATOS DE PERSONALES--> 
                
                <div id="imprimir">
                    <!--
                <div class="col-lg-12" align="center"><h2 class="titulo">LOG DE COMENTARIOS</h2></div>
                <div class="col-lg-12"><br></div>
                    -->
                    
                                 
                    <div class="col-lg-12">
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
                        <label>Sexo: </label> <?php echo strtoupper($datos->sexo); ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Fecha de Nacimiento: </label> <?php echo $datos->fechaNacimiento; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Nacionalidad: </label> <?php IF ($datos->nacionalidad === '1') echo 'CHILENA';ELSEIF ($datos->nacionalidad === '2') echo 'EXTRANJERA' ?>
                    </div>
                    <div class="col-lg-12" ></div>
                    <div class="col-lg-3">
                        <label>Dirección: </label> <?php IF(!empty($datos->direccion))echo strtoupper($datos->direccion); ?>
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
                    <div class="col-lg-5">
                        <label>Email: </label> <?php IF(!empty($datos->email))echo strtoupper($datos->email); ?>
                    </div>
                    <div class="col-lg-12" ><hr style="height: 2px"></div>  
                
                
                    <div class="col-lg-12" style="margin-left:30px">               
                    <button onclick="goBack(<?php echo $datos->id;?>)" class="btn btn-default btn-sm btnVolver">Volver</button><script>function goBack(){window.history.go(-1);}</script>
                
                </div>
                <?php $attributes = array('id' => 'form');
                echo form_open('clinica_enfermeria/ingresos/guardarComentario',$attributes);
                ?>
                <input type="hidden" value="<?php echo $datos->id;?>" name="fichaElectro">
                <input type="hidden" value="<?php echo $datos->rut;?>" name="rut">
                
                <div class="col-lg-12"><br></div>
                    <div class="col-lg-12">
                    <label class="titulo">Historia de Médicamentos</label>
                    </div>
                <div class="col-lg-12" style=" overflow-x: auto">
                    <?php IF(!empty($medicamento)) {; ?> 
                    <table>
                        <thead>
                            <tr>
                                <td align="center"><b>Suspender</b> </td>
                                <td align="center"><b>Periodo</b></td>
                                <td align="center"><b>Vía</b></td>
                                <td align="center"><b>Fármaco</b></td>
                                <td align="center"><b>Horario</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            
                        
                            <?php foreach ($medicamento as $item) : ?>
                            <?php 
                                $medAdmHora = strtotime ( '0 hours' , strtotime ( $item->medAdmHora ) ) ;
                                $dia = date ('D',$medAdmHora);
                                IF($dia==='Mon')$dia='Lun';ELSEIF($dia==='Tue')$dia='Mar';ELSEIF($dia==='Wed')$dia='Mier';ELSEIF($dia==='Thu')$dia='Jue';ELSEIF($dia==='Fri')$dia='Vier';ELSEIF($dia==='Sat')$dia='Sab';ELSEIF($dia==='Sun')$dia='Dom';
                                $medAdmHora = date ('d-m H:i',$medAdmHora);
                                $medAdmHora = $dia.',<br>'.$medAdmHora;
                                //die($medAdmHora);
                               //IF($per === $item->medHora)$per = '';                     ELSE $per       = $item->medHora; 
                               //IF($id === $item->medRegistro)$id = '';                   ELSE $id        = $item->medRegistro;
                               //IF($fechaReg === $item->medFechaRegistro)$fechaReg = '';  ELSE $fechaReg  = $item->medFechaRegistro;
                               //
                                IF($farm != $item->descripcion){
                                    $farm = $item->descripcion;$tr = '</tr>';
                                    $fecha60 = date('Y-m-d H:i:s');
                                    $fecha60 = strtotime ( '+1 hours' , strtotime ( $fecha60 ) ) ;
                                    $fecha60 = date ( 'Y-m-d H:i:s' , $fecha60 );
                                    $fecha30 = date('Y-m-d H:i:s');
                                    $fecha30 = strtotime ( '-1 hours' , strtotime ( $fecha30 ) ) ;
                                    $fecha30 = date ( 'Y-m-d H:i:s' , $fecha30 );
                                
                            ?>
                            <tr>
                                    <!--<td align="center"><?php echo $item->medAdmId.'_'.$item->medAdmRegistro ?></td>
                                    -->
                                    <td align="center">
                                    <a class="tip-bottom" title="Suspender Médicamento" style="color:red"  href="<?php echo base_url("clinica_enfermeria/medicamentos/suspender_medicamento/".$item->medAdmRegistro.'_'.$item->medAdmMedicamento )?>">
                                            <i class="fa fa-ban" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td align="center"><?php echo $item->medHora; ?></td>
                                    <td align="center"><?php echo $item->viaNombre; ?></td>
                                    <td align="center"><?php echo $farm; ?></td>
                                    <td align="center" style=" border-right:1px solid #CCCCCC">
                                        <?php IF($item->estId==='0' && $item->medAdmHora <= $fecha60){?>
                                        <a class="tip-bottom" title="Administrar Médicamento" style="color:red"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                            <b><?php echo $medAdmHora; ?></b><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                        <?php } ELSEIF($item->estId==='0' && $item->medAdmHora >= $fecha30){?>
                                        <a class="tip-bottom" title="Administrar Médicamento" style="color:#393836;"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                            <?php echo $medAdmHora; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                        <?php } ELSEIF($item->estId==='1'){?>
                                        <a class="tip-bottom" title="Médicamento Administrado" style="color:green;"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                            <?php echo $medAdmHora; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                        <?php } ELSEIF($item->estId==='2'){?>
                                        <a class="tip-bottom" title="1/4 Médicamento" style="color:#85C1E9;"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                            <?php echo $medAdmHora; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                        <?php } ELSEIF($item->estId==='3'){?>
                                        <a class="tip-bottom" title="1/2 Médicamento" style="color:#4CA5E0;"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                            <?php echo $medAdmHora; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                         <?php } ELSEIF($item->estId==='4'){?>
                                        <a class="tip-bottom" title="3/4 Médicamento" style="color:#3498DB;"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                            <?php echo $medAdmHora; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                        <?php } ELSE {;?>
                                        <a class="tip-bottom" title="Administrar Médicamento" style="color:green;"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                            <?php echo $medAdmHora; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                        <?php } ?>
                                    </td>
                            <?php
                                } ELSE {$tr = $farm =  '';
                            ?>    
                                    <td align="center" style=" border-right:1px solid #CCCCCC; min-width: 40px">
                                        <?php IF($item->estId==='0' && $item->medAdmHora <= $fecha60){?>
                                        <a class="tip-bottom" title="Administrar Médicamento" style="color:red"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                            <b><?php echo $medAdmHora; ?></b><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                        <?php } ELSEIF($item->estId==='0' && $item->medAdmHora >= $fecha30){?>
                                        <a class="tip-bottom" title="Administrar Médicamento" style="color:#393836;"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                            <?php echo $medAdmHora; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                        <?php } ELSEIF($item->estId==='1'){?>
                                        <a class="tip-bottom" title="Médicamento Administrado" style="color:green;"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                            <?php echo $medAdmHora; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                        <?php } ELSEIF($item->estId==='2'){?>
                                        <a class="tip-bottom" title="1/4 Médicamento" style="color:#85C1E9;"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                            <?php echo $medAdmHora; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                        <?php } ELSEIF($item->estId==='3'){?>
                                        <a class="tip-bottom" title="1/2 Médicamento" style="color:#4CA5E0;"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                            <?php echo $medAdmHora; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                         <?php } ELSEIF($item->estId==='4'){?>
                                        <a class="tip-bottom" title="3/4 Médicamento" style="color:#3498DB;"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                            <?php echo $medAdmHora; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                        <?php } ELSE {;?>
                                        <a class="tip-bottom" title="Administrar Médicamento" style="color:green;"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                            <?php echo $medAdmHora; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                        <?php } ?>
                                    </td>

                            <?php echo $tr;} ?>

                            <?php //IF($farm === $item->descripcion)$farm = $item->descripcion;ELSE $farm = ''; IF($per != $item->medHora)$per = $item->medHora; ; IF($id != $item->medRegistro)$id = $item->medRegistro;?>
                            <?php $farm = $item->descripcion; $per = $item->medHora; $id = $item->medRegistro?>
                            <?php endforeach; ?>
                                    
                                   </tbody>
                    </table>
                    <?php };?>    
                        
                    
                    </div>
                <div class="col-lg-12"><br></div>
                
                <div class="col-lg-12">
                    <?php IF(empty($medicamento))echo 'Sin Fármacos para administrar';?> 
                </div>
                 
                    <div class="col-lg-12" align="right"><hr>
                        <?php //echo form_submit('','Guardar','class="btn btn-primary btn-sm btnCetep"');?>
                    </div>
                    
</div><!-- FIN DIV FICHA COMPLETA-->
                
            <?php echo form_close();?>
                
                
                
                <?php $attributes = array('id' => 'form2');
                    echo form_open('clinica_enfermeria/medicamentos/guardarMedicamentoAsignar',$attributes);
                ?>
                
                <input type="hidden" value="<?php echo $datos->id;?>" name="fichaElectro">
                <input type="hidden" value="<?php echo $datos->rut;?>" name="rut">
                <div class="col-lg-12">
                    <div class="col-lg-1">
                        <label>Fármaco</label>
                    </div>
                    <div class="col-lg-2">
                        <select name="farmaco" id="farmaco" style="min-width:250px">
                            <option value="0">Seleccione...</option>
                            <?php FOREACH($farmacos as $farm):?>
                            <option value="<?php echo $farm->idfarmaco;?>"><?php echo strtoupper($farm->descripcion);?></option>
                            <?php ENDFOREACH;?>
                        </select>
                        
                    </div>
                    <div class="col-lg-1" align="left">
                        <img class="iconCom" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconFarmaco"/>
                    </div>
                    <div class="col-lg-1">
                        <label>Vía</label>
                    </div>
                    <div class="col-lg-3" style=" margin-left:-50px">
                        <select name="via" id="via">
                            <?php FOREACH($vias as $via):?>
                            <option value="<?php echo $via->viaId;?>"><?php echo $via->viaNombre;?></option>
                            <?php ENDFOREACH;?>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <label>Periodo</label>
                    </div>
                    <div class='col-lg-3'>
                        <input type="number" name="periodo" placeholder=" cada..." maxlength="2" required style="width: 140px;border-radius: 4px;background-image: none;border: 1px solid #CCCCCC;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;height: 28px;"> Hrs
                    </div>
                    
                    
                    <div class="col-lg-12"><br></div>
                    
                    <div class="col-lg-3">
                        <label>Fecha de Término de Administración del Médicamento</label>
                    </div>
                    <div class='col-lg-4'>
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <?php   
                                    $nuevafecha = strtotime ( '+5 day' , strtotime ( date('Y-m-d') ) ) ;
                                    $nuevafecha = date ( 'd-m-Y' , $nuevafecha );
                            ?>
                            <input type="text" class="form-control" required placeholder="día-mes-año" style=" width: 158px !important" name="fechaHasta" minlength="10" maxlength="10" title="Ingrese una fecha valida" value="<?php echo $nuevafecha;?>">
                        </div>
                    </div> 
                    <div class="col-lg-12"><br></div>
                    
                </div>
                
                <div class="col-lg-12"></div>
                <div class="col-lg-6" align="right">
                    <?php echo form_submit('','Agregar','class="btn btn-primary btn-sm btnCetep"');?>
                </div>
                <div class="col-lg-12"><br></div>
                    
</div><!-- FIN DIV FICHA COMPLETA-->
                
                <?php echo form_close();?>
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


<script>
    $(".iconCom").hide();

    $("#form2").submit(function () {  
    
    $(".iconCom").hide();
    if($("#farmaco").val()==0) {  
        $("#iconFarmaco").show();
        //alert("Seleccione un Fármaco");  
        return false;
    } 
});  
</script>

<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=500,width=800');
        mywindow.document.write('<html><head><title></title>');
        mywindow.document.write('<style>\n\
                            @page {size: Letter;margin: 25px}\n\
                            body{font-size: 100%;font-family: Arial;} \n\
                            .titulo{font-weight: bold;font-size: 90%;} \n\
                            .ocultarImpresion{font-size:0px; border:none; width:0px} \n\
                            input{border:none}\n\
                            textarea{border:none}\n\
                            select{border:none}\n\
                            label{font-weight: bold;}\n\
    .cabeza{background-color: #da812e !important;-webkit-text-fill-color: white;-webkit-text-stroke: 1px grey;}\n\
    .cuerpo{width: 70px;}\n\
    .cuerpo2{width: 50px;}\n\
    select{max-width: 200px;}\n\
    textarea{width: 100%;height: 100px;} \n\
</style>');
    
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.print();
        mywindow.close();
        
        //goBack();
        return true;
    }
    function goBack(id)
    {
        location.href="<?php echo base_url(); ?>"+"clinica_enfermeria/ingresos/cargarNuevoRegistro/"+id;
        
        //window.history.go(-1);
    }
    
</script>

