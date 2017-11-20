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
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25; background-color: #db8918">
    <div id="content-header" style="background-color: #e9c899; max-height: 10px !important" >
        <h1 style="background-color: #a15ebe !important;border:none;color:#ffffff; margin-right: 30px;-webkit-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);" class="alert alert-info"><?php echo $title;?></h1>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                

			
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" style="border-color: #000000;"  >
        <br>
        <div class="col-lg-1"></div>
        <div class="col-lg-11" align="left">
                <button onclick="goBack()" class="btn btn-default btn-sm btnVolver">Volver</button><script>function goBack(){window.history.go(-1);}</script>
            </div>
        
            
                            
            <div class='widget-content'>
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
                <div class="col-lg-12" ></div>
                <!-- DATOS DE PERSONALES--> 
                
                <div id="imprimir">
                    <?php $primera = 0;?>
                    <?php FOREACH ($controles as $con){ ?>
                    <div class="col-lg-6">
                        
                    
                        
                    <table style="width: 500px; margin: 10px; font-size: 10px;box-shadow: 2px 2px 5px #999;"><tr><td>
                               
                                <div>
                                    <a href="<?php echo base_url("clinica_enfermeria/fichas/imprimirEvolucion/" . $con->id )?>" style="margin-left:15px" >
                                        <i class="fa fa-print fa" aria-hidden="true" style="cursor:pointer;vertical-align: central" title="Imprimir Evolución"></i>
                                    </a>
                                    <?php 
                                        //SOLO MODIFICAR ULTMO REGISTRO
                                        IF($primera===0){ ?>
                                    &nbsp;
                                     <a href="<?php echo base_url("clinica_enfermeria/fichas/cargarEvolucion/" . $con->id )?>" style="margin-left:10px" >
                                        <i class="fa fa-pencil-square-o" aria-hidden="true" style="cursor:pointer;vertical-align: central; color:green" title="modificar Datos"></i>
                                    </a>
                                    <?php $primera = 1; } ?>
                                </div>
                <div class="col-lg-12" align="center"><h4 class="titulo">Evolución Enfermería Diaria</h4></div>
                <div class="col-lg-12"></div>
               
                <br><br><br>
                            <table style="margin-left:5px; display: inline-block">
                                <tr>
                                    <td style="border:1px solid grey">&nbsp;Fecha:</td>
                                    <td style="border:1px solid grey; color:red">&nbsp;<b><?php IF (!empty($con->fechaCreacion)){$fecha = new datetime($con->fechaCreacion); echo date_format($fecha, 'd-m-Y');} ?></b></td>
                                </tr>
                                <tr>
                                    <td style="border:1px solid grey">&nbsp;Fecha Ingreso:&nbsp;&nbsp;</td>
                                    <td style="border:1px solid grey">&nbsp;<?php IF (!empty($con->fechaIngreso)){$fecha = new datetime($con->fechaIngreso); echo date_format($fecha, 'd-m-Y');} ?></td>
                                </tr>
                                <tr>
                                    <td style="border:1px solid grey">&nbsp;Clínica</td>
                                    <td style="border:1px solid grey">&nbsp;Mirandes Clínica</td>
                                </tr>
                                <tr>
                                    <td style="border:1px solid grey">&nbsp;Nombre del Paciente:&nbsp;&nbsp;</td>
                                    <td style="border:1px solid grey">&nbsp;<?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno); ?>&nbsp;</td>
                                </tr>
                            </table>  
                            <table style="margin-right: 15px; margin-right:15px" align="right">
                                            <tr>
                                                <td><img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo" style="width:100px"></td>
                                            </tr>
                            </table>
                <br><br><br>
                            <table style="border:1px solid grey;margin-left:5px">
                                <tr>
                                    <td style="border:1px solid grey">&nbsp;Rut Paciente:&nbsp;&nbsp;</td>
                                    <td style="border:1px solid grey">&nbsp;<?php echo formatearRut($datos->rut);?>&nbsp;&nbsp;</td>
                                    <td style="border:1px solid grey">&nbsp;Edad:</td>
                                    <td style="border:1px solid grey">&nbsp;<?php echo calculaedad($datos->fechaNacimiento);?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="border:1px solid grey">&nbsp;Teléfono Fijo:</td>
                                    <td style="border:1px solid grey">&nbsp;<?php IF(!empty($datos->telefono))echo $datos->telefono; ?></td>
                                    <td style="border:1px solid grey">&nbsp;Teléfono Movil:&nbsp;&nbsp;</td>
                                    <td style="border:1px solid grey">&nbsp;<?php IF(!empty($datos->celular))echo $datos->celular; ?></td>
                                </tr>
                                <tr>
                                    <td style="border:1px solid grey">&nbsp;Isapre:</td>
                                    <td style="border:1px solid grey">&nbsp;<?php IF(!empty($datos->isapreNombre))echo strtoupper($datos->isapreNombre); ?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                <br>
            <!-- DATOS DE EVALUACIÓN DIA-->  
            <?php IF(!empty( $con->evoDia) || !empty($con->evoNoche)){ ?>
                <?php IF(!empty( $con->evoDia)) { ?>
                    <div class="col-lg-12" align="center">
                        <label class="titulo" >Evaluación</label>
                    </div>
                    <div class="col-lg-12">
                        <textarea>Día: <?php echo $con->evoDia;?></textarea>
                    </div>
                <?php } ?>
            <!-- DATOS DE EVALUACIÓN NOCHE-->  
                <?php IF(!empty( $con->evoNoche)) { ?>
                    <div class="col-lg-12">
                        <textarea>Noche:<?php echo $con->evoNoche;?></textarea>
                    </div>
                <?php } ?>
            <?php } ?>
            
            <!-- INDICACIONES MÉDICAS-->  
            <div class="col-lg-12"><br></div>
            <div class="col-lg-12"align="center">
                <label class="titulo" >Indicaciones Médicas</label>
            </div>
            <div class="col-lg-3">
                <label>Visitas</label>
            </div>
            <div class="col-lg-8">
                <?php 
                    IF(!empty($con->evoVisitas) && $con->evoVisitas === '1')echo 'Si'; ELSEIF(!empty($con->evoVisitas) && $con->evoVisitas === '2') echo 'No'; ELSE     echo '__';
                ?>
            </div>
            <div class="col-lg-12"></div>
            <div class="col-lg-3">
                        <label>Telefono</label>
            </div>
            <div class='col-lg-3'>
                <?php 
                    IF(!empty($con->evoTelefono) && $con->evoTelefono === '1')echo 'Si'; ELSEIF(!empty($con->evoTelefono) && $con->evoTelefono === '2') echo 'No'; ELSE     echo '__';
                ?>
            </div>
            <div class="col-lg-12"></div>
            <div class="col-lg-3">
                <label>Salidas</label>
            </div>
            <div class="col-lg-3">
                <?php 
                    IF(!empty($con->evoSalidas) && $con->evoSalidas === '1')echo 'Si'; ELSEIF(!empty($con->evoSalidas) && $con->evoSalidas === '2') echo 'No'; ELSE     echo '__';
                ?>
            </div>
             <div class="col-lg-12"></div>
            <div class="col-lg-3">
                <label>Cuidador</label>
            </div>
            <div class="col-lg-3">
                <?php 
                    IF(!empty($con->evoCuidador) && $con->evoCuidador === '1')echo 'Si'; ELSEIF(!empty($con->evoCuidador) && $con->evoCuidador === '2') echo 'No';  ELSE     echo '__';
                ?>
            </div>
            <div class="col-lg-12"></div>
            <div class="col-lg-3">
                <label>Alimentación</label>
            </div>
            <div class="col-lg-9">
                <?php
                IF(!empty($con->evoAlimentacion)){
                    $ali = explode('_', $con->evoAlimentacion);
                    echo 'Colac 1°: ';
                    IF($ali[0]==='on') echo 'Si |'; ELSE     echo '_ |';
                    echo ' Desay: ';
                    IF($ali[0]==='on') echo 'Si |'; ELSE     echo '_ |';
                    echo ' Almuer: ';
                    IF($ali[0]==='on') echo 'Si |'; ELSE     echo '_ |';
                    echo ' Once: ';
                    IF($ali[0]==='on') echo 'Si |'; ELSE     echo '_ |';
                    echo ' Cena: ';
                    IF($ali[0]==='on') echo 'Si |'; ELSE     echo '_ |';
                    echo ' Colac 2°: ';
                    IF($ali[0]==='on') echo 'Si'; ELSE     echo '_';
                }
                ?>
            </div>
            <div class="col-lg-12"></div>
            <div class="col-lg-4">
                <label>Otras Indicaciones</label>
            </div>
            <div class="col-lg-8">
                <?php IF(!empty( $con->evoTO))echo $con->evoTO;?>
            </div>
            
            
            
            <!-- MEDICAMENTOS
            
            <div class="col-lg-12"><br></div>
            <div class="col-lg-12" align="center">
                <label class="titulo">Medicamentos</label>
            </div>
            <div class="col-lg-12">
                <textarea style="border:none"><?php IF(!empty( $con->medicamentos))echo $con->medicamentos;?></textarea>
            </div>
            <div class="col-lg-12">
                <label>Medicamentos SOS</label>
            </div>
            <div class="col-lg-12">
                <textarea style="border:none"><?php IF(!empty( $con->medicamentosSOS))echo $con->medicamentosSOS;?></textarea>
            </div>
            -->
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 20px"></td>
                        </tr>
                        <tr>
                            <td align="left">Evaluado por.<b><?php IF(!empty($con->profesionalNombre))echo $con->profesionalNombre;?></b></td>
                        </tr>
                    </table>
                         
                        
                    
                </div>     
            <?php } ?>
            
 </div><!-- CERRAR PRINT -->
                    
 
                    
 
</div><!-- FIN DIV FICHA COMPLETA-->
                
                
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
function calculaedad($fecha){
            $date2  = date('Y-m-d');//
            $diff   = abs(strtotime($date2) - strtotime($fecha));
            $years  = floor($diff / (365*60*60*24));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            $days   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            return $years.' años '.$months.' meses '.$days.' días';
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
    $(".csv4").hide();
    $("#more").click(function(){
        $("#more").hide();
        $(".csv4").show();  
    })
    $(".more2").hide();
    $("#more2").click(function(){
        $("#more2").hide();
        $(".more2").show();  
    })
    
    
    
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
        $("#habitacion").keydown(function () {
            if (event.keyCode == 13 || event.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
            else {
                texto = $( "#habitacion" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("habitacion").value = texto;
                event.returnValue = false;
            }
        });
        $("#diaEstadia").keydown(function () {
            if (event.keyCode == 13 || event.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
            else {
                texto = $( "#diaEstadia" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("diaEstadia").value = texto;
                event.returnValue = false;
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
    function goBack()
    {
        window.history.go(-1);
    }
    
</script>

