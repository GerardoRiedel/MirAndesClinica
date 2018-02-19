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
                

			
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container"   >
            <?php $attributes = array('id' => 'form');
            //die(var_dump($datos));
                echo form_open('clinica_enfermeria/ingresos/guardarPlanDeAtencion',$attributes);
            ?>
                            
            <div class='widget-content'>
                
                
                    
                
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
                    <?php //die(var_dump($evoId));?>
                    
                <input type="hidden" value="<?php echo $datos->id;?>" name="registro">
                <input type="hidden" value="<?php echo $evoId;?>" name="evoId">
                <!--
                <input type="hidden" value="<?php echo $datos->rut;?>" name="rut">
                <input type="hidden" value="<?php echo $datos->nombres;?>" name="nombres">
                <input type="hidden" value="<?php echo $datos->apellidoPaterno;?>" name="apellidoPaterno">
                <input type="hidden" value="<?php echo $datos->apellidoMaterno;?>" name="apellidoMaterno">
                <input type="hidden" value="<?php echo $datos->paciente;?>" name="pacId">
                -->
                <div class="col-lg-12" ><br></div>
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
                        <?php IF(!empty($datos->sexo))$sexo = $datos->sexo;ELSE $sexo = '-';?>
                        <label>Sexo: </label> <?php echo $sexo; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Fecha de Nacimiento: </label> <?php IF(!empty($datos->fechaNacimiento)){$date = new DateTime($datos->fechaNacimiento);echo $date->format('d-m-Y');}  ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Edad: </label> <?php IF(!empty($datos->fechaNacimiento))echo calculaedad($datos->fechaNacimiento); ?>
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
               
                <div class="col-lg-12"><hr></div>
                <div class="col-lg-12">
                    <label class="titulo">Riesgos</label>
                </div>
                <div class="col-lg-12"><br></div>
                
                
                
                    
                    <div class='col-lg-6'>
                        <?php IF(!empty($plan->plaRiesgos)){ $riesgos = explode('_', $plan->plaRiesgos); } ?>
                        <input name="rie0" type="checkbox" value="1"  <?php IF(!empty($riesgos) && $riesgos[0]==='1')echo 'checked';?> >
                        Fuga
                    </div>
                    <div class='col-lg-6'>
                        <input name="rie1" type="checkbox" value="1"  <?php IF(!empty($riesgos) && $riesgos[1]==='1')echo 'checked';?> >
                        Agitación Psicomotora
                    </div>
                    <div class='col-lg-6'>
                        <input name="rie2" type="checkbox" value="1"  <?php IF(!empty($riesgos) && $riesgos[2]==='1')echo 'checked';?> >
                        Autoagresión
                    </div>
                <div class='col-lg-6'>
                        <input name="rie3" type="checkbox" value="1"  <?php IF(!empty($riesgos) && $riesgos[3]==='1')echo 'checked';?> >
                        Caídas
                    </div>
                <div class='col-lg-6'>
                        <input name="rie4" type="checkbox" value="1"  <?php IF(!empty($riesgos) && $riesgos[4]==='1')echo 'checked';?> >
                        Heteroagresión
                    </div>
                <div class='col-lg-6'>
                        <input name="rie5" type="checkbox" value="1"  <?php IF(!empty($riesgos) && $riesgos[5]==='1')echo 'checked';?> >
                        Auto-provocación de vómitos (postprandial)
                    </div>
                <div class='col-lg-6'>
                        <input name="rie6" type="checkbox" value="1"  <?php IF(!empty($riesgos) && $riesgos[6]==='1')echo 'checked';?> >
                        Suicidio
                    </div>
                
                
                <div class="col-lg-12"><hr></div>
                <div class="col-lg-12">
                    <label class="titulo">Marcar los cuidados de Enfermería</label>
                </div>
                <div class="col-lg-12"><br></div>
                
                
                
                    
                    <div class='col-lg-6'>
                        <?php IF(!empty($plan->plaCuidados)){ $cuidados = explode('_', $plan->plaCuidados); } ?>
                        <input name="cui0" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[0]==='1')echo 'checked';?> >
                        Peso semanal
                    </div>
                    <div class='col-lg-6'>
                        <input name="cui1" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[1]==='1')echo 'checked';?> >
                        Asistir en el baño y aseo personal
                    </div>
                    <div class='col-lg-6'>
                        <input name="cui2" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[2]==='1')echo 'checked';?> >
                        Asistir en la deambulación
                    </div>
                    <div class='col-lg-6'>
                        <input name="cui3" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[3]==='1')echo 'checked';?> >
                        Asistir en la alimentación
                    </div>
                    <div class='col-lg-6'>
                        <input name="cui4" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[4]==='1')echo 'checked';?> >
                        Cambios de posición cada 2 horas
                    </div>
                    <div class='col-lg-6'>
                        <input name="cui5" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[5]==='1')echo 'checked';?> >
                        Revisión de las zonas de apoyo
                    </div>
                    <div class='col-lg-6'>
                        <input name="cui6" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[6]==='1')echo 'checked';?> >
                        Vigilar la alimentación y registrar la conducta alimentaria
                    </div>
                    <div class='col-lg-6'>
                        <input name="cui7" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[7]==='1')echo 'checked';?> >
                        Evitar ir al baño después de comer
                    </div>
                    <div class='col-lg-6'>
                        <input name="cui8" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[8]==='1')echo 'checked';?> >
                        Higiene del sueño (evitar siestas, levantadas y acostadas en horario establecido)
                    </div>
                    <div class='col-lg-6'>
                        <input name="cui9" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[9]==='1')echo 'checked';?> >
                        Administrar fármacos de la noche acostadas en sus camas
                    </div>
                    <div class='col-lg-6'>
                        <input name="cui10" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[10]==='1')echo 'checked';?> >
                       Vigilancia y observación 24horas continuas por cuidadora
                    </div>
                    <div class='col-lg-6'>
                        <input name="cui11" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[11]==='1')echo 'checked';?> >
                       Contención verbal y ambiental
                    </div>
                    <div class='col-lg-6'>
                        <input name="cui12" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[12]==='1')echo 'checked';?> >
                       Contención farmacológica con SOS según indicación médica
                    </div>
                    <div class='col-lg-6'>
                        <input name="cui13" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[13]==='1')echo 'checked';?> >
                      Avisar en caso de angustia que no ceda a medicamento oral o sublingual
                    </div>
                    <div class='col-lg-6'>
                        <input name="cui14" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[14]==='1')echo 'checked';?> >
                       Cuidados paciente con contención física (seguir protocolo de contención)
                    </div>
                    <div class='col-lg-6'>
                        <input name="cui15" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[15]==='1')echo 'checked';?> >
                       Fomentar participación en actividades recreativas y talleres
                    </div>
                    <div class='col-lg-6'>
                        <input name="cui16" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[16]==='1')echo 'checked';?> >
                       Orientar en fechas y en espacio físico
                    </div>
                    <div class='col-lg-6'>
                        <input name="cui17" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[17]==='1')echo 'checked';?> >
                       Observar conducta con el resto de los pacientes y el equipo de enfermería
                    </div>     
                    <div class='col-lg-6'>
                        <input name="cui18" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[18]==='1')echo 'checked';?> >
                       Observar conducta con las visitas y registrar
                    </div>      
                    <div class='col-lg-6'>
                        <input name="cui19" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[19]==='1')echo 'checked';?> >
                       Restricción de visitas (ver indicación en Hoja de Enfermería)
                    </div>      
                    <div class='col-lg-6'>
                        <input name="cui20" type="checkbox" value="1"  <?php IF(!empty($cuidados) && $cuidados[20]==='1')echo 'checked';?> >
                       Restricción de llamadas (ver indicación en Hoja de Enfermería)
                    </div>      
                

                 <div class="col-lg-12"><hr></div>
                <div class="col-lg-12">
                    <label class="titulo">Otros Cuidados de Enfermería</label>
                </div>
                <div class="col-lg-12"><br></div>
                <div class="col-lg-12"><textarea style="width:100%" name="plaOtros"><?php IF(!empty($plan->plaOtros))echo $plan->plaOtros ?></textarea></div>
                <div class="col-lg-12"><br></div>
                
                
                
                
                   
                
                
                
                
                
                    
                    
                    <div class="col-lg-12"></div>
                    <div class="col-lg-6" align="right" >
                        <?php echo form_submit('','Guardar','class="btn btn-primary btn-sm btnCetep"');?>
                    </div>
                    <div class="col-lg-2">
                        <a href="<?php echo base_url("clinica_enfermeria/ingresos/cargarNuevoIngresoEnfermeria/".$datos->id )?>"   class="btn btn-default btn-sm btnVolver">Volver</a><script> //function goBack(){window.history.go(-1);}</script>
                 <!--
                        <button onclick="goBack()" class="btn btn-default btn-sm btnVolver">Cancelar</button><script>function goBack(){window.history.go(-1);}</script>
                 -->
                    </div>
                    <div class="col-lg-1">
                        <span class='icon'>
                            <i class='fa fa-print' onclick="PrintElem('#imprimir')" style="cursor: pointer; color:#1d1c19; font-size:22px" title="Imprimir"></i>
                        </span>
                    </div>
                    
                    
                    <div class="col-lg-12"><br></div>
                
                 <?php echo form_close();?>
                    
                    
                    
