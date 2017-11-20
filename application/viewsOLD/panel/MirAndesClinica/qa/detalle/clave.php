<?php error_reporting(E_ALL ^ E_NOTICE); ?>

<style>
    .titulo{
        color: #a15ebe;
    }
    .in{
        max-width: 150px
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
                echo form_open('qa/detalle/guardarClave',$attributes);
            ?>
                            
            <div class='widget-content'>
                
                <br>
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
            <!-- DATOS DE PERSONALES-->               
                    <div class="col-lg-2" align="center">
                        <label>Ingrese Clave</label>
                    </div>
                    <div class='col-lg-3'>
                        <input name="clave" type="text" class="numero" id="clave1" required value="<?php IF(!empty($data))echo $data->pasClave; ?>" pattern="[1-3]{4}" title="Valores entre 1 y 3">
                    </div>
                    <div class='col-lg-3'>
                        <input type="password" id="clave2" placeholder="Confirme Clave">
                    </div>
                    <div class="col-lg-12" style=" margin: 30px; text-align: center">
                        <?php echo form_submit('','Guardar','class="btn btn-primary btn-sm btnCetep"');?>
                    </div>
                    
</div><!-- FIN DIV FICHA COMPLETA-->
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
    $("#form").submit(function () {  
        var clave1 = $( "#clave1" ).val();
        var clave2 = $( "#clave2" ).val();
        if(clave1 != clave2){
            alert("Claves no coinciden");  
            return false;
        }
    });  
</script>

<script>
    //////VALIDACIONES DE TECLAS//////
       
        $(".numero").keydown(function (e) {
            //alert(event.keyCode);
            if (event.keyCode > 96 && event.keyCode < 100 || event.keyCode > 48 && event.keyCode < 52 || event.keyCode === 8 || event.keyCode === 46 || event.keyCode === 13  || event.keyCode === 9)
            {}
            else {alert('Ingrese un número valido entre 1 y 3');event.returnValue = false;}
        });
</script>