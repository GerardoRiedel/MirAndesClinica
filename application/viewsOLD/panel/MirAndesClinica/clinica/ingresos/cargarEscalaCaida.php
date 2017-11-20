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
                echo form_open('clinica_enfermeria/ingresos/guardarEscalaCaida',$attributes);
            ?>
                            
            <div class='widget-content'>
                
                
                    
                
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
                    <?php //die(var_dump($evoId));?>
                    
                <input type="hidden" value="<?php echo $datos->id;?>" name="fichaElectro">
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
                    <label class="titulo">Datos de Evaluación</label>
                </div>
                <div class="col-lg-12"><br></div>
                
                
                
                    <div class="col-lg-2">
                        <label>Caidas Previas</label>
                    </div>
                    <div class='col-lg-3'><?php //die($cai->caiPrevias);?>
                        <input name="caiPrevias" type="radio" value="1" required <?php IF(!empty($cai->caiPrevias) && $cai->caiPrevias === '1')echo 'checked';?>>
                        Si
                    </div>
                    <div class="col-lg-7">
                        <input name="caiPrevias" type="radio" value="0" required <?php IF(!empty($cai->caiPrevias) && $cai->caiPrevias === '0')echo 'checked';?>>
                        No
                    </div>
                
                
                
                    <div class='col-lg-12'><hr></div>
                    <div class="col-lg-2">
                        <label>Medicamentos</label>
                    </div>
                    <div class='col-lg-10'>
                        <input name="caiMedNinguno" type="checkbox" value="1"  <?php IF(!empty($cai->caiMedNinguno) && $cai->caiMedNinguno === '1')echo 'checked';?>>
                        Ninguno
                    </div>
                    <div class='col-lg-2'></div>
                    <div class='col-lg-3'>
                        <input name="caiMedSedantes" type="checkbox" value="1"  <?php IF(!empty($cai->caiMedSedantes) && $cai->caiMedSedantes === '1')echo 'checked';?>>
                        Tranquilizantes-Sedantes
                    </div>
                    <div class='col-lg-3'>
                        <input name="caiMedDiureticos" type="checkbox" value="1"  <?php IF(!empty($cai->caiMedDiureticos) && $cai->caiMedDiureticos === '1')echo 'checked';?>>
                        Diuréticos
                    </div>
                    <div class='col-lg-4'>
                        <input name="caiMedHipo" type="checkbox" value="1"  <?php IF(!empty($cai->caiMedHipo) && $cai->caiMedHipo === '1')echo 'checked';?>>
                        Hipotensores
                    </div>
                    <div class='col-lg-2'></div>
                    <div class='col-lg-3'>
                        <input name="caiMedParkinson" type="checkbox" value="1"  <?php IF(!empty($cai->caiMedParkinson) && $cai->caiMedParkinson === '1')echo 'checked';?>>
                        Antiparkinsonianos
                    </div>
                    <div class='col-lg-3'>
                        <input name="caiMedDepresivos" type="checkbox" value="1"  <?php IF(!empty($cai->caiMedDepresivos) && $cai->caiMedDepresivos === '1')echo 'checked';?>>
                        Antidepresivos
                    </div>
                    <div class='col-lg-3'>
                        <input name="caiMedOtro" type="checkbox" value="1"  <?php IF(!empty($cai->caiMedOtro) && $cai->caiMedOtro === '1')echo 'checked';?>>
                        Otros Medicamentos
                    </div>
                    
                    
                    
                    
                    <div class='col-lg-12'><hr></div>
                    <div class="col-lg-2">
                        <label>Déficit Sensorial</label>
                    </div>
                    <div class='col-lg-10'>
                        <input name="caiDefNinguno" type="checkbox" value="1"  <?php IF(!empty($cai->caiDefNinguno) && $cai->caiDefNinguno === '1')echo 'checked';?>>
                        Ninguno
                    </div>
                    <div class="col-lg-2"></div>
                    <div class='col-lg-3'>
                        <input name="caiDefVisual" type="checkbox" value="1"  <?php IF(!empty($cai->caiDefVisual) && $cai->caiDefVisual === '1')echo 'checked';?>>
                        Alteración Visual
                        </div>
                    <div class='col-lg-3'>
                        <input name="caiDefAuditiva" type="checkbox" value="1"  <?php IF(!empty($cai->caiDefAuditiva) && $cai->caiDefAuditiva === '1')echo 'checked';?>>
                        Alteración Auditiva
                        </div>
                    <div class='col-lg-3'>
                        <input name="caiDefExtremidades" type="checkbox" value="1"  <?php IF(!empty($cai->caiDefExtremidades) && $cai->caiDefExtremidades === '1')echo 'checked';?>>
                        Extremidades
                    </div>
                    
                    
                    
                    
                    
                    <div class='col-lg-12'><hr></div>
                    <div class="col-lg-2">
                        <label>Estado Mental</label>
                    </div>
                    <div class='col-lg-3'>
                        <input name="caiEstado" type="radio" value="0" required <?php IF(!empty($cai->caiEstado) && $cai->caiEstado === '0')echo 'checked';?>>
                        Orientado
                    </div>
                    <div class='col-lg-3'>
                        <input name="caiEstado" type="radio" value="1" required <?php IF(!empty($cai->caiEstado) && $cai->caiEstado === '1')echo 'checked';?>>
                        Confuso
                    </div>
                    
                    
                    
                    <div class='col-lg-12'><hr></div>
                    <div class="col-lg-2">
                        <label>Deambulación</label>
                    </div>
                    <div class='col-lg-10'>
                        <input name="caiDeaNormal" type="checkbox" value="1"  <?php IF(!empty($cai->caiDeaNormal) && $cai->caiDeaNormal === '1')echo 'checked';?>>
                        Normal
                    </div>
                    <div class="col-lg-2"></div>
                    <div class='col-lg-3'>
                        <input name="caiDeaSegura" type="checkbox" value="1"  <?php IF(!empty($cai->caiDeaSegura) && $cai->caiDeaSegura === '1')echo 'checked';?>>
                        Segura Con Ayuda
                    </div>
                    <div class='col-lg-3'>
                        <input name="caiDeaInsegura" type="checkbox" value="1"  <?php IF(!empty($cai->caiDeaInsegura) && $cai->caiDeaInsegura === '1')echo 'checked';?>>
                        Insegura Con o Sin Ayuda
                    </div>
                    <div class='col-lg-3'>
                        <input name="caiDeaImposible" type="checkbox" value="1"  <?php IF(!empty($cai->caiDeaImposible) && $cai->caiDeaImposible === '1')echo 'checked';?>>
                        Imposible
                    </div>
                
                    <div class='col-lg-12'><hr></div>
                
                
                
                
                    
                    
                    <div class="col-lg-12"></div>
                    <div class="col-lg-6" align="right" >
                        <?php echo form_submit('','Guardar','class="btn btn-primary btn-sm btnCetep"');?>
                    </div>
                    <div class="col-lg-2">
                        <button onclick="goBack()" class="btn btn-default btn-sm btnVolver">Cancelar</button><script>function goBack(){window.history.go(-1);}</script>
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

