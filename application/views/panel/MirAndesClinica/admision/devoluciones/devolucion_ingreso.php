<?php error_reporting(E_ALL ^ E_NOTICE); ?>

<style>
    .titulo{
        color: #a15ebe;
    }
    
    .icon{
            width: 25px;
            padding-top: 5%;
            padding-left: 5%;
    }
    .iconCom{
            width: 23px;
            padding-top: 6%;
            margin-left: -69px;
    }
    .iconSexo{
            width: 23px;
            margin-left: -59px;
    }
    .iconFecha{
            width: 23px;
            padding-top: 30%;
            margin-left: -165px;
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
                echo form_open('clinica_admision/devoluciones/guardarDeposito',$attributes);
            ?>
                            
            <div class='widget-content'>
                
                <br>
                
                <!-- DATOS DE PACIENTE-->               
                    
                    <div class="col-lg-12">
                        <label class="titulo">Datos de Paciente</label>
                    </div>
                    <div class="col-lg-2">
                        <label>Rut</label>
                    </div>
                    <div class='col-lg-10'>
                        <label><?php echo formatearRut($pacRut); ?></label>
                    </div>
                
                    <div class="col-lg-2">
                        <label>Nombre</label>
                    </div>
                    <div class='col-lg-10'>
                        <label><?php echo strtoupper($pacNombre).' '.strtoupper($pacApePat).' '.strtoupper($pacApeMat) ?> </label>
                    </div>
                    
                
                <input type="hidden" value="<?php echo $registro?>" name="registro">
                <input type="hidden" value="<?php echo $pacRut?>" name="rut">
                    
                    
                    
                    
                    <div class="col-lg-12" ><hr></div>
                <!-- DATOS DE APODERADO ECONOMICO--> 
            <div id="divEco">
                    <div class="col-lg-12">
                    <label class="titulo">Datos de Apoderado Economico</label>
                    </div>
                    <div class="col-lg-2">
                        <label>Rut</label>
                    </div>
                    <div class='col-lg-4'>
                        <?php IF(!empty($apoderado))echo formatearRut($apoderado->apoRut);?>
                        <input type="hidden" value="<?php echo $apoderado->apoRut?>" name="rutApoEco">
                    </div> 
                    <div class="col-lg-12"></div>
            </div>   <!--FIN DIV ECO--> 
    <div id="divFichaEconomico"><!--INICIO DIV FICH APODERADO ECONOMICO -->
                    <div class="col-lg-2">
                        <label>Nombres</label>
                    </div>
                    <div class='col-lg-4'>
                        <?php IF(!empty($apoderado))echo strtoupper($apoderado->apoNombre);?>
                        <!--
                        <input name="nombresApoEco" type="text" minlength="4" required id="nombresApoEco">
                        -->
                    </div>
                    <div class="col-lg-2">
                        <label>Apellido Paterno</label>
                    </div>
                    <div class='col-lg-4'>
                        <?php IF(!empty($apoderado))echo strtoupper($apoderado->apoApePat);?><?php IF(!empty($apoderado))echo strtoupper($apoderado->apoApeMat);?>
                        <!--
                        <input name="apePatApoEco" type="text" minlength="4" required id="apePatApoEco">
                        -->
                    </div>
                    <div class="col-lg-12"></div><!--SALTO DE LINEA-->
                    <div class="col-lg-6"></div>
                    
                        <!--
                    <div class="col-lg-2">
                        <label>Apellido Materno</label>
                    </div>
                    <div class='col-lg-4'>
                        
                        <input name="apeMatApoEco" type="text" minlength="4" required id="apeMatApoEco">
                        
                    </div> 
                        -->
                    <div class="col-lg-12"></div><!--SALTO DE LINEA-->
                    <div class="col-lg-2">
                        <label>Dirección</label>
                    </div>
                    <div class='col-lg-4'>
                        <?php IF(!empty($apoderado))echo strtoupper($apoderado->apoDireccion);?>
                        <!--
                        <input name="direccionApoEco" type="text" minlength="4" required id="direccionApoEco">
                        -->
                    </div>
                    
                    <div class="col-lg-12" ></div><!--SALTO DE LINEA-->
                    <div class="col-lg-2">
                        <label>Teléfono Fijo</label>
                    </div>
                    <div class='col-lg-4'>
                        <?php IF(!empty($apoderado))echo $apoderado->apoTelefono;?>
                        <!--
                        <input name="telFijoApoEco" type="text" minlength="9" id="telFijoApoEco">
                        -->
                    </div>
                    <div class="col-lg-2">
                        <label>Teléfono Movil</label>
                    </div>
                    <div class='col-lg-4'>
                        <?php IF(!empty($apoderado))echo $apoderado->apoCelular;?>
                        <!--
                        <input name="telMovilApoEco" type="text" minlength="9" required id="telCeluApoEco">
                        -->
                    </div>
                    <div class="col-lg-12"></div><!--SALTO DE LINEA-->
                    <div class="col-lg-2">
                        <label>Email</label>
                    </div>
                    <div class='col-lg-4'>
                        <?php IF(!empty($apoderado))echo strtoupper($apoderado->apoEmail);?>
                        <!--
                        <input name="emailApoEco" type="text" minlength="9" required id="emailApoEco">
                        -->
                    </div>
                    <div class="col-lg-2">
                        <label>Parentesco</label>
                    </div>
                    <div class='col-lg-4'>
                        <?php 
                            IF($apoderado->apoParentesco === '1')echo 'PADRE';
                            ELSEIF($apoderado->apoParentesco === '2')echo 'MADRE';
                            ELSEIF($apoderado->apoParentesco === '3')echo 'HIJO/A';
                            ELSEIF($apoderado->apoParentesco === '4')echo 'CONYUJE';
                            ELSEIF($apoderado->apoParentesco === '5')echo 'HERMANO/A';
                            ELSEIF($apoderado->apoParentesco === '6')echo 'TÍO/A';
                            ELSEIF($apoderado->apoParentesco === '7')echo 'PPRIMO/A';
                            ELSEIF($apoderado->apoParentesco === '8')echo 'OTRO';
                        ?>
                        
                    </div>
                           <div class="col-lg-12"></div><!--SALTO DE LINEA-->
<!--INICIO DEVOLUCIONES-->

<input type="hidden" id="ges" value="<?php echo $datos->ges;?>">
<?php IF($datos->ges === '1'){;?>
<div>
                    <div class="col-lg-12">
                    <label class="titulo">Datos de Devolución</label>
                    </div>
                    <div class="col-lg-2">
                        <label>Rut</label>
                    </div>
                    <div class='col-lg-4' >
                        <?php IF(!empty($ctaDevolucion))echo formatearRut ($ctaDevolucion->ctaRut);?>
                        <!--
                        <input name="rutDev" type="text" minlength="7" required id="rutDev">
                        -->
                    </div>
                    <div class="col-lg-2">
                        <label>Nombre</label>
                    </div>
                    <div class='col-lg-4'>
                        <?php IF(!empty($ctaDevolucion))echo strtoupper($ctaDevolucion->ctaNombre);?> <?php IF(!empty($ctaDevolucion))echo strtoupper($ctaDevolucion->ctaApellido);?> <?php IF(!empty($ctaDevolucion))echo strtoupper($ctaDevolucion->ctaApellidoM);?>
                        <!--
                        <input name="nombresDev" type="text" minlength="4" required id="nombresDev">
                        -->
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Banco</label>
                    </div>
                    <div class='col-lg-4'>
                        <?php IF(!empty($ctaDevolucion))echo strtoupper($ctaDevolucion->banNombre);?> 
                    </div>
                    <div class="col-lg-2">
                        <label>Tipo</label>
                    </div>
                    <div class='col-lg-4' >
                        <?php IF(!empty($ctaDevolucion))echo strtoupper($ctaDevolucion->tipNombre);?> 
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>N° Cta</label>
                    </div>
                    <div class='col-lg-4'>
                        <?php IF(!empty($ctaDevolucion))echo $ctaDevolucion->ctaNumero;?> 
                    </div>
                    <div class="col-lg-2">
                        <label>Email</label >
                    </div>
                    <div class='col-lg-4'>
                        <?php IF(!empty($ctaDevolucion))echo strtoupper($ctaDevolucion->ctaEmail);?> 
                    </div>
    </div><!--FiN DIV FICH APODERADO ECONOMICO -->
<?php };?>   
<div class="col-lg-12"><hr></div><!--SALTO DE LINEA-->
<!--INICIO DEPOSITOS-->     
                    <div class="col-lg-12">
                    <label class="titulo">Datos de Deposito</label>
                    </div>
                    <div class="col-lg-2">
                        <label>Tipo de Deposito</label>
                    </div>
                    <div class='col-lg-9' id="deposito">
                        <table>
                            <tbody>
                            <tr>
                                <td style=" width: 30px" align="center"><input type="radio" name="deposito" value="1" id="efectivo"></td>
                                <td style=" width: 100px">Efectivo</td>
                                <td style=" width: 30px" align="center"><input type="radio" name="deposito" value="2" id="cheque"></td>
                                <td style=" width: 100px">Cheque</td>
                                <td style=" width: 30px" align="center"><input type="radio" name="deposito" value="3" id="trans"></td>
                                <td style=" width: 100px">Transferencia</td>
                                <td style=" width: 30px" align="center"><input type="radio" name="deposito" value="4" id="web"></td>
                                <td style=" width: 100px">WebPay</td>
                                <td style=" width: 30px" align="center"><input type="radio" name="deposito" value="5" id="T_Credito"></td>
                                <td style=" width: 100px">T Crédito</td>
                                <td style=" width: 30px" align="center"><input type="radio" name="deposito" value="6" id="T_Debito"></td>
                                <td style=" width: 100px">T Débito</td>
                            </tr>
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="col-lg-1" align="right" style="margin-top: -5px; ">
                        <img class="iconCom" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconSuma"/>
                    </div>

<div id="divCheque">
    <div class="col-lg-2">
        <label>Banco</label>
    </div>
    <div class='col-lg-3'>
        <select id="bancoCheque" name="bancoCheque">
            <option value="0">Seleccione...</option>
            <?php foreach ($banco as $bc): ?>
            <option value="<?php echo $bc->banId?>"><?php echo $bc->banNombre?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-lg-1" align="left">
        <img class="iconCom" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconBancoCheque"/>
    </div>
    <div class="col-lg-2">
        <label>Serie</label>
    </div>
    <div class="col-lg-4">
        <input  type="text" name="serieCheque">
    </div>
    <div class="col-lg-2">
        <label>Cta Cte N°</label>
    </div>
    <div class="col-lg-4">
        <input  type="text" name="ctacteCheque">
    </div>
    
</div>

<div id="divSuma">
    <div class="col-lg-12"></div>
    <div class="col-lg-2">
        <label>Monto</label>
    </div>
    <div class="col-lg-4">
        <input  type="text" name="suma" id="suma" required value="0" pattern="[0-9]{1,7}" title="Ingrese un valor valido">
    </div>
    <div class="col-lg-6">
        <label id="sumaTexto"></label>
    </div>
    <div class="col-lg-12"></div>
    <div class="col-lg-2">
        <label>Concepto</label>
    </div>
    <div class="col-lg-4">
        <select name="concepto" required id="concepto">
            <?php foreach ($conceptos as $con){;?>
            <option value="<?php echo $con->depConId; ?>"><?php echo $con->depConNombre;?></option>
            <?php } ?>
        </select>
    </div>
    
        <div class="col-lg-12"  ></div>
         <div class="col-lg-2"  id="divBoleta">
                   <label>N° de Boleta</label>
         </div>
        <div class="col-lg-3" id="inputBoleta">
            <input  type="text" name="boleta" id="boleta"  pattern="[0-9]{1,7}" title="Ingrese un valor valido">
        </div>
          
         <div class="col-lg-12"  ></div>
         <div class="col-lg-2"  id="divFechas">
                   <label>Fechas Control</label>
         </div>
         <div class="col-lg-3" id="divFechasPrimer">
                   <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" id="primer" name="primer" class="form-control" placeholder="día-mes-año" style=" width: 158px !important" minlength="10" maxlength="10" title="Ingrese una fecha valida">
                   </div>
         </div>
         <div class="col-lg-3" id="divFechasSegundo">
                   <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" id="segundo" name="segundo" class="form-control" placeholder="día-mes-año" style=" width: 158px !important" minlength="10" maxlength="10" title="Ingrese una fecha valida">
                   </div>
         </div>
         <div class="col-lg-3" id="divFechasTercer">
                   <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" id="tercer" name="tercer" class="form-control" placeholder="día-mes-año" style=" width: 158px !important" minlength="10" maxlength="10" title="Ingrese una fecha valida">
                   </div>
         </div>
    
</div>


             
                    <div class='col-lg-12' style=" min-height: 25px"></div>
                    <div class="col-lg-12" align="center">
                        <?php echo form_submit('','Guardar','class="btn btn-primary btn-sm btnCetep"');?>
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
    $("#divSuma").hide(); 
    $("#divFechas").hide(); 
    $("#divFechasPrimer").hide();
    $("#divFechasSegundo").hide();
    $("#divFechasTercer").hide();
    $("#divBoleta").hide();
    $("#inputBoleta").hide();
    $(".iconCom").hide();
    $("#divCheque").hide();
    $("#rutApoEco").attr("disabled", false).css("box-shadow","0 0 15px red");
</script>
<script>
    $("#form").submit(function () { 
    //$(".icon").hide();
    $(".iconCom").hide();
    var ges = $("#ges").val();
    if($("#comunaApoEco").val()==='0') {  
        $("#iconComEco").show();
        //alert("Comuna Requerida");  
        return false;
    }
    var tip = $('input:radio[name=deposito]:checked').val();
    if(tip === '2'){
        if($("#bancoCheque").val() === '0') {  
            $("#iconBancoCheque").show();
            //alert("Banco Requerido");  
            return false;
        } 
    }
    if($("#banco").val() === '0' && ges==='1') {  
        $("#iconBanco").show();
        //alert("Banco Requerido");  
        return false;
    } 
    if($("#tipoCta").val()==='0' && ges==='1') {  
        $("#iconTipo").show();
        //alert("Cuenta Requerida");  
        return false;
    }
    if($("#suma").val()==='0') {  
        $("#iconSuma").show();
        //alert("Cuenta Requerida");  
        return false;
    }
    
    /*
            if($("#concepto").val()==='10') {  
               $("#divFechas").show();
               
               $("#divFechasPrimer").show();
               
               var monto = $("#suma").val();
               
               if(monto > 90000){
                    $("#divFechasSegundo").show();
                    $("#divFechasTercer").show();
                }

               if($("#primer").val()==='') {  
                   alert("Ingrese fecha de control médico");  
               return false;
                }
            }
            */
            if($("#concepto").val()==='11' || $("#concepto").val()==='8'  || $("#concepto").val()==='1' || $("#concepto").val()==='4' || $("#concepto").val()==='6' || $("#concepto").val()==='7' ) {  
               $("#divBoleta").show();
               $("#inputBoleta").show();

               if($("#boleta").val()==='') {  
                   alert("Ingrese N° de Boleta o comprobante");  
               return false;
                }
               // return false;
            }
});  
</script>
<script>
    
        $("#rutApoEco").focusout(function(){
        ////LIMPIAR INPUTS
        document.getElementById("nombresApoEco").value = ""; document.getElementById("apePatApoEco").value = ""; document.getElementById("telFijoApoEco").value = ""; document.getElementById("telCeluApoEco").value = ""; document.getElementById("direccionApoEco").value = ""; document.getElementById("emailApoEco").value = "";
        $("#rutApoEco").attr("disabled", false).css("box-shadow","0 0 0px");
        $("#divFichaEconomico").show();  
        var rut = $( "#rutApoEco" ).val();
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var rut = rut.substring(0, 8);
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                if (data.rut != undefined){
                    document.getElementById("nombresApoEco").value     = data.nombres;
                    document.getElementById("apePatApoEco").value      = data.apellidoPaterno;
                    document.getElementById("apeMatApoEco").value      = data.apellidoMaterno;
                    document.getElementById("telFijoApoEco").value     = data.telefono;
                    document.getElementById("telCeluApoEco").value     = data.celular;
                    document.getElementById("direccionApoEco").value   = data.direccion;
                    document.getElementById("emailApoEco").value       = data.email;
                }
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
                
                //AUTOCOMPLETA CAMPOS DEVOLUCIONES
                document.getElementById("emailDev").value           = data.email;
                document.getElementById("nombresDev").value         = data.nombres;
                document.getElementById("apePatDev").value          = data.apellidoPaterno;
                document.getElementById("apeMatDev").value          = data.apellidoMaterno;
                if(data.ctaNumero != undefined){
                    document.getElementById("NCta").value               = data.ctaNumero;
                }
            }
        })
        })
        
    

