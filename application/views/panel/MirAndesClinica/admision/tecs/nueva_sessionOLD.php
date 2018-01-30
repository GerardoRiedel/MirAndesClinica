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
                

			
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" style="border-color: #000000;"  >
        <br><div class="col-lg-12" align="center">
                <button onclick="goBack()" class="btn btn-default btn-sm btnVolver">Volver</button><script>function goBack(){window.history.go(-1);}</script>
            </div>
        
            <?php $attributes = array('id' => 'form');
                echo form_open('clinica_admision/tecs/guardarSession',$attributes);
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
                        <label><?php echo formatearRut($datos->rut); ?></label>
                    </div>
                    <div class="col-lg-2">
                        <label>Nombre</label>
                    </div>
                    <div class='col-lg-10'>
                        <label><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno) ?> </label>
                    </div>
                    <div class="col-lg-2">
                        <label>Sesiones</label>
                    </div>
                    <div class='col-lg-2'>
                        Canceladas: <label><?php echo $datos->tecSessiones;?></label>
                    </div>
                    <div class="col-lg-2">
                        <?php $calculo = $datos->tecSessiones-$sessiones[0]->suma; ?>
                        Restantes: <label><?php echo $calculo;?></label>
                    </div>
                    <div class="col-lg-2">
                        <label>Medico Asignado: </label>
                    </div>
                    <div class='col-lg-4'>
                        <select name="medicoAsignado" id="medicoAsignado">
                            <?php foreach($medico as $med): ?>
                            <?php IF ($med->id === $datos->tecMedicoAsignado) echo '<option value="'.$datos->tecMedicoAsignado.'" selected>'.strtoupper($datos->apellidomedicoAsignado).' '.strtoupper($datos->nombresmedicoAsignado).'</option>';?>
                            <option value="<?php echo $med->id; ?>"><?php echo strtoupper($med->apellidoPaterno).' '.strtoupper($med->apellidoMaterno).' '.strtoupper($med->nombres); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                <input type="hidden" value="<?php echo $datos->tecId;?>" name="tecId">    
                <input type="hidden" value="<?php echo $calculo;?>" name="calculo" id="calculo">    
                    
                    <div class='col-lg-12' style=" min-height: 25px"></div>
                    </div><!-- FIN DIV FICHA COMPLETA-->
                    <div class="col-lg-12" align="center">
                        <?php echo form_submit('','Usar Session Disponible','class="btn btn-primary btn-sm btnCetep"');?>
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
    $("#form").submit(function () { 
        
        var calculo = $("#calculo").val()
        
        if (calculo <= '0'){
            alert('Sesiones terminadas');
            return false;
        }
    });
</script>