<!-- FIN DIV FICHA COMPLETA-->
            
                
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


<script>
    $(".iconCom").hide();
</script>
<script>
    $("#form").submit(function () {  
    $(".iconCom").hide();
    if($("#medico").val()==0) {  
        $(".iconCom").show();
        //alert("Seleccione medico emisor");  
        return false;
    } 
    if($("#licDias").val()<=0) {  
        alert("Dias de licencia inválido");  
        return false;
    }
});  
</script>
<script>
    
    $("#rut").focusout(function(){
       
        ////LIMPIAR INPUTS
        document.getElementById("nombres").value = "";document.getElementById("apePat").value = "";document.getElementById("apeMat").value = "";document.getElementById("fecha").value = ""; document.getElementById("telFijo").value = ""; document.getElementById("telCelu").value = ""; document.getElementById("direccion").value  = ""; document.getElementById("email").value = ""; document.getElementById("ocupacion").value  = ""; document.getElementById("rutTitular").value = ""; document.getElementById("rutApo").value = "";
        $("#rut").attr("disabled", false).css("border-color",'#ccc');
        $("#divFicha").show();  
        var rut = $( "#rut" ).val();
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var letra = rut.substring(0, 1);
        
        if (letra === '1' || letra === '2'){var rut = rut.substring(0, 8);}
        else {var rut = rut.substring(0, 7);}

        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                document.getElementById("nombres").value    = data.nombres;
                document.getElementById("apePat").value     = data.apellidoPaterno;
                document.getElementById("apeMat").value     = data.apellidoMaterno;
                document.getElementById("fecha").value      = data.fechaNacimiento;
                document.getElementById("telFijo").value    = data.telefono;
                document.getElementById("telCelu").value    = data.celular;
                document.getElementById("direccion").value  = data.direccion;
                document.getElementById("email").value      = data.email;
                document.getElementById("ocupacion").value  = data.ocupacion;
                document.getElementById("rutTitular").value = rut;
                document.getElementById("rutApo").value     = rut;
                
                //$("input:radio").removeAttr("checked");
                if (data.sexo == 'FEMENINO'){
                    
                    //$("#sex").append('Masculino <input type="radio" name="sexo" value="1">Femenino<input type="radio" name="sexo" value="0" id="femenino" checked>');
                }
                //document.getElementById("sexo").value = data.sexo;
                
                //$('select').empty(append('comuna'));
                $("<option class='one' selected='selected' value='"+data.comId+"'>"+data.comNombre+"</option>").appendTo("#comuna");
            
                //$('select').empty().append('isapre');
                $("<option selected value='"+data.isaId+"'>"+data.isaNombre+"</option>").appendTo("#isapre");
            }
        })
        
        
        $("#rutApo").focusout(function(){
        ////LIMPIAR INPUTS
        document.getElementById("nombresApo").value = ""; document.getElementById("apePatApo").value = ""; document.getElementById("telFijoApo").value = ""; document.getElementById("telCeluApo").value = ""; document.getElementById("direccionApo").value = ""; document.getElementById("emailApo").value = ""; document.getElementById("rutApoEco").value = "";
        $("#rutApoEco").attr("disabled", false).css("border-color","#ccc");
        $("#divFichaApoderado").show();  
        var rut = $( "#rutApo" ).val();
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var rut = rut.substring(0, 8);
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                document.getElementById("nombresApo").value     = data.nombres;
                document.getElementById("apePatApo").value      = data.apellidoPaterno;
                document.getElementById("telFijoApo").value     = data.telefono;
                document.getElementById("telCeluApo").value     = data.celular;
                document.getElementById("direccionApo").value   = data.direccion;
                document.getElementById("emailApo").value       = data.email;
                document.getElementById("rutApoEco").value      = data.rut;
                
                
               }
        })
        })
        
        $("#rutApoEco").focusout(function(){
        ////LIMPIAR INPUTS
        document.getElementById("nombresApoEco").value = ""; document.getElementById("apePatApoEco").value = ""; document.getElementById("telFijoApoEco").value = ""; document.getElementById("telCeluApoEco").value = ""; document.getElementById("direccionApoEco").value = ""; document.getElementById("emailApoEco").value = "";
        $("#rutEco").attr("disabled", false).css("border-color","#ccc");
        $("#divFichaEconomico").show();  
        var rut = $( "#rutApoEco" ).val();
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var rut = rut.substring(0, 8);
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                document.getElementById("nombresApoEco").value     = data.nombres;
                document.getElementById("apePatApoEco").value      = data.apellidoPaterno;
                document.getElementById("telFijoApoEco").value     = data.telefono;
                document.getElementById("telCeluApoEco").value     = data.celular;
                document.getElementById("direccionApoEco").value   = data.direccion;
                document.getElementById("emailApoEco").value       = data.email;
                
               }
        })
        })
        
        $("#rutDev").focusout(function(){
        ////LIMPIAR INPUTS
        document.getElementById("emailDev").value = ""; document.getElementById("nombresDev").value = ""; document.getElementById("apePatDev").value = "";
        $("#rutEco").attr("disabled", true).css("background-color","transparent");
        var rut = $( "#rutDev" ).val();
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var rut = rut.substring(0, 8);
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                alert(data);
                //AUTOCOMPLETA CAMPOS DEVOLUCIONES
                document.getElementById("emailDev").value           = data.email;
                document.getElementById("nombresDev").value         = data.nombres;
                document.getElementById("apePatDev").value          = data.apellidoPaterno;
                document.getElementById("apeMatDev").value          = data.apellidoMaterno;
                document.getElementById("NCta").value               = data.ctaNumero;
               }
        })
        })
        
    
});
</script>    