</script>
<script>
    $("#rutApoEco").keypress(function(){
        if (event.which == 13 || event.keyCode == 13) {
        ////LIMPIAR INPUTS
        document.getElementById("nombresApoEco").value = ""; document.getElementById("apePatApoEco").value = ""; document.getElementById("telFijoApoEco").value = ""; document.getElementById("telCeluApoEco").value = ""; document.getElementById("direccionApoEco").value = ""; document.getElementById("emailApoEco").value = "";
        $("#rutApoEco").attr("disabled", false).css("box-shadow","0 0 0px");
        $("#divFichaEconomico").show();  
        var rut = $( "#rutApoEco" ).val();
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var rut = rut.substring(0, 8);
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                if (data.rut != undefined){
                    document.getElementById("nombresApoEco").value     = data.nombres;
                    document.getElementById("apePatApoEco").value      = data.apellidoPaterno;
                    document.getElementById("apeMatApoEco").value      = data.apellidoMaterno;
                    document.getElementById("telFijoApoEco").value     = data.telefono;
                    document.getElementById("telCeluApoEco").value     = data.celular;
                    document.getElementById("direccionApoEco").value   = data.direccion;
                    document.getElementById("emailApoEco").value       = data.email;
                }
               }
        })
        }
        })
        
        $("#rutDev").keypress(function(){
        if (event.which == 13 || event.keyCode == 13) {
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
                
                //AUTOCOMPLETA CAMPOS DEVOLUCIONES
                document.getElementById("emailDev").value           = data.email;
                document.getElementById("nombresDev").value         = data.nombres;
                document.getElementById("apePatDev").value          = data.apellidoPaterno;
                document.getElementById("NCta").value               = data.ctaNumero;
                
               }
        })
        }
        })
    </script>
