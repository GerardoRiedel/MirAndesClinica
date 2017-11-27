
<div id="content" style="-webkit-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
-moz-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25; background-color: #db8918">
    <div id="content-header" style="background-color: #e9c899; max-height: 10px !important" >
        <h1 style="background-color: #a15ebe !important;border:none;color:#ffffff; margin-right: 30px;-webkit-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);" class="alert alert-info"><?php echo $title;?></h1>
    </div>
    
    
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12"></div>
                

			
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" style="border-color: #000000;"  >
            
                            
            
                <div class='widget-title'>
                    <br>
                    <div class="col-lg-12" style="margin-top: -10px;">
                    <label>Datos de Ficha</label>
                    </div>
                    <?php $attributes = array('id' => 'form');
                        echo form_open('hd_admision/ingresos/filtrolistarIngreso',$attributes);
                    ?>
                    <br>
                    <div class="col-lg-1">
                        <label>Filtrar</label>
                    </div>
                    <div class='col-lg-3'>
                        <input name="filtro" type="text" placeholder="Digite rut de paciente o N° de ficha" minlength="3" value="<?php IF(!empty($filtro))echo $filtro;?>">
                    </div>
                    
                </div>
                
                    <div class="col-lg-1">
                        <?php echo form_submit('','Buscar','class="btn btn-primary btn-sm btnCetep"');?>
                    </div>
            <!-- FIN DIV FICHA COMPLETA-->
                <div class="col-lg-12" ></div>
                <?php echo form_close();?>
                
    </div> 
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" style="border-color: #000000;"  >
    
                <br>
                <div  class="col-lg-12" style="overflow: auto;">
                    <div class='col-lg-12'><p style='color:red;'><b>Recuerde que en esta vista se encuentra filtrado, solo pacientes que no cuenten con fecha de salida registrada.</b></p>
                        <p style="margin-top:-11px;font-size: 10px">Para ver el detalle de pacientes con alta, favor revisar <b><a href='<?php echo base_url("hd_admision/fichas/listar_paciente"); ?>'>Ficha de Pacientes</a></b></p>
                    </div>
                <table class='table table-bordered table-hover table-striped data-table'>
                        <thead>
                            <tr>
                                <th style="width:110px">Fecha Registro</th>
                                <th style="min-width:100px">Run</th>
                                <th style="display:none">Run</th>
                                <th>N° Ficha</th>
                                <th>Tipo Ingreso</th>
                                <th>Nombres</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Solicitudes</th>
                                <th style=" width: 120px"><table><td style="width: 100px">Signos Vitales</td><td>Licencias Médicas</td></table></th>
                                <?php IF($this->session->userdata('perfil') === '13' || $this->session->userdata('perfil') === '14' || $this->session->userdata('perfil') === '11'){;?>
                                <th>Ingreso Enfermeria</th>
                                <?php };?>
                                <th>Registro de Intervención</th>
                                
                                <th>Registro Ingreso HD</th>
                                <th style="min-width:120px">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php foreach ($datos as $item) : ?>
                            <tr>
                                <td align="center"><?php $date = new DateTime($item->dateIn);echo $date->format('d-m-Y H:i'); ?></td>
                                <td><?php if(!empty($item->rut)) echo formatearRut($item->rut); ?></td>
                                <td style="display:none"><?php if(!empty($item->rut)) echo $item->rut; ?></td>
                                <td align="center"><?php IF($item->tipoIngreso==='2')echo $item->ficha;     ELSEIF($item->tipoIngreso==='3')echo $item->fichaRH; ?></td>
                                <td align="center"><?php IF($item->tipoIngreso==='2')echo 'HOSPITAL DE DÍA';ELSEIF($item->tipoIngreso==='3')echo 'REHABILITACIÓN';?></td>
                                <td><?php echo strtoupper($item->nombres); ?></td>
                                <td><?php echo strtoupper($item->apellidoPaterno); ?></td>
                                <td><?php echo strtoupper($item->apellidoMaterno); ?></td>
                                <td align="center">
                                    <a class="tip-bottom" title="Registro Solicitudes" href="<?php echo base_url("hd_admision/ingresos/cargarSolicitudes/" . $item->id )?>"><i class="fa fa-paper-plane" aria-hidden="true"></i></a>
                                </td>
                                <td align="center">
                                    <a class="tip-bottom" title="Registro Signos Vitales" href="<?php echo base_url("hd_admision/ingresos/cargarSignos/" . $item->id )?>"><i class="fa fa-medkit" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="tip-bottom" title="Solicitud Licencias Médicas" href="<?php echo base_url("hd_admision/ingresos/cargarLicencias/" . $item->paciente )?>"><i class="fa fa-sticky-note" aria-hidden="true"></i></a>
                                </td>
                                <?php IF($this->session->userdata('perfil') === '13' || $this->session->userdata('perfil') === '14' || $this->session->userdata('perfil') === '11'){;?>
                                <td align="center">
                                    <a class="tip-bottom" title="Registro Enfermeria" href="<?php echo base_url("hd_admision/ingresos/cargarIngresoEnfermeria/" . $item->id )?>"><i class="fa fa-stethoscope" aria-hidden="true"></i></a>
                                </td>
                                <?php };?>
                                <td align="center">
                                    <a class="tip-bottom" title="Registro de Intervención" href="<?php echo base_url("hd_admision/ingresos/cargarEvaluacion/" . $item->id )?>"><i class="fa fa-user-md" aria-hidden="true"></i></a>
                                </td>
                                
                                <td align="center">
                                    <a class="tip-bottom" title="Registro de Ingreso T.O" href="<?php echo base_url("hd_admision/ingresos/cargarIngresoTO/" . $item->id )?>"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                </td>
                                <td align="center">
                                    <a class="tip-bottom" title="Imprimir ficha de admisión" href="<?php echo base_url("hd_admision/impresiones/cargarImprimir/" . $item->id )?>"><i class="fa fa-print" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                    <a class="tip-bottom" title="Modificar registro" href="<?php echo base_url("hd_admision/ingresos/modificarRegistro/" . $item->id )?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                    <a class="tip-bottom" onclick="return confirm('¿Confirma que desea eliminar este registro?')" style="color:red" title="Eliminar Registro" href="<?php echo base_url("hd_admision/ingresos/eliminar/" . $item->id )?>"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="tip-bottom" title="Salida paciente" style="color:green" href="<?php echo base_url("hd_admision/salidas/cargarSalida/" . $item->id )?>"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                
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

