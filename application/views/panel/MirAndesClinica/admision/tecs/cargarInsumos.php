<?php //error_reporting(E_ALL ^ E_NOTICE); ?>

<style>
    .titulo{
        color: #a15ebe;
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
           
                            
            <div class='widget-content'>
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
                    
                    
                
                
                <!-- DATOS DE PERSONALES--> 
                
               
                    <!--
                <div class="col-lg-12" align="center"><h2 class="titulo">LOG DE COMENTARIOS</h2></div>
                <div class="col-lg-12"><br></div>
                    -->
                    
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
                
                
                    <div class="col-lg-12" style="margin-left:30px">               
                    <button onclick="goBack(<?php echo $datos->tecId;?>)" class="btn btn-default btn-sm btnVolver">Volver</button><script>function goBack(){window.history.go(-1);}</script>
                
                </div>
                
                <div class="col-lg-12"><br></div>
                    
                
                
                <?php $attributes = array('id' => 'form2');
                    echo form_open('clinica_admision/tecs/guardarInsumos',$attributes);
                ?>
                <div class="col-lg-12">
                    <?php //die(var_dump($datos));?>
                <input type="hidden" value="<?php echo $datos->tecId;?>" name="tecId">
                <input type="hidden" value="<?php echo $sesion;?>" name="sesId">
                <!--
                <input type="hidden" value="<?php echo $datos->rut;?>" name="rut">
                -->
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-1">
                        <label>Fármaco</label>
                    </div>
                    <div class="col-lg-3">
                        <select name="farmaco" id="farmaco" style=" width:250px">
                            <option value="0">Seleccione...</option>
                            <?php FOREACH($farmacos as $farm):?>
                            <option value="<?php echo $farm->idfarmaco.'_'.$farm->farmValor;?>"><?php echo strtoupper($farm->descripcion);?></option>
                            <?php ENDFOREACH;?>
                        </select>
                        
                    </div>
                    <div class="col-lg-1">
                        <label>Cantidad</label>
                    </div>
                    <div class='col-lg-7'>
                        <input type="number" name="cantidadFarmaco" maxlength="2" style="width: 140px;border-radius: 4px;background-image: none;border: 1px solid #CCCCCC;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;height: 28px;">
                    </div>
                    
                    <div class="col-lg-1">
                        <label>Insumos</label>
                    </div>
                    <div class="col-lg-3">
                        <select name="insumo" id="insumo" style=" width:250px">
                            <option value="0">Seleccione...</option>
                            <?php FOREACH($insumos as $ins):?>
                            <option value="<?php echo $ins->insId.'_'.$ins->insValor;?>"><?php echo strtoupper($ins->insNombre);?></option>
                            <?php ENDFOREACH;?>
                        </select>
                    </div>
                    
                    <div class="col-lg-1">
                        <label>Cantidad</label>
                    </div>
                    <div class='col-lg-7'>
                        <input type="number" name="cantidadInsumo" maxlength="2" style="width: 140px;border-radius: 4px;background-image: none;border: 1px solid #CCCCCC;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;height: 28px;">
                    </div>
                    
                    <!--
                     <div class="col-lg-1">
                        <label>Examen</label>
                    </div>
                    <div class="col-lg-3">
                        <select name="examen" id="examen" style=" width:250px">
                            <option value="0">Seleccione...</option>
                            <?php FOREACH($examenes as $exa):?>
                            <option value="<?php echo $exa->exaId.'_'.$exa->exaValor;?>"><?php echo strtoupper($exa->exaNombre);?></option>
                            <?php ENDFOREACH;?>
                        </select>
                    </div>
                    
                    <div class="col-lg-1">
                        <label>Cantidad</label>
                    </div>
                    <div class='col-lg-7'>
                        <input type="number" name="cantidadExamen" maxlength="2" style="width: 140px;border-radius: 4px;background-image: none;border: 1px solid #CCCCCC;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;height: 28px;">
                    </div>
                    
                    <div class="col-lg-12"><br><br></div>
                    
                    
                    <div class="col-lg-2">
                        <label style=" margin: 0px">Agregar Otro</label><br><span style="font-size:10px;">Crear Nuevo Insumo/Examen</span>
                    </div>
                    <div class='col-lg-10'>
                        <input type="text" name="otroNombre" placeholder="Ingrese Nombre">
                        <select name="otroTipo">
                            <option value="0">Seleccione tipo...</option>
                            <option value="3">Examen</option>
                            <option value="1">Fármaco</option>
                            <option value="2">Insumos</option>
                        </select>
                        <input type="number" name="otroCantidad" maxlength="2" placeholder="  Cantidad" style="width: 140px;border-radius: 4px;background-image: none;border: 1px solid #CCCCCC;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;height: 28px;">
                        <!--<input type="hidden" id="otroCheck" value="<?php echo $existe;?>">
                        
                        <span class="iconOtro">
                            <img src="<?php echo base_url();?>../assets/img/icons/signo.png"style="width: 23px;margin-left: 0px;" /> 
                        </span>
-->
                    
                    </div>
                    
                    
                    
                </div>
                <div class="col-lg-12"><br></div>
                <div class="col-lg-12" align="center">
                    <?php echo form_submit('','Cargar','class="btn btn-primary btn-sm btnCetep"');?>
                </div>
                    
</div><!-- FIN DIV FICHA COMPLETA-->
                
                <?php echo form_close();?>
                
                    <div class="col-lg-12">
                        
                    <table class='table table-bordered table-hover table-striped data-table'>
                        <thead>
                            <tr>
                                <td align="center"><b>Fecha Asignación</b> </td>
                                <td align="center"><b>Usuario</b></td>
                                <td align="center"><b>Nombre</b></td>
                                <td align="center"><b>Cantidad</b></td>
                                <td align="center"><b>Valor</b></td>
                                <td align="center"><b>Total</b></td>
                                <td align="center"><b>Opciones</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php $total = 0;?>
                            <?php foreach ($insumosAsignados as $item) : ?>
                            <tr>
                                    <td align="center"><?php echo $item->inaFechaRegistro; ?></td>
                                    <td align="center"><?php echo $item->uspNombre; ?></td>
                                    <?php IF($item->inaTipo==='2'){?>
                                    <td align="center"><?php echo strtoupper($item->descripcion); ?></td>
                                    <?php }ELSEIF($item->inaTipo==='1'){?>
                                    <td align="center"><?php echo strtoupper($item->insNombre); ?></td>
                                    <?php }ELSEIF($item->inaTipo==='3'){?>
                                    <td align="center"><?php echo strtoupper($item->exaNombre); ?></td>
                                    <?php };?>
                                    <td align="center"><?php echo $item->inaCantidad; ?></td>
                                    <td align="center"><?php IF($item->inaValor !=='0')echo '$ '.$item->inaValor; ?></td>
                                    <td align="center"><?php IF($item->inaValor !=='0')echo '$ '.$item->inaValor*$item->inaCantidad; ?></td>
                                    <?php $total += ($item->inaValor*$item->inaCantidad);?>
                                    <td align="center">
                                        <a class="tip-bottom" title="Eliminar Registro" style="color:red"  href="<?php echo base_url("clinica_admision/tecs/eliminarInsumo/".$item->inaTec.'_'.$item->inaSes.'_'.$item->inaId )?>">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td style="border:none"></td>
                                <td style="border:none"></td>
                                <td style="border:none"></td>
                                <td style="border:none"></td>
                                <td style="border:none" align=" center"><b>TOTAL</b></td>
                                <td style="border:none" align=" center">
                                    <b><?php echo '$ '.$total;?></b>
                                </td>
                                <td style="border:none">
                                    <i class='fa fa-print' onclick="PrintElem('#imprimir')" style="cursor: pointer; color:#1d1c19; font-size:18px" title="Imprimir Tabla"></i>
                                    &nbsp;&nbsp;
                                    <i class="fa fa-table" id="btnExport" style="cursor: pointer; color:#1d7044;font-size:18px" title="Exportar Tabla a Excel"></i>  
                                </td>
                            </tr>        
                        </tbody>
                    </table>
                        
                    </div>
              
        </div><!-- div class='widget-content'-->    
                    
                
                
            </div><!-- div class="col-xs-12" -->
        </div><!-- row -->
   </div>
</div><!-- content -->
</div>
<script src="<?php echo base_url(); ?>../assets/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/hs.tables.js"></script>

<div class="col-lg-12" id="imprimir" align="center" style="display:none">
    <style>
    table {
        border-collapse:separate;
        border:solid black 1px;
        border-radius:6px;
        -moz-border-radius:6px;
    }
    td{
        border-left:solid black 1px;
        border-top:solid black 1px;
    }
    td:first-child, th:first-child {
        border-left: none;
    }
    </style>
    <table style="width: 700px; border:none">
        <tr>
            <td style="border:none"><img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo"></td>
            <td style="border:none"align="left"><b>COBRO DE MEDICAMENTO EN STOCK</b></td>
        </tr>
    </table>
    <br><br>
    <table style="width: 700px; border:none">
        <tr>
            <td style="border:none"><b>PACIENTE:</b></td>
            <td style="border:none" align="left"><?php echo ' '.strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno).' '; ?>&nbsp;</td>
            <td style="border:none"><b>RUT:</b></td>
            <td style="border:none" align="left"><?php echo ' '.formatearRut($datos->rut);?></td>
        </tr>
        <tr>
            <td style="border:none"><b>FICHA:</b></td>
            <td style="border:none" align="left"><?php echo ' '.$datos->ficha;?></td>
            <td style="border:none"><b>FECHA INGRESO:</b></td>
            <td style="border:none" align="left"><?php $date = new DateTime($datos->fechaIngreso); echo ' '.date_format($date, 'd-m-Y');?></td>
        </tr>
    </table>
    <br>
    <table class='table table-bordered table-hover table-striped' style="width: 700px">
        <thead>
            <tr>
                <td style="border-top:none" align="center"><b>INSUMO / MEDICAMENTO</b></td>
                <td style="border-top:none" align="center"><b>FECHA</b></td>
                <td style="border-top:none" align="center"><b>VALOR</b></td>
                <td style="border-top:none" align="center"><b>CANTIDAD</b></td>
                <td style="border-top:none" align="center"><b>TOTAL</b></td>
            </tr>
        </thead>
        <tbody>

            <?php $total = 0;?>
            <?php foreach ($insumosAsignados as $item) : ?>
            <tr>
                    <?php IF($item->inaTipo==='2'){?>
                    <td align="left"><?php echo strtoupper($item->descripcion); ?></td>
                    <?php }ELSEIF($item->inaTipo==='1'){?>
                    <td align="left"><?php echo strtoupper($item->insNombre); ?></td>
                    <?php }ELSEIF($item->inaTipo==='3'){?>
                    <td align="left"><?php echo strtoupper($item->exaNombre); ?></td>
                    <?php };?>
                    <td align="center"><?php $date = new DateTime($item->inaFechaRegistro); echo ' '.date_format($date, 'd-m-Y H:i'); ?></td>
                    <td align="center"><?php IF($item->inaValor !== '0')echo '$ '.$item->inaValor; ?></td>
                    <td align="center"><?php echo $item->inaCantidad; ?></td>
                    <td align="center"><?php IF($item->inaValor !== '0')echo '$ '.$item->inaValor*$item->inaCantidad; ?></td>
                    <?php $total += ($item->inaValor*$item->inaCantidad);?>

            </tr>
            <?php endforeach; ?>
            <tr>
                <td style="border-left:none"></td>
                <td style="border-left:none"></td>
                <td style="border-left:none"></td>
                <td style="border-left:none" align=" center"><b>TOTAL</b></td>
                <td style="border-left:none" align=" center">
                    <b><?php echo '$ '.$total;?></b>
                </td>
            </tr>        
        </tbody>
    </table>
