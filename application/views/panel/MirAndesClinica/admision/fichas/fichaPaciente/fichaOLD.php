

<style>
    
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
    

    
</style>
<div id="cargando" style="width: 100%; height: 500px; position: absolute; padding-top:20px; text-align:center"><span class="fontloadingcont">Loading content. Please wait...</span></div>
<div id="granDiv" style="visibility:hidden;">
    
    
</div>
<div id="content" style="-webkit-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
-moz-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25 ">
    <div id="content-header" style="background-color: #e9c899; max-height: 10px !important" >
        <h1 style="background-color: #a15ebe !important;border:none;color:#ffffff; margin-right: 30px;-webkit-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);" class="alert alert-info"><?php echo $title;?></h1>
    </div>
    
    
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12"></div>
                

			
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container"   >
            
                <div class='widget-title'>
                    <br>
                    <div class="col-lg-12" style="margin-top: -10px;">
                    <label>Datos de Paciente</label>
                    </div>
                    <?php $attributes = array('id' => 'form');
                        echo form_open($vista.'/modificar/filtrar_paciente',$attributes);
                    ?>
                    <br>
                    <div class="col-lg-1">
                        <label>Filtrar</label>
                    </div>
                    <div class='col-lg-3'>
                        <input name="filtro" type="text" placeholder="Digite rut de paciente o N° de ficha" minlength="4">
                    </div>
                    
                </div>
                    <div class="col-lg-1">
                        <?php echo form_submit('','Buscar','class="btn btn-primary btn-sm btnCetep"');?>
                    </div>
        
        <br><br>
                    <div class=" col-lg-12"></div>
                    <div class="col-lg-1">
                        <label>Opciones</label>
                    </div>
                    <div class='col-lg-2'>
                            
                            <i class='fa fa-print' onclick="PrintElem('#imprimir')" style="cursor: pointer; color:#1d1c19; font-size:18px" title="Imprimir Tabla"></i>
                            &nbsp;&nbsp;
                            <i class="fa fa-table" id="btnExport" style="cursor: pointer; color:#1d7044;font-size:18px" title="Exportar Tabla a Excel"></i>  
                        
                    </div> 
            <!-- FIN DIV FICHA COMPLETA-->
                <div class="col-lg-12" ></div>
                <?php echo form_close();?>
                
                
                
                
    </div> 
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container"   >
    
                
                <div  class="col-lg-12">
                   
                
                <div class='col-lg-12'></div>
                <table class='table table-bordered table-hover table-striped data-table'>
                        <thead>
                            <tr>
                                <th>N° Ficha</th>
                                <th style=" width: 150px">Run</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php foreach ($datos as $item) : ?>
                            <tr>
                                <td align="center"><?php echo $item->ficha; ?></td>
                                <!--
                                <td style=" max-width: 1px"><?php echo $item->id; ?></td>
                                <!--
                                <td><?php if(!empty($item->rut)) echo formatearRut($item->rut); ?></td>
                                -->
                                <td align="center">
                                    <a class="tip-bottom" onclick="cargaModal('<?php echo $item->rut;?>')" href="#" title="Ficha de Paciente" data-toggle="modal" data-html="true" data-target="#myModal" 
                                       data-content="
                                            
                                        ">
                                        <?php echo formatearRut($item->rut);?>
                                    </a>
                                </td>
                                
                                <td align="center"><?php echo strtoupper($item->nombres); ?></td>
                                <td align="center"><?php echo strtoupper($item->apellidoPaterno).' '.strtoupper($item->apellidoMaterno); ?></td>
                            </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                <h6><b>Para ver el detalle del paciente, por favor seleccione el rut</b></h6>
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

