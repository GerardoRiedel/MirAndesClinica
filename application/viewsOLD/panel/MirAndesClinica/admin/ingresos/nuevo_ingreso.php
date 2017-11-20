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
    .btnCetep{
        width: 20%;
        min-width: 80px;
        background-color: #da812e;
        border-color: #da812e
    }
    .btnCetep:hover{
        background-color: #AF601A;
        border-color: #da812e
    }
    .btnCetep:active{
        background-color: #da812e !important;
        border-color: #da812e
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
                echo form_open('clinica_admin/ingresos/guardarficha',$attributes);
            ?>
                            
            <div class='widget-content'>
                
                <br>
                    <div class="col-lg-12">
                        <label class="titulo">Datos de Ficha</label>
                    </div>
                    <div class="col-lg-2">
                        <label>Rut</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="rut"  type="text" placeholder="Digite run de paciente" minlength="7" required id="rut"><br><h7 style="font-size:8px">&nbsp;&nbsp;&nbsp;ejemplo 12345678-9</h7>
                    </div>
              
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                     
                    <div class="col-lg-2">
                        <label>N° Ficha</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="ficha"  type="text" minlength="4" id="ficha" placeholder="Solo paciente antiguo">
                    </div> 
                    <div class="col-lg-6"></div><div class="col-lg-6"><h7 style=" font-size: 9px; margin-top: -5px">(Dejar en blanco, solo completar con pacientes antiguos con ficha ya registrada)</h7></div>
    
    <div class="col-lg-12"></div>
    <div class="col-lg-6"></div>
                    <div class="col-lg-2">
                        <label>Piso Asignado</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="piso"  type="text" required maxlength="1" title="Ingrese un piso correcto" pattern="[0-9]{1}" required id="piso" value="<?php IF(!empty($datos->piso))echo $datos->piso; ?>">
                    </div>
                
                <div class="col-lg-12" ><hr style="height: 12px"></div>
                <!-- DATOS DE PERSONALES-->               
                    <div class="col-lg-12">
                    <label class="titulo">Datos Personales</label>
                    </div>
                
                    <div class="col-lg-2">
                        <label>Nombres</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="nombres"  type="text" minlength="4" required id="nombres">
                    </div>
                    <div class="col-lg-2">
                        <label>Apellido Paterno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apePat"  type="text" minlength="4" required id="apePat">
                    </div> 
                    <div class="col-lg-12" ></div>
                    <div class="col-lg-2">
                        <label>Apellido Materno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apeMat"  type="text" minlength="4" required id="apeMat">
                    </div>     
                    <div class="col-lg-2">
                        <label>Sexo</label>
                    </div>
                    <div class='col-lg-3' id="sex">
                        <table>
                            <tbody>
                            <tr>
                                <td style=" width: 30px" align="center"><input type="radio" name="sexo" value="MASCULINO" id="masculino"></td>
                                <td style=" width: 75px">Masculino</td>
                                <td style=" width: 30px" align="center"><input type="radio" name="sexo" value="FEMENINO" id="femenino"></td>
                                <td style=" width: 75px">Femenino</td>
                            </tr>
                            </tbody>
                        </table>
                        <!--
                            Masculino <input type="radio" name="sexo" id="mas">
                            Femenino  <input type="radio" name="sexo" id="fem">
                        -->
                    </div>
                    <div class="col-lg-1" align="left">
                        <img class="iconSexo" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconSexo"/>
                    </div>
                    <div class="col-lg-12" ></div>
                    <div class="col-lg-2">
                        <label>Fecha de Nacimiento</label>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control" required placeholder="día-mes-año" style=" width: 158px !important" name="fecha" id="fecha">
                        </div>
                    </div>
                    <div class="col-lg-1" align="middle">
                        <img class="iconFecha" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconFecha"/>
                    </div>
                    <div class="col-lg-2">
                        <label>Nacionalidad</label>
                    </div>
                    <div class='col-lg-3'>
                        <table>
                            <tbody>
                            <tr>
                                <td style=" width: 30px" align="center"><input value="1" type="radio" name="nac" id="chileno"></td>
                                <td style=" width: 75px">Chilena</td>
                                <td style=" width: 30px" align="center"><input value="2" type="radio" name="nac" id="extranjero"></td>
                                <td style=" width: 75px">Extranjero</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-1" align="left">
                        <img class="iconSexo" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconNac"/>
                    </div>
                <div class="col-lg-12" ><hr style="height: 2px"></div>
                <!-- DATOS DE CONTACTO-->            
                    <div class="col-lg-12">
                    <label class="titulo">Datos de Contacto</label>
                    </div>
           
                    <div class="col-lg-2">
                        <label>Dirección</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="direccion"  type="text" minlength="4" required id="direccion">
                    </div>
                    <div class="col-lg-2">
                        <label>Comuna</label>
                    </div>
                    <div class='col-lg-3' >
                        <select name="comuna" id="comuna">
                            <option value="0">Seleccione...</option>
                            <?php foreach($comuna as $com): ?>
                                <option value="<?php echo $com->id;?>"><?php echo $com->comuna;?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php //echo form_dropdown('comuna', $comuna, '', array('id'=>'comuna','required'=>TRUE));?>
                    </div>
                    <div class="col-lg-1" align="left">
                        <img class="iconCom" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconComPas"/>
                    </div>
                    <div class="col-lg-12" ></div>
                    <div class="col-lg-2">
                        <label>Teléfono Fijo</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="telFijo"  type="text" minlength="9" pattern="[0-9]{9}" id="telFijo">
                    </div>
                    <div class="col-lg-2">
                        <label>Teléfono Movil</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="telMovil"  type="text" minlength="9" pattern="[0-9]{9}" required id="telCelu">
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Ocupación</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="ocupacion"  type="text" minlength="4" required id="ocupacion">
                    </div>
                    <div class="col-lg-2">
                        <label>Email</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="email"  type="text" minlength="9" required id="email" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="mail@ejemplo.com"  >
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>En caso de emergencia, derivar a</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="emergenciaDerivar"  type="text" required id="emergenciaDerivar" required>
                    </div>
                <!-- OTRO CONTACTO-->    
                    <div class="col-lg-12" style=" display: line">
                        <label class="titulo">Otro N° de contacto</label>
                    </div>
                    <div class="col-lg-2">
                        <label>Nombre</label>
                    </div>
                    <div class='col-lg-4'>
                        <input type="text" minlength="4" name="nombreOtroContacto" ><h7 style=" font-size: 9px">(campo no obligatorios)</h7>
                    </div>
                    <div class="col-lg-2">
                        <label>Parentesco</label>
                    </div>
                    <div class='col-lg-4'>
                        <select name="parentescoOtroContacto" required>
                            <option>Seleccione...</option>
                            <option value="1">Padre</option>
                            <option value="2">Madre</option>
                            <option value="3">Hijo/a</option>
                            <option value="4">Conyuge</option>
                            <option value="5">Hermano/a</option>    
                            <option value="6">Tío/a</option>
                            <option value="7">Primo/a</option>
                            <option value="8">Otro</option>                               
                        </select><h7 style=" font-size: 9px">(campo no obligatorios)</h7>
                    </div>
                <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Teléfono Uno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input type="text" minlength="9" pattern="[0-9]{9}" title="Ingrese un telefono válido" name="telUnoOtroContacto"><h7 style=" font-size: 9px">(campo no obligatorios)</h7>
                    </div>
                    <div class="col-lg-2">
                        <label>Teléfono Dos</label>
                    </div>
                    <div class='col-lg-4'>
                        <input type="text" minlength="9" pattern="[0-9]{9}" title="Ingrese un telefono válido" name="telDosOtroContacto"><h7 style=" font-size: 9px">(campo no obligatorios)</h7>
                    </div>
                    <!--FIN OTRO CONTACTO-->     
                    <div class="col-lg-12"></div>
                    
                
                <div class="col-lg-12" ><hr></div>
                <!-- DATOS DE CONVENIO-->            
                    <div class="col-lg-12">
                    <label class="titulo">Datos de Convenio</label>
                    </div>
                
                    <div class="col-lg-2">
                        <label>Isapre</label>
                    </div>
                    <div class='col-lg-3'>
                        
                        <select name="isapre" id="isapre">
                            <option value="0">Seleccione...</option>
                        <?php foreach ($isapre as $is){ ?>
                            <option value="<?php echo $is->id; ?>"><?php echo $is->isapre; ?></option>
                        <?php } ?>
                        </select>
                            
                        <?php //echo form_dropdown('isapre', $isapre, '', array('id'=>'isapre','required'=>TRUE));?>
                    </div>
                    <div class="col-lg-1" align="left">
                        <img class="iconCom" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconIsapre"/>
                    </div>
                    <div class="btn-group col-lg-2" data-toggle="buttons">
                            <label>Convenio</label>
                    </div>
                    <div class='col-lg-3'>
                        <table>
                            <tbody>
                            <tr>
                                <td style=" width: 30px" align="center"><input type="radio" name="ges" id="ges" value="1"></td>
                                <td style=" width: 75px">Ges</td>
                                <td style=" width: 30px" align="center"><input type="radio" name="ges" id="libre" value="2"></td>
                                <td style=" width: 75px">Libre Elección</td>
                            </tr>
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="col-lg-1" align="left">
                        <img class="iconSexo" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconGes"/>
                    </div>
                    <div class="col-lg-2">
                        <label>Rut Titular</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="rutTitular" type="text" required minlength="7" required id="rutTitular">
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Licencia N°</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="licNumero" type="text" required id="licNumero">
                    </div>
                    <div class="col-lg-2">
                        <label>Desde</label>
                    </div>
                    <div class='col-lg-4'>
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control" required placeholder="día-mes-año" style=" width: 158px !important" name="licDesde" >
                        </div>
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-6"></div>
                    <div class="col-lg-2">
                        <label>Cantidad de Dias</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="licDias" type="text" required pattern="[0-9]{1,2}" maxlength="2" id="licDias">
                    </div>
                    
    
                    <div class="col-lg-12" ><hr></div>
                    <!-- DATOS DE APODERADO--> 
    <div id="divApo">
                    <div class="col-lg-12">
                    <label class="titulo">Datos de Apoderado</label>
                    </div>
                
                    <div class="col-lg-2">
                        <label>Rut</label>
                    </div>
                    <div class='col-lg-4'>
                        <input  name="rutApo" type="text" placeholder="Digite run de apoderado" required minlength="7" id="rutApo"><br><h7 style="font-size:8px">&nbsp;&nbsp;&nbsp;ejemplo 12345678-9</h7>
                    </div> 
                    <div class="col-lg-12" ></div>
    </div>             
<div id="divFichaApoderado"><!--INICIO DIVFICHA APODERADO-->
                    <div class="col-lg-2">
                        <label>Nombres</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="nombresApo"  type="text" minlength="4" required id="nombresApo">
                    </div>
                    <div class="col-lg-2">
                        <label>Apellido Paterno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apePatApo"  type="text" minlength="4" required id="apePatApo">
                    </div> 
                    <div class="col-lg-12"></div><!--SALTO DE LINEA-->
                    <div class="col-lg-6"></div>
                    <div class="col-lg-2">
                        <label>Apellido Materno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apeMatApo"  type="text" minlength="4" required id="apeMatApo">
                    </div> 
                    <div class="col-lg-12"></div><!--SALTO DE LINEA-->
                    <div class="col-lg-2">
                        <label>Dirección</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="direccionApo"  type="text" minlength="4" required id="direccionApo">
                    </div>
                    <div class="col-lg-2">
                        <label>Comuna</label>
                    </div>
                    <div class='col-lg-3' >
                        <select name="comunaApo" id="comunaApo">
                            <option value="0">Seleccione...</option>
                            <?php foreach($comuna as $com): ?>
                                <option value="<?php echo $com->id;?>"><?php echo $com->comuna;?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php //echo form_dropdown('comunaApo', $comuna, '', array('id'=>'comunaApo','required'=>TRUE));?>
                    </div>
                    <div class="col-lg-1" align="left">
                        <img class="iconCom" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconComApo"/>
                    </div>
                    <div class="col-lg-12" ></div>
                    <div class="col-lg-2">
                        <label>Teléfono Fijo</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="telFijoApo"  type="text" minlength="9" pattern="[0-9]{9}" id="telFijoApo">
                    </div>
                    <div class="col-lg-2">
                        <label>Teléfono Movil</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="telMovilApo"  type="text" minlength="9" pattern="[0-9]{9}" required id="telCeluApo">
                    </div>
                    <div class="col-lg-12"></div><!--SALTO DE LINEA-->
                    <div class="col-lg-2">
                        <label>Email</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="emailApo"  type="text" minlength="9" required id="emailApo" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="mail@ejemplo.com">
                    </div>
                    <div class="col-lg-2">
                        <label>Parentesco</label>
                    </div>
                    <div class='col-lg-4'>
                        <select name="parentescoApo">
                           <option value="1">Padre</option>
                            <option value="2">Madre</option>
                            <option value="3">Hijo/a</option>
                            <option value="4">Conyuge</option>
                            <option value="5">Hermano/a</option>    
                            <option value="6">Tío/a</option>
                            <option value="7">Primo/a</option>
                            <option value="8">Otro</option>                                   
                        </select>
                    </div>
</div>
                    <div class='col-lg-12' style=" min-height: 25px"></div>
                    <div class="col-lg-12" align="center">
                        <?php echo form_submit('','Siguiente','class="btn btn-primary btn-sm btnCetep"');?>
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



<script>
    $("#divFicha").hide(); 
    $("#divFichaApoderado").hide(); 
    //$("#divFichaEconomico").hide();
    $(".icon").hide();
    $(".iconSexo").hide();
    $(".iconCom").hide();
    $(".iconFecha").hide();
    
    $("#rut").attr("disabled", false).css("box-shadow","0 0 15px red");
    $("#rutApo").attr("disabled", false).css("box-shadow","0 0 15px red");
    //$("#rutApoEco").attr("disabled", false).css("box-shadow","0 0 15px red");
    
</script>
<script>
    $("#form").submit(function () { 
        
    $(".icon").hide();
    $(".iconCom").hide();
    $(".iconSexo").hide();
    
    
    if($('input:radio[name=sexo]:checked').val()===undefined) {  
        $("#iconSexo").show();
        alert("Campo Requerido");  
        return false;
    }
    if($('input:radio[name=nac]:checked').val()===undefined) {  
        $("#iconNac").show();
        //alert("Isapre Requerida");  
        return false;
    }
    if($("#comuna").val()==='0') {  
        $("#iconComPas").show();
        //alert("Comuna Requerida");  
        return false;
    }
    if($("#comunaApo").val()==='0') {  
        $("#iconComApo").show();
        //alert("Comuna Requerida");  
        return false;
    }
    if($("#fecha").val()===0 || $("#fecha").val()==='undefined') {  
        $("#iconFecha").show();
        //alert("Campo Requerido");  
        return false;
    }
    if($("#isapre").val()==='0') {  
        $("#iconIsapre").show();
        //alert("Isapre Requerida");  
        return false;
    }
    if($('input:radio[name=ges]:checked').val()===undefined) {  
        $("#iconGes").show();
        //alert("Isapre Requerida");  
        return false;
    }
        
});  

</script>
<script>
    
    
        $("#ficha").focusin(function(){
        document.getElementById("ficha").value     = '';
        });
        $("#rutApo").focusout(function(){
        ////LIMPIAR INPUTS
        document.getElementById("nombresApo").value = ""; document.getElementById("apePatApo").value = ""; document.getElementById("telFijoApo").value = ""; document.getElementById("telCeluApo").value = ""; document.getElementById("direccionApo").value = ""; document.getElementById("emailApo").value = "";
        
        var rut = $( "#rutApo" ).val();
        var validar = validaRut(rut);
        if (validar != true){$("#rutApo").attr("disabled", false).css("box-shadow","0 0 15px red"); $("#divFichaApoderado").hide(); alert('Rut Invalido');e.stopPropagation()}
        
        $("#rutApo").attr("disabled", false).css("box-shadow","0 0 0px");
        $("#divFichaApoderado").show();  
        
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var rut = rut.substring(0, 8);
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                if (data.rut != undefined){
                    document.getElementById("nombresApo").value     = data.nombres;
                    document.getElementById("apePatApo").value      = data.apellidoPaterno;
                    document.getElementById("apeMatApo").value      = data.apellidoMaterno;
                    document.getElementById("telFijoApo").value     = data.telefono;
                    document.getElementById("telCeluApo").value     = data.celular;
                    document.getElementById("direccionApo").value   = data.direccion;
                    document.getElementById("emailApo").value       = data.email;
                    
                    }
                
               }
        })
        });
 