</div>
<div class="col-lg-12" id="exportar" align="center" style="display:none">
    
    <table style="width: 680px">
        <tr>
            <td><img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo"></td>
            <td align="left"><b>COBRO DE MEDICAMENTO EN STOCK</b></td>
        </tr>
    </table>
    <br><br><br>
    <table style="width: 680px">
        <tr>
            <td><b>PACIENTE:</b></td>
            <td align="left"><?php echo ' '.strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno).' '; ?>&nbsp;</td>
            <td><b>RUT:</b></td>
            <td align="left"><?php echo ' '.formatearRut($datos->rut);?></td>
        </tr>
        <tr>
            <td><b>FICHA:</b></td>
            <td align="left"><?php echo ' '.$datos->ficha;?></td>
            <td><b>FECHA INGRESO:</b></td>
            <td align="left"><?php echo ' '.$datos->fechaIngreso;?></td>
        </tr>
    </table>
    <br>
    <table class='table table-bordered table-hover table-striped' style="border:1px solid grey;width: 680px">
        <thead>
            <tr>
                <td align="center"><b>INSUMO / MEDICAMENTO</b></td>
                <td align="center"><b>FECHA</b></td>
                <td align="center"><b>VALOR</b></td>
                <td align="center"><b>CANTIDAD</b></td>
                <td align="center"><b>TOTAL</b></td>
            </tr>
        </thead>
        <tbody>

            <?php $total = 0;?>
            <?php foreach ($insumosAsignados as $item) : ?>
            <tr>
                    <?php IF($item->inaTipo==='2'){?>
                    <td style="border:1px solid grey" align="left"><?php echo strtoupper($item->descripcion); ?></td>
                    <?php }ELSEIF($item->inaTipo==='1'){?>
                    <td style="border:1px solid grey" align="left"><?php echo strtoupper($item->insNombre); ?></td>
                    <?php }ELSEIF($item->inaTipo==='3'){?>
                    <td style="border:1px solid grey" align="left"><?php echo strtoupper($item->exaNombre); ?></td>
                    <?php };?>
                    <td style="border:1px solid grey" align="center"><?php echo $item->inaFechaRegistro; ?></td>
                    <td style="border:1px solid grey" align="center"><?php echo '$ '.$item->inaValor; ?></td>
                    <td style="border:1px solid grey" align="center"><?php echo $item->inaCantidad; ?></td>
                    <td style="border:1px solid grey" align="center"><?php echo '$ '.$item->inaValor*$item->inaCantidad; ?></td>
                    <?php $total += ($item->inaValor*$item->inaCantidad);?>

            </tr>
            <?php endforeach; ?>
            <tr>
                <td style="border:none"></td>
                <td style="border:none"></td>
                <td style="border:none"></td>
                <td style="border:none" align=" center"><b>TOTAL</b></td>
                <td style="border:none" align=" center">
                    <b><?php echo '$ '.$total;?></b>
                </td>
            </tr>        
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