<!-- modal form -->
<div id="myModal" class="modal fade" aria-labelledby="myModalLabel" aria-hidden="true" tabindex="-1" role="dialog" style="width: 100%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"  style="background: #ddd; color: #333">
                <div class="row">
                    <div class="col-lg-12">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <div id="contentTitulo" style="margin: 0 auto; text-align: center;"></div>
                    </div>
                </div>
            </div>
            <div class="modal-body" style="background:#FBFBFB">
                <div class="row">
                    <div class="col-md-12 col-lg-12" style="">
                        <div class="row">
                            <div class="col-md-6">
                                <label style="font-size:18px">Datos Personales</label>
                                <div id="contentDatosPersonales" style="width:100%; margin-bottom:20px;"></div>
                        
                            </div>
                            <div class="col-md-6">
                                <label style="font-size:18px">Datos Apoderado</label>
                                <div id="contentDatosApoderado" style="width:100%; margin-bottom:20px;"></div>
                        
                            </div>
                            <div align="center">
                                <!--
                                <input type="hidden" id="inputNvaLicencia">
                                
                                <i class="fa fa-print" aria-hidden="true" style="cursor: pointer" id="printDoc" title="Imprimir Documentos" ></i>
                                   -->                 
                                </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <label style="font-size:18px">Historial Clínico</label>
                            </div>
                        </div>
<!-- HISTORIAL CLINICA-->
                        <div class="row">
                            <div class="col-md-12 col-lg-12" id="Result">
                                <div class='table-responsive  col-lg-6'>
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12">
                                                    Ingresos
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div id="contentHistorial" style="width:100%;"></div>
                                        </div>
                                    </div>
                                </div>
<!-- LICENCIAS-->                                
                                <div class='table-responsive  col-lg-6'>
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-10 col-lg-10">
                                                    Licencias
                                                </div>
                                                <div class="col-md-2 col-lg-2">
                                                    <input type="hidden" id="inputNvaLicencia">
                                                    <i class="fa fa-plus-circle" aria-hidden="true" style=" cursor: pointer" id="nvaLicencia" title="Agregar Nueva Licencia" ></i>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div id="contentHistorialLicencias" style="width:100%;"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        
<!-- OBSERVACIONES-->             
                        <div class="row">
                            <div class="col-md-12 col-lg-12" id="Result">
                                <div class='table-responsive  col-lg-12'>
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12">
                                                    Observaciones de Enfermería
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div id="contentObservaciones" style="width:100%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                        
<!-- INGRESOS TEC-->                        
                        <div class="row">
                            <div class="col-md-12">
                                <label style="font-size:18px">Registros T.E.C</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-lg-12" id="Result">
                                <div class='table-responsive  col-lg-6'>
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-11 col-lg-11">
                                                    Ingreso Tratamiento T.E.C
                                                </div>
                                                <div class="col-md-1 col-lg-1">
                                                    <a id="accion" style=" cursor: pointer">
                                                        <i class="fa fa-eye" aria-hidden="true" ></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                       
                     
                     
                                        <div class="panel-body">
                                            <div id="contentSesiones" style="width:100%;"></div>
                                            <!--
                                            <a id="accion" style="width:300px" data-selector="true" data-html="true" data-placement="bottom" data-trigger="click" data-toggle="popover" data-content="<div id='log'></div>"
                                                >
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            -->
                                        </div>
                                        
                                        
                                    </div>
                                </div>
<!-- SESIONES TEC-->                            
                                <div class='table-responsive  col-lg-4' id="ocultar">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12">
                                                    Detalle Sesiones Ultimo Ingreso 
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                     
                                        <div class="panel-body">
                                            <div id="contentDetalleSesiones" style="width:100%;"></div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12 col-lg-12" id="Result">
                                
                            </div>
                        </div>
                    </div>
<!--
                    <div class="col-md-6 col-lg-4 text-center">
                        <div class="panel panel-default" style="margin: 0 auto;">

                            <div id="graficoUsoReservaPorCanal"  style="overflow-x: scroll"></div>

                        </div>
                    </div>