</script>
<script>
    $("#rut").bind({
        
    focusout:function(){
        ////LIMPIAR INPUTS
        document.getElementById("ficha").value = "";document.getElementById("nombres").value = "";document.getElementById("apePat").value = "";document.getElementById("apeMat").value = "";document.getElementById("fecha").value = ""; document.getElementById("telFijo").value = ""; document.getElementById("telCelu").value = ""; document.getElementById("direccion").value  = ""; document.getElementById("email").value = ""; document.getElementById("ocupacion").value  = ""; document.getElementById("rutTitular").value = ""; document.getElementById("rutApo").value = "";
        
        var rut = $( "#rut" ).val();
        
        var validar = validaRut(rut);
        if (validar != true){$("#rut").attr("disabled", false).css("box-shadow","0 0 15px red"); $("#divFicha").hide(); alert('Rut Invalido');e.stopPropagation()}
        
        $("#rut").attr("disabled", false).css("box-shadow","0 0 0px");
        $("#divFicha").show();  
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var letra = rut.substring(0, 1);
        if (letra === '1' || letra === '2'){var rut = rut.substring(0, 8);}
        else {var rut = rut.substring(0, 7);}
        
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                if (data.ficha === undefined){document.getElementById("ficha").value = "Sin ficha, se creará al ingreso"}
                else {document.getElementById("ficha").value = data.ficha;}
                if (data.nombres != undefined){document.getElementById("nombres").value         = data.nombres;}
                if (data.apellidoPaterno != undefined){document.getElementById("apePat").value  = data.apellidoPaterno;}
                if (data.apellidoMaterno != undefined){document.getElementById("apeMat").value  = data.apellidoMaterno;}
                if (data.fechaNacimiento != undefined){document.getElementById("fecha").value   = data.fechaNacimiento;}
                if (data.telefono != undefined){document.getElementById("telFijo").value        = data.telefono;}
                if (data.celular != undefined){document.getElementById("telCelu").value         = data.celular;}
                if (data.direccion != undefined){document.getElementById("direccion").value     = data.direccion;}
                if (data.email != undefined){document.getElementById("email").value             = data.email;}
                if (data.ocupacion != undefined){document.getElementById("ocupacion").value     = data.ocupacion;}
                if (data.emergenciaDerivar != undefined){document.getElementById("emergenciaDerivar").value = data.emergenciaDerivar;}
                if (data.rut != undefined){document.getElementById("rutTitular").value          = rut;}
                else {
                    var conf = confirm("Paciente no existe. ¿Desea crearlo?");
                    if (conf == false) {
                        window.location.href = "http://www.cetep.cl/mirandes/index.php/clinica_admin/ingresos/listarIngreso";
                    } 
                }
                
            }
        })
        
        },
    keypress:function(){
        
        if (event.which == 13 || event.keyCode == 13) {
        
        $("#divFicha").show();
        $('#nombres').focus();
    
    }
    }
    });
    
    $("#rutApo").focusout(function(){
        if (event.which == 13 || event.keyCode == 13) {
        ////LIMPIAR INPUTS
        document.getElementById("nombresApo").value = ""; document.getElementById("apePatApo").value = ""; document.getElementById("telFijoApo").value = ""; document.getElementById("telCeluApo").value = ""; document.getElementById("direccionApo").value = ""; document.getElementById("emailApo").value = ""; document.getElementById("rutApoEco").value = "";
        
        var rut = $( "#rutApo" ).val();
        var validar = validaRut(rut);
        if (validar != true){$("#rutApo").attr("disabled", false).css("box-shadow","0 0 15px red"); $("#divFichaApoderado").hide(); alert('Rut Invalido');e.stopPropagation()}
        
        $("#rutApo").attr("disabled", false).css("box-shadow","0 0 0px");
        $("#divFichaApoderado").show(); 
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var rut = rut.substring(0, 8);
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                if (data.rut !== undefined){
                    document.getElementById("nombresApo").value     = data.nombres;
                    document.getElementById("apePatApo").value      = data.apellidoPaterno;
                    document.getElementById("telFijoApo").value     = data.telefono;
                    document.getElementById("telCeluApo").value     = data.celular;
                    document.getElementById("direccionApo").value   = data.direccion;
                    document.getElementById("emailApo").value       = data.email;
                    
                    }
               }
        });
        }
        });
