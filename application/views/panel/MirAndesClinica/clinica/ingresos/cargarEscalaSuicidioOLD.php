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
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25; background-color: #db8918">
    <div id="content-header" style="background-color: #e9c899; max-height: 10px !important" >
        <h1 style="background-color: #a15ebe !important;border:none;color:#ffffff; margin-right: 30px;-webkit-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);" class="alert alert-info"><?php echo $title;?></h1>
    </div>
    
    
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                

			
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" style="border-color: #000000;"  >
            <?php $attributes = array('id' => 'form');
            //die(var_dump($datos));
                echo form_open('hd_admision/ingresos/guardarContacto',$attributes);
            ?>
            <div class='widget-content'>
                
                
<!--COMIENZO TRATAMIENTO DE FICHA-->
                    
    <div class="col-lg-12"><br></div>
                    <div class="col-lg-12">
                    <label class="titulo">Datos de Contacto</label>
                    </div>
                    <div class="col-lg-2">
                        <label>Rut Paciente</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="rut"  type="text" placeholder="Digite run de paciente" minlength="7" required id="rut" value="<?php IF(!empty($datos->rut))echo formatearRut($datos->rut);?>"><br><h7 style="font-size:8px">&nbsp;&nbsp;&nbsp;ejemplo 12345678-9</h7>
                    </div>
    
    <div id="divFicha">
                    <div class="col-lg-2">
                        <label>Nombres</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="nombres"  type="text" minlength="3" required id="nombres" value="<?php IF(!empty($datos->nombres))echo strtoupper($datos->nombres);?>">
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Apellido Paterno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apePat"  type="text" minlength="3" required id="apePat" value="<?php IF(!empty($datos->apellidoPaterno))echo strtoupper($datos->apellidoPaterno);?>">
                    </div> 
                    
                    <div class="col-lg-2">
                        <label>Apellido Materno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apeMat"  type="text" minlength="3" required id="apeMat" value="<?php IF(!empty($datos->apellidoMaterno))echo strtoupper($datos->apellidoMaterno);?>">
                    </div>
                    
                    <div class="col-lg-12"><hr></div>
                    
                    <div class="col-lg-2">
                        <label>Fecha Derivación</label>
                    </div>
                    <div class='col-lg-4' >
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="dd-mm-yyyy">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control datepicker" required placeholder="día-mes-año" style=" width: 158px !important" name="fechaDerivacion" data-date-format="dd-mm-yyyy">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label>Fecha Recepción</label>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="dd-mm-yyyy">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control datepicker" required placeholder="día-mes-año" style=" width: 158px !important" name="fechaRecepcion" data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y');?>">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label>Fecha Entrevista</label>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="dd-mm-yyyy">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control datepicker" required placeholder="día-mes-año" style=" width: 158px !important" name="fechaEntrevista" data-date-format="dd-mm-yyyy" >
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label>Primer Contacto</label>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="dd-mm-yyyy">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control datepicker" required placeholder="día-mes-año" style=" width: 158px !important" name="fechaPrimer" data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y');?>">
                        </div>
                    </div>
    
                    <div class="col-lg-2">
                        <label>Hora Entrevista</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="time" class="hora" name="horaEntrevista" title="Ingrese una hora valida" required>
                    </div>
    
                    
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-2">
                        <label>Comentario</label>
                    </div>
                    <div class='col-lg-8'>
                        <textarea name="comentario" id="comentario" style="width:91%;height: 70px" placeholder="Comentarios / Observaciones:"></textarea>
                    </div>
                    <div class="col-lg-12"></div>
                    
                    <div class='col-lg-12'><br></div>
                    <div class="col-lg-12" align="center">
                        <button style=" width:10% !important" onclick="goBack()" class="btn btn-default btn-sm btnVolver">Volver</button><script>function goBack(){window.history.go(-1);}</script>
            
                        <?php echo form_submit('','Enviar Confirmación','class="btn btn-primary btn-sm btnCetep"');?>
                        <?php echo form_close();?>
                    </div>
                    
    </div><!-- FIN DIV FICHA COMPLETA--> 
    
                <div class='col-lg-12'><hr></div>
                <div class="col-lg-12" style=" overflow-x: auto">
                    <table class='table table-bordered table-hover table-striped data-table'>
                <thead>
                    <th>N°</th>
                    <th>FECHA RECEPCIÓN</th>
                    <th>FECHA CONTACTO</th>
                    <th>FECHA ENTREVISTA</th>
                    <th>RUT PACIENTE</th>
                    <th>NOMBRE PACIENTE</th>
                    <th>OPCIONES</th>
                </thead>
                <tbody>
            <?php FOREACH ($contactos as $con){;?>
                <tr>
                    <td><?php echo $con->conId;?></td>
                    <td><?php $date = new DateTime($con->conFechaRecepcion);echo $date->format('d-m-Y');?></td>
                    <td><?php $date = new DateTime($con->conFechaPrimer);echo $date->format('d-m-Y');?></td>
                    <td><?php $date = new DateTime($con->conFechaEntrevista.$con->conHoraEntrevista);echo $date->format('d-m-Y H:i');?></td>
                    <td><?php echo formatearRut($con->conRut);?></td>
                    <td><?php echo strtoupper($con->conNombres).' '.strtoupper($con->conApePat).' '.strtoupper($con->conApeMat);?></td>
                    <td align="center">
                        <!--
                        <a class="tip-bottom" title="Imprimir solicitud" href="<?php echo base_url("hd_admision/impresiones/imprimirImprimir/".$sol->solId )?>"><i class="fa fa-print" aria-hidden="true"></i></a>&nbsp;&nbsp;
                        -->
                    </td>
                </tr>
            <?php };?>
                </tbody>
            </table>
                </div>

            
                
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
    var rut = $( "#rut" ).val();
    
        if(rut === '') { 
            $("#divFicha").hide(); 
            $("#rut").attr("disabled", false).css("box-shadow","0 0 15px red");
            $("#rutApo").attr("disabled", false).css("box-shadow","0 0 15px red");
        }
    
    else {
        $("#divFicha").show(); 
    }
    $(".icon").hide();
    $(".iconSexo").hide();
    $(".iconCom").hide();
    $(".iconFecha").hide();
    
    
    //$("#rutApoEco").attr("disabled", false).css("box-shadow","0 0 15px red");
    