<script src="<?php echo base_url(); ?>../assets/js/sumatexto.js" type="text/javascript"></script>    
<script>
        $("#suma").focusout(function (event){
		var num = $('#suma').val();
                num = num.replace(".", "");
                covertirNumLetras(num);
                var salida = cad+moneda;
                    $('#sumaTexto').text(salida);
	});
        
        
</script>
<script>
        //////VALIDACIONES DE TECLAS//////
        $("#rutApoEco").keyup(function (event){
            var tecla = (document.all) ? event.keyCode : event.which;
            //alert(tecla);
            if(tecla == 8 || tecla == 46){
                document.getElementById("rutApoEco").value = "";
            }
	});
        $("#suma").focusin(function (event){
            document.getElementById("suma").value = "";
	});
        
        $("#deposito").mouseover(function (event){
            var t = $('input:radio[name=deposito]:checked').val();
		if (t === '1'){
                    $("#divCheque").hide();
                    $("#divEfectivo").show();
                    $("#divSuma").show();
                }
                else if (t === '2'){
                    $("#divCheque").show();
                    $("#divSuma").show();
                }
                else if (t === '3'){
                    $("#divCheque").hide();
                    $("#divTrans").show();
                    $("#divSuma").show();
                }
                else if (t === '4'){
                    $("#divCheque").hide();
                    $("#divWeb").show();
                    $("#divSuma").show();
                }
                else if ((t === '5') || (t === '6')){
                    $("#divCheque").hide();
                    $("#divWeb").show();
                    $("#divSuma").show();
                }
	});
        
        $("#telFijoApoEco").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
            {}
            else {alert('Ingrese un telefono valido');event.returnValue = false;}
        });
        $("#telCeluApoEco").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
            {}
            else {alert('Ingrese un telefono valido');event.returnValue = false;}
        });
        
       

</script>