-->

                </div>
            </div><!-- modal body -->
        </div>
    </div>
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
       
        
        $dv = $dv == 11 ? 0 : ($dv == 10 ? "K" : $dv);
        $rut=  $rut . $dv;
return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
}
?>
<script src="<?php echo base_url(); ?>../assets/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/hs.tables.js"></script>

<script>
    $("#nvaLicencia").click(function(){
        var rut = $( "#inputNvaLicencia" ).val();
        window.location.href = "http://www.cetep.cl/mirandes/index.php/<?php echo $vista;?>/ingresos/cargarLicencia/"+rut;
    })
</script>
<script>
    $("#ocultar").hide();
    $("#accion").click(function(){
        $("#accion").hide();
        $("#ocultar").show();  
    })
    
</script>
<script>
    
    function sumarDias(fecha, dias){
        
        fecha.setDate(fecha.getDate() + dias);
        return fecha;
    }

    function formatearRut(rut){
        
        if (!rut || !rut.length || typeof rut !== 'string') {
		return -1;
	}
	// serie numerica
	var secuencia = [2,3,4,5,6,7,2,3];
	var sum = 0;
	//
	for (var i=rut.length - 1; i >=0; i--) {
		var d = rut.charAt(i)
		sum += new Number(d)*secuencia[rut.length - (i + 1)];
	};
	// sum mod 11
        
	var rest = 11 - (sum % 11);
	// si es 11, retorna 0, sino si es 10 retorna K,
	// en caso contrario retorna el numero
	rest === 11 ? 0 : rest === 10 ? "K" : rest;
        if(rest===10)rest='K';else if(rest===11)rest=0;
        //console.log("Rut :"+rest);
        rut = rut+rest;
    
        //console.log("Rut :"+rut);
        var sRut1 = rut;   	//contador de para saber cuando insertar el . o la -
        var nPos = 0; //Guarda el rut invertido con los puntos y el guión agregado
        var sInvertido = ""; //Guarda el resultado final del rut como debe ser
        var sRut = "";
        for(var i = sRut1.length - 1; i >= 0; i-- )
        {
            sInvertido += sRut1.charAt(i);
            if (i == sRut1.length - 1 )
                sInvertido += "-";
            else if (nPos == 3)
            {
                sInvertido += ".";
                nPos = 0;
            }
            nPos++;
        }
        for(var j = sInvertido.length - 1; j >= 0; j-- )
        {
            if (sInvertido.charAt(sInvertido.length - 1) != ".")
                sRut += sInvertido.charAt(j);
            else if (j != sInvertido.length - 1 )
                sRut += sInvertido.charAt(j);
        }
        //Pasamos al campo el valor formateado
        
        return sRut.toUpperCase();
        //return rut
    }
   
</script>    


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
                <?php foreach ($ingresos as $item) : ?>
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
<div id="exportar" style=" display:true">
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