</script>
<script>
    $("#rut").bind({
        
    focusout:function(){
        
       
        ////LIMPIAR INPUTS
        //document.getElementById("licDesde").value = "";document.getElementById("licDias").value = "";document.getElementById("licNumero").value = "";document.getElementById("comentario").value = "";document.getElementById("diagnostico").value = "";document.getElementById("alergias").value = "";document.getElementById("diagnostico").value = "";document.getElementById("emergenciaDerivar").value = "";document.getElementById("telDosOtroContacto").value = "";document.getElementById("telUnoOtroContacto").value = "";document.getElementById("nombreOtroContacto").value = "";document.getElementById("ficha").value = "";document.getElementById("nombres").value = "";document.getElementById("apePat").value = "";document.getElementById("apeMat").value = "";document.getElementById("fecha").value = ""; document.getElementById("telFijo").value = ""; document.getElementById("telCelu").value = ""; document.getElementById("direccion").value  = ""; document.getElementById("email").value = ""; document.getElementById("ocupacion").value  = ""; document.getElementById("rutTitular").value = ""; document.getElementById("rutApo").value = "";$("#fem").removeClass();$("#masc").removeClass();$("#comuna option[value=0]").attr("selected",true);  
        
        var rut = $( "#rut" ).val();
        
        if (rut === ''){$("#rut").attr("disabled", false).css("box-shadow","0 0 15px red"); $("#divFicha").hide(); event.stopPropagation()}
        

        
        var validar = validaRut(rut);
        if (validar != true && rut != ''){document.getElementById("rut").value  = '';alert('Rut Invalido');event.stopPropagation()}
        
        $("#rut").attr("disabled", false).css("box-shadow","0 0 0px");
        $("#divFicha").show();  
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var letra = rut.substring(0, 1);
        if (letra === '1' || letra === '2'){var rut = rut.substring(0, 8);}
        else {var rut = rut.substring(0, 7);}
        $('#comentario').val('');
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresosHD/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                //console.log('rut'+data.rut);     
                if (data.nombres != undefined){document.getElementById("nombres").value         = data.nombres;}
                if (data.apellidoPaterno != undefined){document.getElementById("apePat").value  = data.apellidoPaterno;}
                if (data.apellidoMaterno != undefined){document.getElementById("apeMat").value  = data.apellidoMaterno;}
                        
             
                     $.ajax({
                            type: "GET",
                            url: "<?php echo base_url(); ?>" + "api/ingresosHD/dameContacto/"+data.rut,
                            dataType: 'json',

                            success: function(datos){
                                var keyVar;
                                var com = '';
                                for(keyVar in datos) {
                                    if(datos[keyVar].conComentario!=null) {
                                            com = datos[keyVar].conComentario;
                                            }
                                    }
                                    if (datos[keyVar].conComentario != undefined){$('#comentario').val(com);}
                                        
                            }
                       });
        
        
        
        
            }
        });
        }
        });
