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
                echo form_open('hd_admision/impresiones/imprimirImprimir',$attributes);
            ?>
                            
            <div class='widget-content'>
                
               
                    
                
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
                    
                    
                <input type="hidden" value="<?php echo $datos->id;?>" name="fichaElectro">
                <input type="hidden" value="<?php echo $datos->rut;?>" name="rut">
                <input type="hidden" value="<?php echo $datos->nombres;?>" name="nombres">
                <input type="hidden" value="<?php echo $datos->apellidoPaterno;?>" name="apellidoPaterno">
                <input type="hidden" value="<?php echo $datos->apellidoMaterno;?>" name="apellidoMaterno">
                <input type="hidden" value="<?php echo $datos->paciente;?>" name="pacId">
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
                        <?php //IF($datos->sexo === 'MASCULINO')$sexo = 'Masculino';ELSEIF($datos->sexo === 'FEMENINO')$sexo = 'Femenino';?>
                        <label>Sexo: </label> <?php echo $datos->sexo; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Fecha de Nacimiento: </label> <?php IF(!empty($datos->fechaNacimiento) && $datos->fechaNacimiento!=='0000-00-00'){$date = new DateTime($datos->fechaNacimiento);echo $date->format('d-m-Y');}  ELSE echo '--/--/----'; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Edad: </label> <?php IF(!empty($datos->fechaNacimiento))echo calculaedad($datos->fechaNacimiento); ?>
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
                        <input name="formIngresoHD" type="checkbox" id="formIngresoHD">
                    </div>
                    <div class="col-lg-4">
                        <label>Registro de Intervención</label>
                    </div>
                    <div class='col-lg-1' align="right">
                        <input name="formDeposito" type="checkbox" id="formDeposito">
                    </div>
                    <div class="col-lg-6">
                        <label>Comprobante de Devolución</label>
                    </div>
                    <div class='col-lg-1' align="right">
                        <input name="formRecordatorio" type="checkbox" id="formRecordatorio">
                    </div>
                    <div class="col-lg-4">
                        <label>Formulario Recordatorio de Enfermería</label>
                    </div>
                    <div class='col-lg-1' align="right" title="Este formulario debe imprimirse en forma unica">
                        <input name="formSignos" type="checkbox" id="formSignos" title="Este formulario debe imprimirse en forma unica">
                    </div>
                    <div class="col-lg-6" title="Este formulario debe imprimirse en forma unica">
                        <label title="Este formulario debe imprimirse en forma unica">Formulario de Registro de Signos Vitales</label>
                    </div>
                    <div class='col-lg-1' align="right">
                        <input name="formLicencia" type="checkbox" id="formLicencia">
                    </div>
                    <div class="col-lg-4">
                        <label>Solicitud Licencia Médica</label>
                    </div>
                    <div class='col-lg-1' align="right">
                        <input name="formRecetas" type="checkbox" id="formRecetas">
                    </div>
                    <div class="col-lg-6">
                        <label>Solicitud de Recetas</label>
                    </div>
                    <div class='col-lg-1' align="right">
                        <input name="formMedicamentos" type="checkbox" id="formMedicamentos">
                    </div>
                    <div class="col-lg-4">
                        <label>Entrega de Medicamentos de Reserva</label>
                    </div>
                    <div class='col-lg-1' align="right">
                        <input name="formSolicitudesBlanco" type="checkbox" id="formSolicitudesBlanco">
                    </div>
                    <div class="col-lg-6">
                        <label>Solicitud de Permiso en Blanco</label>
                    </div>
                    <div class='col-lg-1' align="right">
                        <input name="formIngresoEnfermeria" type="checkbox" id="formIngresoEnfermeria">
                    </div>
                    <div class="col-lg-6">
                        <label>Ingreso de Enfermería</label>
                    </div>
                    
                    
                    
                </div>
                <div class="col-lg-12"><br></div>
                    <div class="col-lg-12" align="center">
                        <?php echo form_submit('','Imprimir Formularios','class="btn btn-primary btn-sm btnCetep"');?>
                    </div>
                <?php echo form_close();?>
                <!--
                <?php $attributes = array('id' => 'form');
                echo form_open('hd_admision/impresiones/imprimirImprimir',$attributes);
                ?>
                <input type="hidden" value="<?php echo $datos->id;?>" name="fichaElectro">
                <div class='col-lg-1' align="right">
                        <input name="formPrefactura" type="checkbox" id="formPrefactura">
                    </div>
                    <div class="col-lg-6">
                        <label>Prefactura</label>
                    </div>
                <div class="col-lg-12"><br></div>
                    <div class="col-lg-12" align="center">
                        <?php echo form_submit('','Imprimir Prefactura','class="btn btn-primary btn-sm btnCetep"');?>
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
$("#form").submit(function () {  
    var cero = $('#formIngresoHD').prop('checked');
    var uno = $('#formRecordatorio').prop('checked');
    var dos = $('#formSignos').prop('checked');
    var tres = $('#formLicencia').prop('checked');
    var cuatro = $('#formRecetas').prop('checked');
    var cinco = $('#formMedicamentos').prop('checked');
    var seis = $('#formSolicitudesBlanco').prop('checked');
    var siete = $('#formDeposito').prop('checked');
    var ocho = $('#formIngresoEnfermeria').prop('checked');
    var nueve = $('#formPrefactura').prop('checked');
    
    if(nueve === false && ocho === false && cero === false && uno === false && dos === false && tres === false && cuatro === false && cinco === false && seis === false && siete === false) {  
        alert("Seleccione un formulario a imprimir");  
        return false;
    } 
});  

</script>

