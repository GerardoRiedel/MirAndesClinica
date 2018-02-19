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
                echo form_open('clinica_enfermeria/ingresos/guardarEscalaSuicidio',$attributes);
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
               
                <?php //die(var_dump($suicidio));
                    IF(!empty($suicidio))$sui = explode('_',$suicidio->suiDatos);
                    ELSE $sui[0]=$sui[1]=$sui[2]=$sui[3]=$sui[4]=$sui[5]=$sui[6]=$sui[7]=$sui[8]=$sui[9]=$sui[10]=$sui[11]=$sui[12]=$sui[13]=$sui[14]='';
                ?>
                <div class="col-lg-12"><hr></div>
                <div class="col-lg-12">
                    <label class="titulo">Datos de Evaluación</label>
                    </div>
                    
                    <div class="col-lg-6">
                        <label>¿Toma habitualmente medicamentos o pastillas para dormir?</label>
                    </div>
                    <div class='col-lg-6'>
                        <input name="0" type="radio" value="1" required <?php IF($sui[0] === '1')echo 'checked';?>>
                        Si
                        <input name="0" type="radio" value="0" required <?php IF($sui[0] === '0')echo 'checked';?>>
                        No
                    </div>
                    <div class="col-lg-6">
                        <label>¿Tiene dificultades para conciliar el sueño?</label>
                    </div>
                    <div class='col-lg-6'>
                        <input name="1" type="radio" value="1" required <?php IF($sui[1] === '1')echo 'checked';?>>
                        Si
                        <input name="1" type="radio" value="0" required <?php IF($sui[1] === '0')echo 'checked';?>>
                        No
                    </div>
                    <div class="col-lg-6">
                        <label>¿A veces nota que podría perder el control sobre sí mismo/a?</label>
                    </div>
                    <div class='col-lg-6'>
                        <input name="2" type="radio" value="1" required <?php IF($sui[2] === '1')echo 'checked';?>>
                        Si
                        <input name="2" type="radio" value="0" required <?php IF($sui[2] === '0')echo 'checked';?>>
                        No
                    </div>
                
                    <div class="col-lg-6">
                        <label>¿Tiene poco interés en relacionarse con la gente?</label>
                    </div>
                    <div class='col-lg-6'>
                        <input name="3" type="radio" value="1" required <?php IF($sui[3] === '1')echo 'checked';?>>
                        Si
                        <input name="3" type="radio" value="0" required <?php IF($sui[3] === '0')echo 'checked';?>>
                        No
                    </div>
                    <div class="col-lg-6">
                        <label>¿Ve su futuro con más pesimismo que optimismo?</label>
                    </div>
                    <div class='col-lg-6'>
                        <input name="4" type="radio" value="1" required <?php IF($sui[4] === '1')echo 'checked';?>>
                        Si
                        <input name="4" type="radio" value="0" required <?php IF($sui[4] === '0')echo 'checked';?>>
                        No
                    </div>
                    <div class="col-lg-6">
                        <label>¿Se ha sentido alguna vez inútil o inservible?</label>
                    </div>
                    <div class='col-lg-6'>
                        <input name="5" type="radio" value="1" required <?php IF($sui[5] === '1')echo 'checked';?>>
                        Si
                        <input name="5" type="radio" value="0" required <?php IF($sui[5] === '0')echo 'checked';?>>
                        No
                    </div>
                
                    <div class="col-lg-6">
                        <label>¿Ve su futuro sin ninguna esperanza?</label>
                    </div>
                    <div class='col-lg-6'>
                        <input name="6" type="radio" value="1" required <?php IF($sui[6] === '1')echo 'checked';?>>
                        Si
                        <input name="6" type="radio" value="0" required <?php IF($sui[6] === '0')echo 'checked';?>>
                        No
                    </div>
                
                <div class="col-lg-6">
                        <label>¿Se ha sentido alguna vez fracasado que sólo quería meterse en la cama y abandonarlo todo?</label>
                    </div>
                    <div class='col-lg-6'>
                        <input name="7" type="radio" value="1" required <?php IF($sui[7] === '1')echo 'checked';?>>
                        Si
                        <input name="7" type="radio" value="0" required <?php IF($sui[7] === '0')echo 'checked';?>>
                        No
                    </div>
                <div class="col-lg-12"></div>
                <div class="col-lg-6">
                        <label>¿Está deprimido/a ahora?</label>
                    </div>
                    <div class='col-lg-6'>
                        <input name="8" type="radio" value="1" required <?php IF($sui[8] === '1')echo 'checked';?>>
                        Si
                        <input name="8" type="radio" value="0" required <?php IF($sui[8] === '0')echo 'checked';?>>
                        No
                    </div>
                <div class="col-lg-6">
                        <label>¿Está usted separado/a, dicorciado/a o viudo/a?</label>
                    </div>
                    <div class='col-lg-6'>
                        <input name="9" type="radio" value="1" required <?php IF($sui[9] === '1')echo 'checked';?>>
                        Si
                        <input name="9" type="radio" value="0" required <?php IF($sui[9] === '0')echo 'checked';?>>
                        No
                    </div>
                <div class="col-lg-6">
                        <label>¿Sabe si alguien de su familia ha intentado suicidarse alguna vez?</label>
                    </div>
                    <div class='col-lg-6'>
                        <input name="10" type="radio" value="1" required <?php IF($sui[10] === '1')echo 'checked';?>>
                        Si
                        <input name="10" type="radio" value="0" required <?php IF($sui[10] === '0')echo 'checked';?>>
                        No
                    </div>
                <div class="col-lg-12"></div>
                <div class="col-lg-6">
                        <label>¿Alguna vez se ha sentido tan enojado/a que habría sido capaz de matar a alguien?</label>
                    </div>
                    <div class='col-lg-6'>
                        <input name="11" type="radio" value="1" required <?php IF($sui[11] === '1')echo 'checked';?>>
                        Si
                        <input name="11" type="radio" value="0" required <?php IF($sui[11] === '0')echo 'checked';?>>
                        No
                    </div>
                <div class="col-lg-12"></div>
                <div class="col-lg-6">
                        <label>¿Ha pensado alguna vez en suicidarse?</label>
                    </div>
                    <div class='col-lg-6'>
                        <input name="12" type="radio" value="1" required <?php IF($sui[12] === '1')echo 'checked';?>>
                        Si
                        <input name="12" type="radio" value="0" required <?php IF($sui[12] === '0')echo 'checked';?>>
                        No
                    </div>
                <div class="col-lg-12"></div>
                <div class="col-lg-6">
                        <label>¿Le ha comentado a alguien, en alguna ocasión que quería suicidarse?</label>
                    </div>
                    <div class='col-lg-6'>
                        <input name="13" type="radio" value="1" required <?php IF($sui[13] === '1')echo 'checked';?>>
                        Si
                        <input name="13" type="radio" value="0" required <?php IF($sui[13] === '0')echo 'checked';?>>
                        No
                    </div>
                <div class="col-lg-12"></div>
                <div class="col-lg-6">
                        <label>¿Ha intentado alguna vez quitarse la vida?</label>
                    </div>
                    <div class='col-lg-6'>
                        <input name="14" type="radio" value="1" required <?php IF($sui[14] === '1')echo 'checked';?>>
                        Si
                        <input name="14" type="radio" value="0" required <?php IF($sui[14] === '0')echo 'checked';?>>
                        No
                    </div>
                <div class="col-lg-12"><br></div>
                    <div class="col-lg-6" align="right" >
                        <?php echo form_submit('','Guardar','class="btn btn-primary btn-sm btnCetep"');?>
                    </div>
                    <div class="col-lg-2">   
                        <a href="<?php echo base_url("clinica_enfermeria/ingresos/cargarNuevoIngresoEnfermeria/".$datos->id )?>"   class="btn btn-default btn-sm btnVolver">Volver</a><script> //function goBack(){window.history.go(-1);}</script>
                 <!--
                    onclick="<?php //redirect(base_url().'clinica_enfermeria/ingresos/cargarEvolucionEnfermeria/'.$datos->id);?>"   
                    -->
                    </div>
                    <div class="col-lg-1">
                        <span class='icon'>
                            <i class='fa fa-print' onclick="PrintElem('#imprimir')" style="cursor: pointer; color:#1d1c19; font-size:22px" title="Imprimir"></i>
                        </span>
                    </div>
                    
                    <div class="col-lg-12"><br></div>
                
                 <?php echo form_close();?>
                    
                    
                    <!--
                <div class="col-lg-12" style=" overflow-x: auto">
                    <table class='table table-bordered table-hover table-striped data-table'>
                <thead>
                    <th>N°</th>
                    <th>N° LICENCIA</th>
                    <th>FECHA INICIO LM</th>
                    <th>N° DÍAS</th>
                    <th>MÉDICO EMISOR</th>
                    <th>CENTRO EMISOR</th>
                    <th>FECHA TÉRMINO LM</th>
                </thead>
                <tbody>
            <?php FOREACH ($licencias as $lic){;?>
                <tr>
                    <td><?php echo $lic->licId;?></td>
                    <td><?php echo $lic->licNumero;?></td>
                    <td><?php $date = new DateTime($lic->licDesde);echo $date->format('d-m-Y');?></td>
                    <td><?php echo $lic->licDias;?></td>
                    <td><?php IF(!empty($lic->licMedNombre))echo strtoupper($lic->licMedNombre).' '.strtoupper($lic->licMedApePat).' '.strtoupper($lic->licMedApeMat); ELSE echo strtoupper($lic->nombreMedico)?></td>
                    <td><?php echo strtoupper($lic->licCentro);?></td>
                    <td><?php $date = new DateTime($lic->licHasta);echo $date->format('d-m-Y');?></td>
                </tr>
            <?php };?>
                </tbody>
            </table>
                </div>
