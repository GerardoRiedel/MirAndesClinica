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
        width: 150px;
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
            <?php $attributes = array('id' => 'form');
            //die(var_dump($datos));
                echo form_open('clinica_enfermeria/ingresos/guardarNuevoRegistro',$attributes);
            ?>
                            
            <div class='widget-content'>
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
                    
                    
                <input type="hidden" value="<?php echo $datos->id;?>" name="fichaElectro" id="fichaElectro">
                <input type="hidden" value="<?php echo $datos->rut;?>" name="rut" id="rut">
                <input type="hidden" value="<?php echo $evo->evoId;?>" name="evoId" id="evoId">
                <div class="col-lg-12" ><br></div>
                <!-- DATOS DE PERSONALES--> 
                
                
                <div class="col-lg-12" align="center"><h2 class="titulo">HOJA DE ENFERMERIA MIRANDES CLINICA</h2></div>
                <div class="col-lg-12"><br></div>
                    
                    <div class="col-lg-4">
                        <label>Ficha N°: </label> <h7 style="font-size:20px"><b><?php echo $datos->ficha; ?></b></h7>
                    </div>
                    <div class="col-lg-4">
                    <label>Alergias: </label> <h7 style="color:red;font-size:20px"><b><?php IF(!empty($datos->alergia))echo $datos->alergia;ELSE echo '.....................' ?></b></h7>
                     <!--   
                    <input name="alergias" type="text" value="<?php IF(!empty($datos->alergia))echo $datos->alergia;?>">
                    -->
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
                            <!--
                                    <div class="col-lg-2">
                                        <label>Alergia: </label>
                                    </div>
                                    <div class='col-lg-4'>
                                        <input name="alergias" type="text" value="<?php IF(!empty($datos->alergia))echo $datos->alergia;?>">
                                    </div>
                            -->
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Medico Asignado: </label>
                    </div>
                    <div class='col-lg-3'>
                        <select name="medicoAsignado" id="medicoAsignado">
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
                    <div class="col-lg-1" align="right">
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
                        <input type="text" style="width: 94%;" name="evoDiagPsiquiatra" id="evoDiagPsiquiatra" value="<?php IF(!empty($evo->evoDiagPsiquiatra))echo $evo->evoDiagPsiquiatra;?>">
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-2">
                        <label>Dg Médico: </label>
                    </div>
                    <div class='col-lg-10'>
                        <input type="text" style="width: 94%;" name="evoDiagMedico"  id="evoDiagMedico"    value="<?php IF(!empty($evo->evoDiagMedico))echo $evo->evoDiagMedico;?>">
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-2">
                        <label>Regimen: </label>
                    </div>
                    <div class='col-lg-4'>
                        <select name="regimen" required id="regimen">
                            <?php foreach($regimen as $reg) { ;?>
                            <option value="<?php echo $reg->regId;?>" <?php IF ($datos->regimen === $reg->regId)echo 'selected';?>><?php echo $reg->regNombre;?></option>
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
                        <input type="text" value="<?php IF($suicidio >= '6')echo 'ALTO'; ELSEIF($suicidio >= '1')echo 'BAJO'; ?>">
                        <!-- <a onclick="redirectcargarEscalaSuicidio()"  ><i class="fa fa-plus-circle" aria-hidden="true" style=" cursor: pointer;color: red"></i></a> <!-- href="<?php //echo base_url("clinica_enfermeria/ingresos/cargarEscalaSuicidio/".$evo->evoId.'_'.$evo->evoRegistro )?>" -->
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
                        <!-- <a onclick="redirectcargarEscalaCaida()" ><i class="fa fa-plus-circle" aria-hidden="true" style=" cursor: pointer;color: red"></i></a> <!-- href="<?php //echo base_url("clinica_enfermeria/ingresos/cargarEscalaCaida/".$evo->evoId.'_'.$evo->evoRegistro )?>" -->
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
                        <td style="width:100px;border:none"><input type="checkbox" name="alim1" <?php IF($alim[0]==='on')echo 'checked';?>> Colac 1°</td>
                        <td style="width:100px;border:none"><input type="checkbox" name="alim2" <?php IF($alim[1]==='on')echo 'checked';?>> Desay </td>
                        <td style="width:100px;border:none"><input type="checkbox" name="alim3" <?php IF($alim[2]==='on')echo 'checked';?>> Almuer </td>
                        <td style="width:100px;border:none"><input type="checkbox" name="alim4" <?php IF($alim[3]==='on')echo 'checked';?>> Once </td>
                        <td style="width:100px;border:none"><input type="checkbox" name="alim5" <?php IF($alim[4]==='on')echo 'checked';?>> Cena </td>
                        <td style="width:100px;border:none"><input type="checkbox" name="alim6" <?php IF($alim[5]==='on')echo 'checked';?>> Colac 2° </td>
                    </table>
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-2"><label>Ciclo sueño-vigilia</label>
                    </div>
                    <div class="col-lg-3">Día: <input type="text" name="evoSueDia" id="evoSueDia" value="<?php echo $evo->evoSueDia;?>">
                    </div>
                    <div class="col-lg-4">Noche:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="evoSueNoche" id="evoSueNoche" value="<?php echo $evo->evoSueNoche;?>">
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-2"><label>Hidratación</label>
                    </div>
                    <div class="col-lg-3">Día: <input type="text" name="evoHidraDia" id="evoHidraDia" value="<?php echo $evo->evoHidraDia;?>">
                    </div>
                    <div class="col-lg-4">Noche: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="evoHidraNoche" id="evoHidraNoche" value="<?php echo $evo->evoHidraNoche;?>">
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
                        <input type="text" name="evoTO1" id="evoTO1" value="<?php echo $TO[0];?>">
                    </div>
                    <div class="col-lg-2"><label>Teléfono</label>
                    </div>
                    <div class="col-lg-3">
                        <input type="radio" name="evoTelefono" value="1" <?php IF($evo->evoTelefono==='1')echo 'checked';?>> Si 
                        <input type="radio" name="evoTelefono" value="2" <?php IF($evo->evoTelefono==='2')echo 'checked';?>> No
                    </div>
                    <div class="col-lg-2">
                        <label>T.O. Tarde</label>
                    </div>
                    <div class="col-lg-4" style=" margin-left: -64px">
                        <input type="text" name="evoTO2" id="evoTO2" value="<?php echo $TO[1];?>">
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
                        <input type="text" name="evoTOOtro" id="evoTOOtro" style=" width: 100%" value="<?php echo $TO[2];?>">
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
                    
                    <div class="col-lg-4" align="right" style="margin-top:5px">
                    
                    <button onclick="goBack()" class="btn btn-default btn-sm">Cancelar</button><script>function goBack(){window.history.go(-1);}</script>
                
                    </div>
                    <div class="col-lg-2" align="center" style="margin-top:5px">
                        <?php echo form_submit('','Guardar','class="btn btn-primary btn-sm btnCetep"');?>
                        <?php echo form_close();?>
                    </div>
                    
                    <div class="col-lg-5" align="left" style="margin-left:5px">
                        <!--
                        <a href="<?php echo base_url("MirAndesClinica/clinica_enfermeria/fichas/imprimirEvolucion/" . $evo->evoId )?>" id="btnImprimir">
                        
                        <a id="btnImprimir">
                            <i class="fa fa-print fa-3x" aria-hidden="true" style="cursor:pointer;color: #da812e;vertical-align: central" title="Imprimir Evolución"></i>
                        </a>
                        -->
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
    $("#form").submit(function () {  
    
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
    
});  
</script>
<script>
    
$("#btnImprimir").click(function(){
        var medicoAsignado      = $( "#medicoAsignado" ).val();  
        var diaEstadia          = $( "#diaEstadia" ).val();  
        var habitacion          = $( "#habitacion" ).val();  
        var evoDiagPsiquiatra   = $( "#evoDiagPsiquiatra" ).val();  
        var evoDiagMedico       = $( "#evoDiagMedico" ).val();  
        var regimen             = $( "#regimen" ).val();  
        var peso                = $( "#peso" ).val();  
        var talla               = $( "#talla" ).val();  
        var riesgo              = $( "#riesgo" ).val();  
        var dowton              = $( "#dowton" ).val();  
        var evoSueDia           = $( "#evoSueDia" ).val();  
        var evoSueNoche         = $( "#evoSueNoche" ).val();  
        var evoHidraDia         = $( "#evoHidraDia" ).val();  
        var evoHidraNoche       = $( "#evoHidraNoche" ).val(); 

        var visitas             = $('input:radio[name=evoVisitas]:checked').val();
        var telefono            = $('input:radio[name=evoTelefono]:checked').val();
        var salidas             = $('input:radio[name=evoSalidas]:checked').val();
        var cuidador            = $('input:radio[name=evoCuidador]:checked').val();

        var evoTO1              = $( "#evoTO1" ).val();  
        var evoTO2              = $( "#evoTO2" ).val();  
        var evoTOOtro           = $( "#evoTOOtro" ).val();  
        var evoPlan             = $( "#evoPlan" ).val();  
        var evoExamenes         = $( "#evoExamenes" ).val();  
        var evoAvisar           = $( "#evoAvisar" ).val();  
        var evoDia              = $( "#evoDia" ).val();  
        var evoNoche            = $( "#evoNoche" ).val(); 
        evoNoche = evoNoche.replace(/\n/g, "<br>");

        var evoId               = $( "#evoId" ).val(); 
        var fichaElectro        = $( "#fichaElectro" ).val(); 
        var rut                 = $( "#rut" ).val(); 

    
    $.ajax({
        type: "GET",
        url: "<?php echo base_url(); ?>" + "api/clinica/guardar/"+medicoAsignado+"_"+diaEstadia+"_"+habitacion+"_"+evoDiagPsiquiatra+"_"+evoDiagMedico+"_"+regimen+"_"+peso+"_"+talla+"_"+riesgo+"_"+dowton+"_"+evoSueDia+"_"+evoSueNoche+"_"+evoHidraDia+"_"+evoHidraNoche+"_"+visitas+"_"+telefono+"_"+salidas+"_"+cuidador+"_"+evoTO1+"_"+evoTO2+"_"+evoTOOtro+"_"+evoPlan+"_"+evoExamenes+"_"+evoAvisar+"_"+evoDia+"_"+evoNoche+"_"+evoId+"_"+fichaElectro+"_"+rut,
        dataType: 'json',

        success: function(data){
            location.href="<?php echo base_url(); ?>"+"clinica_enfermeria/fichas/imprimirEvolucion/"+evoId;
           },
        error: function(data) {
            alert('Por favor, Asegurece de haber guardado antes de imprimir');
            location.href="<?php echo base_url(); ?>"+"clinica_enfermeria/fichas/imprimirEvolucion/"+evoId;
           }
    })
});
</script>    
<script>
    var csvCant = $( "#cantCSV" ).val();
    var cantMedicamento = $( "#cantMedicamento" ).val();
    if(csvCant < '65'){
        $(".csv4").hide();
        $("#more").click(function(){
            $("#more").hide();
            $(".csv4").show();  
        })
    }
    else {
        $("#more").hide();
    }
    
    if(cantMedicamento == '0'){
        $(".more2").hide();
        $("#more2").click(function(){
            $("#more2").hide();
            $(".more2").show();  
        })
    }
    else {
        $("#more2").hide();
    }
    
</script>
<script>
    //////VALIDACIONES DE TECLAS//////
        $("#evoDia").keydown(function () {
            if (event.keyCode != 219 && (event.keyCode < 48 || event.keyCode > 57))
                {}
            else {
                texto = $( "#evoDia" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("evoDia").value = texto;
                event.returnValue = false;
            }
        });
        $("#evoNoche").keydown(function () {
            if (event.keyCode != 219 && (event.keyCode < 48 || event.keyCode > 57))
                {}
            else {
                texto = $( "#evoNoche" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("evoNoche").value = texto;
                event.returnValue = false;
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



<script>
    function redirectcargarEscalaSuicidio() {
        var evoId = $( "#evoId" ).val();
        var fichaelectro = $( "#fichaElectro" ).val();
        
        var array = evoId+'_'+fichaelectro;
        actualizar();
        
        location.href="<?php echo base_url(); ?>"+"clinica_enfermeria/ingresos/cargarEscalaSuicidio/"+array;
    }
    
    function redirectcargarEscalaCaida() {
        var evoId = $( "#evoId" ).val();
        var fichaelectro = $( "#fichaElectro" ).val();
        
        var array = evoId+'_'+fichaelectro;
        actualizar();
        location.href="<?php echo base_url(); ?>"+"clinica_enfermeria/ingresos/cargarEscalaCaida/"+array;
    }
    
    
</script>

<script>
    function actualizar(){
        var evoId = $( "#evoId" ).val();
        var habitacion = $( "#habitacion" ).val();
        var diaEstadia = $( "#diaEstadia" ).val();
        var evoDiagPsiquiatra = $( "#evoDiagPsiquiatra" ).val();
        var evoDiagMedico = $( "#evoDiagMedico" ).val();
        var peso = $( "#peso" ).val();
        var talla = $( "#talla" ).val();
        var evoPlan = $( "#evoPlan" ).val();
        var evoAvisar = $( "#evoAvisar" ).val();
        var evoExamenes = $( "#evoExamenes" ).val();
        var evoDia = $( "#evoDia" ).val();
        var evoNoche = $( "#evoNoche" ).val();
        
        var evoSueDia = $( "#evoSueDia" ).val();
        var evoSueNoche = $( "#evoSueNoche" ).val();
        var evoHidraDia = $( "#evoHidraDia" ).val();
        var evoHidraNoche = $( "#evoHidraNoche" ).val();
        var array = evoId+'_'+habitacion+'_'+diaEstadia+'_'+evoDiagPsiquiatra+'_'+evoDiagMedico+'_'+peso+'_'+talla+'_'+evoPlan+'_'+evoAvisar+'_'+evoExamenes+'_'+evoDia+'_'+evoNoche+'_'+evoSueDia+'_'+evoSueNoche+'_'+evoHidraDia+'_'+evoHidraNoche;
                
         $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "api/ingresos/guardarEvolucion/"+array,
                    dataType: 'json',

                    success: function(data){
                        return true;
                    }
                });
    }
</script>



