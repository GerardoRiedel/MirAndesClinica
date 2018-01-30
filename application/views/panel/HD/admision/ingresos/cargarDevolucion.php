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
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25 ">
    <div id="content-header" style="background-color: #e9c899; max-height: 10px !important" >
        <h1 style="background-color: #a15ebe !important;border:none;color:#ffffff; margin-right: 30px;-webkit-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);" class="alert alert-info"><?php echo $title;?></h1>
    </div>
    
    
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                

			
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container"  >
        <br><div class="col-lg-12" align="center">
                <button onclick="goBack()" class="btn btn-default btn-sm btnVolver">Volver</button><script>function goBack(){window.history.go(-1);}</script>
            </div>
        
            <?php $attributes = array('id' => 'form');
                echo form_open('hd_admision/devoluciones/guardarDevolucion',$attributes);
            ?>
                            
            <div class='widget-content'>
                
                <br>
                <?php //die(var_dump($deposito));?>
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
                        <label><?php echo $pacNombre.' '.$pacApePat.' '.$pacApeMat ?> </label>
                    </div>
                    
                <input type="hidden"  value="<?php echo $deposito->depId?>" name="depositoId">
                <!--
                <input type="text"  value="<?php echo $cuenta->ctaId?>" name="cuentaId">
                -->
                <input type="hidden" value="<?php echo $registro?>" name="registro">
                <input type="hidden" value="<?php echo $pacRut?>" name="rut">
                <input type="hidden" value="<?php echo $ctaGes?>" name="ctaGes">
                    
                    
                    
                    
                    <div class="col-lg-12" ><hr></div>
                <!-- DATOS DE APODERADO ECONOMICO--> 
               


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
                                <td style=" width: 30px" align="center"><input type="radio" name="deposito" value="1" id="efectivo" <?php IF(!empty($deposito->depTipo)){IF($deposito->depTipo === '1')echo 'checked';};?>></td>
                                <td style=" width: 100px">Efectivo</td>
                                <td style=" width: 30px" align="center"><input type="radio" name="deposito" value="2" id="cheque" <?php IF(!empty($deposito->depTipo)){IF($deposito->depTipo === '2')echo 'checked';};?>></td>
                                <td style=" width: 100px">Cheque</td>
                                <td style=" width: 30px" align="center"><input type="radio" name="deposito" value="3" id="trans" <?php IF(!empty($deposito->depTipo)){IF($deposito->depTipo === '3')echo 'checked';};?>></td>
                                <td style=" width: 100px">Transferencia</td>
                                <td style=" width: 30px" align="center"><input type="radio" name="deposito" value="4" id="web" <?php IF(!empty($deposito->depTipo)){IF($deposito->depTipo === '4')echo 'checked';};?>></td>
                                <td style=" width: 100px">WebPay</td>
                                <td style=" width: 30px" align="center"><input type="radio" name="deposito" value="5" id="T_Credito" <?php IF(!empty($deposito->depTipo)){IF($deposito->depTipo === '5')echo 'checked';};?>></td>
                                <td style=" width: 100px">T Crédito</td>
                                <td style=" width: 30px" align="center"><input type="radio" name="deposito" value="6" id="T_Debito" <?php IF(!empty($deposito->depTipo)){IF($deposito->depTipo === '6')echo 'checked';};?>></td>
                                <td style=" width: 100px">T Débito</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-1" align="right" style="margin-top: -5px; ">
                        <img class="iconCom" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconSuma"/>
                    </div>
<div class="col-lg-12"></div>
<!--
                    <div class="col-lg-8"></div>
                    <div class="col-lg-1" style=" margin-top: 20px">
                        <input type="checkbox" name="depAntiguo" id="depAntiguo">
                    </div>
                    <div class="col-lg-3" style=" margin-top: 20px">
                        <label style=" margin-left: -40px">Deposito Antiguo</label>
                    </div>
                    <div class="col-lg-8"></div>
                    <div class="col-lg-4"><h6 style=" font-size: 10px">Recuerde que al seleccionar esta opción el <b>depósito NO se creará</b>, por lo que no sera visible dentro de la rendición</h6></div>
-->