<script>
    $(".iconOtro").hide();

    if($("#otroCheck").val()=='SI') {  
        alert('Según nuestros registros, el Insumo, Fármaco o Examen ingresado, ya se encuentra registrado en la base de datos');
        $(".iconOtro").show();
    } 
   
    
 
</script>

<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=500,width=800');
        mywindow.document.write('<html><head><title></title>');
        mywindow.document.write('<style>\n\
                            @page {size: Letter;margin: 25px}\n\
                            body{font-size: 100%;font-family: Arial;} \n\
                            .titulo{font-weight: bold;font-size: 90%;} \n\
                            .ocultarImpresion{font-size:0px; border:none; width:0px} \n\
                            input{border:none}\n\
                            textarea{border:none}\n\
                            select{border:none}\n\
                            label{font-weight: bold;}\n\
                            .cabeza{background-color: #da812e !important;-webkit-text-fill-color: white;-webkit-text-stroke: 1px grey;}\n\
                            .cuerpo{width: 70px;}\n\
                            .cuerpo2{width: 50px;}\n\
                            select{max-width: 200px;}\n\
                            textarea{width: 100%;height: 100px;} \n\
                        </style>');
    
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.print();
        mywindow.close();
        
        return true;
    }
    
    
</script>

<script>
    $("#btnExport").click(function(e) {

        //Creamos un Elemento Temporal en forma de enlace
        var tmpElemento = document.createElement('a');
        // obtenemos la informaciÃ³n desde el div que lo contiene en el html
        // Obtenemos la informaciÃ³n de la tabla
        var data_type = 'data:application/vnd.ms-excel';
        var tabla_div = document.getElementById('imprimir');
        var tabla_html = tabla_div.outerHTML.replace(/ /g, '%20');
        tmpElemento.href = data_type + ', ' + tabla_html;
        //Asignamos el nombre a nuestro EXCEL
        tmpElemento.download = 'Cobro Médicamentos.xls';
        // Simulamos el click al elemento creado para descargarlo
        tmpElemento.click();

        //var htmltable= document.getElementById('imprimir');
        //var html = htmltable.outerHTML;
        //window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
    });

</script>