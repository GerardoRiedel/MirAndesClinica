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
                echo form_open('clinica_admin/ingresos/guardarNuevoRegistro',$attributes);
            ?>
                            
            <div class='widget-content'>
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
                    
                    
                <input type="hidden" value="<?php echo $datos->id;?>" name="fichaElectro" id="fichaElectro">
                <input type="hidden" value="<?php echo $datos->rut;?>" name="rut" id="rut">
                <input type="hidden" value="<?php echo $evo->evoId;?>" name="evoId" id="evoId">
                <div class="col-lg-12" ><hr style="height: 12px"></div>
                <!-- DATOS DE PERSONALES--> 
                
                
                <div class="col-lg-12" align="center"><h2 class="titulo">EVOLUCIÓN ENFERMERÍA DIARIA</h2></div>
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
                        <input name="evoEstadia" id="diaEstadia" type="text" style=" max-width: 100px" value="<?php IF(!empty($evo->evoEstadia))echo $evo->evoEstadia;?>" readonly>
                    </div>
                    <div class="col-lg-1" align="center">
                        <label>Habitación: </label>
                    </div>
                    <div class="col-lg-2">
                        <input name="evoHabitacion" id="habitacion" type="text" style=" max-width: 100px" value="<?php IF(!empty($evo->evoHabitacion))echo $evo->evoHabitacion;?>" readonly>
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-2">
                        <label>Dg Psiquiatríco: </label>
                    </div>
                    <div class='col-lg-10'>
                        <input type="text" style="width: 94%;" name="evoDiagPsiquiatra" id="evoDiagPsiquiatra" value="<?php IF(!empty($evo->evoDiagPsiquiatra))echo $evo->evoDiagPsiquiatra;?>" readonly>
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-2">
                        <label>Dg Médico: </label>
                    </div>
                    <div class='col-lg-10'>
                        <input type="text" style="width: 94%;" name="evoDiagMedico"  id="evoDiagMedico"    value="<?php IF(!empty($evo->evoDiagMedico))echo $evo->evoDiagMedico;?>" readonly>
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
                        <input name="evoPeso" id="peso" type="text" value="<?php IF(!empty($evo->evoPeso))echo $evo->evoPeso;?>" readonly>
                    </div>
                    <div class="col-lg-2" align="right">
                        <label>Escala Riesgo: </label>
                    </div>
                    <div class="col-lg-4">
                        <input name="evoRiesgo" id="riesgo" type="text" value="<?php IF(!empty($evo->evoRiesgo))echo $evo->evoRiesgo;?>" readonly>
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-2">
                        <label>Talla: </label>
                    </div>
                    <div class="col-lg-3">
                        <input name="evoTalla" id="talla" type="text" value="<?php IF(!empty($evo->evoTalla))echo $evo->evoTalla;?>" readonly>
                    </div>
                    <div class="col-lg-2" align="right">
                        <label>Escala Dowton: </label>
                    </div>
                    <div class="col-lg-4">
                        <input name="evoDowton" id="dowton" type="text" value="<?php IF(!empty($evo->evoDowton))echo $evo->evoDowton;?>" readonly>
                    </div>
                    
                    
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-12" align="center">
                        <?php
                        $this->load->view('panel/MirAndesClinica/clinica/ingresos/tablas/formCSV');
                        ?>
                        
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-2"><label>Ciclo sueño-vigilia</label>
                    </div>
                    <div class="col-lg-3">Día: <input type="text" name="evoSueDia" id="evoSueDia" value="<?php echo $evo->evoSueDia;?>" readonly>
                    </div>
                    <div class="col-lg-3">Noche: <input type="text" name="evoSueNoche" id="evoSueNoche" value="<?php echo $evo->evoSueNoche;?>" readonly>
                    </div>
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-2"><label>Hidratación</label>
                    </div>
                    <div class="col-lg-3">Día: <input type="text" name="evoHidraDia" id="evoHidraDia" value="<?php echo $evo->evoHidraDia;?>" readonly>
                    </div>
                    <div class="col-lg-3">Noche: <input type="text" name="evoHidraNoche" id="evoHidraNoche" value="<?php echo $evo->evoHidraNoche;?>" readonly>
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
                    <?php $TO = explode('_',$evo->evoTO); ?>
                    <div class="col-lg-2"><label>Visitas</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="radio" name="evoVisitas" value="1" <?php IF($evo->evoVisitas==='1')echo 'checked';?>> Si 
                        <input type="radio" name="evoVisitas" value="2" <?php IF($evo->evoVisitas==='2')echo 'checked';?>> No
                    </div>
                    <div class="col-lg-2">
                        <label>T.O. Mañana</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" name="evoTO1" id="evoTO1" value="<?php echo $TO[0];?>" readonly>
                    </div>
                    <div class="col-lg-2"><label>Teléfono</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="radio" name="evoTelefono" value="1" <?php IF($evo->evoTelefono==='1')echo 'checked';?>> Si 
                        <input type="radio" name="evoTelefono" value="2" <?php IF($evo->evoTelefono==='2')echo 'checked';?>> No
                    </div>
                    <div class="col-lg-2">
                        <label>T.O. Tarde</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" name="evoTO2" id="evoTO2" value="<?php echo $TO[1];?>" readonly>
                    </div>
                    <div class="col-lg-2"><label>Salidas</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="radio" name="evoSalidas" value="1" <?php IF($evo->evoSalidas==='1')echo 'checked';?>> Si 
                        <input type="radio" name="evoSalidas" value="2" <?php IF($evo->evoSalidas==='2')echo 'checked';?>> No
                    </div>
                    <div class="col-lg-2">
                        <label>Otros</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" name="evoTOOtro" id="evoTOOtro" value="<?php echo $TO[2];?>" readonly>
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
                        <label>PLAN DE ENFERMERIA</label><br><textarea readonly name="evoPlan" id="evoPlan"><?php echo $evo->evoPlan;?></textarea>
                    </div>
                    <div class="col-lg-4">
                        <label>EXAMENES</label><br><textarea readonly name="evoExamenes" id="evoExamenes"><?php echo $evo->evoExamenes;?></textarea>
                    </div>
                    <div class="col-lg-4">
                        <label>OBSERVAR Y AVISAR</label><br><textarea readonly name="evoAvisar" id="evoAvisar"><?php echo $evo->evoAvisar;?></textarea>
                    </div>
                    <div class='col-lg-12'><br></div>
                    
                        <?php
                        $this->load->view('panel/MirAndesClinica/clinica/ingresos/tablas/formEvolucion');
                        ?>
                    
                    <div class="col-lg-6" align="right" style="margin-top:5px">
                    
                    <button onclick="goBack()" class="btn btn-primary btn-sm btnCetep">Volver</button><script>function goBack(){window.history.go(-1);}</script>
                
                    </div>
                    
                    
                    <div class="col-lg-5" align="left" style="margin-left:5px">
                        <!--
                        <a href="<?php echo base_url("clinica_admin/fichas/imprimirEvolucion/" . $evo->evoId )?>" id="btnImprimir">
                        -->
                        <a id="btnImprimir">
                            <i class="fa fa-print fa-3x" aria-hidden="true" style="cursor:pointer;color: #da812e;vertical-align: central" title="Imprimir Evolución"></i>
                        </a>
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
    var evoId = $( "#evoId" ).val(); 
    location.href="<?php echo base_url(); ?>"+"clinica_admin/fichas/imprimirEvolucion/"+evoId;
           
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