<script>
    //////VALIDACIONES DE TECLAS//////
        $("#rut").keyup(function (event){
		var tecla = (document.all) ? event.keyCode : event.which;
                //alert(tecla);
		if(tecla == 8 || tecla == 46){
                    document.getElementById("rut").value = "";
		}
	});
        $("#rutApo").keyup(function (event){
		var tecla = (document.all) ? event.keyCode : event.which;
                //alert(tecla);
		if(tecla == 8 || tecla == 46){
                    document.getElementById("rutApo").value = "";
		}
	});
        $("#rutApoEco").keyup(function (event){
		var tecla = (document.all) ? event.keyCode : event.which;
                //alert(tecla);
		if(tecla == 8 || tecla == 46){
                    document.getElementById("rutApoEco").value = "";
		}
	});
        $("#rutTitular").keyup(function (event){
		var tecla = (document.all) ? event.keyCode : event.which;
                //alert(tecla);
		if(tecla == 8 || tecla == 46){
                    document.getElementById("rutTitular").value = "";
		}
	});
        $("#telFijo").keydown(function (e) {
            alert(event.keyCode);
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
            {}
            else {alert('Ingrese un telefono valido');event.returnValue = false;}
        });
        $("#telCelu").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
            {}
            else {alert('Ingrese un telefono valido');event.returnValue = false;}
        });
        $("#telFijoApo").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
            {}
            else alert('Ingrese un telefono valido');{event.returnValue = false;}
        });
        $("#telCeluApo").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
            {}
            else {alert('Ingrese un telefono valido');event.returnValue = false;}
        });
        $("#nombres").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un nombre valido');event.returnValue = false;}
        });
        $("#apeMat").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un apellido valido');event.returnValue = false;}
        });
        $("#apePat").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un apellido valido');event.returnValue = false;}
        });
        $("#nombresApo").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un nombre valido');event.returnValue = false;}
        });
        $("#apeMatApo").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un apellido valido');event.returnValue = false;}
        });
        $("#apePatApo").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un apellido valido');event.returnValue = false;}
        });