<script>
    
    function cargaModal(rut){
        $("#ocultar").hide();
        $("#accion").show();
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
            //titulo del modal
            if (typeof data!='undefined'){

                //var titulo = '<label style="text-align: left; font-size:20px;">Ficha del Usuario: <span style="color:#006699;">' + data.nombres + ' ' + data.apellidoPaterno + ' ' + data.apellidoMaterno + '</span></label>';
                var titulo = '<label style="text-align: left; font-size:20px;">Ficha N°: <span style="color:#006699;">' + data.ficha + '</span></label>';
                $('#contentTitulo').html(titulo);
                var rut = data.rut;
                //if(rut.length === 7)data.rut = '0'+rut;
            // datos personales
                var datosPersonales = '<ul><li><strong>Rut: </strong>' +formatearRut(data.rut)+'</li>';
                datosPersonales += '<li><strong> Nombre Completo: </strong>' + data.nombres.toUpperCase() + ' ' + data.apellidoPaterno.toUpperCase() + ' ' + data.apellidoMaterno.toUpperCase() + '</li>';
                if(data.fechaNacimiento=="0000-00-00")data.fechaNacimiento="Sin información";
                else {
                    var fecha = new Date(data.fechaNacimiento);
                    console.log(data.fechaNacimiento);
                    console.log(fecha);
                    sumarDias(fecha, +1);
                    var options = { year: 'numeric', month: 'long', day: 'numeric' };
                    data.fechaNacimiento=fecha.toLocaleDateString("es-ES", options);
                }
                datosPersonales += '<li><strong> Fecha de Nacimiento: </strong>' + data.fechaNacimiento.toUpperCase()+'</li>';
                //datosPersonales += '<li><strong> Edad: </strong>' + edadInvertida(data.fechaNacimiento)+'</li>';
                if(data.nacionalidad==1)data.nacionalidad="CHILENA";else data.nacionalidad="EXTRANJERA";
                datosPersonales+= '<li><strong> Nacionalidad: </strong>'+ data.nacionalidad+'</li>';
                //if(data.sexo=='MASCULINO')data.sexo="Masculino";if(data.sexo=='FEMENINO')data.sexo="Femenino";
                if(data.sexo==null)data.sexo="Sin información";
                datosPersonales+= '<li><strong> Sexo: </strong>'+ data.sexo+'</li>';
                datosPersonales+='</br>';
                
                if(data.direccion==null)data.direccion="Sin información";
                else data.direccion=data.direccion;
                datosPersonales+= '<li><strong> Dirección: </strong>'+ data.direccion.toUpperCase()+'</li>';
                datosPersonales+= '<li><strong> Comuna: </strong>'+ data.comNombre+'</li>';
                if(data.telefono==null)data.telefono="Sin información";
                datosPersonales+= '<li><strong> Teléfono: </strong>'+ data.telefono+'</li>';
                datosPersonales+= '<li><strong> Celular: </strong>'+ data.celular+'</li>';
                if(data.email==null)data.email="Sin información";
                datosPersonales+= '<li><strong> Email: </strong>'+ data.email.toUpperCase()+'</li>';
                if(data.ocupacion==null)data.ocupacion="Sin información";
                datosPersonales+= '<li><strong> Ocupación: </strong>'+ data.ocupacion.toUpperCase()+'</li>';
                
                datosPersonales+='</br>';
                $('#contentDatosPersonales').html(datosPersonales);

                document.getElementById("inputNvaLicencia").value = data.rut;
             //bloque de historial de licencias
                var tabla = '<table class="table table-bordered table-striped table-hover data-table" style="font-size: 10px; width:100%;" > <thead> <tr> <th>N° Licencia</th><th>Días</th><th>Fecha de Inicio</th><th>Fecha de Termino</th> </tr> </thead>';
                $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>" + "api/ingresos/licencias/"+data.paciente,
                dataType: 'json',

                success: function(datos){
                    var keyVar;
                    for(keyVar in datos) {
                        if(datos[keyVar].licRut!=null) {
                            tabla += '<tr class= "gradeX"><td  align="center">' + datos[keyVar].licNumero + '</td><td  align="center">' + datos[keyVar].licDias + '</td><td  align="center">'+datos[keyVar].licDesde+'</td><td  align="center">'+datos[keyVar].licHasta+'</td></tr>';
                        }
                    }
                    tabla += '</table>';
                    $('#contentHistorialLicencias').html(tabla);
                }
                });
                

            //bloque de historial de ingresos(registros)

                var table = '<table class="table table-bordered table-striped table-hover data-table" style="font-size: 10px; width:100%;" > <thead> <tr> <th>Id</th><th>Fecha de Ingreso</th><th>Fecha de Salida</th><th>Imprimir</th><th>Ver Evolucion</th> </tr> </thead>';

                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url(); ?>" + "api/ingresos/registros/"+data.paciente,
                    dataType: 'json',

                    success: function(datos){
                    var keyVar;
                    for(keyVar in datos) {
                        
                        if(datos[keyVar].id!=null) {
                            table += '<tr class= "gradeX"><td  align="center">' + datos[keyVar].id + '</td><td  align="center">'+datos[keyVar].fechaIngreso+'</td><td  align="center">'+datos[keyVar].fechaSalidaReal+'</td><td  align="center"><a href="http://www.cetep.cl/mirandes/index.php/<?php echo $vista;?>/impresiones/cargarImprimir/'+datos[keyVar].id+'"><i class="fa fa-print" aria-hidden="true"></i></a></td><td  align="center"><a href="http://www.cetep.cl/mirandes/index.php/<?php echo $vista;?>/fichas/listarEvoluciones/'+datos[keyVar].id+'"><i class="fa fa-eye" aria-hidden="true"></i></a></td></tr>';
                        }
                    }
                    
                    table += '</table>';
                    $('#contentHistorial').html(table);
                    
                    
                    
                   
                    //bloque de apoderado

                        $.ajax({
                        type: "GET",
                        url: "<?php echo base_url(); ?>" + "api/ingresos/apoderado/"+datos[keyVar].id,
                        dataType: 'json',

                        success: function(data){
                                
                                //var apoRut = data.apoRut;
                                //if(apoRut.length >= 7)data.apoRut = formatearRut(data.apoRut)
                                var datosPersonales = '<ul><li><strong>Rut: </strong>' +formatearRut(data.apoRut)+'</li>';
                                datosPersonales += '<li><strong> Nombre Completo: </strong>' + data.apoNombre.toUpperCase() + ' ' + data.apoApePat.toUpperCase() + ' ' + data.apoApeMat.toUpperCase() + '</li>';
                                datosPersonales+='</br>';
                                if(data.apoDireccion==null)data.apoDireccion="Sin información";
                                else data.apoDireccion=data.apoDireccion;
                                datosPersonales+= '<li><strong> Dirección: </strong>'+ data.apoDireccion.toUpperCase()+'</li>';
                                datosPersonales+= '<li><strong> Comuna: </strong>'+ data.comuna+'</li>';
                                if(data.apoTelefono==null)data.apoTelefono="Sin información";
                                datosPersonales+= '<li><strong> Teléfono: </strong>'+ data.apoTelefono+'</li>';
                                datosPersonales+= '<li><strong> Celular: </strong>'+ data.apoCelular+'</li>';
                                if(data.apoEmail==null)data.apoEmail="Sin información";
                                datosPersonales+= '<li><strong> Email: </strong>'+ data.apoEmail.toUpperCase()+'</li>';
                                if(data.apoParentesco == 1)data.apoParentesco = "PADRE";else if(data.apoParentesco == 2)data.apoParentesco = "MADRE";else if(data.apoParentesco == 3)data.apoParentesco = "HIJO/A";else if(data.apoParentesco == 4)data.apoParentesco = "CONYUGE";else if(data.apoParentesco == 5)data.apoParentesco = "HERMANO/A";else if(data.apoParentesco == 6)data.apoParentesco = "TÍO/A";else if(data.apoParentesco == 7)data.apoParentesco = "PRIMO/A";else data.apoParentesco = "OTRO";
                                datosPersonales+= '<li><strong> Parentesco: </strong>'+ data.apoParentesco+'</li>';

                                datosPersonales+='</br>';
                                $('#contentDatosApoderado').html(datosPersonales);
                        }
                        });
                    }
                });
                var tableTEC = '<table class="table table-bordered table-striped table-hover data-table" style="font-size: 10px; width:100%;" > <thead> <tr> <th>Registro</th><th>Fecha Registro</th><th>Sesiones</th><th>Restantes</th></tr> </thead>';