<div id="divCheque">
    <div class="col-lg-12"></div>
    <div class="col-lg-2">
        <label>Banco</label>
    </div>
    <div class='col-lg-3'>
        <select id="bancoCheque" name="bancoCheque">
            <option value="0">Seleccione...</option>
            <?php foreach ($banco as $bc): ?>
            <option value="<?php echo $bc->banId?>" <?php IF(!empty($deposito->depBanco)){IF($deposito->depBanco===$bc->banId)echo 'selected';};?>><?php echo $bc->banNombre?></option>
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
        <input  type="text" name="serieCheque" id="serieCheque" value="<?php IF(!empty($deposito->depSerie)) echo strtoupper ($deposito->depSerie);?> ">
    </div>
    <div class="col-lg-2">
        <label>Cta Cte N°</label>
    </div>
    <div class="col-lg-4">
        <input  type="text" name="ctacteCheque" id="ctacteCheque" value="<?php IF(!empty($deposito->depCuenta)) echo strtoupper ($deposito->depCuenta);?> ">
    </div>
</div>

<div id="divSuma">
    <div class="col-lg-12"></div>
    <div class="col-lg-2">
        <label>Monto</label>
    </div>
    <div class="col-lg-4">
        <input  type="text" name="suma" id="suma" required value="<?php IF(!empty($deposito->depSuma)) echo $deposito->depSuma; else echo '0'?> ">
    </div>
    <div class="col-lg-6">
        <label id="sumaTexto"></label>
    
    </div>
    <div class="col-lg-12"></div>
    <div class="col-lg-2">
        <label>Concepto</label>
    </div>
    <div class="col-lg-4">
        <select name="concepto">
            <?php foreach ($conceptos as $con){;?>
            <option value="<?php echo $con->depConId; ?>" <?php IF(!empty($deposito->depConcepto)){IF($deposito->depConcepto===$con->depConId)echo 'selected';};?>><?php echo $con->depConNombre;?></option>
            <?php } ?>
        </select>
    </div>
    
</div>


 <?php 
 $ges='1';
 IF($ges === '2'){?>
<div style="display:none">
<?php } ELSE {?>
    <input type="hidden" id="ges" value="<?php echo $ges;?>">
<div>
<?php } ?>                   
                    


                    <div class="col-lg-12"><hr></div><!--SALTO DE LINEA-->