</div><!-- FIN DIV FICHA COMPLETA-->
            
                
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
                    <div class="col-lg-10" align="right" style=" margin-right: 40px">
                    <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
                </div>
                    <label class="titulo">Datos Personales</label><br>
                    <label>Rut Paciente: </label> <u><?php echo formatearRut($datos->rut);?></u>&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Nombre: </label> <u><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno); ?></u>
                    <br><label>Fecha de Nacimiento: </label> <u><?php IF(!empty($datos->fechaNacimiento)){$date = new DateTime($datos->fechaNacimiento);echo $date->format('d-m-Y');}  ?></u>&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Edad: </label> <u><?php IF(!empty($datos->fechaNacimiento))echo calculaedad($datos->fechaNacimiento); ?></u>
                    <br><label>Dirección: </label> <u><?php IF(!empty($datos->direccion))echo strtoupper($datos->direccion).', '. strtoupper($datos->comuna); ?></u>&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Ocupación: </label> <u><?php IF(!empty($datos->ocupacion))echo strtoupper($datos->ocupacion); ?></u>
               
                <?php //die(var_dump($suicidio));
                    IF(!empty($suicidio))$sui = explode('_',$suicidio->suiDatos);
                    ELSE $sui[0]=$sui[1]=$sui[2]=$sui[3]=$sui[4]=$sui[5]=$sui[6]=$sui[7]=$sui[8]=$sui[9]=$sui[10]=$sui[11]=$sui[12]=$sui[13]=$sui[14]='';
                ?>
                    <br><hr><br>
                    <h2 align="center"><u>Escala de Riesgo de Suicidio</u></h2>
                    <label class="titulo">Datos de Evaluación</label>
                    <br><br>
                        <label>¿Toma habitualmente medicamentos o pastillas para dormir?</label>
                         <u><?php IF($sui[0] === '1')echo 'Si'; ELSE IF($sui[0] === '0')echo 'No'?></u>
                    <br>
                        <label>¿Tiene dificultades para conciliar el sueño?</label>
                        <u><?php IF($sui[1] === '1')echo 'Si';ELSEIF($sui[1] === '0')echo 'No'?></u>
                    <br>
                        <label>¿A veces nota que podría perder el control sobre sí mismo/a?</label>
                        <u><?php IF($sui[2] === '1')echo 'Si';ELSE IF($sui[2] === '0')echo 'No';?></u>
                    <br>
                        <label>¿Tiene poco interés en relacionarse con la gente?</label>
                        <u><?php IF($sui[3] === '1')echo 'Si';ELSEIF($sui[3] === '0')echo 'No';?></u>
                    <br>
                        <label>¿Ve su futuro con más pesimismo que optimismo?</label>
                        <u><?php IF($sui[4] === '1')echo 'Si';ELSEIF($sui[4] === '0')echo 'No';?></u>
                        <br>
                        <label>¿Se ha sentido alguna vez inútil o inservible?</label>
                        <u><?php IF($sui[5] === '1')echo 'Si';ELSEIF($sui[5] === '0')echo 'No';?></u>
                        <br>
                        <label>¿Ve su futuro sin ninguna esperanza?</label>
                        <u><?php IF($sui[6] === '1')echo 'Si';ELSE IF($sui[6] === '0')echo 'No';?></u>
                        <br>
                        <label>¿Se ha sentido alguna vez fracasado que sólo quería meterse en la cama y abandonarlo todo?</label>
                        <u><?php IF($sui[7] === '1')echo 'Si';ELSEIF($sui[7] === '0')echo 'No';?></u>
                        <br>
                        <label>¿Está deprimido/a ahora?</label>
                        <u><?php IF($sui[8] === '1')echo 'Si';ELSEIF($sui[8] === '0')echo 'No';?></u>
                        <br>
                        <label>¿Está usted separado/a, dicorciado/a o viudo/a?</label>
                        <u><?php IF($sui[9] === '1')echo 'Si';ELSEIF($sui[9] === '0')echo 'No';?></u>
                        <br>
                        <label>¿Sabe si alguien de su familia ha intentado suicidarse alguna vez?</label>
                        <u><?php IF($sui[10] === '1')echo 'Si';ELSEIF($sui[10] === '0')echo 'No';?></u>
                        <br>
                        <label>¿Alguna vez se ha sentido tan enojado/a que habría sido capaz de matar a alguien?</label>
                        <u><?php IF($sui[11] === '1')echo 'Si';ELSE IF($sui[11] === '0')echo 'No';?></u>
                        <br>
                        <label>¿Ha pensado alguna vez en suicidarse?</label>
                        <u><?php IF($sui[12] === '1')echo 'Si';ELSEIF($sui[12] === '0')echo 'No';?></u>
                        <br>
                        <label>¿Le ha comentado a alguien, en alguna ocasión que quería suicidarse?</label>
                        <u><?php IF($sui[13] === '1')echo 'Si';ELSEIF($sui[13] === '0')echo 'No';?></u>
                        <br>
                        <label>¿Ha intentado alguna vez quitarse la vida?</label>
                        <u><?php IF($sui[14] === '1')echo 'Si';ELSE IF($sui[14] === '0')echo 'No';?></u>
                        <br><br><br>
                        <label>Responsable: <?php IF(!empty($suicidio->uspNombre))echo strtoupper($suicidio->uspNombre).' '.strtoupper($suicidio->uspApellidoP).' '.strtoupper($suicidio->uspApellidoM);?></label>
                        
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