$('#contentSesiones').html('');
$('#contentDetalleSesiones').html('');
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url(); ?>" + "api/tec/dameTec/"+data.paciente,
                    dataType: 'json',

                    success: function(datos){
                        
                            var keyVar;
                            for(keyVar in datos) {
                                if(datos[keyVar].tecId!=null) {
                                    if(datos[keyVar].tecSesCalculo === null){datos[keyVar].tecSesCalculo = datos[keyVar].tecSessiones;}
                                    tableTEC += '<tr class= "gradeX"><td  align="center">' + datos[keyVar].tecId + '</td><td  align="center">'+datos[keyVar].tecFechaRegistro+'</td><td  align="center">'+datos[keyVar].tecSessiones+'</td><td  align="center">'+datos[keyVar].tecSesCalculo+'</td></tr>';
                                }
                            }
                            tableTEC += '</table>';

                            $('#contentSesiones').html(tableTEC);
                            
                                    var tableSES = '<table class="table table-bordered table-striped table-hover data-table" style="font-size: 10px; width:100%;" > <thead> <tr> <th>Fecha Sesion</th></tr> </thead>';
                                    $.ajax({
                                            type: "GET",
                                            url: "<?php echo base_url(); ?>" + "api/tec/dameTodoContenido/"+datos[keyVar].tecId,
                                            dataType: 'json',
                                            success: function(datos){

                                                var keyVar='';
                                                for(keyVar in datos) {
                                                    if(datos[keyVar].tecSesId!=null) {
                                                        tableSES += '<tr class= "gradeX"><td  align="center">' + datos[keyVar].tecSesFechaRegistro + '</td></tr>';
                                                    }
                                                }
                                                tableSES += '</table>';
                                                $('#contentDetalleSesiones').html(tableSES);
                                            }
                                        });
                    }
                });
                
                
                var tableObser = '<table class="table table-bordered table-striped table-hover data-table" style="font-size: 10px; width:100%;" > <thead> <tr> <th>Registro Id</th><th>Usuario</th><th>Fecha Registro</th><th>Comentarios</th></tr> </thead>';
                $('#contentObservaciones').html('');
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url(); ?>" + "api/ingresos/dameObservaciones/"+data.paciente,
                    dataType: 'json',

                    success: function(datos){
                            var keyVar;
                            for(keyVar in datos) {
                                if(datos[keyVar].comId!=null) {
                                    var nombre = datos[keyVar].uspNombre +' '+ datos[keyVar].uspApellidoP +' '+ datos[keyVar].uspApellidoM;
                                    tableObser += '<tr class= "gradeX"><td align="center">' + datos[keyVar].comRegistro + '</td><td  align="center">'+nombre+'</td><td  align="center">'+datos[keyVar].comFechaRegistro+'</td><td  align="center">'+datos[keyVar].comComentario+'</td></tr>';
                                }
                            }
                            tableObser += '</table>';
                            $('#contentObservaciones').html(tableObser);
                    }
                });
                
               
                    
    
                
                
                
           

            }else{
                var titulo = '<label style="text-align: left; font-size:20px;">Informe del Usuario: <span style="color:#006699;">RUN de usuario no válido</span></label>';
                $('#contentTitulo').html(titulo);
                var datosPersonales ='<label>No hay Información de este usuario.</label>';
                $('#contentDatosPersonales').html(datosPersonales);
                var Info='<label>No disponible</label>';
                $('#contentHistorial').html(Info);
                var Mensaje=" ";
                $('#graficoUsoReservaPorCanal').html(Mensaje);
            }
            
            
            
            
            }
        });
        
        
    }
    

</script>



<script>
function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=680,width=900');
        mywindow.document.write('<html><head><title></title>');
        mywindow.document.write('<style>@page {size: Letter;margin: 25px} '+
                '.di{border-width:1px;border-radius: 2px;border: 1px solid black;}'+
                'table{border-collapse: collapse; border:black 1px solid; } '+
                'td{border:grey 1px solid; height:25px;} '+
                'body{font-size: 80%;font-family: Arial;} '+
                'blockquote{margin-top:-15px} '+
                '.titulo{font-weight: bold;} '+
                'label{font-weight: bold; }'+
                '</style>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
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

   