</script> 
<script>
    $("#divApo").click(function(){
        $("#divFichaApoderado").show();  
    })
    
</script>
<script>
    //////VALIDACIONES DE TECLAS//////
        $("#fecha").keyup(function (e){
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
            {}
            else {
                texto = $( "#fecha" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("fecha").value = texto;
                event.returnValue = false;
            }
	});
        $("#rut").keyup(function (e){
		if(event.keyCode == 8 || event.keyCode == 46){
                    document.getElementById("rut").value = "";
		}
                else if (event.keyCode == 13 || event.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
                else {
                texto = $( "#rut" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("rut").value = texto;
                event.returnValue = false;
                }
	});
        $("#rutApo").keyup(function (e){
		if(event.keyCode == 8 || event.keyCode == 46){
                    document.getElementById("rutApo").value = "";
		}
                else if (event.keyCode == 13 || vent.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
                else {
                texto = $( "#rutApo" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("rutApo").value = texto;
                event.returnValue = false;
                }
	});
        
        $("#rutTitular").keyup(function (e){
		if(event.keyCode == 8 || event.keyCode == 46){
                    document.getElementById("rutTitular").value = "";
		}
                else if (event.keyCode == 13 || vent.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
                else {
                texto = $( "#rutTitular" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("rutTitular").value = texto;
                event.returnValue = false;
                }
	});
        $("#telFijo").keydown(function (e) {
            if (event.keyCode == 13 || vent.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
            else {
                texto = $( "#telFijo" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("telFijo").value = texto;
                event.returnValue = false;
            }
        });
        $("#telCelu").keydown(function (e) {
            if (event.keyCode == 13 || vent.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
            else {
                texto = $( "#telCelu" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("telCelu").value = texto;
                event.returnValue = false;
            }
        });
        $("#telFijoApo").keydown(function (e) {
            if (event.keyCode == 13 || vent.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
            else {
                texto = $( "#telFijoApo" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("telFijoApo").value = texto;
                event.returnValue = false;
            }
        });
        $("#telCeluApo").keydown(function (e) {
            if (event.keyCode == 13 || vent.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
            else {
                texto = $( "#telCeluApo" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("telCeluApo").value = texto;
                event.returnValue = false;
            }
        });
        $("#telFijoApoEco").keydown(function (e) {
            if (event.keyCode == 13 || vent.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
            else {
                texto = $( "#telFijoApoEco" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("telFijoApoEco").value = texto;
                event.returnValue = false;
            }
        });
        $("#telCeluApoEco").keydown(function (e) {
            if (event.keyCode == 13 || vent.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
            else {
                texto = $( "#telCeluApoEco" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("telCeluApoEco").value = texto;
                event.returnValue = false;
            }
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
