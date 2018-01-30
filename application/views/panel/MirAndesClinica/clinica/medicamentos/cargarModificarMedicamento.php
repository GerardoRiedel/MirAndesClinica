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
                        <?php echo $evoId;?>
                    <button onclick="goBack(<?php echo $evoId;?>)" class="btn btn-default btn-sm btnVolver">Cancelar</button><script>function goBack(){window.history.go(-1);}</script>
                    
                </div>
                    
                <?php $attributes = array('id' => 'form2');
                    echo form_open('clinica_enfermeria/medicamentos/guardarMedicamentoAsignar',$attributes);
                ?>
                
                <input type="hidden" value="<?php echo $datos->id;?>" name="fichaElectro">
                <input type="hidden" value="<?php echo $datos->rut;?>" name="rut">
                <input type="hidden" value="<?php echo $medicamento->medId;?>" name="medId">
                <input type="hidden" value="<?php echo $evoId;?>" name="evoId">
                <div class="col-lg-12"><br></div>
                <div class="col-lg-12">
                    <div class="col-lg-2">
                        <label>Fármaco</label>
                    </div>
                    <div class="col-lg-2">
                        <select name="farmaco" id="farmaco" style="min-width:250px">
                            <option value="0">Seleccione...</option>
                            <?php FOREACH($farmacos as $farm):?>
                            <option value="<?php echo $farm->idfarmaco;?>" <?php IF($farm->idfarmaco === $medicamento->medFarmaco)echo 'selected' ;?>><?php echo strtoupper($farm->descripcion);?></option>
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
                            <option value="<?php echo $via->viaId;?>" <?php IF($via->viaId === $medicamento->medVia)echo 'selected' ;?>><?php echo $via->viaNombre;?></option>
                            <?php ENDFOREACH;?>
                        </select>
                    </div>
                   
                    
                    <div class="col-lg-12"><br></div>
                    
                    <div class="col-lg-2">
                        <label>Fecha de  Administración</label>
                    </div>
                    <div class='col-lg-3'>
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <?php   
                            //die($medicamento->medFecha);
                                    IF(!empty($medicamento->medFecha)){
                                        $hora = new DateTime($medicamento->medFecha);
                                        $nuevafecha = $hora->format('d-m-Y');
                                    }
                                    ELSE {
                                        $hora = new DateTime(date('Y-m-d H:i:s'));
                                        $hora = $hora->format('H');

                                        IF($hora >='19')$hora = '1';
                                        ELSE $hora = '0';
                                        $nuevafecha = strtotime ( '+'.$hora.' day' , strtotime ( date('Y-m-d') ) ) ;
                                        $nuevafecha = date ( 'd-m-Y' , $nuevafecha );
                                    }
                                    
                            ?>
                            <input type="text" class="form-control" required placeholder="día-mes-año" style=" width: 158px !important" name="fecha" minlength="10" maxlength="10" title="Ingrese una fecha valida" value="<?php echo $nuevafecha;?>">
                        </div>
                    </div> 
                     <div class="col-lg-1">
                        <label>Dosificación</label>
                    </div>
                    <div class='col-lg-3' >
                            
                        <input type="text" name="hora" placeholder='Separe con "-" (guion) '  required value="<?php IF(!empty($medicamento->medHora))echo $medicamento->medHora;?>">
                    </div>
                    
                     <div class="col-lg-12"><br></div>
                    
                </div>
                
                <div class="col-lg-12"></div>
                <div class="col-lg-6" align="right">
                    
                    <?php 
                    IF(empty($medicamento->medId))echo form_submit('','Agregar','class="btn btn-primary btn-sm btnCetep"');
                    ELSE echo form_submit('','Guardar','class="btn btn-primary btn-sm btnCetep"');
                    ?>
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
    //unction goBack(id)
    //
    //  location.href="<?php echo base_url(); ?>"+"clinica_enfermeria/ingresos/cargarNuevoRegistro/"+id;
    //  
    //  //window.history.go(-1);
    //
    
</script>

