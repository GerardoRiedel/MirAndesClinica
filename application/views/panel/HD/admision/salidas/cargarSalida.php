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
    .btnCetep{
        background-color: #da812e;
        border-color: #da812e
    }
    .btnCetep:hover{
        background-color: #AF601A;
        border-color: #da812e
    }
    .btnCetep:active{
        background-color: #6E2C00 !important;
        border-color: #da812e
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
                echo form_open('hd_admision/salidas/guardarSalida',$attributes);
            ?>
                            
            <div class='widget-content'>
                
                
                
                
                <div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
                    
                    
                <input type="hidden" value="<?php echo $datos->id;?>" name="fichaElectro">
                <input type="hidden" value="<?php echo $datos->rut;?>" name="rut">
                <input type="hidden" value="<?php echo $datos->nombres;?>" name="nombres">
                <input type="hidden" value="<?php echo $datos->apellidoPaterno;?>" name="apellidoPaterno">
                <input type="hidden" value="<?php echo $datos->apellidoMaterno;?>" name="apellidoMaterno">
                <input type="hidden" value="<?php echo $datos->paciente;?>" name="pacId">
                <div class="col-lg-12" ><hr style="height: 12px"></div>
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
                        <label>Nombre: </label> <?php echo $datos->nombres.' '.$datos->apellidoPaterno.' '.$datos->apellidoMaterno; ?>
                    </div>
                <div class="col-lg-12" ></div>    
                    <div class="col-lg-3">
                        <label>Sexo: </label> <?php echo $datos->sexo; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Fecha de Nacimiento: </label> <?php echo $datos->fechaNacimiento; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Edad: </label> <?php echo $edad; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Nacionalidad: </label> <?php IF ($datos->nacionalidad === '1') echo 'Chilena';ELSEIF ($datos->nacionalidad === '2') echo 'Extranjero' ?>
                    </div>
                
                    <div class="col-lg-12" ></div>
           
                    <div class="col-lg-3">
                        <label>Dirección: </label> <?php IF(!empty($datos->direccion))echo $datos->direccion; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Comuna: </label> <?php echo $com->comuna;?>
                    </div>
                    <div class="col-lg-3">
                        <label>Teléfono Fijo: </label> <?php IF(!empty($datos->telefono))echo $datos->telefono; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Teléfono Movil: </label> <?php IF(!empty($datos->celular))echo $datos->celular; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Ocupación: </label> <?php IF(!empty($datos->ocupacion))echo $datos->ocupacion; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Email: </label> <?php IF(!empty($datos->email))echo $datos->email; ?>
                    </div>
                <div class="col-lg-12" ><hr style="height: 2px"></div>  
                
                <!-- DATOS DE LICENCIA-->       
                <?php IF(!empty($licencia)): ?>
                    <div class="col-lg-12">
                    <label class="titulo">Datos Ultima Licencia</label>
                    </div> 
                    <div class="col-lg-2">
                        <label>N°: </label> <?php echo $licencia->licNumero; ?>
                    </div>
                    <div class="col-lg-2">
                        <label>Desde: </label> <?php echo $licencia->licDesde; ?>
                    </div>
                    <div class="col-lg-2">
                        <?php IF($licencia->licHasta >= date('Y-m-d'))$color = red; ELSE $color = grey; ?>
                        <label>Hasta: </label> <h7 style=" color: <?php echo $color; ?>"><b><?php echo $licencia->licHasta; ?></b></h7>
                    </div>
                    <div class="col-lg-2">
                        <label>Días: </label> <?php echo $licencia->licDias; ?>
                    </div>
                <?php endif; ?>
                <!-- DATOS DE LICENCIA-->  
                <div class="col-lg-12"></div>
                    <div class="col-lg-12">
                    <label class="titulo">Datos de Ficha</label>
                    </div>
                    <div class="col-lg-2">
                        <label>Fecha Ingreso</label>
                    </div>
                    <div class='col-lg-4'>
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="dd-mm-yyyy">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <?php $date = new DateTime($datos->fechaIngreso);?>
                            <input type="text" class="form-control datepicker" placeholder="día-mes-año" style=" width: 158px !important" name="fechaIngreso" required value="<?php IF(!empty($datos->fechaIngreso))echo $date->format('d-m-Y');?>" data-date-format="dd-mm-yyyy" readonly>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label>Hora Ingreso</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="horaIngreso" type="timer" class="datetimepicker" style=" min-width: 190px; border:none" required readonly value="<?php IF(!empty($datos->horaIngreso))echo $datos->horaIngreso;?>" >
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Fecha Salida</label>
                    </div>
                    <div class='col-lg-4'>
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="dd-mm-yyyy">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <?php $date = new DateTime($datos->fechaSalidaReal);?>
                            <input type="text" class="form-control datepicker" placeholder="día-mes-año" style=" width: 158px !important" name="fechaSalida" required data-date-format="dd-mm-yyyy" value="<?php IF(!empty($datos->fechaSalidaReal) && $datos->fechaSalidaReal !== '0000-00-00')echo $date->format('d-m-Y'); ELSE echo date('d-m-Y');?>">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label>Hora Salida</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="horaSalida" type="timer" style=" min-width: 190px" required value="<?php IF(!empty($datos->horaSalidaReal) && $datos->horaSalidaReal !== '00:00:00')echo $datos->horaSalidaReal;ELSE echo date('H:i:s');?>">
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-2">
                        <input name="alta" type="checkbox" <?php IF(!empty($datos->alta) && $datos->alta==='si')echo 'checked'; ?> >&nbsp;<label >Dar Alta del Sistema</label>
                    </div>
                    
                    
                    
                   
</div><!-- FIN DIV FICHA COMPLETA-->
                    
                <div class='col-lg-12'></div>
                    <div class="col-lg-4" align="center">
                        <?php echo form_submit('','Guardar','class="btn btn-primary btn-sm btnCetep"');?>
                        <?php echo form_close();?>
                    <button onclick="goBack()" class="btn btn-default btn-sm">Cancelar</button><script>function goBack(){window.history.go(-1);}</script>
                
                    </div>
</div><!-- FIN DIV FICHA COMPLETA-->
                <div class="col-lg-12" ><hr></div>
                
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
    //$("#divFicha").hide(); 
    //$("#divFichaApoderado").hide(); 
    //$("#divFichaEconomico").hide();
    $(".icon").hide();
    $(".iconCom").hide();
    var rut = $( "#rut" ).val();var rutApo = $( "#rutApo" ).val();var rutEco = $( "#rutApoEco" ).val();
    if (rut===''){
        $("#rut").attr("disabled", false).css("box-shadow","0 0 15px red");
    }
    if (rutApo===''){
    $("#rutApo").attr("disabled", false).css("box-shadow","0 0 15px red");
    }
    if (rutEco===''){
    $("#rutApoEco").attr("disabled", false).css("box-shadow","0 0 15px red");
    }
    
</script>
<script type="text/javascript">
    function goBack()
    {
        window.history.go(-1);
    }
</script>
<script>
    $("#form").submit(function () {  
    $(".icon").hide();
    $(".iconCom").hide();
    if($("#banco").val()==0) {  
        $("#iconBanco").show();
        //alert("Banco Requerido");  
        return false;
    } 
    if($("#tipoCta").val()==0) {  
        $("#iconTipo").show();
        //alert("Cta Requerido");  
        return false;
    }
    if($("#comuna").val()==0) {  
        $("#iconComPas").show();
        //alert("Cta Requerido");  
        return false;
    }
    if($("#comunaApo").val()==0) {  
        $("#iconComApo").show();
        //alert("Cta Requerido");  
        return false;
    }
    if($("#comunaApoEco").val()==0) {  
        $("#iconComEco").show();
        //alert("Cta Requerido");  
        return false;
    }
    if($("#isapre").val()==0) {  
        $("#iconIsapre").show();
        //alert("Cta Requerido");  
        return false;
    }
    
});  
</script>
<script>
        
        $("#rutApo").focusout(function(){
        ////LIMPIAR INPUTS
        document.getElementById("nombresApo").value = ""; document.getElementById("apePatApo").value = ""; document.getElementById("telFijoApo").value = ""; document.getElementById("telCeluApo").value = ""; document.getElementById("direccionApo").value = ""; document.getElementById("emailApo").value = ""; document.getElementById("rutApoEco").value = "";
        $("#rutApoEco").attr("disabled", false).css("border-color","#ccc");
        $("#rutApo").attr("disabled", false).css("box-shadow","0 0 0px");//SACAR ROJO CONTORNO
        $("#divFichaApoderado").show();  
        var rut = $( "#rutApo" ).val();
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var rut = rut.substring(0, 8);
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                if (data.nombres != undefined){document.getElementById("nombresApo").value          = data.nombres;}
                if (data.apellidoPaterno != undefined){document.getElementById("apePatApo").value   = data.apellidoPaterno;}
                if (data.apellidoMaterno != undefined){document.getElementById("apeMatApo").value   = data.apellidoMaterno;}
                if (data.telefono != undefined){document.getElementById("telFijoApo").value         = data.telefono;}
                if (data.celular != undefined){document.getElementById("telCeluApo").value          = data.celular;}
                if (data.direccion != undefined){document.getElementById("direccionApo").value      = data.direccion;}
                if (data.email != undefined){document.getElementById("emailApo").value              = data.email;}
                if (data.rut != undefined && data.rut != '0'){document.getElementById("rutApoEco").value               = data.rut;}
               }
        })
        })
        
        $("#rutApoEco").focusout(function(){
        ////LIMPIAR INPUTS
        document.getElementById("nombresApoEco").value = ""; document.getElementById("apePatApoEco").value = ""; document.getElementById("telFijoApoEco").value = ""; document.getElementById("telCeluApoEco").value = ""; document.getElementById("direccionApoEco").value = ""; document.getElementById("emailApoEco").value = "";
        //$("#rutEco").attr("disabled", false).css("border-color","#ccc");
        $("#rutApoEco").attr("disabled", false).css("box-shadow","0 0 0px");//SACAR ROJO CONTORNO
        $("#divFichaEconomico").show();  
        var rut = $( "#rutApoEco" ).val();
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var rut = rut.substring(0, 8);
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                if (data.nombres != undefined){document.getElementById("nombresApoEco").value           = data.nombres;}
                if (data.apellidoPaterno != undefined){document.getElementById("apePatApoEco").value    = data.apellidoPaterno;}
                if (data.apellidoMaterno != undefined){document.getElementById("apeMatApoEco").value    = data.apellidoMaterno;}
                if (data.telefono != undefined){document.getElementById("telFijoApoEco").value          = data.telefono;}
                if (data.celular != undefined){document.getElementById("telCeluApoEco").value           = data.celular;}
                if (data.direccion != undefined){document.getElementById("direccionApoEco").value       = data.direccion;}
                if (data.email != undefined){document.getElementById("emailApoEco").value               = data.email;}
            }
        })
        })
        
        $("#rutDev").focusout(function(){
        ////LIMPIAR INPUTS
        document.getElementById("emailDev").value = ""; document.getElementById("nombresDev").value = ""; document.getElementById("apePatDev").value = "";
        //$("#rutEco").attr("disabled", true).css("background-color","transparent");
        var rut = $( "#rutDev" ).val();
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var rut = rut.substring(0, 8);
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                //AUTOCOMPLETA CAMPOS DEVOLUCIONES
                if (data.email != undefined){document.getElementById("emailDev").value              = data.email;}
                if (data.nombres != undefined){document.getElementById("nombresDev").value          = data.nombres;}
                if (data.apellidoPaterno != undefined){document.getElementById("apePatDev").value   = data.apellidoPaterno;}
                if (data.apellidoMaterno != undefined){document.getElementById("apeMatDev").value   = data.apellidoMaterno;}
                if (data.ctaNumero != undefined){document.getElementById("NCta").value              = data.ctaNumero;}
               }
        })
        })
        
    

</script>    
<script>
    $("#divApo").click(function(){
        
        $("#divFichaApoderado").show();  
    })
    $("#divEco").click(function(){
        $("#divFichaEconomico").show();  
    })
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

