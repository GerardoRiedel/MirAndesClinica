
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=500,width=800');
        mywindow.document.write('<html><head><title>Listado de Ingresos</title>');
        mywindow.document.write('<style>'+
                'table{border-collapse: collapse; border:black 2px solid;font-family: Arial; font-size: 100%;} '+
                '.cabecera{border-collapse: collapse; border:black 2px solid;font-family: Arial; } '+
                'td{border:grey 1px solid; height:25px;} '+
                'body{font-size: 100%;font-family: Arial;} '+
                '.titulo{font-weight: bold;} '+
                'label{font-weight: bold;} '+
                '</style>');
        
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
<div id="content" style="-webkit-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
-moz-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25 ">
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
                    <label>Filtrar Datos de Ficha</label>
                    </div>
                    <?php $attributes = array('id' => 'form');
                        echo form_open('clinica_admin/ingresos/filtrolistarIngreso',$attributes);
                    ?>
                    <br>
                    <div class="col-lg-2">
                        <label>Paciente</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="filtro" style="min-width: 250px" type="text" placeholder="Digite rut de paciente o N° de ficha" minlength="3">
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Registro Desde</label>
                    </div>
                    <div class='col-lg-4'>
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" style="width: 218px" class="form-control" placeholder="Desde, día-mes-año" name="fechaDesde" value="<?php IF(!empty($fechaDesdeP))echo $fechaDesdeP; ?>">
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <label>Hasta</label>
                    </div>
                    <div class='col-lg-4'>
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" style="width: 218px" class="form-control" placeholder="Hasta,  día-mes-año" name="fechaHasta" value="<?php IF(!empty($fechaHastaP))echo $fechaHastaP; ?>">
                        </div>
                    </div>
                    
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Alta Desde</label>
                    </div>
                    <div class='col-lg-4'>
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" style="width: 218px" class="form-control" placeholder="Desde, día-mes-año" name="fechaDesdeAlta" value="<?php IF(!empty($fechaDesdeAlta))echo $fechaDesdeAlta; ?>">
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <label>Hasta</label>
                    </div>
                    <div class='col-lg-4'>
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" style="width: 218px" class="form-control" placeholder="Hasta,  día-mes-año" name="fechaHastaAlta" value="<?php IF(!empty($fechaHastaAlta))echo $fechaHastaAlta; ?>">
                        </div>
                    </div>
                    <div class="col-lg-12" style=" font-size: 10px" align="left">
                    Complete los campos segun el criterio de busqueda requerido
                    </div>
                    
                </div>
        <div class=" col-lg-12"></div><br><br><br><br><br><br>
                <div class="col-lg-10" style=" text-align: center">
                    
                    <?php echo form_submit('','Filtrar','class="btn btn-primary btn-sm btnCetep"');?>
                        <br>
                    
                    <div class='col-lg-4' style=" text-align: center; background-color: #a15ebe; color: #ffffff;letter-spacing: 2px;box-shadow: 10px 10px 20px -10px rgba(0,0,0,0.75); border-radius: 4px; " >
                        <h6>Opciones de Tabla</h6>
                        <span class='icon'>
                            <i class='fa fa-print' onclick="PrintElem('#imprimir')" style="cursor: pointer; color:#1d1c19; font-size:18px" title="Imprimir Tabla"></i>
                            <i class="fa fa-table" id="btnExport" style="cursor: pointer; color:#1d7044;font-size:18px" title="Exportar Tabla a Excel"></i>  
                        </span>
                    </div><br><br><br><br>
                </div>
                
            <!-- FIN DIV FICHA COMPLETA-->
                <div class="col-lg-12" ></div>
                <?php echo form_close();?>
                
    </div> 
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" style="border-color: #000000;"  >
                <div  class="col-lg-12" style="padding-top: 30px;">
                <br>
                <div class='col-lg-12'></div>
                
                
                    <table class='table table-bordered table-hover table-striped data-table'>
                        <thead>
                            <tr>
                                <th>Fecha Registro</th>
                                <th>Run</th>
                                <th>N° Ficha</th>
                                <th>Nombres</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Fecha Salida</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php foreach ($datos as $item) : ?>
                            <tr>
                                <td><?php echo $item->dateIn; ?></td>
                                <td><?php if(!empty($item->rut)) echo formatearRut($item->rut); ?></td>
                                <td><?php echo $item->ficha; ?></td>
                                <td><?php echo strtoupper($item->nombres); ?></td>
                                <td><?php echo strtoupper($item->apellidoPaterno); ?></td>
                                <td><?php echo strtoupper($item->apellidoMaterno); ?></td>
                                <td><?php IF($item->fechaSalidaReal === '0000-00-00' || empty($item->fechaSalidaReal))echo ' '; ELSE echo $item->fechaSalidaReal; ?></td>
                                <td align="center">
                                    <a class="tip-bottom" title="Imprimir registro" href="<?php echo base_url("clinica_admin/impresiones/cargarImprimir/" . $item->id )?>"><i class="fa fa-print" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                    <a class="tip-bottom" title="Modificar registro" href="<?php echo base_url("clinica_admin/ingresos/modificarRegistro/" . $item->id )?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                    <a class="tip-bottom" title="Salida paciente" href="<?php echo base_url("clinica_admin/salidas/cargarSalida/" . $item->id )?>"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
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
<div id="imprimir" style=" display:none">
    <table class='table table-bordered table-hover table-striped'>
        <thead>
            <tr>
                <th>Fecha Registro</th>
                <th>Run</th>
                <th>N de Ficha</th>
                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Fecha Salida</th>
            </tr>
        </thead>
        <tbody>
                <?php foreach ($datos as $item) : ?>
            <tr>
                <td><?php echo $item->dateIn; ?></td>
                <td><?php if(!empty($item->rut)) echo formatearRut($item->rut); ?></td>
                <td><?php echo $item->ficha; ?></td>
                <td><?php echo strtoupper($item->nombres); ?></td>
                <td><?php echo strtoupper($item->apellidoPaterno); ?></td>
                <td><?php echo strtoupper($item->apellidoMaterno); ?></td>
                <td><?php IF($item->fechaSalidaReal === '0000-00-00' || empty($item->fechaSalidaReal))echo ' '; ELSE echo $item->fechaSalidaReal; ?></td>
                                
            </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
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
<div id="exportar" style=" display:none">
    <table class='table table-bordered table-hover table-striped'>
        <thead>
            <tr>
                <th>Fecha Registro</th>
                <th>Run</th>
                <th>N de Ficha</th>
                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Direccion</th>
                <th>Comuna</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Fecha de Nacimiento</th>
                <th>Ocupacion</th>
                <th>Fecha Salida</th>
            </tr>
        </thead>
        <tbody>
                <?php foreach ($datos as $item) : ?>
            <tr>
                <td><?php echo $item->dateIn; ?></td>
                <td><?php if(!empty($item->rut)) echo formatearRut($item->rut); ?></td>
                <td><?php echo $item->ficha; ?></td>
                <td><?php echo strtoupper($item->nombres); ?></td>
                <td><?php echo strtoupper($item->apellidoPaterno); ?></td>
                <td><?php echo strtoupper($item->apellidoMaterno); ?></td>
                <td><?php echo strtoupper($item->direccion); ?></td>
                <td><?php echo strtoupper($item->comNombre); ?></td>
                <td><?php echo strtoupper($item->telefono); ?></td>
                <td><?php echo strtoupper($item->celular); ?></td>
                <td><?php echo strtoupper($item->fechaNacimiento); ?></td>
                <td><?php echo strtoupper($item->ocupacion); ?></td>
                <td><?php IF($item->fechaSalidaReal === '0000-00-00' || empty($item->fechaSalidaReal))echo ' '; ELSE echo $item->fechaSalidaReal; ?></td>
                                
            </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    $("#btnExport").click(function(e) {

        //Creamos un Elemento Temporal en forma de enlace
        var tmpElemento = document.createElement('a');
        // obtenemos la informaciÃ³n desde el div que lo contiene en el html
        // Obtenemos la informaciÃ³n de la tabla
        var data_type = 'data:application/vnd.ms-excel';
        var tabla_div = document.getElementById('exportar');
        var tabla_html = tabla_div.outerHTML.replace(/ /g, '%20');
        tmpElemento.href = data_type + ', ' + tabla_html;
        //Asignamos el nombre a nuestro EXCEL
        tmpElemento.download = 'Registros de Ingresos.xls';
        // Simulamos el click al elemento creado para descargarlo
        tmpElemento.click();

        //var htmltable= document.getElementById('imprimir');
        //var html = htmltable.outerHTML;
        //window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
    });

</script>

