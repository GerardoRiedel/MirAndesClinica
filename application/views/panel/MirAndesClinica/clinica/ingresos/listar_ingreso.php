<style>
    .in{
        min-width: 250px; 
    }
    .inDev{
        max-width: 150px !important; 
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
            <div class="col-xs-12"></div>
                

			
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container navCeluSession" >
            
                            
            
                <div class='col-lg-12'>
                    <br>
                    <div class="col-lg-12" >
                        <label>Datos de Ficha</label><hr>
                    </div>
                    <?php $attributes = array('id' => 'form');
                        echo form_open('clinica_enfermeria/ingresos/filtrolistarIngreso',$attributes);
                    ?>
                    <br>
                    <div class="col-lg-1">
                        <label>Filtrar</label>
                    </div>
                    <div class='col-lg-3'>
                        <input name="filtro" class="in" type="text" placeholder="Digite rut de paciente o N° de ficha" minlength="4" required>
                    </div>
                    <div class="col-lg-1">
                        <?php echo form_submit('','Buscar','class="btn btn-primary btn-sm btnCetep"');?>
                    </div>
                    <?php echo form_close();?>
                </div>
                
                    
            
                
                
    </div> 
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" >
    
                
                <div  class="col-lg-12">
                <br>
                <div class='col-lg-12'></div>
                <div class='col-lg-12' style="overflow-x: scroll">
                <table class='table table-bordered table-hover table-striped data-table'>
                        <thead>
                            <tr>
                                <th style="width:100px">Fecha Ingreso</th>
                                <th style="min-width:100px">Run</th>
                                <th>N° Ficha</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Piso</th>
                                <?php IF($this->session->userdata('perfil') !== '5'){ ?>
                                <th  aling="center"><table><tr><td style="min-width:65px">Evolución<br>Diaria</td><!--<td style="min-width:65px">Farmacos<br>Insumos<br>Examenes</td>--></tr></table></th>
                                <?php } ?>
                                
                                <?php IF($this->session->userdata('perfil') === '4' ):;?>
                                    <th>Ingreso Enfermería</th>
                                <?php ELSEIF($this->session->userdata('perfil') === '5'):;?>
                                    <th>Control Médico</th>
                                <?php ENDIF;?>
                                <th>Observaciones</th>
                                <th>Antecedentes</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php foreach ($datos as $item) : ?>
                            <tr>
                                <td align="center"><?php echo $item->dateIn; ?></td>
                                <td><?php if(!empty($item->rut)) echo formatearRut($item->rut); ?></td>
                                <td><?php echo $item->ficha; ?></td>
                                <td><?php echo strtoupper($item->nombres); ?></td>
                                <td><?php echo strtoupper($item->apellidoPaterno).' '.strtoupper($item->apellidoMaterno); ?></td>
                                <td><?php echo $item->piso;?></td>
                                
                                <?php IF($this->session->userdata('perfil') === '4' ){;?>
                                    <td align="center">
                                    <!--
                                    <a class="tip-bottom" title="Nueva Evalución Enfermeria" href="<?php echo base_url("clinica_enfermeria/ingresos/cargarEvolucionEnfermeria/" . $item->id )?>"><i class="fa fa-sun-o" aria-hidden="true"></i></a>
                                    -->
                                        <a class="tip-bottom" title="Nueva Evalución Enfermeria" href="<?php echo base_url("clinica_enfermeria/ingresos/cargarNuevoRegistro/" . $item->id )?>"><i class="fa fa-sun-o" aria-hidden="true"></i></a>
                                   </td>
                                <?php } ELSEIF($this->session->userdata('perfil') !== '5') { ?>
                                   <td align="center">
                                       <a class="tip-bottom" title="Nuevo Registro TENS" href="<?php echo base_url("clinica_enfermeria/ingresos/cargarNuevoRegistro/" . $item->id )?>"><i class="fa fa-sun-o" aria-hidden="true"></i></a>
                                    </td>
                                    <?php } ?>
                                <?php IF($this->session->userdata('perfil') === '4'):;?>
                                        <td align="center">
                                            <a class="tip-bottom" title="Lista de Insumos" href="<?php echo base_url("clinica_enfermeria/medicamentos/cargarInsumos/" . $item->id."_NO" )?>"><i class="fa fa-connectdevelop" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                            <!--
                                            <a class="tip-bottom" title="Medicamento" href="<?php echo base_url("clinica_enfermeria/medicamentos/cargarMedicamentoAsignar/" . $item->id )?>"><i class="fa fa-medkit" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                            -->
                                            <a class="tip-bottom" title="Nuevo Registro ENFERMERIA" href="<?php echo base_url("clinica_enfermeria/ingresos/cargarNuevoIngresoEnfermeria/" . $item->id )?>"><i class="fa fa-user-md" aria-hidden="true"></i></a>
                                        </td>
                                    <?php ELSEIF($this->session->userdata('perfil') === '5'):;?>
                                        <td align="center">
                                            <a class="tip-bottom" title="Nueva Evolución Médica" href="<?php echo base_url("clinica_enfermeria/medicos/cargarNuevoControl/" . $item->pacId )?>"><i class="fa fa-user-md" aria-hidden="true" style="color: green"></i></a>
                                        </td>
                                    <?php ENDIF;?>
                                    <td align="center">
                                        <a class="tip-bottom" title="Comentario" href="<?php echo base_url("clinica_enfermeria/ingresos/cargarComentario/" . $item->id )?>"><i class="fa fa-comments-o" aria-hidden="true"></i></a>
                                    </td>
                                    <td align="center">
                                        <a class="tip-bottom" title="Antecedentes" href="<?php echo base_url("clinica_enfermeria/impresiones/cargarImprimir/" . $item->id )?>"><i class="fa fa-print" aria-hidden="true"></i></a>
                                    </td>
                                
                            </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
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
    
<script src="<?php echo base_url(); ?>../assets/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/hs.tables.js"></script>

<script>
    $("#divFicha").hide(); 
    $("#divFichaApoderado").hide(); 
    $("#divFichaEconomico").hide();
    $("#rut").attr("disabled", false).css("border-color","red");
    $("#rutApo").attr("disabled", false).css("border-color","red");
    $("#rutApoEco").attr("disabled", false).css("border-color","red");
    
</script>
<script>
    $("#form").submit(function () {  
    if($("#banco").val()==0) {  
        alert("Banco Requerido");  
        return false;
    } 
    if($("#tipoCta").val()==0) {  
        alert("Cta Requerido");  
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
                
                //AUTOCOMPLETA CAMPOS DEVOLUCIONES
                document.getElementById("emailDev").value           = data.email;
                document.getElementById("nombresDev").value         = data.nombres;
                document.getElementById("apePatDev").value          = data.apellidoPaterno;
                
               }
        })
        })
        
    
});
</script>    
<script>
    $("#divApo").click(function(){
        
        $("#divFichaApoderado").show();  
    })
    $("#divEco").click(function(){
        $("#divFichaEconomico").show();  
    })
</script>
<script>
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

</script>

