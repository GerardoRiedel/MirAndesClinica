<?php //error_reporting(E_ALL ^ E_NOTICE); ?>

<style>
    .titulo{
        color: #a15ebe;
    }
    .in{
        max-width: 150px
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
                echo form_open('clinica_admision/modificar/guardarModificarUsuario',$attributes);
            ?>
                            
            <div class='widget-content'>
                
                <br>
                    <input type="hidden" value="<?php IF(!empty($datos->uspId))echo $datos->uspId;?>" name="uspId">
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
            <!-- DATOS DE PERSONALES-->               
                    <div class="col-lg-12" style=" margin-bottom: 10px">
                    <label class="titulo">Datos de Usuario</label>
                    </div>
                    <div class="col-lg-1">
                        <label>Run</label>
                    </div>
                    <div class='col-lg-2'>
                        <input name="uspRut" id="uspRut" class="in" type="text" placeholder="Digite rut de usuario" minlength="7" required value="<?php IF(!empty($datos->uspRut))echo formatearRut($datos->uspRut);?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Email</label>
                    </div>
                    <div class='col-lg-2'>
                        <input name="uspEmail" id="uspEmail" class="in" placeholder="mail@ejemplo.cl" type="text" minlength="4" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="mail@ejemplo.com"  required value="<?php IF(!empty($datos->uspEmail))echo $datos->uspEmail; ?>">
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-1">
                        <label>Nombre</label>
                    </div>
                    <div class='col-lg-2'>
                        <input name="uspNombre" class="in" type="text" placeholder="Ingrese Nombre" minlength="4" required value="<?php IF(!empty($datos->uspNombre))echo $datos->uspNombre; ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Apellido Paterno</label>
                    </div>
                    <div class='col-lg-2'>
                        <input name="uspApellidoP" class="in" type="text" placeholder="Ingrese Apellido Paterno" minlength="4" required value="<?php IF(!empty($datos->uspApellidoP))echo $datos->uspApellidoP; ?>">
                    </div> 
                    <div class="col-lg-2">
                        <label>Apellido Materno</label>
                    </div>
                    <div class='col-lg-2'>
                        <input name="uspApellidoM" class="in" type="text" placeholder="Ingrese Apellido Materno" minlength="4" required value="<?php IF(!empty($datos->uspApellidoM))echo $datos->uspApellidoM; ?>">
                    </div>     
                    <div class="col-lg-12" ></div>
                    
                    
                    <div class="col-lg-5"></div>
                    <div class="col-lg-1" style=" margin-top: 30px">
                        <?php echo form_submit('','Guardar','class="btn btn-primary btn-sm btnCetep"');?>
                    </div>
                    <div class="col-lg-6"></div>
                    
                    <div class="col-lg-12">
                    <label class="titulo">Datos de Ingreso</label>
                    </div>
                    <div class="col-lg-1">
                        <label>Usuario</label>
                    </div>
                    <div class='col-lg-3' >
                        <input type="text" minlength="6" name="uspUsuario" id="uspUsuario" title="Minimo 6 caracteres" placeholder="Ingrese usuario" value="<?php IF(!empty($datos->uspUsuario))echo $datos->uspUsuario; ?>">
                    </div>
                    <div class="col-lg-1">
                        <label>Perfil</label>
                    </div>
                    <?php 
                        IF(empty($datos->uspPerfil))$perfil = 0; ELSE $perfil = $datos->uspPerfil;
                    ?>
                    <div class='col-lg-4' >
                        <select name="uspPerfil" id="uspPerfil">
                            <option value="0" >Seleccione...</option>
                            <option value="2" <?php IF($perfil === '2')echo 'selected'; ?>>Admisión</option>
                            <option value="1" <?php IF($perfil === '1')echo 'selected'; ?>>Administrador</option>
                            <option value="3" <?php IF($perfil === '3')echo 'selected'; ?>>Paramedico</option>
                            <option value="4" <?php IF($perfil === '4')echo 'selected'; ?>>Enfermeria</option>
                            <option value="5" <?php IF($perfil === '5')echo 'selected'; ?>>Médico</option>
                        </select>
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-1">
                        <label>Clave</label>
                    </div>
                    <div class='col-lg-3' >
                        <input type="password" minlength="6" id="clave1" name="clave" title="Minimo 6 caracteres" placeholder="Para cambiar ingrese nueva clave">
                    </div>
                    <div class="col-lg-1">
                        <label>Clave</label>
                    </div>
                    <div class='col-lg-4' >
                        <input type="password" minlength="6" id="clave2" title="Minimo 6 caracteres" placeholder="Confirme cambio de contraseña">
                    </div>
                    <div class='col-lg-12' style=" margin-bottom: 15px"></div>
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
    /*
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
    */
    
</script>
<script>
    $("#form").submit(function () {  
        var clave1 = $( "#clave1" ).val();
        var clave2 = $( "#clave2" ).val();
        if(clave1 != clave2){
            alert("Claves no coinciden");  
            return false;
        }
        if($("#uspPerfil").val()==0) {  
        alert("Perfil requerido");  
        return false;
        }
    }); 
</script>

<script>
    //////VALIDACIONES DE TECLAS//////
    /*
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
        */

</script>

<script>
    $("#uspRut").focusout(function(){
        
    var rut = $( "#uspRut" ).val();
    var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
    var rut = rut.substring(0, 8);
    if (rut != '')  {
            $.ajax({
                    type: "GET",
                    url: "<?php echo base_url(); ?>" + "api/ingresos/dameUnoExisteRut/"+rut,
                    dataType: 'json',
                    success: function(data){
                        if (data.uspId != undefined){
                            document.getElementById("uspRut").value     = '';
                            alert('Rut ya registrado');
                            }
                       }
                })
            }
                
    });
    /*
    $("#uspEmail").focusout(function(){
    var email = $( "#uspEmail" ).val();
    $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/dameUnoExisteEmail/'"+email+"'",
            dataType: 'json',
            success: function(data){
                if (data.uspId != undefined){
                    document.getElementById("uspEmail").value     = '';
                    alert('Email ya registrado');
                    }
               }
        })
    });
    */
    $("#uspUsuario").focusout(function(){
    var usuario = $( "#uspUsuario" ).val();
    if (usuario != '')  {
        $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>" + "api/ingresos/dameUnoExisteUsuario/"+usuario,
                dataType: 'json',
                success: function(data){
                    if (data.uspId != undefined){
                        document.getElementById("uspUsuario").value     = '';
                        alert('Usuario ya registrado');
                        }
                   }
            })
        }
    });
        
        
</script>