</script>        
<script>
    $("#form").submit(function () {  
    
});  
</script>
  
<script>
    
function validaRut(campo){
   
	if ( campo.length == 0 ){ return false; }
	if ( campo.length < 7 ){ return false; }

	campo = campo.replace('-','')
	campo = campo.replace(/\./g,'')

	var suma = 0;
	var caracteres = "1234567890kK";
	var contador = 0;    
	for (var i=0; i < campo.length; i++){
		u = campo.substring(i, i + 1);
		if (caracteres.indexOf(u) != -1)
		contador ++;
	}
	if ( contador==0 ) { return false }
	
	var rut = campo.substring(0,campo.length-1)
	var drut = campo.substring( campo.length-1 )
	var dvr = '0';
	var mul = 2;
	
	for (i= rut.length -1 ; i >= 0; i--) {
		suma = suma + rut.charAt(i) * mul
                if (mul == 7) 	mul = 2
		        else	mul++
	}
	res = suma % 11
	if (res==1)		dvr = 'k'
                else if (res==0) dvr = '0'
	else {
		dvi = 11-res
		dvr = dvi + ""
	}
	if ( dvr != drut.toLowerCase() ) { return false; }
	else { return true; }
}

function formatearRut(rut){
        
        if (!rut || !rut.length || typeof rut !== 'string') {
		return -1;
	}
	// serie numerica
	var secuencia = [2,3,4,5,6,7,2,3];
	var sum = 0;
	//
	for (var i=rut.length - 1; i >=0; i--) {
		var d = rut.charAt(i)
		sum += new Number(d)*secuencia[rut.length - (i + 1)];
	};
	// sum mod 11
        
	var rest = 11 - (sum % 11);
	// si es 11, retorna 0, sino si es 10 retorna K,
	// en caso contrario retorna el numero
	rest === 11 ? 0 : rest === 10 ? "K" : rest;
        if(rest===10)rest='K';else if(rest===11)rest=0;
        //console.log("Rut :"+rest);
        rut = rut+rest;
    
        //console.log("Rut :"+rut);
        var sRut1 = rut;   	//contador de para saber cuando insertar el . o la -
        var nPos = 0; //Guarda el rut invertido con los puntos y el guión agregado
        var sInvertido = ""; //Guarda el resultado final del rut como debe ser
        var sRut = "";
        for(var i = sRut1.length - 1; i >= 0; i-- )
        {
            sInvertido += sRut1.charAt(i);
            if (i == sRut1.length - 1 )
                sInvertido += "-";
            else if (nPos == 3)
            {
                sInvertido += ".";
                nPos = 0;
            }
            nPos++;
        }
        for(var j = sInvertido.length - 1; j >= 0; j-- )
        {
            if (sInvertido.charAt(sInvertido.length - 1) != ".")
                sRut += sInvertido.charAt(j);
            else if (j != sInvertido.length - 1 )
                sRut += sInvertido.charAt(j);
        }
        //Pasamos al campo el valor formateado
        //console.log(sRut);
        return sRut.toUpperCase();
        //return rut
    }

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