<!--INICIO DEVOLUCIONES-->
<?php //die(var_dump($cuenta));?>
                    <div class="col-lg-12">
                    <label class="titulo">Datos de Devolución</label>
                    </div>
                    <div class="col-lg-2">
                        <label>Rut</label>
                    </div>
                    <div class='col-lg-4' >
                        <input name="rutDev"  type="text" minlength="7" <?php IF($ges === '1')echo 'required';?> id="rutDev" title="Ingrese un Rut Valido" value="<?php IF(!empty($cuenta->ctaRut)) echo formatearRut ($cuenta->ctaRut);?> ">
                    </div>
                    <div class="col-lg-2">
                        <label>Nombre</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="nombresDev"  type="text" minlength="4" <?php IF($ges === '1')echo 'required';?> id="nombresDev" value="<?php IF(!empty($cuenta->ctaNombre)) echo strtoupper ($cuenta->ctaNombre);?> ">
                    </div>
                    <div class="col-lg-2">
                        <label>Apellido Paterno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apePatDev"  type="text" minlength="4" <?php IF($ges === '1')echo 'required';?> id="apePatDev" value="<?php IF(!empty($cuenta->ctaApellido)) echo strtoupper ($cuenta->ctaApellido);?> ">
                    </div> 
                    <div class="col-lg-2">
                        <label>Apellido Materno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apeMatDev"  type="text" minlength="4" <?php IF($ges === '1')echo 'required';?> id="apeMatDev" value="<?php IF(!empty($cuenta->ctaApellidoM)) echo strtoupper ($cuenta->ctaApellidoM);?> ">
                    </div> 
                    
                    
                    <div class="col-lg-2">
                        <label>Banco</label>
                    </div>
                    <div class='col-lg-3'>
                        
                        <select id="banco" name="banco">
                            <option value="0">Seleccione...</option>
                            <?php foreach ($banco as $bc): ?>
                            <option value="<?php echo $bc->banId?>" <?php IF(!empty($cuenta->ctaBanco)){IF($cuenta->ctaBanco===$bc->banId)echo 'selected';};?>><?php echo $bc->banNombre?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php //echo form_dropdown('banco', $banco, '0');?>
                    </div>
                    <div class="col-lg-1" align="left">
                        <img class="iconCom" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconBanco"/>
                    </div>
                    <div class="col-lg-2">
                        <label>Tipo</label>
                    </div>
                    <div class='col-lg-3' >
                        <select id="tipoCta" name="tipoCta">
                            <option value="0">Seleccione...</option>
                            <?php foreach ($tipoCta as $cta): ?>
                            <option value="<?php echo $cta->tipId?>" <?php IF(!empty($cuenta->ctaTipo)){IF($cuenta->ctaTipo===$cta->tipId)echo 'selected';};?>><?php echo $cta->tipNombre?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php //echo form_dropdown('tipoCta', $tipoCta, '0', array('id'=>'tipoCta','required'=>TRUE));?>
                    </div>
                    <div class="col-lg-1" align="left">
                        <img class="iconCom" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconTipo"/>
                    </div>
                    <div class="col-lg-2">
                        <label>N° Cta</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="NCta"  type="text" minlength="4" <?php IF($ges === '1')echo 'required';?> id="NCta" value="<?php IF(!empty($cuenta->ctaNumero)) echo strtoupper ($cuenta->ctaNumero);?> ">
                    </div>
                    <div class="col-lg-2">
                        <label>Email</label >
                    </div>
                    <div class='col-lg-4'>
                        <input name="emailDev" type="text" minlength="9" <?php IF($ges === '1')echo 'required';?> id="emailDev" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="mail@ejemplo.com" value="<?php IF(!empty($cuenta->ctaEmail)) echo strtoupper($cuenta->ctaEmail);?> ">
                    </div>
    </div><!--FiN DIV FICH APODERADO ECONOMICO -->
                    <div class='col-lg-12' style=" min-height: 25px"></div>
                    </div><!-- FIN DIV FICHA COMPLETA-->
                    <div class="col-lg-12" align="center">
                        <?php echo form_submit('','Guardar','class="btn btn-primary btn-sm btnCetep"');?>
                    </div>

                <div class="col-lg-12" ><hr></div>
            <?php echo form_close();?>
                
                
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
    }
    if($("#banco").val()==='0' && ges==='1') {  
        $("#iconBanco").show();
    }
    if($("#tipoCta").val()==='0' && ges==='1') {  
        $("#iconTipo").show();
    }
    
    if($("#comunaApoEco").val()==='0') {  
        $("#iconComEco").show();
        //alert("Comuna Requerida");  
        return false;
    }
    if($("#banco").val()==='0'&& ges==='1') {  
        $("#iconBanco").show();
        //alert("Comuna Requerida");  
        return false;
    }
    if($("#tipoCta").val()==='0' && ges==='1') {  
        $("#iconTipo").show();
        //alert("Comuna Requerida");  
        return false;
    }
    var depAntiguo = $('#depAntiguo').prop('checked');
    if(depAntiguo === false){
        
    var tip = $('input:radio[name=deposito]:checked').val();
        if(tip === '2'){
            if($("#bancoCheque").val() === '0') {  
                $("#iconBancoCheque").show();
                //alert("Banco Requerido");  
                return false;
            } 
            if($("#serieCheque").val() === '0' || $("#serieCheque").val() === '') {  
                $("#iconSuma").show();
                alert("Serie de Cheque invalida");  
                return false;
            } 
            if($("#ctacteCheque").val() === '0' || $("#ctacteCheque").val() === '') {  
                $("#iconSuma").show();
                alert("N° de cuenta invalida");  
                return false;
            } 

            if($("#banco").val() === '0') {  
                $("#iconBanco").show();
                //alert("Banco Requerido");  
                return false;
            } 
            if($("#tipoCta").val()==='0') {  
                $("#iconTipo").show();
                //alert("Cuenta Requerida");  
                return false;
            }
            if($("#suma").val()==='0') {  
                $("#iconSuma").show();
                alert("Monto invalido");  
                return false;
            }
        }
        else if(tip === undefined){
            //$("#iconSuma").show();
            alert("Seleccione un tipo de deposito");  
            return false;
        }
        else if($("#suma").val()==='0') {  
                //$("#iconSuma").show();
            alert("Monto invalido");  
            return false;
        }
    }
    
    
        
});  
</script>
<script>
    
        $("#rutApoEco").focusout(function(){
        ////LIMPIAR INPUTS
        document.getElementById("nombresApoEco").value = ""; document.getElementById("apePatApoEco").value = ""; document.getElementById("apeMatApoEco").value = ""; document.getElementById("telFijoApoEco").value = ""; document.getElementById("telCeluApoEco").value = ""; document.getElementById("direccionApoEco").value = ""; document.getElementById("emailApoEco").value = "";
        //$("#rutApoEco").attr("disabled", false).css("box-shadow","0 0 0px");$("#divFichaEconomico").show();  
        
        var rut = $( "#rutApoEco" ).val();
        if (rut === ''){$("#rutApoEco").attr("disabled", false).css("box-shadow","0 0 15px red"); $("#divFichaEconomico").hide(); event.stopPropagation()}
        
        var validar = validaRut(rut);
        if (validar != true && rut != ''){$("#rutApoEco").attr("disabled", false).css("box-shadow","0 0 15px red"); $("#divFichaEconomico").hide(); document.getElementById("rutApoEco").value  = '';alert('Rut Invalido');event.stopPropagation()}
        else {$("#rutApoEco").attr("disabled", false).css("box-shadow","0 0 0px"); $("#divFichaEconomico").show();  }
        
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var letra = rut.substring(0, 1);
        if (letra === '1' || letra === '2'){var rut = rut.substring(0, 8);}
        else {var rut = rut.substring(0, 7);}
        
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
               
                    if(data.comId!=undefined){
                        //LO SELECCIONA PERO NO LO MUESTRA
                        if(data.comuna === undefined && data.comNombre != undefined)data.comuna = data.comNombre;
                        $("#comunaApoEco").prepend("<option value='"+data.comId+"' selected='selected'>"+data.comuna+"</option>");
                        $("#comunaApoEco option[value="+data.comId+"]").attr("selected",true);
                    }
                    if(data.apoParentesco!=undefined){
                            //LO SELECCIONA PERO NO LO MUESTRA
                        $("#parentescoEco").prepend("<option value='"+data.apoParentesco+"' selected='selected'>"+data.parNombre+"</option>");
                        $("#parentescoEco option[value="+data.apoParentesco+"]").attr("selected",true);
                    }
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
        var letra = rut.substring(0, 1);
        if (letra === '1' || letra === '2'){var rut = rut.substring(0, 8);}
        else {var rut = rut.substring(0, 7);}
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                //AUTOCOMPLETA CAMPOS DEVOLUCIONES
                if (data.email != undefined){
                document.getElementById("emailDev").value           = data.email;
                }
                if (data.nombres != undefined && data.apellidoMaterno != undefined){
                document.getElementById("nombresDev").value         = data.nombres;
                document.getElementById("apePatDev").value          = data.apellidoPaterno;
                document.getElementById("apeMatDev").value          = data.apellidoMaterno;
                }
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
        document.getElementById("nombresApoEco").value = ""; document.getElementById("apePatApoEco").value = ""; document.getElementById("apeMatApoEco").value = "";document.getElementById("telFijoApoEco").value = ""; document.getElementById("telCeluApoEco").value = ""; document.getElementById("direccionApoEco").value = ""; document.getElementById("emailApoEco").value = "";
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
        document.getElementById("emailDev").value = ""; document.getElementById("nombresDev").value = ""; document.getElementById("apePatDev").value = "";document.getElementById("apeMatDev").value = "";
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
                if (data.email != undefined){
                document.getElementById("emailDev").value           = data.email;
                }
                if (data.nombres != undefined && data.apellidoMaterno != undefined){
                document.getElementById("nombresDev").value         = data.nombres;
                document.getElementById("apePatDev").value          = data.apellidoPaterno;
                document.getElementById("apeMatDev").value          = data.apellidoMaterno;
                }
                if(data.ctaNumero != undefined){
                    document.getElementById("NCta").value               = data.ctaNumero;
                }
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
               // document.getElementById("rutApoEco").value = "";
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
                else if (t >= '4'){
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
</script>



