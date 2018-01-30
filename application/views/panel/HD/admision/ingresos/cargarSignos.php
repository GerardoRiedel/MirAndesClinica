<?php error_reporting(E_ALL ^ E_NOTICE); ?>

<style>
    .titulo{
        color: #a15ebe;
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
                

			
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" style="border-color: #000000;"  >
            <?php $attributes = array('id' => 'form');
            //die(var_dump($datos));
                echo form_open('hd_admision/ingresos/guardarSignos',$attributes);
            ?>
                            
            <div class='widget-content'>
                
                <!--    
                    <div class="col-lg-12">
                    <label class="titulo">Datos de Ficha</label>
                    </div>
                    <div class="col-lg-2">
                        <label>Fecha de Derivación</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="fechaDeribacion" class="in" type="text" minlength="7" value="<?php IF(!empty($datos->fechaDerivacion))echo $datos->fechaDerivacion;?>" readonly="true">
                    </div>
                    <div class="col-lg-2">
                        <label>Fecha de Ingreso</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="fechaIngreso" class="in" type="text" minlength="7" required value="<?php IF(!empty($datos->fechaIngreso))echo $datos->fechaIngreso;?>">
                    </div>
                    <div class="col-lg-12"></div>
                 -->   
                    
                    
                
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
                    
                <input type="hidden" value="<?php echo $datos->id;?>" name="fichaElectro">
                <input type="hidden" value="<?php echo $datos->rut;?>" name="rut">
                <input type="hidden" value="<?php echo $datos->nombres;?>" name="nombres">
                <input type="hidden" value="<?php echo $datos->apellidoPaterno;?>" name="apellidoPaterno">
                <input type="hidden" value="<?php echo $datos->apellidoMaterno;?>" name="apellidoMaterno">
                <input type="hidden" value="<?php echo $datos->paciente;?>" name="pacId">
                <div class="col-lg-12" ></div>
                <!-- DATOS DE PERSONALES-->               
                    <div class="col-lg-12">
                    <label class="titulo">Datos Personales</label>
                    </div>
                    <div class="col-lg-12">
                        <label>Ficha N°: </label> <?php echo $datos->ficha; ?>
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
                        <label>Edad: </label> <?php echo $edad; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Nacionalidad: </label> <?php IF ($datos->nacionalidad === '1') echo 'CHILENA';ELSEIF ($datos->nacionalidad === '2') echo 'EXTRANJERO' ?>
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
                
                <div class="col-lg-12" ><hr style="height: 2px"></div>  
                <div class="col-lg-12">
                    <label class="titulo">Nuevo Ingreso de Datos</label>
                </div>
                <div class="col-lg-12"></div><div class="col-lg-12"></div>
                <div class="col-lg-12">
                    <div class="col-lg-2">
                        <label>Fecha Medición</label>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control" required placeholder="día-mes-año" style=" width: 158px !important" name="fechaIngreso" minlength="10" maxlength="10" title="Ingrese una fecha valida" value="<?php IF(!empty($registro))echo $registro->sigFechaIngreso;ELSE echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label>Hora Medición</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="time" class="hora" required name="horaIngreso" title="Ingrese una hora valida" value="<?php IF(!empty($registro))echo $registro->sigHoraIngreso;ELSE echo date('H:i'); ?>">
                    </div>
                    <div class="col-lg-12"><br></div><div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Peso (gr)</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" required name="peso" minlength="2" maxlength="3" title="Ingrese un peso valido" value="<?php IF(!empty($registro))echo $registro->sigPeso; ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Circunferencia Abdominal (CA)</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" required name="circunferencia" title="Ingrese una circunferencia valida" value="<?php IF(!empty($registro))echo $registro->sigCA; ?>">
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Estatura (cm)</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" required name="talla" minlength="2" maxlength="3" title="Ingrese una talla valida" value="<?php IF(!empty($registro))echo $registro->sigTalla; ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Temperatura (T°)</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" required name="temperatura" title="Ingrese una temperatura valida" value="<?php IF(!empty($registro))echo $registro->sigTem; ?>">
                    </div>
                    <div class="col-lg-12"><br></div><div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Presión Arterial (PA)</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" required name="presion" title="Ingrese una presión valida" value="<?php IF(!empty($registro))echo $registro->sigPresion; ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Frecuencia Cardiaca (FC)</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" required name="frecuenciaC" title="Ingrese una frecuencia valida" value="<?php IF(!empty($registro))echo $registro->sigFC; ?>">
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Frecuencia Respiratoria (FR)</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" required name="frecuenciaR" title="Ingrese una frecuencia valida" value="<?php IF(!empty($registro))echo $registro->sigFR; ?>">
                    </div>
                </div>
                
                <div class="col-lg-12" align="center">
                    <button style=" width:10% !important" onclick="goBack()" class="btn btn-default btn-sm btnVolver">Volver</button><script>function goBack(){window.history.go(-1);}</script>
            
                    <?php echo form_submit('','Guardar','class="btn btn-primary btn-sm btnCetep"');?>
                </div>
                
                
                <div class="col-lg-12" style=" overflow-x: auto">
                    <table class='table table-bordered table-hover table-striped data-table'>
                <thead>
                    <th></th>
                    <th>Fecha</th>
                    <th>Hora Medición</th>
                    <th>Peso (P)</th>
                    <th>Circunferencia Abdominal (CA)</th>
                    <th style="width:95px">Índice de<br>Masa Corporal<br>(Talla:<?php echo $signos[0]->sigTalla;?>)</th>
                    <th>Temperatura (T°)</th>
                    <th>Presión Arterial (PA)</th>
                    <th>Frecuencia Cardiaca (FC)</th>
                    <th>Frecuencia Respiratoria (FR)</th>
                    <th>EU / TENS</th>
                    <th>Imprimir Fila</th>
                </thead>
            <?php $count = 0;
                FOREACH ($signos as $sig){;?>
                <tr>
                    <?php $count += 1;
                            IF ($count===1)$semana = 'Ingreso';
                            ELSEIF($count===2)$semana = 'Semana 1';
                            ELSEIF($count===3)$semana = 'Semana 2';
                            ELSEIF($count===4)$semana = 'Semana 3';
                            ELSEIF($count===5)$semana = 'Semana 4';
                            ELSEIF($count===6)$semana = 'Semana 5';
                            ELSEIF($count===7)$semana = 'Semana 6';
                            ELSEIF($count===8)$semana = 'Semana 7';
                            ELSEIF($count===9)$semana = 'Semana 8';
                            ELSEIF($count===10)$semana = 'Semana 9';
                            ELSEIF($count===11)$semana = 'Semana 10';
                            ELSEIF($count===12)$semana = 'Semana 11';
                            ELSEIF($count===13)$semana = 'Semana 12';
                            ELSEIF($count===14)$semana = 'Semana 13';
                            ELSEIF($count===15)$semana = 'Semana 14';
                    ?>
                    <td><?php echo $semana;?></td>
                    <td><?php $date = new DateTime($sig->sigFechaIngreso);echo $date->format('d-m-Y');?></td>
                    <td align="center"><?php $hora = new DateTime($sig->sigHoraIngreso);echo $hora->format('H:i');?></td>
                    <td align="center"><?php echo $sig->sigPeso;?></td>
                    <td align="center"><?php echo $sig->sigCA;?></td>
                    <td align="center"><?php echo $sig->sigIMC;?></td>
                    <td align="center"><?php echo $sig->sigTem;?></td>
                    <td align="center"><?php echo $sig->sigPresion;?></td>
                    <td align="center"><?php echo $sig->sigFC;?></td>
                    <td align="center"><?php echo $sig->sigFR;?></td>
                    <td> <?php echo strtoupper($sig->uspNombre).' '.strtoupper($sig->uspApellidoP).' '.strtoupper($sig->uspApellidoM);?></td>
                    <td align="center">
                        <a class="tip-bottom" title="Imprimir Fila" href="<?php echo base_url("hd_admision/impresiones/imprimirFila/".$sig->sigId )?>"><i class="fa fa-print" aria-hidden="true"></i></a>&nbsp;&nbsp;
                    </td>
                </tr>
            <?php };?>
            </table>
                </div>
</div><!-- FIN DIV FICHA COMPLETA-->
                <div class="col-lg-12" ><hr></div>
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