</script>

<div id="imprimir" style="display:none">
                    <div class="col-lg-12">
                    <label class="titulo">Datos Personales</label>
                    </div>
                    
                    <div class="col-lg-3">
                        <label>Rut Paciente: </label> <?php echo formatearRut($datos->rut);?>
                    </div>
                    <div class="col-lg-5">
                        <label>Nombre: </label> <?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno); ?>
                    </div>
               
               
                <div class="col-lg-12"><hr></div>
                <div class="col-lg-12">
                    <label class="titulo">Riesgos</label>
                </div>
                <div class="col-lg-12"><br></div>
                
                
                
                    
                    <div class='col-lg-6'>
                        <?php IF(!empty($plan->plaRiesgos)){ $riesgos = explode('_', $plan->plaRiesgos); } ?>
                        <?php IF(!empty($riesgos) && $riesgos[0]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>'; ?> 
                        Fuga
                    </div>
                    <div class='col-lg-6'>
                        <?php IF(!empty($riesgos) && $riesgos[1]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>'; ?> 
                        Agitación Psicomotora
                    </div>
                    <div class='col-lg-6'>
                        <?php IF(!empty($riesgos) && $riesgos[2]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>'; ?> 
                        Autoagresión
                    </div>
                <div class='col-lg-6'>
                        <?php IF(!empty($riesgos) && $riesgos[3]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>'; ?> 
                        Caídas
                    </div>
                <div class='col-lg-6'>
                        <?php IF(!empty($riesgos) && $riesgos[4]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>'; ?> 
                        Heteroagresión
                    </div>
                <div class='col-lg-6'>
                        <?php IF(!empty($riesgos) && $riesgos[5]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>'; ?> 
                        Auto-provocación de vómitos (postprandial)
                    </div>
                <div class='col-lg-6'>
                        <?php IF(!empty($riesgos) && $riesgos[6]==='1')echo ' <b> <u>Si</u> </b>'; ELSE echo'<u>no</u>'; ?> 
                        Suicidio<br>
                    </div>
                
                
                <div class="col-lg-12"><hr></div>
                <div class="col-lg-12">
                    <label class="titulo">Marcar los cuidados de Enfermería</label>
                </div>
                <div class="col-lg-12"><br></div>
                
                
                
                    
                    <div class='col-lg-6'>
                        <?php IF(!empty($plan->plaCuidados)){ $cuidados = explode('_', $plan->plaCuidados); } ?>
                        <?php IF(!empty($cuidados) && $cuidados[0]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                        Peso semanal
                    </div>
                    <div class='col-lg-6'>
                        <?php IF(!empty($cuidados) && $cuidados[1]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                        Asistir en el baño y aseo personal
                    </div>
                    <div class='col-lg-6'>
                        <?php IF(!empty($cuidados) && $cuidados[2]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                        Asistir en la deambulación
                    </div>
                    <div class='col-lg-6'>
                        <?php IF(!empty($cuidados) && $cuidados[3]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                        Asistir en la alimentación
                    </div>
                    <div class='col-lg-6'>
                        <?php IF(!empty($cuidados) && $cuidados[4]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                        Cambios de posición cada 2 horas
                    </div>
                    <div class='col-lg-6'>
                        <?php IF(!empty($cuidados) && $cuidados[5]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                        Revisión de las zonas de apoyo
                    </div>
                    <div class='col-lg-6'>
                        <?php IF(!empty($cuidados) && $cuidados[6]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                        Vigilar la alimentación y registrar la conducta alimentaria
                    </div>
                    <div class='col-lg-6'>
                       <?php IF(!empty($cuidados) && $cuidados[7]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                        Evitar ir al baño después de comer
                    </div>
                    <div class='col-lg-6'>
                        <?php IF(!empty($cuidados) && $cuidados[8]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                        Higiene del sueño (evitar siestas, levantadas y acostadas en horario establecido)
                    </div>
                    <div class='col-lg-6'>
                        <?php IF(!empty($cuidados) && $cuidados[9]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                        Administrar fármacos de la noche acostadas en sus camas
                    </div>
                    <div class='col-lg-6'>
                        <?php IF(!empty($cuidados) && $cuidados[10]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                       Vigilancia y observación 24horas continuas por cuidadora
                    </div>
                    <div class='col-lg-6'>
                         <?php IF(!empty($cuidados) && $cuidados[11]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                       Contención verbal y ambiental
                    </div>
                    <div class='col-lg-6'>
                         <?php IF(!empty($cuidados) && $cuidados[12]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                       Contención farmacológica con SOS según indicación médica
                    </div>
                    <div class='col-lg-6'>
                         <?php IF(!empty($cuidados) && $cuidados[13]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                      Avisar en caso de angustia que no ceda a medicamento oral o sublingual
                    </div>
                    <div class='col-lg-6'>
                        <?php IF(!empty($cuidados) && $cuidados[14]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                       Cuidados paciente con contención física (seguir protocolo de contención)
                    </div>
                    <div class='col-lg-6'>
                       <?php IF(!empty($cuidados) && $cuidados[15]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                       Fomentar participación en actividades recreativas y talleres
                    </div>
                    <div class='col-lg-6'>
                        <?php IF(!empty($cuidados) && $cuidados[16]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                       Orientar en fechas y en espacio físico
                    </div>
                    <div class='col-lg-6'>
                        <?php IF(!empty($cuidados) && $cuidados[17]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                       Observar conducta con el resto de los pacientes y el equipo de enfermería
                    </div>     
                    <div class='col-lg-6'>
                        <?php IF(!empty($cuidados) && $cuidados[18]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                       Observar conducta con las visitas y registrar
                    </div>      
                    <div class='col-lg-6'>
                        <?php IF(!empty($cuidados) && $cuidados[19]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                       Restricción de visitas (ver indicación en Hoja de Enfermería)
                    </div>      
                    <div class='col-lg-6'>
                        <?php IF(!empty($cuidados) && $cuidados[20]==='1')echo '<b> <u>Si</u> </b>'; ELSE echo'<u>no</u>';?>
                       Restricción de llamadas (ver indicación en Hoja de Enfermería)
                    </div>      
                <br>

                 <div class="col-lg-12"><hr></div>
                <div class="col-lg-12">
                    <label class="titulo">Otros Cuidados de Enfermería</label>
                </div>
                <div class="col-lg-12"><br></div>
                <div class="col-lg-12"><textarea style="width:100%"><?php IF(!empty($plan->plaOtros))echo $plan->plaOtros ?></textarea></div>
                <div class="col-lg-12"><br></div>
               
</div>
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=680,width=900');
        mywindow.document.write('<html><head><title></title>');
        mywindow.document.write('<style>'+
                '@page {size: Letter;margin: 25px} '+
                '.di{border-width:1px;border-radius: 2px;border: 1px solid black;}'+
                'table{border-collapse: collapse; border:black 2px solid; } '+
                'td{border:grey 1px solid; height:25px;} '+
                '.cuboNegro{width: 16px;height: 16px;text-align: center;font-size: 11px;border-width:1px; border-color: black;border-radius: 1px; color:white; } '+
                '.cubo{text-align: center;width:16px; height:16px; border-width:1px; border-color: black;border-radius: 1px;font-family:courier;font-size:15px} '+
                '.espacio{line-height:20%;} '+
                'body{font-size: 80%;font-family: Arial;} '+
                '.subir{margin-top:-50px} '+
                'blockquote{margin-top:-15px} '+
                '.titulo{font-weight: bold;} '+
                'label{font-weight: bold; }'+
                '.cuadrado{color:black;width: 20px; height: 20px; border: 1px solid #555;} '+
                '.cuadradoCheck{width: 20px; height: 20px; border: 10px solid #555;}'+
                '</style>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.print();
        mywindow.close();
        //goBack();

        return true;
    }
    function goBack()
    {
       window.history.go(-1);
    }
    
</script>





