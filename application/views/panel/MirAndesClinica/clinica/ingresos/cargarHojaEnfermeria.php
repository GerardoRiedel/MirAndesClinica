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
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25 ">
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
        
        <?php $attributes = array('id' => 'form');
            //die(var_dump($datos));
                echo form_open('clinica_enfermeria/ingresos/guardarHojaEnfermeria',$attributes);
            ?>
                            
            <div class='widget-content'>
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
                    
                    
                <input type="hidden" value="<?php echo $datos->id;?>" name="registro" id="registro">
                <input type="hidden" value="<?php echo $datos->rut;?>" name="rut">
                <input type="hidden" value="<?php echo $evoId->evoId;?>" name="evoId">
                <div class="col-lg-12" ></div>
                <!-- DATOS DE PERSONALES--> 
                
                <div id="imprimir">
                <div class="col-lg-12" align="center"><h2 class="titulo">Enfermeria Mirandes</h2></div>
                <div class="col-lg-12"><br></div>
                    
                    <div class="col-lg-4">
                        <label>Ficha N°: </label> <h7 style="font-size:20px"><b><?php echo $datos->ficha; ?></b></h7>
                    </div>
                    <div class="col-lg-4">
                    <label>Alergias: </label> <h7 style="color:red;font-size:20px"><b><?php IF(!empty($datos->alergia))echo $datos->alergia;ELSE echo '.....................' ?></b></h7>
                     
                    </div>
                    <div class="col-lg-4">
                    <label>Fecha Ingreso: </label> <input style="border:none; width: 130px" type="date" readonly value="<?php IF (!empty($datos->fechaIngreso))echo $datos->fechaIngreso;?>">
                    </div>
                
                    <div class="col-lg-12"><br></div>
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
                        <label>Sexo: </label> <?php echo strtoupper($datos->sexo); ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Fecha de Nacimiento: </label> <?php echo $datos->fechaNacimiento; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Edad: </label> <?php echo $edad; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Nacionalidad: </label> <?php IF ($datos->nacionalidad === '1') echo 'CHILENA';ELSEIF ($datos->nacionalidad === '2') echo 'EXTRANJERA' ?>
                    </div>
                
                    <div class="col-lg-12" ></div>
                    <div class="col-lg-3">
                        <label>Dirección: </label> <?php IF(!empty($datos->direccion))echo strtoupper($datos->direccion); ?>
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
                    <div class="col-lg-5">
                        <label>Email: </label> <?php IF(!empty($datos->email))echo strtoupper($datos->email); ?>
                    </div>
                <div class="col-lg-12" ><hr style="height: 2px"></div>  
                
                
            <!-- DATOS DE CLINICOS-->  
                    <div class="col-lg-12">
                    <label class="titulo">Datos Clínicos</label>
                    </div> 
                            
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Medico Asignado: </label>
                    </div>
                    <div class='col-lg-3'>
                        <select name="medicoAsignado">
                            <?php foreach($medico as $med): ;?>
                            <?php IF ($med->id === $datos->medicoAsignado) echo '<option value="'.$datos->medicoAsignado.'" selected>'.strtoupper($datos->apellidomedicoAsignado).' '.strtoupper($datos->nombresmedicoAsignado).'</option';?>
                            <option value="<?php echo $med->id; ?>"><?php echo strtoupper($med->apellidoPaterno).' '.strtoupper($med->apellidoMaterno).' '.strtoupper($med->nombres); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-lg-2" align="right">
                        <label>Día estadía: </label>
                    </div>
                    <div class="col-lg-2">
                        <input name="evoEstadia" id="diaEstadia" type="text" style=" max-width: 100px" value="<?php IF(!empty($evo->evoEstadia))echo $evo->evoEstadia;?>">
                    </div>
                    <div class="col-lg-1" align="center">
                        <label>Habitación: </label>
                    </div>
                    <div class="col-lg-2">
                        <input name="evoHabitacion" id="habitacion" type="text" style=" max-width: 100px" value="<?php IF(!empty($evo->evoHabitacion))echo $evo->evoHabitacion;?>">
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-2">
                        <label>Dg Psiquiatríco: </label>
                    </div>
                    <div class='col-lg-10'>
                        <input type="text" style="width: 94%;" id="evoDiagPsiquiatra" name="evoDiagPsiquiatra" value="<?php IF(!empty($evo->evoDiagPsiquiatra))echo $evo->evoDiagPsiquiatra;?>">
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-2">
                        <label>Dg Médico: </label>
                    </div>
                    <div class='col-lg-10'>
                        <input type="text" style="width: 94%;" id="evoDiagMedico" name="evoDiagMedico"      value="<?php IF(!empty($evo->evoDiagMedico))echo $evo->evoDiagMedico;?>">
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-2">
                        <label>Regimen: </label>
                    </div>
                    <div class='col-lg-4'>
                        <select name="regimen" required>
                            <?php foreach($regimen as $reg) { ;?>
                            <option value="<?php echo $reg->regId;?>" <?php IF ($datos->regimen === $reg->regId)echo 'selected';?>><?php echo strtoupper($reg->regNombre);?></option>
                            <?php }; ?>
                        </select>
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-2">
                        <label>Peso: </label>
                    </div>
                    <div class="col-lg-3">
                        <input name="evoPeso" id="peso" type="text" value="<?php IF(!empty($evo->evoPeso))echo $evo->evoPeso;?>">
                    </div>
                    <div class="col-lg-2" align="right">
                        <label>Escala Riesgo: </label>
                    </div>
                    <div class="col-lg-4">
                        <?php //die(var_dump($suicidio));
                            IF(!empty($suicidio)){$sui = explode('_',$suicidio->suiDatos); $suicidio = $sui[0]+$sui[1]+$sui[2]+$sui[3]+$sui[4]+$sui[5]+$sui[6]+$sui[7]+$sui[8]+$sui[9]+$sui[10]+$sui[11]+$sui[12]+$sui[13]+$sui[14];}
                            ELSE $suicidio = 0;
                        ?>
                        <input type="text" value="<?php IF($suicidio >= '6')echo 'ALTO'; ELSEIF($suicidio >= '1')echo 'BAJO';?>">
                        <a href="<?php echo base_url("clinica_enfermeria/ingresos/cargarEscalaSuicidio/".$evo->evoId.'_'.$datos->id )?>"><i class="fa fa-plus-circle" aria-hidden="true" style=" cursor: pointer;color: red"></i></a>
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-2">
                        <label>Talla: </label>
                    </div>
                    <div class="col-lg-3">
                        <input name="evoTalla" id="talla" type="text" value="<?php IF(!empty($evo->evoTalla))echo $evo->evoTalla;?>">
                    </div>
                    <div class="col-lg-2" align="right">
                        <label>Escala Dowton: </label>
                    </div>
                    <div class="col-lg-4">
                        <?php //die(var_dump($suicidio));
                            IF(empty($caida))$caida = 0;
                        ?>
                        <input type="text" value="<?php IF($caida >= '3')echo 'ALTO'; ELSEIF($caida >= '1')echo 'BAJO';?>">
                        <a href="<?php echo base_url("clinica_enfermeria/ingresos/cargarEscalaCaida/".$evo->evoId.'_'.$datos->id )?>"><i class="fa fa-plus-circle" aria-hidden="true" style=" cursor: pointer;color: red"></i></a>
                    </div>
                    
                    
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-12" align="center">
                        <?php
                        $this->load->view('panel/MirAndesClinica/clinica/ingresos/tablas/formCSV');
                        ?>
                        
                    </div>
                    
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-2"><label>Alimentación</label>
                    </div>
                    <div class="col-lg-10">
                        <?php $alim = explode('_',$evo->evoAlimentacion); ?>
                    <table>
                        <td style="width:100px"><input type="checkbox" name="alim1" <?php IF($alim[0]==='on')echo 'checked';?>> Colac 1°</td>
                        <td style="width:100px"><input type="checkbox" name="alim2" <?php IF($alim[1]==='on')echo 'checked';?>> Desay </td>
                        <td style="width:100px"><input type="checkbox" name="alim3" <?php IF($alim[2]==='on')echo 'checked';?>> Almuer </td>
                        <td style="width:100px"><input type="checkbox" name="alim4" <?php IF($alim[3]==='on')echo 'checked';?>> Once </td>
                        <td style="width:100px"><input type="checkbox" name="alim5" <?php IF($alim[4]==='on')echo 'checked';?>> Cena </td>
                        <td style="width:100px"><input type="checkbox" name="alim6" <?php IF($alim[5]==='on')echo 'checked';?>> Colac 2° </td>
                    </table>
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-2"><label>Ciclo sueño-vigilia</label>
                    </div>
                    <div class="col-lg-3">Día: <input type="text" name="evoSueDia" id="evoSueDia" value="<?php echo $evo->evoSueDia;?>" >
                    </div>
                    <div class="col-lg-4">Noche: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="evoSueNoche" id="evoSueNoche" value="<?php echo $evo->evoSueNoche;?>" >
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-2"><label>Hidratación</label>
                    </div>
                    <div class="col-lg-3">Día: <input type="text" name="evoHidraDia" id="evoHidraDia" value="<?php echo $evo->evoHidraDia;?>" >
                    </div>
                    <div class="col-lg-4">Noche: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="evoHidraNoche" id="evoHidraNoche" value="<?php echo $evo->evoHidraNoche;?>" >
                    </div>
                    <div class="col-lg-12"><br></div>
                    
                    
                    <?php $TO = explode('_',$evo->evoTO); ?>
                    <div class="col-lg-2"><label>Visitas</label>
                    </div>
                    <div class="col-lg-3">
                        <input type="radio" name="evoVisitas" value="1" <?php IF($evo->evoVisitas==='1')echo 'checked';?>> Si 
                        <input type="radio" name="evoVisitas" value="2" <?php IF($evo->evoVisitas==='2')echo 'checked';?>> No
                    </div>
                    <div class="col-lg-2">
                        <label>T.O. Mañana</label>
                    </div>
                    <div class="col-lg-4" style=" margin-left: -64px">
                        <input type="text" name="evoTO1" id="evoTO1" value="<?php echo $TO[0];?>" >
                    </div>
                    <div class="col-lg-2"><label>Teléfono</label>
                    </div>
                    <div class="col-lg-3">
                        <input type="radio" name="evoTelefono" value="1" <?php IF($evo->evoTelefono==='1')echo 'checked';?>> Si 
                        <input type="radio" name="evoTelefono" value="2" <?php IF($evo->evoTelefono==='2')echo 'checked';?>> No
                    </div>
                    <div class="col-lg-2" >
                        <label>T.O. Tarde</label>
                    </div>
                    <div class="col-lg-4" style=" margin-left: -64px">
                        <input type="text" name="evoTO2" id="evoTO2" value="<?php echo $TO[1];?>" >
                    </div>
                    <div class="col-lg-2"><label>Salidas</label>
                    </div>
                    <div class="col-lg-3">
                        <input type="radio" name="evoSalidas" value="1" <?php IF($evo->evoSalidas==='1')echo 'checked';?>> Si 
                        <input type="radio" name="evoSalidas" value="2" <?php IF($evo->evoSalidas==='2')echo 'checked';?>> No
                    </div>
                    <div class="col-lg-2">
                        <label>Otros</label>
                    </div>
                    <div class="col-lg-5" style=" margin-left: -64px">
                        <input type="text" name="evoTOOtro" id="evoTOOtro" style=" width: 100%" value="<?php echo $TO[2];?>" >
                    </div>
                    <div class="col-lg-2"><label>Cuidador</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="radio" name="evoCuidador" value="1" <?php IF($evo->evoCuidador==='1')echo 'checked';?>> Si 
                        <input type="radio" name="evoCuidador" value="2" <?php IF($evo->evoCuidador==='2')echo 'checked';?>> No
                    </div>
                    
                    <div class="col-lg-2"><label></label>
                    </div>
                    
                    
                    <div class="col-lg-12" align="center">
                        <?php
                        $this->load->view('panel/MirAndesClinica/clinica/ingresos/tablas/formMedicamentos');
                        ?>
                    </div>
                    
                    <div class='col-lg-12'><br></div>
                    <div class="col-lg-4">
                        <label>PLAN DE ENFERMERIA</label><br><textarea name="evoPlan" id="evoPlan"><?php echo $evo->evoPlan;?></textarea>
                    </div>
                    <div class="col-lg-4">
                        <label>EXAMENES</label><br><textarea name="evoExamenes" id="evoExamenes"><?php echo $evo->evoExamenes;?></textarea>
                    </div>
                    <div class="col-lg-4">
                        <label>OBSERVAR Y AVISAR</label><br><textarea name="evoAvisar" id="evoAvisar"><?php echo $evo->evoAvisar;?></textarea>
                    </div>
                    <div class='col-lg-12'><br></div>
                    
                        <?php
                        $this->load->view('panel/MirAndesClinica/clinica/ingresos/tablas/formEvolucion');
                        ?>
                    
                </div><!-- CERRAR PRINT -->
                    
                    
                    <div class="col-lg-6" align="right">
                        <?php echo form_submit('','Guardar','class="btn btn-primary btn-sm btnCetep"');?>
                    
                    </div>
                    <div class="col-lg-6">
                        
                        <a href="<?php echo base_url("clinica_enfermeria/medicos/listarEvoluciones/".$datos->id )?>" >
                            <i class="fa fa-list-ul fa-2x" aria-hidden="true" style="cursor:pointer;color: #da812e;vertical-align: central;margin-top: 3px" ></i>
                        </a>
                        
                        <h6 style="font-size:9px;margin-top: -3px;margin-left:4px;color:#da812e">Ficha</h6>
                        
                    </div>
</div><!-- FIN DIV FICHA COMPLETA-->
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

