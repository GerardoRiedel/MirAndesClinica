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
                echo form_open('clinica_admision/impresiones/imprimirImprimirTEC',$attributes);
            ?>
                            
            <div class='widget-content'>
                
                <!--    
                    <div class="col-lg-12">
                    <label class="titulo">Datos de Ficha</label>
                    </div>
                    <div class="col-lg-2">
                        <label>Fecha de Derivación</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="fechaDeribacion" class="in" type="text" minlength="7" value="<?php IF(!empty($datos->fechaDerivacion))echo $datos->fechaDerivacion;?>" readonly="true">
                    </div>
                    <div class="col-lg-2">
                        <label>Fecha de Ingreso</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="fechaIngreso" class="in" type="text" minlength="7" required value="<?php IF(!empty($datos->fechaIngreso))echo $datos->fechaIngreso;?>">
                    </div>
                    <div class="col-lg-12"></div>
                 -->   
                    
                    
                
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
                    <?php //die(var_dump($data));?>
                    
                <input type="hidden" value="<?php echo $datos->tecId;?>" name="fichaElectro">
                <input type="hidden" value="<?php echo $datos->rut;?>" name="rut">
                <input type="hidden" value="<?php echo $datos->nombres;?>" name="nombres">
                <input type="hidden" value="<?php echo $datos->apellidoPaterno;?>" name="apellidoPaterno">
                <input type="hidden" value="<?php echo $datos->apellidoMaterno;?>" name="apellidoMaterno">
                <input type="hidden" value="<?php echo $datos->paciente;?>" name="pacId">
                <input type="hidden" value="<?php echo $edad;?>" name="edad">
                <div class="col-lg-12" ><hr style="height: 12px"></div>
                <!-- DATOS DE PERSONALES-->               
                    <div class="col-lg-12">
                    <label class="titulo">Datos Personales</label>
                    </div>
                    <div class="col-lg-12">
                        <label>Ingreso N°: </label> <?php echo $datos->tecFicha; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Rut Paciente: </label> <?php echo formatearRut($datos->rut);?>
                    </div>
                    <div class="col-lg-5">
                        <label>Nombre: </label> <?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno); ?>
                    </div>
                <div class="col-lg-12" ></div>    
                    <div class="col-lg-3">
                        <?php //IF($datos->sexo === 'MASCULINO')$sexo = 'Masculino';ELSEIF($datos->sexo === 'FEMENINO')$sexo = 'Femenino';?>
                        <label>Sexo: </label> <?php echo $datos->sexo; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Fecha de Nacimiento: </label> <?php IF($datos->fechaNacimiento !== '0000-00-00')echo $datos->fechaNacimiento; ELSE echo '--/--/----'; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Edad: </label> <?php echo $edad; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Nacionalidad: </label> <?php IF ($datos->nacionalidad === '1') echo 'CHILENA';ELSEIF ($datos->nacionalidad === '2') echo 'EXTRANJERO' ?>
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
                    <div class="col-lg-5">
                        <label>Email: </label> <?php IF(!empty($datos->email))echo strtoupper($datos->email); ?>
                    </div>
                <div class="col-lg-12" ><hr style="height: 2px"></div>  
                
                
                
                <div class='col-lg-12'></div>
                <!-- INICIO CHECKBOX -->
                <div class="col-lg-12">
                    <label class="titulo">Formularios a Imprimir</label>
                </div>
                <br>
                <div>
                    
                    <div class='col-lg-1' align="right">
                        <input name="formTec" type="checkbox" id="formTec" checked>
                    </div>
                    <div class="col-lg-6">
                        <label>Consentimiento T.E.C</label>
                    </div>
                    
                    
                </div>
                <br>
                    <div class="col-lg-12" align="center">
                        <?php echo form_submit('','Imprimir Formularios','class="btn btn-primary btn-sm btnCetep"');?>
                    </div>
                
</div><!-- FIN DIV FICHA COMPLETA-->
                
            <?php echo form_close();?>
                <div class="col-lg-12">
                    
                        <h7 style=" font-size: 10px">* Todos los formularios se adaptan a la modalidad de ingreso del paciente, ya sea esta Ges ó Libre elección</h7>
                </div>
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
    $("#form").submit(function () {  
    $(".iconCom").hide();
    var cero = $('#formUrgencias').prop('checked')
    var uno = $('#formPacApo').prop('checked')
    var dos = $('#formDeposito').prop('checked')
    //var tres = $('#formAutorizacionCetep').prop('checked')
    //var cuatro = $('#formAutorizacionCetepUsuarioBeneficiario').prop('checked')
    var cinco = $('#formCuidador').prop('checked')
    var seis = $('#formConsentimiento').prop('checked')
    var siete = $('#formEnfermeria').prop('checked')
    var ocho = $('#formEstadistico').prop('checked')
    var nueve = $('#formVisita').prop('checked')
    
    if(nueve === false && ocho === false && siete === false && cero === false && uno === false && dos === false && cinco === false && seis === false) {  
        alert("Seleccione un formulario a imprimir");  
        return false;
    } 
});  
</script>

